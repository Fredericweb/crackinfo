<?php
    session_start();
    
    include '../../../../config.php';
    //error_reporting(0);
    if(isset($_POST['save']))
      {
         $idAdmin=$_SESSION['idAdmin'];
         $fin=$_POST['finIns'];
         $prepa=$_POST['preparation'];
         $id = 1;
         
         // recuperation de la date de debut
         $sql = mysqli_query($con,"SELECT * FROM parametre");
         $result = mysqli_fetch_array($sql);
         $datedeb = $result['debutEvent'];
         $d = date_create($datedeb);
         $deb = date_format($d,"Y-m-d");
         
         // date du jour
         $day = date("Y-m-d");
         
         // verification
         if($deb<=$day){
            echo "<script>alert('modification impossible date inspirée');</script>";
         }else{
            // mise a jour des parametre
            $datDebut = date_create($fin);
            date_add($datDebut,date_interval_create_from_date_string("$prepa days"));
            $debut = date_format($datDebut,"Y-m-d");
         
            $sql = mysqli_query($con,"Update  parametre set finInscrpt  ='$fin', preparation ='$prepa',debutEvent='$debut' where id='$id'");
            echo "<script>alert('modifications enregistrées');</script>";
         }

         
      }
    
?>
<script language="javascript">
   document.location = "../index.php";
</script>