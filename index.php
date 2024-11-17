<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Add Movie</title>
<style>
    #charactersContainer label {
        display: inline-block;
        width: 120px;
        margin-right: 322px;
        vertical-align: top;
        text-align: left;
        font-family: "Tempus Sans ITC";
    }

    #characterName, .character-input {
        width: calc(95% - 110px);
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #addCharacterBtn {
        display: inline-block;
        width: 100px;
        background-color: #ff0000;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    #addCharacterBtn:hover {
        background-color: green;
    }

    /* Focus effect for input fields */
    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus {
        outline: none;
        border-color: #ff5722;
        box-shadow: 0 0 10px rgba(255, 87, 34, 0.5);
        background-color: #e0f7fa;
    }

    /* Animation for the placeholder text */
    input[type="text"]:focus::placeholder,
    input[type="date"]:focus::placeholder,
    select:focus::placeholder {
        transition: all 0.3s ease-in-out;
        transform: translateY(-30px);
        opacity: 0;
    }

    input[type="text"]::placeholder,
    input[type="date"]::placeholder,
    select::placeholder {
        transition: all 0.3s ease-in-out;
    }

    /* New CSS classes for text style changes */
    .input-style {
        font-family: "Bradley Hand ITC";
        font-size: 1.2em;
        color: #ff5722;
        font-weight: bold;
    }

    ::placeholder {
        font-family: "Bradley Hand ITC";
        color: black;
        font-weight: bold;
    }

</style>
</head>
<body>
    <form id="movieForm" method="POST" action="add_movie.php">
        <h2>
            <p><span class="add-text">ADD</span><span class="movie-text"> MOVIE</span></p>
        </h2>
        <label for="title">Movie ID</label>
        <input type="text" id="movieId" name="movieId" placeholder="Movie ID" required><br><br>
        <label for="title">Movie Title</label>
        <input type="text" id="title" name="title" placeholder="Enter Movie Title" required><br><br>
        <label for="director">Director</label>
        <input type="text" id="director" name="director" placeholder="Enter Director Name" required><br><br>
        <label for="releaseDate">Release Date</label>
        <input type="date" id="releaseDate" name="releaseDate" required><br><br>
        <label for="genre">Genre</label>
        <select id="genre" name="genre" required>
            <option value="">Select Genre</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Action">Action</option>
            <option value="Science-Fiction">Science-Fiction</option>
        </select><br><br>
        <div id="charactersContainer">
            <label>Characters</label>
            <input type="text" id="characterName" name="characters[]" placeholder="Enter Character name" required>
            <button type="button" id="addCharacterBtn">Add</button>
        </div>
        <input type="submit" value="Add Movie" class="button">
    </form>
    <script>
        function changeToUpperCase(event) {
            event.target.value = event.target.value.toUpperCase();
        }

        function addStyleClass(event) {
            event.target.classList.add('input-style');
        }

        document.getElementById('addCharacterBtn').addEventListener('click', function () {
            const container = document.getElementById('charactersContainer');
            
            const characterInput = document.createElement('input');
            characterInput.type = 'text';
            characterInput.name = 'characters[]';
            characterInput.placeholder = 'Enter Character Name';
            characterInput.required = true;
            characterInput.className = 'character-input';
            characterInput.style.width = 'calc(116% - 110px)';
            characterInput.style.padding = '8px';
            characterInput.style.marginBottom = '16px';
            characterInput.style.border = '1px solid #ccc';
            characterInput.style.borderRadius = '4px';
            characterInput.style.boxSizing = 'border-box';
            
            characterInput.addEventListener('input', changeToUpperCase);
            characterInput.addEventListener('input', addStyleClass);

            container.appendChild(characterInput);
        });

        document.getElementById('characterName').addEventListener('input', changeToUpperCase);
        document.getElementById('characterName').addEventListener('input', addStyleClass);

        document.getElementById('movieId').addEventListener('input', changeToUpperCase);
        document.getElementById('movieId').addEventListener('input', addStyleClass);
        document.getElementById('title').addEventListener('input', changeToUpperCase);
        document.getElementById('title').addEventListener('input', addStyleClass);
        document.getElementById('director').addEventListener('input', changeToUpperCase);
        document.getElementById('director').addEventListener('input', addStyleClass);
    </script>
</body>
</html>
