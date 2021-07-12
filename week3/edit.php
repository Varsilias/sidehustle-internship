<?php
    require_once './src/Database.php';
    require_once './src/functions.php';


if (isset($_GET['id'])) {
    $todoId = $_GET['id'];
}

$query = new Database();
$result = $query->fetchSingleTodo($todoId);


// echo '<pre>';
// print_r($result);
// echo '</pre>';

// echo $todoId;
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
    <title>Edit Todo</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-8 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-4 float">Edit Todo</h5>
                    <h6 class="mb-4">
                        <a href="index.php" class="text-info">
                            Back
                        </a>
                    </h6>
                </div>
                
                <form action="./src/handleUpdate.php" method="POST">
                    <div class="form-group">
                        <label for="todo">Todo</label>
                        <input id="todo" type="text" class="form-control" name="todo" value="<?php echo $result['todo']?>">
                    </div>

                     <div class="form-check my-2 d-flex align-item-center">
                         <?php if($result['completed'] == 1):?>
                        <input type="checkbox" class="form-check-input" name="completed" checked>        
                        <?php else:?>                
                        <input type="checkbox" class="form-check-input" name="completed" value="off">        
                        <?php endif?>
                        <label class="form-check-label" for="completed">Completed</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $result['id']?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Update</button>
                   </div>                
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>