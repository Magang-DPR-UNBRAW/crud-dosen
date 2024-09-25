<?php
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM data_dosen WHERE id_dosen=$id";
$result = $connection->query($sql);
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dosen = $_POST['nama_dosen'];
    $nip = $_POST['nip'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $email = $_POST['email'];

    $sql = "UPDATE data_dosen SET 
            nama_dosen='$nama_dosen', 
            nip='$nip', 
            mata_kuliah='$mata_kuliah', 
            email='$email' 
            WHERE id_dosen=$id";

    if ($connection->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Dosen</h1>
        <form method="POST" class="mx-auto w-50">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" name="nama_dosen" value="<?php echo $data['nama_dosen']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" value="<?php echo $data['mata_kuliah']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
