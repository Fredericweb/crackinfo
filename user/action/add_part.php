<?php
    session_start();
    require '../ajax-phpmail/class/class.phpmailer.php';
    include('../../config.php');

    // en cas de click sur le button s'inscrire
    if(isset($_POST['save'])){

        // recuperation des variables saisis dans les input
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $tel = $_POST['tel'];
        $imgI = $_POST['imgI'];

        // recupation de id_sex 
        $sexe = $_POST['sexe'];
        $row1 = mysqli_query($con, "SELECT * FROM sexe WHERE libSexe = '$sexe'");
        $rst1 = mysqli_fetch_array($row1);
        $idSex = $rst1['idSexe']; // id sexe

        // recupation de id_niveau 
        $niveau = $_POST['niveau'];
        $row2 = mysqli_query($con, "SELECT * FROM niveau WHERE libNiv = '$niveau'");
        $rst2 = mysqli_fetch_array($row2);
        $idNiv = $rst2['idNiv']; // id niveau

        
        $idPart = mt_rand(0000,9999); // id du participant

        // verification
        $verifrq = mysqli_query($con,"SELECT idPart FROM participant");
        while($verifrst = mysqli_fetch_array($verifrq)){
            if($verifrst['idPart'] == $idPart){
                $idPart = mt_rand(0000,9999);
            }
        }

        // enregistrement du formulaire dans la table participants
        $sql = mysqli_query($con,"INSERT INTO participant(idPart,nom,prenom,idNiv,idSexe,mail,numTel,photo,dateCrea) 
        VALUES ('$idPart','$nom','$prenom','$idNiv','$idSex','$email','$tel','$imgI',now())");
        

         // recupation de idSpe
         $spe = $_POST['spe'];
         
         foreach($spe as $spelist){
             $row3 = mysqli_query($con,"SELECT * FROM specificite WHERE libSpe = '$spelist'");
             $rst3 = mysqli_fetch_array($row3);
             $idspe = $rst3['idSpe'];   // id specificité
            
             // enregistrement  dans la table Choix
             $req = mysqli_query($con,"INSERT INTO choix(idPart,idSpe)VALUES('$idPart','$idspe')");

            // selection des elements en fonction du idSpe
            $row4 = mysqli_query($con,"SELECT * FROM choix WHERE idSpe='$idspe'");
            $count = mysqli_num_rows($row4);

            // generer un code de groupe contenant max 3 etudiants par specificité
            for($i=0;$i<($count/3);$i++){
                $codGrp = "$idspe$i";
            }

            // remplir la table groupe des 2etudiants avec le meme code de groupe
            $cpt = 1;
            while($resultat = mysqli_fetch_array($row4)){
                if($cpt<2){
                    $sql3 = mysqli_query($con,"INSERT INTO groupe(idPart,idSpe,codeGrp)
                    VALUES('$idPart','$idspe','$codGrp')");
                    $cpt++;
                }
            }
         }

        //  Creation des comptes de connexion dans la table User 
        $idRole = 3;
        $login = "$nom$idPart";
        $password = "$idPart$idSex$idRole";

        $sql4 = mysqli_query($con,"INSERT INTO user(login,password,photo,idPart)
        VALUES('$login','$password','$imgI','$idPart')");


        //  envoi de mail au nouveau participant
        $mail = new PHPMailer;
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'smtp-mail.outlook.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';								//Sets the default SMTP server port
        $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'miagecrack@hotmail.com';					//Sets SMTP username
        $mail->Password = 'crackinfo2022';					//Sets SMTP password
        $mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'miagecrack@hotmail.com';			//Sets the From email address for the message
        $mail->FromName = 'info crack';					//Sets the From name of the message
        $mail->AddAddress($email,$nom);	//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML
        $mail->Subject = 'Inscription Crackinfo'; //Sets the Subject of the message
        //An HTML or plain text message body
        $mail->Body = "
        <p>
        Bonjour/Bonsoir Mr(Mme) <strong>$nom $prenom</strong>.
        Votre inscription au Crackinfo a bien été effectuée.
        Vos information de connexion sont : <br>
        <b>Login:</b> $login <br>
        <b>Password:</b> $password <br>
        Veuillez vous connecter pour participer à l'évenement
        <p style='color:red'>NB: Ces informations doivent etre modifié après la connection pour plus de securité</p>
        </p>
        ";

        $mail->AltBody = '';

        $result = $mail->Send();
        if(!$mail->Send()) {
            //echo $body;
        
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
           echo "Message sent successfully!";
        }
        echo "<script>alert('Informations enregistées !!!');</script>";
    }
