<?php
include('../dbconnect.php' );
$sidData=$_GET['sid'];
if (isset($sidData)) {
  $alldataQry= "select * from Student_Details where Id=$sidData";
  $run=mysqli_query($conn,$alldataQry);
  $data=mysqli_fetch_assoc($run);

}

?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Insert Student Data</title>
     <!-- bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <!-- style.css -->
     <link rel="stylesheet" href="../css/style.css">
   </head>
   <body>
     <h2 class="text-center headding">Update The Details</h2>
     <div class="main-text-container insertBox">
       <p class="insertformText">Please Enter New Student Details Carefully*</p>
       <form class="insertForm" action="updateForm.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
           <label>Student Name:</label>
           <input type="text" name="studentName" value="<?php echo $data['Name']?>" class="form-control student-name" required >
         </div>
         <div class="form-group">
           <label>Student Roll:</label>
           <input type="number" name="studentRoll" value="<?php echo $data['Roll']?>" class="form-control student-roll" required >
         </div>
         <div class="form-group">
           <label>Student Class:</label>
           <input type="text" name="studentClass" value="<?php echo $data['Class']?>" class="form-control student-class" required >
         </div>
         <div class="form-group">
           <label>Student Section:</label>
           <input type="text" name="studentSec" value="<?php echo $data['Sec']?>" class="form-control student-sec" required >
         </div>
         <div class="form-group">
           <label>Student Phone No:</label>
           <input type="text" name="studentPhone" value="<?php echo $data['Phone']?>" class="form-control student-phone" required >
         </div>
         <div class="form-group">
           <label>Upload Student Photo:</label>
           <input type="file" name="studentPhoto" class="student-photo" required >
         </div>
         <input type="hidden" name="sid" value="<?php echo $data['Id'] ?>">
         <div class="form-group">
           <input type="submit" name="submit" class="insertSubmit" value="Submit">
         </div>
       </form>

     </div>
   </body>
 </html>

 <?php
 if (isset($_POST['submit'])){
   include('../dbconnect.php');

   $StudentId=$_POST['sid'];
   $StudentName=$_POST['studentName'];
   $StudentRoll=$_POST['studentRoll'];
   $StudentClass=$_POST['studentClass'];
   $StudentSec=$_POST['studentSec'];
   $StudentPhone=$_POST['studentPhone'];

   // file Upload-----
   $studentImageName = $_FILES['studentPhoto']['name']; //file name
   $studentImageSize = $_FILES['studentPhoto']['size']; //file size
   $studentImageTempName = $_FILES['studentPhoto']['tmp_name']; //temp file name for server
   move_uploaded_file($studentImageTempName,"../images/$studentImageName");

   // checking file type
   $fileType= pathinfo($studentImageName,PATHINFO_EXTENSION);
   if($fileType == "jpg"){
     $fileuploadOk= 1;
   }else{
     $fileuploadOk= 2;
   }

   // checking file size
   if ($studentImageSize > 5000000) {
     $fileuploadOk = 0;
   }

   if ($fileuploadOk == 1) {
     $qry="update Student_Details set Name='$StudentName', Roll='$StudentRoll', Class='$StudentClass', Sec='$StudentSec', Image='$studentImageName', Phone='$StudentPhone' where Id=$StudentId;";
     $result = mysqli_query($conn,$qry);

     if($result == True){
       ?>
       <script >
       alert("Data Updated Successfully");
       window.open('updateForm.php?sid=<?php echo $StudentId; ?>','_self');

       </script>
       <?php
     }else{
       ?>
       <script>
       alert("Data Not Inserted");
       </script>
       <?php
     }

   }elseif($fileuploadOk == 0){
     ?>
     <script>
      alert("File Too Large");

     </script>
     <?php
   }elseif ($fileuploadOk == 2) {
     ?>
     <script>
      alert("Please upload photo in jpg format");
     </script>
     <?php
   }
   // end of file upload

 }
  ?>
