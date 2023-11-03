<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="grades.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>portal</title>
</head>
<body>
  <div class="container">
    <div class="student_portal">
      <h1>ENTER YOUR NAME TO CHECK YOUR RESULT</h1>
    <center><form action="" method="POST">
      <input type="text" name="student" placeholder="Enter student name to check result">
      <button type="submit" class="btns" name="submit_form">Submit</button>
      </form></center>
    </div>
  </div>
</body>
</html>

<?php

if(isset($_POST['submit_form'])){
  $student_name = $_POST['student'];

  $select = "SELECT * FROM scores WHERE name='$student_name' ";
  $select_query = mysqli_query($connection, $select);
 
  while($row = mysqli_fetch_array($select_query)){
 
   
?>
<center><table>
  <tr>
    <th>Student Name</th>
    <th>GNS</th>
    <th>CBT</th>
    <th>BFN</th>
    <th>MTH</th>
    <th>MKT</th>
    <th>CCPG</th>
  </tr>
  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['gns']; ?></td>
    <td><?php echo $row['cbt']; ?></td>
    <td><?php echo $row['bfn']; ?></td>
    <td><?php echo $row['mth']; ?></td>
    <td><?php echo $row['mkt']; ?></td>
    <td><?php echo $row['ccpg']; ?></td>
  </tr>
</table></center>
<?php

  }}


?>
