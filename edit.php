<?php
$connection = new mysqli("localhost", "root", "", "library");
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published_year = $_POST['published_year'];

    $connection->query("UPDATE books SET title='$title', author='$author', genre='$genre', published_year='$published_year' WHERE id=$id");
    header("Location: index.php");
}

$result = $connection->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <input type="text" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required placeholder="Book Title">
        <input type="text" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required placeholder="Author">
        <input type="text" name="genre" value="<?php echo htmlspecialchars($book['genre']); ?>" placeholder="Genre">
        <input type="number" name="published_year" value="<?php echo htmlspecialchars($book['published_year']); ?>" min="1900" max="2100" placeholder="Published Year">
        <input type="submit" value="Update Book">
    </form>
</body>
</html>

<?php
$connection->close();
?>
