<?php
require "../components/database.php";

if (isset($_POST['update'])) {
    // Sanitize and retrieve the inputs
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_image = filter_var($_POST['category_image'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_status = filter_var($_POST['category_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Update the category in the database
    $query = "UPDATE categories SET category_name = ?, category_image = ?, category_status = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssii", $category_name, $category_image,$category_status, $id); // Bind parameters (s for string, i for integer)
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
    $query = "INSERT INTO categories (category_name,category_image) VALUES (?,?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $category_name, $category_image); // Bind the name parameter
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
