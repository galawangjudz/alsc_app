<?php
#[\AllowDynamicProperties]
class Model
{
    protected $table;

    protected $db;

    public function __construct()
    {
        $this->db = Connection::getInstance()->getConnection();
    }

    public static function where($column, $value)
    {
        $instance = new static(); // get the called model
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE {$column} = ? LIMIT 1");
        $stmt->execute([$value]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result ? $instance->map($result) : null;
    }

     // Retrieve the first record from the table
     public static function first()
     {
         $instance = new static(); // get the called model
         $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} LIMIT 1");
         $stmt->execute();
         $result = $stmt->fetch(PDO::FETCH_OBJ);
         return $result ? $instance->map($result) : null;
     }

    protected function map($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    public static function firstWhere($column, $value)
    {
        return static::where($column, $value); // Alias
    }

    public function save()
    {
        $props = get_object_vars($this);
        unset($props['db'], $props['table']); // internal use only
    
        $columns = [];
        $params = [];
    
        foreach ($props as $key => $value) {
            $columns[] = "$key = ?";
            $params[] = $value;
        }
    
        if (isset($this->id)) {
            $sql = "UPDATE {$this->table} SET " . implode(', ', $columns) . " WHERE id = ?";
            $params[] = $this->id;
        } else {
            $sql = "INSERT INTO {$this->table} SET " . implode(', ', $columns);
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    
        if (!isset($this->id)) {
            $this->id = $this->db->lastInsertId();
        }
    
        return true;
    }
    

    
}
