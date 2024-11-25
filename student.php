<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <style>
        p.search {
            text-align: center;
            margin: 20px 0;
        }
        btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #008000;
        }
    </style>
</head>
<body>

<a href="addStudent.php" class="btn">Add Student</a>
<br>

    <?php 
    require_once 'student.class.php';
    ?>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Student ID</th>
        </tr>
    </table>
</body>
</html>

