<?php 

include('./functions/dbconnect.php');
include('./functions/functions.php');
$teamNames = getTeams($conn);
session_start();
// if( isset( $_SESSION['loginDetail'] ) ) {
//     unset($_SESSION['loginDetail']);
//  }
if( isset( $_SESSION['login_errors'] ) ) {
    $errors = $_SESSION['login_errors'];
    $values = $_SESSION['login_values'];
 }
?>
<!DOCTYPE html>
<html lang="en-gb">


<!-- Mirrored from h-sportak.torbara.com/yellow/match-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:32:19 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ace.Inc</title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="css/akslider.css" rel="stylesheet" type="text/css" />
    <link href="css/donate.css" rel="stylesheet" type="text/css" />
    <link href="css/theme.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src='../../ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js'></script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

</head>

<body class="tm-isblog">

    <div class="preloader">
        <div class="loader"></div>
    </div>

<link href="css/costom.css" rel="stylesheet" type="text/css" />
    <div class="over-wrap">
    <?php include('templates/socials.php')?>


        <div class="tm-menu-box">

            <div style="height: 70px;" class="uk-sticky-placeholder">
                <nav style="margin: 0px;" class="tm-navbar uk-navbar" data-uk-sticky="">
                    <div class="uk-container uk-container-center">
                        <a class="tm-logo uk-float-left" href="index.php">
                            <img src="images/logo1.png" style="width: 90px; height:90px;margin-bottom:18px;" alt="logo" title="logo"> <span>Ace<em> inc</em></span>
                        </a>

                        <ul class="uk-navbar-nav uk-hidden-small">
                            <li class="uk-parent uk-active" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="index.php">Home</a>
                                
                            </li>
                            <li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="about.php">About</a></li>
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Pages</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="teams.php">Teams</a>
                                                </li>
                                                <li><a href="gallery.php">Gallery</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li><a href="news.php">News</a>
                            </li>
                            
                            <li><a href="contact.php">Contact</a>
                            </li>
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Register</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="create_team.php">Team Registeration</a>
                                                </li>
                                                <li><a href="create_player.php">Player Registeration</a>
                                                </li>
                                                </li>
                                                <li><a href="create_coach.php">Coach Registeration</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            
                        </ul>
                        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                    </div>
                </nav>

            </div>

        </div>

        <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('images/head-bg.jpg');">
                                <img class="uk-invisible" src="images/head-bg.jpg" alt="" height="290" width="1920">
                                <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                    <h1>Login</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="uk-container uk-container-center alt">
            <ul class="uk-breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="uk-active"><span>Login</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Go Ahead And Login</div>
                                <div class="uk-width-medium-7-10 uk-width-small-1-1 text">Aenean aliquam, dolor eu lacinia pellentesque, dui arcu condimentum nisl, quis sollicitudin mi lorem quis leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis sapien a ante rutrum pulvinar quis ac tellus. Proin facilisis dui at mollis tincidunt. Sed dignissim orci non arcu luctus pretium. Donec at ex aliquet, porttitor lacus eget, ullamcorper quam. Integer pellentesque egestas arcu, nec molestie leo sollicitudin et</div>
                            </div>
                        </div>

                        <div class="list-players-wrapper">
                            <div class="uk-sticky-placeholder">
                                <div class="button-group filter-button-group" data-uk-sticky="{top:70, boundary: true}">
                                    <div class="uk-container uk-container-center">
                                        <div class="label-menu">Fill The Form Below</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <section class="create">
                                <div class="form">
                                    <form action="functions/login.php" method="post" enctype="multipart/form-data">
                                    <h3>Account Information</h3>
                                        <div class="line"></div>
                                        <div><h3 style="color: red;"><?=$errors['message'] ?? ''?></h3></div>
                                        <div class="form-input">
                                            <label for="email">Email</label>
                                            <div style="color: red;"><?= $errors['email'] ?? '' ?></div>
                                            <input type="text"value='<?= $values['email'] ?? '' ?>' name="email" id="email">
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="team">Team</label>
                                            <div style="color: red;"><?= $errors['team'] ?? '' ?></div>
                                            <select name="team" value='<?= $values['team'] ?? '' ?>' id="team">
                                                <option value="<?= $values['team'] ?? '' ?>"><?= $values['team'] ?? 'select team' ?></option>
                                                <?php if($teamNames):?>
                                                <?php foreach($teamNames as $team) :?>
                                                <option value="<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?></option>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </select>
                                        </div>
                                       <div class="form-input">
                                            <label for="role">Login As</label>
                                            <div style="color: red;"><?= $errors['role'] ?? '' ?></div>
                                            <select name="role" value='<?= $values['role'] ?? '' ?>' id="role">
                                                <option value="">Login in as?</option>
                                                <option value="coach">Coach</option>
                                                <option value="players">Player</option>
                                            </select>
                                        </div>
                                       
                                        
                                        <div class="form-input">
                                        <input class="button" type="submit" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>

           
                    </main>
                </div>
            </div>
        </div>


            <?php include('templates/footer.php');?>

            <?php include('templates/bottom.php');?>
        
    </div>

    

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/uikit.js"></script>
<script type="text/javascript" src="js/components/grid.js"></script>
<script type="text/javascript" src="js/components/slider.js"></script>
<script type="text/javascript" src="js/components/slideshow.js"></script>
<script type="text/javascript" src="js/components/slideset.js"></script>
<script type="text/javascript" src="js/components/sticky.js"></script>
<script type="text/javascript" src="js/components/lightbox.js"></script>
<script type="text/javascript" src="js/components/accordion.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

<script type="text/javascript" src="js/theme.js"></script>
<?php
   unset($_SESSION['login_errors']);
   unset($_SESSION['login_values']);

?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>