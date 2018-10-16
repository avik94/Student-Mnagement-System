<?php
session_start();

if (isset($_SESSION['Sid'])) {
  $id= $_SESSION['Sid'];
}else {
  header('Location:delete.php');
}

if (isset($_POST['deleteData'])) {
  include('../dbconnect.php');
  $qry = "DELETE FROM Student_Details WHERE Id='$id'";
  $run = mysqli_query($conn,$qry);
  ?>
  <script>
  alert("Data Deleted Successfuly");
  window.open('delete.php','_self');  
  </script>
  <?php

}

?>
