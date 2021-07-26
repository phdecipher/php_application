<?php

    include_once "../database/queries.php";

    $queries = new Queries();

    // Reading single object from database given an ID
    $student = $queries->readSingle($_GET['id']);

    // Update
    if (isset ($_POST['id']) && isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['course'])) {

        $queries->update($_POST['id'], $_POST['last_name'], $_POST['first_name'], isset($_POST['course']));
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

    <style>
        body {
            padding-left: 200px;
            padding-right: 200px;
            padding-top: 50px;

        }
    </style>
</head>
<body>

    <h1>Update Student</h1>
    <form method="post">

        <div class="form-group">
            <input value="<?= $student->ID; ?>" type="text" class="form-control input-lg" id="id" placeholder="ID" name="id" readonly/>
        </div>

        <div class="form-group">
            <input value="<?= $student->LAST_NAME; ?>" type="text" class="form-control input-lg" id="last_name" placeholder="Last Name" name="last_name"/>
        </div>

        <div class="form-group">
            <input value="<?= $student->FIRST_NAME; ?>" type="text" class="form-control input-lg" id="first_name" placeholder="First Name" name="first_name"/>
        </div>

        <div class="form-group">
            <input value="<?= $student->COURSE; ?>" type="text" class="form-control input-lg" id="course" placeholder="Course" name="course"/> 
        </div>


    <button type="submit" class="btn btn-light">Save</button>
    </form>
    
</body>
</html>