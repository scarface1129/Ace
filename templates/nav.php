<nav style="margin: 0px;" class="tm-navbar uk-navbar" data-uk-sticky="">
    <div class="uk-container uk-container-center">
        <a class="tm-logo uk-float-left" href="index.php">
            <img src="images/logo1.png" style="width: 100px; height:100px;margin-bottom:18px;" alt="logo" title="logo"> <span>Ace<em> inc</em></span>
        </a>

        <ul class="uk-navbar-nav uk-hidden-small">
            <li class="uk-parent uk-active" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="index.php">Home</a>
                
            </li>
            <li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="about.php">About</a></li>
            <li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="teams.php">Teams</a></li>
            <!-- <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Pages</a>
                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                    <div class="uk-grid uk-dropdown-grid">
                        <div class="uk-width-1-1">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="teams.php">Teams</a>
                                </li>
                                <li><a href="gallery.php">Gallery</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </li> -->
            
            <!-- <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="match-list.php">Match</a>
                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                    <div class="uk-grid uk-dropdown-grid">
                        <div class="uk-width-1-1">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="results.php">Results</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li> -->
            <li><a href="news.php">News</a>
            </li>
            
            <li><a href="contact.php">Contact</a>
            </li>
            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Register</a>
                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                    <div class="uk-grid uk-dropdown-grid">
                        <div class="uk-width-1-1">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="create_team.php">Team Registeration</a>
                                </li>
                                <li><a href="create_player.php">Player Registeration</a>
                                </li>
                                </li>
                                <li><a href="create_coach.php">Coach Registeration</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <?php if(isset($_SESSION['loginDetail'])) :?>
            <?php if($_SESSION['loginDetail'] == ['Admin']) :?>
            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Admin</a>
                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                    <div class="uk-grid uk-dropdown-grid">
                        <div class="uk-width-1-1">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="match_form.php">Fix Match</a>
                                </li>
                                <li><a href="update-match.php?id=1">Update Match</a>
                                </li>
                                <li><a href="create-news.php">Create News</a>
                                </li>
                                <li><a href="create-award.php">New Award</a>
                                </li>
                                <li><a href="edit-award.php">Update Award</a>
                                </li>
                                <li><a href="aceContactform.php">Ace Contact</a>
                                </li>
                                <li><a href="create-gallery.php">Ace Gallery</a>
                                </li>
                                <li><a href="messages.php">Messages</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
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
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
    </div>
</nav>