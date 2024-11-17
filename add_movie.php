<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movieId'];
    $title = $_POST['title'];
    $director = $_POST['director'];
    $releaseDate = $_POST['releaseDate'];
    $genre = $_POST['genre'];
    $characters = isset($_POST['characters']) ? implode(", ", $_POST['characters']) : '';

    $stmt = $conn->prepare("INSERT INTO movies (movie_id, title, director, release_date, genre, characters) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $movieId, $title, $director, $releaseDate, $genre, $characters);

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
