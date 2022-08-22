<?php 
$contact = getAceContact($conn);
?>


<div class="toolbar-wrap">
            <div class="uk-container uk-container-center">
                <div class="tm-toolbar uk-clearfix uk-hidden-small">


                    <div class="uk-float-right">
                        <div class="uk-panel">
                            <div class="social-top">
                            <a href="http://facebook.com/<?=$contact['facebookLink'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                            <a href="tel:<?= $contact['phone'] ??''?>"><span class="uk-icon-small uk-icon-hover uk-icon-phone"></span></a>
                            <a href="mailto:<?=$contact['email'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-envelope"></span></a>
                            <a href="http://instagram/<?=$contact['instagramHandle'] ?? ''?>"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>