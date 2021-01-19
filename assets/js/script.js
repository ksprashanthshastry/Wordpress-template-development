jQuery(document).ready(function() {
    jQuery('#book-list').DataTable();
    
    jQuery("#btn-upload").on("click", function(){
        var image = wp.media({
        title:"Upload image for the book", multiple:false
      }).open().on("select", function(){
          var uploaded_image = image.state().get("selection").first();
          var get_uploaded_image = uploaded_image.toJSON().url;
          jQuery("#show-image").html("<img class='image' src='"+get_uploaded_image+"' style='height:75px;width:75px'/>");
          jQuery("#image_name").val(get_uploaded_image);
      });
    }  );
    
    
    jQuery("#frmAddBook").validate({
    submitHandler:function(){
        var postData = "action=bookkeeperlibrary&param=save_book&" + jQuery("#frmAddBook").serialize();
        jQuery.post(bookkeeperajaxurl, postData, function(response){
          var data = jQuery.parseJSON(response);
          if(data.status==1){
            jQuery.notifyBar({
            cssClass:"success",
            html:data.message
            });
          }
        } );
    }
    });
    
    jQuery("#frmEditBook").validate({
      submitHandler:function(){
        console.log(jQuery("#frmEditBook").serialize());      }
    });
} );