<?php
require_once '../Controller/evenementC.php';
$evenementC = new evenementC();
$evenements = $evenementC->afficher_evenement();
if (isset($_POST['evenement']) && isset($_POST['search'])){
    $list = $evenementC->afficher_reservation($_POST['evenement']);
}
?>
// ...
<div class="form-container">
    <form action="" method ="POST">
        <div class="row">
            <div class="col-25">
                <label>Search: </label>
            </div>
            <div class="col-75">
                <select name="evenement" id="evenement">
                    <?php
                    foreach ($evenements as $evenement){
                        ?>
                    <option
                        value="<?= $evenement['ideven']?>"
                        <?php } ?>

                    >
                    <?= $evenement['ideven'] ?>
                    </option>
                    <?php
                    ?>

                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Search" name= "search">
        </div>
    </form>
</div>