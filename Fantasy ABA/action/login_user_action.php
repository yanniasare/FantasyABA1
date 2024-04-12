<?php
include "../settings/connection.php"; 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM User WHERE email = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            
            if ($user && password_verify($password, $user['password'])) {
                
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: ../view/profile_setup.php");
                exit();
            } else {
                
                header("Location: ../login/login_view.php#loginsec?login=failed");
                exit();
            }
        } else {
            
            header("Location: ../view/dashboard.php#loginsec?error=database_error");
            exit();
        }
        
        mysqli_stmt_close($stmt);
    } else {
        
        header("Location: ../view/dashboard.php#loginsec?error=statement_error");
        exit();
    }
}
?>