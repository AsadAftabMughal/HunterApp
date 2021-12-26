<header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <a href="#0" class="cd-logo"><img src="assets/img/cd-logo.svg" alt="Logo"></a>
    </div>
    
    <div class="js-cd-search">
      <form>
        <!-- <input class="reset" type="search" placeholder="Search..."> -->
      </form>
    </div>
  
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <ul class="cd-nav__list js-cd-nav__list">
      <!-- <li class="cd-nav__item"><a href="#0">Tour</a></li>
      <li class="cd-nav__item"><a href="#0">Support</a></li> -->
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0" style="height: 70px; padding-top: 15px; width: 200px">
          <img src="assets/img/cd-avatar.svg" alt="avatar">
          <span><?php echo $_SESSION['username'];?>'s profile</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <li class="cd-nav__sub-item"><a href="myprofile.php">My Account</a></li>
          <li class="cd-nav__sub-item"><a href="updateprofile.php">Edit Account</a></li>
          <li class="cd-nav__sub-item"><a href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>