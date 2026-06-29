<?php
$error = "";

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "bookie", "bookie123", "bookie_bookstore");
    if (!$conn) {
        die("Could not connect to the database.");
    }

    $stmt = mysqli_prepare($conn, "SELECT customer_id, first_name FROM Customer WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $first);
        mysqli_stmt_fetch($stmt);

        ini_set('session.save_handler', 'redis');
        ini_set('session.save_path', 'tcp://127.0.0.1:6379');
        session_start();

        $_SESSION['customer_id'] = $id;
        $_SESSION['first_name'] = $first;

        setcookie('bookie_user', $first, time() + 60 * 60 * 24 * 30, '/');

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('Location: welcome.php');
        exit;
    } else {
        $error = "Incorrect email or password.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - Bookie Bookstore</title>
<link rel="stylesheet" href="bookstore_style.css">
</head>
<body>

<div class="page">

<div class="header">
  <a href="welcome.php" class="home"><img src="images/logo.jpg"><span class="logo">Bookie Bookstore</span></a>

  <div class="dropdown">
    <button>📚 Categories</button>
    <div class="dropdown-content">
      <a href="category.php">Fiction</a>
      <a href="category.php">Mystery</a>
      <a href="category.php">Children's</a>
      <a href="category.php">History</a>
      <a href="category.php">New Releases</a>
    </div>
  </div>

  <span class="search">
    <input type="text" placeholder="Search">
    <button>🔍</button>
  </span>

  <a class="login" href="login.php">Login</a>
  <a href="#" class="cart">🛒 0</a>
</div>

<h2>Login</h2>

<?php if ($error != "") { ?>
<p style="color: maroon; font-weight: 600;"><?php echo htmlspecialchars($error); ?></p>
<?php } ?>

<form method="post" action="login.php">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="you@example.com">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
  </div>

  <div class="form-actions">
    <button type="submit">Login</button>
    <a href="create_account.php" class="shopbtn">Create Account</a>
  </div>
</form>

<div class="footer">
  <p>© 2026 Bookie Bookstore</p>
</div>

</div>

<script src="bookstore.js"></script>
</body>
</html>
