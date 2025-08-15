<?php
// Your PayPal business email
$paypalEmail = "YOUR_PAYPAL_EMAIL@example.com";

// Array of books for sale (title, price)
$books = [
    ["title" => "The Art of Learning", "price" => 15.99],
    ["title" => "Mystery of the Mind", "price" => 9.50],
    ["title" => "Science Wonders", "price" => 12.00],
    ["title" => "Children's Stories", "price" => 8.25],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Book Shop</title>
<style>
  body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; }
  .book { border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
  .book h2 { margin: 0 0 10px; }
  form input[type="submit"] {
    background: #0070ba; color: white; border: none; padding: 10px 18px;
    border-radius: 5px; font-weight: bold; cursor: pointer;
  }
  form input[type="submit"]:hover {
    background: #004c8c;
  }
</style>
</head>
<body>

<h1>Book Shop</h1>

<?php foreach ($books as $book): ?>
  <div class="book">
    <h2><?php echo htmlspecialchars($book['title']); ?></h2>
    <p>Price: $<?php echo number_format($book['price'], 2); ?></p>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
      <input type="hidden" name="business" value="<?php echo htmlspecialchars($paypalEmail); ?>">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($book['title']); ?>">
      <input type="hidden" name="amount" value="<?php echo number_format($book['price'], 2); ?>">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="return" value="https://yourwebsite.com/thank-you.html">
      <input type="submit" value="Buy Now">
    </form>
  </div>
<?php endforeach; ?>
<?php
$paypalEmail = "YOUR_PAYPAL_EMAIL@example.com";

// Define books info with keys (IDs) matching URL params
$books = [
    "art-of-learning" => ["title" => "The Art of Learning", "price" => 15.99],
    "mystery-mind" => ["title" => "Mystery of the Mind", "price" => 9.50],
    "science-wonders" => ["title" => "Science Wonders", "price" => 12.00],
];

// Get book ID from URL, sanitize input
$bookId = $_GET['book'] ?? '';

if (!array_key_exists($bookId, $books)) {
    die("Invalid book selected.");
}

$book = $books[$bookId];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Pay for <?php echo htmlspecialchars($book['title']); ?></title>
</head>
<body>

<h1>Buy "<?php echo htmlspecialchars($book['title']); ?>"</h1>
<p>Price: $<?php echo number_format($book['price'], 2); ?></p>

<form action="https://www.paypal.com/cgi-bin/webscr" " method="post" target="_top">
  <input type="hidden" name="business" value="<?php echo htmlspecialchars($paypalEmail); ?>">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($book['title']); ?>">
  <input type="hidden" name="amount" value="<?php echo number_format($book['price'], 2); ?>">
  <input type="hidden" name="currency_code" value="USD">
  <input type="submit" value="Pay with PayPal">
</form>
<div class="book">
  <h2>The Art of Learning</h2>
  <p>Price: $15.99</p>

  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <!-- PayPal business email -->
    <input type="hidden" name="business" value="YOUR_PAYPAL_EMAIL@example.com">

    <!-- Buy Now command -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Item details -->
    <input type="hidden" name="item_name" value="The Art of Learning">
    <input type="hidden" name="amount" value="15.99">
    <input type="hidden" name="currency_code" value="USD">

    <!-- Buy Now button -->
    <input type="submit" value="Buy Now" style="background:#0070ba; color:white; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">
  </form>
</div>


</body>
</html>


</body>
</html>
