
<?php 

$pastMatchResults = getMatchResults($conn);


?>
<div class="bottom-wrapper">
            <div class="tm-bottom-f-box  ">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-f" class="tm-bottom-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                        <div class="uk-width-1-1">
                            <div class="uk-panel">
                                <div class="footer-logo">
                                    <a href="index.php"><img src="images/logo1.png" style="width: 90px; height:90px;margin-bottom:18px;" alt=""><span>ACE</span>.INC</a>
                                </div>
                                <div class="footer-socials">
                                    <div class="social-top">
                                    <a href="http://facebook.com/<?=$contact['facebookLink'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                    <a href="tel:<?= $contact['phone'] ??''?>"><span class="uk-icon-small uk-icon-hover uk-icon-phone"></span></a>
                                    <a href="mailto:<?=$contact['email'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-envelope"></span></a>
                                    <a href="http://instagram/<?=$contact['instagramHandle'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                                    </div>
                                </div>
                                <div class="clear"></div>

                                <p class="footer-about-text">
                                    Cras convallis feugiat felis eget venenatis. Sed leo tellus, luctus eget ante quis, rutrum dignissim enim. Morbi efficitur tellus non mauris tincidunt feugiat. Vestibulum quis nunc in nibh eleifend convallis. Vestibulum nec viverra dui. Suspendisse vel neque eros. Donec tincidunt tempus massa sed vehicula. Integer ullamcorper at elit eu commodo.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="tm-bottom-g-box  ">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-g" class="tm-bottom-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                        <div class="uk-width-1-1 uk-width-large-1-2">
                            <div class="uk-panel">
                                <div class="match-list-wrap foot">
                                    <div id="carusel-7" class="uk-slidenav-position" data-uk-slideshow="{ height : 37, autoplay:true, animation:'scroll' }">
                                        <div class="last-match-top">
                                            <div class="last-match-title">Last match</div>
                                            <div class="footer-slider-btn">
                                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <ul class="uk-slideshow">
                                            <?php if($pastMatchResults) :?>
                                            <?php foreach($pastMatchResults as $result) :?>
                                            <li class="" aria-hidden="true">
                                                <div class="match-list-item alt foot">
                                                    <div class="wrapper">
                                                        <div class="logo">
                                                            <a href="match-single.php?id=<?=$result['id'] ?? ''?>">
                                                                <img src="uploads/<?php $team1 = getTeam($conn,$result['team1_id']); echo($team1['logo']); ?>" class="img-polaroid" alt="<?php $name=getTeamName($conn,$result['team1_id']); echo($name['name'])?> VS <?php $name=getTeamName($conn,$result['team2_id']); echo($name['name'])?> <?= ($result['date']) ?? ''?>" title="<?php $name=getTeamName($conn,$result['team1_id']); echo($name['name'])?> VS <?php $name=getTeamName($conn,$result['team2_id']); echo($name['name'])?> <?= ($result['date']) ?? ''?>">
                                                            </a>
                                                        </div>
                                                        <div class="team-name">
                                                            <?php $name=getTeamName($conn,$result['team1_id']); echo($name['name'])?> </div>
                                                        <div class="versus">VS</div>

                                                        <div class="team-name">
                                                        <?php $name=getTeamName($conn,$result['team2_id']); echo($name['name'])?> </div>
                                                        <div class="logo">
                                                            <a href="match-single.php?id=<?=$result['id'] ?? ''?>">
                                                                <img src="uploads/<?php $team2 = getTeam($conn,$result['team2_id']); echo($team2['logo']); ?>" class="img-polaroid" alt="<?php $name=getTeamName($conn,$result['team1_id']); echo($name['name'])?> VS <?php $name=getTeamName($conn,$result['team2_id']); echo($name['name'])?> <?= ($result['date']) ?? ''?>" title="<?php $name=getTeamName($conn,$result['team1_id']); echo($name['name'])?> VS <?php $name=getTeamName($conn,$result['team2_id']); echo($name['name'])?> <?= ($result['date']) ?? ''?>">
                                                            </a>
                                                        </div>
                                                        <a class="read-more" href="match-single.php?id=<?=$result['id'] ?? ''?>">Read More</a>
                                                    </div>
                                                </div>
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
            <footer id="tm-footer" class="tm-footer">
    <div class="uk-panel">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="footer-wrap">
                        <div class="foot-menu-wrap">
                            <ul class="nav menu">
                                <li class="item-165"><a href="about.php">About Ace Inc</a>
                                </li>
                                <li class="item-166"><a href="teams.php">Teams</a>
                                </li><li class="item-166"><a href="index.php">Home</a>
                                </li>
                                <!-- <li class="item-167"><a href="match-list.php">Match</a>
                                </li> -->
                                <!-- <li class="item-168"><a href="results.php">Results</a>
                                </li> -->
                                <!-- <li class="item-169"><  a href="news.php">News</>
                                </li> -->
                            </ul>
                        </div>
                        <div class="copyrights">Copyright © 2022 <a href="">ACE INC Team</a>. All Rights Reserved.</div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


        </div>


