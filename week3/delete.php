<?php
    require_once './src/Database.php';
    require_once './src/functions.php';

$message = [];

function deleteTodo($id) { 
    $query = new Database();   
    $status = $query->deleteTodo($id);    
    return $status;
}

if (isset($_GET['id'])) {

    $todoId = $_GET['id'];
    $status = deleteTodo($todoId);
    if($status == 'One record affected') {
        $message['success'] = 'Successfully deleted Todo';
    } else {
        $message['error'] = 'An error occured while deleting specified Todo';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="fontawesomee/css/all.min.css">
    <link rel="stylesheet" href="fontawesomee/js/all.min.js">
    <link rel="stylesheet" href="styles/custom.css">
    <title>Deleted</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-12 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white">
                <h6 class="mb-4">
                    <a href="index.php" class="text-info">
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
                <?php endif?>
            </div>
        </div>
    </div>
</body>
</html>