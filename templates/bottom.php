<div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li class="uk-parent uk-active"><a href="index.php">Home</a>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="teams.php">Teams</a></li>
                    <!-- <li class="uk-parent uk-active"><a href="#">Pages</a>
                        <ul class="uk-nav-sub">
                            <li><a href="teams.php">Teams</a>
                            </li>
                            <li><a href="gallery.php">Gallery</a>
                            </li>
                            
                        </ul>
                    </li> -->
                    
                    <li><a href="news.php">News</a>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <li class="uk-parent uk-active"><a href="#">Register</a>
                        <ul class="uk-nav-sub">
                            <li><a href="create_team.php">Team Registeration</a>
                            </li>
                            <li><a href="create_player.php">Player Registeration</a>
                            </li>
                            </li>
                            <li><a href="create_coach.php">Coach Registeration</a>
                            </li>
                            
                        </ul>
                    </li>
                    <?php if(isset($_SESSION['loginDetail'])) :?>
                    <?php if($_SESSION['loginDetail'] == ['Admin']) :?>
                    <li class="uk-parent uk-active"><a href="#">Admin</a>
                        <ul class="uk-nav-sub">
                            <li><a href="match_form.php">Fix Match</a>
                            </li>
                            <li><a href="update-match.php?id=1">Update Match</a>
                            </li>
                            <li><a href="create_coach.php">Create News</a>
                            </li>
                            <li><a href="create-award.php">New Award</a>
                            </li>
                            <li><a href="edit-award.php">Update Award</a>
                            </li>
                            <li><a href="aceContactform.php">Ace Contact</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif?>
                    <?php endif?>
                    <?php if(isset($_SESSION['loginDetail'])) :?>
                    <li><a href="login.php">Logout</a>
                    </li>
                    <?php else :?>
                    <li><a href="login.php">Login</a>
                    </li>
                    <?php endif?>
                    
                </ul>
            </div>
        </div>