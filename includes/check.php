<?php      
    include 'connection.php';  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT *FROM prijava WHERE korisnicko_ime = '$username' AND lozinka = SHA2('$password', '224')";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['ime'] = $username;            
            $_SESSION['last_login_timestamp'] = time();
            header("location: ../index.php");
            exit();
        }  
        else{
            header("location: ../login.php?error=wronglogin");
            exit(); 
        }     