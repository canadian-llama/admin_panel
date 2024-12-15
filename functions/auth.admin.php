<?php 

    session_start();

    // check if user is authenticated
    $isAdminAuthenticated = $_SESSION['user'];
    if (empty($isAdminAuthenticated)){
        return header('location: ../index.php');
    }
    $conn = mysqli_connect('localhost', 'root', '', 'admin');
    $admin_id = $_SESSION['admin'];
    $fetchAdminData = mysqli_query($conn, "SELECT * FROM users WHERE id = `$admin_id` ");
    $adminData = mysqli_fetch_assoc($fetchAdminData);


?>