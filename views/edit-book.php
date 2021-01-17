<div class="container">
  <div class="row">
    <div class="card">
      <div class="alert alert-info">
        <h5>Update Book Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Edit Book Information</div>
      <div class="card-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">

          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter the name of the Book">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="author" name="author" required placeholder="Enter the name of the Author">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="mb-3">
              <textarea name="about" class="form-control" id="about" rows="8" cols="80" required placeholder="Enter the About"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="uploadBookImage">Upload Book Image:</label>
            <div class="mb-3">
              <input type="button" class="btn btn-secondary" value="upload image" style="margin-top:5px">
            </div>
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