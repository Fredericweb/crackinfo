<?php 
    session_start();
    include('../../config.php');
    
    if(strlen($_SESSION['idAdmin'])==0)
    { 
        header('location:login.php');
    }else{
        $idadmin = $_SESSION['idAdmin'];
        $query = mysqli_query($con,"SELECT * FROM admininfo WHERE idAdmin='$idadmin'");
        $rst = mysqli_fetch_array($query);
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php  include "includes/head.php";?>
</head>

<body>
    <div class="container-scroller">
    <?php
            if($rst['idRole'] == 2){
            include "includes/sidebarJury.php";
            }else{
            include "includes/sidebar.php";
            }
        ?>


        <div class="container-fluid page-body-wrapper">
        <?php include "includes/header.php"?>

            <div class="main-panel">
                <div class="content-wrapper pb-0">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Resultat</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>idPart</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Classe</th>
                                                <th>Notes</th>
                                                <th>Travaux</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    // recuperation de la date de debut
                                                    $sqlP = mysqli_query($con,"SELECT * FROM parametre");
                                                    $resultP = mysqli_fetch_array($sqlP);
                                                    $datedeb = $resultP['debutEvent'];
                                                    $d = date_create($datedeb);
                                                    $deb = date_format($d,"Y-m-d");
                                                    
                                                    // date du jour
                                                    $day = date("Y-m-d");

                                                    $cpt = 0;
                                                    $row1 = mysqli_query($con, "SELECT * FROM participant");
                                                    while($rst1 = mysqli_fetch_array($row1)){
                                                        $idPart = $rst1['idPart'];
                                                        // recuperation du niveau participant
                                                        $idNiv = $rst1['idNiv'];
                                                        $row2 = mysqli_query($con, "SELECT * FROM niveau WHERE idNiv = '$idNiv'");
                                                        $rst2 = mysqli_fetch_array($row2);

                                                ?>
                                            <tr>
                                                <td>
                                                    <?=$idPart?>
                                                </td>
                                                <td>
                                                    <?=$rst1['nom']?>
                                                </td>
                                                <td>
                                                    <?=$rst1['prenom']?>
                                                </td>
                                                <td>
                                                    <?=$rst2['libNiv']?>
                                                </td>
                                                <td>
                                                    
                                                    <button type="button" class="btn btn-info btn-icon-text"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".bd-example-modal-sm<?=$cpt?>">
                                                        <i class="mdi mdi-download"></i>
                                                        Travaux
                                                    </button>

                                                    <div class="modal fade bd-example-modal-sm<?=$cpt?>" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Travaux 
                                                                    </h5>
                                                                    <button type="button" class="btn-close btn"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <?php
                                                                           // recuperation des info participant

                                                                            
                                                                            $sql = mysqli_query($con,"SELECT * FROM groupe WHERE idpart = '$idPart'");

                                                                            while($result = mysqli_fetch_array($sql)){

                                                                                // recuperation des travaux 
                                                                                $spe = $result['idSpe'];
                                                                                $row3 = mysqli_query($con, "SELECT * FROM travaux WHERE idSpe = '$spe'");
                                                                                $rst3 = mysqli_fetch_array($row3);

                                                                                $row4 = mysqli_query($con,"SELECT * FROM specificite WHERE idSpe = '$spe'");
                                                                                $rst4 = mysqli_fetch_array($row4);
                                                                                $libspe = $rst4['libSpe'];
                                                                        ?>
                                                                    <label class="mb-3">
                                                                        <?=$libspe;?>
                                                                    </label>
                                                                    <a class="btn btn-icon-text btn-success" href="
                                                                    <?php
                                                                    if($rst3['Travaux']){
                                                                        $trav =$rst3['Travaux'];
                                                                        echo "../../user/assets/Travaux/$trav";
                                                                    }
                                                                    ?>
                                                                    ">
                                                                    <i class="mdi mdi-download"></i>
                                                                    Travaux</a>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-icon-text"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".bd-example-modal-sm<?="n$cpt"?>">
                                                        <i class="mdi mdi-information"></i>
                                                        Notes
                                                    </button>

                                                    <div class="modal fade bd-example-modal-sm<?="n$cpt"?>" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Notes et moyennes
                                                                    </h5>
                                                                    <button type="button" class="btn-close btn"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <?php 
                                             $cpt++;
                                            } 
                                            ?>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
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
    <!-- container-scroller -->
    <?php include "includes/script.php"?>




</body>

</html>