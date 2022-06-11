<!DOCTYPE html>
<html lang="en">

<?php 
  session_start();
  include "includes/head.php";
  include "../../../config.php";

  if(strlen($_SESSION['idAdmin'])==0)
  { 
    header('location:../login.php');
  }
else{

  $idadmin = $_SESSION['idAdmin'];
  $query = mysqli_query($con,"SELECT * FROM admininfo WHERE idAdmin='$idadmin'");
  $rst = mysqli_fetch_array($query);

  $rq = mysqli_query($con,"SELECT * FROM participant");
  $rst1 = mysqli_num_rows($rq);

  $rq2 = mysqli_query($con,"SELECT DISTINCT codeGrp FROM groupe");
  $rst2 = mysqli_num_rows($rq2);

// Freestyle mensonge
  // $cptw = 0;
  for($s=1;$s<5;$s++){
    $rq2 = mysqli_query($con,"SELECT * FROM groupe WHERE idSpe='$s'");
    $count2 = mysqli_num_rows($rq2);
    $pre = $s-1;
    $rqs = mysqli_query($con,"SELECT * FROM groupe WHERE idSpe='$pre'");
    $count = mysqli_num_rows($rqs);

    $cptw = ceil($count/3);
    // echo "//$cptw//";
    
    $rqparam = mysqli_query($con,"SELECT * FROM parametre");
    $rstparam = mysqli_fetch_array($rqparam);
    
    for($i=0;$i<($count2/3);$i++){

      $codGrp = "$s$i";
      $prec = $i-1;
      if($prec<0){
        $p = $i+1;
        $grpP = "$pre$p";
      }else{
        $grpP = "$s$prec";
      }
      $rqpr = mysqli_query($con,"SELECT DISTINCT * FROM groupe WHERE codeGrp='$grpP'");
      $rspr = mysqli_fetch_array($rqpr);
      
      if($rspr['datFin']){
        $datFinPr = $rspr['datFin'];
        $Deb = date_create($datFinPr);
      }else{
        $datDeb = $rstparam['debutEvent'];
        $Deb = date_create($datDeb);
      }

      $newdeb = date_format($Deb,"Y-m-d");

      $debgrp = date_create($newdeb);
      date_add($debgrp,date_interval_create_from_date_string("1 week"));
      $fin = date_format($debgrp,"Y-m-d");
      $sql3 = mysqli_query($con,"update groupe set datdeb='$newdeb', datFin='$fin' where codeGrp='$codGrp'");
    }

  }
  if(isset($_POST['save']))
      {
         $uname=$_POST['login'];
         $password=$_POST['password'];
         $cpassword=$_POST['Cpassword'];
         if($password == $cpassword){
            $sql = mysqli_query($con,"Update  user set login='$uname',password='$password' where id_user='$iduser'");
         }else{
            echo "<script>alert('mot de passe ne correspond pas');</script>";
         }
      }
?>

<body>
  <div class="container-scroller">
    <!-- side bar -->
    <?php
    if($rst['idRole'] == 2){
      include "sidebarSec.php";
    }elseif($rst['idRole'] == 3){
      include "sidebarCompt.php";
    }else{
      include "includes/sidebar.php";
    }
    ?>
    <!-- end sidebar -->

    <div class="container-fluid page-body-wrapper">

      <!-- header top -->
      <?php 
      include "includes/header.php"
      ?>
      <!-- end header -->
     
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
            <h3 class="mb-0"> Bienvenu <?=$rst['login']?> <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
            </h3>
            <div class="d-flex">
              <button type="button" class="btn btn-sm bg-white btn-icon-text border" data-bs-toggle="modal"
                data-bs-target=".bd-example-modal-sm">
                <i class="mdi mdi-tooltip-edit btn-icon-prepend"></i> Modifier les informations du compte
              </button>
              <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modifier les informations</h5>
                      <button type="button" class="btn-close btn" data-bs-dismiss="modal">
                        <i class="mdi mdi-close"></i>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/edit_persl.php" method="post">
                        <input type="text" class="form-control mb-2" name="login" id="" placeholder="Login" value="<?=$rst['login']?>" required>
                        <input type="text" class="form-control mb-2" name="password" id=""
                          placeholder="Nouveau Mot de passe" required>
                        <input type="text" class="form-control mb-2" name="Cpassword" id=""
                          placeholder="Confirmer le mot de passe" required>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Sauvegarder" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-sm bg-success btn-icon-text border" data-bs-toggle="modal"
                  data-bs-target=".bd-example-modal-sm1">
                  <i class="mdi mdi-tooltip-edit btn-icon-prepend"></i> Parametre event
                </button>
                <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier les informations</h5>
                        <button type="button" class="btn-close btn" data-bs-dismiss="modal">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="includes/edit_param.php" method="post">
                            <label for="">date fin d'inscription</label>
                          <input type="date" class="form-control mb-2" name="finIns" id="" placeholder=""  required>
                            <label for="">Temps de preparation en jours</label>
                          <input type="number" class="form-control mb-2" name="preparation" id=""placeholder="" required>
                          <div class="modal-footer">
                              <input type="submit" name="save" value="Sauvegarder" class="btn btn-primary">
                          </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
              <?php 
                 if($rst['idRole'] == 1){

                  
                }
              ?>
            </div>
          </div>
          <div class="row pdf-row">
            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
              <div class="row">
                <?php 
                  $query = mysqli_query($con,"SELECT * FROM specificite");
                  while($resultat = mysqli_fetch_array($query)){

                    // change les couleurs d'arriere plan 
                    if($resultat['idSpe'] == 1){
                      $bg = "bg-warning";
                      $ic = "bg-inverse-icon-warning";
                    }elseif($resultat['idSpe'] == 2){
                      $bg = "bg-danger";
                      $ic = "bg-inverse-icon-danger";
                    }elseif($resultat['idSpe'] == 3){
                      $bg = "bg-primary";
                      $ic = "bg-inverse-icon-primary";
                    }else{
                      $bg = "bg-success";
                      $ic = "bg-inverse-icon-success";
                    }

                    // compte du nbr de participants par specificité
                    $idspe = $resultat['idSpe'];
                    $query1 = mysqli_query($con,"SELECT * FROM choix WHERE idSpe='$idspe'");
                    $resultat1 = mysqli_num_rows($query1);

                    // compte du nbr de groupe de passage par specificité
                    $query2 = mysqli_query($con,"SELECT DISTINCT codeGrp FROM groupe WHERE idSpe='$idspe'");
                    $resultat2 = mysqli_num_rows($query2);
                ?>
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                  <div class="card <?=$bg?>">
                    <div class="card-body px-3 py-4">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                          <p class="mb-0 color-card-head"><?=$resultat['libSpe']?></p>
                          <h2 class="text-white"><?=$resultat1?><span class="h5"> Participant(s)</span>
                          </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-account-multiple <?=$ic?>"></i>
                      </div>
                      <h6 class="text-white"><?=$resultat2?> Groupe(s)</h6>
                    </div>
                  </div>
                </div>
                  <?php }?>
              </div>
            </div>
            <div class="col-xl-9 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-7">
                      <h5>Statistique</h5>
                      <p class="text-muted"><a class="text-muted font-weight-medium pl-2" href="#"><u>
                           </u></a>
                      </p>
                    </div>
                   
                    <div class="col-sm-5 text-md-right">
                      <button type="button" onclick="PDF();"
                        class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                        <i class="mdi mdi-download btn-icon-prepend"></i>Telecharger le rapport</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="card mb-3 mb-sm-0">
                        <div class="card-body py-3 px-4">
                          <p class="m-0 survey-head">Total participant</p>
                          <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                            <div>
                              <h3 class="m-0 survey-value"> <?=$rst1?> </h3>
                              <p class="text-success m-0">+31%</p>
                            </div>
                            <div id="earningChart" class="flot-chart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card mb-3 mb-sm-0">
                        <div class="card-body py-3 px-4">
                          <p class="m-0 survey-head">Total Groupe</p>
                          <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                            <div>
                              <h3 class="m-0 survey-value"><?=$rst2?></h3>
                              <p class="text-danger m-0">-10%</p>
                            </div>
                            <div id="productChart" class="flot-chart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body py-3 px-4">
                          <p class="m-0 survey-head">Projet evalué(s)</p>
                          <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                            <div>
                              <h3 class="m-0 survey-value">00</h3>
                              <p class="text-success m-0">+13%</p>
                            </div>
                            <div id="orderChart" class="flot-chart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row my-3">
                    <div class="col-sm-12">
                      <div class="flot-chart-wrapper">
                        <div id="flotChart" class="flot-chart">
                          <canvas class="flot-base"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <p class="text-muted mb-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore.
                      </p>
                    </div>
                    <!-- <div class="col-sm-4">
                      <p class="mb-0 text-muted">Total Montant scolarité payé</p>
                      <h5 class="d-inline-block survey-value mb-0"><?=$somme?> Fcfa</h5>
                      <p class="d-inline-block text-danger mb-0">sur <?=$som ?> fcfa</p>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © AsteroDesign
              2022</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                href="http://asterodesign.ml/" target="_blank">AsteroDesign</a> pour Miage-Gi.com</span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- script -->
  <?php include "includes/script.php"?>
  
  <!-- CUSTOM JS -->
  <script type="text/javascript">

        function PDF() {
            const e = document.querySelector(".pdf-row");

            // OPTIONS
            const opt = {
                filename: 'Rapport.pdf',
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
                html2canvas: { scale: 1 },
            };
            html2pdf().set(opt).from(e).save();

            // RESIZE
            setTimeout(() => { e.style.maxWidth = "1400px"; }, 2000);
        }

  </script>
  
</body>

</html>

<?php }?>