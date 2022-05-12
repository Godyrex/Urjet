<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
										<li><a href="index.php">Accueil </a></li>
											<li><a href="cata.php">catalogue des avions</a></li>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
											<li><a href="avion.php">Avion</a></li>
											<?php }?>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="ajouterreclamation.php">Ajouter une Reclamation</a></li>
											<li><a href="ajouterreponse.php">Ajouter une Response</a></li>
											<li><a href="recherchereclamation.php">Chercher une Reclamation</a></li>
											<?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="ajouter_evenement.php">Ajouter un Evenement</a></li>
											<li><a href="ajouter_reservation.php">Reserver un Jet Privé</a></li>
                                            <?php }?>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="ajouterdemande.php">Demander de Maintenance</a></li>
											<li><a href="afficherListeDemandes.php">Afficher votre Demande</a></li>
											<li><a href="modifierdemande.php">Modifier votre Demande </a></li>
											<li><a href="ajoutermaintenace.php">Afficher l'ETAT DE VOTRE Maintenance</a></li>
                                        
                                            <?php }?>
											<li><a href="Voyage.php">Voyage</a></li>
                                            <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                                            <li><a href="signup.php">S'inscrire</a></li>
											<li><a href="login.php">Se connecter</a></li>
                                            <?php }?>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                                <li><a href="AdminPanel.php">Admin Panel</a></li>
                                                <?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                                            <li><a href="settings.php">Réglages</a></li>
											<li><a href="logout.php">Se Deconnecter</a></li>
                                            <?php }?>
										</ul>
									</div>
								</li>
							</ul>
						</nav>