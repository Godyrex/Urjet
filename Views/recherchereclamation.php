<?php
						session_start();
include '../config.php';
$rows=0;
if ($_POST ['submit'])
{
    $key = $_POST['key'];
    $sql="SELECT *FROM reclamation WHERE idrec LIKE :keyword OR sujet LIKE :keyword OR contenurec LIKE :keyword ORDER BY idrec";
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
        <title>Demande de maintenance</title>
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
                        <h1><a href="index.php">Urjet</a></h1>
						<?php require 'sidebarfront.php' ?>
                    </header>

                <!-- Main -->
                    <article id="main">
                        <header>
                            <h2>Demande de maintenance</h2>
                            <p>Liste des demandes</p>
                        </header>
                        <section class="wrapper style5">
                            <div class="inner">
                            <form action="recherchereclamation.php" method="post" >
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
                <th>idrec</th>
                <th>objetrec</th>
                <th>sujet</th>
                <th>contenurec</th>
                <th>daterec</th>
                <th>etatrec</th>
                <th>idclient</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            
            <?php
                { if ($rows!=0)
                    {foreach ($results as $reclamation ) {
            ?>
            <tr>
                <td><?php echo $reclamation['idrec']; ?></td>
                <td><?php echo $reclamation['objetrec']; ?></td>
                <td><?php echo $reclamation['sujet']; ?></td>
                <td><?php echo $reclamation['contenurec']; ?></td>
                <td><?php echo $reclamation['daterec']; ?></td>
                <td><?php echo $reclamation['etatrec']; ?></td>
                <td><?php echo $reclamation['idclient']; ?></td>
                <td>
                    <form method="POST" action="modifierreclamation.php">
                        <input type="submit" name="Modifier" value="Modifier">
                        <input type="hidden" value=<?PHP echo $reclamation['idrec']; ?> name="idrec">
                    </form>
                </td>
                <td>
                    <a href="supprimerreclamation.php?idrec=<?php echo $reclamation['idrec']; ?>">Supprimer</a>
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