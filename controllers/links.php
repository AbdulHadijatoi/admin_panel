<?php
require "../components/database.php";

if (isset($_GET['status'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the current status of the link
    $query = "SELECT channel_status FROM links WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $current_status);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Toggle the status (1 -> 0, 0 -> 1)
        $new_status = ($current_status == 1) ? 0 : 1;

        // Update the link status
        $update_query = "UPDATE links SET channel_status = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($connection, $update_query);

        if ($update_stmt) {
            mysqli_stmt_bind_param($update_stmt, "ii", $new_status, $id);
            mysqli_stmt_execute($update_stmt);
            mysqli_stmt_close($update_stmt);
        } else {
            die("Error preparing update query: " . mysqli_error($connection));
        }
    } else {
        die("Error preparing select query: " . mysqli_error($connection));
    }

    // Redirect to links.php
    header("location: ../links.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $link_id = $_POST['id']; // ID of the link to be updated
    $category_id = $_POST['category_id'];
    $channel_description = $_POST['channel_description'];
    $channel_type = $_POST['channel_type'];
    $video_url = $_POST['video_url'];
    $date = $_POST['date'];
    $matchtimer = $_POST['matchtimer'];
    $channel_status = $_POST['channel_status'];
    $tvScheduleStatus = $_POST['tvScheduleStatus'];

    // Update the links table
    $sql = "UPDATE links SET category_id = ?, channel_description = ?, channel_type = ?, video_url = ?, date = ?, matchtimer = ?, channel_status = ?, tvScheduleStatus = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('isssssiii', $category_id, $channel_description, $channel_type, $video_url, $date, $matchtimer, $channel_status, $tvScheduleStatus, $link_id);

    if ($stmt->execute()) {
        // Update the link details table
        $delete_sql = "DELETE FROM link_details WHERE link_id = ?";
        $delete_stmt = $connection->prepare($delete_sql);
        $delete_stmt->bind_param('i', $link_id);
        $delete_stmt->execute();
        // Insert updated link details
        if (isset($_POST['link_details'])) {
            $link_details = $_POST['link_details'];

            foreach ($link_details as $link_detail) {
                $channel_name = $link_detail['channel_name'];
                $channel_image = $link_detail['channel_image'];
                $channel_url = $link_detail['channel_url'];
                $user_agent = $link_detail['user_agent'];
                $cookie = $link_detail['cookie'];
                $referer = $link_detail['referer'];
                $button_status = $link_detail['button_status'];
                $origin = $link_detail['origin'];
                $link_type = $link_detail['link_type'];
                $token = $link_detail['token'];

                // Insert the updated details into the link_details table
                $detail_sql = "INSERT INTO link_details (link_id, channel_name, channel_image, channel_url, user_agent, cookie, referer, button_status, origin, link_type, token)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $detail_stmt = $connection->prepare($detail_sql);
                $detail_stmt->bind_param('issssssisss', $link_id, $channel_name, $channel_image, $channel_url, $user_agent, $cookie, $referer, $button_status, $origin, $link_type, $token);
                $detail_stmt->execute();
                
            }
        }

        // Redirect or show success message
        header("location: ../links.php");
        exit;
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    // Collect form data
    $category_id = $_POST['category_id'];
    $channel_description = $_POST['channel_description'];
    $channel_type = $_POST['channel_type'];
    $video_url = $_POST['video_url'];
    $date = $_POST['date'];
    $matchtimer = $_POST['matchtimer'];
    $channel_status = $_POST['channel_status'];
    $tvScheduleStatus = $_POST['tvScheduleStatus'];

    // Prepare the insert query for the links table
    $sql = "INSERT INTO links (category_id, channel_description, channel_type, video_url, date, matchtimer, channel_status, tvScheduleStatus) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Using prepared statements to avoid SQL injection
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('issssiii', $category_id, $channel_description, $channel_type, $video_url, $date, $matchtimer, $channel_status, $tvScheduleStatus);

    if ($stmt->execute()) {
        $link_id = $stmt->insert_id; // Get the last inserted link ID
        
        // Handle the repeatable link details
        if (isset($_POST['link_details'])) {
            $link_details = $_POST['link_details'];
            
            // Insert each link detail into the link_details table
            foreach ($link_details as $link_detail) {
                $channel_image = $link_detail['channel_image'];
                $channel_name = $link_detail['channel_name'];
                $channel_url = $link_detail['channel_url'];
                $user_agent = $link_detail['user_agent'];
                $cookie = $link_detail['cookie'];
                $referer = $link_detail['referer'];
                $button_status = $link_detail['button_status'];
                $origin = $link_detail['origin'];
                $link_type = $link_detail['link_type'];
                $token = $link_detail['token'];

                // Insert each detail into the link_details table
                $detail_sql = "INSERT INTO link_details (link_id, channel_name, channel_image, channel_url, user_agent, cookie, referer, button_status, origin, link_type, token)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $detail_stmt = $connection->prepare($detail_sql);
                $detail_stmt->bind_param('issssssisss', $link_id, $channel_name, $channel_image, $channel_url, $user_agent, $cookie, $referer, $button_status, $origin, $link_type, $token);
                $detail_stmt->execute();
            }
        }

        // Redirect or show success message
        header("location: ../links.php");
        exit;
    } else {
        // Handle error if insertion failed
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['delete'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Delete the link from the database
    $query = "DELETE FROM links WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to links.php
    header("location: ../links.php");
    exit();
}
?>
