<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One?query=mochiy+ ">
</head>
<body>
    <header>
        <div class="container"> 
            <h2 class="logo">
                <img src="../image/LOGO HANZJOKI.png" alt="LOGO" style="width:150px; height:auto; ">
            </h2>
              
             <nav class="navigation3">
        
                <a href="dashboardcust.php"  style="text-decoration: none; color: #06D85F;">
                    <span class="link-text">Beranda</span>
                </a>

                <a href="lacakorderan.php">
                    <span class="link-text">Lacak Orderan</span>
                </a>
                <a href="hubungikami.php">
                    <span class="link-text">Hubungi Kami</span>
                </a>
                <a href="calculator.php">
                    <span class="link-text">Calculator Ml</span>
                </a>
            </nav>
        </div>
        <nav class="navigation2">
            <a href="../register.php">Daftar Sekarang</a>
            <a href="../login.php">Masuk</a>
        </nav>
    </header> 

    <div class="content-jokirank">
        <h1 class="nama-joki">Joki Rank</h1>
        <img src="../image/rankpler.png" >
        <h1 class="time">orderan joki di chek<br>pukul 09:00-21:00</h1>
        <h1 class="ket-1">Jika Orderan melewati<br>batas pengecekan <br>orderan, maka orderan<br>dicek di hari berikutnya</h1>

            <div class="ket-2" >
                <h1 class="caraorder">Cara Order :</h1>
                <p class="isi-ket-2">
                    1.Lengkapi data joki dengan teliti <br>
                    2.Pilih jenis Joki yang diinginkan <br>
                    3.masukan jumlah order <br>
                    4.Pilih metode pembayaran <br>
                    5.Masukan No WhatsApp yang benar <br>
                    6.Klik beli & lakukan pembayaran <br>
                    7.order joki akan segera diproses <br> setelah orderan berhasil
                </p>
                <h2 class="ket-3">Estimasi Proses jasa Joki <br> kita usahakan secepatnya</h2>
                <h2 class="ket-4">Minimal 12 jam <br> Maxsimal 2x24 jam </h2>
            </div>
    </div>


    <div class="content-listjoki">
        <h1 class="list-jokian" >Paket Joki Lainnya</h1>
        <section id="joki" class="list-jokian-order">
               
                <div class="img-jokian">
                    <a href="orderjokimcl.html">
                            <img src="../image/MCL.png" alt="">
                            <div class="pil-jokirank">Joki MCL <br>(Jasa joki MCL)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="orderjokimcl.html">
                            <img src="../image/MONTAGE.png" alt="">
                            <div class="pil-jokirank">Joki Vidio Montage <br>(Jasa joki Vidio)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="orderjokimcl.html">
                            <img src="../image/JASA MABAR.png" alt="">
                            <div class="pil-jokirank">Jasa Mabar <br>(Jasa Mabar Penjoki)</div>
                    </a>
                </div>
                <div class="img-jokian">
                    <a href="orderjokimcl.html">
                            <img src="../image/JOKICLASIK.png" alt="">
                            <div class="pil-jokirank">Joki clasic <br>(Jasa joki Up WinRate)</div>
                    </a>
                </div>
        </section>
    </div>

    <div class="box-id-input">
        <h1 class="id-id">Lengkapi Data</h1>
        <div class="left-input">
            <div class="input-container">
    
                <input type="text" id="input1" name="input1" placeholder="masukan Email/No Hp">
            </div>
            <div class="input-container">
                <input type="text" id="input2" name="input2" placeholder="Minimal Request 3 Hero">
            </div>
            <div class="input-container">
                <input type="text" id="input3" name="input3" placeholder="User ID & Nickname">
            </div>
        </div>

        
        <div class="right-input">
            <div class="input-container">
                <input type="text" id="input4" name="input4" placeholder="Masukan Password">
            </div>
            <div class="input-container">    
                <input type="text" id="input5" name="input5" placeholder="Catatan untuk Pejoki">
            </div>
            <div class="input-container">
                <select id="input6" name="input6" >
                    <option value="loginvia">Login Via</option>
                    <option value="montoon">Moonton (Rekomendasi)</option>
                    <option value="facebook">Facebook</option>
                    <option value="vk">Vk</option>
                    <option value="tt">Tiktok</option>
                </select>
            </div>
        </div>
    </div>
    
       <?php
include '../koneksi.php'; // Include your database connection file

?>

<div class="box-harga1">
    <h1 class="title-pil-joki">Pilih Joki Rank</h1>
    <div id="data-container">
        <?php
            // Assume $koneksi is your database connection
            $result = mysqli_query($koneksi, "SELECT *  FROM paket_joki_rank WHERE judul_paket = 'Promo'");

            // Loop through the data and display it
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="promo">';
                echo '<label></label>'. $row['judul_paket'];
                echo '</div>';
            }
        ?>
    </div>









    
</body>
</html>