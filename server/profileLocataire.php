<?php session_start (); ?>

<!DOCTYPE html>
<html>

<head>
    <title>template</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../styles/style.css">

    <!-- JAVASCRIPT -->
    <!-- <script language="javascript" type="text/javascript" src="index.js"></script> -->

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <figure>
        <?php 
            echo '<img src="data:image/jpg;base64,' . base64_encode( $_SESSION['donnees']['pic'] ) . '" />';
        ?>
    </figure>

    <div>
        <table>
            <tr>
                <th>Nom </th>
                <td>&nbsp; : &nbsp;</td>
                <td><?php echo $_SESSION['donnees']['nom']?></td>
            </tr>
            <tr>
                <th>Prenom </th>
                <td>&nbsp; : &nbsp;</td>
                <td><?php echo $_SESSION['donnees']['prenom']?></td>
            </tr>
            <tr>
                <th>Desctiption </th>
                <td>&nbsp; : &nbsp;</td>
                <td><?php echo $_SESSION['donnees']['descriptions']?></td>
            </tr>
        </table>
    </div>

    <div>
        <br><br>
        <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chercher un location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary">
        <br><br>
        <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-info">
        <br><br>
        <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Effacer profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-danger">
    </div>

</body>

</html>