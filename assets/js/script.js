jQuery(document).ready(function() {

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

    jQuery('#book-list').DataTable();

    jQuery(document).on("click", ".btnbookdelete",function(){
      var conf = confirm("Are you sure you want to delete the book?");
      if(conf){
        var book_id = jQuery(this).attr("data-id");
        var postData = "action=bookkeeperlibrary&param=delete_book&id="+book_id;
        jQuery.post(bookkeeperajaxurl, postData, function(response){
          var data = jQuery.parseJSON(response);
          if(data.status==1){
            jQuery.notifyBar({
            cssClass:"success",
            html:data.message
            });
            setTimeout(function(){
              location.reload();
            },1300)
          }else{
          }
        });
      }
    });

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
          }else{
          }
        });
      }
    });

    jQuery("#frmEditBook").validate({
    submitHandler:function(){
        var postData = "action=bookkeeperlibrary&param=edit_book&" + jQuery("#frmEditBook").serialize();
        jQuery.post(bookkeeperajaxurl, postData, function(response){
          var data = jQuery.parseJSON(response);
          if(data.status==1){
            jQuery.notifyBar({
            cssClass:"success",
            html:data.message
            });
            setTimeout(function(){
              window.location.reload();
            },1300)
          }else{

          }

        });
    }
    });

    jQuery("#frmAddAuthor").validate({
      submitHandler:function(){
          var postData = "action=bookkeeperlibrary&param=save_author&" + jQuery("#frmAddAuthor").serialize();
          jQuery.post(bookkeeperajaxurl, postData, function(response){
            var data = jQuery.parseJSON(response);
            if(data.status==1){
              jQuery.notifyBar({
              cssClass:"success",
              html:data.message
              });
              setTimeout(function(){
                window.location.reload();
              },1300)
            }else{
            }
          });
        }
    });
});
