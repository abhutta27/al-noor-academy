<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $course = $_POST['course'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($full_name) && !empty($email) && !empty($phone) && !empty($course)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO admissions (full_name, email, phone, course, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$full_name, $email, $phone, $course, $message]);
            
            header("Location: admission.php?success=1");
            exit;
        } catch (PDOException $e) {
            die("Error submitting application: " . $e->getMessage());
        }
    } else {
        die("Please fill all required fields.");
    }
} else {
    header("Location: admission.php");
    exit;
}
?>
