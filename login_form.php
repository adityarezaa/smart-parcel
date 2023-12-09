<?php
session_start();

@include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];

   $select = "SELECT * FROM student WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
         // Password is correct, set session variables
         $_SESSION['user_name'] = $row['name'];

         // Redirect to parcel.php after successful login
         header('location: parcel.php');
         exit();
      } else {
         $error[] = 'Invalid password';
      }
   } else {
      $error[] = 'User not found';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .form-container {
         max-width: 400px;
         background-color: #fff;
         padding: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         border-radius: 8px;
      }

      h3 {
         color: #007bff;
         text-align: center;
      }

      .error-msg {
         color: #ff0000;
         display: block;
         margin-bottom: 10px;
         text-align: center;
      }

      input {
         width: 100%;
         padding: 10px;
         margin: 8px 0;
         box-sizing: border-box;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      .form-btn {
         background-color: #007bff;
         color: #fff;
         padding: 10px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         width: 100%;
         display: block;
         margin-top: 10px;
      }

      .form-btn:hover {
         background-color: #0056b3;
      }

      p {
         text-align: center;
         margin-top: 15px;
         font-size: 14px;
      }

      a {
         color: #007bff;
         text-decoration: none;
         font-weight: bold;
      }

      a:hover {
         text-decoration: underline;
      }
   </style>
</head>
<body>
   
<div class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <?php
         if(isset($error)){
            echo '<div class="error-msg">'.implode('<br>', $error).'</div>';
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      </form>
   </div>
</body>
</html>
