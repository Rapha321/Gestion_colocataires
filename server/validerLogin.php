<?php

include('Configuration.php');

$select = $bdd->query('SELECT * FROM locataire');



?>

<?php
while($donnees = $select->fetch()){
?>

<table>
    <tr>
        <td> <?php echo $donnees['nom'] ?> </td>
    </tr>
    <tr>
        <td> <?php echo $donnees['prenom'] ?> </td>
    </tr>
</table>

<?php
}
?>