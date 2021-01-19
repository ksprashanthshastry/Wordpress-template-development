<div class="container">
  <div class="row">
    <div class="card">
      <div class="alert alert-info">
        <h5>Add Student Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Add New Student</div>
      <div class="card-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmAddStudent">
  
          <div class="mb-3">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter the name of the Student">
            </div>
          </div>

          <div class="mb-3">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="email" name="email" required placeholder="Enter Student Email">
            </div>
          </div>
          
          <div class="mb-3">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username" required placeholder="Enter the Student Username">
            </div>
          </div>
          
          <div class="mb-3">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" required placeholder="Enter Student Password">
            </div>
          </div>
          
          <div class="mb-3">
            <label class="control-label col-sm-2" for="conf_password">Confirm Password:</label>
            <div class="mb-3">
              <input type="password" class="form-control" id="conf_password" name="conf_password" required placeholder="Please retype Password to confirm">
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
