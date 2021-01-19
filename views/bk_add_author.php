<div class="container">
  <div class="row">
    <div class="card">
      <div class="alert alert-info">
        <h5>Add Author Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Add New Author</div>
      <div class="card-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmAddAuthor">

          <div class="mb-3">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter the name of the Author">
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="author">Facebook Link:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="fb_link" name="fb_link" required placeholder="Enter Facebook URL of the author">
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="mb-3">
              <textarea name="about" class="form-control" id="about" rows="8" cols="80" placeholder="Enter About Author"></textarea>
            </div>
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
