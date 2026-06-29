<!DOCTYPE html>
<html>
<head>
<title>Bookie Bookstore - Fiction</title>
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
  <a href="#" class="cart">🛒 3</a>
</div>

<div class="catnav">
  <a href="#" class="active">Fiction</a>
  <a href="#">Mystery</a>
  <a href="#">Children's</a>
  <a href="#">History</a>
  <a href="#">New Releases</a>
</div>

<h2>Fiction</h2>

<div class="book">
  <div class="bookimg">
    <img src="images/book1.jpg">
    <a href="#" class="readnow">Read Now</a>
  </div>
  <h3>The Great Gatsby</h3>
  <p>F. Scott Fitzgerald</p>
  <p>$14.99</p>
  <button>Add to Cart</button>
</div>

<div class="book">
  <div class="bookimg">
    <img src="images/book2.jpg">
  </div>
  <h3>The Hobbit</h3>
  <p>J.R.R. Tolkein</p>
  <p>$12.50</p>
  <button>Add to Cart</button>
</div>

<div class="book">
  <div class="bookimg">
    <img src="images/book3.jpg">
    <a href="#" class="readnow">Read Now</a>
  </div>
  <h3>Paradox</h3>
  <p>Margarita Perez</p>
  <p>$16.00</p>
  <button>Add to Cart</button>
</div>

<div class="book">
  <div class="bookimg">
    <img src="images/book4.jpg">
  </div>
  <h3>Harry Potter and the Deathly Hallows</h3>
  <p>J.K. Rowling</p>
  <p>$13.25</p>
  <button>Add to Cart</button>
</div>

<div class="footer">
  <p>© 2026 Bookie Bookstore</p>
  <a href="#">Contact</a> | <a href="#">Directions</a> | <a href="#">Facebook</a> | <a href="#">Instagram</a>
</div>

</div>

<script src="bookstore.js"></script>

</body>
</html>
