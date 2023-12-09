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
            foreach($error as $errorMessage){
               echo '<span class="error-msg">'.$errorMessage.'</span>';
            };
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      </form>
   </div>
   <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDy7XNwLKfbGv_SvxAbBVg1cbxuXYniYQE",
    authDomain: "smart-parcel-a903f.firebaseapp.com",
    databaseURL: "https://smart-parcel-a903f-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "smart-parcel-a903f",
    storageBucket: "smart-parcel-a903f.appspot.com",
    messagingSenderId: "1027311826095",
    appId: "1:1027311826095:web:b99ec7cc5528e46e2bd05a",
    measurementId: "G-C4PVQ15TGH"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>

</body>
</html>
