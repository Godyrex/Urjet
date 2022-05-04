<?php
include '../configg.php';
include_once '../Model/avion.php';
include_once '../Model/typeavion.php';
class avionc
{
function afficher(){
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `avion`";
    $count = $con->query($sql)->fetchColumn();

    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);
    $sql = "SELECT avion.id,avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
                    From avion 
                    INNER JOIN typeavion 
                    ON avion.idtype = typeavion.id LIMIT {$pagination->offset}, {$pagination->limit}";
                          $stmt = $con->prepare($sql);
                          $stmt->execute();
                          while ($row = $stmt->fetch()) {
                          ?>
                            <tr>
                              <td><?php echo htmlspecialchars($row['id']) ?></td>
                              <td><?php echo htmlspecialchars($row['categorie']) ?></td>
                              <td><?php echo htmlspecialchars($row['prix']) ?></td>
                              <td><?php echo htmlspecialchars($row['nom']) ?></td>
                              <td><?php echo htmlspecialchars($row['photo']) ?></td>
                              <td>
                                <form method="post"><button name="submitdel" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Del</button></form>
                              </td>
                              <td>
                                <form method="post"><button name="submitmod" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Add/Update</button></form>
                              </td>
                            </tr>
                          <?php
                          }
}
function pagination(){
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `avion`";
    $count = $con->query($sql)->fetchColumn();

    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);
    ?>
    <ul class="pagination pagination-sm m-0 float-right">
      <div>

        <?= \yidas\widgets\Pagination::widget([
          'pagination' => $pagination
        ]) ?>
      </div>
    </ul>
    <?php
  }
  function paginationrecherche($key){
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `avion` WHERE id LIKE :keyword";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':keyword',  $key , PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);
    ?>
    <ul class="pagination pagination-sm m-0 float-right">
      <div>

        <?= \yidas\widgets\Pagination::widget([
          'pagination' => $pagination
        ]) ?>
      </div>
    </ul>
    <?php
  }
