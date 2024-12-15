<?php

extract($_GET);

switch ($route) {
    case 'LoginUser':
        include('../controller/AuthController.php');
        $register = new AuthController();
        $register->loginUser();
        break;
    case 'addUser':
        include('../controller/ResultController.php');
        $result = new ResultController();
        $result->addStudentResult();
        break;

    case 'saveUser':
        include('../controller/UploadController.php');
        $result = new UploadController();
        $result->uploadStudentData();
        break;
}
