<?php 
session_start();
include('../includes/config.php');

if(strlen($_SESSION['id_user'])==0)
  { 
    header('location:../login.php');
  }
else{

  $iduser = $_SESSION['id_user'];
  $query = mysqli_query($con,"SELECT * FROM user WHERE id_user='$iduser'");
  $rst = mysqli_fetch_array($query);
}
if(isset($_GET['numrecu'])){

    $numvers = intval($_GET['numrecu']);
    $sql = mysqli_query($con, "SELECT * FROM versement WHERE num_vers='$numvers'");
    $rst0 = mysqli_fetch_array($sql);
    $rstcount = mysqli_num_rows($sql);
    if($rstcount == 0){
        echo "<script></script>";
        echo "<script language='javascript'>
        alert('reçu invalide !!!');
        document.location='javascript:history.back()';
        </script>";
    }else{
        $idetud = $rst0['id_etud'];
        $row1 = mysqli_query($con, "SELECT * FROM etudiants WHERE id_etud = '$idetud'");
        $rst1 = mysqli_fetch_array($row1);

        $idNiv = $rst1['id_niveau'];
        $row2 = mysqli_query($con, "SELECT * FROM niveau WHERE id_niveau = '$idNiv'");
        $rst2 = mysqli_fetch_array($row2);
    
    }

       
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recu</title>

    <!-- BOXICONS -->
    <link rel="stylesheet" href="./icon/icon.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="styles.css">

    <?php
        include "../pages/head.php"
    ?>

</head>

<body>
    <div class="container-scroller">
    <?php
    if($rst['id_role'] == 2){
      include "sidebarSec.php";
    }elseif($rst['id_role'] == 3){
      include "sidebarCompt.php";
    }else{
      include "sidebar.php";
    }
    ?>

        <div class="container-fluid page-body-wrapper">
            <?php include "../pages/header.php"?>

            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reçu versement</h4>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success" onclick="PDF();"><i class="mdi mdi-download"></i>Télécharger le reçu</button>
                                <a href="../pages/listeVersEtud.php" class="btn btn-primary">
                                Retour</a>
                                <div class="container">
                                    <div class="head">
                                        <div class="box ufhb">
                                            <img src="./logo_test.png" alt="">
                                        </div>
                                        <div class="box info">
                                            <h3>
                                                Filière professionnalisées UFR MI <br> UNIVERSITE DE COCODY
                                            </h3>
                                            <p>22 B.P. 582 Abidjan 22</p>
                                            <p>Tel:(fax):22 41 05 74 / 22 48 01 40</p>
                                            <p class="cel">Cel:07 89 94 26 / 07 69 15 04 </p>

                                        </div>
                                        <div class="box miage">
                                            <img src="./Miage_logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="recu">
                                        <h2>Reçu:</h2>
                                        <h2 class="num">N°
                                            <?=$numvers?>
                                        </h2>
                                    </div>
                                    <div class="content">
                                        <div class="left">
                                            <p>Reçu de M: <strong>
                                                    <?= $rst1['nom_etud']?>
                                                    <?= $rst1['Prenom_etud'] ?>
                                                </strong> </p>
                                            <p>Somme de: <strong>
                                                    <?= $rst0['montant_vers'] ?>fcfa
                                                </strong> </p>
                                            <p>En reglement de: <strong>sco 22-23</strong> </p>
                                            <p>Année d'etude: <strong>
                                                    <?= $rst2['libel_niveau']?>
                                                </strong> </p>
                                            <p>Reste à payer: <strong>
                                                    <?= $rst0['rest'] ?> fcfa
                                                </strong> </p>
                                            <p>Date de payement: <strong>
                                                    <?= $rst0['date'] ?>
                                                </strong> </p>


                                        </div>
                                        <div class="right">
                                            <img src="../assets/images/Qrcode/<?= $numvers ?>.png" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            AsteroDesign 2022</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="http://asterodesign.ml/" target="_blank">AsteroDesign</a> pour Miage-Gi.com</span>
                    </div>
                </footer>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <?php include "../pages/script.php"?>
    <!-- HTML2PDF SOURCE -->
    <script src="./html2pdf.bundle.js"></script>
    <script src="./html2pdf.bundle.min.js"></script>
    <!-- CUSTOM JS -->
    <script type="text/javascript">

        function PDF() {
            const e = document.querySelector(".container");

            // OPTIONS
            const opt = {
                filename: 'recuMiage.pdf',
                image: {
                    type: "jpeg",
                    quality: 0.99
                },
                margin: 0,
                jsPDF: {
                    unit: "in",
                    format: "letter",
                    orientation: "portrait"
                },
                html2canvas: { scale: 2 },
            };
            html2pdf().set(opt).from(e).save();

            // RESIZE
            setTimeout(() => { e.style.maxWidth = "1200px"; }, 2000);
        }

    </script>

</body>

</html>