
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
    if(isset($_GET['Grp'])){
        $codeGrp = intval($_GET['Grp']);
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <?php  include "includes/head.php";?>
</head>

<body>
        <div class="container-scroller">
        <?php
            if($rst['idRole'] == 2){
            include "sidebarSec.php";
            }elseif($rst['idRole'] == 3){
            include "sidebarCompt.php";
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
                                    <h4 class="card-title">Liste du groupe <?=$codeGrp?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>id Part</th>
                                                    <th>nom</th>
                                                    <th>prenom</th>
                                                    <th>Niveau</th>
                                                    <th>Tel</th>
                                                    <th>Date passage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($con,"SELECT * FROM groupe WHERE codeGrp='$codeGrp'");
                                                    while($result = mysqli_fetch_array($sql)){
                                                        $idPart = $result['idPart'];
                                                        $row1 = mysqli_query($con, "SELECT * FROM participant WHERE idPart = '$idPart'");
                                                        $rst1 = mysqli_fetch_array($row1);

                                                        $idNiv = $rst1['idNiv'];
                                                        $row2 = mysqli_query($con, "SELECT * FROM niveau WHERE idNiv = '$idNiv'");
                                                        $rst2 = mysqli_fetch_array($row2);
                                                    
                                                ?>
                                                        <tr>
                                                            <td><?=$idPart?></td>
                                                            <td><?=$rst1['nom']?></td>
                                                            <td><?=$rst1['prenom']?></td>
                                                            <td><?=$rst2['libNiv']?></td>
                                                            <td>
                                                            <?=$rst1['numTel']?>
                                                            </td>
                                                            <td>
                                                                22/10/2022
                                                            </td>
                                                        </tr>
                                                <?php } ?>
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
        <!-- plugins:js -->
        <?php include "includes/script.php"?>




    </body>

</html>