<?php

require_once __DIR__ . '/../core/Model.php';

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT al.*, u.name as name FROM activity_logs al LEFT JOIN users u ON u.id = al.user_id ORDER BY al.id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function log($user_id, $action, $module, $description = '')
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO activity_logs (user_id, action, module, description) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $action, $module, $description]);
    }

    public static function recent_logs()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM activity_logs ORDER BY created_at DESC LIMIT 5");  // Adjust the query to suit your needs
        $stmt->execute();
        $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $logs;  // Return an array of recent activity logs
    }
}
