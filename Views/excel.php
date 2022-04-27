<?php
require_once "config.php";
header("Content-Type: application/xls");   
$fileName = "User_list".date('d-m-Y').".xls"; 
header("Content-Disposition: attachment; filename=student_list.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
if (isset($_POST["submit"])) {
  $query = "SELECT user.username,user.name,user.lastname,user.id, user.email, user.image,usero.type,usero.description,usero.ban 
  From user 
  INNER JOIN usero 
  ON user.id_o = usero.id";
  $res = $con->prepare($query);
  $res->execute();
  $res->fetch();
  $export ="";
  if ($res->rowCount() > 0) {
  $export .='
 <table> 
 <tr> 
 <th>ID</th>
 <th>Username</th>
 <th>Email address</th>
 <th>Name</th>
 <th>Lastname</th>
 <th>Image</th>
 <th>Account Type</th>
 <th>Description</th>
 <th>Banned</th>
 
 </tr>
 ';
    while ($row=$res->fetch()) {
      $export .='
 <tr>
 <td>'.$row["id"].'</td> 
 <td>'.$row["username"].'</td>
 <td>'.$row["email"].'</td>
 <td>'.$row["name"].'</td>
 <td>'.$row["lastname"].'</td>
 <td>'.$row["image"].'</td>
 <td>'.$row["type"].'</td>
 <td>'.$row["description"].'</td>
 <td>'.$row["ban"].'</td> 
 
 
 </tr>
 ';
    }
    $export .= '</table>';
    echo $export;
  }
}
?>