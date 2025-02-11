<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah & Daftar Peminjaman</title>
    <style>
        /* Gaya Umum */
        body {
            font-family: 'Arial', sans-serif;
            background: url('<?= base_url('public/img/loan.jpg')?>');
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        /* Gaya Form */
        .form-container {
            width: 40%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        input,
        button {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        /* Gaya Tabel */
        .table-container {
            width: 80%;
            margin: 20px auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Tombol Aksi */
        .action-buttons a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            margin: 2px;
            display: inline-block;
        }

        .edit {
            background-color: #ffc107;
            color: black;
        }

        .delete {
            background-color: #dc3545;
            color: white;
        }

        .edit:hover {
            background-color: #e0a800;
        }

        .delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <h2>Tambah Peminjaman</h2>

    <!-- Menampilkan Notifikasi Flashdata -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div style="color: green; font-weight: bold;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div style="color: red; font-weight: bold;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <form action="<?= base_url('loans/store') ?>" method="POST">
            <?= csrf_field(); ?>  <!-- Token keamanan CSRF -->
            <input type="number" name="book_id" placeholder="ID Buku" required>
            <input type="number" name="customer_id" placeholder="ID Pelanggan" required>
            <input type="date" name="loan_date" placeholder="Tanggal Pinjam" required>
            <input type="date" name="return_date" placeholder="Tanggal Kembali" required>
            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <h2>Daftar Peminjaman</h2>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>ID Buku</th>
                <th>ID Pelanggan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($loans)) : ?>
                <?php foreach ($loans as $loan) : ?>
                    <tr>
                        <td><?= esc($loan['id']); ?></td>
                        <td><?= esc($loan['book_id']); ?></td>
                        <td><?= esc($loan['customer_id']); ?></td>
                        <td><?= esc($loan['loan_date']); ?></td>
                        <td><?= esc($loan['return_date']); ?></td>
                        <td>
                            <a href="<?= base_url('loans/edit/' . $loan['id']); ?>" class="edit">Edit</a>
                            <a href="<?= base_url('loans/delete/' . $loan['id']); ?>" class="delete" onclick="return confirm('Hapus peminjaman ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align:center;">Tidak ada data peminjaman.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</body>

</html>
