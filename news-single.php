<?php 
include('templates/header.php');

if($_GET['id']){
    $id = $_GET['id'];
    $news = getSingleNews($conn,$_GET['id']);
}else{
    header('Location:./404.php');
    exit();
}

$otherPosts = getAllPost($conn);
$comments = array_slice(getCommment($conn,$id), 0, 3);
$count = count(getCommment($conn,$id)) ?? 0;
// print_r($count);
// die()


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
                                    <h1>
                                        <?= $news['title'] ?? '' ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <div class="uk-container uk-container-center alt">
            <ul class="uk-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="news.php">News</a></li>
                <li class="uk-active"><span><?=$news['title'] ?? ''?></span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                    <main id="tm-content" class="tm-content">
                        <div class="contentpaneopen">
                           <article>
                                <div class="clearfix"></div>
                                <div class="article-slider">
                                    <div id="carusel-11-30" class="uk-slidenav-position" data-uk-slideshow="{ height : 510 }">
                                        <ul class="uk-slideshow">
                                            <li>
                                                <div style="background-image: url(uploads/<?= $news['picture'] ??''?>);" class="uk-cover-background uk-position-cover"></div>
                                                <img style="width: 100%; height: auto; opacity: 0;" src="uploads/<?= $news['picture'] ??''?>" alt="">
                                            </li>
                                            <li>
                                                <div style="background-image: url(images/slider/1449540000_3c66e89ed9dbc01b314eb1af9ab9e93a.jpg);" class="uk-cover-background uk-position-cover"></div>
                                                <img style="width: 100%; height: auto; opacity: 0;" src="images/slider/1449540000_3c66e89ed9dbc01b314eb1af9ab9e93a.jpg" alt="">
                                            </li>
                                        </ul>
                                        <div class="article-slider-btn">
                                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="article-param">
                                    <div class="date">
                                        <i class="uk-icon-calendar"></i>
                                        <?= date('F d, Y', strtotime($news['date'])) ?? ''?>            
                                    </div>
                                    <div class="author">
                                        <i class="uk-icon-user"></i>
                                        <a class="filter-link" data-original-title="Show only articles of <b>Guest</b>" href="#" rel="nofollow">Guest</a>            
                                    </div>
                                    <div class="categories">
                                        <i class="uk-icon-list-ul"></i>
                                        <a href="#">Life</a>            
                                    </div>
                                </div>
                                <div class="article-single-text">
                                    <p><?= $news['description'] ?? ''?></p>
                                    <!-- <blockquote><span>Ut scelerisque odio et cursus hendrerit. Nullam volutpat ligula elit, sit amet viverra est consequat non. Suspendisse nisl magna, suscipit sed volutpat nec, commodo nec nunc. Nunc posuere commodo ipsum, sit amet pretium felis eleifend vitae. Cras eget aliquam augue.</span></blockquote> -->
                                    <p>
                                    <?= $news['description2'] ?? ''?>
                                    </p>
                                    
                                    <p>
                                    <?= $news['description3'] ?? ''?>
                                    </p>
                                </div>
                                
                            </article>
                            <!-- <div class="news-nav-wrap">
                                <div class="uk-grid" data-uk-grid-match="">
                                    <div class="uk-width-1-2 uk-panel list-article news-nav">
                                        <div class="name">
                                            <h4>
                                                <a href="news-single.php">
                                                Vestibulum ante ipsum primis in            </a>     
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2 uk-panel list-article news-nav">
                                        <div class="name">
                                            <h4>
                                                <a href="news-single.php">
                                                Suspendisse purus enim, dictum sed lorem ac, sodales maximus est            </a>        
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <h3 class="other-post-title">Other <span>Posts</span></h3>
                            <div class="uk-grid" data-uk-grid-match="">
                                <?php if($otherPosts) :?>
                                <?php foreach($otherPosts as $post) :?>
                                <div class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article other uk-flex uk-flex-column">
                                    <div class="wrapper">
                                        <div class="img-wrap">
                                            <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                        <img src="uploads/<?=$post['picture'] ?? ''?>" class="img-polaroid" alt="">
                                    </a>        </div>
                                        <div class="info">
                                            <div class="date">
                                            <?= date('F d, Y', strtotime($post['date'])) ?? ''?>           
                                            </div>
                                            <div class="name">
                                                <h4>
                                                    <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                                       <?=$post['title'] ?? ''?>     
                                                    </a>     
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach?>
                                <?php endif?>
                                
                            </div>
                            <div id="comments-wrap">
                                <div id="jc">
                                    <div id="comments">
                                        <h3>Comments <span><?= $count?></span></h3>
                                        <?php if($comments) :?>
                                        <?php foreach($comments as $comment) :?>
                                        <div class="comments-list" id="comments-list-0">
                                            <div class="even" id="comment-item-14">
                                                <div class="rbox">
                                                    <!-- <div class="comment-avatar"><img src="../../www.gravatar.com/avatar/d18ba4a7237afbb7b1fb23fc70c2081bf4db.jpeg?d=http%3A%2F%2Fsport.statiolh.bget.ru%2Fcomponents%2Fcom_jcomments%2Fimages%2Fno_avatar.png" alt="Jesica"></div> -->
                                                    <div class="comment-box avatar-indent">
                                                        <a class="comment-anchor" href="#comment-14" id="comment-14">#</a>
                                                        <span class="comment-author"><?= $comment['name'] ?? ''?></span>
                                                        <span class="comment-date"><?=$comment['time'] ??''?>, <?= date('F d, Y', strtotime($comment['date'])) ?? ''?></span>
                                                        <div class="comment-body" id="comment-body-14"><?= $comment['message'] ??''?></div>
                                                        <span class="comments-buttons">
                                                        <!-- <a href="#" onclick="jcomments.showReply(14); return false;">Reply</a>
                                                        <a href="#" onclick="jcomments.showReply(14,1); return false;">Reply with quote</a> 
                                                        <a href="#" onclick="jcomments.quoteComment(14); return false;">Quote</a> -->
                                                        </span>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div id="comments-list-footer"><a class="refresh" href="#"  >Refresh comments list</a></div>
                                        <?php endforeach?>
                                        <?php endif?>
                                    </div>
                                    <h3 class="title-bottom">Leave a <span>Reply</span></h3>
                                    <a id="addcomments" href="#addcomments"></a>
                                    <form method="POST" id="comments-form" name="comments-form" action="functions/comment.php">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2 uk-panel">
                                                <p>
                                                    <span>
                                                    <input id="comments-form-name" placeholder="Name" name="name" value="" maxlength="20" size="22" tabindex="1" type="text">
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>
                                                    <input id="comments-form-email" placeholder="Email" name="email" value="" size="22" tabindex="2" type="text">
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>
                                                    <input id="comments-form-homepage" disabled placeholder="Date" name="date" value="Date: <?=date('d/m/y') ?>" size="22" tabindex="3" type="text">
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>
                                                    <input type="hidden" placeholder="id" name="id" value="<?=$news['id'] ?? ''?>">
                                                    </span>
                                                </p>

                                            </div>
                                            <div class="uk-width-1-2 uk-panel uk-flex uk-flex-column">
                                                <div class="textarea-wrap">
                                                    <textarea id="comments-form-comment" placeholder="Message" name="message" tabindex="5"></textarea>
                                                    <div class="grippie"></div>
                                                    <div id="comments-form-buttons">
                                                        <div class="btn" id="comments-form-send">
                                                            <span class="btn"></span>
                                                        </div>
                                                        
                                                        <div style="clear:both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <input style="background-color: burlywood;padding: 5px 70px;" type="submit" name='submit'/>
                                        
                                    </form>
                                    <script type="text/javascript">
                                            function JCommentsInitializeForm()
                                            {
                                                var jcEditor = new JCommentsEditor('comments-form-comment', true);
                                                jcomments.setForm(new JCommentsForm('comments-form', jcEditor));
                                            }
                                            
                                            if (window.addEventListener) {window.addEventListener('load',JCommentsInitializeForm,false);}
                                            else if (document.addEventListener){document.addEventListener('load',JCommentsInitializeForm,false);}
                                            else if (window.attachEvent){window.attachEvent('onload',JCommentsInitializeForm);}
                                            else {if (typeof window.onload=='function'){var oldload=window.onload;window.onload=function(){oldload();JCommentsInitializeForm();}} else window.onload=JCommentsInitializeForm;} 
                                            //-->
                                    </script>
                                    <script type="text/javascript">
                                            jcomments.setAntiCache(1,0,0);
                                            //-->
                                    </script> 
                                </div>
                            </div>

            
                        </div>
   
                    </main>
                </div>
                <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first">
                    
                    <div class="uk-panel news-sidebar">
                        <h3 class="uk-panel-title">Latest News</h3>
                        <?php if($otherPosts) :?>
                        <?php foreach($otherPosts as $post) :?>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                    <img src="uploads/<?=$post['picture'] ??''?>" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                    <?= date('F d, Y', strtotime($post['date'])) ?? ''?>            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="news-single.php?id=<?=$post['id'] ?? ''?>">
                                            <?=$post['title'] ??''?>                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach?>
                        <?php endif?>
                        
                    </div>
                    
                </aside>
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


</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/news-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:33:17 GMT -->
</html>