<?php
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fontss/css/font-awesome.min.css ">
    <link rel="stylesheet" href="phonstyle.css">
  
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div>
            <span class="sazman" id="sazman-2">سازمان امور اراضی کشور</span>
            <span class="sazman" id="sazman-1">( دفترچه تلفن )</span>
        </div>

        <div class="login">
            <form method="post" action="table.php" class="addInfo">
                <label>نام :</label>
                <input type="text" class="texts" name="firstname">

                <label>نام خانوادگی :</label>
                <input type="text" class="texts" name="lastname">

                <label>واحد :</label>
                <input type="text" class="texts" name="unit">

                <input class="search" type="submit" value="جستجو" name="login">
                <!-- <button type="submit" name="searchuser" class="search">جستجو</button> -->
            </form>
        </div>


    </div>
   

    <img class="logo" src="images/logo-la01.png">
</body>
<!-- https://www.canva.com/colors/color-palettes/healthy-leaves/ -->

</html>