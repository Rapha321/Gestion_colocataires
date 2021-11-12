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
    $info = $select->fetchAll();

    for ($i = 0; $i < sizeof($info); $i++)
    {

?>

    <tr>
        <td>
            <button id="btn-heart" class="btn btn-info"><i class="far fa-heart"></i></button>
            <button id="btn-star" class="btn btn-warning"><i class="fas fa-star"></i></button>
        </td>
        <td class="img">
            <?php 
                echo '<img src="data:image/jpg;base64,' . base64_encode( $info[$i]['pic'] ) . '" width="100px" height="100px" />';
            ?>
        </td>  
        <td class="td2">
            <div class="top-section">
                <span class="type"> <?php echo $info[$i]['types']; ?> </span> &nbsp; | &nbsp; 
                <span class="grandeur"> <?php echo $info[$i]['grandeur']; ?> </span> &nbsp; | &nbsp;
                <span class="ville"> <?php echo $info[$i]['ville']; ?> </span>
                <span class="prix"> $<?php echo $info[$i]['montantloyer']; ?> </span>
            </div>
           
            <hr>
            <span class="descr-favori"> <?php echo $info[$i]['descriptions']; ?> </span>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
   
<?php
    $select->closeCursor();
    }
?>

