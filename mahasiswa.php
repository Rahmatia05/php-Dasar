<?php

    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');
    $result = $mysqli->query("SELECT student.nim, student.nama, program_study.name
    FROM student INNER JOIN program_study ON student.id = program_study.noo");

   $student = [];

    while ($row = $result->fetch_assoc()) {
        array_push($student, $row);
    }

    $no = 1
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container"> 
    <h1 class="text-center">Data Mahasiswa KA 2021</h1>
    <a href="tambah_mahasiswa.php" class="btn btn-primary">Add</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
        </tr>
        <?php foreach ($student as $row ) { ?>
            <tr>
                <td><?=$no++; ?></td>
                <td><?=$row['nim'];?></td>
                <td><?=$row['nama'];?></td>
                <td><?=$row['name'];?></td> 
            </tr>
        <?php } ?>
    </table>  
    </div>
</body>
</html>
