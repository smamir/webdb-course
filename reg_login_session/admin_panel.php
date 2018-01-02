<link rel="stylesheet" type="text/css" href="style.css">
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<?php
    require 'db_connection.php';
    require 'session.php';
?>


<?php
    //include('db.php');
    $select = mysqli_query($conn, "SELECT * FROM user order by userID desc");
    $num_row = mysqli_num_rows($select);

    if( $num_row ) {
?>
      <table>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Gender</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['username']; ?></td>
              <td><?php echo $userrow['email']; ?></td>
              <td><?php echo $userrow['gender']; ?></td>
          </tr>
          <?php } ?>
      </table>
<?php } 

mysqli_close($conn);
?>


<br><br><br>

<div class="admin">
     <a href="logout.php">Logout</a>
</div>
