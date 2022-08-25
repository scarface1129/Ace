<?php include('templates/header.php');
// include('./functions/dbconnect.php');
// include('./functions/functions.php');
if(!isset($_SESSION['loginDetail'])){
    header('Location:login.php');
    exit();
}else if( isset( $_SESSION['match_errors'] ) ) {
    $errors = $_SESSION['match_errors'];
    $values = $_SESSION['match_values'];
 }else{
    if($_GET['id']){
        $values = getValue($conn,$_GET['id']);
    }else{
        header('Location:./404.php');
        exit();
    }
 }
 if($_GET['id']){
    $id = getValue($conn,$_GET['id']);
 }
    // print_r($values);
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
                                    <h1>Update  Match</h1>
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
                <li class="uk-active"><span>Update Match</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Match UPdate</div>
                                <div class="uk-width-medium-7-10 uk-width-small-1-1 text">Aenean aliquam, dolor eu lacinia pellentesque, dui arcu condimentum nisl, quis sollicitudin mi lorem quis leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis sapien a ante rutrum pulvinar quis ac tellus. Proin facilisis dui at mollis tincidunt. Sed dignissim orci non arcu luctus pretium. Donec at ex aliquet, porttitor lacus eget, ullamcorper quam. Integer pellentesque egestas arcu, nec molestie leo sollicitudin et</div>
                            </div>
                        </div>

                        <div class="list-players-wrapper">
                            <div class="uk-sticky-placeholder">
                                <div class="button-group filter-button-group" data-uk-sticky="{top:70, boundary: true}">
                                    <div class="uk-container uk-container-center">
                                        <div class="label-menu">Update The Form Below</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <section class="create">
                                <div class="form">
                                    <form action="functions/edit-match.php" method="post" enctype="multipart/form-data">
                                    <h3>Match Information</h3>
                                        <div class="line"></div>
                                        <div class="form-input">
                                            <label for="name">Date</label>
                                            <div style="color: red;"><?= $errors['date'] ?? '' ?></div>
                                            <input type="date"value='<?= $values['date'] ?? '' ?>' name="date" id="date">
                                        </div>
                                        <div class="form-input">
                                            <label for="name">time</label>
                                            <div style="color: red;"><?= $errors['time'] ?? '' ?></div>
                                            <input type="time"value='<?= $values['time'] ?? '' ?>' name="time" id="time">
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="team1">team 1 </label>
                                            <div style="color: red;"><?= $errors['team1'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['team1'] ?? $values['team1_id'] ?>' name="team1" id="team1">
                                        </div>
                                        <div class="form-input">
                                            <label for="team2">team 2 </label>
                                            <div style="color: red;"><?= $errors['team2'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['team2'] ?? $values['team2_id'] ?>' name="team2" id="team2">
                                        </div>
                                        <div class="form-input">
                                            <label for="about_match">About Match </label>
                                            <div style="color: red;"><?= $errors['about_match'] ?? '' ?></div>
                                            <textarea type="text" value='<?= $values['about_match'] ?? '' ?>' name="about_match" id="about_match"><?= $values['about_match'] ?? 'scarface' ?></textarea>
                                        </div>
                                        <div class="form-input">
                                            <label for="location">Location </label>
                                            <div style="color: red;"><?= $errors['location'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['location'] ?? '' ?>' name="location" id="location">
                                        </div>
                                        <div class="form-input">
                                            <label for="fouls">Fouls </label>
                                            <input type="text" value='<?= $values['fouls'] ?? '' ?>' name="fouls">
                                        </div>
                                        <div class="form-input">
                                            <label for="team1_score">Team1_score </label>
                                            <input type="text" value='<?= $values['team1_score'] ?? '' ?>' name="team1_score">
                                        </div>
                                        <div class="form-input">
                                            <label for="team2_score">Team2_score </label>
                                            <input type="text" value='<?= $values['team2_score'] ?? '' ?>' name="team2_score">
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="played">Played </label>
                                            <select name="played" id="played">
                                                <option value="False">No</option>
                                                <option value="True">Yes</option>
                                            </select>
                                        </div>
                                            <input type="hidden" value='<?=$values['id'] ?>' name="id">
                                        
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
   unset($_SESSION['match_errors']);
   unset($_SESSION['match_values']);
?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>