<?php
require_once 'dbconfig.php';

if(isset($_POST['update'])){

    $userId = intval($_GET['id']);
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $unit = $_POST['unit'];
    $phone = intval($_POST['phone']);

    $sql = "UPDATE users set firstname=:firstname, lastname=:lastname, unit=:unit, phone=:phone WHERE id=:id";
    $query = $conn->prepare($sql);

    $query->bindParam(':firstname', $fname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lname, PDO::PARAM_STR);
    $query->bindParam(':unit', $unit, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':id', $userId, PDO::PARAM_STR);

    $query->execute();
    echo "<script>alert('کاربر ویرایش شد')</script>";
    echo "<script>window.location.href='list.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateStyle.css">
    <title>Document</title>
</head>
<body>
    
    <div class="insert">
        <h2 id="header">وارد کردن اطلاعات</h2>
        <div class="line"></div>


        <?php

        $userId = intval($_GET['id']);
        $sql = "SELECT firstname, lastname, unit, phone FROM users WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $userId, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        
        ?>

        <form class="form" method="post">
            <div class="names">
                <div class="fname">
                    <label>نام </label>
                    <input type="text" value="<?php echo htmlentities($result['firstname']); ?>" name="firstname">
                </div>
                <div class="lname">
                    <label>نام خانوادگی </label>
                    <input type="text" value="<?php echo htmlentities($result['lastname']); ?>" name="lastname">
                </div>
            </div>
            <div class="email">
                <label>واحد</label>
                <input type="text" value="<?php echo htmlentities($result['unit']); ?>" name="unit">
            </div>
            <div class="phone">
                <label>شماره</label>
                <input type="tel" value="<?php echo htmlentities($result['phone']); ?>" name="phone">
            </div>
            <input type="submit" class="sabt" value="ویرایش" name="update">
        </form>
    </div>
</body>
</html>