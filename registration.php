<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>STUDENTS MANAGEMENT SYSTEM</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="loginBorder">
      <h2 class="text-center headding adminheadding">Admin Registration</h2>
      <form class="loginForm" action="registration.php" method="post">
        <label>Username</label>
        <input type="text" name="username" required class="inputform"><br>
        <label>Password</label>
        <input type="password" name="password" required class="inputform"><br>
        <input type="submit" name="Createbutton" value="Create" class="adminButton">
      </form>
    </div>
  </body>
</html>

<?php
if (isset($_POST['Createbutton'])) {
  include('dbconnect.php');
  $uname = $_POST['username'];
  $pass = $_POST['password'];
  $qry = "insert into Admin (Username,Password) value ('$uname','$pass')";
  $run = mysqli_query($conn,$qry);
  if ($run==True){
    ?>
    <script>
      alert("New User Created Successfully");
      window.open('login.php','_self');
    </script>
    <?php
  }
}


 ?>
