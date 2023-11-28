<?php
// Pastikan sesi sudah dimulai
session_start();

// Periksa apakah pengguna telah login
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    // Menentukan keterangan berdasarkan peran pengguna
    $keterangan = '';
    if ($user['sebagai'] === 'admin') {
        $keterangan = '' . $user['username'];
    } elseif ($user['sebagai'] === 'worker') {
        $keterangan = 'Halo, Worker ' . $user['nama_worker'];
    }

    // Output keterangan
    echo $keterangan;
} else {
    // Jika pengguna belum login, kembalikan ke halaman login
    header('Location: ../admin/login_admin.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>home Worker</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style3.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">HanzStore</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="setting_admin.php">Settings</a></li>
                    <li><a class="dropdown-item" href="add_admin.php">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../admin/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="worker_dashboard.php">
                            <img src="../image/icons8-dashboard-48.png" alt="">
                            <span class="jdl-kgonten-2">Dashboard</span>
                        </a>
                        <a class="nav-link" href="takejob.php" style=" background-color: #FF9900; height: 50px;">
                            <img src="../image/icons8-game-controller-64.png" alt="">
                            <span class="jdl-konten-2">Take Jobe</span>
                        </a>
                        <a class="nav-link" href="worker_penghasilan.php">
                            <img src="../image/report (1).png" alt="">
                            <span class="jdl-konten-2">Penghasilan</span>
                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"> 
                    <?php
if ($user['sebagai'] === 'admin') {
    echo 'Admin: ' . $user['username'];
} elseif ($user['sebagai'] === 'worker') {
    echo 'Hallo, Penjoki ' . $user['nama_lengkap'];
    
    // Ganti nilai $nik dengan id_worker
    $nik = $user['id_worker'];
    
    // Tampilkan ID Worker di bawah nama worker
    echo '<br>ID Worker: ' . $nik;
}
?>



                                        </div>
                    <!-- <p></p> -->
                    <h1> <br></h1>
                    <img src="../image/LOGO HANZJOKI.png" alt="" class="imge-23">
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Selamat Datang </h1>
                    <!-- <?php echo $email; ?> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Worker</li>
                    </ol>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Data Job
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="search-container">
                                    <label for="searchInput" class="form-label visually-hidden">Search:</label>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                            


                            <table id="datatablesSimple" class="custom-table" border="2">

                                <thead>
                                    <tr>
                                        
                                        <th>Id Transaksi</th>
                                        <th>Id Worker</th>
                                        <th>Login Via</th>
                                        <th>Qty Order</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Laporan</th>
                                        <th>Pengerjaan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
    $koneksi = new mysqli("localhost", "root", "", "hanzjoki");
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    $sql = "SELECT id_transaksi, id_worker, login_via, qty_order, tgl_order, gaji, laporan, statsdone, stats FROM take_job";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_transaksi"] . "</td>
                    <td>" . $row["id_worker"] . "</td>
                    <td>" . $row["login_via"] . "</td>
                    <td>" . $row["qty_order"] . "</td>
                    <td>" . $row["tgl_order"] . "</td>
                    <td>" . $row["gaji"] . "</td>
                    <td>" . $row["laporan"] . "</td>                             
                    <td>" . $row["statsdone"] . "</td>      
                    <td>" . $row["stats"] . "</td>                         
                    <td>
                    <button onclick='showTakeJobModal(" . $row["id_transaksi"] . ")'>Take</button>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>0 result</td></tr>";
    }

    $koneksi->close();
    ?>
    <script>
    function takejob(id_transaksi) {
        // Tampilkan notifikasi konfirmasi
        var confirmation = confirm("Apakah Anda yakin ingin mengedit worker untuk transaksi dengan ID " + id_transaksi + "id_transaksi");

        // Jika pengguna menekan "OK", lakukan pembaruan pada id_worker
        if (confirmation) {
            // Lakukan pembaruan pada id_worker sesuai dengan NIK yang terdaftar
            // Implementasikan sesuai dengan kebutuhan dan cara penyimpanan data pada database Anda
            // Contoh menggunakan AJAX untuk mengirim permintaan pembaruan
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "takejobw.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Tindakan yang diambil setelah mendapatkan respons dari server
                    console.log(xhr.responseText);
                    // Mungkin Anda ingin melakukan sesuatu setelah pembaruan selesai
                }
            };
            // Kirim permintaan pembaruan dengan ID transaksi
            xhr.send("id_transaksi=" + id_transaksi);
        }
    }
</script>
<?php

// Lakukan koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "hanzjoki");

// Periksa koneksi ke database
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Ambil id_transaksi dari data POST


// Ambil id_worker dari data user
$nik = $user['id_worker'];

// Lakukan query update untuk mengubah id_worker sesuai kebutuhan Anda
$sqlUpdate = $koneksi->prepare("UPDATE take_job SET id_worker = ? WHERE id_transaksi = ?");
$sqlUpdate->bind_param("ss", $nik, $id_transaksi);

// Eksekusi query update
if ($sqlUpdate->execute()) {
    echo "Pembaruan data berhasil.";
} else {
    echo "Terjadi kesalahan saat melakukan pembaruan: " . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();

?>




                    </tbody>
                        </table>
                            <script>
                                function searchTable() {
                                    var input, filter, table, tr, td, i, txtValue;
                                    input = document.getElementById("searchInput");
                                    filter = input.value.toUpperCase();
                                    table = document.getElementById("datatablesSimple");
                                    tr = table.getElementsByTagName("tr");

                                    for (i = 0; i < tr.length; i++) {
                                        // Change the index according to your table structure
                                        td = tr[i].getElementsByTagName("td")[2]; // Index 2 represents the "Nama Lengkap" column

                                        if (td) {
                                            txtValue = td.textContent || td.innerText;

                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; HanzStore</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen dengan kelas 'id-transaksi' saat diklik
        var idTransaksiElements = document.querySelectorAll('.id-transaksi');

        // Tambahkan event listener untuk setiap elemen
        idTransaksiElements.forEach(function (element) {
            element.addEventListener('click', function () {
                // Ambil nilai data-idtransaksi
                var idTransaksi = element.getAttribute('data-idtransaksi');

                // Kirim nilai id_transaksi ke server melalui metode POST
                sendIdTransaksiToServer(idTransaksi);
            });
        });

        // Fungsi untuk mengirim id_transaksi ke server melalui metode POST
        function sendIdTransaksiToServer(idTransaksi) {
            // Buat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Atur metode dan endpoint URL untuk permintaan
            xhr.open('POST', 'proses.php', true);

            // Atur header Content-Type
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Atur data yang akan dikirim ke server
            var data = 'id_transaksi=' + idTransaksi;

            // Atur callback untuk menangani respons dari server
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Tindakan yang diambil setelah mendapatkan respons
                    console.log(xhr.responseText);
                }
            };

            // Kirim permintaan dengan data id_transaksi
            xhr.send(data);
        }
    });
</script>

</html>