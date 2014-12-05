<?php
$book = new ArrToObj($this->book);
?>
<div class="clearfix"></div>

<div class="page_title">

    <div class="container">
        <div class="title"><h1><?php echo $book->title ?></h1></div>
        <div class="pagenation"><?php echo $book->caption ?></div>
    </div>
</div><!-- end page title -->


<!-- Contant
======================================= -->

<div class="container">

<div class="content_left">

    <div class="blog_post">
        <div class="blog_postcontent">
            <div class="image_frame">
                    <img src="<?php echo URL . 'application/uploads/'.$book->full_cover ?>" alt="" />
                </div>
            <a href="#" style="visibility: hidden" class="date"><strong>18</strong><i>October</i></a>
            <h3><a href="blog-post.html">Books</a></h3>

          <!-- Book chapters -->
            <ul class="lirt_section">
                <li class="left">1</li>
                <li><strong>Title of book one</strong>
                    <i>caption of book one</i>
                    <a href="#" class="but_book"><i class="fa fa-book fa-lg"></i> Read</a>
                </li>
            </ul>


        </div>
    </div><!-- /# end post -->




    <div class="clearfix divider_line"></div>

</div><!-- end content left side area -->


<!-- right sidebar starts -->
<div class="right_sidebar">

    <div class="one_half" style="width: 100%">
        <div class="portfolio_image">
            <a class="fancybox-media" href="<?php echo $book->trailer ?>" title="Majority have suffered alteration">
                <div class="hover_effct"></div><img src="<?php echo URL ?>images/blog/youtube-logo.png" alt="Trailer"></a>
            <div class="title">Book Trailer</div>
        </div>
    </div>

    <div class="clearfix mar_top5"></div>


    <div class="sidebar_widget">

        <div class="sidebar_title"><h3>About <?php echo $book->title ?></i></h3></div>
        <p><?php echo $book->description ?></p>

    </div>
    <div class="clearfix mar_top4"></div>
    <div class="sidebar_widget">

        <div class="sidebar_title"><h3>Current books on sale</h3></div>

        <?php
        // remove current book from array
        $allbooksArray = $this->allbooks ;
        unset($allbooksArray[$book->bid])
        ?>

        <?php $i=1 ;  foreach ($allbooksArray as $bk ) { ?>

        <?php $url = URL . 'books/shelf/' . $this->generateUrl($bk['title']) ?>

        <?php if ($i == 1) { ?>

        <ul class="adsbanner-list">
            <li><a href="<?php echo $url ?>">
                    <img src="<?php echo URL . 'application/uploads/'.$bk['thumbnail'] ?>" alt="">
                </a></li>

                <?php  }else{ ?>
                    <li class="last" ><a href="<?php echo $url ?>"><img src="<?php echo URL . 'application/uploads/'.$bk['thumbnail'] ?>" alt=""></a></li>

                    </ul>

        <?php $i=1; }  ?>

        <?php $i++; } ?>

    </div>

    <div class="clearfix mar_top5"></div>



</div>


</div><!-- end content area -->

<div class="clearfix mar_top4"></div>



<!-- fancyBox -->
<!--<script type="text/javascript" src="../../public/js/portfolio/lib/jquery-1.9.0.min.js"></script>-->
<script type="text/javascript" src="../../public/js/portfolio/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../../public/js/portfolio/source/helpers/jquery.fancybox-media.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /* Simple image gallery. Uses default settings */
        $('.fancybox').fancybox();

        /* media effects*/
            $('.fancybox-media').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                helpers : {
                    media : {}
                }
            });

    });
</script>



