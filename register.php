<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo json_encode(["success" => false, "message" => "Parolele nu se potrivesc!"]);
        exit();
    }

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] == $username) {
            echo json_encode(["success" => false, "message" => "Username-ul este deja luat!"]);
            exit();
        }
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $users[] = ['username' => $username, 'password' => $hashed_password];

    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    $_SESSION['username'] = $username;
    echo json_encode(["success" => true]);
    exit();
}
