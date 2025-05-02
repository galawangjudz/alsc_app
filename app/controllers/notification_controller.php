<?php
require_once __DIR__ . '/../helpers/notif_helper.php'; // Include the Notification helper

class Notification extends Controller{

    // Mark notification as read
    public function markAsRead() {
        // Ensure that this is a POST request and the notification ID is provided
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $notificationId = $_POST['id'];

            // Call the Notification helper to mark it as read
            Notification::markAsRead($notificationId);

            // Optionally, you can return a JSON response or any other necessary response
            echo json_encode(['status' => 'success']);
        } else {
            // Return an error if no notification ID is provided
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }
}
