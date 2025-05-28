<?php

session_start();

$valid_user = 'admin';
$valid_password = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($user === $valid_user && $password === $valid_password) {
        $_SESSION['connecte'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Identifiants incorrect.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color:rgb(150, 150, 150);
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td><input type="text" id="nom" name="user" required></td>
                </tr>
                <tr>
                    <td><label for="motPasse">mot de passe :</label></td>
                    <td><input type="password" id="motPasse" name="password" required></td>
                </tr>
                <tr>
                    <td><button type="submit">Login</button></td>
                </tr>
            </table>

        </form>
    </div>

</body>

</html>
