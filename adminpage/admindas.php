<?php
session_start();
if($_SESSION['sdata']){
  // echo $_SESSION['sdata'];
}else{
  header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class="main-admin-container">
      <h2 class="text-center headding admin-headding">Welcome To Admin Dashboard</h2>
      <div class="container">
      <div class="main-admin">
        <div class="box1">
          <a href="insert.php"><p>Insert<br>Enter Students Details</p></a>
        </div>
        <div class="box2">
          <a href="update.php"><p>Update<br>Update Students Details</p></a>
        </div>
        <div class="box3">
          <p>Delete<br>Delete Students Details</p>
        </div>
      </div>
      <div class="changePasswordButton">
        <a href="changepassword.php" type="button" >Change Password</a>
      </div>
      <div class="logoutButton">
        <a href="../logout.php" type="button">Log Out</a>
      </div>
    </div>
    </div>


  </body>
</html>
