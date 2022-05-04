<?php

include '../configg.php';
include_once '../Model/user.php';
include_once '../Model/usero.php';
class userc
{

  function pages()
  {
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `user`";
    $count = $con->query($sql)->fetchColumn();

    // Initialize a Data Pagination with previous count number
    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);

    // Get range data for the current page
    $sql = "SELECT user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
                From user 
                INNER JOIN usero 
                ON user.id_o = usero.id ORDER BY user.id LIMIT {$pagination->offset}, {$pagination->limit}";
    $sth = $con->prepare($sql);
    $sth->execute();
    while ($row = $sth->fetch()) {
?>
      <tr>
        <?php if ($row['ban'] == "Yes") { ?>
          <td style="color:red"><?php echo htmlspecialchars($row['id']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td style="color:red"><?php echo htmlspecialchars($row['name']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['image']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['type']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['description']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } else { ?>
          <td><?php echo htmlspecialchars($row['id']) ?></td>
          <td><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td><?php echo htmlspecialchars($row['name']) ?></td>
          <td><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td><?php echo htmlspecialchars($row['image']) ?></td>
          <td><?php echo htmlspecialchars($row['type']) ?></td>
          <td><?php echo htmlspecialchars($row['description']) ?></td>
          <td><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } ?>
      </tr>
    <?php
    }
  }
  function numero()
  {
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `user`";
    $count = $con->query($sql)->fetchColumn();

    // Initialize a Data Pagination with previous count number
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
  function numerosearch($key)
  {
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM user WHERE username LIKE :keyword OR id LIKE :keyword OR name LIKE :keyword";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    // Initialize a Data Pagination with previous count number
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




  function search($key)
  {
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM user WHERE username LIKE :keyword OR id LIKE :keyword OR name LIKE :keyword";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    // Initialize a Data Pagination with previous count number
    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);
    $sql = "SELECT  user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
    FROM user INNER JOIN usero ON user.id_o = usero.id WHERE user.username LIKE :keyword OR user.id LIKE :keyword OR user.name LIKE :keyword ORDER BY user.id LIMIT {$pagination->offset}, {$pagination->limit}";
    $pdo = config::getConnexion();
    $query = $pdo->prepare($sql);
    $query->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $query->execute();
    while ($row = $query->fetch()) {
    ?>
      <tr>
        <?php if ($row['ban'] == "Yes") { ?>
          <td style="color:red"><?php echo htmlspecialchars($row['id']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td style="color:red"><?php echo htmlspecialchars($row['name']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['image']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['type']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['description']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } else { ?>
          <td><?php echo htmlspecialchars($row['id']) ?></td>
          <td><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td><?php echo htmlspecialchars($row['name']) ?></td>
          <td><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td><?php echo htmlspecialchars($row['image']) ?></td>
          <td><?php echo htmlspecialchars($row['type']) ?></td>
          <td><?php echo htmlspecialchars($row['description']) ?></td>
          <td><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } ?>
      </tr>
    <?php
    }
  }
  function userslist()
  {
    $con = config::getConnexion();
    $sql = "SELECT count(*) FROM `user`";
    $count = $con->query($sql)->fetchColumn();

    // Initialize a Data Pagination with previous count number
    $pagination = new \yidas\data\Pagination([
      'totalCount' => $count,
    ]);

    // Get range data for the current page
    $sql = "SELECT user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
                  From user 
                  INNER JOIN usero 
                  ON user.id_o = usero.id ORDER BY user.id LIMIT {$pagination->offset}, {$pagination->limit}";
    $sth = $con->prepare($sql);
    $sth->execute();
    while ($row = $sth->fetch()) {
    ?>
      <tr>
        <?php if ($row['ban'] == "Yes") { ?>
          <td style="color:red"><?php echo htmlspecialchars($row['id']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td style="color:red"><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td style="color:red"><?php echo htmlspecialchars($row['name']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['image']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['type']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['description']) ?></td>
          <td style="color:red"><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } else { ?>
          <td><?php echo htmlspecialchars($row['id']) ?></td>
          <td><?php echo htmlspecialchars($row['username']) ?></td>
          <?php if ($row['verified']) { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Verified)</td>
          <?php } else { ?>
            <td><?php echo htmlspecialchars($row['email']) ?>(Not Verified)</td>
          <?php } ?>
          <td><?php echo htmlspecialchars($row['name']) ?></td>
          <td><?php echo htmlspecialchars($row['lastname']) ?></td>
          <td><?php echo htmlspecialchars($row['image']) ?></td>
          <td><?php echo htmlspecialchars($row['type']) ?></td>
          <td><?php echo htmlspecialchars($row['description']) ?></td>
          <td><?php echo htmlspecialchars($row['ban']) ?></td>
          <?php if ($row['type'] == "User") { ?>
            <td>
              <form method="post"><button name="submitad" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Admin</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitc" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">User</button></form>
            </td>
          <?php } ?>
          <?php if ($row['ban'] == "No") { ?>
            <td>
              <form method="post"><button name="submitb" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Ban</button></form>
            </td>
          <?php } else { ?>
            <td>
              <form method="post"><button name="submitub" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Unban</button></form>
            </td>
          <?php } ?>
        <?php } ?>
      </tr>

      <div class="card-footer">
        <ul class="pagination pagination-sm m-0 float-right">
          <div>

            <?= \yidas\widgets\Pagination::widget([
              'pagination' => $pagination
            ]) ?>
          </div>
        </ul>
        <form method="post">
          <input class="btn btn-primary" type="submit" name="submit" value="Export" />
        </form>
      </div>
      <?php

    }
  }
  function updatetype($param_id1, $param_type)
  {
    $con = config::getConnexion();
    $stmto = $con->prepare("SELECT id_o FROM user WHERE id=?");
    $stmto->bindParam(1, $param_id1, PDO::PARAM_INT);
    if ($stmto->execute()) {
      while ($row = $stmto->fetch()) {
        $param_id = $row['id_o'];
      }
    }
    $sql = "UPDATE usero SET type = ? WHERE id = ?";
    if ($stmt = $con->prepare($sql)) {
      $stmt->bindParam(1, $param_type, PDO::PARAM_STR);
      $stmt->bindParam(2, $param_id, PDO::PARAM_INT);
      if ($stmt->execute()) {
        // echo "<meta http-equiv='refresh' content='2'>";
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
  }
  function userban($param_id1, $ban)
  {
    $con = config::getConnexion();
    $stmto = $con->prepare("SELECT id_o FROM user WHERE id=?");
    $stmto->bindParam(1, $param_id1, PDO::PARAM_INT);
    if ($stmto->execute()) {
      if ($row = $stmto->fetch()) {
        $param_id = $row['id_o'];;
      }
    }
    $sql = "UPDATE `usero` SET ban = ? WHERE `id` = ?";
    if ($stmt = $con->prepare($sql)) {
      $stmt->bindParam(1, $ban, PDO::PARAM_STR);
      $stmt->bindParam(2, $param_id, PDO::PARAM_INT);





      if ($stmt->execute()) {
        // sleep(2);
        //echo "<meta http-equiv='refresh' content='2'>";
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
  }
  function usercount()
  {
    $con = config::getConnexion();
    $sql = "SELECT * FROM usero";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function bancount()
  {
    $con = config::getConnexion();
    $sql = "SELECT * FROM usero WHERE ban=?";
    $stmt = $con->prepare($sql);
    $ban = "Yes";
    $stmt->bindParam(1, $ban, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function admincount()
  {
    $con = config::getConnexion();
    $sql = "SELECT * FROM usero WHERE type=?";
    $stmt = $con->prepare($sql);
    $ban = "Admin";
    $stmt->bindParam(1, $ban, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function usercountsearch($key)
  {
    $con = config::getConnexion();
    $sql = "SELECT  user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
      FROM user INNER JOIN usero ON user.id_o = usero.id WHERE user.username LIKE :keyword OR user.id LIKE :keyword OR user.name LIKE :keyword";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function bancountsearch($key)
  {
    $con = config::getConnexion();
    $sql = "SELECT  user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
      FROM user INNER JOIN usero ON user.id_o = usero.id WHERE (user.username LIKE :keyword OR user.id LIKE :keyword OR user.name LIKE :keyword)  AND usero.ban = :ban ";
    $stmt = $con->prepare($sql);
    $ban = "Yes";
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $stmt->bindValue(':ban', $ban, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function admincountsearch($key)
  {
    $con = config::getConnexion();
    $sql = "SELECT  user.username,user.name,user.lastname,user.id, user.email, user.image,user.verified,usero.type,usero.description,usero.ban 
      FROM user INNER JOIN usero ON user.id_o = usero.id WHERE (user.username LIKE :keyword OR user.id LIKE :keyword OR user.name LIKE :keyword)AND usero.type=:type ";
    $stmt = $con->prepare($sql);
    $type = "Admin";
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->fetch();
    $results = $stmt->rowCount();
    return $results;
  }
  function excel()
  {
    $con = config::getConnexion();
    $fileName = "User_list" . date('d-m-Y') . ".csv";
    @header("Content-Disposition: attachment; filename=" . $fileName);
    @header("Content-Type: application/csv");
    @header("Pragma: no-cache");
    @header("Expires: 0");

    $select = "SELECT user.username,user.name,user.lastname,user.id, user.email, user.image,usero.type,usero.description,usero.ban 
       From user 
       INNER JOIN usero 
       ON user.id_o = usero.id";
    $stmt = $con->prepare($select);
    $stmt->execute();
    $data = "";
    $data .= "ID" . ",";
    $data .= "Username" . ",";
    $data .= "Email Address" . ",";
    $data .= "Name" . ",";
    $data .= "Lastname" . ",";
    $data .= "Image" . ",";
    $data .= "Account Type" . ",";
    $data .= "Description" . ",";
    $data .= "Banned" . "\n";

    while ($row = $stmt->fetch()) {
      $data .= $row['id'] . ",";
      $data .= $row['username'] . ",";
      $data .= $row['email'] . ",";
      $data .= $row['name'] . ",";
      $data .= $row['lastname'] . ",";
      $data .= $row['image'] . ",";
      $data .= $row['type'] . ",";
      $data .= $row['description'] . ",";
      $data .= $row['ban'] . "\n";
    }

    echo $data;
    exit();
  }
  function updateuser($name, $lastname, $email, $passwordhash, $id, $description, $id_o)
  {
    $con = config::getConnexion();
    $stmt = $con->prepare("UPDATE `user` SET name = ?, lastname = ? ,email = ?,password = ? WHERE `id` = ?");
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $lastname, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $passwordhash, PDO::PARAM_STR);
    $stmt->bindParam(5, $id, PDO::PARAM_INT);

    $stmt->execute();

    $stmt = $con->prepare("UPDATE `usero` SET description= ? WHERE `id` = ?");
    $stmt->bindParam(1, $description, PDO::PARAM_STR);
    $stmt->bindParam(2, $id_o, PDO::PARAM_INT);
    $stmt->execute();
    $_SESSION["email"] = $email;
    $_SESSION["hpassword"] = $passwordhash;
    $_SESSION["name"] = $name;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["description"] = $description;
  }
  function verification($verify)
  {
    $con = config::getConnexion();
    $userc = new userc();
    $result = $con->prepare("SELECT * FROM user WHERE email='" . $verify . "'");
    $result->execute();
    $row = $result->fetch();
    if ($row > 1) {
      $expFormat = mktime(
        date("H"),
        date("i") + 2,
        date("s"),
        date("m"),
        date("d"),
        date("Y")
      );

      $expDate = date("Y-m-d H:i:s", $expFormat);
      $token = md5($verify) . rand(10, 9999);
      $stmt = $con->prepare("UPDATE user SET email_verification_link='" . $token . "',exp_date='" . $expDate . "' WHERE email='" . $verify . "'");
      $stmt->execute();
      $link = "http://localhost/project/Integre/Views/verify-email.php?key=" . $verify . "&token=" . $token . "";
      $receiver = $verify;
      $subject = "Email Confirmation";
      $body = $userc->htmlmail($link);
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $headers .= 'From:noreply@urjet.tn' . "\r\n";
      if (mail($receiver, $subject, $body, $headers)) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }
  function notification()
  {
    $mailbox = "{localhost:143}INBOX";
    $username = "godyrex@urjet.tn";
    $password = "22noob22";
    $inbox = imap_open($mailbox, $username, $password) or die("can't connect: " . imap_last_error());
    $emails = imap_search($inbox, 'UNSEEN');
    if ($emails != false) {
      $count = count($emails);
      return $count;
    } else {
      return 0;
    }
  }
  function inbox()
  {
    $mailbox = "{localhost:143}INBOX";
    $username = "godyrex@urjet.tn";
    $password = "22noob22";
    $inbox = imap_open($mailbox, $username, $password);
    $emails = imap_search($inbox, 'UNSEEN') or die("can't connect: " . imap_last_error());
    if (!empty($emails)) {
      //Loop through the emails.
      foreach ($emails as $email) {
        //Fetch an overview of the email.
        $overview = imap_fetch_overview($inbox, $email);
        $overview = $overview[0];
        $message = imap_fetchbody($inbox, $email, '1.1');
        $messageExcerpt = substr($message, 0, 150);
        $partialMessage = trim(quoted_printable_decode($messageExcerpt));
        $date = date("d F, Y", strtotime($overview->date));
        //Print out the subject of the email.
      ?>
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox" value="" id="check1">
              <label for="check1"></label>
            </div>
          </td>
          <td class="mailbox-name"><a href="read-mail.html"><?php echo  htmlspecialchars($overview->from) ?></a></td>
          <td class="mailbox-subject"><b><?php echo  htmlspecialchars($overview->subject) ?></b> - <?php echo htmlspecialchars($partialMessage); ?>
          </td>
          <td class="mailbox-attachment"></td>
          <td class="mailbox-date"><?php echo htmlspecialchars($date) ?></td>
        </tr>
    <?php
        $message = imap_fetchbody($inbox, $email, 1, FT_PEEK);
      }
    }
  }
  function check()
  {
    $con = config::getConnexion();
    // Prepare a select statement
    $sql = "SELECT id, username, email, password, name, lastname, image ,id_o,verified FROM user WHERE id = :username";

    if ($stmt = $con->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(':username', $_SESSION["id"]);
      // Set parameters

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Store result
        while ($row = $stmt->fetch()) {
          $id = $row['id'];
          $username = $row['username'];
          $email = $row['email'];
          $hashed_password = $row['password'];
          $name = $row['name'];
          $lastname = $row['lastname'];
          $image = $row['image'];
          $id_o = $row['id_o'];
          $verified = $row['verified'];
        }

        // Check if username exists, if yes then verify password
        if ($stmt->rowCount() == 1) {
          $sqlo = "SELECT type , description , ban FROM usero WHERE id = ?";
          $stmto = $con->prepare($sqlo);
          $stmto->bindParam(1, $id_o, PDO::PARAM_INT);
          if ($stmto->execute()) {
            while ($row = $stmto->fetch()) {
              $type = $row['type'];
              $description = $row['description'];
              $ban = $row['ban'];
            }
          }
          if ($ban != "Yes") {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["hpassword"] = $hashed_password;
            $_SESSION["name"] = $name;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["id_o"] = $id_o;
            $_SESSION["verified"] = $verified;
            $_SESSION["image"] = $image;
            $_SESSION["type"] = $type;
            $_SESSION["description"] = $description;
            $_SESSION["ban"] = $ban;
            if ($type == "Admin") {
              $_SESSION["Admin"] = true;
              $_SESSION["User"] = false;
            } else {
              $_SESSION["User"] = true;
              $_SESSION["Admin"] = false;
            };
          } else {
            $_SESSION["loggedin"] = false;
            header("location: logout.php");
            echo "Your account is banned!";
          }
        }
      }
    }
  }
  function encryptCookie($value)
  {

    $key = hex2bin(openssl_random_pseudo_bytes(4));

    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

    return (base64_encode($ciphertext . '::' . $iv . '::' . $key));
  }
  function decryptCookie($ciphertext)
  {

    $cipher = "aes-256-cbc";

    list($encrypted_data, $iv, $key) = explode('::', base64_decode($ciphertext));
    return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
  }
  function checklogin()
  {
    $con = config::getConnexion();
    $userc = new userc();
    $id = $userc->decryptCookie($_COOKIE['rememberme']);

    // Fetch records
    $stmt = $con->prepare("SELECT * FROM user WHERE id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetch();
    $id = $count['id'];
    $username = $count['username'];
    $email = $count['email'];
    $hashed_password = $count['password'];
    $name = $count['name'];
    $lastname = $count['lastname'];
    $image = $count['image'];
    $id_o = $count['id_o'];
    $verified = $count['verified'];
    $sqlo = "SELECT type , description , ban FROM usero WHERE id = ?";
    $stmto = $con->prepare($sqlo);
    $stmto->bindParam(1, $id_o, PDO::PARAM_INT);
    if ($stmto->execute()) {
      while ($row = $stmto->fetch()) {
        $type = $row['type'];
        $description = $row['description'];
        $ban = $row['ban'];
      }
    }
    if ($count > 0) {

      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $id;
      $_SESSION["username"] = $username;
      $_SESSION["email"] = $email;
      $_SESSION["hpassword"] = $hashed_password;
      $_SESSION["name"] = $name;
      $_SESSION["lastname"] = $lastname;
      $_SESSION["id_o"] = $id_o;
      $_SESSION["verified"] = $verified;
      $_SESSION["image"] = $image;
      $_SESSION["type"] = $type;
      $_SESSION["description"] = $description;
      $_SESSION["ban"] = $ban;
      if ($type == "Admin") {
        echo "admin";
        $_SESSION["Admin"] = true;
        $_SESSION["User"] = false;
        header("location: AdminPanel.php");
      } else {
        echo "user";
        $_SESSION["User"] = true;
        $_SESSION["Admin"] = false;
        header("location: index.php");
      }
      exit;
    }
  }
  function login($username, $password)
  {
    $con = config::getConnexion();
    $userc = new userc();
    // Prepare a select statement
    $sql = "SELECT id, username, email, password, name, lastname, image ,id_o,verified FROM user WHERE username = :username";

    if ($stmt = $con->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $param_username = $username;
      $stmt->bindParam(':username', $param_username);
      // Set parameters

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Store result
        while ($row = $stmt->fetch()) {
          $id = $row['id'];
          $username = $row['username'];
          $email = $row['email'];
          $hashed_password = $row['password'];
          $name = $row['name'];
          $lastname = $row['lastname'];
          $image = $row['image'];
          $id_o = $row['id_o'];
          $verified = $row['verified'];
        }

        // Check if username exists, if yes then verify password
        if ($stmt->rowCount() == 1) {
          if (password_verify($password, $hashed_password)) {
            // Password is correct, so start a new session
            $sqlo = "SELECT type , description , ban FROM usero WHERE id = ?";
            $stmto = $con->prepare($sqlo);
            $stmto->bindParam(1, $id_o, PDO::PARAM_INT);
            if ($stmto->execute()) {
              while ($row = $stmto->fetch()) {
                $type = $row['type'];
                $description = $row['description'];
                $ban = $row['ban'];
              }
            }
            if ($ban != "Yes") {
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["email"] = $email;
              $_SESSION["hpassword"] = $hashed_password;
              $_SESSION["name"] = $name;
              $_SESSION["lastname"] = $lastname;
              $_SESSION["id_o"] = $id_o;
              $_SESSION["verified"] = $verified;
              $_SESSION["image"] = $image;
              $_SESSION["type"] = $type;
              $_SESSION["description"] = $description;
              $_SESSION["ban"] = $ban;
              if ($type == "Admin") {
                echo "admin";
                $_SESSION["Admin"] = true;
                $_SESSION["User"] = false;
                header("location: AdminPanel.php");
              } else {
                echo "user";
                $_SESSION["User"] = true;
                $_SESSION["Admin"] = false;
                header("location: index.php");
              }
              if (!empty($_POST["remember"])) {
                $days = 30;
                $value = $userc->encryptCookie($id);
                setcookie("rememberme", $value, time() + ($days * 24 * 60 * 60 * 1000));
              } else {
                $days = 30;
                setcookie("rememberme", "", time() - ($days * 24 * 60 * 60 * 1000));
              }
            } else {
              echo "Your account is banned!";
            }

            // Redirect user to welcome page
          } else {
            // Password is not valid, display a generic error message
            echo "Invalid username or password.";
          }
        } else {
          // Username doesn't exist, display a generic error message
          echo "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
    }
  }
  function signup($param_username, $username, $email, $password)
  {
    $con = config::getConnexion();
    $sql = "SELECT id FROM user WHERE username = ?";
    if ($stmt = $con->prepare($sql)) {

      $stmt->bindParam(1, $param_username, PDO::PARAM_STR);


      if ($stmt->execute()) {
        $stmt->fetch();

        if ($stmt->rowCount() == 1) {
          echo "This username is already taken.";
        } else {
          $passwordhash = password_hash($password, PASSWORD_DEFAULT);
          $last_id = 0;
          $sqlo = "INSERT INTO `usero` (`type`, `description`) VALUES ('User', 'Description')";
          $rso = $con->prepare($sqlo);
          if ($rso->execute()) {
            $last_id = $con->lastInsertId();
            $sqll = "INSERT INTO `user` (`username`, `email`, `password`,id_o) VALUES ('$username', '$email', '$passwordhash','$last_id')";
            $rs = $con->prepare($sqll);
            if ($rs->execute()) {
              echo "Accounted Created";
            }
          }
        }
      }
    }
  }
  function reset($emailId, $userc)
  {
    $con = config::getConnexion();

    $result = $con->prepare("SELECT * FROM user WHERE email='" . $emailId . "'");
    $result->execute();

    $row = $result->fetch();

    if ($row) {

      $token = md5($emailId) . rand(10, 9999);

      $expFormat = mktime(
        date("H"),
        date("i") + 2,
        date("s"),
        date("m"),
        date("d"),
        date("Y")
      );

      $expDate = date("Y-m-d H:i:s", $expFormat);

      $update = $con->prepare("UPDATE user set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
      $update->execute();
      $link = "http://localhost/project/Integre/Views/reset-password.php?key=" . $emailId . "&token=" . $token . "";
      $receiver = $_POST["email"];
      $subject = "Reset Password";
      $body = $userc->password($link);
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $headers .= 'From:noreply@urjet.tn' . "\r\n";
      if (mail($receiver, $subject, $body, $headers)) {
        echo "Check Your Email and Click on the link sent to your email";
      } else {
        echo "Sorry, failed while sending mail!";
      }
    }
  }
  function resetpass($password, $token, $emailId)
  {
    $con = config::getConnexion();
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $query = $con->prepare("SELECT * FROM `user` WHERE `reset_link_token`='" . $token . "' and `email`='" . $emailId . "'");
    $query->execute();
    $row = $query->fetch();
    if ($row) {
      $stmt = $con->prepare("UPDATE user set  password='" . $passwordhash . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
      $stmt->execute();
      echo '<p>Congratulations! Your password has been updated successfully.</p>';
    } else {
      echo "<p>Something goes wrong. Please try again</p>";
    }
  }
  function htmlmail($link)
  {
    ob_start(); ?>
    <!DOCTYPE html>
    <html>

    <head>

      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Email Confirmation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css">
        /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
        @media screen {
          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
          }

          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
          }
        }

        /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
        body,
        table,
        td,
        a {
          -ms-text-size-adjust: 100%;
          /* 1 */
          -webkit-text-size-adjust: 100%;
          /* 2 */
        }

        /**
   * Remove extra space added to tables and cells in Outlook.
   */
        table,
        td {
          mso-table-rspace: 0pt;
          mso-table-lspace: 0pt;
        }

        /**
   * Better fluid images in Internet Explorer.
   */
        img {
          -ms-interpolation-mode: bicubic;
        }

        /**
   * Remove blue links for iOS devices.
   */
        a[x-apple-data-detectors] {
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          color: inherit !important;
          text-decoration: none !important;
        }

        /**
   * Fix centering issues in Android 4.4.
   */
        div[style*="margin: 16px 0;"] {
          margin: 0 !important;
        }

        body {
          width: 100% !important;
          height: 100% !important;
          padding: 0 !important;
          margin: 0 !important;
        }

        /**
   * Collapse table borders to avoid space between cells.
   */
        table {
          border-collapse: collapse !important;
        }

        a {
          color: #1a82e2;
        }

        img {
          height: auto;
          line-height: 100%;
          text-decoration: none;
          border: 0;
          outline: none;
        }
      </style>

    </head>

    <body style="background-color: #e9ecef;">

      <!-- start preheader -->
      <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
        A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
      </div>
      <!-- end preheader -->

      <!-- start body -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <!-- start logo -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <tr>
                <td align="center" valign="top" style="padding: 36px 24px;">
                  <a href="http://localhost/project/Integre/img/urjet.png" target="_blank" style="display: inline-block;">
                    <img src="http://localhost/project/Integre/img/urjet.png" alt="Logo" border="0" width="48" style="display: block; width: 48px; max-width: 48px; min-width: 48px;">
                  </a>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end logo -->

        <!-- start hero -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                  <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Confirm Your Email Address</h1>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end hero -->

        <!-- start copy block -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                  <p style="margin: 0;">Tap the button below to confirm your email address. If you didn't create an account with <a href="http://localhost/project/Integre/index.php">UrJet</a>, you can safely delete this email.</p>
                </td>
              </tr>
              <!-- end copy -->

              <!-- start button -->
              <tr>
                <td align="left" bgcolor="#ffffff">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                              <a href="<?php echo $link ?>" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Confirm your email</a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- end button -->

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                  <p style="margin: 0;">If that doesn't work, copy and paste the following link in your browser:</p>
                  <p style="margin: 0;"><a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a></p>
                </td>
              </tr>
              <!-- end copy -->

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                  <p style="margin: 0;">Cheers,<br> UrJet</p>
                </td>
              </tr>
              <!-- end copy -->

            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end copy block -->

        <!-- start footer -->
        <!-- end footer -->

      </table>
      <!-- end body -->

    </body>

    </html>
  <?php
    $my_var = ob_get_clean();
    return $my_var;
  }
  function password($link)
  {
    ob_start(); ?>
    <!DOCTYPE html>
    <html>

    <head>

      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Password Reset</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css">
        /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
        @media screen {
          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
          }

          @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
          }
        }

        /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
        body,
        table,
        td,
        a {
          -ms-text-size-adjust: 100%;
          /* 1 */
          -webkit-text-size-adjust: 100%;
          /* 2 */
        }

        /**
   * Remove extra space added to tables and cells in Outlook.
   */
        table,
        td {
          mso-table-rspace: 0pt;
          mso-table-lspace: 0pt;
        }

        /**
   * Better fluid images in Internet Explorer.
   */
        img {
          -ms-interpolation-mode: bicubic;
        }

        /**
   * Remove blue links for iOS devices.
   */
        a[x-apple-data-detectors] {
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          color: inherit !important;
          text-decoration: none !important;
        }

        /**
   * Fix centering issues in Android 4.4.
   */
        div[style*="margin: 16px 0;"] {
          margin: 0 !important;
        }

        body {
          width: 100% !important;
          height: 100% !important;
          padding: 0 !important;
          margin: 0 !important;
        }

        /**
   * Collapse table borders to avoid space between cells.
   */
        table {
          border-collapse: collapse !important;
        }

        a {
          color: #1a82e2;
        }

        img {
          height: auto;
          line-height: 100%;
          text-decoration: none;
          border: 0;
          outline: none;
        }
      </style>

    </head>

    <body style="background-color: #e9ecef;">

      <!-- start preheader -->
      <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
        A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
      </div>
      <!-- end preheader -->

      <!-- start body -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <!-- start logo -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <tr>
                <td align="center" valign="top" style="padding: 36px 24px;">
                  <a href="http://localhost/project/Integre/img/urjet.png" target="_blank" style="display: inline-block;">
                    <img src="http://localhost/project/Integre/img/urjet.png" alt="Logo" border="0" width="48" style="display: block; width: 48px; max-width: 48px; min-width: 48px;">
                  </a>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end logo -->

        <!-- start hero -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                  <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset your password</h1>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end hero -->

        <!-- start copy block -->
        <tr>
          <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                  <p style="margin: 0;">Tap the button below to reset your password. If you didn't create an account with <a href="http://localhost/project/Integre/index.php">UrJet</a>, you can safely delete this email.</p>
                </td>
              </tr>
              <!-- end copy -->

              <!-- start button -->
              <tr>
                <td align="left" bgcolor="#ffffff">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                              <a href="<?php echo $link ?>" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">reset your password</a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- end button -->

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                  <p style="margin: 0;">If that doesn't work, copy and paste the following link in your browser:</p>
                  <p style="margin: 0;"><a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a></p>
                </td>
              </tr>
              <!-- end copy -->

              <!-- start copy -->
              <tr>
                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                  <p style="margin: 0;">Cheers,<br> UrJet</p>
                </td>
              </tr>
              <!-- end copy -->

            </table>
            <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
          </td>
        </tr>
        <!-- end copy block -->

        <!-- start footer -->
        <!-- end footer -->

      </table>
      <!-- end body -->

    </body>

    </html>
<?php
    $my_var = ob_get_clean();
    return $my_var;
  }
}
?>