<?php 
include('templates/header.php');
// include('./functions/dbconnect.php');
// include('./functions/functions.php');
session_start();
if( isset( $_SESSION['ace_errors'] ) ) {
    $errors = $_SESSION['ace_errors'];
    $values = $_SESSION['ace_values'];
 }

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
                                    <h1>Ace Contacts</h1>
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
                <li class="uk-active"><span>Ace Contact</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        
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
                                    <form action="functions/contact.php" method="post" enctype="multipart/form-data">
                                    <h3>Contact Information</h3>
                                        <div class="line"></div>
                                        <div class="form-input">
                                            <label for="phone">Phone Number </label>
                                            <div style="color: red;"><?= $errors['phone'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['phone'] ?? '' ?>' name="phone" id="phone">
                                        </div>
                                        <div class="form-input">
                                            <label for="email">Email  </label>
                                            <div style="color: red;"><?= $errors['email'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['email'] ?? '' ?>' name="email" id="email">
                                        </div>
                                        <div class="form-input">
                                            <label for="twitter">Twitter  </label>
                                            <div style="color: red;"><?= $errors['twitter'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['twitter'] ?? '' ?>' name="twitter" id="twitter">
                                        </div>
                                        <div class="form-input">
                                            <label for="facebook">Facebook  </label>
                                            <div style="color: red;"><?= $errors['facebookLink'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['facebookLink'] ?? '' ?>' name="facebook" id="facebook">
                                        </div>
                                        <div class="form-input">
                                            <label for="instagram">Instagram  </label>
                                            <div style="color: red;"><?= $errors['instagramHandle'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['instagramHandle'] ?? '' ?>' name="instagram" id="instagram">
                                        </div>
                                        <div class="form-input">
                                            <label for="location">Location  </label>
                                            <div style="color: red;"><?= $errors['location'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['location'] ?? '' ?>' name="location" id="location">
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
   unset($_SESSION['ace_errors']);
   unset($_SESSION['ace_values']);
?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>