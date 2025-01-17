<?php
require "../components/database.php";

if(isset($_POST['logout_action'])){
    session_destroy();
    
    header("location: ../login.php");
}

// Check if the form is submitted
if (isset($_POST['create_user'])) {
    // Sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Username/email and password are required.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $query = "INSERT INTO users (username, email, password) VALUES ('$email', '$email', '$hashedPassword')";
    if ($connection->query($query) === TRUE) {
        echo "User created successfully!";
    } else {
        if ($connection->errno === 1062) { // Duplicate entry error
            echo "Username or email already exists.";
        } else {
            echo "Error: " . $connection->error;
        }
    }
}


if(isset($_POST['login_action'])){
    // getting input
    $email = filter_var($_POST['email'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var(($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$email){
        $_SESSION['login'] = 'Username or Email is Inccorrect';
    }
    elseif(!$password){
        $_SESSION['login'] = 'Password required';
    }else{  
        // fetch user from database
        $fetch_user_query = "SELECT * FROM users WHERE username = '$email' OR email = '$email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1){
            //convert the record into assoc array
            $user_record=mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // compare form password with database password
            if(password_verify($password,$db_password)){

                // set session for access control
                $_SESSION['user'] = $user_record;
                $_SESSION['user_id'] = $user_record['id'];
                $_SESSION['login_success'] = "User successfully logged in";

                //log in user
                header('location: ../index.php');
                
            }else{
                $_SESSION['login'] = "Please check your input";
            }
        }else{
            $a = mysqli_num_rows($fetch_user_result);
            echo mysqli_num_rows($fetch_user_result);
            $_SESSION['login'] = "User Not found";
        }
    }

    if(isset($_SESSION['login'])){
        $_SESSION['login_data'] = $_POST;
        header('location: ../login.php');
        die();
    }

}else{
    header('location: ../login.php');
    die();
}