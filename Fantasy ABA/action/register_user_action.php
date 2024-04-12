<?php
// Include the database connection file
include '../settings/connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Collect form data and assign each to a variable
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $favorite_team = $_POST['favorite_team'];
    $course_offered = $_POST['course_offered']; 
    $username = $fname . ' ' . $lname;
    $retypePassword = $_POST['retypePassword'];
                                
    if ($password !== $retypePassword) {
        echo '<script> window.alert("Error: Passwords do not match.");</script>';
        exit();
        }
   

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO User (username, email, `password`, favorite_team, course_offered) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $username, $email, $passwordHash, $favorite_team, $course_offered);
    $result = $stmt->execute();

    if ($stmt->errno) {
        echo "Error: " . $stmt->error;
    }

    if ($result) {
        echo '<script> window.alert("Account successfully created.");</script>';
        session_start();
    // Set session variable to indicate registration completion
        $_SESSION['registration_completed'] = true;
        echo '<script> window.location.href= "../index.php"</script>';

        
        exit();
    } else {
        echo "Query failed: " . $stmt->error;
        exit();
    }
}
?>