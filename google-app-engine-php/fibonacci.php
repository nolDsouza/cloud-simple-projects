<?php
#Assumes input is 5 or more
function fib($n) {
  $f0 = 0;
  $f1 = 1;
  $fn = 0;
  $str = "$f1";

  for ($i = 1; $i < $n; $i++) {
      $fn = $f0 + $f1;
      $f0 = $f1;
      $f1 = $fn;
      $str .= ','.$fn;   
  }
  return $str;
}

if (array_key_exists('n', $_GET)) {
    #Should redirect if before the html segment
    header('Location: show');
    
    $handle = fopen('gs://s3600251-storage/fibonacci_n.txt','w');
    fwrite($handle, fib($_GET['n']));
    fclose($handle);
}
?>
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
        <div>N: <input type="number" name="n" min="5"></input></div>
        <div><input class="button1" type="submit" value="Submit"></div>
    </form>
  </body>
</html>

