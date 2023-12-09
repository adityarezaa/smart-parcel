<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $stu_id = mysqli_real_escape_string($conn, $_POST['student_id']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $telp = mysqli_real_escape_string($conn, $_POST['telp']);
   $password = md5($_POST['password']);
      
   $select = "SELECT * FROM student WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   $select = "SELECT * FROM student WHERE email = '$email'";
   $result = mysqli_query($conn, $select);
   
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($_POST['password'], $row['password'])) {
         // Password is correct
         // Continue with login logic
      } else {
         // Password is incorrect
         $error[] = 'Invalid password';
      }
   } else {
      // User does not exist
      $error[] = 'User not found';
   }
   

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      $insert = "INSERT INTO student (stu_id, name, email, telp, password) VALUES ('$stu_id', '$name', '$email', '$telp', '$password')";
      mysqli_query($conn, $insert);

      // Set session variable for the user
      session_start();
      $_SESSION['user_name'] = $name;

      header('location:login_form.php'); // Redirect to login_form.php after successful registration
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

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
         padding: 30px;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
         border-radius: 8px;
      }

      h3 {
         color: #007bff;
         text-align: center;
         margin-bottom: 20px;
      }

      .form-group {
         margin-bottom: 20px;
      }

      label {
         display: block;
         font-weight: bold;
         margin-bottom: 5px;
      }

      input {
         width: 100%;
         padding: 10px;
         box-sizing: border-box;
         border: 1px solid #ccc;
         border-radius: 4px;
         font-size: 16px;
      }

      .form-btn {
         background-color: #007bff;
         color: #fff;
         padding: 12px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         width: 100%;
         display: block;
         font-size: 16px;
         transition: background-color 0.3s;
      }

      .form-btn:hover {
         background-color: #0056b3;
      }

      .error-msg {
         color: #ff0000;
         margin-top: 10px;
         text-align: center;
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
      <h3>Register Now</h3>
      <form action="" method="post" onsubmit="return validateForm()">
         <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" required placeholder="Enter your student ID">
         </div>
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="form-group">
            <label for="telp">Telephone Number</label>
            <input type="tel" id="telp" name="telp" required placeholder="Enter your telephone number">
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
         </div>
         <button type="submit" name="submit" class="form-btn">Register Now</button>
         <?php
         if(isset($error)){
            echo '<div class="error-msg">'.implode('<br>', $error).'</div>';
         }
         ?>
         <p>Already have an account? <a href="login.php">Login Now</a></p>
      </form>
   </div>

   <script>
      function validateForm() {
         var password = document.getElementById('password').value;

         if (password.length < 6) {
            alert('Password must be at least 6 characters long.');
            return false;
         }

         // Add more validation as needed

         return true;
      }
   </script>
</body>
</html>