<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan</title>
    <style>
        body {
            background-image: url('img/background5.jpg');
            background-size: cover;
        }
    </style>
</head>

<body class="light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Penyewaan DVD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Data Tabel
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="DVD.php">Tabel Barang</a></li>
                  <li><a class="dropdown-item" href="pegawai.php"> Tabel Pegawai</a></li>
                  <li><a class="dropdown-item" href="pelanggan.php">Tabel Pelanggan</a></li>
                  <li><a class="dropdown-item" href="transaksi.php"> Tabel Transaksi</a></li>
                  <li><a class="dropdown-item" href="dt_transaksi.php">Tabel Detail Transaksi</a></li>
                  <li><a class="dropdown-item" href="pengembalian.php"> Tabel Pengembalian</a></li>
 
                </ul>
              </li>
            </ul>
            <form class="d-flex" action="index.php" method="get">
            <button class="btn btn-danger" type="submit">Logout</button>
           </form>
          </div>
        </div>       
      </nav>


    <div class="container mt-3">
        <h3 style="color: white;">Tabel Pengembalian</h3>

        <!-- Form Tambah Pengembalian -->
        <form action="" method="post">
            <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
                <tr>
                    <td width="130">id_pengembalian</td>
                    <td><input type="text" name="id_pengembalian"></td>
                </tr>
                <tr>
                    <td width="130">id_dt_transaksi</td>
                    <td><input type="text" name="id_dt_transaksi"></td>
                </tr>
                <tr>
                    <td width="130">tanggal_pengembalian</td>
                    <td><input type="date" name="tanggal_pengembalian"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" name="proses_pengembalian" class="btn btn-success"></td>
                </tr>
            </table>
        </form>

        <?php
        include "koneksi.php";

        // Proses penambahan data pengembalian
        if (isset($_POST['proses_pengembalian'])) {
            $id_pengembalian = $_POST['id_pengembalian'];
            $id_dt_transaksi = $_POST['id_dt_transaksi'];
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

            $query_insert_pengembalian = "INSERT INTO tb_pengembalian (id_pengembalian, id_dt_transaksi, tanggal_pengembalian)
                        VALUES ('$id_pengembalian', '$id_dt_transaksi', '$tanggal_pengembalian')";

            if (mysqli_query($koneksi, $query_insert_pengembalian)) {
                echo "Data pengembalian berhasil disimpan";
            } else {
                echo "Error: " . $query_insert_pengembalian . "<br>" . mysqli_error($koneksi);
            }
        }
        ?>

        
        <!-- Hapus Data Pengembalian -->
        <?php
        include "koneksi.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_pengembalian_id'])) {
            $id_pengembalian_hapus = $_POST['hapus_pengembalian_id'];

            $query_hapus_pengembalian = "DELETE FROM tb_pengembalian WHERE id_pengembalian = $id_pengembalian_hapus";
            $hasil_hapus_pengembalian = mysqli_query($koneksi, $query_hapus_pengembalian);

            if ($hasil_hapus_pengembalian) {
                echo "Data pengembalian berhasil dihapus.";
            } else {
                echo "Gagal menghapus data pengembalian: " . mysqli_error($koneksi);
            }
        }
        ?>

        <!-- Menampilkan data pengembalian -->
        <h3 style="color: white;">Data Pengembalian</h3>
        <table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
            <th>id_pengembalian</th>
            <th>id_dt_transaksi</th>
            <th>tanggal_pengembalian</th>
            <th>action</th>
            <?php
            $ambildata_pengembalian = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian");

            while ($tampil_pengembalian = mysqli_fetch_array($ambildata_pengembalian)) {
                echo "
                <tr>
                    <td>{$tampil_pengembalian['id_pengembalian']}</td>
                    <td>{$tampil_pengembalian['id_dt_transaksi']}</td>
                    <td>{$tampil_pengembalian['tanggal_pengembalian']}</td>
                    <td>
                        <a href='pengembalian.php?edit_pengembalian={$tampil_pengembalian['id_pengembalian']}' class='btn btn-primary'>Edit</a>
                        <form method='post' action='' style='display:inline;'>
                            <input type='hidden' name='hapus_pengembalian_id' value='{$tampil_pengembalian['id_pengembalian']}'>
                            <button type='submit' class='btn btn-danger'>Hapus</button>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>


        <!-- Form Edit Pengembalian -->
        <h3 style="color: white;"> Form Edit Pengembalian </h3>
        <form action="" method="post">
            <?php
            if (isset($_GET['edit_pengembalian'])) {
                $id_pengembalian_edit = $_GET['edit_pengembalian'];
                $query_edit_pengembalian = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian WHERE id_pengembalian = $id_pengembalian_edit");
                $data_edit_pengembalian = mysqli_fetch_array($query_edit_pengembalian);
            ?>
                <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
                    <tr>
                        <td width="130">id_pengembalian</td>
                        <td><input type="text" name="id_pengembalian_edit" value="<?php echo $data_edit_pengembalian['id_pengembalian']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td width="130">id_dt_transaksi</td>
                        <td><input type="text" name="id_dt_transaksi_edit" value="<?php echo $data_edit_pengembalian['id_dt_transaksi']; ?>"></td>
                    </tr>
                    <tr>
                        <td width="130">tanggal_pengembalian</td>
                        <td><input type="date" name="tanggal_pengembalian_edit" value="<?php echo $data_edit_pengembalian['tanggal_pengembalian']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="proses_edit_pengembalian" class='btn btn-warning'></td>
                    </tr>
                </table>
            <?php } ?>
        </form>

        <!-- Logika Edit Data Pengembalian -->
        <?php
        if (isset($_POST['proses_edit_pengembalian'])) {
            $id_pengembalian_edit = $_POST['id_pengembalian_edit'];
            $id_dt_transaksi_edit = $_POST['id_dt_transaksi_edit'];
            $tanggal_pengembalian_edit = $_POST['tanggal_pengembalian_edit'];

            $query_update_pengembalian = "UPDATE tb_pengembalian SET
                            id_dt_transaksi = '$id_dt_transaksi_edit',
                            tanggal_pengembalian = '$tanggal_pengembalian_edit'
                            WHERE id_pengembalian = $id_pengembalian_edit";

            $hasil_update_pengembalian = mysqli_query($koneksi, $query_update_pengembalian);

            if ($hasil_update_pengembalian) {
                echo '<p style="color:white;">Data pengembalian berhasil diupdate.</p>';
            } else {
                echo "Gagal mengupdate data pengembalian: " . mysqli_error($koneksi);
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
