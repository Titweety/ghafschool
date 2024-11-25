<?php
require_once 'function.php';
require_once "student.class.php";
require_once 'student.php';
$name = $student_id = $id ='';
$nameErr = $student_idErr = $idErr ='';


$productObj = new Student();


if (($_SERVER['REQUEST_METHOD'] == 'POST') AND !empty("add")) {

    $name = clean_input($_POST['name']);
    $student_id = clean_input($_POST['student_id']);

    if (empty($name)) {
    $nameErr = 'Name is required';
    }

    if (empty($student_id)) {
    $student_idErr = 'ID is required';
    }

    if (empty($codeErr) AND empty($nameErr) AND empty($student_idErr)) {

        $productObj->name = $name;
        $productObj->student_id = $student_id;


    if ($productObj->add()) {


        header('location: student.php');
        } else {
        echo 'Something went wrong adding a student';
        }
    }
}
?>