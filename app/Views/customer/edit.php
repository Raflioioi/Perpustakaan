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
    <h2>Edit Customer</h2>
    <form method="post" action="<?= base_url('customers/update/' . $customer['id_customer']) ?>">
        <input type="text" name="name" value="<?= $customer['name']; ?>" required>
        <input type="text" name="email" value="<?= $customer['email']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>