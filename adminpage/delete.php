<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Students Details</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <p><a href="admindas.php"><u>Go Back to the Admin page.......</u></a></p>
    <h2 class="text-center headding">Welcome Delete Your Student Details</h2>
    <div class="main-text-container deleteBox">
      <form class="form" action="delete.php" method="post">
        <div class="form-group">
          <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="studentName" class="form-control student-name" required >
          </div>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label>Student Class:</label>
            <input type="text" name="studentClass" class="form-control student-class" required >
          </div>
        </div>
        <div class="form-group">
          <div class="form-group">
            <input type="submit" name="deleteSubmit" class="form-control deleteSubmit" value="Search">
          </div>
        </div>
      </form>
    </div>
    <div class=tableContainer>
      <?php
      if (isset($_POST['deleteSubmit'])) {
        include('../dbconnect.php');
        $studentName = $_POST['studentName'];
        $studentClass = $_POST['studentClass'];
        $qry = "select * from Student_Details where Name like '%$studentName%' and Class='$studentClass'";
        $run = mysqli_query($conn,$qry);
        $row = mysqli_num_rows($run);
        ?>
      <table>
        <tbody>
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
          if ($row<1) {
              ?>
              <td class=tableNoData colspan="7"><?php echo "No Data Found"; ?></td>
              <?php
          }
          while ($data = mysqli_fetch_assoc($run)){
            ?>
          <tr>
            <td class=tableData><?php echo $data['Name'] ?></td>
            <td class=tableData><?php echo $data['Roll'] ?></td>
            <td class=tableData><?php echo $data['Class'] ?></td>
            <td class=tableData><?php echo $data['Phone'] ?></td>
            <td class=tableData><?php echo $data['Sec'] ?></td>
            <td class=tableData><?php echo $data['Image'] ?></td>
            <form action="deleteButtom.php" method="post">
              <td class=tableData><input type="submit" name="deleteData" class="form-control deleteData" value="Delete"></td>
              <?php
              session_start();
              $_SESSION['Sid'] = $data['Id'];
               ?>
            </form>
          </tr>
            <?php
            }
          }
         ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
