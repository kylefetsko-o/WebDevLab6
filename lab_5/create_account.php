<?php
$first = "";
$last = "";
$phone = "";
$email = "";
$address = "";
$birthdate = "";
$errors = array();
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = trim($_POST["first"]);
    $last = trim($_POST["last"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $birthdate = trim($_POST["birthdate"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if (strlen($first) < 2) {
        $errors[] = "Please enter your first name.";
    }
    if (strlen($last) < 2) {
        $errors[] = "Please enter your last name.";
    }

    $digits = preg_replace("/\D/", "", $phone);
    if (strlen($digits) < 10) {
        $errors[] = "Please enter a valid phone number.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (strlen($address) < 5) {
        $errors[] = "Please enter your address.";
    }

    if ($birthdate == "") {
        $errors[] = "Please enter your birthdate.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password != $password2) {
        $errors[] = "Passwords do not match.";
    }

    $conn = mysqli_connect("localhost", "root", "", "bookie_bookstore");
    if (!$conn) {
        die("Could not connect to the database.");
    }

    if (count($errors) == 0) {
        $check = mysqli_prepare($conn, "SELECT customer_id FROM Customer WHERE email = ?");
        mysqli_stmt_bind_param($check, "s", $email);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);
        if (mysqli_stmt_num_rows($check) > 0) {
            $errors[] = "An account with that email already exists.";
        }
        mysqli_stmt_close($check);
    }

    if (count($errors) == 0) {
        $stmt = mysqli_prepare($conn, "INSERT INTO Customer (last_name, first_name, phone_number, email, password, address, birthdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $last, $first, $phone, $email, $password, $address, $birthdate);
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
        } else {
            $errors[] = "Something went wrong while saving your account. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}

function show($value) {
    return htmlspecialchars($value);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Account - Bookie Bookstore</title>
<link rel="stylesheet" href="bookstore_style.css">
</head>
<body>

<div class="page">

<div class="header">
  <a href="Welcome.html" class="home"><img src="images/logo.jpg"><span class="logo">Bookie Bookstore</span></a>

  <div class="dropdown">
    <button>📚 Categories</button>
    <div class="dropdown-content">
      <a href="Category.html">Fiction</a>
      <a href="Category.html">Mystery</a>
      <a href="Category.html">Children's</a>
      <a href="Category.html">History</a>
      <a href="Category.html">New Releases</a>
    </div>
  </div>

  <span class="search">
    <input type="text" placeholder="Search">
    <button>🔍</button>
  </span>

  <button class="login">Login</button>
  <a href="#" class="cart">🛒 0</a>
</div>

<?php if ($success) { ?>

<h2>Account Created</h2>
<p>Welcome, <?php echo show($first); ?>! Your account has been created successfully.</p>
<div class="form-actions">
  <a href="Welcome.html" class="shopbtn">Back to Home</a>
</div>

<?php } else { ?>

<h2>Create an Account</h2>

<?php if (count($errors) > 0) { ?>
<div style="margin-bottom:16px; color:maroon;">
  <p style="color:maroon; font-weight:700;">Please fix the following:</p>
  <ul>
    <?php foreach ($errors as $error) { ?>
      <li><?php echo show($error); ?></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>

<form id="create-form" method="post" action="create_account.php">
  <div class="form-group">
    <label for="first">First Name</label>
    <input type="text" id="first" name="first" placeholder="First name" value="<?php echo show($first); ?>">
  </div>
  <div class="form-group">
    <label for="last">Last Name</label>
    <input type="text" id="last" name="last" placeholder="Last name" value="<?php echo show($last); ?>">
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="(555) 555-5555" value="<?php echo show($phone); ?>">
  </div>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="you@example.com" value="<?php echo show($email); ?>">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Street, City, State" value="<?php echo show($address); ?>">
  </div>
  <div class="form-group">
    <label for="birthdate">Birthdate</label>
    <input type="date" id="birthdate" name="birthdate" value="<?php echo show($birthdate); ?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="password2">Confirm Password</label>
    <input type="password" id="password2" name="password2">
  </div>

  <div class="form-actions">
    <button type="submit">Create Account</button>
    <a href="Welcome.html" class="shopbtn">Back to Home</a>
  </div>
</form>

<?php } ?>

<div class="footer">
  <p>© 2026 Bookie Bookstore</p>
</div>

</div>

<script src="bookstore.js"></script>
</body>
</html>
