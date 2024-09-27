<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dosen = $_POST['nama_dosen'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin']; // Mengambil value dari select option
    $mata_kuliah = $_POST['mata_kuliah'];
    $email = $_POST['email'];

    // Query untuk insert data ke database
    $sql = "INSERT INTO data_dosen (nama_dosen, nip, jenis_kelamin, mata_kuliah, email) 
            VALUES ('$nama_dosen', '$nip', '$jenis_kelamin', '$mata_kuliah', '$email')";

    // Mengeksekusi query dan cek apakah berhasil
    if ($connection->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect ke halaman index jika berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error; // Tampilkan error jika terjadi kesalahan
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Dosen</h1>
        <form method="POST" class="mx-auto w-50">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" name="nip" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
