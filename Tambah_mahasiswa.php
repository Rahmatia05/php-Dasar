<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        if ($_SESSION['login'] != true) {
            header("Location: login.php");
            exit;
        }
    }

    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

    $program_Studi = $mysqli->query("Select * from Program_Study");
    if (isset($_POST['nim']) && isset($_POST['nama'])) {
        $Nim = $_POST['nim'];
        $Nama = $_POST['nama'];
        $Prodi = $_POST['name'];

        $insert = $mysqli->query("INSERT INTO mahasiswa(nim, nama, no) VALUES ('$Nim','$Nama','$Prodi')");
        if ($insert) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Ditambahkan';
            header("Location: mahasiwa.php");
            exit();
        }
    }
    
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 class="text-center">From Tambah Mahasiswa</h1>

    <form method ="POST">
        <div class= "mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim">
        </div>
        <div class ="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class ="mb-3">
            <label for="name" class="form-label">Prodi</label>
            <select class="form-select" id="name" name="name" required>
            <option value="">Pilih Program Studi</option>
                <?php while ($row = $program_Studi->fetch_assoc()) { ?>
                    <option value="<?= $row['noo']; ?>">
                     <?= $row['name']; ?>
                     </option>
                 <?php } ?>
                </select>
        </div>
        <div class="mt-3">
                <button type="submit" class="btn btn-primary">Sumbit</button>
                <a href="mahasiwa.php" class="btn btn-warning">Cancel</a>
         </div>
    </form>
    
</body>
</html>
