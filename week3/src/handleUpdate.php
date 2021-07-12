<?php
    require_once 'Database.php';
    require_once 'functions.php';

$message = [];
$query = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump(completedToBool($_POST['completed']));
    $todo = $_POST['todo'];
    
    $strlength = strlen(validateTodo($todo));

    if (empty($strlength) == true || $_POST['todo'] == null) {
        $error = 'Something went wrong';
        $message['error'] = $error;
        echo $error;
    } else {
        $todo = validateTodo($_POST['todo']);
        $id = $_POST['id'];
        $completed = completedToBool(isset(($_POST['completed'])));

        // var_dump(completedToBool($_POST['completed']));

        $status = $query->updateTodo($id, $todo, $completed);
        if($status == 'One record affected') {
            $message['success'] = 'Successfully Updated Todo';
        }
    }

    
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';


// echo '<pre>';
// print_r([
//     'todo' => $todo,
//     'id' => $id,
//     'completed' => $completed
// ]);
// echo '</pre>';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/js/all.min.js">
    <link rel="stylesheet" href="../styles/custom.css">
    <title>Updated</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-12 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">
                <h6 class="mb-4">
                    <a href="../index.php" class="text-info">
                        Home
                    </a>
                </h6>
                <?php if(count($message) > 0):?>
                    <?php if (isset($message['success'])):?>
                    <span class="alert alert-success">
                        <strong><?php echo $message['success']?></strong>
                    </span>
                    <?php endif?>
               
                    <?php if (isset($message['error'])):?>
                    <span class="alert alert-danger">
                        <strong><?php echo $message['error']?></strong>
                    </span>
                    <?php endif?>
                 <?php else:?>
                    <strong>Nothing to see here</strong>
                <?php endif?>
            </div>
        </div>
    </div>
</body>
</html>


