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
                                <h4 class="card-title">Liste du personnel</h4>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-sm btn-icon-text btn-inverse-success border"
                                        data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">
                                        <i class="mdi mdi-plus btn-icon-prepend"></i> Ajouter un utilisateur
                                    </button>
                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modifier les informations</h5>
                                                    <button type="button" class="btn-close btn" data-bs-dismiss="modal">
                                                        <i class="mdi mdi-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="includes/add_persl.php" method="post">
                                                        <input type="text" class="form-control mb-2" name="nom" id=""
                                                            placeholder="Nom"  required>
                                                        <input type="text" class="form-control mb-2" name="prenom" id=""
                                                            placeholder="Prenom"  required>
                                                            <select class="form-control mb-2" name="role" Required>
                                                                <option>
                                                                    Selectionner le role
                                                            </option>
                                                            <?php
                                                                $query= mysqli_query($con,"SELECT * FROM role");

                                                                while($row = mysqli_fetch_array($query)){
                                                                ?>
                                                                 <option>
                                                                 <?= htmlentities($row['libRole']) ?>
                                                                 </option>

                                                            <?php }?>
                                                            </select>

                                                            <select class="form-control mb-2" name="sexe" Required>
                                                                <option>
                                                                    Selectionner le sexe
                                                            </option>
                                                            <?php
                                                                $query2= mysqli_query($con,"SELECT * FROM sexe");

                                                                while($row2 = mysqli_fetch_array($query2)){
                                                                ?>
                                                                 <option>
                                                                 <?= htmlentities($row2['libSexe']) ?>
                                                                 </option>

                                                            <?php }?>
                                                            </select>
                                                        <input type="text" class="form-control mb-2" name="password"
                                                            id="" placeholder="Nouveau Mot de passe" required>
                                                        <input type="text" class="form-control mb-2" name="Cpassword"
                                                            id="" placeholder="Confirmer le mot de passe" required>
                                                        <input type="file" name="photo" id="">
                                                        <div class="modal-footer">
                                                            <input type="submit" name="save" value="Sauvegarder"
                                                                class="btn btn-success">
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Role</th>
                                                <th>Sexe</th>
                                                <th>Login</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cpt = 0;
                                                    $sql = mysqli_query($con,"SELECT * FROM admininfo");
                                                    while($result = mysqli_fetch_array($sql)){

                                                        $idrole = $result['idRole'];
                                                        $sql2 = mysqli_query($con,"SELECT * FROM role WHERE idRole='$idrole'");
                                                        $result2 = mysqli_fetch_array($sql2);
                                                         // change les couleurs d'arriere plan 
                                                        if($idrole == 1){
                                                            $color = "badge-warning";
                                                        }elseif($idrole == 2){
                                                            $color = "badge-danger";
                                                        }elseif($idrole == 3){
                                                            $color = "badge-primary";
                                                        }
                                                        $idsexe = $result['idSexe'];
                                                        $sql3 = mysqli_query($con,"SELECT * FROM sexe WHERE idSexe='$idsexe'");
                                                        $result3 = mysqli_fetch_array($sql3);

                                                ?>
                                            <tr>
                                                <td>
                                                    <?=$result['nom']?>
                                                </td>
                                                <td>
                                                    <?=$result['prenom']?>
                                                </td>
                                                <td>
                                                    <label class="badge <?=$color?>">
                                                        <?=$result2['libRole']?>
                                                    </label>
                                                </td>
                                                <td>
                                                    <?=$result3['libSexe']?>
                                                </td>
                                                <td>
                                                    <?=$result['login']?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-icon-text"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".bd-example-modal-sm<?=$cpt?>">
                                                        <i class="mdi mdi-information"></i>
                                                        Modifier
                                                    </button>

                                                    <div class="modal fade bd-example-modal-sm<?=$cpt?>" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modifier les informations
                                                                    </h5>
                                                                    <button type="button" class="btn-close btn"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="includes/personnel.php"
                                                                        method="post">
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?=$result['idAdmin']?>">
                                                                        <input type="text" class="form-control mb-2"
                                                                            name="mdp" id=""
                                                                            placeholder="<?=$result['password']?>">

                                                                        <select class="form-control" name="role">
                                                                            <option>
                                                                                <?=$result2['libRole']?>
                                                                            </option>
                                                                            <?php
                                                                                $query= mysqli_query($con,"SELECT * FROM role");

                                                                                while($row = mysqli_fetch_array($query)){
                                                                            ?>
                                                                            <option>
                                                                                <?= htmlentities($row['libRole']) ?>
                                                                            </option>

                                                                            <?php }?>
                                                                        </select>
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
                                            </tr>
                                            <?php 
                                             $cpt++;
                                            } ?>
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