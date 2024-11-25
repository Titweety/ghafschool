<?php
require_once 'function.php';
require_once 'student.class.php';

$name = $student_id = '';
$nameErr = $student_idErr = '';

$productObj = new Student();

if (($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['add'])){

    $name = clean_input($_POST['name']);
    $student_id = clean_input($_POST['student_id']);

    if (empty($name)){
        $nameErr = 'Name is required';
    }
    if (empty($student_id)){
        $student_idErr = 'Student ID is required';
    }

    if (empty($nameErr) && empty($course_idErr)){
        $productObj->student_id = $student_id;

        if($productObj->add()){
            header('Location: index.php');
        }
        else{
            echo 'Something went wrong adding a student';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <span class="error">* are required fields</span>
        <br>
        <label for="name">Name</label><span class="error">*</span>
        <br>
        <input type="text" name="name" id="name" value="<?php echo $name;?>">
        <br>
        <?php if(!empty($nameErr)):?>
        <span class="error"><?php echo $nameErr;?></span>
        <br>
        <?php endif;?>
        <br>
            
        <label for="student_id">Student ID</label><span class="error">*</span>
        <br>
        <input type="text" name="student_id" id="student_id" value="<?php echo $student_id;?>">
        <br>
        <?php if (!empty($student_idErr)): ?>
        <span class="error"><?= $student_idErr ?></span>
        <br>
        <?php endif;?>
        <?php if(!empty($student_idErr)):?>
        <span class="error"><?php echo $student_idErr;?></span>
        <br>
        <?php endif;?>

        <br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>