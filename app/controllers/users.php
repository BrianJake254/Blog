<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$table = 'users';

$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';


// log user in - info needed to store user in the session
function LoginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location:' .BASE_URL . '/admin/dashboard.php');
    } else {
        header('location:' .BASE_URL . '/index.php');
    }
    exit(); 
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    //From validateUser.php
    $errors = validateUser($_POST);

    //checking for errors before saving to database
    if (count($errors) === 0){

    //removing some keys in an array 
    unset($_POST['passwordConf'], $_POST['register-btn'], $_POST['create-admin']);

    //Encrypting Password
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (isset($_POST['admin'])) {
        $_POST['admin'] = 1; 
        $user_id = create($table, $_POST);
        $_SESSION['message'] = "Admin user created";
        $_SESSION['type'] = "success";
        header('location:' .BASE_URL . '/admin/users/index.php');
        exit();

    } else {
        //adding admin key
        $_POST['admin'] = 0; 
        //calling some functions from db
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        LoginUser($user);
    }
    
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if(isset($_POST['update-user'])){
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0){
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0; 
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Admin user updated";
        $_SESSION['type'] = "success";
        header('location:' .BASE_URL . '/admin/users/index.php');
        exit();
    
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];

}

 // Log in
if (isset($_POST['login-btn'])){
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {

            LoginUser($user);

        } else {
            array_push($errors, 'Wrong Credentials');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

if(isset($_GET['delete_id'])){
    adminOnly();
    $count = delete($table, $GET['delete_id']);
    $_SESSION['message'] = "Admin user deleted";
    $_SESSION['type'] = "success";
    header('location:' .BASE_URL . '/admin/users/index.php');
    exit();
}

?>