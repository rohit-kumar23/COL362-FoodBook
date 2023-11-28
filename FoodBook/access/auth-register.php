<?php

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


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $hashpassword = hash('sha512', $_POST['password']);
    

    $sql = "select * from users where username = '" . $username . "'";

    $data = pg_query($dbconn, $sql);
    $login_check = pg_num_rows($data);

    if ($login_check > 0) {
        // header("Location: index.php?error=This username isn't available. Please try another.");
        $output = array(
            "success" => "false"
        );

        echo json_encode($output);

        exit();
    }
    else {
        $query = "INSERT INTO
                Users (creationDate, creationTime, username, firstName, lastName, gender,
                birthday, locationIP, browserUsed, locationCityId, speaks, email, passwordHash)
                VALUES
                (CURRENT_DATE, CURRENT_TIME, '$username', '$username', '$username', 'male', '2002-02-23',
                '0.0.0.0', 'Chrome', 128, 'en', '$email', '$hashpassword')";
        
        $data = pg_query($dbconn, $query);

        if (! $data) {
            $output = array(
                'success' => "error"
            );
    
            echo json_encode($output);
            exit();
        }

        $output = array(
            'success' => "true"
        );

        echo json_encode($output);

        // header("Location: index.php?registered= Registered. You may login now.");
        exit();
    }
}
else{
    header("Location: index.php");
}
