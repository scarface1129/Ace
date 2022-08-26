<?php 
include('templates/header.php');
$news = getNews($conn);


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
                                        News
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
                <li class="uk-active"><span>News</span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                   
                    <div class="contentpaneopen">
                       <main id="tm-content" class="tm-content">
                            <div class="uk-grid" data-uk-grid-match="">
                                <?php if($news) :?>
                                <?php foreach($news as $news) :?>
                                <div class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article uk-flex uk-flex-column">
                                    <div class="wrapper">
                                        <div class="img-wrap uk-flex-wrap-top">
                                            <a href="news-single.php?id=<?= $news['id'] ?? ''?>">
                                            <img src="uploads/<?= $news['picture'] ?? ''?>" class="img-polaroid" alt="">
                                            </a>        
                                        </div>
                                        <div class="info uk-flex-wrap-middle">
                                            <div class="date">
                                            <?= date('F d, Y', strtotime($news['date'])) ?? ''?>            
                                            </div>
                                            <div class="name">
                                                <h4>
                                                    <a href="news-single.php?id=<?= $news['id'] ?? ''?>">
                                                    <?= $news['title'] ?? ''?>                    </a>        
                                                </h4>
                                            </div>
                                            <div class="text">
                                                <p><?= substr($news['description'],0,100) ??''?>...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-actions uk-flex-wrap-bottom">
                                        <div class="count"><i class="uk-icon-comments"></i><span>3</span></div>
                                        <div class="read-more"><a href="news-single.php?id=<?= $news['id'] ?? ''?>">Read More</a></div>
                                    </div>
                                </div>
                                <?php endforeach?>
                                <?php endif?>
                            </div>
                            <form method="post">
                                <div class="pagination">
                                    <ul class="pagination-list">
                                        <li class="pagination-start"><span class="pagenav">Start</span></li>
                                        <li class="pagination-prev"><span class="pagenav">Prev</span></li>
                                        <li><span class="pagenav">1</span></li>
                                        <li><a href="#" class="pagenav">2</a></li>
                                        <li class="pagination-next"><a data-original-title="Next" title="" href="#" class="hasTooltip pagenav">Next</a></li>
                                        <li class="pagination-end"><a data-original-title="End" title="" href="#" class="hasTooltip pagenav">End</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </main>
                    </div>
   

                </div>
                <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first">
                    
                    <div class="uk-panel tags-sidebar">
                        <h3 class="uk-panel-title">Tags</h3>
                        <div class="contentpaneopen">
                            <ul id="tag-list-mod-tagcloud" class="tag_list">
                                <li class="tag_element" id="tag-0"><a href="#" rel="nofollow"><span class="tag">Soccer</span></a></li>
                                <li class="tag_element" id="tag-1"><a href="#" rel="nofollow"><span class="tag">Kick</span></a></li>
                                <li class="tag_element" id="tag-2"><a href="#" rel="nofollow"><span class="tag">Player</span></a></li>
                                <li class="tag_element" id="tag-3"><a href="#" rel="nofollow"><span class="tag">Action</span></a></li>
                                <li class="tag_element" id="tag-4"><a href="#" rel="nofollow"><span class="tag">Stadium</span></a></li>
                                <li class="tag_element" id="tag-5"><a href="#" rel="nofollow"><span class="tag">Ball</span></a></li>
                                <li class="tag_element" id="tag-6"><a href="#" rel="nofollow"><span class="tag">Goal</span></a></li>
                                <li class="tag_element" id="tag-7"><a href="#" rel="nofollow"><span class="tag">Boots</span></a></li>
                                <li class="tag_element" id="tag-8"><a href="#" rel="nofollow"><span class="tag">Kids</span></a></li>
                                <li class="tag_element" id="tag-9"><a href="#" rel="nofollow"><span class="tag">Life</span></a></li>
                            </ul>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </aside>
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
<script type="text/javascript">
    new SimpleCounter("countdown4", 1447448400, {
      'continue': 0,
      format: '{D} {H} {M} {S}',
      lang: {
          d: {
              single: 'day',
              plural: 'days'
          }, //days
          h: {
              single: 'hr',
              plural: 'hrs'
          }, //hours
          m: {
              single: 'min',
              plural: 'min'
          }, //minutes
          s: {
              single: 'sec',
              plural: 'sec'
          } //seconds
      },
      formats: {
          full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
          shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
      }
  });
</script>

</body>


<!-- Mirrored from h-sportak.torbara.com/yellow/news.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2022 23:31:43 GMT -->
</html>