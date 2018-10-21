<?php
session_start();
if (isset($_SESSION['sdata'])) {
  if ($_SESSION['sdata']){
    header('Location:adminpage/admindas.php');
  }
}
 ?>

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
      <h2 class="text-center headding adminheadding">Admin Login</h2>
      <form class="loginForm" action="login.php" method="post">
        <label>Username</label>
        <input type="text" name="username" required class="inputform"><br>
        <label>Password</label>
        <input type="password" name="password" required class="inputform"><br>
        <input type="submit" name="loginbutton" value="Login" class="adminButton">
      </form>
    </div>
  </body>
</html>

<?php
include('dbconnect.php');

if (isset($_POST['loginbutton'])){
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  $qry="select * from Admin where Username='$uname' and Password='$pass'";
  $con=mysqli_query($conn,$qry);
  $row =mysqli_num_rows($con);
  echo $row;
  if ($row<1){
    ?>
    <script>
    alert("Please enter proper username or password");

    </script>
    <?php
  }else{
    session_start();
    $_SESSION['sdata']=$row;
    header('location:adminpage/admindas.php');
  }
}

 ?>
