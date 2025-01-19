<?php
require "../components/database.php";

if (isset($_POST['save_settings'])) {
    // Retrieve the settings data from the form submission
    $id = $_POST['id'];
    $api_key = mysqli_real_escape_string($connection, $_POST['api_key']);
    $onesignal_app_id = mysqli_real_escape_string($connection, $_POST['onesignal_app_id']);
    $onesignal_rest_api_key = mysqli_real_escape_string($connection, $_POST['onesignal_rest_api_key']);
    $providers = mysqli_real_escape_string($connection, $_POST['providers']);
    $protocol_type = mysqli_real_escape_string($connection, $_POST['protocol_type']);
    $fcm_notification_topic = mysqli_real_escape_string($connection, $_POST['fcm_notification_topic']);
    $livechaturl = mysqli_real_escape_string($connection, $_POST['livechaturl']);
    $chatonoff = mysqli_real_escape_string($connection, $_POST['chatonoff']);

    // Update query to save the changes
    $query = "UPDATE settings SET 
                api_key = '$api_key', 
                onesignal_app_id = '$onesignal_app_id',
                onesignal_rest_api_key = '$onesignal_rest_api_key',
                providers = '$providers',
                protocol_type = '$protocol_type',
                fcm_notification_topic = '$fcm_notification_topic',
                livechaturl = '$livechaturl',
                chatonoff = '$chatonoff'
                WHERE id = $id";

    // Execute the query
    mysqli_query($connection, $query);
    
    header("location: ../settings.php");
    exit();
}
    

?>
