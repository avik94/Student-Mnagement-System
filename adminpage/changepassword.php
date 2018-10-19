<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Changed Admin Password</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <h2 class="text-center headding">Changed Password For Admin Login</h2>
    <div class="ChangeloginBorder">
      <form class="ChangePassForm" action="changepassword.php" method="post">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" name="userName" class="form-control changePass" required >
        </div>
        <div class="form-group">
          <label>Current Password:</label>
          <input type="password" name="userCurPass" class="form-control changePass" required >
        </div>
        <div class="form-group">
          <label>New Password:</label>
          <input type="password" name="userNewPass" class="form-control changePass" required >
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="insertSubmit" value="Submit">
        </div>
      </form>
    </div>
  </body>
</html>

<?php
if (isset($_POST['submit'])) {
  include('../dbconnect.php');
  $userName = $_POST['userName'];
  $userCurPass = $_POST['userCurPass'];
  $userNewPass = $_POST['userNewPass'];
  $qry="UPDATE Admin SET Password='$userNewPass' WHERE  Username='$userName' and Password='$userCurPass' ";
  $run=mysqli_query($conn,$qry);
  if ($run == True) {
    ?>
    <script>
      alert("Password Changed Successfully");
      window.open('admindas.php','_self');
    </script>
    <?php

  }else{
    ?>
    <script>
      alert("Password Not Changed");
    </script>
    <?php
  }

}

 ?>
