<?php 
include('templates/header.php');
$upNext = getLastPlayedMatch($conn);
$team1 = getTeamName($conn, $upNext['team1_id']);
$team2 = getTeamName($conn, $upNext['team2_id']);
$teams= getAllTeam($conn);
$matches = getMatches($conn);
// print_r($matches);
// die();
$nextMatch = $matches[0] ?? '';
$news = array_slice(getNews($conn),0,2);
$other = getOtherPictures($conn);
$AcePictures = getAcePictures($conn);
$contact = getAceContact($conn);

// print_r($other);
// print_r($AcePictures);
// die();
?>


    <div class="over-wrap">
        <?php include('templates/socials.php')?>

        <div class="tm-menu-box">

            <div style="height: 70px;" class="uk-sticky-placeholder">
                <?php include('templates/nav.php');?>

            </div>

        </div>

        <div class="tm-top-a-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="akslider-module ">
                                <div class="uk-slidenav-position" data-uk-slideshow="{height: 'auto', animation: 'swipe', duration: '500', autoplay: false, autoplayInterval: '7000', videoautoplay: true, videomute: true, kenburns: false}">
                                    <ul class="uk-slideshow uk-overlay-active">
                                        <li aria-hidden="false" class="uk-height-viewport uk-active">
                                            <div style="background-image: url(images/main-slider-img1.jpg);" class="uk-cover-background uk-position-cover"></div><img style="width: 100%; height: auto; opacity: 0;" class="uk-invisible" src="images/main-slider-img.jpg" alt="">
                                            <div class="uk-position-cover uk-flex-middle">
                                                <div class="uk-container uk-container-center uk-position-cover">
                                                    <div class="va-promo-text uk-width-6-10 uk-push-4-10">
                                                        <h6>We are a sports, entertainment and tourism company</h6>
                                                        <div class="promo-sub">Just play. <span>Have fun.</span> Enjoy the game</div>
                                                        <a href="about.php" class="read-more">Read More<i class="uk-icon-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li aria-hidden="true" class="uk-height-viewport">
                                            <div style="background-image: url(images/main-slider-img.jpg);" class="uk-cover-background uk-position-cover"></div><img style="width: 100%; height: auto; opacity: 0;" class="uk-invisible" src="images/main-slider-img1.jpg" alt="">
                                            <div class="uk-position-cover uk-flex-middle">
                                                <div class="uk-container uk-container-center uk-position-cover">
                                                    <div class="va-promo-text uk-width-6-10 uk-push-4-10">
                                                        <h3>Just play.<span>Have fun.</span></h3>
                                                        <div class="promo-sub">Life is <span>about timing</span> Enjoy the game</div>
                                                        <a href="about.php" class="read-more">Read More<i class="uk-icon-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li aria-hidden="true" class="uk-height-viewport">
                                            <div style="background-image: url(images/main-slider-img2.php);" class="uk-cover-background uk-position-cover"></div><img style="width: 100%; height: auto; opacity: 0;" class="uk-invisible" src="images/main-slider-img2.jpg" alt="">
                                            <div class="uk-position-cover uk-flex-middle">
                                                <div class="uk-container uk-container-center uk-position-cover">
                                                    <div class="va-promo-text uk-width-6-10 uk-push-4-10">
                                                        <h3>Life is <span>about timing</span></h3>
                                                        <div class="promo-sub">Just play. <span>Have fun.</span> Enjoy the game</div>
                                                        <a href="about.php" class="read-more">Read More<i class="uk-icon-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                    <a href="http://h-sportak.torbara.com/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-text-center">
                                        <li class="uk-active" data-uk-slideshow-item="0"><a href="http://h-sportak.torbara.com/">0</a>
                                        </li>
                                        <li data-uk-slideshow-item="1"><a href="http://h-sportak.torbara.com/">1</a>
                                        </li>
                                        <li data-uk-slideshow-item="2"><a href="http://h-sportak.torbara.com/">2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <div class="tm-top-b-box tm-full-width ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-b" class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">

                            <div class="va-latest-wrap">
                                <div class="uk-container uk-container-center">
                                    <div class="va-latest-top">
                                        <h3>Latest <span>Results</span></h3>
                                        <div class="tournament">
                                            <address><?=$upNext['location'] ?? ''?><br><br></address> </div>
                                        <div class="date">
                                        <?= date('F d, Y', strtotime($upNext['date'])) ?? ''?> | <?= $upNext['time'] ?? ''?></div>
                                    </div>
                                </div>
                                <div class="va-latest-middle uk-flex uk-flex-middle">
                                    <div class="uk-container uk-container-center">
                                        <div class="uk-grid uk-flex uk-flex-middle">
                                            <div class="uk-width-2-12 center">
                                                <a href="results.php?id=<?= $upNext['id'] ?? ''?>">
                                                    <img src="uploads/<?=$team1['logo'] ?? ''?>" class="img-polaroid" alt="" title="">
                                                </a>
                                            </div>
                                            <div class="uk-width-3-12 name uk-vertical-align">
                                                <div class="wrap uk-vertical-align-middle">
                                                <?=$team1['name'] ?? ''?> </div>
                                            </div>
                                            <div class="uk-width-2-12 score">
                                                <div class="title">score</div>
                                                <div class="table">
                                                    <div class="left"> <?=$upNext['team1_score'] ?? ''?></div>
                                                    <div class="right"> <?=$upNext['team2_score'] ?? ''?></div>
                                                    <div class="uk-clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="uk-width-3-12 name alt uk-vertical-align">
                                                <div class="wrap uk-vertical-align-middle">
                                                <?=$team2['name'] ?? ''?> </div>
                                            </div>
                                            <div class="uk-width-2-12 center">
                                                <a href="results.php?id=<?= $upNext['id'] ?? ''?>">
                                                   <img src="uploads/<?=$team2['logo'] ?? ''?>" class="img-polaroid" alt="" title="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-container uk-container-center">
                                    <div class="va-latest-bottom">
                                        <div class="uk-grid">
                                            <div class="uk-width-8-12 uk-container-center text">
                                                <p>Vivamus hendrerit, tortor sed luctus maximus, nunc urna hendrerit nibh, sit amet efficitur libero lorem quis mauris. Nunc a pulvinar lectus. Pellentesque aliquam justo ut rhoncus lobortis. In sed venenatis massa. Sed sodales faucibus odio, eget tempus nibh accumsan ut. Fusce tincidunt semper finibus. Nullam consequat non leo interdum pulvinar.</p>
                                            </div>
                                        </div>

                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <div class="btn-wrap uk-container-center">
                                                    <a class="read-more" href="results.php?id=<?= $upNext['id'] ?? ''?>">More Info</a>
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


        


        <div class="tm-top-d-box  " >
            <!-- <div class="uk-container uk-container-center">
                <section id="tm-top-d" class="tm-top-d uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="donate-wrap">
                                <div class="donate-inner">
                                    <h3><span>Support</span> ACE INC</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-8-10 uk-push-1-10 intro-text">
                                            Donec ultrices pharetra bibendum. Aliquam velit tortor, maximus gravida nunc vitae, tincidunt dignissim erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi nec nisl a augue aliquam fringilla ac consectetur enim. Nullam sed pretium elit, eget fringilla nunc. </div>
                                    </div>
                                    <form class="teamdonate-form" method="post" target="paypal">
                                        <div class="radio-wrap">
                                            <label class="active">$ 5
                                                <input name="amount" value="5" type="radio">
                                            </label>
                                            <label>$ 10
                                                <input name="amount" value="10" type="radio">
                                            </label>
                                            <label>$ 25
                                                <input name="amount" value="25" type="radio">
                                            </label>
                                            <label>$ 50
                                                <input name="amount" value="50" type="radio">
                                            </label>
                                            <label>$ 75
                                                <input name="amount" value="75" type="radio">
                                            </label>
                                            <label>$ 100
                                                <input name="amount" value="100" type="radio">
                                            </label>
                                        </div>
                                        
                                        <br>
                                        <br>
                                        <button class="donate-btn" type="submit" name="submit"><span>Donate</span>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> -->
        </div>


        <div class="tm-top-e-box tm-full-width  va-main-next-match">
            <div class="uk-container uk-container-center">
                <section id="tm-top-e" class="tm-top-e uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="uk-container uk-container-center">
                                <div class="uk-grid uk-grid-collapse">
                                    <div class="uk-width-medium-1-2 uk-width-small-1-1 va-single-next-match">
                                        <div class="va-main-next-wrap">
                                            <div class="main-next-match-title"><em>Next <span>Match</span></em>
                                            </div>
                                            <div class="match-list-single">
                                                <div class="match-list-item">
                                                    <div class="count">
                                
                                                        <div id="countdown4">
                                                            <div class="counter_container">
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                    <div class="clear"></div>
                                                    <?php if($nextMatch) :?>
                                                    <div class="logo">
                                                        <a href="match-single.php?id=<?= $nextMatch['id']?>">
                                                            <img src="uploads/<?= $nextMatch['team1_id']['info'][0]['logo'] ?? ''?>" class="img-polaroid" alt="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> <?= $nextMatch['date'] ?? ''?>" title="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> <?= $nextMatch['date'] ?? ''?>">
                                                        </a>
                                                    </div>
                                                    <div class="team-name"><?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> </div>
                                                    <div class="versus">VS</div>

                                                    <div class="team-name"><?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> </div>
                                                    <div class="logo">
                                                        <a href="match-single.php?id=<?= $nextMatch['id']?>">
                                                            <img src="uploads/<?= $nextMatch['team2_id']['info'][0]['logo'] ?? ''?>" class="img-polaroid" alt="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> <?= $nextMatch['date'] ?? ''?>" title="<?= $nextMatch['team1_id']['info'][0]['name'] ?? ''?> VS <?= $nextMatch['team2_id']['info'][0]['name'] ?? ''?> <?= $nextMatch['date'] ?? ''?>">
                                                        </a>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="date"><?= date('F d, Y', strtotime($nextMatch['date'])) ?? ''?> | <?= $nextMatch['time'] ?? ''?> </div>
                                                    <div class="clear"></div>
                                                    <div class="location"><address><?= $nextMatch['location'] ?? ''?><br><br></address> </div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2 uk-width-small-1-1 va-list-next-match">
                                        <div class="match-list-wrap">
                                            <?php if($matches) :?>
                                            <?php foreach($matches as $match) :?>
                                            <div class="match-list-item alt">
                                                <div class="date"><?= $match['date'] ?? ''?> </div>
                                                <div class="wrapper">
                                                    <div class="logo">
                                                        <a href="match-single.php?id=<?= $match['id'] ?? '' ?>">
                                                            <img src="uploads/<?= $match['team1_id']['info'][0]['logo'] ?? '' ?>" class="img-polaroid" alt="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> <?= $match['date'] ?? ''?>" title="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> <?= $match['date'] ?? ''?>">
                                                        </a>
                                                    </div>
                                                    <div class="team-name"><?= $match['team1_id']['info'][0]['name'] ?? '' ?> </div>
                                                    <div class="versus">VS</div>

                                                    <div class="team-name"><?= $match['team2_id']['info'][0]['name'] ?? '' ?> </div>
                                                    <div class="logo">
                                                        <a href="match-single.php?id=<?= $match['id'] ?? '' ?>">
                                                            <img src="uploads/<?= $match['team2_id']['info'][0]['logo'] ?? '' ?>" class="img-polaroid" alt="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> <?= $match['date'] ?? ''?>" title="<?= $match['team1_id']['info'][0]['name'] ?? '' ?> VS <?= $match['team2_id']['info'][0]['name'] ?? '' ?> <?= $match['date'] ?? ''?>">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach ?>
                                            <?php endif?>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="tm-top-f-box tm-full-width  va-main-our-news">
            <div class="uk-container uk-container-center">
                <section id="tm-top-f" class="tm-top-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="uk-container uk-container-center">
                                <div class="uk-grid uk-grid-collapse" data-uk-grid-match="">
                                    <div class="uk-width-1-1">
                                        <div class="our-news-title">
                                            <h3>Our <span>News</span></h3>
                                        </div>
                                        <div class="our-news-text">Nullam quis eros tellus. Duis sit amet neque nec orci feugiat tincidunt. Lorem ipsum dolor sit amet,
                                            <br> consectetur adipiscing elit. Nulla sed turpis aliquet, pharetra enim sit amet, congue erat. </div>
                                    </div>
                                    <?php if($news) :?>
                                    <?php foreach($news as $news) :?>
                                    <article class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1 our-news-article" data-uk-grid-match="">
                                        <div class="img-wrap uk-cover-background uk-position-relative" style="background-image: url(uploads/<?= $news['picture'] ?? ''?>); min-height: 280px;">


                                            <a href="news-single.php?id=<?=$news['id'] ?? ''?>"></a>
                                            <img class="uk-invisible" src="uploads/<?= $news['picture'] ?? ''?>" alt="">

                                        </div>
                                        <div style="min-height: 280px;" class="info">
                                            <div class="date">
                                                <!-- Nov 20, 2015  -->
                                                <span><?=date('d', strtotime($news['date'])) ?? ''?></span>
                                                <?=substr(date('F', strtotime($news['date'])), 0, 3) ?? ''?>,
                                                <?=(date('Y', strtotime($news['date']))) ?? ''?>
                                            </div>
                                            <div class="name">
                                                <h4>
                                                    <a href="news-single.php?id=<?=$news['id'] ?? ''?>"><?= $news['title'] ?? ''?> </a>	
                                                </h4>
                                            </div>
                                            <div class="text">
                                                <p><?= substr($news['description'],0,100) ?? ''?></p>
                                                <div class="read-more"><a href="news-single.php?id=<?=$news['id'] ?? ''?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>

                                    </article>
                                    <?php endforeach ?>
                                    <?php endif?>

                                    

                                </div>
                            </div>
                            <div class="all-news-btn"><a href="news.php"><span>All News</span></a>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="tm-top-g-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-g" class="tm-top-g uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1">
                        <div class="uk-panel">

                            <div class="gallery-title">
                                <div class="uk-container uk-container-center tt-gallery-top-main">
                                    <div class="uk-grid" data-uk-grid-match="">
                                        <div class="uk-width-6-10 title">Gallery</div>
                                        <!-- <div class="uk-width-4-10 text">Nullam quis eros tellus. Duis sit amet neque nec orci feugiat tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed turpis aliquet, pharetra enim sit amet, congue erat. </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="uk-sticky-placeholder">
                                <div style="margin: 0px;" class="button-group filter-button-group" data-uk-sticky="{top:70, boundary: true}">
                                    <div class="uk-container uk-container-center">
                                        <button class="active" data-filter="*">all</button>
                                        <button data-filter=".tt_c26e2589e25045ad516b5bc37d18523a">Ace Pictures</button>
                                        <button data-filter=".tt_6081becaf04f5a1455407d73e09bca13">Others</button>
                                        <!-- <button data-filter=".tt_c71a18083d9e74b4a5c5d8d9a17d68d0">Basketball</button>
                                        <button data-filter=".tt_449a5f6d01d5f416810d04b4df596b6a">Football</button>
                                        <button data-filter=".tt_ea9d8d12fefde9e2f9c4631a76504ce7">Rugby</button> -->
                                    </div>
                                </div>
                            </div>

                            <div id="boundary">

                                <div class="uk-grid uk-grid-collapse grid" data-uk-grid-match="">
                                    <div class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4 grid-item article-slider tt_c26e2589e25045ad516b5bc37d18523a ">
                                        <div class="uk-slidenav-position" data-uk-slideshow="{height:300}">
                                            <ul class="uk-slideshow">
                                                <?php if($AcePictures) :?>
                                                <?php foreach($AcePictures as $picture) :?>
                                                <li 
                                                <?php if($picture['id']==1) :?>
                                                class="uk-active" aria-hidden="false"
                                                <?php else:?>
                                                    aria-hidden="true"
                                                <?php endif?>
                                                >
                                                    <div style="background-image: url(uploads/<?= $picture['picture'] ?? ''?>);" class="uk-cover-background uk-position-cover"></div>
                                                    <img style="width: 100%; height: auto%; opacity: 0;" class="uk-responsive-height" src="uploads/<?= $picture['picture'] ?? ''?>" alt="<?= $picture['title'] ?? ''?>">
                                                    <div class="titles">
                                                        <div class="sub-title" style="color:black">
                                                            <?= $picture['title'] ?? ''?> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </ul>
                                            <div class="article-slider-btn">
                                                <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                                <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4 grid-item tt_6081becaf04f5a1455407d73e09bca13 ">
                                        <div class="gallery-album">
                                            <?php if($other) :?>
                                            <?php foreach($other as $key=> $picture) :?>
                                            <a href="uploads/<?= $picture['picture'] ?? ''?>" data-uk-lightbox="{group:'my-group'}" class="img-<?=$key-1?>">
                                                <img src="uploads/<?= $picture['picture'] ?? ''?>" alt="">
                                            </a>
                                            <?php endforeach?>
                                            <?php endif?>
                                            <!-- <a href="images/6a987145d42263cbfc9724ee737b1d60.jpg" data-uk-lightbox="{group:'my-group'}" class="img-1">
                                                <img src="images/6a987145d42263cbfc9724ee737b1d60.jpg" alt="">
                                            </a>
                                            <a href="images/03f1869954e6e557b8ac56b508030a3b.jpg" data-uk-lightbox="{group:'my-group'}" class="img-2">
                                                <img src="images/03f1869954e6e557b8ac56b508030a3b.jpg" alt="">
                                            </a> -->

                                            <div class="titles">
                                                <div class="title">Ace </div>
                                                <div class="sub-title">Album </div>
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

        

        <div class="tm-bottom-b-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-b" class="tm-bottom-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="our-team-main-wrap">
                                <div class="uk-container uk-container-center">
                                    <div class="uk-grid" data-uk-grid-match="">
                                        <div class="uk-width-medium-8-10 uk-width-small-1-1 uk-push-1-10">
                                            <div class="our-team-wrap">
                                                <div class="our-team-title">
                                                    <h3>Our <span>Teams</span></h3>
                                                </div>
                                                <div class="our-team-text">
                                                    <p>Nullam quis eros tellus. Duis sit amet neque nec orci feugiat tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed turpis aliquet, pharetra enim sit amet, congue erat.</p>
                                                </div>
                                                <div class="our-team-text additional">
                                                    <p>Cras convallis feugiat felis eget venenatis. Sed leo tellus, luctus eget ante quis, rutrum dignissim enim. Morbi efficitur tellus non mauris tincidunt feugiat. Vestibulum quis nunc in nibh eleifend convallis. Vestibulum nec viverra dui. Suspendisse vel neque eros. Donec tincidunt tempus massa sed vehicula. Integer ullamcorper at elit eu commodo.</p>
                                                </div>
                                                <div class="team-read-wrap"><a class="team-read-more" href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($teams) :?>
                                        <?php foreach($teams as $team) :?>
                                        <div class=" uk-width-large-1-4 uk-width-medium-1-3 uk-width-small-1-2 player-item tt_2a195f12da9f3f36da06e6097be7e451">
                                            <div class="player-article">
                                                <div class="wrapper">
                                                    <div class="img-wrap">
                                                        <div class="player-number"><span></span>
                                                        </div>
                                                        <div class="bio"><span><a href="team.php?id=<?= $team['id'] ?? ''?>">Info</a></span>
                                                        </div>
                                                        <a href="player.php">
                                                            <img src="uploads/<?= $team['logo'] ?? ''?>" class="img-polaroid" alt="Steven Webb" title="Steven Webb">
                                                        </a>
                                                        <ul class="socials">
                                                            <?php if($team['instagramHandle'])  :?>
                                                            <li class="instagram">
                                                                <a href="http://instagram.com/<?= $team['instagramHandle'] ?? ''?>" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <?php endif ?>
                                                            <?php if($team['facebookLink']) :?>
                                                            <li class="facebook">
                                                                <a href="http://facebook.com/<?= $team['facebookLink'] ?? ''?>" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <?php endif ?>
                                                            <?php if($team['email']) :?>
                                                            <li class="email">
                                                                <a href="mailto:<?= $team['email'] ?? ''?>" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <?php endif ?>
                                                            <?php if ($team['phoneNumber']) :?>
                                                            <li class="phone">
                                                                <a href="tel:<?= $team['phoneNumber'] ?? ''?>" target="_blank" rel="nofollow">
                                                                </a>
                                                            </li>
                                                            <?php endif?>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="name">
                                                            <h3>
                                                                <a href="team.php?id=<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?> </a>
                                                            </h3>
                                                        </div>
                                                        <div class="position"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach?>
                                        <?php else : ?>
                                            <h4>No Teams Yet</h4>
                                        <?php endif?>


                                        
                                    </div>
                                </div>

                                <div class="our-team-btn"><a href="teams.php"><span>More Info</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>

        

       

        <div class="tm-bottom-e-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-e" class="tm-bottom-e uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="map-wrap">

                                <div class="contact-form-wrap uk-flex">
                                    <div class="uk-container uk-container-center uk-flex-item-1">
                                        <div class="uk-grid  uk-grid-collapse uk-flex-item-1 uk-height-1-1 uk-nbfc">
                                            <div class="uk-width-5-10 contact-left uk-vertical-align contact-left-wrap">
                                            <div class="contact-info-lines uk-vertical-align-middle">
                                                <div class="item phone"><span class="icon"><i class="uk-icon-phone"></i></span><?= $contact['phone']?></div>
                                                <div class="item mail"><span class="icon"><i class="uk-icon-envelope"></i></span><a href="mailto:<?= $contact['email']?>"><?= $contact['email']?></a>
                                                    
                                                </div>
                                                <div class="item location"><span class="icon"><i class="uk-icon-map-marker"></i></span><?= $contact['address']?></div>
                                            </div>
                                            </div>
                                            <div class="uk-width-medium-5-10 uk-width-small-1-1 contact-right-wrap">
                                                <div class="contact-form uk-height-1-1">
                                                    <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center">
                                                        <div class="contact-form-title">
                                                            <h2>Get in touch</h2>
                                                        </div>
                                                        <div id="aiContactSafe_form_1">
                                                            <div class="aiContactSafe" id="aiContactSafe_mainbody_1">
                                                                <div class="contentpaneopen">
                                                                    <div id="aiContactSafeForm">
                                                                        <form method="POST" action="functions/message.php" name="adminForm_1">
                                                                            <div id="displayAiContactSafeForm_1">
                                                                                <div class="aiContactSafe" id="aiContactSafe_contact_form">
                                                                                    <div class="aiContactSafe" id="aiContactSafe_info"></div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_name">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_name"><label for="aics_name">Name</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <input name="sender" required id="aics_name" class="textbox" placeholder="Name" value="" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_email">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_email"><label for="aics_email">E-mail</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <input name="email" required id="aics_email" class="email" placeholder="Email" value="" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_message">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_message"><label for="aics_message">Message</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <textarea name="message" required id="aics_message" cols="40" rows="10" class="editbox" placeholder="Message"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <div id="aiContactSafeBtns">
                                                                                <div id="aiContactSafeButtons_center" style="clear:both; display:block; text-align:center;">
                                                                                    <table style="margin-left:auto; margin-right:auto;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div id="aiContactSafeSend_loading_1">&nbsp;</div>
                                                                                                </td>
                                                                                                <td id="td_aiContactSafeSendButton">
                                                                                                    <input id="aiContactSafeSendButton" name='submit' type="submit">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                        </form>
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
                                <script>
                                    window.map = false;
                                                            
                                    
                                                            
                                    function initialize(){
                                        var myLatlng = new google.maps.LatLng(50.3915097,-4.1306689);
                                    
                                        var mapOptions = {
                                            zoom:16,
                                            center: myLatlng,
                                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                                            scrollwheel: false,

                                            streetViewControl:false,
                                            overviewMapControl:false,
                                            mapTypeControl:false    
                                            
                                        };
                                        
                                        window.map = new google.maps.Map(document.getElementById('map'), mapOptions);                                                                                                                                                                                                                                                                               
                                        
                                    }
                                
                                    google.maps.event.addDomListener(window, 'load', initialize);
                                </script>            
                            <div id="map"></div>
                                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <?php include('templates/footer.php');?>

            

        </div>

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
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript">
    new SimpleCounter("countdown4", 1476154800, {
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


<!-- Mirrored from h-sportak.torbara.com/yellow/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:41:59 GMT -->
</html>