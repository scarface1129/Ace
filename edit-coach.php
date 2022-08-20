<?php 
include('templates/header.php');
// include('./functions/dbconnect.php');
// include('./functions/functions.php');
session_start();
if( isset( $_SESSION['coach_errors'] ) ) {
    $errors = $_SESSION['coach_errors'];
    $values = $_SESSION['coach_values'];
 }else{
    if($_GET['id']){
        $id = $_GET['id'];
        $values = getCoachDetails($conn,$id);
    }else{
        header('Location:./404.php');
        exit();
    }
    
 }
 if($_GET['id']){
    $id = $_GET['id'];}

//  print_r($values);
//  die();
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
                                    <h1>Edit Coach Information</h1>
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
                <li class="uk-active"><span>Edit Information</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Go Ahead And Edit Your Information</div>
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
                                    <form action="functions/edit-coach.php" method="post" enctype="multipart/form-data">
                                    <h3>Personal Information</h3>
                                        <div class="line"></div>
                                        <div class="form-input">
                                            <label for="first_name">First Name</label>
                                            <div style="color: red;"><?= $errors['first_name'] ?? '' ?></div>
                                            <input type="text"value='<?= $values['first_name'] ?? '' ?>' name="first_name" id="first_name">
                                        </div>
                                        <div class="form-input">
                                            <label for="last_name">Last Name</label>
                                            <div style="color: red;"><?= $errors['last_name'] ?? '' ?></div>
                                            <input type="text"value='<?= $values['last_name'] ?? '' ?>' name="last_name" id="last_name">
                                        </div>
                                        <div class="form-input">
                                            <label for="team">Team</label>
                                            <div style="color: red;"><?= $errors['team'] ?? '' ?></div>
                                            <select name="team" value='<?= $values['team'] ?? '' ?>' id="team">
                                                <option value="<?= $values['team'] ?? '' ?>"><?= $values['team'] ?? 'select the team you are coaching' ?></option>
                                                <?php if($teamNames):?>
                                                <?php foreach($teamNames as $team) :?>
                                                <option value="<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?></option>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </select>
                                        </div>
                                        <div class="form-input">
                                            <label for="picture">Upload a Picture</label>
                                            <div style="color: red;"><?= $errors['picture'] ?? '' ?></div>
                                            <input type="file" name="picture" id="picture">
                                        </div>
                                        <div class="form-input">
                                            <label for="age">Age </label>
                                            <div style="color: red;"><?= $errors['age'] ?? '' ?></div>
                                            <select name="age" value='<?= $values['age'] ?? '' ?>' id="age">
                                                <option value="<?= $values['age'] ?? '' ?>"><?= $values['age'] ?? 'Select age' ?></option>
                                                <option value="30">29-30</option>
                                                <option value="35">31-35</option>
                                                <option value="40">36-40</option>
                                            </select>
                                        </div>
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
                                            <label for="about_coach">About Coach </label>
                                            <div style="color: red;"><?= $errors['about_coach'] ?? '' ?></div>
                                            <textarea type="text" value='<?= $values['about_coach'] ?? '' ?>' name="about_coach" id="about_coach"><?= $values['about_coach'] ?? '' ?></textarea>
                                        </div>
                                        <input type="hidden" value="<?= $id?>" name="id" id='id'/>
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
   unset($_SESSION['coach_errors']);
   unset($_SESSION['coach_values']);
?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>