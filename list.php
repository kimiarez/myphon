<?php

require_once 'dbconfig.php';


if(isset($_REQUEST['del'])){
    $userId = intval($_GET['del']);
    $sql = "DELETE FROM users WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $userId , PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('کاربر حذف شد')</script>";
    echo "<script>window.location.href='list.php'</script>";

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontss/css/font-awesome.min.css ">
    <link rel="stylesheet" href="listStyle.css">
    <title>Document</title>


    <div class="container">
        <a href="insert.php">
            <button class="adduser">وارد کردن کاربر</button>
        </a>

        <table id="mytable">
            <thead>
                <th>ردیف</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>واحد</th>
                <th>تلفن</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </thead>
            <tbody>
                <?php
                 $sql = "SELECT firstname, lastname, unit, phone, id FROM users";
                 $query = $conn->prepare($sql);
                 $query->execute();
                 $results = $query->fetchAll(PDO::FETCH_OBJ);
                 
                 $id = 1;
                 if($query->rowCount() > 0){
                    foreach($results as $result){
                ?>
                <tr>
                    <td>
                         <?php echo htmlentities($id) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($result->firstname) ?>

                    </td>
                    <td>
                        <?php echo htmlentities($result->lastname) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($result->unit) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($result->phone) ?>
                    </td>
                    <td class="small"><a href="update.php?id=<?php echo  htmlentities($result->id); ?>"><button class="edit"><span
                                    class="fa fa-pencil-square"></span></button></a></td>
                    <td class="small"><a href="list.php?del=<?php echo  htmlentities($result->id); ?>"><button class="delet" onclick="alert('آیا حذف انجام شود؟')"><span class="fa fa-trash"></span></button></a>
                    </td>
                </tr>
                <?php
                $id++;
                    }}
                ?>
            </tbody>
        </table>
    </div>
</body>
</head>
<body>
    
</body>
</html>