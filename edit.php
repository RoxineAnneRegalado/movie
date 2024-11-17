<?php
include 'db.php';

if (isset($_GET['id'])) {
    $movieId = $_GET['id'];
    $result = $conn->query("SELECT * FROM movies WHERE movie_id = '$movieId'");
    $movie = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movieId'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $releaseDate = $_POST['releaseDate'];
    $genre = $_POST['genre'];
    $characters = isset($_POST['characters']) ? implode(", ", $_POST['characters']) : '';

    $stmt = $conn->prepare("UPDATE movies SET title=?, director=?, release_date=?, genre=?, characters=? WHERE movie_id=?");
    $stmt->bind_param("ssssss", $title, $director, $releaseDate, $genre, $characters, $movieId);

    if ($stmt->execute()) {
        header("Location: movie_table.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
</head>
<body>
    <form method="POST" action="">
        <h2>Edit Movie</h2>
        <label for="movieId">Movie ID</label>
        <input type="text" id="movieId" name="movieId" value="<?= htmlspecialchars($movie['movie_id']) ?>" readonly><br><br>

        <label for="title">Movie Title</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($movie['title']) ?>" required><br><br>

        <label for="director">Director</label>
        <input type="text" id="director" name="director" value="<?= htmlspecialchars($movie['director']) ?>" required><br><br>

        <label for="releaseDate">Release Date</label>
        <input type="date" id="releaseDate" name="releaseDate" value="<?= htmlspecialchars($movie['release_date']) ?>" required><br><br>

        <label for="genre">Genre</label>
        <select id="genre" name="genre" required>
            <option value="Comedy" <?= $movie['genre'] === 'Comedy' ? 'selected' : '' ?>>Comedy</option>
            <option value="Drama" <?= $movie['genre'] === 'Drama' ? 'selected' : '' ?>>Drama</option>
            <option value="Fantasy" <?= $movie['genre'] === 'Fantasy' ? 'selected' : '' ?>>Fantasy</option>
            <option value="Action" <?= $movie['genre'] === 'Action' ? 'selected' : '' ?>>Action</option>
            <option value="Science-Fiction" <?= $movie['genre'] === 'Science-Fiction' ? 'selected' : '' ?>>Science-Fiction</option>
        </select><br><br>

        <label for="characters">Characters</label>
        <textarea id="characters" name="characters[]" rows="4"><?= htmlspecialchars($movie['characters']) ?></textarea><br><br>

        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
