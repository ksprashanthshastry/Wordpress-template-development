<?php
  global $wpdb;
  $all_students = $wpdb->get_results(
    $wpdb->prepare(
      "SELECT * from ".bk_students_table()."")
    );
  //print_r($all_students)
 ?>

<div class="container">
  <div class="row">
    <div class="card ">
      <div class="alert alert-info">
        <h5>Manage Student Page</h5>
      </div>
      <div class="card-header text-white bg-secondary">Student List</div>
      <div class="card-body">
        <table id="book-list" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(count($all_students)>0){
                $i = 1;
                foreach($all_students as $key=>$value){
                  $userdetails = get_userdata($value->user_login_id);
                  ?>
                  <tr>
                    <td><?php echo $i++;?> </td>
                    <td><?php echo $value->name;?></td>
                    <td><?php echo $value->email;?></td>
                    <td><?php echo $userdetails->user_login?></td>
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
