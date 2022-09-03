<?php include('templates/header.php');
$data = getMessages($conn);

if($data != null){
    $message = array_slice($data, 0,10);
    $count = count($data);

}
else{
    $message = '';
    $count = 0;
}
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
                                    <h1>Messages</h1>
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
                <li class="uk-active"><span>Messages</span>
                </li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main id="tm-content" class="tm-content">                       
                    <div id="comments-wrap">
                            <div id="jc">
                                <div id="comments">
                                    <h3>Messages <span><?= $count?></span>  (Showing the Latest <span>10</span>)</h3>
                                    <?php if($message) :?>
                                    <?php foreach($message as $message) :?>
                                    <div class="comments-list" id="comments-list-0">
                                        <div class="even" id="comment-item-14">
                                            <div class="rbox">
                                                <div class="comment-box avatar-indent">
                                                    <a class="comment-anchor" href="#comment-14" id="comment-14">#</a>
                                                    <span class="comment-author"><?= $message['sender'] ?? ''?> <h6> <a href="mailto:<?= $message['email'] ?? ''?>"><?= $message['email'] ?? ''?></a></h6></span>
                                                    <span class="comment-date"><?= date('F d, Y', strtotime($message['date'])) ?? ''?></span>
                                                    <div class="comment-body" id="comment-body-14"><?= $message['message'] ??''?></div>
                                                    <span class="comments-buttons">
                                                    
                                                    </span>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php endforeach?>
                                    <?php endif?>
                                </div>
                                
                                
                            </div>
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


<!-- Mirrored from h-sportak.torbara.com/yellow/gallery.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:29:13 GMT -->
</html>