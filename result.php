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
    <div class="student_grades">
      <form action="" method="POST">
    STD Names:<input type="text" name="name" placeholder="enter student name" required><br><br>
    GNS Score:<input type="text" name="gns" placeholder="enter student score" required><br><br>
    CBT Score:<input type="text" name="cbt" placeholder="enter student score" required><br><br>
    BFN Score:<input type="text" name="bfn" placeholder="enter student score" required><br><br>
    MTH Score:<input type="text" name="mth" placeholder="enter student score" required><br><br>
    MKT Score:<input type="text" name="mtk" placeholder="enter student score" required><br><br>
      <button type="submit" name="submit">Submit</button>
      </form>
     <p><a href="show.php">View students result</a></p>
    </div>
  </div>
</body>
</html>

<?php

include('config.php');

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $gns = $_POST['gns'];
  $cbt = $_POST['cbt'];
  $bfn = $_POST['bfn'];
  $mth = $_POST['mth'];
  $mkt = $_POST['mtk'];

  $min1 = 70; $max1= 100;
  $min2 = 60; $max2= 69;
  $min3 = 50; $max3= 59;
  $min4 = 40; $max4= 49;
  $min5 = 35; $max5= 39;
  $min6 = 0; $max6= 34;

  $range1 = range($min1, $max1);
  $range2 = range($min2, $max2);
  $range3 = range($min3, $max3);
  $range4 = range($min4, $max4);
  $range5 = range($min5, $max5);
  $range6 = range($min6, $max6);


  $array = [
    "gns" => $gns,
    "cbt" => $cbt,
    "bfn" => $bfn,
    "mth" => $mth,
    "mkt" => $mkt
  ];
  $a = 5;
  $b = 4;
  $c = 3;
  $d = 2;
  $e = 1;
  $f = 0;

  // grades units
$course = [3,2,3,2,1];
 $grade = [];
  foreach($array as $index => $numberToCheck){
    if (in_array($numberToCheck, $range1)) {
    $grade [] = $a ;
} else if (in_array($numberToCheck, $range2)) {
    $grade [] = $b ;
}else if (in_array($numberToCheck, $range3)) {
    $grade [] =  $c;
}else if (in_array($numberToCheck, $range4)) {
    $grade [] = $d ;
}else if (in_array($numberToCheck, $range5)) {
    $grade [] = $e ;
}
else if (in_array($numberToCheck, $range6)) {
    $grade [] = $f ;
  }

 
  
}
 $count = 11;//count($array);
 $totalscore = 0;
  // $scores = ((array_sum($array)) / ($count));
  for($i =0; $i <count($grade); $i++){
$totalscore += $grade[$i]*$course[$i];
  }
  // echo round(($totalscore/$count),2);
  $ccpg = round(($totalscore/$count),2);

  $insert = "INSERT INTO scores (name, gns, cbt, bfn, mth, mkt, ccpg)
  VALUES('$name', '$gns', '$cbt', '$bfn', '$mth', '$mkt', '$ccpg')";
  $insert_query = mysqli_query($connection, $insert);

  if($insert_query){
  header('location:show.php');
  }

}

?>
