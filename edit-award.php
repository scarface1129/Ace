<?php 
include('templates/header.php');
if($_SESSION['loginDetail'] != ['Admin']){
    header('Location:index.php?error=Restricted-Page');
}
if(!isset($_SESSION['loginDetail'])){
    header('Location:login.php');
    exit();
}else if(isset( $_SESSION['award_errors'] ) ) {
    $errors = $_SESSION['award_errors'];
    $values = $_SESSION['award_values'];
 }else{
    if($_GET['id']){
        $id = $_GET['id'];
        $values = getAwardDetails($conn,$id);
    }else{
        header('Location:./404.php');
        exit();
    }
    
 }
// print_r($_SESSION);
// die();

 if($_GET['id']){
    $id = $_GET['id'];}

$teamNames = getTeams($conn);

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
                                    <h1>Edit Award</h1>
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
                <li class="uk-active"><span>Edit Award</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Edit an Award </div>
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
                                    <form action="functions/edit-award.php" method="post" enctype="multipart/form-data">
                                    <h3>Award Information</h3>
                                        <div class="line"></div>
                                        <div class="form-input">
                                            <label for="name">Name</label>
                                            <div style="color: red;"><?= $errors['name'] ?? '' ?></div>
                                            <input type="text"value='<?= $values['name'] ?? '' ?>' name="name" id="name">
                                        </div>
                                        <div class="form-input">
                                            <label for="image">Award Image</label>
                                            <div style="color: red;"><?= $errors['image'] ?? '' ?></div>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="form-input">
                                            <label for="winnerId">Winner</label>
                                            <div style="color: red;"><?= $errors['winnerId'] ?? '' ?></div>
                                            <select name="winnerId" value='<?= $values['winnerId'] ?? '' ?>' id="winnerId">
                                                <option value="<?= $values['winnerId'] ?? '' ?>"><?= $values['winnerId'] ?? 'select the team' ?></option>
                                                <?php if($teamNames):?>
                                                <?php foreach($teamNames as $team) :?>
                                                <option value="<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?></option>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </select>
                                        </div>
                                        <div class="form-input">
                                            <label for="losserId">Loser</label>
                                            <div style="color: red;"><?= $errors['losserId'] ?? '' ?></div>
                                            <select name="losserId" value='<?= $values['losserId'] ?? '' ?>' id="losserId">
                                                <option value="<?= $values['losserId'] ?? '' ?>"><?= $values['losserId'] ?? 'select the team' ?></option>
                                                <?php if($teamNames):?>
                                                <?php foreach($teamNames as $team) :?>
                                                <option value="<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?></option>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="scores">Scores (0-2)  </label>
                                            <div style="color: red;"><?= $errors['scores'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['scores'] ?? '' ?>' name="scores" id="scores">
                                        </div>
                                        <input type="hidden" name='id' value="<?=$id?>"/>
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
   unset($_SESSION['award_errors']);
   unset($_SESSION['award_values']);
?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>