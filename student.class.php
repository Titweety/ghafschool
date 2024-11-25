<?php
require_once 'database.class.php';

class Student{
    public $name;
    public $course_id;
    public $id;
    
    protected $db;

    function __construct()
    {
        $this->db = new Database;
    }

    function add() {
        $sql = "INSERT INTO students(name, course_id, id) VALUES (:name, :course_id, :id)";

        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(":name", $this->name);
        $query->bindParam(":course_id", $this->course_id);
        $query->bindParam(":id", $this->id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>