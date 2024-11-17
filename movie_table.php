<?php
include 'db.php';

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movie List</title>
</head>
<body>
    <div class="container">
        <table id="movieTable">
            <h2>Movie List</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie Title</th>
                    <th>Director</th>
                    <th>Release Date</th>
                    <th>Genre</th>
                    <th>Characters</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['movie_id']) ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['director']) ?></td>
                    <td><?= htmlspecialchars($row['release_date']) ?></td>
                    <td><?= htmlspecialchars($row['genre']) ?></td>
                    <td><?= htmlspecialchars($row['characters']) ?></td>
                    <td>
                        <a href="edit_movie.php?id=<?= $row['movie_id'] ?>" class="edit-btn">Edit</a>
                        <a href="delete_movie.php?id=<?= $row['movie_id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
