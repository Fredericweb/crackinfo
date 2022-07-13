
 <!-- side bar -->
 <nav class='sidebar sidebar-offcanvas' id='sidebar'>
      <div class='text-center sidebar-brand-wrapper d-flex align-items-center'>
       <h2 class="text-align-center ml-5">MIAGE - GI</h2>
        <a class='sidebar-brand brand-logo-mini pl-4 pt-3' href='index.html'><img
            src='../assets/images/logo-mini.svg' alt='logo' /></a>
      </div>
      <ul class='nav'>
        <li class='nav-item nav-profile'>
          <a href='#' class='nav-link'>
            <div class='nav-profile-image'>
              <img src='../assets/images/faces-clipart/pic-1.png' alt='profile' />
              <span class='login-status online'></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class='nav-profile-text d-flex flex-column pr-3'>
              <span class='font-weight-medium mb-2'><?=$rst['nom']?> <?=$rst['prenom']?></span>
              <span class='font-weight-normal'><?=$rst['login']?></span>
            </div>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='dashAdmin/index.php'>
            <i class='mdi mdi-home menu-icon'></i>
            <span class='menu-title'>Dashboard</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='managePart.php'>
            <i class='mdi mdi-account menu-icon'></i>
            <span class='menu-title'>Participant</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='manageGrp.php'>
            <i class='mdi mdi-contacts menu-icon'></i>
            <span class='menu-title'>Groupes</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='ListPersl.php'>
            <i class='mdi mdi-format-list-bulleted menu-icon'></i>
            <span class='menu-title'>Liste du personnel</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='GrpPassD.php'>
            <i class='mdi mdi-format-list-bulleted menu-icon'></i>
            <span class='menu-title'>Groupe de passage</span>
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href=''>
            <i class='mdi mdi-file-document-box menu-icon'></i>
            <span class='menu-title'>Documentation</span>
          </a>
        </li>
      </ul>
    </nav>