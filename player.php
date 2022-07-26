<?php include('templates/header.php');
if($_GET['id']){
    $id = $_GET['id'];
    $player = getPlayersDetail($conn,$id);
}else{
    header('Location:./404.php');
    exit();
}

if ($player == null){
    header('Location:./404.php');
    exit();
}
$PlayerID = 0;
if(isset($_SESSION['loginDetail'])){
    $TeamID = $_SESSION['loginDetail']['teamId'];
    $PlayerID = $_SESSION['loginDetail']['playerId'] ?? '';
}

// print_r($TeamID);
// print_r($PlayerID);
// die();

?>

<link href="css/costom.css" rel="stylesheet" type="text/css" />

    <div class="over-wrap">
    <?php include('templates/socials.php')?>
        

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
                                    <h1>Player</h1>
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
                <li><a href="team.php?id=<?=$player['teamId'] ?? ''?>">Team</a>
                </li>
                <li class="uk-active"><span><?= $player['name'] ?? ''?> </span>
                </li>
            </ul>
        </div>


        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">
                        <div id="system-message-container"></div>
                        <div class="contentpaneopen">
                            <article class="player-single tt-players-page">
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-gfid">
                                        <?php if($player['id'] == $PlayerID) :?>
                                        <a href="edit-players.php?id=<?=$player['id'] ?? ''?>" class='edit'>Edit</a>
                                        <?php endif?>
                                    </div>
                                </div>
                                <div class="player-top">
                                    <div class="uk-container uk-container-center alt">
                                        <div class="uk-grid">
                                            <div class="uk-width-5-12">
                                                <div class="avatar">
                                                    <img src="uploads/<?=$player['profilePicture']?>" class="img-polaroid" alt="<?= $player['name'] ?? ''?>" title="<?= $player['name'] ?? ''?>">                    
                                                </div>
                                            </div>
                                            <div class="uk-width-1-12">
                                                <div class="number">
                                                <?= $player['jerseyNumber'] ?? ''?>                    
                                                </div>
                                            </div>
                                            <div class="uk-width-6-12">
                                                <div class="name">
                                                    <h2>
                                                    <?= $player['name'] ?? ''?>                        
                                                    </h2>
                                                </div>
                                                <div class="wrap">
                                                    <ul class="info">
                                                        <li><span>POSITION</span><span><?= $player['position'] ?? ''?></span></li>
                                                        <li><span>TEAM</span><span><?php $name=getTeamName($conn,$player['teamId']);echo $name['name'] ?></span></li>
                                                        <li><span>GOALs</span><span><?= $player['goals'] ?? ''?></span></li>
                                                        <li><span>YELLOW CARDS</span><span><?= $player['yellow_cards'] ?? ''?></span></li>
                                                        <li><span>RED CARDS</span><span><?= $player['red_cards'] ?? ''?></span></li>
                                                        <li><span>AGE</span><span><?= $player['age'] ?? ''?></span></li>
                                                        <li><span>HEIGHT</span><span><?= $player['height'] ?? ''?> M</span></li>
                                                        <li><span>WEIGHT</span><span><?= $player['weight'] ?? ''?> KG</span></li>
                                                    </ul>
                                                    <ul class="socials">
                                                        <li class="twitter"><a href="http://twitter.com/" target="_blank" rel="nofollow">
                                                            </a>
                                                        </li>
                                                        <li class="facebook"><a href="http://facebook.com/" target="_blank" rel="nofollow">
                                                            </a>
                                                        </li>
                                                        <li class="google-plus"><a href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                            </a>
                                                        </li>
                                                        <li class="pinterest"><a href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                            </a>
                                                        </li>
                                                        <li class="linkedin"><a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-9-10 uk-push-1-10">
                                            <div class="player-total-info">
                                                <p><strong>Aenean lobortis eu nibh eu euismod. In ullamcorper, velit sed tincidunt tempor, ante elit euismod magna, vel scelerisque odio velit nec arcu. Nulla dolor sapien, vehicula sit amet augue nec, consequat aliquet velit. Donec euismod interdum mauris id dapibus.</strong></p>
                                                <p>Fusce mollis ante dolor, in tincidunt justo vehicula id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam nec tortor sit amet metus vestibulum sagittis. Donec sed dignissim nisi. Pellentesque ac dolor vestibulum, sollicitudin leo ac, pretium nulla. Mauris sit amet mattis turpis, eu molestie lectus. Donec semper sem ac dolor euismod vulputate. Quisque massa elit, viverra et euismod nec, porta eget elit. Aliquam molestie tempus ex, ut iaculis tortor eleifend ac. Aliquam id massa facilisis, iaculis orci et, ornare augue. Fusce eget sollicitudin est. Fusce ultrices enim ut aliquam sollicitudin.</p>
                                                <ul>
                                                    <li>Maecenas a nisl in turpis fermentum imperdiet;</li>
                                                    <li>Nullam at diam et odio consectetur fermentum;</li>
                                                    <li>Maecenas volutpat lacus quis sem congue egestas;</li>
                                                    <li>Quisque sit amet nunc quis quam tincidunt scelerisque;</li>
                                                    <li>Maecenas vestibulum ligula sed augue dictum, quis tincidunt nulla pellentesque;</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- <div>
                                <div class="other-players-wrap">
                                    <div class="uk-container uk-container-center alt">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <h3 class="other-post-title">Other <span>Players</span></h3>
                                                <div dir="ltr" class="uk-slidenav-position player-slider" data-uk-slider="">
                                                    <div class="uk-slider-container">
                                                        <div class="player-slider-btn">
                                                            <a draggable="false" href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-previous" data-uk-slider-item="previous"></a>
                                                            <a draggable="false" href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-next" data-uk-slider-item="next"></a>
                                                        </div>
                                                        <ul class="uk-slider uk-grid uk-grid-width-1-4">
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>47</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/70d6fcd7a5ed8edc8acc6b52c76d7ff4.jpg" class="img-polaroid" alt="Joe Perez" title="Joe Perez"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Joe Perez</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">STRIKER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>21</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/494a6c4fd56d9d2af64b92b6337db693.jpg" class="img-polaroid" alt="Steven Webb" title="Steven Webb"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Steven Webb</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">DEFENDER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>07</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/f9bfc5bc85499506c9e18e5afb2eaf2d.jpg" class="img-polaroid" alt="Benjamin Mendoza" title="Benjamin Mendoza"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Benjamin Mendoza</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">DEFENDER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>36</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/8a3d3554567e4859f88a93ac59e1eadc.jpg" class="img-polaroid" alt="<?= $player['name'] ?? ''?>" title="<?= $player['name'] ?? ''?>"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php"><?= $player['name'] ?? ''?></a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">STRIKER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>23</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/450032a6f795065465ebb3d698d74294.jpg" class="img-polaroid" alt="Bobby Guerrero" title="Bobby Guerrero"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Bobby Guerrero</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">MIDFIELDER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>14</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/a0cd8e2687c86ec4810f4adec5724bba.jpg" class="img-polaroid" alt="Douglas Pain" title="Douglas Pain"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Douglas Pain</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">DEFENDER</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            
                                                            <li class="player-item">
                                                                <div class="player-article">
                                                                    <div class="wrapper">
                                                                        <div class="img-wrap">
                                                                            <div class="player-number">
                                                                                <span>35</span>
                                                                            </div>
                                                                            <div class="bio"><span><a draggable="false" href="player.php">bio</a></span></div>
                                                                            <a draggable="false" href="player.php">
                                                                            <img draggable="false" src="images/bd84c3b0e76d2dd99a75ac9ca2f6ec06.jpg" class="img-polaroid" alt="Johnny Thompson" title="Johnny Thompson"></a>                                    
                                                                            <ul class="socials">
                                                                                <li class="twitter"><a draggable="false" href="http://twitter.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="facebook"><a draggable="false" href="http://facebook.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="google-plus"><a draggable="false" href="https://plus.google.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="pinterest"><a draggable="false" href="https://www.pinterest.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                                <li class="linkedin"><a draggable="false" href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="name">
                                                                                <h3>
                                                                                    <a draggable="false" href="player.php">Johnny Thompson</a>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="position">goalkeeper</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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


<!-- Mirrored from h-sportak.torbara.com/yellow/player.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:34:27 GMT -->
</html>