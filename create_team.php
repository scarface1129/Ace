<?php include('templates/header.php');?>
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
                                    <h1>Register Team</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="uk-container uk-container-center alt">
            <ul class="uk-breadcrumb">
                <li><a href="index-2.php">Home</a>
                </li>
                <li class="uk-active"><span>Register Team</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Go Ahead And Get Your Team Registered</div>
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
                                    <form action="" method="post">
                                        <div class="form-input">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name">
                                        </div>
                                        <div class="form-input">
                                            <label for="players">Number Of Players</label>
                                            <input type="text" name="players" id="players">
                                        </div>
                                        <div class="form-input">
                                            <label for="logo">Team Logo</label>
                                            <input type="file" name="logo" id="logo">
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="seeking_players">Seeking Players?</label>
                                            <select name="seeking_players" id="seeking_players">
                                                <option value="True">Yes</option>
                                                <option value="False">No</option>
                                            </select>
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


        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li class="uk-parent uk-active"><a href="index-2.php">Home</a>
                        <ul class="uk-nav-sub">
                            <li><a class="yellow-scheme" href="index-2.php">Yellow Color Scheme</a>
                            </li>
                            <li><a class="blue-scheme" href="http://h-sportak.torbara.com/blue/index.php">Blue Color Scheme</a>
                            </li>
                            <li><a class="red-scheme" href="http://h-sportak.torbara.com/red/index.php">Red Color Scheme</a>
                            </li>
                            <li><a href="offline.php">Offline Page</a>
                            </li>
                            <li><a href="404.php">Error Page</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li class="uk-parent uk-active"><a href="#">Pages</a>
                        <ul class="uk-nav-sub">
                            <li><a href="players.php">Players</a>
                            </li>
                            <li><a href="gallery.php">Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="uk-parent"><a href="match-list.php">Match</a>
                        <ul class="uk-nav-sub">
                            <li><a href="results.php">Results</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="news.php">News</a>
                    </li>
                    <li><a href="category.php">Shop</a>
                    </li>
                    <li><a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
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