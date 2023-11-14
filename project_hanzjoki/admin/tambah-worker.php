<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah-worker</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="box-sidebar">

        <div class="sidebar">
            <div class="badan-1">
                <div class="logo-beranda">
                    <img src="../image/HanzStore WEB.png" alt="">
                </div>
                <div class="sesion-title">
                        <h1>walwawe</h1>
                </div>

            </div>

                <div class="badan-2">

                    <div class="konten-1" >
                        <a href="home.html">
                            <img src="../image/icons8-dashboard-48.png" alt="" >
                            <span class="jdl-konten-2">Dashboard</span>
                        </a>
                    </div>

                    <div class="konten-1" style=" background-color: #FF9900; height: 30px;">
                        <a href="tambah-worker.html">
                            <img src="../image/icons8-worker-50.png" alt="">
                            <span class="jdl-konten-2">Worker</span>
                        </a>
                    </div>

                    <div class="konten-1">
                        <a href="#">
                            <img src="../image/CUstomer.png" alt="">
                            <span class="jdl-konten-2">Custemer</span>
                        </a>
                    </div>

                    <div class="konten-1">
                        <a href="#">
                            <img src="../image/icons8-shopping-cart-64.png" alt="">
                            <span class="jdl-konten-2">Orderan</span>
                        </a>
                    </div>

                    <div class="konten-1">
                        <a href="#">
                            <img src="../image/icons8-game-controller-64.png" alt="">
                            <span class="jdl-konten-2">Joki</span>
                        </a>
                    </div>

                    <div class="konten-1">
                        <a href="#">
                            <img src="../image/icons8-history-24.png" alt="">
                            <span class="jdl-konten-2">History</span>
                        </a>
                    </div>
                </div>




                <div class="list-item1">
                    <a href="#">
                        <img src="../image/icons8-game-controller-64.png" alt="" class="icon-1">
                        <span class="judul-kepala">HANZJOKI</span>
                    </a>
                </div>
         </div>
            <!-- ================================================================================================================= -->

            <div class="main-content">
                <div class="blank-atas">
                    <a href="#" class="pler2">
                        <img src="" alt="">
                        <h1 class="title-halaman">Worker</h1>
                    </a>
                    

                    <div class="search-box">
                        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                           <div class="search-input">
                           <input type="text" class="input" placeholder="search...">
                           </div>
                    </div>

                    <div class="img-drop">
                        <img src="../image/image 34.png" alt="">
                    </div>
                    
                    <div class="box-drop">
                        <div class="dropdown">
                            <button onclick="toggleDropdown()" class="dropbtn">Admin</button>
                            <div id="myDropdown" class="dropdown-content">
                            <a href="#">
                                <img src="../image/SETTING 1.png" alt="Setting">
                                Setting
                            </a>
                            <a href="#">
                                <img src="../image/PROFIL 1.png" alt="Profile">
                                Profile
                            </a>
                            <a href="#">
                                <img src="../image/LOGOUT 1.png" alt="Logout">
                                Logout
                            </a>
                            </div>
                        </div>
                    </div>
                    </div>

                                        <table border="1" id="myTable"  class="custom-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor WA</th>
                                        <th>Email</th>
                                        <th>Pangkat</th>
                                        <th>Role Utama</th>
                                        <th>Sebagai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $koneksi = new mysqli("localhost", "root", "", "jokihanz");
                                        if ($koneksi->connect_error) {
                                            die("Connection failed: " . $koneksi->connect_error);
                                        }

                                        $sql = "SELECT id_worker, NIK, `nama_lengkap`, alamat, jenis_kelamin, email, pangkat, Role_utama, sebagai, no_wa FROM data_admin_worker";
                                        $result = $koneksi->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>" . $row["id_worker"] . "</td>
                                                        <td>" . $row["NIK"] . "</td>
                                                        <td>" . $row["nama_lengkap"] . "</td>
                                                        <td>" . $row["alamat"] . "</td>
                                                        <td>" . $row["jenis_kelamin"] . "</td>
                                                        <td>" . $row["no_wa"] . "</td>
                                                        <td>" . $row["email"] . "</td>
                                                        <td>" . $row["pangkat"] . "</td>
                                                        <td>" . $row["Role_utama"] . "</td>
                                                        <td>" . $row["sebagai"] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>0 result</td></tr>";
                                        }

                                        $koneksi->close();
                                    ?>
                                </tbody>
                            </table>
                    
                            <div id="detailPopup" class="popup">
                                <h2>Detail Data</h2>
                                <!-- Tempat menampilkan detail data -->
                            </div>
                   
            
            
            </div>
     </div>

    <script src="../js/script.js"></script>
</body>
</html>