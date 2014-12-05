
<style>
   /* .blog_post img{
        width: 100px !important;
    }*/

    .blog_postcontent .image_frame.small{
        width:20% ;
    }
</style>

<div class="clearfix"></div>

<div class="page_title">

    <div class="container">
        <div class="title"><h2>All Books</h2></div>
    </div>
</div><!-- end page title -->


<!-- Content
======================================= -->

<div class="container">
<div class="content_fullwidth">
    <div class="our_team_box_big">
        <h2>currently on <strong>free read</strong> and <strong>sale</strong></h2>

        <?php foreach ($this->books as $book ) { ?>
        <?php $url = URL . 'books/shelf/' . $this->generateUrl($book['title']) ?>
        <div class="one_fourth">
            <div class="cont-area">
                <a href="<?php echo $url ?>">
                <img width="150px" src="<?php echo URL . 'application/uploads/'.$book['thumbnail'] ?>" alt="" class="">
                </a>
                <ul>
                    <li><strong><?php echo $book['title'] ?><i> <br>
                                <?php echo $book['caption'] ?></i></strong></li>
                </ul>\
            </div>
        </div>

            <?php } ?>

    </div>
</div>

</div>




<script>
    $(document).ready(function(){
        $(".navlinks").find("#books").addClass("active");
    });
</script>