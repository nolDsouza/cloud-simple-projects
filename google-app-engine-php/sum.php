<html>
  <head>
    <style type="text/css">
      div {
        padding: 20px;
      }
      .button1 {
        padding: 15px 32px;
        text-align: center;
        font-size 16px;
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
        cursor: pointer;
      }
      .button1:hover {
          background-color: #008CBA;
          color: white;
      }
    </style>
  </head>
  <body>
    <form action="" method="get">
        <div>A: <input type="number" name="a"></input></div>
        <div>B: <input type="number" name="b"></input></div>
        <div>C: <input type="number" name="c"></input></div>
        <div><input class="button1" type="submit" value="Submit"></div>
    </form>
  </body>
</html>
<?php
if (count($_GET) === 3) {
    $fibNums = explode(",",
      file_get_contents('gs://s3600251-storage/fibonacci_n.txt')
    );
    $F = array_sum($fibNums);
    $A = $_GET["a"];
    $B = $_GET["b"];
    $C = $_GET["c"];
    $S = $A + $B;
    $M = $S * $C;
    $TOTAL = $M + $F;
    $avg = ($S + $C + $F) / (count($fibNums) + 3);
    $avg = round($avg, 2);

    echo "<p>Total Sum: " . htmlspecialchars($TOTAL) . '</p>'."\n";
    echo "<p>Average: " . htmlspecialchars($avg) . '</p>'."\n";
    $handle = fopen('gs://s3600251-storage/result.txt','w');
    fwrite($handle, $avg);
    fclose($handle);
}
?>
