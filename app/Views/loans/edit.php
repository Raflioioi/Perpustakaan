<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
</head>
<body>

<h2>Edit Peminjaman</h2>
<a href="<?= base_url('/loans'); ?>">Kembali</a>

<form action="<?= base_url('/loans/update/' . $loan['id']); ?>" method="post">
    <label for="book_id">Pilih Buku:</label>
    <select name="book_id" required>
        <?php foreach ($books as $book): ?>
            <option value="<?= $book['id_book']; ?>" <?= $loan['book_id'] == $book['id_book'] ? 'selected' : ''; ?>><?= $book['title']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="customer_id">Pilih Peminjam:</label>
    <select name="customer_id" required>
        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id_customer']; ?>" <?= $loan['customer_id'] == $customer['id_customer'] ? 'selected' : ''; ?>><?= $customer['name']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="loan_date">Tanggal Pinjam:</label>
    <input type="date" name="loan_date" value="<?= $loan['loan_date']; ?>" required>

    <label for="return_date">Tanggal Kembali:</label>
    <input type="date" name="return_date" value="<?= $loan['return_date']; ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>
