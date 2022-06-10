<!DOCTYPE html>
<html lang="fr">

<head>
    
    <?php 
    session_start();
    include('../../config.php');
    include "includes/head.php";
    if(strlen($_SESSION['idAdmin'])==0)
    { 
        header('location:login.php');
    }else{
        $idadmin = $_SESSION['idAdmin'];
        $query = mysqli_query($con,"SELECT * FROM admininfo WHERE idAdmin='$idadmin'");
        $rst = mysqli_fetch_array($query);
    }
    ?>

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
                                <h4 class="card-title">Liste Des Participants</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id part</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Niveau</th>
                                                <th>Nbr Specificité</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = mysqli_query($con,"SELECT * FROM participant");
                                                while($rst = mysqli_fetch_array($sql)){
                                            ?>

                                            <tr>
                                                <td><?= $rst['idPart'] ?></td>
                                                <td> <?= $rst['nom'] ?> </td>
                                                <td><?= $rst['prenom'] ?></td>
                                                <?php 
                                                    $idNiv = $rst['idNiv'];
                                                    $sql1 = mysqli_query($con, "SELECT * FROM niveau WHERE idNiv ='$idNiv'");
                                                    $rst1 = mysqli_fetch_array($sql1);

                                                    // change les couleurs d'arriere plan 
                                                    if($idNiv == 1){
                                                        $color = "badge-warning";
                                                    }elseif($idNiv == 2){
                                                        $color = "badge-danger";
                                                    }elseif($idNiv == 3){
                                                        $color = "badge-primary";
                                                    }else{
                                                        $color = "badge-success";
                                                    }
                                                ?>

                                                <td><label class="badge <?=$color?>"><?= $rst1['libNiv'] ?></label></td>
                                                <td>
                                                    <?php
                                                        $idpart= $rst['idPart'];
                                                        $query = mysqli_query($con,"SELECT * FROM choix WHERE idPart='$idpart'");
                                                        $resultat = mysqli_num_rows($query);
                                                        echo $resultat;
                                                    ?>
                                                </td>
                                                
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="detailPart.php?idP=<?= $rst['idPart'] ?>" class="btn btn-info ">
                                                          <i class="mdi mdi-clock"></i>
                                                        </a>
                                                      </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
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