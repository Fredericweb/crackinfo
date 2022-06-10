<!DOCTYPE html>
<html lang="en">

<head>
    <<?php 
     include "includes/head.php";
    ?>
</head>

<body>

    <?php 
     include "includes/header.php";
    ?>

    <main class="main">
        <!--==================== Home ====================-->
        <section class="home home__other" id="home">
            <img src="assets/img/home1.jpg" alt="" class="home__img">

            <div class="home__container container grid">
                <div class="home__data">
                    <span class="home__data-subtitle"></span>
                    <h1 class="home__data-title">A propos de Health Care In USA</h1>
                </div>

            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <h2 class="section__title">Informations <br> à propos de Health Care in USA</h2>
            <div class="about__container container grid">
                
                <div class="about__data">
                    
                    <p class="about__description">
                        Health Care est une expérience dans l'innovation et la prestation de soins de santé avancés aux
                        États-Unis.
                        Cette visite d'étude fournira une occasion unique d'en apprendre davantage sur les nouvelles
                        avancées de la technologie des soins de santé, les opportunités de réseautage avec les
                        principaux fournisseurs de soins de santé aux États-Unis et d'observer les systèmes de pratique
                        de soins de santé pionniers.
                        Une expérience dans l'innovation et la prestation de soins de santé avancés aux États-Unis"
                        Cette visite d'étude fournira une occasion unique d'en apprendre davantage sur les nouvelles
                        avancées de la technologie des soins de santé, les opportunités de réseautage avec les
                        principaux fournisseurs de soins de santé aux États-Unis et d'observer les systèmes de pratique
                        de soins de santé pionniers.
                        La loi sur les soins de santé abordables et les modifications ultérieures du système de santé
                        américain ont permis aux organisations de soins de santé de rechercher et de développer des
                        technologies dans des domaines tels que l'exploration de données, l'informatique de la santé, la
                        gestion allégée, l'intelligence artificielle, la gestion des risques et la médecine préventive.
                        Les exigences du système de santé américain ont conduit les cliniciens américains à développer
                        certains des plans de pratique clinique les plus avancés au monde.
                        Les points forts de cette tournée assureront une expérience enrichissante et enrichissante,
                        mettant en vedette certaines des meilleures innovations et pratiques en matière de soins de
                        santé aux États-Unis.
                    </p>
                    <!-- <a href="#" class="button">En savoir plus</a> -->
                </div>

                <div class="about__img">
                    <div class="about__img-overlay">
                        <img src="assets/img/about1.jpg" alt="" class="about__img-one">
                    </div>

                    <div class="about__img-overlay">
                        <img src="assets/img/about2.jpg" alt="" class="about__img-two">
                    </div>
                </div>
            </div>
        </section>



        <!--==================== FOOTER ====================-->
        <?php 
            include "includes/footer.php";
        ?>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="mdi mdi-arrow-up scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="./assets/js/main.js"></script>
</body>

</html>