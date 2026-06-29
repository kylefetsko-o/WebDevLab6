<?php
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', 'tcp://127.0.0.1:6379');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Bookie Bookstore</title>
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

  <?php if (isset($_SESSION['first_name'])): ?>
  <span class="login">Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</span>
  <?php else: ?>
  <a class="login" href="login.php">Login</a>
  <?php endif; ?>
  <a href="#" class="cart">🛒 3</a>
</div>

<div id="product-hero" class="image-frame rounded soft-shadow fade-in" style="margin:16px 0; text-align:center;">
  <a id="hero-link" href="#"><img id="hero-img" src="images/book1.jpg" alt="Featured book" style="max-height:320px; width:auto; display:inline-block;"></a>
</div>

<h1>Welcome to Bookie Bookstore</h1>
<p>We sell new books and let you read public domain books online.</p>

<a href="category.php" class="shopbtn">Shop Now</a>

<h2>Browse Categories</h2>

<div class="cat">
  <a href="category.php"><img src="images/cat-fiction.jpg"></a>
  <p>Fiction</p>
</div>

<div class="cat">
  <a href="category.php"><img src="images/cat-mystery.jpg"></a>
  <p>Mystery</p>
</div>

<div class="cat">
  <a href="category.php"><img src="images/cat-children.jpg"></a>
  <p>Children's</p>
</div>

<div class="cat">
  <a href="category.php"><img src="images/cat-history.jpg"></a>
  <p>History</p>
</div>

<div class="footer">
  <p>© 2026 Bookie Bookstore</p>
  <a href="#">Contact</a> | <a href="#">Directions</a> | <a href="#">Facebook</a> | <a href="#">Instagram</a>
</div>

</div>

</div>

<script src="bookstore.js"></script>
</body>
</html>
