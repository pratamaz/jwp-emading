<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - Admin Dashboard</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">

    <div class="mt-5">
        <h1>Selamat datang, Admin!</h1>
    </div>
    
    <!-- Form Edit Artikel -->
    <div class="mt-4">
        <form action="edit_artikel.php" method="post">
            <div class="form-group">
                <label for="judul">Judul Artikel:</label>
                <input type="text" name="judul" class="form-control" value="Judul Artikel yang Akan Diedit" required>
            </div>

            <div class="form-group">
                <label for="isi">Isi Artikel:</label>
                <textarea name="isi" class="form-control" rows="4" required>Isi artikel yang akan diedit.</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="Draft">Draft</option>
                    <option value="Published" selected>Published</option>
                </select>
            </div>

            <!-- Tambahkan elemen untuk unggah gambar jika diperlukan -->

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Tampilkan gambar artikel yang sudah ada jika diperlukan -->

    <!-- Tambahkan link Bootstrap JS (JQuery dan Popper.js diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
