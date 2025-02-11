<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
        /* ======== RESET STYLE ======== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: url('<?= base_url('public/img/111.jpg')?>');
            color: #333;
            text-align: center;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        /* ======== CONTAINER ======== */
        .container {
            max-width: 800px;
            margin: auto;
        }

        /* ======== FORM STYLING ======== */
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        /* ======== TABLE STYLING ======== */
        .table-container {
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

        /* ======== ACTION BUTTONS ======== */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            transition: 0.3s;
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

        /* ======== RESPONSIVE STYLING ======== */
        @media (max-width: 600px) {
            .form-container {
                width: 100%;
            }

            table {
                font-size: 14px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tambah Peminjaman</h2>

        <!-- Menampilkan Notifikasi Flashdata -->
        <?php if (session()->getFlashdata('success')): ?>
            <div style="color: green; font-weight: bold;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: red; font-weight: bold;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <form action="<?= base_url('loans/store') ?>" method="POST">
                <?= csrf_field(); ?> <!-- Token keamanan CSRF -->
                <label for="book_id">Buku</label>
                <select name="book_id" id="book_id" required>
                    <option></option>
                    <?php foreach ($books as $b): ?>
                        <option value="<?= $b['id_book'] ?>"><?= $b['title'] ?></option>
                    <?php endforeach ?>
                </select>

                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" required>
                    <option></option>
                    <?php foreach ($customers as $c): ?>
                        <option value="<?= $c['id_customer'] ?>"><?= $c['name'] ?></option>
                    <?php endforeach ?>
                </select>

                <label for="loan_date">Tanggal Pinjam</label>
                <input type="date" name="loan_date" id="loan_date" required>

                <label for="return_date">Tanggal Kembali</label>
                <input type="date" name="return_date" id="return_date" required>

                <button type="submit">Simpan Data</button>
            </form>
        </div>

        <h2>Daftar Peminjaman</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>Buku</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
                <?php if (!empty($loans)): ?>
                    <?php foreach ($loans as $loan): ?>
                        <tr>
                            <td><?= esc($loan['book_title']); ?></td>
                            <td><?= esc($loan['customer_name']); ?></td>
                            <td><?= esc($loan['loan_date']); ?></td>
                            <td><?= esc($loan['return_date']); ?></td>
                            <td class="action-buttons">
                                <a href="<?= base_url('loans/edit/' . $loan['id']); ?>" class="edit">Edit</a>
                                <a href="<?= base_url('loans/delete/' . $loan['id']); ?>" class="delete"
                                    onclick="return confirm('Hapus peminjaman ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">Tidak ada data peminjaman.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

</body>

</html>
