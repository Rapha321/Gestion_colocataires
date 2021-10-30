<?php session_start (); ?>

<!DOCTYPE html>
<html>

<head>
    <title>template</title>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="../styles/style.css"> -->

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        #btn {
            width: 350px;
            height: 35px;
            margin-bottom: 5px;
            display: flex;
            justify-content: center;
        }

        #btn-Chercher {
            width: 350px;
            height: 45px;
            display: flex;
            justify-content: center;
        }

        #container2 {
            width: 20%;
            height: 70%;
        }

        .prix {
            float: right;
            font-weight: bold;
            font-size: large;
        }

        .type {
            font-weight: bold;
        }

    </style>

</head>

<body>
        <div>
            <figure>
                <?php 
                    echo '<img src="data:image/jpg;base64,' . base64_encode( $_SESSION['donnees']['pic'] ) . '" />';
                ?>
            </figure>

            <div>
                <table class="favori">
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
                
                <input id="btn" type="submit" value="Modifier profile" class="btn btn-info">
                <input id="btn" type="submit" value="Supprimer profile" class="btn btn-danger">
            </div>
        </div>
        
        <div class="jumbotron">
            <h4>Mes favori:</h4>
            <div >
                <table class="favori">
                    <tr>
                        <td>&nbsp;&nbsp;<input type="checkbox">&nbsp;&nbsp;</td>
                        <td>
                            <span class="type">Studio</span>
                            <span class="prix">$700</span>
                            <hr>
                            <p>Studio a ouer. Tout inclus. Disponibles immediatements. Meubler!!!</p>
                        </td>
                        <td><picture>picture goes here</picture></td>
                    </tr>
                </table>
            </div>
            
            <br><br>
            <input id="btn-Chercher" type="submit" value="Chercher un location" class="btn btn-primary">
        </div>
   
</body>

</html>