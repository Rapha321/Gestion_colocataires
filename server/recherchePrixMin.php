<?php 
    session_start(); 
    include('Configuration.php');

    //Filtrer Type de logement
    $min = $_POST['min'];
    $min = intval($min);

    if ($min == null) {
        header("location:afficherTousLocation.php");
    } else {
        $select = $bdd->prepare("SELECT * FROM locations WHERE montant_loyer >= '{$min}'");
    }

      
    $select->execute();
    while ($info = $select->fetch())
    {
?>

    <tr>
        <td>&nbsp;&nbsp; <i class="far fa-heart"></i>&nbsp;&nbsp;</td>
        <td class="img">
            <?php 
                echo '<img src="data:image/jpg;base64,' . base64_encode( $info['image'] ) . '" width="100px" height="100px" />';
            ?>
        </td>  
        <td class="td2">
            <span class="type"> <?php echo $info['types']; ?> </span> à 
            <span class="ville"> <?php echo $info['ville']; ?> </span>
            <span class="prix"> $<?php echo $info['montant_loyer']; ?> </span>
            <hr>
            <span class="descr-favori"> <?php echo $info['description']; ?> </span>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
   
<?php
    }
?>

