<?php
session_start();
include '../Controller/avionc.php';
$avionc = new avionc();
$con = config::getConnexion();
?>
<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>URJET</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="landing is-preload">

    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="index.php">URJET</a></h1>
            <?php require 'sidebarfront.php' ?>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="inner">
                <h2>URJET</h2>
                </ul>
            </div>
         
        </section>

        <!-- One -->

        <!-- Two -->
        <section id="two" class="wrapper alt style2">
            <form>
                <div class="form-group">
                    <select id="filtre" name="filtre" class="form-select">
                        <option>Choisir une Option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT type From aviontypes";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['type']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn ">Filtrer</button>
            </form>
            <?php
            if(isset($_GET["filtre"])){
                $key= $_GET["filtre"];
                if($key=="Choose an option"){
                    $avionc->list();
                    }else{
                        $avionc->listfiltre($key);
                    }
                }else{
                    $avionc->list();
                }
            ?>
        </section>



        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled</li>
                <li>Design: <a href="http://html5up.net">URJET</a></li>
            </ul>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>