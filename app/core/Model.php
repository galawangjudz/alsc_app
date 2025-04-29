<?php
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

}
