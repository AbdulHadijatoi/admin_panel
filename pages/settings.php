<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Settings</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/settings.php" method="POST">
                <div class="row d-flex justify-content-center pt-4 px-4">
                    
                    <!-- Hidden Input for ID -->
                    <input type="hidden" name="id" value="<?php echo $settings['id']; ?>">

                    <!-- Row 1 -->
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="api_key" name="api_key" placeholder="API Key" value="<?php echo $settings['api_key']; ?>">
                            <label for="api_key">API Key</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="onesignal_app_id" name="onesignal_app_id" placeholder="OneSignal App ID" value="<?php echo $settings['onesignal_app_id']; ?>">
                            <label for="onesignal_app_id">OneSignal App ID</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="onesignal_rest_api_key" name="onesignal_rest_api_key" placeholder="OneSignal REST API Key" value="<?php echo $settings['onesignal_rest_api_key']; ?>">
                            <label for="onesignal_rest_api_key">OneSignal REST API Key</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="providers" name="providers" placeholder="Providers" value="<?php echo $settings['providers']; ?>">
                            <label for="providers">Providers</label>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="protocol_type" name="protocol_type" placeholder="Protocol Type" value="<?php echo $settings['protocol_type']; ?>">
                            <label for="protocol_type">Protocol Type</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="fcm_notification_topic" name="fcm_notification_topic" placeholder="FCM Notification Topic" value="<?php echo $settings['fcm_notification_topic']; ?>">
                            <label for="fcm_notification_topic">FCM Notification Topic</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="livechaturl" name="livechaturl" placeholder="Live Chat URL" value="<?php echo $settings['livechaturl']; ?>">
                            <label for="livechaturl">Live Chat URL</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="chatonoff" name="chatonoff" placeholder="Chat On/Off" value="<?php echo $settings['chatonoff']; ?>">
                            <label for="chatonoff">Chat On/Off</label>
                        </div>
                    </div>
                    
                    <!-- Add More Rows Here for Other Fields -->

                    <!-- Save Changes Button -->
                    <div class="col-12 text-center">
                        <button type="submit" name="save_settings" class="btn btn-primary mt-4">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Floating Labels -->
</div>