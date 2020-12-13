<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Result Page</title>
</head>

<body>
    <div class="col-12 d-flex justify-content-center p-2">
        <div class="card col-5 flex-column p-2">
            <ul class="nav nav-pills">
                <li class="nav-item pb-3">
                    <a class="nav-link" href="index.html">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?=$_GET?' active':''?>" href="index.html">LCD CALCULATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?=$_POST?' active':''?>" href="gcd.html">GCD CALCULATE</a>
                </li>
            </ul>
            <?php
               function gcd ($n1, $n2) {
                   return $n2 ? gcd($n2, $n1 % $n2) : $n1;
               }
               function lcd($a, $b) {
                   for ($i=2; $i <= $b; $i++) { 
                       if($b%$i==0 && $a%$i==0) return $i;
                   }
                   return 1;
               }
               $alertType="danger";
               $alertMessage="The page you are looking for could not be found";
               if($_POST){
                   if(@$_POST["n1"] && @$_POST["n2"]){ 
                       $biggest=$_POST['n1']<$_POST['n2']?$_POST['n2']:$_POST['n1'];
                       $least=$_POST['n1']<$_POST['n2']?$_POST['n1']:$_POST['n2'];
                       $gcd=gcd($least, $biggest);
                       $alertMessage="GCD ({$least}, {$biggest}) = {$gcd}";
                       $alertType="success";
                   }   else{
                       $alertMessage="Please fill all boxes";
                       $alertType="danger";                    
                   }
                   echo '<a href="gcd.html"><- Return Gcd Calculate page</a>';
               }
               if($_GET){ 
                   if(@$_GET["n1"] && @$_GET["n2"]){ 
                       $biggest=$_GET['n1']<$_GET['n2']?$_GET['n2']:$_GET['n1'];
                       $least=$_GET['n1']<$_GET['n2']?$_GET['n1']:$_GET['n2'];
                       $lcd=lcd($least,$biggest);
                       $alertMessage="LCD ({$least}, {$biggest}) = {$lcd}";
                       $alertType="success";
                   }   else{
                       $alertMessage="Please fill all boxes";
                       $alertType="danger";                    
                   } 
                   echo '<a href="index.html"><- Return Lcd Calculate page</a>';
                   
               }
               echo "<br><div class='mt-3 alert alert-{$alertType}'>{$alertMessage}</div>";
               ?>
        </div>
    </div>
</body>

</html>