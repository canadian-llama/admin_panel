<?php 

    session_start();

    // check if user is authenticated
    $isUserAuthenticated = $_SESSION['user'];
    if (empty($isUserAuthenticated)){
        return header('location: ../index.php');
    }
    $conn = mysqli_connect('localhost', 'root', '', 'admin');
    $user_id = $_SESSION['user'];
    $fetchUserData = mysqli_query($conn, "SELECT * FROM users WHERE id = `$user_id` ");
    $userData = mysqli_fetch_assoc($fetchUserData);


?>