<?php
    // session_start();
    require_once './src/Database.php';
    require_once './src/functions.php';

$message = [];
$query = new Database();
$result = $query->fetchTodos();
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $todo = $_POST['todo'];
    $strlength = strlen(validateTodo($todo));

    if (empty($strlength) == true || $_POST['todo'] == null) {
        $error = '*You did not make a valid input';
    } else {
        $data = validateTodo($_POST['todo']);       
        $status = $query->insertTodo($data);
        if($status == 'One record affected') {
            $message['success'] = 'Todo Added successfully';
        }

    }
}

// echo strlen(validateTodo($_POST['todo'])).'I go make am'.'</br>';

// echo '<pre>';
// print_r($result);
// echo '</pre>'

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
    <title>Todo List</title>
</head>
<body>
    <div class="container mt-5">
        <?php if(count($message) > 0): ?>
        <div class="row justify-content-center px-4">
            <?php if (isset($message['success'])) :?>
            <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                <h6 class="mb-4 alert alert-success">
                    <?php echo $message['success']?>
                </h6>
            </div>
        <?php endif?>
        </div>
        <?php endif?>

        <div class="d-flex justify-content-between">
            <h1 class="float">Todo List</h1>
            <?php if(count($result) > 0):?>
                <p>
                    You have <strong><?php echo count($result)?></strong> total task,  
                    Only <strong class="text-success"><?php echo count(getCompletedArrayCount($result)) ?></strong> completed
                </p>               
            <?php endif ?>
        </div>
        <?php if(count($result) > 0):?>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Todo</th>
                    <th>Completed</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($result); $i++):?>
                    <tr>
                        <td><?php echo $result[$i]['todo']?></td>
                        <td><?php echo isCompleted($result[$i]['completed'])?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $result[$i]["id"]?>" class="text-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>

                        <td>
                            <a href="delete.php?id=<?php echo $result[$i]["id"]?>" class="text-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
        <?php else:?>
            <strong>Nothing to see here</strong>
        <?php endif?>


        <div class="row justify-content-center px-4">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">
                <h5 class="mb-4">Add New Todo</h5> 
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input id="todo" type="text" class="form-control" name="todo" placeholder="Add todo">
                        <?php if(isset($error)):?>
                            <div class="py-2 error-message" role="alert" id="alert">
                                <?php echo $error?>
                            </div>
                        <?php endif?>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Add</button>
                   </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="./script/script.js"></script>
</body>
</html>