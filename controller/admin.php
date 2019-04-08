<?php 
include '../../controller/database.php';
if(!empty($_POST)){
    $login = [
        'name' => trim($_POST['login']),
        'password' => hash('sha256', $_POST['password']),
    ];
    $username = $login['name'];
    $query = $pdo->query("SELECT login, password FROM `admin` WHERE login = '$username'");
    $users = $query->fetchAll();
    if(isset($users[0]->password)){
        if($users[0]->password == $login['password']){
            $_admin = true;
            //$_SESSION["name"] = $login['name'];
        }
        elseif ($users[0]->password != $login['password']) {
            echo '<pre>';
            print_r('pas ok');
            echo '</pre>';
            exit();
        }
    }
}
if($_admin){
    $query = $pdo->query("SELECT * FROM `message` ORDER BY `date` DESC");
    $messages = $query->fetchAll();
}
?>

