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
            <form class="form" action="index.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <label class="label-headding">Student Roll No.</label><br>
                  <input type="number" name="roll" class="rollnumber">
                </div>
                <div class="col-md-6">
                  <label class="label-headding">Student Class</label><br>
                  <select  name="class" class="class">
                    <option value="1">5th</option>
                    <option value="2">6th</option>
                    <option value="3">7th</option>
                    <option value="4">8th</option>
                    <option value="5">9th</option>
                    <option value="6">10th</option>
                  </select>
                </div>
              </div>
              <br>
              <input type="submit" name="show" value="View Details" class="button">
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
