
<?php 
    session_start(); 
    include('Configuration.php');

    // Filtrer Ville
    $ville = $_POST['id'];
    $ville = trim($ville);

    if ($ville == "neutre") {
        header("location:afficherTousLocation.php");
    }
    
    $select = $bdd->prepare("SELECT * FROM locations WHERE ville = '$ville'");
    $select->execute();

    while ($info = $select->fetch()) {

?>

<tr>
        <td class="heart-favori">
            <a href="ajouterFavori.php?id_L=<?php echo $info['id_location'] ?>"> 
                <button id="btn-heart" class="btn btn-info"><i class="far fa-heart"></i></button> 
            </a> 
            <a href="detailLocation.php?id_L=<?php echo $info['id_location'] ?>"> 
                <button id="btn-star" class="btn btn-warning"><i class="fas fa-star"></i></button>
            </a> 
        </td>
        <td class="img">
            <?php 
                echo  '<img src="../images/'.$info['pic'].'" width=100px" height="100px" />';
            ?>
        </td>  
        <td class="td2">
            <div class="top-section">
                <span class="type"> <?php echo $info['types']; ?> </span> &nbsp; | &nbsp; 
                <span class="grandeur"> <?php echo $info['grandeur']; ?> </span> &nbsp; | &nbsp;
                <span class="ville"> <?php echo $info['ville']; ?> </span>
                <span class="prix"> $<?php echo $info['montantloyer']; ?> </span>
            </div>
           
            <hr>
            <span class="descr-favori"> <?php echo $info['descriptions']; ?> </span>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>

<?php
   
    }
    $select->closeCursor();
?>

