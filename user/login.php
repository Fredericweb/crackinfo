

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
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
                    <h1 class="home__data-title">Connexion</h1>
                </div>
            </div>
        </section>

        <section class="about about-other section" id="about">
            <div class="about__container container grid">
                <form action="action/cnx.php" class="rdv-form-login" method="post">
                    <div class="rdv-form-content-login">
                        <p>Login</p>
                        <input type="text" name="login" id="" required>
                        <p>Password</p>
                        <input type="password" name="password" id="" required>
                    </div>
                    <button type="submit" name="connexion" class="button" value="">
                        CONNEXION
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