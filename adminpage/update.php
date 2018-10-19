<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Student Details</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <p><a href="admindas.php"><u>Go Back to the Admin page.......</u></a></p>
    <h2 class="text-center headding">Welcome Update Your Student Details</h2>
    <div class="main-text-container insertBox">
      <form class="updateForm" action="update.php" method="post">
        <div class="form-group">
          <label>Student Name:</label>
          <input type="text" class="form-control student-name" name="updateStudentName" required>
          <label>Student Class:</label>
          <input type="text" class="form-control student-class" name="updateStudentClass" required>
          <input type="submit" name="checkForUpdate" value="Search" class="updateSubmit">
        </div>
      </form>
    </div>
    <div class=tableContainer>
      <?php
      if (isset($_POST['checkForUpdate'])){
        include('../dbconnect.php');
        // gettingdatafromform
        $studentName = $_POST['updateStudentName'];
        $studentClass = $_POST['updateStudentClass'];
        // query
        $qry = "select * from Student_Details where Name like'%$studentName%' and Class='$studentClass'";
        $conn=mysqli_query($conn,$qry);
        // $data = mysqli_fetch_assoc($conn);       Newdebug
        $row =mysqli_num_rows($conn);
      ?>
      <tbody>
        <table>
          <tr>
            <th class=tableHead>Student Name</th>
            <th class=tableHead>Student Roll</th>
            <th class=tableHead>Student Class</th>
            <th class=tableHead>Student Phone</th>
            <th class=tableHead>Student Section</th>
            <th class=tableHead>Student Image</th>
            <th class=tableHead>Action</th>
          </tr>
          <?php
          if($row<1){
            ?>
            <td class=tableNoData colspan="7"><?php echo "No Data Found"?></td>
            <?php
          }
            while ($data= mysqli_fetch_assoc($conn)) {
              ?>
              <tr>
                <td class="tableData"><?php echo $data['Name'];?></td>
                <td class="tableData"><?php echo $data['Roll']; ?></td>
                <td class="tableData"><?php echo $data['Class']; ?></td>
                <td class="tableData"><?php echo $data['Phone']; ?></td>
                <td class="tableData"><?php echo $data['Sec']; ?></td>
                <td class="tableData"><img src="../images/<?php echo $data['Image']; ?>" height="100px;" width="100px;"></td>
                <td class="tableData"><a href="updateForm.php?sid=<?php echo $data['Id'];?>">Edit</a></td>
              </tr>
              <?php
            }
          }
          ?>
        </table>
      </tbody>
    </div>

  </body>
</html>
