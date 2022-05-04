<?php
session_start();
include '../Controller/avionc.php';
$avionc = new avionc();
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
            <nav id="nav">
                <ul>
                    <li class="special">
                        <a href="#menu" class="menuToggle"><span>Menu</span></a>
                        <div id="menu">
                            <ul>
                                <li><a href="index.php">Accueil (airplanes catalog)</a></li>
                                <li><a href="cata.php">Airplanes catalog</a></li>
                                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                    <li><a href="avion.php">Avion</a></li>
                                <?php } ?>
                                <li><a href="Resersation.php"></a>Réservation</li>
                                <li><a href="Reclamation.php">Réclamation</a></li>
                                <li><a href="Reponse.php">Réponse</a></li>
                                <li><a href="Maintenance.php"></a>Maitenance</li>
                                <li><a href="Demande.php">Demande de maitenance</a></li>
                                <li><a href="Voyage.php">Voyage</a></li>
                                <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                                    <li><a href="signup.php">Sign Up</a></li>
                                    <li><a href="login.php">Log In</a></li>
                                <?php } ?>
                                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                    <li><a href="AdminPanel.php">Admin Panel</a></li>
                                <?php } ?>
                                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                                    <li><a href="settings.php">Settings</a></li>
                                    <li><a href="logout.php">Log out</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="inner">
                <h2>URJET</h2>
                <p>Just a test<br />
                    site template<br /></p>
                <ul class="actions special">
                    <li><a href="#" class="button primary">Activate</a></li>
                </ul>
            </div>
            <a href="#one" class="more scrolly">Learn More</a>
        </section>

        <!-- One -->

        <!-- Two -->
        <section id="two" class="wrapper alt style2">
            <form>
                <div class="form-group">
                    <select id="filtre" name="filtre" class="form-select">
                        <option>Choose an option</option>
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
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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