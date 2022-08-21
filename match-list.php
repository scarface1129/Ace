<?php 

include('templates/header.php');
$matches = getMatches($conn);
$matchResults = getMatchResults($conn);

$nextMatch = $matches[0];

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
                                <img class="uk-invisible" src="../images/head-bg-match.php" alt="">
                                <div class="uk-position-cover uk-flex-center head-news-title">
                                    <h1>
                                        Match List
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
                                                                        <a href="match-single.php">
                                                                        <img src="images/team-ava.png" class="img-polaroid" alt="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> (2015-11-14)" title="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> (2015-11-14)"></a>                                             
                                                                    </div>
                                                                    <div class="team-name">
                                                                        <?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?>                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="versus">VS</div>
                                                            <div class="half left">
                                                                <div class="va-wrap">
                                                                    <div class="team-name">
                                                                        <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?>                    
                                                                    </div>
                                                                    <div class="logo">
                                                                        <a href="match-single.php">
                                                                        <img src="images/team-ava1.png" class="img-polaroid" alt="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> (2015-11-14)" title="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> (2015-11-14)"></a>                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="date">
                                                                <i class="uk-icon-calendar"></i>
                                                                <?= date('F d, Y', strtotime($nextMatch['date'])) ?? ''?> | <?= $nextMatch['time'] ?? ''?>            
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="location">
                                                                <i class="uk-icon-map-marker"></i>
                                                                <address>
                                                                <?= $nextMatch['location'] ?? ''?>               <br><br>
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
                <li><a href="http://h-sportak.torbara.com/index.php">Home</a></li>
                <li class="uk-active"><span>Match list</span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                    <main id="tm-content" class="tm-content">
                        <div class="match-list-wrap">
                            
                            <?php if($matches) :?>
                            <?php foreach($matches as $match) :?>
                            <div class="match-list-item">
                            <div class="date">
                                    <span><?=date('d', strtotime($match['date'])) ?? ''?></span>
                                    <?=substr(date('F', strtotime($match['date'])), 0, 3) ?? ''?>                
                                </div>
                                <div class="logo">
                                    <a href="match-single.php?id=<?= $match['id'] ?? '' ?>">
                                    <img src="images/team-ava.png" class="img-polaroid" alt="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> (2015-11-14)" title="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> (2015-11-14)"></a>                                     
                                </div>
                                <div class="team-name">
                                    <?= $match['team1_id']['info'][0]['name'] ?? '' ?>                
                                </div>
                                <!-- <div class="team-score">
                                    2                    
                                </div>
                                <div class="score-separator">:</div>
                                <div class="team-score">
                                    0                    
                                </div> -->
                                <div class="versus">VS</div>
                                <div class="team-name">
                                    <?= $match['team2_id']['info'][0]['name'] ?? '' ?>                
                                </div>
                                <div class="logo">
                                    <a href="match-single.php?id=<?= $match['id'] ?? '' ?>">
                                    <img src="images/team-ava1.png" class="img-polaroid" alt="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> (2015-11-14)" title="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> (2015-11-14)"></a>                                    
                                </div>
                                <div class="location">
                                    <address>
                                        Cambridgeshire UK               <br><br>
                                    </address>
                                </div>
                                <div class="va-view-wrap">
                                    <a class="view-article" href="match-single.php?id=<?= $match['id'] ?? '' ?>">view</a>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <?php endif?>
                            <?php if($matchResults) :?>
                            <?php foreach($matchResults as $matchResult) :?>
                            <div class="match-list-item">
                                <div class="date">
                                    <span><?=date('d', strtotime($matchResult['date'])) ?? ''?></span>
                                    <?=substr(date('F', strtotime($matchResult['date'])), 0, 3) ?? ''?>                
                                </div>
                                <div class="logo">
                                    <a href="results.php?id=<?= $matchResult['id']?? ''?>">
                                    <img src="images/team-ava.png" class="img-polaroid" alt="<?php $name=getTeamName($conn, $matchResult['team1_id']);
                                    echo $name['name']?> VS <?php $name=getTeamName($conn, $matchResult['team2_id']);
                                    echo $name['name']?>  <?= date('F d, Y', strtotime($matchResult['date'])) ?? ''?> | <?= $matchResult['time'] ?? ''?>" title="<?php $name=getTeamName($conn, $matchResult['team1_id']);
                                    echo $name['name']?> VS <?php $name=getTeamName($conn, $matchResult['team2_id']);
                                    echo $name['name']?>  <?= date('F d, Y', strtotime($matchResult['date'])) ?? ''?> | <?= $matchResult['time'] ?? ''?>"></a>                                     
                                </div>
                                <div class="team-name">
                                    <?php $name=getTeamName($conn, $matchResult['team1_id']);
                                    echo $name['name']?>                
                                </div>
                                <div class="team-score">
                                <?= $matchResult['team1_score'] ?? ''?>                    
                                </div>
                                <div class="score-separator">:</div>
                                <div class="team-score">
                                <?= $matchResult['team2_score'] ?? ''?>                    
                                </div>
                                <div class="team-name">
                                <?php $name=getTeamName($conn, $matchResult['team2_id']);
                                    echo $name['name']?>                
                                </div>
                                <div class="logo">
                                    <a href="results.php?id=<?= $matchResult['id']?? ''?>">
                                    <img src="images/team-ava1.png" class="img-polaroid" alt="<?php $name=getTeamName($conn, $matchResult['team1_id']);
                                    echo $name['name']?> VS <?php $name=getTeamName($conn, $matchResult['team2_id']);
                                    echo $name['name']?>  <?= date('F d, Y', strtotime($matchResult['date'])) ?? ''?> | <?= $matchResult['time'] ?? ''?>" title="<?php $name=getTeamName($conn, $matchResult['team1_id']);
                                    echo $name['name']?> VS <?php $name=getTeamName($conn, $matchResult['team2_id']);
                                    echo $name['name']?>  <?= date('F d, Y', strtotime($matchResult['date'])) ?? ''?> | <?= $matchResult['time'] ?? ''?>"></a>                                    
                                </div>
                                <div class="location">
                                    <address>
                                        <?= $matchResult['location'] ?? ''?>               <br><br>
                                    </address>
                                </div>
                                <div class="va-view-wrap">
                                    <a class="view-article" href="results.php?id=<?= $matchResult['id']?? ''?>">view</a>
                                </div>
                            </div>
                            <?php endforeach?>
                            <?php endif?>
                        </div>
                    </main>
                </div>
                <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first">
                    
                    <div class="uk-panel news-sidebar">
                        <h3 class="uk-panel-title">Latest News</h3>
                        int(3)
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="news-single.php">
                                    <img src="images/35b8bf93115eb2b8da9f8b4f41fdb0fd.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 25, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="news-single.php">
                                            Suspendisse purus enim, dictum sed lorem ac, sodales maximus est                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="news-single.php">
                                    <img src="images/4e9ed1f24d1f63b923e67456774158a3.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 20, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="news-single.php">
                                            Suspendisse purus enim, dictum sed lorem ac, sodales maximus est                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="news-single.php">
                                    <img src="images/19896c58825d0206bd858f7e50bf51b2.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 20, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="news-single.php">
                                            Cum sociis natoque penatibus et magnis dis parturient                    </a>       
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </aside>
            </div>
        </div>

        <div class="tm-bottom-e-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-e" class="tm-bottom-e uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <img src="images/match-list-img-bottom.jpg" alt="">
                        </div>
                    </div>
                </section>
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


<!-- Mirrored from h-sportak.torbara.com/yellow/match-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:30:29 GMT -->
</html>