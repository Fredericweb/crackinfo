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
                                <h4 class="card-title">Liste De passage grpCode :</h4>
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
                                                <th>Note</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cpt = 0;
                                                    $sql = mysqli_query($con,"SELECT * FROM groupe");

                                                    while($result = mysqli_fetch_array($sql)){
                                                        
                                                        // recuperation de la date de debut
                                                        $datedeb = $result['datdeb'];
                                                        $d = date_create($datedeb);
                                                        $deb = date_format($d,"Y-m-d");

                                                        // recuperation de la date de fin
                                                        $dateFin = $result['datFin'];
                                                        $f = date_create($dateFin);
                                                        $fin = date_format($f,"Y-m-d");

                                                        // date du jour
                                                        $day = date("Y-m-d");

                                                       
                                                        if($deb<=$day && $day<$fin){

                                                            // recuperation des info participant
                                                            $idPart = $result['idPart'];
                                                            $row1 = mysqli_query($con, "SELECT * FROM participant WHERE idPart = '$idPart'");
                                                            $rst1 = mysqli_fetch_array($row1);
                                                            
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
                                                        <i class="mdi mdi-information"></i>
                                                        Noter
                                                    </button>

                                                    <div class="modal fade bd-example-modal-sm<?=$cpt?>" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Note/20
                                                                    </h5>
                                                                    <button type="button" class="btn-close btn"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="includes/add_note.php" method="post">
                                                                        <input type="hidden" name="idadmin" value="<?=$idadmin?>">
                                                                        <input type="hidden" name="idpart" value="<?=$idPart?>">
                                                                        <input type="hidden" name="idspe" value="<?=$result['idSpe']?>">
                                                                        <input type="number" class="form-control mb-2" name="note"  Required>
                                                                        <div class="modal-footer">
                                                                            <input type="submit" name="save"
                                                                                value="Modifier"
                                                                                class="btn btn-primary">
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <?php 
                                             $cpt++;
                                            } 
                                            }?>
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