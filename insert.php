<?php
require_once 'dbconfig.php';

if(isset($_POST['insert'])){
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $unit = $_POST['unit'];
   $phone = intval($_POST['phone']);

   $sql = "INSERT INTO users(firstname, lastname, unit, phone) VALUE (:firstname , :lastname, :unit, :phone)";
   $query = $conn->prepare($sql);
   $query->bindParam(':firstname', $fname, PDO::PARAM_STR);
   $query->bindParam(':lastname', $lname, PDO::PARAM_STR);
   $query->bindParam(':unit', $unit, PDO::PARAM_STR);
   $query->bindParam(':phone', $phone, PDO::PARAM_STR);
   $query->execute();
   

   $lastInsertId = $conn->lastInsertId();

   if($lastInsertId){
    echo "<script>alert('کاربر ذخیره شد')</script>";
    echo "<script>window.location.href='list.php'</script>";
   }
   else{
    echo "<script>alert('کاربر ذخیره نشد')</script>";
    echo "<script>window.location.href='list.php'</script>";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insertStyle.css">
    <title>Document</title>
</head>
<body>
    <div class="insert">
        <h2 id="header">وارد کردن اطلاعات</h2>
        <div class="line"></div>
        <form method="post" class="form">
            <div class="names">
                <div class="fname">
                    <label>نام </label>
                    <input type="text" name="firstname" placeholder="مثال : علی">
                </div>
                <div class="lname">
                    <label>نام خانوادگی </label>
                    <input type="text" name="lastname" placeholder="مثال : اکبری">
                </div>
            </div>
            <div class="email">
                <label>واحد</label>
                <input type="text" name="unit" placeholder="مثال : اطلاعات">
            </div>
            <div class="phone">
                <label>شماره</label>
                <input type="tel" name="phone" placeholder="مثال : 300">
            </div>
            <input type="submit" class="sabt" value="ثبت" name="insert">
        </form>
    </div>
</body>
</html>