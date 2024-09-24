<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment Form</title>
  <style>
    .form-container {
      max-width: 600px;
      margin: 0 auto;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input, textarea {
      width: 100%;
      padding: 8px;
    }
    .form-actions {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form action="index.php" method="POST">
      <h1>Enrollment Form</h1>
      <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>
      </div>
      <div class="form-group">
        <label for="mname">Middle Name:</label>
        <input type="text" id="mname" name="mname">
      </div>
      <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
      </div>
      <div class="form-group">
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
      </div>
      <div class="form-group">
        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>
      </div>
      <div class="form-actions">
        <input type="submit" value="Submit">
        <input type="reset" value="Clear">
      </div>
    </form>
  </div>

  <?php
  
  include '../Config/db.php'; 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Initialize database connection
      $database = new Database();
      $db = $database->getConnection();

      // Create a new student object
      $student = new Student($db);

      // Assign form data to the student object
      $student->first_name = $_POST['fname'];
      $student->middle_name = $_POST['mname'];
      $student->last_name = $_POST['lname'];
      $student->birthdate = $_POST['birthdate'];
      $student->address = $_POST['address'];
      $student->course = $_POST['course'];

      // Attempt to create a new student record
      if ($student->create()) {
          echo "<p>Student was enrolled successfully!</p>";
      } else {
          echo "<p>Unable to enroll student. Please try again later.</p>";
      }
  }
  ?>
</body>
</html>
