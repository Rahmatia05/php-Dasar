<?php
    session_start();

    
    if (!isset($_SESSION['login'])) {
        if ($_SESSION['login'] != true) {
            header("Location: login.php");
            exit;
        }
    }
    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

    $Nim = $_GET['nim'];
    $mahasiswa = $mysqli->query("SELECT * FROM mahasiswa WHERE nim='$Nim'");
    $data = $mahasiswa->fetch_assoc();

    $program_studi = $mysqli->query("SELECT * FROM program_study");

    if (isset($_POST['nama'])) {
        $Nama = $_POST['nama'];
        $program_studi = $_POST['name'];

        $update = $mysqli->query("UPDATE mahasiswa SET nama='$Nama', noo=$program_studi WHERE nim='$Nim'");

        if($update) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Diubah';
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
    <title>Edit Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 text-align="center" >From Edit Mahasiswa</h1>
    <form method ="POST">
        <div class ="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim']?>" disabled>
        </div> 
        <div class ="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']?>">
        </div>
        <div class ="mb-3">
            <label for="name" class="form-label">Prodi</label>
            <select class="form-select" id="name" name="name">
            <?php while ($row = $program_studi->fetch_assoc()) { ?>
                <option value="<?= $row['no'] ?>" <?= $row['no'] == $data['no'] ? 'selected' : '' ?>><?= $row['name']?></option>
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
