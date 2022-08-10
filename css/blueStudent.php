<?php  
include ('../controller/session/session-checker-student.php');
header("Content-Type: text/css; charset=utf-8"); 
?>
/*
Template Name: Admin Press Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: scss
*/
/*
Template Name: Admin Press Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: scss
*/
@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
/*Theme Colors*/
/*bootstrap Color*/
/*Light colors*/
/*Normal Color*/
/*Extra Variable*/
/*Preloader*/
.preloader {
  width: 100%;
  height: 100%;
  top: 0px;
  position: fixed;
  z-index: 99999;
  background: #fff;
}

.preloader .cssload-speeding-wheel {
  position: absolute;
  top: calc(50% - 3.5px);
  left: calc(50% - 3.5px);
}

/*******************
/*Top bar
*******************/
.topbar {
  background:  <?php echo $PrimaryColor; ?>;
}



.topbar .top-navbar .navbar-header .navbar-brand .light-logo {
  display: none;
  color: rgba(255, 255, 255, 0.8);
}

.topbar .navbar-light .navbar-nav .nav-item > a.nav-link {
  color: #ffffff !important;
}

.topbar .navbar-light .navbar-nav .nav-item > a.nav-link:hover, .topbar .navbar-light .navbar-nav .nav-item > a.nav-link:focus {
  color: rgba(255, 255, 255, 0.8) !important;
}

/*******************
/*General Elements
*******************/
a.link:hover, a.link:focus {
  color:  <?php echo $PrimaryColor; ?> !important;
}

.bg-theme {
  background-color:  <?php echo $PrimaryColor; ?> !important;
}

.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  background-color:  <?php echo $PrimaryColor; ?>;
  border-color:  <?php echo $PrimaryColor; ?>;
}

.right-sidebar .rpanel-title {
  background:  <?php echo $PrimaryColor; ?>;
}

.stylish-table tbody tr:hover, .stylish-table tbody tr.active {
  border-left: 4px solid  <?php echo $PrimaryColor; ?>;
}

.text-themecolor {
  color:  <?php echo $PrimaryColor; ?> !important;
}

.profile-tab li a.nav-link.active,
.customtab li a.nav-link.active {
  border-bottom: 2px solid  <?php echo $PrimaryColor; ?>;
  color:  <?php echo $PrimaryColor; ?>;
}

.profile-tab li a.nav-link:hover,
.customtab li a.nav-link:hover {
  color:  <?php echo $PrimaryColor; ?>;
}

/*******************
/*Buttons
*******************/
.btn-themecolor,
.btn-themecolor.disabled {
  background:  <?php echo $PrimaryColor; ?>;
  color: #ffffff;
  border: 1px solid  <?php echo $PrimaryColor; ?>;
}

.btn-themecolor:hover,
.btn-themecolor.disabled:hover {
  background:  <?php echo $PrimaryColor; ?>;
  opacity: 0.7;
  border: 1px solid  <?php echo $PrimaryColor; ?>;
}

.btn-themecolor.active, .btn-themecolor:focus,
.btn-themecolor.disabled.active,
.btn-themecolor.disabled:focus {
  background: #028ee1;
}

/*******************
/*sidebar navigation
*******************/
.label-themecolor {
  background:  <?php echo $PrimaryColor; ?>;
}

.sidebar-nav > ul > li.active > a {
  color:  <?php echo $PrimaryColor; ?>;
  border-color: white;
  background: white;
}

.sidebar-nav > ul > li.active > a i {
  color:  <?php echo $PrimaryColor; ?>;
}

.sidebar-nav ul li a.active, .sidebar-nav ul li a:hover {
  color:  <?php echo $PrimaryColor; ?>;
}

.sidebar-nav ul li a.active, .sidebar-nav ul li a:active {
  color:  <?php echo $PrimaryColor; ?>;
}

.sidebar-nav ul li a.active i, .sidebar-nav ul li a:active i {
  color:  <?php echo $PrimaryColor; ?>;
}



