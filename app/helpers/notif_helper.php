<?php 
require_once __DIR__ . '/../core/Model.php';

class Notification extends Model {

    protected $table = 'notifications';

    public static function send($user_id, $message) {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        $stmt->execute([$user_id, $message]);
    }

    public static function unread($user_id) {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function markAsRead($id) {
        $instance = new static();
        $stmt = $instance->db->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
}
