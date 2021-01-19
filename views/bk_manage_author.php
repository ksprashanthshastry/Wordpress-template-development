<?php
  global $wpdb;
  $all_authors = $wpdb->get_results(
    $wpdb->prepare(
      "SELECT * from ".bk_authors_table().""
      )
  );
 ?>

<div class="container">
  <div class="row">
    <div class="card ">
      <div class="alert alert-info">
        <h5>Manage Author Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Author List</div>
      <div class="card-body">
        <table id="book-list" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Facebook Link</th>
                    <th>About</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(count($all_authors)>0){
                $i = 1;
                foreach($all_authors as $key=>$value){
                  ?>
                  <tr>
                    <td><?php echo $i++;?> </td>
                    <td><?php echo $value->name;?></td>
                    <td><?php echo $value->fb_link;?></td>
                    <td><?php echo $value->about?></td>
                    <td><?php echo $value->created_at;?></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                  </tr>
                  <?php
                  }
                } 
               ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
