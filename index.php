<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Students Management System</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- style.css -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid main">
      <h2 class="text-center headding">STUDENT MANAGEMENT SYSTEM</h2>
      <div class="main-row">
        <div class="row">
          <div class="col-md-12 text-center">
            <button type="button" name="button" class="Button"><a href="login.php">Admin Login</a></button>
          </div>
        </div>
        <div class="row" >
          <h3 class="form-headding text-center" >Checkout Students</h3>
          <div class="col-md-6 showResultCol col-md-offset-3">
            <p class="Searchheadding">*Enter Student Roll Number and Class To see the Result.</p>
            <form class="form" action="index.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <label class="label-headding">Student Roll No.</label><br>
                  <input type="number" name="roll" class="rollnumber" required>
                </div>
                <div class="col-md-6">
                  <input type="submit" name="show" value="View Details" class="button">
                </div>
              </div>
              <br>
              <label class="label-headding">Student Class</label><br>
              <select  name="class" class="class text-center" required>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
              </select>
            </form>
          </div>
          <?php
            if (isset($_POST['show'])) {
              include('dbconnect.php');
              $roll=$_POST['roll'];
              $class=$_POST['class'];
              $qry="select * from Student_Details where Roll='$roll' and Class='$class'";
              $run = mysqli_query($conn,$qry);
              $data = mysqli_fetch_assoc($run);
              $row = mysqli_num_rows($run);
              if ($run == True) {
                if ($row<1){
                  ?>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3 resultRow">
                      <div class="resultTable">
                        <table >
                          <tr class="text-center">
                            <td class="studentImageResult text-center fontStyleResult" colspan="2"><?php echo "***** Sorry No Data Found *****";?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3 resultRow">
                      <div class="resultTable">
                        <p class="text-center resultHeadding">-:<span><u>Your Result</u></span>:-</p>
                        <table >
                          <tr>
                            <td class="studentImageResult text-center" colspan="2"><img src="images/<?php echo $data['Image'];?>" height="100px;" width="150px;"></td>
                          </tr>
                          <tr class="text-center">
                            <td class="tableData text-center fontStyleResult">Name:</td>
                            <td class="tableData text-center fontStyleResult"><?php echo $data['Name']; ?></td>
                          </tr>
                          <tr>
                            <td class="tableData text-center fontStyleResult">Class:</td>
                            <td class="tableData text-center fontStyleResult"><?php echo $data['Class'];?></td>
                          </tr>
                          <tr>
                            <td class="tableData text-center fontStyleResult">Roll:</td>
                            <td class="tableData text-center fontStyleResult"><?php echo $data['Roll'];?></td>
                          </tr>
                          <tr>
                            <td class="tableData text-center fontStyleResult">Section:</td>
                            <td class="tableData text-center fontStyleResult"><?php echo $data['Sec'];?></td>
                          </tr>
                          <tr>
                            <td class="tableData text-center fontStyleResult">Phone No:</td>
                            <td class="tableData text-center fontStyleResult"><?php echo $data['Phone'];?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
            }
          ?>
        </div>
      </div>
    </div>

  </body>
</html>
