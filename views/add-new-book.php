<?php wp_enqueue_media(); ?>



<div class="container">
  <div class="row">
    <div class="card">
      <div class="alert alert-info">
        <h5>Add Book Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Add New Book</div>
      <div class="card-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">

          <div class="mb-3">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter the name of the Book">
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="author" name="author" required placeholder="Enter the name of the Author">
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="mb-3">
              <textarea name="about" class="form-control" id="about" rows="8" cols="80" required placeholder="Enter the About"></textarea>
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="uploadBookImage">Upload Book Image:</label>
            <input type="button" class="btn btn-primary" id="btn-upload" value="upload image">
            <span id="show-image"></span>
            <input type="hidden" id="image_name" name="image_name">
          </div>


          <div class="mb-3">
            <div class="col-12">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>


    </div>

  </div>

</div>
