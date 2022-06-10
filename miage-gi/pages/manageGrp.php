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
                                <h4 class="card-title">Listes des Groupes de passage</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>N°Grp</th>
                                                <th>Specificité</th>
                                                <th>Nbr Participant</th>
                                                <th>Action</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            for($i=1;$i<5;$i++){
                                            $sql = mysqli_query($con,"SELECT DISTINCT * FROM Groupe WHERE idSpe='$i'");
                                            while($result = mysqli_fetch_array($sql)){
                                                // $idNiv = $result['id_niveau'];
                                                $row = mysqli_query($con, "SELECT * FROM specificite WHERE idSpe = '$i'");
                                                $rst = mysqli_fetch_array($row);
                                        ?>
                                            <tr>
                                                <?php
                                                    $codeGrp=$result['codeGrp'];
                                                    $cpt = 0;
                                                    $sql2 = mysqli_query($con,"SELECT * FROM groupe WHERE codeGrp='$codeGrp'");
                                                    while($result = mysqli_fetch_array($sql2)){
                                                        $cpt++;
                                                    } 
                                                ?>
                                                <td><?=$codeGrp?></td>
                                                <?php 
                                                      // change les couleurs d'arriere plan 
                                                        if($i == 1){
                                                            $color = "badge-warning";
                                                        }elseif($i == 2){
                                                            $color = "badge-danger";
                                                        }elseif($i == 3){
                                                            $color = "badge-primary";
                                                        }else{
                                                            $color = "badge-success";
                                                        }
                                                ?>
                                                <td><label class="badge <?=$color?>"> <?=$rst['libSpe']?> </label></td>
                                                <td><?=$cpt?></td>
                                                <td><div class="dropdown">
                                                    <a href="./manageGrpList.php?Grp=<?=$codeGrp?>" class="btn btn-info btn-icon " >
                                                      <i class="mdi mdi-information"></i>
                                                    </a>
                                                  </div></td>
                                                <td></td>
                                                <td>
                                                    
                                                </td>
                                                
                                            </tr>
                                        <?php }} ?>
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