<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }

        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
        }

        input,
        button {
            padding: 10px;
            margin: 10px;
            width: 80%;
        }

        button {
            background-color: #ffc107;
            color: black;
            border: none;
        }
    </style>
</head>

<body>
    <h2>Edit Buku</h2>
    <form method="post" action="<?= base_url('book/update/' . $book['id']) ?>">
        <input type="text" name="title" value="<?= $book['title']; ?>" required>
        <input type="text" name="author" value="<?= $book['author']; ?>" required>
        <input type="number" name="published_year" value="<?= $book['published_year']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>