<?php include('templates/header.php');

include('./functions/dbconnect.php');
include('./functions/functions.php');

$team = getTeam($conn,$_GET['id']);
$coach = getCoach($conn,$team['id']);
$players = getPlayers($conn,$team['id']);
// print_r($players);
// die()
?>
<link href="css/costom.css" rel="stylesheet" type="text/css" />
    <div class="over-wrap">
        <div class="toolbar-wrap">
            <div class="uk-container uk-container-center">
                <div class="tm-toolbar uk-clearfix uk-hidden-small">


                    <div class="uk-float-right">
                        <div class="uk-panel">
                            <div class="social-top">
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-google"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-pinterest"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-flickr"></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tm-menu-box">

            <div style="height: 70px;" class="uk-sticky-placeholder">
            <?php include('templates/nav.php');?>

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
                                    <h1>Team</h1>
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
                <li class="uk-active"><span>Team</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">  
                        <div class='team_name'>
                            <h2><?= $team['name']?></h2>
                        </div>                      
                        <div class="tm-top-c-box tm-full-width  home-about">
                            <div class="uk-container uk-container-center">
                                <section id="tm-top-c" class="tm-top-c uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                                    <div class="uk-width-1-1 uk-width-large-1-2">
                                        <div class="uk-panel">
                                            <div class="va-about-wrap clearfix uk-cover-background uk-position-relative">
                                                <div class="va-about-text">
                                                    <div class="title">About <span>Team</span>
                                                    </div>
                                                    <p style="color: #fff;"><?=$team['about_team'] ?? ''?></p>
                                                    <h4 style="color: #fff;">About Coach</h4>
                                                    <p style="color: #fff;"><?=$coach['about_coach'] ?? ''?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-width-1-1 uk-width-large-1-2">
                                        <div style="min-height: 497px;" class="uk-panel">
                                            <div class="trainers-module tm-trainers-slider ">
                                                <div class="trainer-wrapper">
                                                    <div data-uk-slideset="{default: 1, animation: 'fade', duration: 400}">
                                                        <div class="trainer-top">
                                                            <!-- <div class="trainers-btn">
                                                                <a href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                                                                <a href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideset-item="next"></a>
                                                            </div> -->
                                                            <h3>Trainers</h3>
                                                        </div>
                                                        <ul class="uk-grid uk-slideset uk-grid-width-1-1">
                                                            <li class="uk-active">
                                                                <div class="img-wrap"><img src="images/trainer-slider/trainer-img.jpg" alt="coaches image">
                                                                </div>
                                                                <div class="name"><?= $coach['first_name'] ?? ''?> <span><?= $coach['last_name'] ?? ''?></span>
                                                                </div>
                                                            </li>
                                                            <!-- <li style="display: none;">
                                                                <div class="img-wrap"><img src="images/trainer-slider/trainer-img1.jpg" alt="">
                                                                </div>
                                                                <div class="name">Fernand <span>Bernardez</span>
                                                                </div>
                                                            </li>
                                                            <li style="display: none;">
                                                                <div class="img-wrap"><img src="images/trainer-slider/trainer-img2.jpg" alt="">
                                                                </div>
                                                                <div class="name">Martin <span>Huanez</span>
                                                                </div>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div style="height: 80px;"></div>
                        <div class="list-players-wrapper">
                            <div class="uk-sticky-placeholder">
                                <div class="button-group filter-button-group" data-uk-sticky="{top:70, boundary: true}">
                                    <div class="uk-container uk-container-center">
                                        <div class="label-menu">OUR team</div>
                                        <button class="active" data-filter="*">all
                                        </button>
                                        <button data-filter=".DEFENDER">DEFENDER
                                        </button>
                                        <button data-filter=".STRIKER">STRIKER
                                        </button>
                                        <button data-filter=".GOALKEEPER">GOALKEEPER
                                        </button>
                                        <button data-filter=".MIDFIELDER">MIDFIELDER
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-players-wrap" id="boundary">
                                <div class="left-player">
                                    <img src="images/left-player-bg.png" alt="">
                                </div>
                                <div class="right-player">
                                    <img src="images/right-player-bg.png" alt="">
                                </div>
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid grid1 players-list">
                                        <?php if($players) :?>
                                        <?php foreach($players as $player) :?>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item <?= $player['position'] ?? ''?>">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            <?= $player['jerseyNumber'] ?? ''?>                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php?id=<?= $player['id'] ?? ''?>">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/494a6c4fd56d9d2af64b92b6337db693.jpg" class="img-polaroid" alt="Steven Webb" title="Steven Webb">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="instagram">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="phone">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="email">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <!-- <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php?id=<?= $player['id'] ?? ''?>">
                                                                <?= $player['name'] ?? ''?>                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                        <?= $player['position'] ?? ''?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach?>
                                        <?php endif?>




                                        <!-- <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item STRIKER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            19                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/df207a70fca3a58b07082ce9aca2c538.jpg" class="img-polaroid" alt="John Montgomery" title="John Montgomery">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                John Montgomery                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            STRIKER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item GOALKEEPER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            35                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/bd84c3b0e76d2dd99a75ac9ca2f6ec06.jpg" class="img-polaroid" alt="Johnny Thompson" title="Johnny Thompson">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Johnny Thompson                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            goalkeeper 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item DEFENDER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            07                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/f9bfc5bc85499506c9e18e5afb2eaf2d.jpg" class="img-polaroid" alt="Benjamin Mendoza" title="Benjamin Mendoza">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Benjamin Mendoza                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            DEFENDER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item STRIKER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            47                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/70d6fcd7a5ed8edc8acc6b52c76d7ff4.jpg" class="img-polaroid" alt="Joe Perez" title="Joe Perez">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Joe Perez                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            STRIKER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item MIDFIELDER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            23                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/450032a6f795065465ebb3d698d74294.jpg" class="img-polaroid" alt="Bobby Guerrero" title="Bobby Guerrero">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Bobby Guerrero                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            MIDFIELDER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item DEFENDER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            14                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/a0cd8e2687c86ec4810f4adec5724bba.jpg" class="img-polaroid" alt="Douglas Pain" title="Douglas Pain">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Douglas Pain                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            DEFENDER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-small-1-2 player-item STRIKER">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number">
                                                            <span>
                                                            36                
                                                            </span>
                                                        </div>
                                                        <div class="bio">
                                                            <span>
                                                            <a href="player.php">bio
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <a href="player.php">
                                                        <img src="images/8a3d3554567e4859f88a93ac59e1eadc.jpg" class="img-polaroid" alt="Christopher Herrera" title="Christopher Herrera">
                                                        </a>
                                                        <ul class="socials">
                                                            <li class="twitter">
                                                                <a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="google-plus">
                                                                <a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="pinterest">
                                                                <a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <li class="linkedin">
                                                                <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="player.php">
                                                                Christopher Herrera                    
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position">
                                                            STRIKER 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
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

</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>