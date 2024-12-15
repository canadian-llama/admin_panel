<?php
require '../config/connect.php';
require '../functions/misc_func.php';

session_start();

class AuthController extends DbConnection
{
    protected $plug;

    public function __construct()
    {
        $this->plug = DbConnection::connect();
    }


    public function loginUser()
    {
        extract($_POST);
        $pwd = passwordHash($password);

        // checking if user exists
        $checkUser = mysqli_query($this->plug, "SELECT * FROM `admins` WHERE `username` = '" . $username . "' AND `password` = '" . $pwd . "' ");


        if (mysqli_num_rows($checkUser) == 1) {
            $row = mysqli_fetch_assoc($checkUser);
            $url = '../addStudent/add_student.php';
            echo json_encode(['status' => 200, 'message' => 'Welcome user ' . $password . '', 'url' => $url]);
        } else {
            echo json_encode(['status' => 203, 'message' => 'Invalid Credentials provided']);
        }
    }

}
