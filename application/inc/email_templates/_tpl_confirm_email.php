
					Your subscription was successful !<br>
					In order to access the free-read section,<br>
                    where you can read
                    Book One of each novel
                    you have to confirm your email. <br>

                    <?php
                    $link = URL . 'action/confirm/'.CODE. '/' .EMAIL ;
                    ?>
<a href="<?php echo $link ?>" style="display:inline-block; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px; margin:20px 0; padding:5px 20px; text-decoration:none; background-color:#3B5998; color:#fff; font-weight:bold;">
	click here to confirm your email
 </a>
				<br>

                    or copy and past the link in your browser <br>
                    <a href="<?php echo $link ?>"><?php echo $link ?></a>
                    <br><br>
