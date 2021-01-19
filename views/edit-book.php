<?php wp_enqueue_media(); ?>
<?php 
$book_id = isset($_GET['edit'])?intval($_GET['edit']):0;
global $wpdb;
$book_detail = $wpdb->get_row(
    $wpdb->prepare(
      "SELECT * from".book_keeper_table()." WHERE id = %d", $book_id
    ),ARRAY_A
  );
 ?>


<div class="container">
  <div class="row">
    <div class="card">
      <div class="alert alert-info">
        <h5>Update Book Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Edit Book Information</div>
      <div class="card-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmEditBook">
          <input type="hidden" name="book_id" value="<?php echo isset($_GET['edit'])?intval($_GET['edit']):0; ?>" />

          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="mb-3">
              <input type="text" value="<?php echo $book_detail['name']?>" class="form-control" id="name" name="name" required placeholder="Enter the name of the Book">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="mb-3">
              <input type="text" value="<?php echo $book_detail['author']?>" class="form-control" id="author" name="author" required placeholder="Enter the name of the Author">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="mb-3">
              <textarea name="about" class="form-control" id="about" rows="8" cols="80" placeholder="Enter the About"><?php echo $book_detail['about']?></textarea>
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="uploadBookImage">Upload Book Image:</label>
            <input type="button" class="btn btn-primary" id="btn-upload" value="upload image" >
            <span id="show-image"></span>
            <input type="hidden" id="image_name" value="<?php echo $book_detail['book_image']?>" name="image_name">
          </div>


          <div class="form-group">
            <div class="col-sm-offset-2 mb-3">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>


    </div>

  </div>

</div>
