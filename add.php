<?php
$connection = new mysqli("localhost", "root", "", "library");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published_year = $_POST['published_year'];

    $connection->query("INSERT INTO books (title, author, genre, published_year) VALUES ('$title', '$author', '$genre', '$published_year')");
    $message = "Book added successfully!";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Book</h1>

    <?php if (isset($message)): ?>
        <div class="message success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        Title: <input type="text" name="title" required><br>
        Author: <input type="text" name="author" required><br>
        Genre: <input type="text" name="genre"><br>
        Published Year: <input type="number" name="published_year" min="1900" max="2100"><br>
        <input type="submit" value="Add Book">
    </form>
</body>
</html>

<?php
$connection->close();
?>
