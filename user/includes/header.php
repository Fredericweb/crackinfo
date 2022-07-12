<header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">MIAGE - GI</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link active-link">Accueil</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#about" class="nav__link">A propos</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#goal" class="nav__link">Objectif</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#programme" class="nav__link">Inscription</a>
                    </li>
                    <li class="nav__item">
                        <a href="login.php" class="btn_nav__link">Conexion</a>
                    </li>
                    <?php
                        // recuperation de la date de debut
                        $sql = mysqli_query($con,"SELECT * FROM parametre");
                        $result = mysqli_fetch_array($sql);
                        $datedeb = $result['debutEvent'];
                        $d = date_create($datedeb);
                        
                        // calcul date de fin
                        $sql1 = mysqli_query($con,"SELECT * FROM groupe");
                        $count = mysqli_num_rows($sql1);
                        $cptw = ceil($count/3);
                        date_add($d,date_interval_create_from_date_string("$cptw week"));
                        $resultat = date_format($d,"Y-m-d");

                        // date du jour
                        $day = date("Y-m-d");
                        
                        // verification
                        if($resultat<=$day){
                    ?>
                     <li class="nav__item">
                        <a href="" class="btn_nav__link">Resultat</a>
                    </li>
                    <?php } ?>

                </ul>

                <div class="nav__dark">
                    <!-- Dark Mode -->
                    <span class="change-theme-name">Dark mode</span>
                    <i class="mdi mdi-weather-night change-theme" id="theme-button"></i>
                </div>

                <i class="mdi mdi-close nav__close" id="nav-close"></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="mdi mdi-view-grid"></i>
            </div>
        </nav>
    </header>