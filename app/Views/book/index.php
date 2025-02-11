<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background: url('<?= base_url('public/img/perpustakaan.jpg')?>');
            background-size: cover;
            color: white;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .container {
            position: relative;
            z-index: 2;
            margin-top: 100px;
        }
        h1 {
            font-size: 36px;
        }
        .menu {
            margin: 20px;
        }
        .menu a {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            font-size: 18px;
            color: white;
            background-color: rgba(0, 123, 255, 0.8);
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .menu a:hover {
            background-color: rgba(0, 86, 179, 0.9);
        }
    </style>
</head>
<body>

    <div class="overlay"></div>

    <div class="container">
        <h1>Selamat Datang di Perpustakaan Digital</h1>
        <p>Silakan pilih menu di bawah untuk mengelola data.</p>

        <div class="menu">
            <a href="<?= base_url('/book/create')?>">📚 Master Buku</a>
            <a href="<?= base_url('/customers')?>">👥 Data Pelanggan</a>
            <a href="<?= base_url('/loans')?>">📖 Data Peminjaman</a>
        </div>
    </div>

</body>
</html>
