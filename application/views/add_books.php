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

</style>




<div class="clearfix"></div>

<div class="page_title">

    <div class="container">
        <div class="title"><h1>Add a Book</h1></div>
    </div>
</div><!-- end page title -->

<!-- Contact
======================================= -->

<div class="container">

    <div class="content_fullwidth">

        <div id="addBooks" class="">
            <form action="books/add" id="addForm" enctype="multipart/form-data" method="post">

                <fieldset>

                    <label for="title" class="blocklabel">Title</label>
                    <p class=""><input name="title" data-alert="you have to provide a title" class="req" type="text" id="title" value=""></p>

                    <label for="caption" class="blocklabel">Caption</label>
                    <p class=""><input name="caption" data-alert="enter a valid caption" class="req" type="text" id="caption" value=""></p>

                    <label for="trailer" class="blocklabel">Trailer</label>
                    <p class=""><input name="trailer" data-alert="enter a valid trailer" class="req" type="text" id="trailer" value=""></p>


                    <label for="price" class="blocklabel">price</label>
                    <p class=""><input name="price" data-alert="enter a valid price" class="req" type="text" id="email" value=""></p>

                    <label for="description" class="blocklabel">Description</label>
                    <p class=""><textarea name="description" data-alert="please enter your Description" class="req" id="description" cols="20" rows="7"></textarea></p>

                    <label for="book_one" class="blocklabel">Book One</label>
                    <p class=""><textarea name="book_one" data-alert="please enter book_one" class="req" id="book_one" cols="20" rows="7"></textarea></p>

                    <label for="email" class="blocklabel">Thumbnail</label>
                    <p class=""><input accept="image/*" type="file" name="thumbnail" id="thumbnail" ></p>

                    <label for="email" class="blocklabel">Full Cover</label>
                    <p class=""><input accept="image/*" type="file" name="full_cover" id="full_cover" ></p>

                    <br><br>

                    <div class="clearfix"></div>
                    <a href="" class="but_wifi"><i class="fa fa-plus fa-lg"></i> Add book</a>

                </fieldset>

            </form>
        </div>



    </div>

</div><!-- end content area -->


<div class="clearfix mar_top5"></div>



<script type="text/javascript">

    $(document).ready(function() {

        jQuery(".navlinks").find("#addbooks").addClass("active");

        var options = {
            beforeSubmit:  showRequest,
            success:       showResponse,
            dataType:  'json',
            type:      'post',
            clearForm: true
        };

        jQuery("#addForm a").click(function(e){
            e.preventDefault();
            //jQuery("#addForm").ajaxSubmit(options);
            $("#addForm").submit();
        });

       // $('#addForm').ajaxForm(options);
    });

    // pre-submit callback
    function showRequest(formData, jqForm, options) {
        var $this = $('#addForm') ;
        var ret = true ;

        $this.find('.req').each(function(){
            if( $.trim($(this).val().length) < 3 ){
                showAlert( $(this).attr('data-alert') );
                $(this).focus();
                ret = true ;
            }else if( $(this).attr('name') == "email" && !valid_email( $.trim( $(this).val() ) ) ){
                showAlert( $(this).attr('data-alert') );
                $(this).focus();
                ret = true ;
            }
        });
        return ret;
    }

    // post-submit callback
    function showResponse(jsonData)  {
        showAlert(jsonData.message);
    }

</script>

