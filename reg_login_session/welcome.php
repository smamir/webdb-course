<?php
   require 'validation.php';
   require 'db_connection.php';
   require 'session.php';
?>

<?php
    $select = mysqli_query($conn, "SELECT * FROM user where username = '$login_session' ");
    $num_row = mysqli_num_rows($select);

    $userrow = mysqli_fetch_array($select);

mysqli_close($conn);
?>

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


<html>
   
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><?php echo $login_id; ?></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>

      <table>
      	<th>User Profile</th>
      	<tr>
      		<th>
      			Name: 
      		</th>
      		<td>
      			<?php echo $userrow[2]; ?>
      		</td>
      	</tr>
      	<tr>
      		<th>
      			ID:  
      		</th>
      		<td>
      			<?php echo $userrow[0]?>
      		</td>
      	</tr>
      	<tr>
      		<th>
      			Email: 
      		</th>
      		<td>
      			<?php echo $userrow[1]?>
      		</td>
      	</tr>
      	<tr>
      		<th>
      			Gender: 
      		</th>
      		<td>
      			<?php echo $userrow[4]?>
      		</td>
      	</tr>
      	<tr>
      		<th>
      			Password: 
      		</th>
      		<td>
      			<?php echo $userrow[3]?>
      		</td>
      	</tr>
      </table>

      <form action="" method="post">
      	<br><br>
      	Old Password:<span class="error">* <?php echo $passErr;?></span><br>
            <input type="password" name="password" value="">
            <br>
        New Password:<span class="error">* <?php echo $passErr;?></span><br>
            <input type="password" name="password" value="">
        <input type="submit" name="submit" value="Update">
      </form>
   </body>
   
</html>