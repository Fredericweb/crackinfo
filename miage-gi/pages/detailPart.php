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
   

   if(isset($_GET['idP'])){

     $idPart = intval($_GET['idP']);
     $sql = mysqli_query($con, "SELECT * FROM participant WHERE idPart='$idPart'");
     $rst0 = mysqli_fetch_array($sql);

     $idSex = $rst0['idSexe'];
     $row1 = mysqli_query($con, "SELECT * FROM sexe WHERE idSexe = '$idSex'");
     $rst1 = mysqli_fetch_array($row1);

     $idNiv = $rst0['idNiv'];
     $row2 = mysqli_query($con, "SELECT * FROM niveau WHERE idNiv= '$idNiv'");
     $rst2 = mysqli_fetch_array($row2);

     $query = mysqli_query($con,"SELECT * FROM groupe WHERE idPart='$idPart'");
     $speCount = mysqli_num_rows($query);


     
   }

  ?>


<!DOCTYPE html>
<html lang="en">

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
          <div class="row">
            <div class="row">
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Details Profil</h5>
                      </div>
                    </div>
                    <div class="row align-items-center">

                      <div class="col-sm-4">
                        <img src="../assets/images/faces/<?= $rst0['photo'] ?>" alt="" width="250px">
                      </div>
                      <div class="col-sm-4">
                        <h3 class="mt-3 mt-sm-0"><?= $rst0['nom'] ?><br><?= $rst0['prenom'] ?></h3>
                        <p class=""> <strong>Mail: </strong><?= $rst0['mail'] ?></p>
                        <p class=""> <strong>sexe: </strong><?= $rst1['libSexe'] ?></p>
                        <strong>niveau: </strong>
                        <p class="badge badge-primary"> <?= $rst2['libNiv'] ?></p>
                        <p class=""> <strong>Tel: </strong><?= $rst0['numTel'] ?></p>
                        <p class=""> <strong>Date d'inscription </strong><?= $rst0['dateCrea'] ?></p>
                        <p class=""> <strong>specificité: </strong>
                        <?php
                          while($resultat = mysqli_fetch_array($query)){
                            $idSpe = $resultat['idSpe'];
                             // change les couleurs d'arriere plan 
                              if($idSpe == 1){
                                $color = "badge-warning";
                              }elseif($idSpe == 2){
                                  $color = "badge-danger";
                              }elseif($idSpe == 3){
                                  $color = "badge-primary";
                              }else{
                                  $color = "badge-success";
                              }
                            $rq = mysqli_query($con,"SELECT * FROM specificite WHERE idSpe = '$idSpe'");
                            $rqrst = mysqli_fetch_array($rq);
                        ?>
                         <label class="badge <?= $color ?>"><?=$rqrst['libSpe']?>,Grp n°<?=$resultat['codeGrp']?></label>
                         <?php } ?></p>
                      </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
                        <div class="card">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <p class=""> <b> Description</b></p>
                        <p class="text-muted mb-0">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                          labore et dolore.
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat, enim ratione. Praesentium
                          saepe officia excepturi eius.
                          Veniam aliquam quis distinctio quaerat aperiam minima deserunt beatae pariatur quibusdam
                          commodi, debitis earum.

                        </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                  bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from
                  Bootstrapdash.com</span>
              </div>
            </footer>
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

      <?php include "includes/script.php"?>

</body>

</html>