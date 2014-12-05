<style>
    #addBooks {
        margin-top: -25px;
    }

    #addBooks h1{
    }

    #addBooks input[type=text],
    #addBooks input[type=email],
    #addBooks textarea{
        padding:10px;
        font-size: 17px;
        font-weight: normal;
        border-radius: 0px;
        width: 99%;
        background-color: #f9f9f9;
        border: 1px solid #e1e1e1;
    }

    #addBooks input[type=text]:focus,
    #addBooks input[type=email]:focus,
    #addBooks textarea:focus{
        border-color: #994c19;
    }

    #addBooks form{
        margin:5px auto;
        width:90%;
        border: 0px solid #ffffff;
        min-width: 200px;
        max-width: 702px !important;
    }

    #addBooks form a{
        float: none;
        display: inline-block;
        width: 95% !important;
        text-align: center !important;
        border:none !important;

    }

    .onSale li{
        display: inline;
    }

    .onSale li a{
        display: inline-block;
        padding: 5px;
        border: 1px solid #ddd;
        margin-right: 5px;
    }


</style>


<div class="clearfix"></div>

<div class="page_title">

    <div class="container">
        <div class="title"><h1>Contact Me</h1></div>
    </div>
</div><!-- end page title -->

<!-- Contact
======================================= -->

<div class="container">

    <div class="content_fullwidth">

        <div id="addBooks" class="one_half">
            <form action="action/contact" id="contactform" method="post">

                <fieldset>

                    <label for="name" class="blocklabel">Your Name</label>
                    <p class=""><input name="name" data-alert="you have to provide a name" class="req" type="text" id="name" value=""></p>

                    <label for="email" class="blocklabel">E-Mail</label>
                    <p class=""><input name="email" data-alert="enter a valid email" class="req" type="text" id="email" value=""></p>

                    <label for="message" class="blocklabel">Your Message</label>
                    <p class=""><textarea name="message" data-alert="please enter your message" class="req" id="message" cols="20" rows="7"></textarea></p>

                    <div class="clearfix"></div>
                    <a href="#" class="but_wifi"><i class="fa fa-envelope fa-lg"></i> Send Message</a>

                </fieldset>

            </form>
        </div>

        <div class="one_half last">

            <div class="address-info">
                <h3><i>Address Info</i></h3>
                <ul>
                    <li>
                        <strong><?php echo SITENAME ?></strong><br />
                        Telephone: +234 080 7499 5935<br />
                        E-mail: <a href="mailto:<?php echo ADMIN_EMAIL ?>"><?php echo ADMIN_EMAIL ?></a><br />
                        Website: <a href="<?php echo URL ?>"><?php echo URL ?></a>
                    </li>
                </ul>
            </div>

            <div class="clearfix mar_top4"></div>
            <div class="sidebar_widget">

                <div class="sidebar_title"><h3>Currently on sale</h3></div>

                <ul class="onSale">

                <?php foreach ($this->books as $bk ) { ?>

                    <?php $url = URL . 'books/shelf/' . $this->generateUrl($bk['title']) ?>

                        <li><a href="<?php echo $url ?>">
                                <img src="<?php echo URL . 'application/uploads/'.$bk['thumbnail'] ?>" alt="">
                            </a></li>

                    <?php } ?>

                </ul>


            </div>

        </div>

    </div>

</div><!-- end content area -->


<div class="clearfix mar_top5"></div>

<script>
    $(document).ready(function(){

        $(".navlinks").find("#contact").addClass("active");

        $("#contactform a").click(function(e){
            e.preventDefault();
            $("#contactform").submit();
        });

        /* Contact Form */
        $("#contactform").on('submit', function(e){
            e.preventDefault();
            var $this = $(this) ;

            $this.find('.req').each(function(){
                if( $.trim($(this).val().length) < 3 ){
                    showAlert( $(this).attr('data-alert') );
                    $(this).focus();
                    exit();
                }else if( $(this).attr('name') == "email" && !valid_email( $.trim( $(this).val() ) ) ){
                    showAlert( $(this).attr('data-alert') );
                    $(this).focus();
                    exit();
                }
            });

            /* Post to server */
            $.ajax({
                url: $this.attr('action') ,
                data: $this.serialize() ,
                success: function(returnedData){
                    //var json = $.parseJSON(data);
                    if(returnedData.status == true){
                        $this.find('.req').val("");
                        showAlert("Your message has been sent");
                    }else{
                        showAlert("sorry, your message was not sent");
                    }
                },
                error: function (jqXHR, exception) {
                    showAlert( Ajax_Error(jqXHR) ) ;
                }
            });

        });

    });
</script>
