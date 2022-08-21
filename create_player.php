<?php include('templates/header.php');
session_start();
if( isset( $_SESSION['player_errors'] ) ) {
    $errors = $_SESSION['player_errors'];
    $values = $_SESSION['player_values'];
 }
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
                                    <h1>Register Player</h1>
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
                <li class="uk-active"><span>Register Player</span>
                </li>
            </ul>
        </div>
        

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">

                        <div class="uk-container uk-container-center tt-gallery-top">
                            <div class="uk-grid" data-uk-grid-match="">
                                <div class="uk-width-medium-3-10 uk-width-small-1-1 title">Go Ahead And Get Your Player Registered</div>
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
                                    <form action="functions/create_player.php" method="post" enctype="multipart/form-data">
                                    <h3>Personal Information</h3>
                                        <div class="line"></div>
                                        <div class="form-input">
                                            <label for="name">Name</label>
                                            <div style="color: red;"><?= $errors['name'] ?? '' ?></div>
                                            <input type="text"value='<?= $values['name'] ?? '' ?>' name="name" id="name">
                                        </div>
                                        <div class="form-input">
                                            <label for="team">Team</label>
                                            <div style="color: red;"><?= $errors['team'] ?? '' ?></div>
                                            <select name="team"  id="team">
                                                <option value="<?= $values['team'] ?? '' ?>"><?php $name=getTeamName($conn,$values['team']?? 0);echo($name['name']) ?? 'select the team you are coaching' ?></option>
                                                <?php if($teamNames):?>
                                                <?php foreach($teamNames as $team) :?>
                                                <option value="<?= $team['id'] ?? ''?>"><?= $team['name'] ?? ''?></option>
                                                <?php endforeach?>
                                                <?php endif?>
                                            </select>
                                        </div>
                                        <div class="form-input">
                                            <label for="jersey_number">Jercey Number </label>
                                            <div style="color: red;"><?= $errors['jersey_number'] ?? '' ?></div>
                                            <input type="text" value='<?= $values['jersey_number'] ?? '' ?>' name="jersey_number" id="jersey_number">
                                        </div>
                                        <div class="form-input">
                                            <label for="picture">Upload a Picture</label>
                                            <div style="color: red;"><?= $errors['picture'] ?? '' ?></div>
                                            <input type="file" name="picture" id="picture">
                                        </div>
                                        
                                        <div class="form-input">
                                            <label for="players_age">Players Age</label>
                                            <div style="color: red;"><?= $errors['players_age'] ?? '' ?></div>
                                            <select name="players_age" value='<?= $values['players_age'] ?? '' ?>' id="players_age">
                                                <option value="<?= $values['players_age'] ?? '' ?>"><?= $values['players_age'] ?? 'Select players age' ?></option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                            </select>
                                        </div>
                                        <div class="form-input">
                                            <label for="players_position">Players Position</label>
                                            <div style="color: red;"><?= $errors['players_position'] ?? '' ?></div>
                                            <select name="players_position" value='<?= $values['players_position'] ?? '' ?>' id="players_position">
                                                <option value="<?= $values['players_position'] ?? '' ?>"><?= $values['players_position'] ?? 'Select players position' ?></option>
                                                <option value="GOALKEEPER">Goal Keeper</option>
                                                <option value="DEFENDER">Defender</option>
                                                <option value="STRIKER">Stricker</option>
                                                <option value="MIDFIELDER">Midfilder</option>
                                            </select>
                                        </div>
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
                                            <label for="instagram">Instagram Handle </label>
                                            <input type="text" value='<?= $values['instagram'] ?? '' ?>' name="instagram" id="instagram">
                                        </div>
                                        <div class="form-input">
                                            <label for="facebook">Facebook Link </label>
                                            <input type="text" value='<?= $values['facebook'] ?? '' ?>' name="facebook" id="facebook">
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
   unset($_SESSION['player_errors']);
   unset($_SESSION['player_values']);
?>
</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/players.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 22:44:25 GMT -->
</html>