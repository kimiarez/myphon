<?php
require_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">

    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST['login'])) {

        $fname = ($_POST['firstname']);
        $lname = ($_POST['lastname']);
        $unit = ($_POST['unit']);

        global $conn;

        if (!empty($fname) || !empty($lname) || !empty($unit)) {
            $sql = "SELECT  * FROM users where firstname like '%$fname%' and lastname like '%$lname%' and unit like '%$unit%' ";
            $query = $conn->prepare($sql);
            $query->execute();
            $resaults = $query->fetchAll(PDO::FETCH_OBJ);
            

            if(!$resaults){
            echo "<script>alert('کاربری با این اطلاعات یافت نشد')</script>";
            echo "<script>window.location.href='phon.php'</script>";      
            }

        } else {
            echo "<script>alert('هیچ رکوردی یافت نشد')</script>";
            echo "<script>window.location.href='phon.php'</script>";
            
        }
    }





    ?>
    <span class="head">__ دفترچه تلفن __</span>
    
    <div class="main">
    <table class="result">
        <thead>
            <th id="thin">ردیف</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>واحد</th>
            <th>تلفن</th>
        </thead>
        <tbody>
            <?php
                $id = 1;
               if (!empty($fname) || !empty($lname) || !empty($unit)) {
                  foreach ($resaults as $resault) { ?>
                     <tr>
                          <td><?php echo htmlentities($id) ?></td>
                          <td><?php echo htmlentities($resault->firstname) ?></td>
                          <td><?php echo htmlentities($resault->lastname) ?></td>
                          <td><?php echo htmlentities($resault->unit) ?></td>
                          <td><?php echo htmlentities($resault->phone) ?></td>
                        </tr>
                       <?php 
                       $id++;
                    }
                }?>
                
        </tbody>
    </table>
</div>
</body>
</html>