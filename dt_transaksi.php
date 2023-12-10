<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyewaan DVD</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="container mt-3">
        <h3 style="color: white;"> Tabel Detail Transaksi </h3>

<!-- Form Tambah Detail Transaksi -->
<form action="" method="post">
    <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
        <tr>
            <td width="130">id_dt_transaksi</td>
            <td><input type="text" name="id_dt_transaksi"></td>
        </tr>
        <tr>
            <td width="130">id_transaksi</td>
            <td><input type="text" name="id_transaksi"></td>
        </tr>
        <tr>
            <td width="130">id_barang</td>
            <td>
                <?php
                include "koneksi.php";
                $query_harga_barang = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga_sewa FROM tb_barang");
                ?>
                <select name="id_barang">
                    <?php while ($data_harga_barang = mysqli_fetch_array($query_harga_barang)) : ?>
                        <option value="<?php echo $data_harga_barang['id_barang']; ?>">
                            <?php echo $data_harga_barang['nama_barang'] . ' - ' . $data_harga_barang['harga_sewa']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="130">jumlah_sewa</td>
            <td><input type="text" name="jumlah_sewa"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" name="proses" class="btn btn-success"></td>
        </tr>
    </table>
</form>

<?php
include "koneksi.php";

// Proses penambahan data detail transaksi
if (isset($_POST['proses'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $jumlah_sewa = $_POST['jumlah_sewa'];

    // Ambil harga_sewa dari tb_barang
    $query_harga_sewa = mysqli_query($koneksi, "SELECT harga_sewa FROM tb_barang WHERE id_barang = $id_barang");
    $data_harga_sewa = mysqli_fetch_array($query_harga_sewa);
    $harga_sewa = $data_harga_sewa['harga_sewa'];

    // Hitung total_harga
    $total_harga = $jumlah_sewa * $harga_sewa;

    // Insert data ke tb_dt_transaksi
    mysqli_query($koneksi, "INSERT INTO tb_dt_transaksi SET
        id_transaksi = '$id_transaksi',
        id_barang = '$id_barang',
        jumlah_sewa = '$jumlah_sewa',
        total_harga = '$total_harga'");
}
?>


        <!-- Menampilkan data Detail Transaksi -->
        <?php
        include "koneksi.php";
        // Menampilkan data detail transaksi
        echo '<h3 style="color: white;">Data Detail Transaksi</h3>';
        echo "<table class='table table-bordered' style='background-color: rgba(108, 117, 125, 0.5); color: white;'>
        <tr>
            <th>id_dt_transaksi</th>
            <th>id_transaksi</th>
            <th>id_barang</th>
            <th>jumlah_sewa</th>
            <th>total_harga</th>
            <th>Aksi</th>
        </tr>";

        $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_dt_transaksi");
        while ($tampil = mysqli_fetch_array($ambildata)) {
            echo "
            <tr id='row_{$tampil['id_dt_transaksi']}'>
                <td>{$tampil['id_dt_transaksi']}</td>
                <td>{$tampil['id_transaksi']}</td>
                <td>{$tampil['id_barang']}</td>
                <td>{$tampil['jumlah_sewa']}</td>
                <td>{$tampil['total_harga']}</td>
                <td>
                    <a href='dt_transaksi.php?edit={$tampil['id_dt_transaksi']}' class='btn btn-primary'>Edit</a>
                    <form method='post' action='' style='display:inline;'>
                        <input type='hidden' name='hapus_id' value='{$tampil['id_dt_transaksi']}'>
                        <button type='submit' class='btn btn-danger'>Hapus</button>
                    </form>
                </td>
            </tr>";
        }
        echo "</table>";
        ?>

        <!-- Proses Penghapusan Data Detail Transaksi -->
        <?php
        include "koneksi.php";
        // Proses penghapusan data detail transaksi
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_id'])) {
            $id_dt_transaksi_hapus = $_POST['hapus_id'];
            $query_hapus_dt_transaksi = "DELETE FROM tb_dt_transaksi WHERE id_dt_transaksi = $id_dt_transaksi_hapus";
            $hasil_hapus_dt_transaksi = mysqli_query($koneksi, $query_hapus_dt_transaksi);
        }
        ?>

        <!-- Form Edit Detail Transaksi -->
        <h3 style="color : white"> Form Edit Detail Transaksi </h3>
        <form action="" method="post">
            <?php
            if (isset($_GET['edit'])) {
                $id_dt_transaksi_edit = $_GET['edit'];
                $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_dt_transaksi WHERE id_dt_transaksi = $id_dt_transaksi_edit");
                $data_edit = mysqli_fetch_array($query_edit);
            ?>
                <table class="table table-bordered" style="background-color: rgba(108, 117, 125, 0.5); color: white;">
                    <tr>
                        <td width="130">id_dt_transaksi</td>
                        <td><input type="text" name="id_dt_transaksi_edit" value="<?php echo $data_edit['id_dt_transaksi']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td width="130">id_transaksi</td>
                        <td><input type="text" name="id_transaksi_edit" value="<?php echo $data_edit['id_transaksi']; ?>"></td>
                    </tr>
                    <tr>
                        <td width="130">id_barang</td>
                        <td><input type="text" name="id_barang_edit" value="<?php echo $data_edit['id_barang']; ?>"></td>
                    </tr>
                    <tr>
                        <td width="130">jumlah_sewa</td>
                        <td><input type="text" name="jumlah_sewa_edit" value="<?php echo $data_edit['jumlah_sewa']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="proses_edit" class='btn btn-warning'></td>
                    </tr>
                </table>
            <?php } ?>
        </form>

        <!-- Logika Edit Data Detail Transaksi -->
        <?php
        if (isset($_POST['proses_edit'])) {
            $id_dt_transaksi_edit = $_POST['id_dt_transaksi_edit'];
            $id_transaksi_edit = $_POST['id_transaksi_edit'];
            $id_barang_edit = $_POST['id_barang_edit'];
            $jumlah_sewa_edit = $_POST['jumlah_sewa_edit'];

            // Lakukan validasi dan sanitasi input jika diperlukan

            $query_update_dt_transaksi = "UPDATE tb_dt_transaksi SET
                            id_transaksi = '$id_transaksi_edit',
                            id_barang = '$id_barang_edit',
                            jumlah_sewa = '$jumlah_sewa_edit'
                            WHERE id_dt_transaksi = $id_dt_transaksi_edit";

            $hasil_update_dt_transaksi = mysqli_query($koneksi, $query_update_dt_transaksi);

            if ($hasil_update_dt_transaksi) {
                echo '<p style="color:white;">Data berhasil diupdate.</p>';
            } else {
                echo "Gagal mengupdate data Detail Transaksi: " . mysqli_error($koneksi);
            }
        }
        ?>
    </div>

</body>

</html>
