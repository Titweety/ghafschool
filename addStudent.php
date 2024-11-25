<?php
require_once 'function.php';
require_once 'student.class.php';

$name = $course_id = '';
$nameErr = $course_idErr = '';

$productObj = new Student();

if (($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['add'])){

    $name = clean_input($_POST['name']);
    $course_id = clean_input($_POST['course_id']);

    if (empty($name)){
        $nameErr = 'Name is required';
    }
    if (empty($course_id)){
        $course_idErr = 'Course ID is required';
    }

    if (empty($nameErr) && empty($course_idErr)){
        $productObj->course_id = $course_id;

        if($productObj->add()){
            header('Location: index.php');
        }
        else{
            echo 'Something went wrong adding a new course';
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
        <label for="name">Code</label><span class="error">*</span>
        <br>
        <input type="text" name="name" id="name" value="<?php echo $name;?>">
        <br>
        <?php if(!empty($nameErr)):?>
        <span class="error"><?php echo $nameErr;?></span>
        <br>
        <?php endif;?>
        <br>
            
        <label for="course_id">Description</label><span class="error">*</span>
        <br>
        <input type="text" name="course_id" id="course_id" value="<?php echo $course_id;?>">
        <br>
        <?php if (!empty($course_idErr)): ?>
        <span class="error"><?= $course_idErr ?></span>
        <br>
        <?php endif;?>
        <?php if(!empty($course_idErr)):?>
        <span class="error"><?php echo $course_idErr;?></span>
        <br>
        <?php endif;?>

        <br>
        <input type="submit" value="Add Course">
    </form>
</body>
</html>