
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Customer Messages</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<style>
    #BannerSpace {
    height: 60px;
    opacity: 0%;
    }
</style>

<body>
    
    <?php

    include "config.php";
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "cinema_db"; /* Database name */

    $select = "SELECT * FROM `feedbacktable`";
    $run = mysqli_query($con, $select);

    $sql = "SELECT * FROM bookingtable";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedbacktable"));
    ?>

    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>

        <div class="admin-section-column">

            <div id=BannerSpace></div>
            <div class="col-lg-8">
                <div class="admin-section-stats">
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                            <i class="fas fa-envelope" style="background-color: #3cbb6c"></i>
                            <h2 style="color: #3cbb6c"><?php echo $messagesNo ?></h2>
                            <h3>Messages</h3>
                        </div>
                        <div class="admin-section-stats-panel" style="border: none" width="100%">
                        </div>
                    </div>
                <div id=BannerSpace></div>
                </div>

                <div class="admin-section-panel">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Customer <b>Messages</b></h2>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Message ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Feedback</th>
                            <th>More</th>
                        </tr>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($run)) {
                                $id = $row['msgID'];
                                $firstname = $row['senderfName'];
                                $lastname = $row['senderlName'];
                                $email = $row['sendereMail'];
                                $message = $row['senderfeedback'];
                            ?>
                            
                                <tr align="center">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $firstname; ?></td>
                                        <td><?php echo $lastname; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <!--<td><?php echo  "<a href='Deletecontact.php?id=" . $row['msgID'] . "'>delete</a>"; ?></td>-->
                                        <td><button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-outline-danger"><?php echo  "<a href='Deletecontact.php?id=" . $row['msgID'] . "'>Delete</a>"; ?></button></td>
                                    </tr>

                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
