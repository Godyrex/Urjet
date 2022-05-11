<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
										<li><a href="index.php">Accueil </a></li>
											<li><a href="cata.php">Airplanes catalog</a></li>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
											<li><a href="avion.php">Avion</a></li>
											<?php }?>
											<li><a href="Reservation.php"></a>Réservation</li>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="ajouterreclamation.php">Add Reclamation</a></li>
											<li><a href="ajouterreponse.php">Add Response</a></li>
											<li><a href="recherchereclamation.php">Find Reclamation</a></li>
											<?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="ajouter_evenement.php">Add Event</a></li>
											<li><a href="ajouter_reservation.php">Add Reservation</a></li>
                                            <?php }?>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  === true) { ?>
											<li><a href="afficherListeDemandes.php">Afficher la liste des demandes</a></li>
											<li><a href="ajouterdemande.php">Demande de maintenance</a></li>
                                            <li><a href="modifierdemande.php">modifier de maintenance</a></li>
                                            <?php }?>
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