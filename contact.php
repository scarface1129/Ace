<?php include('templates/header.php');


$contact = getAceContact($conn);


?>



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
                                    <h1>Contact</h1>
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
                <li class="uk-active"><span>Contact</span>
                </li>
            </ul>
        </div>

        <div class="tm-bottom-a-box  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-a" class="tm-bottom-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="contact-page">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="contact-title">
                                            <h2>Nulla vehicula sem id nisl fringilla porta</h2>
                                        </div>
                                        <div class="contact-text">Aenean aliquam, dolor eu lacinia pellentesque, dui arcu condimentum nisl, quis sollicitudin mi lorem quis leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis sapien a ante rutrum pulvinar quis ac tellus. Proin facilisis dui at mollis tincidunt. Sed dignissim orci non arcu luctus pretium. Donec at ex aliquet, porttitor lacus eget, ullamcorper quam. Integer pellentesque egestas arcu, nec molestie leo sollicitudin et</div>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <div class="contact-socials-wrap">
                                            <ul class="contact-socials">
                                                <?php if($contact['facebookLink']) :?>
                                                <li><a href="http://facebook.com/<?= $contact['facebookLink']?>"><i class="uk-icon-facebook"></i></a></li>
                                                <?php endif?>
                                                <?php if($contact['twitter']) :?>
                                                <li><a href="http://twitter.com/<?= $contact['twitter']?>"><i class="uk-icon-twitter"></i></a></li>
                                                <?php endif?>
                                                <!-- <li><a href="http://youtube.com/"><i class="uk-icon-youtube"></i></a></li> -->
                                                <?php if($contact['instagramHandle']) :?>
                                                <li><a href="http://instagram.com/<?= $contact['instagramHandle']?>"><i class="uk-icon-instagram"></i></a></li>
                                                <?php endif?>
                                                <?php if($contact['phone']) :?>
                                                <li><a href="tel:<?= $contact['phone']?>"><i class="uk-icon-phone"></i></a></li>
                                                <?php endif?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-match="{target:'.contact-enquiries'}">
                                    <!-- <div class="uk-width-medium-1-3 uk-panel">
                                        <div style="min-height: 139px;" class="contact-enquiries">
                                            <div class="title">CLUB ENQUIRIES</div>
                                            <div class="phone"><i class="uk-icon-phone"></i>(846)-356-9322</div>
                                            <div class="mail">
                                                <i class="uk-icon-envelope"></i>
                                                <a href="malto:support@torbara.com">
                                                    support@torbara.com
                                                </a>
                                            </div>
                                            <div class="location"><i class="uk-icon-map-marker"></i>9478 Chestnut Street, Woodstock, GA 30188</div>
                                        </div>
                                    </div> -->
                                    <div class="uk-width-medium-3-3 uk-panel">
                                        <div style="min-height: 139px; align-items: center;" class="contact-enquiries">
                                            <div class="title">MEDIA  AND  OFFICIAL ENQUIRIES</div>
                                            <div class="phone"><i class="uk-icon-phone"></i><?= $contact['phone']?></div>
                                            <div class="mail">
                                                <i class="uk-icon-envelope"></i>
                                                <a href="malto:<?= $contact['email']?>">
                                                <?= $contact['email']?>
                                                </a>
                                            </div>
                                            <div class="location"><i class="uk-icon-map-marker"></i><?= $contact['address']?></div>
                                        </div>
                                    </div>
                                    <!-- <div class="uk-width-medium-1-3 uk-panel">
                                        <div style="min-height: 139px;" class="contact-enquiries">
                                            <div class="title">HEAD OFFICE</div>
                                            <div class="phone"><i class="uk-icon-phone"></i>(846)-356-9322</div>
                                            <div class="mail">
                                                <i class="uk-icon-envelope"></i>
                                                <a href="malto:support@torbara.com">
                                                   support@torbara.com
                                                </a>
                                            </div>
                                            <div class="location"><i class="uk-icon-map-marker"></i>241 Adams Street, Huntington, NY 11743</div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="tm-bottom-b-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-bottom-b" class="tm-bottom-b uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="map-wrap">

                                <div class="contact-form-wrap uk-flex">
                                    <div class="uk-container uk-container-center uk-flex-item-1">
                                        <div class="uk-grid  uk-grid-collapse uk-flex-item-1 uk-height-1-1 uk-nbfc">
                                            <div class="uk-width-5-10 contact-left uk-vertical-align contact-left-wrap">
                                                <div class="contact-info-lines uk-vertical-align-middle">
                                                    <div class="item phone"><span class="icon"><i class="uk-icon-phone"></i></span><?= $contact['phone']?></div>
                                                    <div class="item mail"><span class="icon"><i class="uk-icon-envelope"></i></span><a href="mailto:<?= $contact['email']?>"><?= $contact['email']?></a>
                                                        
                                                    </div>
                                                    <div class="item location"><span class="icon"><i class="uk-icon-map-marker"></i></span><?= $contact['address']?></div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-5-10 uk-width-small-1-1 contact-right-wrap">
                                                <div class="contact-form uk-height-1-1">
                                                    <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center">
                                                        <div class="contact-form-title">
                                                            <h2>Get in touch</h2>
                                                        </div>
                                                        <div id="aiContactSafe_form_1">
                                                            <div class="aiContactSafe" id="aiContactSafe_mainbody_1">
                                                                <div class="contentpaneopen">
                                                                    <div id="aiContactSafeForm">
                                                                        <form method="POST" action="functions/message.php" name="adminForm_1">
                                                                            <div id="displayAiContactSafeForm_1">
                                                                                <div class="aiContactSafe" id="aiContactSafe_contact_form">
                                                                                    <div class="aiContactSafe" id="aiContactSafe_info"></div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_name">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_name"><label for="aics_name">Name</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <input name="sender" required id="aics_name" class="textbox" placeholder="Name" value="" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_email">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_email"><label for="aics_email">E-mail</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <input name="email" required id="aics_email" class="email" placeholder="Email" value="" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="aiContactSafe_row" id="aiContactSafe_row_aics_message">
                                                                                        <div class="aiContactSafe_contact_form_field_label_left"><span class="aiContactSafe_label" id="aiContactSafe_label_aics_message"><label for="aics_message">Message</label></span>&nbsp;
                                                                                            <label class="required_field">*</label>
                                                                                        </div>
                                                                                        <div class="aiContactSafe_contact_form_field_right">
                                                                                            <textarea name="message" required id="aics_message" cols="40" rows="10" class="editbox" placeholder="Message"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="hidden" name='contact' value="Yes"/>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <div id="aiContactSafeBtns">
                                                                                <div id="aiContactSafeButtons_center" style="clear:both; display:block; text-align:center;">
                                                                                    <table style="margin-left:auto; margin-right:auto;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div id="aiContactSafeSend_loading_1">&nbsp;</div>
                                                                                                </td>
                                                                                                <td id="td_aiContactSafeSendButton">
                                                                                                    <input id="aiContactSafeSendButton" name='submit' type="submit">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    window.map = false;
                                                            
                                    
                                                            
                                    function initialize(){
                                        var myLatlng = new google.maps.LatLng(50.3915097,-4.1306689);
                                    
                                        var mapOptions = {
                                            zoom:16,
                                            center: myLatlng,
                                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                                            scrollwheel: false,

                                            streetViewControl:false,
                                            overviewMapControl:false,
                                            mapTypeControl:false    
                                            
                                        };
                                        
                                        window.map = new google.maps.Map(document.getElementById('map'), mapOptions);                                                                                                                                                                                                                                                                               
                                        
                                    }
                                
                                    google.maps.event.addDomListener(window, 'load', initialize);
                                </script>            
                            <div id="map"></div>
                                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <?php include('templates/footer.php');?>


        <?php include('templates/bottom.php');?>
    </div>

    

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/uikit.js"></script>
<script type="text/javascript" src="js/SimpleCounter.js"></script>
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


<!-- Mirrored from h-sportak.torbara.com/yellow/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:32:19 GMT -->
</html>