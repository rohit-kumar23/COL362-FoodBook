<?php

session_start();

require_once '../db_setup.php';

$connection_string = "host = {$host} port = {$port} dbname = {$dbname} user = {$user} password = {$password} ";
$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    $output = array(
        'success' => "error"
    );
    echo json_encode($output);
    exit();
}
// else {
//     echo "Connected to the database\n";
// }

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $hashpassword = hash('sha512', $_POST['password']);

    $sql = "select * from users where username = '" . $username . "' and passwordHash ='" . $hashpassword . "'";
    $data = pg_query($dbconn, $sql);
    $login_check = pg_num_rows($data);

    if ($login_check != 1) {
        $output = array(
            'success' => "false"
        );
        echo json_encode($output);

        exit();
    } else {

        $row = pg_fetch_assoc($data);

        $output = array(
            'success' => "true",
            'id' => $row['id'],
            'username' => $row['username'],
            'email' => $row['email'],
            // 'role' => $row['role']
            // 'passwordHash' => $row['passwordHash']
        );

        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = 'user';
        // $_SESSION['passwordHash'] = $row['passwordHash'];


        echo json_encode($output);
        exit();
    }
}
else{
    header("Location: /../index.php");
}
