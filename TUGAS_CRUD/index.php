<?php
include 'koneksi.php';
$data = query("SELECT * FROM mahasiswa");

session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col table-responsive">
                <h2 class="text-center">Data Mahasiswa</h2>
                <a href="tambah.php" class="btn btn-primary mb-3">Input Mahasiswa</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th scope="row">NRP</th>
                            <th scope="row">Nama</th>
                            <th scope="row">Jenis Kelamin</th>
                            <th scope="row">Jurusan</th>
                            <th scope="row">Email</th>
                            <th scope="row">Alamat</th>
                            <th scope="row">No HP</th>
                            <th scope="row">Asal SMA</th>
                            <th scope="row">Matkul Favorit</th>
                            <th scope="row">Gambar</th>
                            <th scope="row">Download</th>
                            <th scope="row">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomer = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td><?php echo $nomer; ?></td>
                                <td><?php echo $row['nrp']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['jurusan']; ?></td>
                                <td><?php echo $row['email_student']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo $row['no_hp']; ?></td>
                                <td><?php echo $row['asal_sma']; ?></td>
                                <td><?php echo $row['matkul_favorit']; ?></td>
                                <td><img src="<?php echo "berkas/".$row['gambar']; ?>" width="80"></td>
                                <td>
                                    <a href="download.php?filename=<?=$row['gambar']?>" class="btn btn-success btn-sm me-2">Download</a>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['nrp']; ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['nrp']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php $nomer++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br/>
    <div class="container-logout">
        <form action="" method="POST" class="logout" style="Margin-left: 100px; Padding: 10px;">
            <div class="input-group">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        })
    </script>
</body>

</html>