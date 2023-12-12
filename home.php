<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Penyewaan</title>
    <style>
              body {
            background-image: url('img/background5.jpg');
            background-size: cover;
            backdrop-filter: blur(5px); 
        }
        .card {
            transition: transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border-radius: 60px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .section-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .card-title {
            font-size: 18px; 
        }

        .add-button {
            font-weight: bold;
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
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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

      <section class="jumbotron text-center mt-5">
        <img src="img/pp.png" alt="" width="100px" class=" rounded-circle">
        <h3 class="mt-3 text-white" font-weight= "bold" font-family ="Segoe UI"  >Selamat Datang di Sewa DVD</h3>
      </section>
    <section class="p-5 section-shadow">
        <div class="container mt-5">
            <div class="row text-center g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-warning text-light rounded">
                        <div class="card-body">
                            <img src="img/barang.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Barang</h4>
                            <a href="DVD.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-dark text-light rounded">
                        <div class="card-body">
                            <img src="img/pegawai.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Pegawai</h4>
                            <a href="pegawai.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-warning text-light rounded">
                        <div class="card-body">
                            <img src="img/pelanggan.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Pelanggan</h4>
                            <a href="pelanggan.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-dark text-light rounded">
                        <div class="card-body">
                            <img src="img/transaksi.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Transaksi</h4>
                            <a href="transaksi.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-warning text-light rounded">
                        <div class="card-body">
                            <img src="img/detail.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Detail transaksi</h4>
                            <a href="dt_transaksi.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-dark text-light rounded">
                        <div class="card-body">
                            <img src="img/pengembalian.png" width="50px" alt="Image">
                            <h4 class="card-title mb-2">Pengembalian</h4>
                            <a href="pengembalian.php" class="no-decoration btn btn-light add-button">ADD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
