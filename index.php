<?php
include 'config.php';

// Query untuk mendapatkan semua data dosen
$sql = "SELECT * FROM data_dosen";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <!-- Tambahkan Bootstrap CSS melalui CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang yang lembut */
        }
        .card-header {
            background-color: #000; /* Warna header kartu */
            color: white; /* Teks putih */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h2>Data Dosen</h2>
            </div>
            <div class="card-body">
                <a href="add.php" class="btn btn-primary mb-3">Tambah Dosen</a>
                
                <!-- Tabel dengan class Bootstrap -->
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th> <!-- Nomor urut dinamis -->
                            <th>Nama Dosen</th>
                            <th>NIP</th>
                            <th>Mata Kuliah</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $no = 1; // Inisialisasi variabel nomor urut
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $no . "</td> <!-- Urutan dinamis -->
                                        <td>" . $row['nama_dosen'] . "</td>
                                        <td>" . $row['nip'] . "</td>
                                        <td>" . $row['mata_kuliah'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>
                                            <a href='edit.php?id=" . $row['id_dosen'] . "' class='btn btn-success btn-sm'>Edit</a>
                                            <a href='delete.php?id=" . $row['id_dosen'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Delete</a>
                                        </td>
                                      </tr>";
                                $no++; // Tingkatkan nilai nomor urut setiap iterasi
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS dan jQuery (jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
