<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
     include "includes/head.php";
    ?>

    <title>MIAGE - GI</title>
</head>

<body>
    <?php 
     include "includes/header.php";
    ?>

    <main class="main">
        <!--==================== Home ====================-->
        <section class="home" id="home">
            <img src="img/background.jpg" alt="" class="home__img">

            <div class="home__container container grid">
                <div class="home__data">
                    <span class="home__data-subtitle"></span>
                    <h1 class="home__data-title">Decouvrez <br>la filiaire MIAGE, <b>piliers <br> dans la formation mathematique et informatique. </b></h1>
                    <a href="#about" class="button">Plus D'info</a>

                </div>

                <div class="home__social">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        <i class="mdi mdi-facebook-box"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        <i class="mdi mdi-instagram"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        <i class="mdi mdi-twitter-box"></i>
                    </a>
                </div>

                <div class="home__info">
                    <div>
                        <span class="home__info-title">4 Raisons d'integrer la filiaire MIAGE </span>
                        <a href="#goal" class="button button--flex button--link home__info-button">
                            Plus <i class="mdi mdi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="home__info-overlay">
                        <img src="img/about.jpg" alt="" class="home__info-img">
                    </div>
                </div>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title about__title">Informations <br> à propos de la filière MIAGE</h2>
                    <p class="about__description">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates at ipsa sunt iusto, earum soluta ad. Eum quo dolorum eos molestiae veniam repudiandae quae qui rem, voluptatem, voluptates tempora repellat?
                            Minima accusamus distinctio iste unde, obcaecati at dolores repellendus voluptate quia ea, temporibus, quas necessitatibus error ad. Assumenda excepturi temporibus beatae natus ex cum cupiditate necessitatibus fuga. Repellendus, odit inventore?
                    </p>
                    <a href="Description.html" class="button">En savoir plus</a>
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

        <!--==================== Goal ====================-->
        <section class="goal section" id="goal">
            <h2 class="section__title">Les avantages <br> d'une formation MIAGE</h2>

            <div class="goal__container container swiper-container">
                <div class="swiper-wrapper">
                    <!--==================== goal 1 ====================-->
                    <div class="goal__card swiper-slide">
                        <img src="assets/img/discover1.jpg" alt="" class="goal__img">
                        <div class="goal__data">
                            <h2 class="goal__title">Découvrez de nouvelles façons concrètes de résoudre les problèmes de
                                santé dans votre organisation.</h2>
                        </div>
                    </div>

                    <!--==================== goal 2 ====================-->
                    <div class="goal__card swiper-slide">
                        <img src="assets/img/discover2.jpg" alt="" class="goal__img">
                        <div class="goal__data">
                            <h2 class="goal__title">Sortez de la pratique quotidienne pour vous inspirer et vous ressourcer.</h2>
                        </div>
                    </div>

                    <!--==================== goal 3 ====================-->
                    <div class="goal__card swiper-slide">
                        <img src="assets/img/discover3.jpg" alt="" class="goal__img">
                        <div class="goal__data">
                            <h2 class="goal__title">Visitez des établissements de soins exceptionnels et discutez des défis et des solutions.</h2>
                        </div>
                    </div>

                    <!--==================== goal 4 ====================-->
                    <div class="goal__card swiper-slide">
                        <img src="assets/img/discover4.jpg" alt="" class="goal__img">
                        <div class="goal__data">
                            <h2 class="goal__title">Réseautez avec d'autres cadres de haut niveau et partagez votre expérience.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== EXPERIENCE ====================-->
        <section class="experience section">
            <h2 class="section__title"> Pourquoi choisir la filière <br>MIAGE</h2>

            <div class="experience__container container grid">
                <div class="experience__content grid">
                    <div class="experience__data">
                        <h2 class="experience__number">40</h2>
                        <span class="experience__description">Reconnaissent <br> le potentiel <br> de MIAGE</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">85</h2>
                        <span class="experience__description">spécialistes <br> de l'innnovation</span>
                    </div>

                    <div class="experience__data">
                        <h2 class="experience__number">450+</h2>
                        <span class="experience__description">Entreprise <br> demande <br>de futurs employés MIAGE</span>
                    </div>
                </div>

                <div class="experience__img grid">
                    <div class="experience__overlay">
                        <img src="assets/img/experience1.jpg" alt="" class="experience__img-one">
                    </div>

                    <div class="experience__overlay">
                        <img src="assets/img/experience2.jpg" alt="" class="experience__img-two">
                    </div>
                </div>
            </div>
        </section>

        <!--==================== VIDEO ====================-->
        <section class="video section">
            <h2 class="section__title">Description Video</h2>

            <div class="video__container container">
                <p class="video__description">
                    En savoir plus avec notre vidéo <Br>
                   
                </p>

                <div class="video__content">
                    <video id="video-file">
                        <source src="assets/video/video.mp4" type="video/mp4">
                    </video>

                    <button class="button button--flex video__button" id="video-button">
                        <i class="mdi mdi-play video__button-icon" id="video-icon"></i>
                    </button>
                </div>
            </div>
        </section>

        <!--==================== programme ====================-->
        <section class="programme section" id="programme">
            <div class="programme__bg">
                <div class="programme__container container">
                    <h2 class="section__title programme__title">Inscrivez-vous <br> dès maintenant</h2>
                    <p class="programme__description">
                        Pour beneficicer des cours de cette année de la Licence 1 au Master 2
                    </p>

                    <div class="programme__button">
                        <a href="inscription.php" class="button">
                            S'inscrire
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== SPONSORS ====================-->
        <section class="sponsor section">
            <div class="sponsor__container container grid">
                <div class="sponsor__content">
                    <img src="assets/img/sponsors1.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="assets/img/sponsors2.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="assets/img/sponsors3.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="assets/img/sponsors4.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="assets/img/sponsors5.png" alt="" class="sponsor__img">
                </div>
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

    <!--=============== SCROLL REVEAL===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>