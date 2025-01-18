<?php
require "../components/database.php";

if (isset($_GET['status'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the current status of the category
    $query = "SELECT category_status FROM categories WHERE id = ?";
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
        $update_query = "UPDATE categories SET category_status = ? WHERE id = ?";
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

    // Redirect to categories.php
    header("location: ../categories.php");
    exit();
}

if (isset($_POST['update'])) {
    // Sanitize and retrieve the inputs
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_image = filter_var($_POST['category_image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Update the category in the database
    $query = "UPDATE categories SET category_name = ?, category_image = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $category_name, $category_image, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to categories.php
    header("location: ../categories.php");
    exit();
}

if (isset($_POST['store'])) {
    // Sanitize and retrieve the inputs
    $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_image = filter_var($_POST['category_image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Insert the new category into the database
    $query = "INSERT INTO categories (category_name, category_image) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $category_name, $category_image);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to categories.php
    header("location: ../categories.php");
    exit();
}

if (isset($_GET['delete'])) {
    // Sanitize and retrieve the ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Delete the category from the database
    $query = "DELETE FROM categories WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query: " . mysqli_error($connection));
    }

    // Redirect to categories.php
    header("location: ../categories.php");
    exit();
}
?>
