<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  session_start();
    include "includes/head.php";
    include "../../config.php";
    if(strlen($_SESSION['idPart'])==0)
    { 
        header('location:../login.php');
    }else{

    $idPart = $_SESSION['idPart'];
    $query = mysqli_query($con,"SELECT * FROM participant WHERE idPart='$idPart'");
    $rst = mysqli_fetch_array($query);

    $query2 = mysqli_query($con,"SELECT * FROM user WHERE idPart='$idPart'");
    $rst2 = mysqli_fetch_array($query2);
    
    $rq = mysqli_query($con,"SELECT * FROM choix WHERE idPart = '$idPart'");
    $count = mysqli_num_rows($rq);
    $rq2 = mysqli_query($con,"SELECT * FROM groupe WHERE idPart = '$idPart'");
    $rqrst2 = mysqli_fetch_array($rq2);
    }


  ?>
</head>

<body>
  <div class="container-scroller">

    <?php 
      include "includes/sidebar.php";
    ?>

    <div class="container-fluid page-body-wrapper">
      <?php 
      include "includes/header.php";
    ?>
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
            <h3 class="mb-0"> Bienvenu <?=$rst2['login']?> <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
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
                        <input type="text" class="form-control mb-2" name="login" id="" placeholder="Login" value="<?=$rst2['login']?>" required>
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

            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
            <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Spécificité</p>
                            <h2 class="text-white"><?=$count?><span class="h5"></span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                        <!-- affichage des specificité -->
                        <?php 
                          while($rqrst = mysqli_fetch_array($rq)){
                            $idSpe = $rqrst['idSpe'];
                            $sql= mysqli_query($con,"SELECT * FROM specificite WHERE idSpe='$idSpe'");
                            $result= mysqli_fetch_array($sql);
                        ?>
                        <h6 class="text-white"><?=$result['libSpe']?></h6>
                        <?php }?>

                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Groupe (s) de passage</p>
                            <?php
                              $rq = mysqli_query($con,"SELECT * FROM choix WHERE idPart = '$idPart'");
                              $count = mysqli_num_rows($rq);
                              $rq2 = mysqli_query($con,"SELECT * FROM groupe WHERE idPart = '$idPart'");
                              
                            ?>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                        <?php 
                          while($rqrst2 = mysqli_fetch_array($rq2)){
                            $idSpe = $rqrst2['idSpe'];
                            $sql= mysqli_query($con,"SELECT * FROM specificite WHERE idSpe='$idSpe'");
                            $result= mysqli_fetch_array($sql);
                        ?>
                        <h6 class="text-white"><?=$result['libSpe']?> : Grp N°: <?=$rqrst2['codeGrp']?></h6>
                        <?php }?>    
                       
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Date(s) de passage</p>
                            <!-- <h2 class="text-white"> $1,753.<span class="h5">00</span>
                            </h2> -->
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <h6 class="text-white">Big data : 22/06/2022</h6>
                        <h6 class="text-white">web et mobile : 22/06/2022</h6>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>informations</h5>
                        <p class="text-muted"> Durée de l'evenement jan 2018 - Dec 2019 
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                       
                      </div>
                    </div>
                   <div class="row">
                    <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body px-0 overflow-auto">
                          <h4 class="card-title pl-4">Depot de travaux et notes</h4>
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="bg-light">
                                <tr>
                                  <th>Specificité</th>
                                  <th>Date de passage</th>
                                  <th>Depot de travaux</th>
                                  <th>Note observation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    Big data
                                  </td>
                                  <td>22/06/2022</td>
                                  <td>
                                    <button class="btn btn-success">Travaux</button>                                  
                                  </td>
                                  <td>
                                    <button class="btn btn-primary">note</button>
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                    <div class="row">
                      <div class="col-sm-">
                        <p class="text-muted mb-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <b>Learn More</b>
                        </p>
                      </div>
                     
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../miage-gi/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../miage-gi/assets/vendors/chart.js/Chart.min.js"></script>

  <script src="../../miage-gi/assets/js/global.min.js"></script>

  <script src="../../miage-gi/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.resize.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.categories.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.stack.js"></script>
  <script src="../../miage-gi/assets/vendors/flot/jquery.flot.pie.js"></script>

  <script src="../../miage-gi/assets/vendors/jqvmap/js/jquery.vmap.min.js"></script>
  <script src="../../miage-gi/assets/vendors/jqvmap/js/jquery.vmap.world.js"></script>
  <script src="../../miage-gi/assets/js/jqvmap-init.js"></script>
  <script src="../../miage-gi/assets/js/chart.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../miage-gi/assets/js/off-canvas.js"></script>
  <script src="../../miage-gi/assets/js/hoverable-collapse.js"></script>
  <script src="../../miage-gi/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../miage-gi/assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>