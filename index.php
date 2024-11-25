<?php
require_once 'function.php';
require_once "student.class.php";
require_once 'student.php';
$name = $course_id = $id ='';
$nameErr = $course_idErr = $idErr ='';


$productObj = new Student();


if (($_SERVER['REQUEST_METHOD'] == 'POST') AND !empty("add")) {

    $name = clean_input($_POST['name']);
    $course_id = clean_input($_POST['course_id']);

    if (empty($name)) {
    $nameErr = 'Name is required';
    }

    if (empty($course_id)) {
    $course_idErr = 'Course is required';
    }

    if (empty($codeErr) AND empty($nameErr) AND empty($course_idErr)) {

        $productObj->name = $name;
        $productObj->course_id = $course_id;


    if ($productObj->add()) {


        header('location: student.php');
        } else {
        echo 'Something went wrong adding a student';
        }
    }
}
?>