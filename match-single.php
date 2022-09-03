<?php include('templates/header.php');
// include('./functions/dbconnect.php');
// include('./functions/functions.php');


if($_GET['id']){
        $id = $_GET['id'];
        $matches = getMatch($conn,$_GET['id']);
        $stadium =  getPictures($matches[0]['stadium_image']);
    }else{
        header('Location:./404.php');
        exit();
    }

    $otherPosts = getAllPost($conn);

// print_r($stadium);
// die();

?>


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
                            <div class="uk-cover-background uk-position-relative head-match-wrap" style="height: 590px; background-image: url('images/head-bg-match.jpg');">
                                <img class="uk-invisible" src="images/head-bg-match.jpg" alt="">
                                <div class="uk-position-cover uk-flex-center head-news-title">
                                    <h1>
                                        <?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?>
                                    </h1>
                                    <div class="clear"></div>
                                    <div class="uk-container uk-container-center">
                                        <div class="uk-grid no-marg">
                                            <div class="uk-width-6-10 va-single-next-match match-view-wrap">
                                                <div class="va-main-next-wrap">
                                                    <div class="match-list-single">
                                                        <div class="match-list-item">
                                                            <div class="count">
                                                                <div id="countdown4">
                                                                    <div class="counter_container"></div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="half right">
                                                                <div class="va-wrap">
                                                                    <div class="logo">
                                                                        <a href="#">
                                                                        <img src="images/team-ava.png" class="img-polaroid" alt="<?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?> (2015-11-14)" title="<?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?> (2015-11-14)"></a>                                             
                                                                    </div>
                                                                    <div class="team-name">
                                                                    <?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?>                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="versus">VS</div>
                                                            <div class="half left">
                                                                <div class="va-wrap">
                                                                    <div class="team-name">
                                                                    <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?>                    
                                                                    </div>
                                                                    <div class="logo">
                                                                        <a href="#">
                                                                        <img src="images/team-ava1.png" class="img-polaroid" alt="<?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?> (2015-11-14)" title="<?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?> (2015-11-14)"></a>                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="date">
                                                                <i class="uk-icon-calendar"></i>
                                                                <?= date('F d, Y', strtotime($matches[0]['date'])) ?? ''?> | <?= $matches[0]['time'] ?? ''?>            
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="location">
                                                                <i class="uk-icon-map-marker"></i>
                                                                <address>
                                                                    <?= $matches[0]['location'] ?? ''?>              <br><br>
                                                                </address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="uk-container uk-container-center alt">
            <ul class="uk-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="match-list.php">Match list</a></li>
                <li class="uk-active"><span><?= $matches[0]['team1_id']['info'][0]['name'] ?? ''?> VS <?= $matches[0]['team2_id']['info'][0]['name'] ?? ""?></span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                    <main id="tm-content" class="tm-content">
                        <div class="contentpaneopen">
                            <article class="match-article ">
                                <div class="clearfix"></div>
                                <div class="uk-grid">
                                    <div class="uk-width-10-10">
                                        <?php if($matches[0]['about_match']) :?>
                                        <div class="top-text article-single-text">
                                            <div class="big-title">About <span>Match</span></div>
                                            <p><?= $matches[0]['about_match'] ??''?></p>
                                        </div>
                                        <?php else :?>
                                        <div class="top-text article-single-text">
                                            <div class="big-title">About <span>Match</span></div>
                                            <p>NO DETAILS</p>
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="uk-width-medium-4-10">
                                        <!-- <script>
                                            window.map = false;
                                                                    
                                            
                                                                    
                                            function initialize(){
                                                var myLatlng = new google.maps.LatLng(9.0820,8.6753);
                                            
                                                var mapOptions = {
                                                    zoom:16,
                                                    center: myLatlng,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                    scrollwheel: false,

                                                    streetViewControl:false,
                                                    overviewMapControl:false,
                                                    mapTypeControl:false    
                                                    
                                                };
                                                
                                                window.map = new google.maps.Map(document.getElementById('map1'), mapOptions);                                                                                                                                                                                                                                                                               
                                                
                                            }
                                        
                                            google.maps.event.addDomListener(window, 'load', initialize);
                                        </script>             -->
                                        <!-- <div id="map1"></div> -->
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <!-- <div class="uk-width-1-1">
                                        <div class="middle-text article-single-text">
                                            <p>Suspendisse odio erat, suscipit vel aliquam tristique, dapibus at neque. Aliquam lectus tellus, feugiat non sodales nec, rhoncus a est. Etiam hendrerit, eros nec mollis blandit, velit sem aliquet ex, id tristique metus ligula tincidunt nisi. Ut porta augue at molestie feugiat. Donec quis neque molestie, interdum sapien at, dictum diam. Nam aliquam diam vitae purus vestibulum, sit amet rutrum tortor aliquet. Curabitur rhoncus consectetur tempor. Vivamus volutpat, mauris non auctor molestie, est ex auctor eros, vel egestas eros tellus non dui.</p>
                                        </div>
                                    </div> -->
                                    <div class="uk-width-1-1">
                                        <div class="match-gallery">
                                            <div dir="ltr" class="uk-slidenav-position" data-uk-slider="">
                                                <div class="uk-slider-container">
                                                    <div class="big-title">Photo <span>stadium</span></div>
                                                    <div class="match-slider-btn">
                                                        <a draggable="false" href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-previous" data-uk-slider-item="previous"></a>
                                                        <a draggable="false" href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-next" data-uk-slider-item="next"></a>
                                                    </div>
                                                    <ul class="uk-slider uk-grid uk-grid-width-1-3">
                                                        <?php if($stadium) :?>
                                                        <?php foreach($stadium as $stadium) :?>
                                                        <li><img draggable="false" class="uk-responsive-height" src="uploads/<?=$stadium?>" alt=""></li>
                                                        <?php endforeach?>
                                                        <?php endif?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <div class="article-single-text">
                                            <blockquote>Ut scelerisque odio et cursus hendrerit. Nullam volutpat ligula elit, sit amet viverra est consequat non. Suspendisse nisl magna, suscipit sed volutpat nec, commodo nec nunc. Nunc posuere commodo ipsum, sit amet pretium felis eleifend vitae. Cras eget aliquam augue.</blockquote>
                                            <p>Suspendisse odio erat, suscipit vel aliquam tristique, dapibus at neque. Aliquam lectus tellus, feugiat non sodales nec, rhoncus a est. Etiam hendrerit, eros nec mollis blandit, velit sem aliquet ex, id tristique metus ligula tincidunt nisi. Ut porta augue at molestie feugiat. Donec quis neque molestie, interdum sapien at, dictum diam. Nam aliquam diam vitae purus vestibulum, sit amet rutrum tortor aliquet. Curabitur rhoncus consectetur tempor. Vivamus volutpat, mauris non auctor molestie, est ex auctor eros, vel egestas eros tellus non dui.</p>
                                        </div>
                                    </div>
                                    <!-- <div class="uk-width-1-1">
                                        <div class="share-wrap">
                                            <div class="share-title">share</div>
                                            <script type="text/javascript" src="../../yastatic.net/share/share.js" charset="utf-8"></script>
                                            <div class="yashare-auto-init" data-yasharel10n="en" data-yasharetype="none" data-yasharequickservices="facebook,twitter,gplus"><span class="b-share"><a rel="nofollow" target="_blank" title="Facebook" class="b-share__handle b-share__link b-share-btn__facebook" href="https://share.yandex.net/go.xml?service=facebook&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fmatch%2Fitem%2F14-future-matches%2F4-england-vs-amsterdam-2015-11-14&amp;title=Your%20Joomla!%20Site%20-%20England%20VS%20Amsterdam%20(2015-11-14)%20-%20Future%20matches%20-%20Match%20list%20view" data-service="facebook"><span class="b-share-icon b-share-icon_facebook"></span></a><a rel="nofollow" target="_blank" title="Twitter" class="b-share__handle b-share__link b-share-btn__twitter" href="https://share.yandex.net/go.xml?service=twitter&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fmatch%2Fitem%2F14-future-matches%2F4-england-vs-amsterdam-2015-11-14&amp;title=Your%20Joomla!%20Site%20-%20England%20VS%20Amsterdam%20(2015-11-14)%20-%20Future%20matches%20-%20Match%20list%20view" data-service="twitter"><span class="b-share-icon b-share-icon_twitter"></span></a><a rel="nofollow" target="_blank" title="Google Plus" class="b-share__handle b-share__link b-share-btn__gplus" href="https://share.yandex.net/go.xml?service=gplus&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fmatch%2Fitem%2F14-future-matches%2F4-england-vs-amsterdam-2015-11-14&amp;title=Your%20Joomla!%20Site%20-%20England%20VS%20Amsterdam%20(2015-11-14)%20-%20Future%20matches%20-%20Match%20list%20view" data-service="gplus"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div>
                                        </div>
                                    </div> -->
                                </div>
                            </article>
                        </div>
   
                    </main>
                </div>
                <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first">
                    
                    
                <div class="uk-panel news-sidebar">
                        <h3 class="uk-panel-title">Latest News</h3>
                        <?php if($otherPosts) :?>
                        <?php foreach($otherPosts as $post) :?>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                    <img src="uploads/<?=$post['picture'] ??''?>" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                    <?= date('F d, Y', strtotime($post['date'])) ?? ''?>            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                            <?=$post['title'] ??''?>                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach?>
                        <?php endif?>
                        
                    </div>
                </aside>
            </div>
        </div>

        <?php include('templates/footer.php');?>


        <?php include('templates/bottom.php');?>
    </div>

    

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/uikit.js"></script>
<script type="text/javascript" src="js/SimpleCounter.js"></script>
<script type="text/javascript" src="js/components/grid.js"></script>
<script type="text/javascript" src="js/components/slider.js"></script>
<script type="text/javascript" src="js/components/slideshow.js"></script>
<script type="text/javascript" src="js/components/slideset.js"></script>
<script type="text/javascript" src="js/components/sticky.js"></script>
<script type="text/javascript" src="js/components/lightbox.js"></script>
<script type="text/javascript" src="js/components/accordion.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript">
    new SimpleCounter("countdown4", 1447448400, {
      'continue': 0,
      format: '{D} {H} {M} {S}',
      lang: {
          d: {
              single: 'day',
              plural: 'days'
          }, //days
          h: {
              single: 'hr',
              plural: 'hrs'
          }, //hours
          m: {
              single: 'min',
              plural: 'min'
          }, //minutes
          s: {
              single: 'sec',
              plural: 'sec'
          } //seconds
      },
      formats: {
          full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
          shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
      }
  });
</script>

</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/match-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:32:22 GMT -->
</html>