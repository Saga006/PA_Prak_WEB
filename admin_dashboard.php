<?php
session_start();
if ($_SESSION['jenis_login'] != 'admin') {
    header("location:login.php?pesan=belum_login_admin");
} else if (empty($_SESSION['username'])) {
    header("location:admin_login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LGS Dashboard Admin</title>
    <link rel="shortcut icon" href="img/1.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="user_dashboard.php">
                            <img src="img/1.png" alt=""> <!-- Logo Toko--->
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="admin_dashboard.php">Homepage</a></li>
                                <li><a href="admin_data_game.php">Games </a></li>
                                <li><a href="admin_data_transaksi.php">Transaksi</a></li>
                                <li><a href="admin_data_user.php">User</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__nav ms-auto">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="#">Hallo <?php echo $_SESSION['username'] ?> <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="logout.php?">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>

    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="section-title">
                        <h4>Welcome Admin</h4>
                    </div>
                </div>
            </div>
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="img/head/admin.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">

                                <h2>Penghasilan</h2>
                                <p><?php
                                    include('koneksi.php');
                                    $total_penghasilan = 0;

                                    $sql    = "SELECT * FROM transaksi";
                                    $query    = mysqli_query($connect, $sql);

                                    while ($data = mysqli_fetch_array($query)) {
                                        $total_penghasilan = $data['harga'] + $total_penghasilan;
                                    }
                                    echo "Rp. $total_penghasilan";
                                    $sql    = "UPDATE `admin` SET `total_penghasilan` = '$total_penghasilan'";
                                    $query    = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                                    ?></p>

                                <br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>All GAmes</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            include('koneksi.php');

                            $sql    = "SELECT * FROM game";
                            $query    = mysqli_query($connect, $sql);

                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/game/<?php echo $data['id_game']; ?>.jpg">
                                            <div class="ep">Rp. <?= $data['harga']; ?></div> <!-- rating game -->
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $data['genre_1']; ?></li>
                                                <li><?= $data['genre_2']; ?></li>
                                                <li><?= $data['genre_3']; ?></li>
                                            </ul>
                                            <h5><a href="#"><?= $data['nama_game']; ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>




                </div>

    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="admin_dashboard.php"><img src="img/1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>