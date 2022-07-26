<?php 
include('templates/header.php');

$getAward = getAwards($conn);
$about = getAboutAce($conn);

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
                            <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('images/head-bg.jpg');">
                                <img class="uk-invisible" src="images/head-bg.jpg" alt="" height="290" width="1920">
                                <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                    <h1>About Us</h1>
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
                <li class="uk-active"><span>About Ace Inc</span>
                </li>
            </ul>
        </div>

        <div class="tm-bottom-a-box  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-a" class="tm-bottom-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="about-team-page-top-wrap">
                                <div class="uk-grid">
                                    <div class="uk-width-large-5-10 uk-width-small-1-1 left-part">
                                        <div class="top-title">
                                            <h2>About <span>Ace Inc</span></h2>
                                            
                                        </div>
                                        <p class="sub-title"><?=$about['paragraph1'] ?? ''?></p>
                                        <p><?=$about['paragraph2'] ??''?></p>
                                    </div>
                                    <div class="uk-width-large-5-10 uk-width-small-1-1">
                                        <div class="top-banner uk-cover-background uk-position-relative" style="height: 420px; background-image: url('images/offline-bg.jpg');">
                                            <img class="uk-invisible" src="images/offline-bg.jpg" alt="">
                                            <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle inner">
                                                <?=$about['quote'] ??''?>
                                                <!-- “It’s not whether you get knocked
                                                <br> down; it’s whether you get up.” -->
                                                <div class="name"><?=$about['quote_by'] ?? ''?></div>
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

                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="our-history-wrap">
                                <div class="our-history-title">
                                    <h2>Our <span>History</span></h2>
                                </div>
                                <div class="our-history-top">
                                    <div class="uk-container uk-container-center">
                                        <div class="uk-grid">
                                            <!-- This is the container of the toggling elements -->
                                            <ul class="our-history-timeline" data-uk-switcher="{connect:'#our-history'}">
                                                <li class="uk-active" aria-expanded="true"><a href="http://h-sportak.torbara.com/">2013</a>
                                                </li>
                                                <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">2014</a>
                                                </li>
                                                <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">2015</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-container uk-container-center">
                                    <div class="uk-grid">
                                        <!-- This is the container of the content items -->
                                        <ul id="our-history" class="uk-switcher uk-container uk-container-center">
                                            <li aria-hidden="false" class="uk-grid uk-active">
                                                <div class="uk-width-medium-4-10">
                                                    <h3 class="history-title">Maecenas <span>dapibus</span></h3>
                                                    <!-- This is the container of the toggling elements -->
                                                    <ul class="tabs-switch-top" data-uk-switcher="{connect:'#tab-switch'}">
                                                        <li class="uk-active" aria-expanded="true"><a href="http://h-sportak.torbara.com/">Lorem</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Ipsum</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Dolor</a>
                                                        </li>
                                                    </ul>

                                                    <!-- This is the container of the content items -->
                                                    <ul id="tab-switch" class="uk-switcher tabs-switch-bottom">
                                                        <li class="uk-active" aria-hidden="false">
                                                            <p>Lorem nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>Ipsum nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>In eu nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="uk-width-medium-4-10">
                                                    <h3 class="history-title">Praesent <span>dictum</span></h3>
                                                    <div class="uk-accordion" data-uk-accordion="">

                                                        <h4 class="uk-accordion-title uk-active">Nunc et diam a nunc venenatis fermentum <span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="true" data-wrapper="true" role="list" style="height: auto; position: relative;">
                                                            <div class="uk-accordion-content uk-active">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Nulla quis est pretium, commodo tortor ac<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Vestibulum a arcu vitae dui faucibus euismod<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-2-10">
                                                    <h3 class="history-title">Statistic</h3>
                                                    <table class="stat-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Games</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Goals</td>
                                                                <td>15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Legues</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Violations</td>
                                                                <td>7</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <li aria-hidden="true" class="uk-grid">
                                                <div class="uk-width-medium-4-10 uk-width-small-1-1">
                                                    <h3 class="history-title">Praesent <span>dictum</span></h3>
                                                    <!-- This is the container of the toggling elements -->
                                                    <ul class="tabs-switch-top" data-uk-switcher="{connect:'#tab-switch1'}">
                                                        <li class="uk-active" aria-expanded="true"><a href="http://h-sportak.torbara.com/">Lorem</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Ipsum</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Dolor</a>
                                                        </li>
                                                    </ul>

                                                    <!-- This is the container of the content items -->
                                                    <ul id="tab-switch1" class="uk-switcher tabs-switch-bottom">
                                                        <li class="uk-active" aria-hidden="false">
                                                            <p>Lorem nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>Ipsum nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>In eu nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="uk-width-medium-4-10 uk-width-small-1-1">
                                                    <h3 class="history-title">Maecenas <span>dapibus</span></h3>
                                                    <div class="uk-accordion" data-uk-accordion="">

                                                        <h4 class="uk-accordion-title uk-active">Nunc et diam a nunc venenatis fermentum <span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="true" data-wrapper="true" role="list" style="height: auto; position: relative;">
                                                            <div class="uk-accordion-content uk-active">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Nulla quis est pretium, commodo tortor ac<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Vestibulum a arcu vitae dui faucibus euismod<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-2-10 uk-width-small-1-1">
                                                    <h3 class="history-title">Statistic</h3>
                                                    <table class="stat-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Games</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Goals</td>
                                                                <td>15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Awards</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Violations</td>
                                                                <td>7</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <li aria-hidden="true" class="uk-grid">
                                                <div class="uk-width-medium-4-10">
                                                    <h3 class="history-title">Maecenas <span>dapibus</span></h3>
                                                    <!-- This is the container of the toggling elements -->
                                                    <ul class="tabs-switch-top" data-uk-switcher="{connect:'#tab-switch2'}">
                                                        <li class="uk-active" aria-expanded="true"><a href="http://h-sportak.torbara.com/">Lorem</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Ipsum</a>
                                                        </li>
                                                        <li aria-expanded="false"><a href="http://h-sportak.torbara.com/">Dolor</a>
                                                        </li>
                                                    </ul>

                                                    <!-- This is the container of the content items -->
                                                    <ul id="tab-switch2" class="uk-switcher tabs-switch-bottom">
                                                        <li class="uk-active" aria-hidden="false">
                                                            <p>Lorem nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>Ipsum nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                        <li aria-hidden="true">
                                                            <p>In eu nibh eu urna posuere laoreet. Sed luctus dignissim aliquet. Ut nec nisl porttitor, ornare turpis quis, accumsan dolor.</p>
                                                            <ul>
                                                                <li>Nunc commodo ipsum ac mi;</li>
                                                                <li>Curabitur bibendum odio eu orci;</li>
                                                                <li>Morbi tincidunt lacus a pulvinar;</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="uk-width-medium-4-10">
                                                    <h3 class="history-title">Praesent <span>dictum</span></h3>
                                                    <div class="uk-accordion" data-uk-accordion="">

                                                        <h4 class="uk-accordion-title uk-active">Nunc et diam a nunc venenatis fermentum <span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="true" data-wrapper="true" role="list" style="height: auto; position: relative;">
                                                            <div class="uk-accordion-content uk-active">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Nulla quis est pretium, commodo tortor ac<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                        <h4 class="uk-accordion-title">Vestibulum a arcu vitae dui faucibus euismod<span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                                                        <div aria-expanded="false" data-wrapper="true" role="list" style="overflow:hidden;height:0;position:relative;">
                                                            <div class="uk-accordion-content">Phasellus sagittis venenatis suscipit. Donec vehicula aliquam neque. Aenean lobortis tellus ut tortor ornare, eu pharetra magna faucibus.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-2-10">
                                                    <h3 class="history-title">Statistic</h3>
                                                    <table class="stat-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Games</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Goals</td>
                                                                <td>15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Awards</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Violations</td>
                                                                <td>7</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="tm-bottom-d-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-d" class="tm-bottom-d uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel our-awards-wrap">
                            <div class="uk-width-1-1">
                                <div class="our-awards-title">
                                    <h3>Our <span>Championships</span></h3>
                                </div>
                                <div class="our-awards-text">Nullam quis eros tellus. Duis sit amet neque nec orci feugiat tincidunt. Lorem ipsum dolor sit amet,
                                    <br> consectetur adipiscing elit. Nulla sed turpis aliquet, pharetra enim sit amet, congue erat. </div>
                            </div>
                            <div dir="ltr" class="uk-slidenav-position our-awards" data-uk-slider="{default: 6, autoplay:true, autoplayInterval:3000, animation: 'slide-bottom', duration: 100}">
                                <div class="uk-slider-container">
                                    <ul class="uk-slider uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-3">
                                        <?php if($getAward) :?>
                                        <?php foreach($getAward as $award) :?>
                                        <li class="uk-slide-after">
                                            <div class="img-wrap"><img draggable="false" src="uploads/<?= $award['image'] ??''?>" alt="">
                                            </div>
                                            <div class="text"><?= $award['name'] ??''?></div>
                                        </li>
                                        <?php endforeach?>
                                        <?php endif?>
                                    </ul>
                                </div>
                            </div>
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

</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:19 GMT -->
</html>