<?php 
include('templates/header.php');
$teams= getAllTeam($conn);
$CoachID = '';




// print_r($teams);
// die();
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
                                        Teams
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
                <li class="uk-active"><span>Teams</span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                
                <div class="tm-main uk-width-medium-4-4 uk-push-0-4">
                    <div class="contentpaneopen">
                       <main id="tm-content" class="tm-content">
                            <div class="uk-grid" data-uk-grid-match="">
                            <?php if($teams) :?>
                            <?php foreach($teams as $team) :?>
                                <div class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article uk-flex uk-flex-column">
                                    <div class="wrapper">
                                        <div class="img-wrap uk-flex-wrap-top">
                                            <a href="team.php?id=<?= $team['id']?>">
                                            <img src="uploads/<?= $team['logo'] ?? ''?>" class="img-polaroid" alt="">
                                            </a>        
                                        </div>
                                        <div class="info uk-flex-wrap-middle">
                                            <div class="date">
                                                number of players: <?= $team['numberOfPlayers'] ?? ''?>,
                                                 (seeking players: 
                                                 <?php if($team['seekingPlayers'] == 1) :?>
                                                    <?= 'Yes'?>
                                                <?php else:?>
                                                    <?= 'No'?>
                                                <?php endif?>
                                                 )            
                                            </div>
                                            <div class="name">
                                                <h2>
                                                    <a href="team.php?id=<?= $team['id']?>">
                                                    <?=$team['name'] ?? ''?>                   </a>        
                                                </>
                                            </div>
                                            <div class="text">
                                                <h5>Email : <a href=""><?=$team['email'] ?? ''?></a></h5>
                                                <h5>FaceBook Page : <a href=""><?=$team['facebookLink'] ?? ''?></a></h5>
                                                <h5>Instagram handle : <a href=""><?=$team['instagramHandle'] ?? ''?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-actions uk-flex-wrap-bottom">
                                        <div class="count"><i class="uk-icon-phone"></i><span><?=$team['phoneNumber'] ?? ''?></span></div>
                                        <div class="read-more"><a href="team.php?id=<?= $team['id']?>">More Information</a></div>
                                    </div>
                                </div>
                                <?php endforeach?>
                            <?php else :?>
                                <h2>No Teams To Display!!!</h2>
                            <?php endif ?>
                            </div>
                            <!-- <form method="post">
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
                            </form> -->
                        </main>
                    </div>
   

                </div>
                
                <!-- <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first">
                    <div class="uk-panel categories-sidebar">
                        <h3 class="uk-panel-title">Categories</h3>
                        <div>
                            <ul class="nav menu">
                                <li class="item-3">             
                                    <a href="#">
                                    Overall <span class="label">(3)</span>
                                    </a>            
                                </li>
                                <li class="item-4">             
                                    <a href="#">
                                    Players <span class="label">(2)</span>
                                    </a>            
                                </li>
                                <li class="item-2">             
                                    <a href="#">
                                    Life <span class="label">(4)</span>
                                    </a>            
                                </li>
                                <li class="item-5 parent">
                                    <a href="#">
                                    Entertainment <span class="label">(1)</span>
                                    </a>            
                                    <ul class="">
                                        <li class="item-7">
                                            <a href="#">
                                            Art Style <span class="label">(3)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="item-6">             
                                    <a href="#">
                                    Uncategorized <span class="label">(3)</span>
                                    </a>            
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="uk-panel newsletter-sidebar">
                        <h3 class="uk-panel-title">Newsletter</h3>
                        <div class="acymailing_modulenewsletter-sidebar" id="acymailing_module_formAcymailing40192">
                            <div class="acymailing_fulldiv" id="acymailing_fulldiv_formAcymailing40192">
                                <form id="formAcymailing40192" onsubmit="return submitacymailingform('optin','formAcymailing40192')" method="post" name="formAcymailing40192">
                                    <div class="acymailing_module_form">
                                        <div class="mail-title">Newsletters</div>
                                        <div class="acymailing_introtext">Donec at ex aliquet, porttitor lacus eget</div>
                                        <div class="clear"></div>
                                        <div class="space"></div>
                                        <table class="acymailing_form">
                                            <tbody>
                                                <tr>
                                                    <td class="acyfield_email acy_requiredField">
                                                        <span class="mail-wrap">
                                                        <input id="user_email_formAcymailing40192" onfocus="if(this.value == 'Email') this.value = '';" onblur="if(this.value=='') this.value='Email';" class="inputbox" name="user[email]" style="width:80%" value="Email" title="Email" type="text">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="acysubbuttons">
                                                        <span class="submit-wrap">
                                                        <span class="submit-wrapper">
                                                        <input class="button subbutton btn btn-primary" value=" " name="Submit" onclick="try{ return submitacymailingform('optin','formAcymailing40192'); }catch(err){alert('The form could not be submitted '+err);return false;}" type="submit">
                                                        </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="uk-panel news-sidebar">
                        <h3 class="uk-panel-title">Latest News</h3>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="#">
                                    <img src="images/35b8bf93115eb2b8da9f8b4f41fdb0fd.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 25, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="#">
                                            Suspendisse purus enim, dictum sed lorem ac, sodales maximus est                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="#">
                                    <img src="images/4e9ed1f24d1f63b923e67456774158a3.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 20, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="#">
                                            Suspendisse purus enim, dictum sed lorem ac, sodales maximus est                    </a>        
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="has-context ">
                            <div class="latest-news-wrap">
                                <div class="img-wrap">
                                    <a href="#">
                                    <img src="images/19896c58825d0206bd858f7e50bf51b2.jpg" class="img-polaroid" alt="">
                                    </a>        
                                </div>
                                <div class="info">
                                    <div class="date">
                                        November 20, 2015            
                                    </div>
                                    <div class="name">
                                        <h4>
                                            <a href="#">
                                            Cum sociis natoque penatibus et magnis dis parturient                    </a>       
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
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
                </aside> -->
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