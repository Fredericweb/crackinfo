<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
     session_start();
     include "../config.php";
     include "includes/head.php";
    ?>
    
</head>

<body>
    
    <?php 
     include "includes/header.php";
    ?>

    <main class="main">
        <!--==================== home ====================-->
        <section class="home__other" id="home">
            <img src="assets/img/home1.jpg" alt="" class="home__img">

            <div class="home__container container grid">
                <div class="home__data">
                    <span class="home__data-subtitle"></span>
                    <h1 class="home__data-title">Inscription</h1>
                </div>
            </div>
        </section>

        <section class="about about-other section" id="about">
            <div class="about__container container grid">
                <form action="action/add_part.php" class="rdv-form" method="post">
                    <div class="notificationbox">
                        <h4>
                            Remplicez correctement ce formulaire d'inscription. Toutes informations saisis seront verifiés
                        </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum quasi cupiditate quia repellendus inventore nesciunt est, ullam quos facere officiis nam dolore tempora voluptatum deleniti vitae adipisci aspernatur eius hic?
                            Voluptas autem quos commodi sed necessitatibus, vel facere nam dolor, harum, repellat quas natus provident eos ipsam. Quis sunt maiores, perspiciatis nostrum eos ducimus quasi vel, assumenda molestiae eligendi consectetur.
                            Accusamus accusantium iste tempora ratione ad enim, assumenda error repudiandae laborum debitis numquam quos cum, doloremque perspiciatis placeat facilis dicta? Nesciunt eaque illum atque a labore doloremque ea voluptatem eligendi
                        </p>
                    </div>
                    
                    <div class="rdv-form-content">
                        <div class="formleft">
                            <p>NOM *</p>
                            <input type="text" name="nom" id="" required>
                            <p>ADRESSE MAIL *</p>
                            <input type="email" name="mail" id="" required>
                            
                            <p>Genre</p>

                            <!-- Recuberation de libellé sexe -->
                            <select class="form-control" name="sexe" required>
                                <option>Selectionner le genre</option>
                                    <?php
                                        $sql= mysqli_query($con,"SELECT * FROM sexe");

                                        while($row = mysqli_fetch_array($sql)){
                                    ?>
                                <option><?= htmlentities($row['libSexe']) ?> </option>

                                <?php }?>
                            </select>
                            
                            <p>Specificité</p>

                            <select class="multi-select" name="spe[]" multiple="multiple">

                                <!-- Recuberation de libellé spécificité -->
                                <?php
                                    $sql= mysqli_query($con,"SELECT * FROM specificite");

                                    while($row = mysqli_fetch_array($sql)){
                                ?>
                                    <option><?= $row['libSpe'] ?> </option>

                                <?php }?>
                            </select>
                         
                        </div>
                        <div class="formright">
                            <p>PRENOM *</p>
                            <input type="text" name="prenom" id="" required>
                            <p>TELEPHONE *</p>
                            <input type="tel" name="tel" id="" required>
                            <p>NIVEAU *</p>
                            <select class="form-control" name="niveau" required>
                                <option>Selectionner le niveau</option>

                                <!-- Recuberation de libellé niveau -->
                                <?php
                                    $sql= mysqli_query($con,"SELECT * FROM niveau");

                                    while($row = mysqli_fetch_array($sql)){
                                ?>
                                    <option><?= htmlentities($row['libNiv']) ?> </option>

                                <?php }?>
                            </select>
                            <p>PHOTO D'IDENTITE *</p>
                            <input type="file" name="imgI" id="">
                        </div>  
                       
                    </div>
                    <button type="submit" name="save" class="button" value="">
                        S'INSCRIRE
                    </button>
                </form>
            </div>
        </section>
    </main>
    <!--==================== FOOTER ====================-->
    <?php 
     include "includes/footer.php";
    ?>
   

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="mdi mdi-arrow-up scrollup__icon"></i>
    </a>
    <!--=============== Global JS===============-->
    <script src="./assets/vendors/global/global.min.js"></script>

    <!--=============== SCROLL REVEAL===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="./assets/js/main.js"></script>

    <!--=============== Select2 js ===============-->
    <script src="./assets/vendors/select2/js/select2.full.min.js"></script>
    <script src="./assets/js/select2-init.js"></script>

    
</body>

</html>