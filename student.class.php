<?php
require_once 'database.class.php';

class Student{
    public $name;
    public $student_id;
    public $id;
    
    protected $db;

    function __construct()
    {
        $this->db = new Database;
    }

    function add() {
        $sql = "INSERT INTO students(name, student_id, id) VALUES (:name, :student_id, :id)";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(":name", $this->name);
        $query->bindParam(":student_id", $this->student_id);
        $query->bindParam(":id", $this->id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>