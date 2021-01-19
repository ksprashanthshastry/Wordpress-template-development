<?php 
  global $wpdb;
  $all_books = $wpdb->get_results(
    $wpdb->prepare("SELECT * from ".book_keeper_table(). ""),ARRAY_A
    );
 ?>

<div class="container">
  <div class="row">
    <div class="card ">
      <div class="alert alert-info">
        <h5>Book List Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Available Books</div>
      <div class="card-body">
        <table id="book-list" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Image Name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              if(count($all_books)>0){
                $i = 1;
                foreach ($all_books as $key=>$value){
                  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['author'];?></td>
                    <td><?php echo $value['about'];?></td>
                    <td><img src="<?php echo $value['book_image'];?>" style="height:80px;width:80px" ></td>
                    <td><?php echo $value['created_at'];?></td>
                    <td>
                      <a class="btn btn-info" href="javascript:void(0)">Edit</a>
                      <a class="btn btn-danger" href="javascript:void(0)">Delete</a>
                    </td>


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
