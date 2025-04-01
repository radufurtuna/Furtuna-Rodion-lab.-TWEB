<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo json_encode(["success" => true]);
            exit();
        }
    }
    echo json_encode(["success" => false, "message" => "Username sau parolă incorectă!"]);
    exit();
}
