<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="form-container">
      <h1 align="center">Registration Form</h1>
      <form method="post" action="../controlar/registrationAction.php" enctype="multipart/form-data" novalidate>
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea name="address" id="address" required></textarea>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="image">
          <label for="image">Profile Picture</label>
          <label for="image"><i class="fa">&#xf030;</i></label>
          <input type="file" name="image" id="image">
        </div>
        <button type="submit" name="submit">Register</button>
      </form>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
