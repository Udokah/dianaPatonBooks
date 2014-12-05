
<style>
    #first{
        background-image: none !important;
        background-size: cover;
        background-position: center;
        margin-top: 450px;
        background-color: #fff;
    }

    #first .container{

    }

    #first .dropcap2{
        margin-right: -14px;
        margin-top: -10px;
    }

    #first p{
        font-size: 20px;
        padding:20px ;
        text-align: center;
        font-family: 'Open Sans', sans-serif !important;
        color: #111;
        line-height: 30px;
        background: #ffffff;
    }

    #first img{
        width: 250px;
        float: left;
        padding:6px;
        margin-right: 10px;
    }

    .Slideshow{
        width:inherit;
        margin: 5px auto;
        margin-left: 30px;
        text-align: center;
    }

    .Slideshow > div{
        position:absolute;
        width:72%;
    }

    .Slideshow > div::before{
        display:block;
        content:'';
        position:absolute;
        width:100%;
        height:100%;
        -moz-box-shadow:inset 0px 5px 28px 5px #FFF;
        -webkit-box-shadow:inset 0px 5px 28px 5px #FFF;
        box-shadow:inset 0px 5px 28px 5px #FFF;
    }

    .Slideshow div img{
        width:100%;
        max-width: 550px;
        padding:5px;
        border:1px solid #ddd;
    }

</style>

<div class="clearfix"></div>

<div class="page_title">

    <div class="container">
        <div class="title"><h1>About me</h1></div>
    </div>
</div><!-- end page title -->


<!-- Contant
======================================= -->

<div class="container">

    <div class="content_fullwidth">
        <div class="Slideshow">
           <!-- <?php /*foreach($this->books as $books) { */?>
            <div style="display: block;">
                <img src="<?php /*echo URL . 'application/uploads/'.$books['full_cover'] */?>" alt="slide">
            </div>
            --><?php /*} */?>
            <div style="display: block;"> <img style="width: 400px" src="<?php echo URL . 'application/uploads/'.'book_print1.jpg'?>" alt="slide"></div>
            <div style="display: block;"> <img style="width: 400px" src="<?php echo URL . 'application/uploads/'.'book_print2.jpg'?>" alt="slide"></div>
            <div style="display: block;"> <img style="width: 400px" src="<?php echo URL . 'application/uploads/'.'book_print3.png'?>" alt="slide"></div>
        </div>

    <div class="punch_text" id="first">
        <div class="container" id="section-about">
         <!--   <p>
                 <span class="dropcap2 gray">D</span>iana Patons is
                a practicing pharmacist by profession, with great passion for writing as a hobby. I have traveled far and wide and see the world from different perspectives. I do not consider myself as a new author because I have been writing for over fifteen years. I just kept my manuscripts stuffed up in my wardrobe, until recently when my husband began encouraging me to self-publish my novels, after reading one by chance.</p>-->


            <p>
                <img src="<?php echo URL  ?>public/images/river_bg.jpg">
                As an author, I am not influenced by any author, as I do not read novels. I guess that could be one of the reasons why I never thought of publishing.“Who would read mine?” I often thought. I am trying to change that, while in the USA recently, I bought two novels that I fancied but I am yet to read them. My readers won’t be seeing my face because some of my works are quite sensitive, but I would attend to all their mails. I write with a pen name, my late mum’s maiden name, she was a Scottish-African descendant. My genre is mainly <strong>Christian romantic fiction</strong>, but I do write others that I fancy, depending on my mood and events around me and the outside world. There are always good lessons to be learnt from my novels.</p>


            <p>I do not write to please anybody, as I write from the depth of my heart on sensitive issues around me and the amazing world out there in a fictional account, based on real life events. The period I spend writing, takes me to a different setting or world, where I can visualize the characters in my novels as real and live with them. It gives me untold satisfaction, as I can voice out my thoughts from the hidden corner of the earth where I reside.<p/>
        </div>

    </div>


</div>


<!-- right sidebar starts -->
    <div class="right_sidebar">
        </div>


</div><!-- end content area -->


<div class="clearfix mar_top4"></div>

<script>
    $(document).ready(function(){
        $(".navlinks").find("#about").addClass("active");
    });

    $(document).ready(function(){
        $(".Slideshow > div:gt(0)").hide();
        setInterval(function() {
            $('.Slideshow > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('.Slideshow');
        },  5000);
    });

</script>