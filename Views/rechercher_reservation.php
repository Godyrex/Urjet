<?php
include '../config.php';
$rows=0;
if ($_POST ['submit'])
{
    $key = $_POST['key'];
    $sql="SELECT *FROM reservation WHERE idres LIKE :keyword OR dateres LIKE :keyword OR etatres LIKE :keyword ORDER BY idres";
    $pdo = config::getConnexion();
    $query = $pdo->prepare($sql);
    $query->bindValue(':keyword', '%'.$key.'%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll();
    $rows = $query->rowCount();
}
?>
<!DOCTYPE HTML>

<html>
    <head>
        <title>Rechercher une reservation</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script src="finsert.js"></script>
    </head>
    <body class="is-preload">

        <!-- Page Wrapper -->
            <div id="page-wrapper">

                <!-- Header -->
                    <header id="header">
                        <h1><a href="index.html">Urjet</a></h1>
                        <nav id="nav">
                            <ul>
                                <li class="special">
                                    <a href="#menu" class="menuToggle"><span>Menu</span></a>
                                    <div id="menu">
                                        <ul>
                                        <li><a href="index.php">Accueil (airplanes catalog)</a></li>
                                            <li><a href="cata.php">Airplanes catalog</a></li>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                            <li><a href="add.php">Avion</a></li>
                                            <?php }?>
                                            <li><a href="ajouter_resersation.php"></a>Réservation</li>
                                            <li><a href="afficherListereclamation.php">Réclamation</a></li>
                                            <li><a href="ajouter_evenement.php">evenement</a></li>
                                            <li><a href="maintance.php"></a>Afficher la liste des demandes</li>
                                            <li><a href="demande.php">Demande de maintenance</a></li>
                                            <li><a href="Voyage.php">Voyage</a></li>
                                            <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                                            <li><a href="signup.php">Sign Up</a></li>
                                            <li><a href="login.php">Log In</a></li>
                                            <?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                                <li><a href="AdminPanel.php">Admin Panel</a></li>
                                                <?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                                            <li><a href="settings.php">Settings</a></li>
                                            <li><a href="logout.php">Log out</a></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </header>

                <!-- Main -->
                    <article id="main">
                        <header>
                            <h2>reservation</h2>
                            <p>Liste des reservations</p>
                        </header>
                        <section class="wrapper style5">
                            <div class="inner">
                            <form action="rechercher_reservation.php" method="post" >
                                        <div class="row gtr-uniform"> 
                                            <div class="col-6 col-12-xsmall"> 
                                                <input type="text" name="key"  placeholder="Recherche.." />
                                                <input type="submit" name="submit"  value="chercher" />
                                                
                                            </div>  
                                        </div>
                            </form>
                                <section>
                            
        <table border="1" align="center">
            <tr>
                <th>idres</th>
                <th>idclient</th>
                <th>ideven</th>
                <th>dateres</th>
                <th>etatres</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            
            <?php
                { if ($rows!=0)
                    {foreach ($results as $reservation ) {
            ?>
            <tr>
                <td><?php echo $reservation['idres']; ?></td>
                <td><?php echo $reservation['idclient']; ?></td>
                <td><?php echo $reservation['ideven']; ?></td>
                <td><?php echo $reservation['dateres']; ?></td>
                <td><?php echo $reservation['etatres']; ?></td>

                <td>
                    <form method="POST" action="modifier_reservation.php">
                        <input type="submit" name="Modifier" value="Modifier">
                        <input type="hidden" value=<?PHP echo $reservation['idres']; ?> name="idres">
                    </form>
                </td>
                <td>
                    <a href="supprimer_reservation.php?idres=<?php echo $reservation['idres']; ?>">Supprimer</a>
                </td>
            </tr>
            <?php
              }}}
            ?>
        
           
            
        </table>
                                    
                                </section>
                            </div>
                        </section>
                    </article>

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
                            <li>&copy; Untitled</li><li>Design: <a href="http://urjet.com">HTML5 UP</a></li>
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