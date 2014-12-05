<style>
    .signupform{
        display: inline-block;
        float: right;
    }

    #writeup{
        display: inline-block;
        float: left;
    }

    .signupform{
        margin-top: 15px;
    }

    .signupform input[type=text]{
        padding:10px;
        font-size: 17px;
        font-weight: bold;
        border-radius: 0px;
        margin-bottom: 3px !important;
    }

    .signupform a{
        float: none;
        border: none !important;
    }

    .one_third{
        background-color: #ffffff;
        padding-left: 0px;
    }

    .one_third a{
        background-color: transparent !important;
        color: #93d6c5 !important;
        font-weight: bold !important;
        font-size: 20px !important;
        text-align: center !important;
        margin-left: 0 !important;
        padding: 0 0 0 0 !important;
        display: block !important;
        margin-top: 4px;
    }

    .one_third span{
        font-style: italic;
        color: #994c19;
        display: block;
        margin-bottom: 5px;
    }

    .one_third img{
        display: inline;
        float: left;
        width: 100px;
        margin-left: 3px;
    }

    .one_third p{
        display: inline-block;
        width: 56%;
        height: 250px;
        overflow: hidden;
        border: 0px solid #ff0000;
        text-align: left !important;
        font-size: 14px;
    }

    .one_third p:after{
        content: " ...";
    }

    .layout1_fusection1 h1{
        color: #ffffff !important;
    }

    .layout1_fusection1 h1 i{
        color: #ffffff !important;
    }

    #first{
        background-image: none !important;
        background: #E4F9EC !important;
    }

    #first p{
        font-size: 18px;
        padding:20px 0 20px 0 ;
        text-align: center;
        font-family: 'Open Sans', sans-serif !important;
        font-size: 17px;
        color: #1c1f21;
    }



</style>


<!-- Welcome note -->
<div class="layout1_fusection2">
    <div class="container" id="section-home" >

        <div id="welcomeNote">
        <h1>Hi, I am <strong>Diana Patons</strong>
            <br>
            <i>
                a practicing pharmacist by profession, with great passion for writing as a hobby.
                I have traveled far and wide and see the world from different perspectives.
                I do not consider myself as a new author because I have been writing for over fifteen years.
                I just kept my manuscripts stuffed up in my wardrobe, until recently when my husband began
                encouraging me to self-publish my novels, after reading one by chance.
            </i>
        </h1>
        </div>

        <div class="clearfix mar_top3"></div>

    </div>
</div>



<div class="layout1_fusection1">
    <div class="container" id="section-books">

        <h1> current books on <strong> sale</strong>
            <br />
            <i>All my novels, contains great story lines with lots of captivating sequence of events.</i>
        </h1>

        <?php $i=1 ;  foreach ($this->books as $book ) { ?>
        <div class="one_third <?php if($i==3) echo 'last' ?>">
            <?php $url = URL . 'books/shelf/' . $this->generateUrl($book['title']) ?>
            <a href="<?php echo $url ?>"><?php echo $book['title'] ?></a>
            <span><?php echo $book['caption'] ?></span>
            <img src="<?php echo URL . 'application/uploads/'.$book['thumbnail'] ?>" alt=""  />
            <p><?php echo $book['description'] ?></p>
            <div class="clearfix mar_top2"></div>
        </div>

        <?php $i++; } ?>

<!--        <div class="one_third">
            <a href="booklist.html">Beyond Faith</a>
            <span>Where tragedy confronts faith</span>
            <img src="public/img/faith.png" alt="" />
            <p>Cyril Smith grew up in a remote village in Africa.  From a young age, he stood out both for his looks and his academic endeavors.  As a teenager, he began to have a secret dream of finding his way to the Western world and marrying a white woman at all costs</p>
            <div class="clearfix mar_top2"></div>
        </div>
        <div class="one_third last">
            <a href="booklist.html">Shattered Dreams</a>
            <span>The dream of every minister of God</span>
            <img src="public/img/dream.png" alt="" />
            <p>Elderly Pastor Rufus left the apostolic faith to set up a Pentecostal outfit, with similar doctrine to the Apostolic faith. He dreamt of making it the biggest around in his country. He soon realized the limiting factor to his dream was the lack of formal education</p>
            <div class="clearfix mar_top2"></div>
        </div>-->

    </div>
</div><!-- end features section 1 -->

<div class="container">

    <div class="content_fullwidth">

        <style>
            .portfolio_image{
                height: 200px;
                margin-bottom: 10px;
                text-align: center;
            }
        </style>

        <div class="one_third">
            <div class="portfolio_image">
                <i class="icon-search icon-4x"></i>

                <div class="title">Trailer</div>
            </div>
        </div><!-- end section -->

        <div class="one_third">
            <div class="portfolio_image">
                <i class="icon-search icon-4x"></i>

                <div class="title">Trailer</div>
            </div>
        </div><!-- end section -->

        <div class="one_third last">
            <div class="portfolio_image">
                <i class="icon-search icon-4x"></i>

                <div class="title">Trailer</div>
            </div>
        </div><!-- end section -->

    </div>

</div><!-- end content area -->

<div class="clearfix"></div>

<div class="punch_text">
    <div class="container">
        <div id="writeup">
            <b>
                Signup for access to free read <br>
                <em>This gives you access to read <strong>part one</strong> of each novel for free ! <br>
                    free read for any novel is for three weeks only.</em>
            </b>
        </div>
        <div class="signupform">
            <input type="text" class="" id="freeReadsignup" placeholder="enter your email address">
            <a href="" id="freeReadBtn" class="but_ok_2"><i class="fa fa-check fa-lg"></i> Sign up for free read</a>
        </div>
    </div>

</div><!-- end punch text -->

<!-- Footer
======================================= -->

<script>
    $(document).ready(function(){

        $(".navlinks").find("#home").addClass("active");

        /* Free read subscription */
        $(".signupform a").click(function(e){
            e.preventDefault();
            var email = $.trim($("#freeReadsignup").val());
            if( email.length < 6 || !valid_email(email) ){
                showAlert("Please enter a valid email address");
            }else{
                var postData = { email : email } ;
                $.ajax({
                    url: "action/subscribe",
                    data: postData ,
                    success: function(returnedData){
                        //var json = $.parseJSON(data);
                        if(returnedData.status == true){
                            $("#freeReadsignup").val("") ;
                        }
                        showAlert(returnedData.message);
                    },
                    error: function (jqXHR, exception) {
                        showAlert( Ajax_Error(jqXHR) ) ;
                    }
                });
            }
        });

    });
</script>
