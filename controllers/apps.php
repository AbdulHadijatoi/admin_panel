<?php
require "../components/database.php";

if (isset($_GET['status'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the current status of the category
    $query = "SELECT status FROM app_config WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $current_status);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Toggle the status (1 -> 0, 0 -> 1)
        $new_status = ($current_status == 1) ? 0 : 1;

        // Update the category status
        $update_query = "UPDATE app_config SET status = ? WHERE id = ?";
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

    // Redirect to app_config.php
    header("location: ../apps.php");
    exit();
}

if (isset($_POST['update'])) {
    // Sanitize and retrieve the inputs
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $package_name = filter_var($_POST['package_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $server_key = filter_var($_POST['server_key'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $server_url = filter_var($_POST['server_url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $api_key = filter_var($_POST['api_key'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $redirect_url = filter_var($_POST['redirect_url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Update the category in the database
    $query = "UPDATE app_config SET package_name = ?, server_key = ?, server_url = ?, api_key = ?, status = ?, redirect_url = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssisi", $package_name, $server_key, $server_url, $api_key, $status, $redirect_url, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to app_config.php
    header("location: ../apps.php");
    exit();
}

if (isset($_POST['store'])) {
    // Sanitize and retrieve the inputs
    $package_name = filter_var($_POST['package_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $server_key = filter_var($_POST['server_key'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $server_url = filter_var($_POST['server_url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $api_key = filter_var($_POST['api_key'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $redirect_url = filter_var($_POST['redirect_url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Insert the new category into the database
    $query = "INSERT INTO app_config (package_name, server_key, server_url, api_key, status, redirect_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssis", $package_name, $server_key, $server_url, $api_key, $status, $redirect_url);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to app_config.php
    header("location: ../apps.php");
    exit();
}

if (isset($_GET['delete'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Delete the category from the database
    $query = "DELETE FROM app_config WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to app_config.php
    header("location: ../apps.php");
    exit();
}
?>