function recherche($key){
    
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `avion` WHERE id LIKE :keyword";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':keyword',  $key , PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);
    $sql = "SELECT avion.id,avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
                    From avion 
                    INNER JOIN typeavion 
                    ON avion.idtype = typeavion.id WHERE avion.id LIKE :keyword LIMIT {$pagination->offset}, {$pagination->limit}";
                          $stmt = $con->prepare($sql);
                          $stmt->bindValue(':keyword',  $key , PDO::PARAM_INT);
                          $stmt->execute();
                          while ($row = $stmt->fetch()) {
                          ?>
                            <tr>
                              <td><?php echo htmlspecialchars($row['id']) ?></td>
                              <td><?php echo htmlspecialchars($row['categorie']) ?></td>
                              <td><?php echo htmlspecialchars($row['prix']) ?></td>
                              <td><?php echo htmlspecialchars($row['nom']) ?></td>
                              <td><?php echo htmlspecialchars($row['photo']) ?></td>
                              <td>
                                <form method="post"><button name="submitdel" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Del</button></form>
                              </td>
                              <td>
                                <form method="post"><button name="submitmod" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Add/Update</button></form>
                              </td>
                            </tr>
                          <?php
                          }
}
function delete($param_id1){
    $con = config::getConnexion();
    $stmto = $con->prepare("SELECT idtype FROM avion WHERE id=?");
    $stmto->bindParam(1, $param_id1, PDO::PARAM_INT);
    $stmto->execute();
    $row = $stmto->fetch();
    $param_id = $row['idtype'];
    $sql = "DELETE FROM `typeavion` WHERE `id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $param_id, PDO::PARAM_INT);
    $stmt->execute();
}
function update($nom,$prix,$photo,$id,$type){
    $con = config::getConnexion();
    $stmt = $con->prepare("UPDATE `avion` SET nom = ?, prix = ? ,photo = ? WHERE `id` = ?");
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prix, PDO::PARAM_INT);
    $stmt->bindParam(3, $photo, PDO::PARAM_STR);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmto = $con->prepare("SELECT idtype FROM avion WHERE id=?");
    $stmto->bindParam(1, $id, PDO::PARAM_INT);
    $stmto->execute();
    $row = $stmto->fetch();
    $param_id = $row['idtype'];
    $rso = $con->prepare("UPDATE `typeavion` SET categorie = ? WHERE `id` = ?");
    $rso->bindParam(1, $type, PDO::PARAM_STR);
    $rso->bindParam(2, $param_id, PDO::PARAM_INT);
    $rso->execute();
}
function type($type){
    $con = config::getConnexion();
    $sqlo = "INSERT INTO `aviontypes` (`type`) VALUES ('$type')";
    $rso = $con->prepare($sqlo);
    if ($rso->execute()) {
    }
}
function add($nom,$prix,$photo,$id,$type){
    $con = config::getConnexion();
    $last_id = 0;
    $sqlo = "INSERT INTO `typeavion` (`categorie`) VALUES ('$type')";
    $rso = $con->prepare($sqlo);
    if ($rso->execute()) {
      $last_id = $con->lastInsertId();
      $sql = "INSERT INTO `avion` (`id`, `nom`,`prix`,`photo`,`idtype`) VALUES ('$id', '$nom', '$prix','$photo','$last_id')";
      $stmt = $con->prepare($sql);
      $stmt->execute();
    }
}
function exportcsv(){
    $con = config::getConnexion();
    $fileName = "User_list" . date('d-m-Y') . ".csv";
    @header("Content-Disposition: attachment; filename=" . $fileName);
    @header("Content-Type: application/csv");
    @header("Pragma: no-cache");
    @header("Expires: 0");
  
    $select = "SELECT avion.id,avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
    From avion 
    INNER JOIN typeavion 
    ON avion.idtype = typeavion.id";
    $stmt = $con->prepare($select);
    $stmt->execute();
    $data = "";
    $data .= "ID" . ",";
    $data .= "Name" . ",";
    $data .= "Price" . ",";
    $data .= "Image" . ",";
    $data .= "Type" . "\n";
  
    while ($row = $stmt->fetch()) {
      $data .= $row['id'] . ",";
      $data .= $row['nom'] . ",";
      $data .= $row['prix'] . ",";
      $data .= $row['photo'] . ",";
      $data .= $row['categorie'] . "\n";
    }
  
    echo $data;
    exit();
}
function list(){
    $con = config::getConnexion();
    $result = $con->prepare("SELECT avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
    From avion 
    INNER JOIN typeavion 
    ON avion.idtype = typeavion.id");
    $result->execute();
    while ($row= $result->fetch()) {
        //echo $row['FirstName'] . " " . $row['LastName']; //these are the fields that you have stored in your database table employee
        echo "<br />";
        ?>
        <section class="spotlight">
        <div class="image "><img  style="width:500px;height:300px;" src="imgair/<?php echo $row['photo'] ?>" alt="" /></div>
        <div class="content">
            <h2>Name: <?php echo $row['nom'] ?><br />
            </h2>
            <h2>Type: <?php echo $row['categorie'] ?><br />
            </h2>
            <h2>Price: <?php echo $row['prix'] ?>DT<br />
            </h2>
            <a href="reservation.php" class="button primary">Reserve</a>
        </div>
    </section>
    <?php
    }
}

function listfiltre($key){
    $con = config::getConnexion();
    $result = $con->prepare("SELECT avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
    From avion 
    INNER JOIN typeavion 
    ON avion.idtype = typeavion.id WHERE typeavion.categorie LIKE :keyword");
    $result->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $result->execute();
    while ($row= $result->fetch()) {
        //echo $row['FirstName'] . " " . $row['LastName']; //these are the fields that you have stored in your database table employee
        echo "<br />";
        ?>
        <section class="spotlight">
        <div class="image "><img  style="width:500px;height:300px;" src="imgair/<?php echo $row['photo'] ?>" alt="" /></div>
        <div class="content">
            <h2>Name: <?php echo $row['nom'] ?><br />
            </h2>
            <h2>Type: <?php echo $row['categorie'] ?><br />
            </h2>
            <h2>Price: <?php echo $row['prix'] ?>DT<br />
            </h2>
            <a href="reservation.php" class="button primary">Reserve</a>
        </div>
    </section>
    <?php
    }
}
}
?>