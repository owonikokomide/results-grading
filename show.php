<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="grades.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="table">
      <table>
        <tr>
          <th>Student Name</th>
          <th>GNS</th>
          <th>CBT</th>
          <th>BFN</th>
          <th>MTH</th>
          <th>MKT</th>
          <th>Student CCPG</th>
        </tr>
       <?php 
      $select = "SELECT * FROM scores";
      $result = mysqli_query($connection, $select);
      while($row = mysqli_fetch_array($result)){ ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['gns']; ?></td>
          <td><?php echo $row['cbt']; ?></td>
          <td><?php echo $row['bfn']; ?></td>
          <td><?php echo $row['mth']; ?></td>
          <td><?php echo $row['mkt']; ?></td>
          <td><?php echo $row['ccpg']; ?></td>
        </tr>
        <?php } ?>
      </table>
      <button class="btn" onclick="history.back()">Back</button>
    </div>
  </div>
</body>
</html>