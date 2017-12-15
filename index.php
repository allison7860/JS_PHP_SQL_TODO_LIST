<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>To Do List</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <h2>To Do List</h2>
        </header>
        <div class="submission">
            <label for="name">Name Item: </label>
            <input type="text" name="name" id="name">
            <label for="date">Date Item: </label>
            <input type="date" name="date" id="date">
            <label for="description">Description Item:</label>
            <textarea name="description" id="description"></textarea>
            <input type="submit" name="submit" id="submit" value="Add">
        </div>
        <section></section>
    </div> <!-- end of wrapper -->
</body>
</html>