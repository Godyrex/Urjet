<?php
require_once "connexionbd.php";
$results = mysqli_query($link,"SELECT * FROM maintenance LIMIT 10");
while ($row = mysqli_fetch_array($results)) {
?> 
 <table>
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['etat'] ?></td>
    <td><?php echo $row['prix'] ?></td>
  </tr>
</table>
<?php
}
?>