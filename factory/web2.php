<?php
require_once '../addStudent/save_student.php';

$route = $_GET['route'] ?? '';

if ($route === 'saveUser') {
    include '../addStudent/save_student.php';
} else {
    http_response_code(404); // Not Found
    echo json_encode(["success" => false, "error" => "Invalid route."]);
}
