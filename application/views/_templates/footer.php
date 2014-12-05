



<div class="copyright_info">

    <div class="container">

        <div class="one_half">

            <b>Site By <a href="http://www.udonline.net/">UDcreate</a> <br/> Copyright © 2014. All rights reserved.

        </div>

        <div class="one_half last">

            <ul class="footer_social_links">
                <li><a href="<?php echo FACEBOOK ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo TWITTER ?>"><i class="fa fa-twitter"></i></a></li>
            </ul>

        </div>

    </div>

</div><!-- end copyright info -->


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->




</div>
</div>



<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="<?php echo URL ?>public/js/universal/jquery.js"></script>

<!-- main menu -->
<script type="text/javascript" src="<?php echo URL ?>public/js/mainmenu/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/mainmenu/selectnav.js"></script>


<!-- scroll up -->
<script type="text/javascript">



    $(document).ready(function(){

        // local scroll
        $('.navlinks a').click(function(e){
            e.preventDefault();
            var $element = $(this).attr('href');
            var $scroll = $(this).attr("data-scroll") ;
            if( $scroll == "true" ){
                // Scroll to the element
                var int = $($element).offset().top - 80 ;
                //alert(int);
                $('html, body').animate({
                    scrollTop: int
                }, 500);
            }else{
                window.location = $element ;
            }
        });

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 500);
            return false;
        });

    });
</script>



</body>
</html>
