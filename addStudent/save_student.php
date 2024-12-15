<?php
require_once '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ["success" => false, "error" => ""];

    $db = new DbConnection();
    $conn = $db->connect();
    try {
        // Validate fields
        $requiredFields = [
            'matric_no',
            'surname',
            'first_name',
            'other_name',
            'faculty',
            'department',
            'course',
            'current_level',
            'mode_of_entry',
            'first_grade',
            'second_grade',
            'total_course',
            'total_grade',
            'gpa',
            'remark',
            'result_type',
            'academic_session'
        ];

        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception("Field $field is required.");
            }
        }

        // File upload handling
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("No file uploaded or an upload error occurred.");
        }

        $image = $_FILES['image'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/admin_panel/addStudent/uploads/';
        $targetFile = $targetDir . basename($image['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            throw new Exception("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }

        // Move the uploaded file
        if (!move_uploaded_file($image['tmp_name'], $targetFile)) {
            throw new Exception("Failed to save uploaded image.");
        }

        // Prepare insert for students table
        $matricNo = $_POST['matric_no'];
        $imagePath = $targetFile; // Path of uploaded image

        $stmt1 = $conn->prepare(
            "INSERT INTO students (matric_no, surname, first_name, other_name, faculty, department, course, current_level, mode_of_entry, image_path) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt1->bind_param(
            "ssssssssss",
            $_POST['matric_no'],
            $_POST['surname'],
            $_POST['first_name'],
            $_POST['other_name'],
            $_POST['faculty'],
            $_POST['department'],
            $_POST['course'],
            $_POST['current_level'],
            $_POST['mode_of_entry'],
            $imagePath
        );
        $stmt1->execute();
        error_log("Student insert affected rows: " . $stmt1->affected_rows);

        // Insert into student results table
        $stmt2 = $conn->prepare(
            "INSERT INTO student_result (matric_no, first_grade, second_grade, total_course, total_grade, gpa, remark, result_type, academic_session, image_path) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt2->bind_param(
            "ssssssssss",
            $_POST['matric_no'],
            $_POST['first_grade'],
            $_POST['second_grade'],
            $_POST['total_course'],
            $_POST['total_grade'],
            $_POST['gpa'],
            $_POST['remark'],
            $_POST['result_type'],
            $_POST['academic_session'],
            $imagePath
        );
        $stmt2->execute();
        error_log("Result insert affected rows: " . $stmt2->affected_rows);

        if ($stmt1->affected_rows > 0 && $stmt2->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = "Student and results saved successfully.";
            exit;
        } else {
            $response['error'] = "Failed to save student and results.";
            exit;
        }
    } catch (Exception $e) {
        $response['error'] = $e->getMessage();
    }
    header('Content-Type: application/json'); // Send JSON header
    echo json_encode($response);
    exit;
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["success" => false, "error" => "Invalid request method."]);
}
