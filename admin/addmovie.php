<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM movieTable"));
    ?>
    
    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>

        <div class="admin-section admin-section2">

            <div class="container-lg">
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
                            <i class="fas fa-film" style="background-color: #4547cf"></i>
                            <h2 style="color: #4547cf"><?php echo $moviesNo ?></h2>
                            <h3>Movies</h3>
                        </div>
                        <div class="admin-section-stats-panel" style="border: none" width="100%">
                        </div>
                    </div>
                </div>

                <div id=BannerSpace></div>
                <div class="admin-section-column">
                    <div class="admin-section-panel admin-section-panel2">

                        <div class="admin-panel-section-header">
                            <h2 style="color: #4547cf">Add Movie</h2>
                            <i class="fas fa-film" style="background-color: #4547cf"></i>
                        </div>
                        <form action="" method="POST">
                            <table>
                        <tr>
                            <th>Movie Title: </th>
                        <th>
                        <input placeholder="Title" size= "900" width= "900px"type="text" name="movieTitle" required>
                        </th>
                        <th>
                        </tr>
                        <tr>
                            <th>Movie Genre(s): </th>
                            <th>
                        <input placeholder="Genre(s)" type="text" name="movieGenre" required>
</th>
</tr>
<tr>
    <th>Movie Duration(Mins): </th>
    <th>
                        <input placeholder="Duration(mins)" type="number" name="movieDuration" required>
</th>
</tr>
<tr>
    <th>Release Date: </th>
    <th>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
</th>
</tr>
<tr>
    <th>Director(s): </th>
    <th>
                        <input placeholder="Director(s)" type="text" name="movieDirector" required>
</th>
</tr>
<tr>
    <th>Actor(s)/Actress(es): </th>
    <th>
                        <input placeholder="Actor(s)/Actress(es)" type="text" name="movieActors" required>
</th>
</tr>
</table>
<label>Prices</label>
                        <input placeholder="Main Hall" type="text" name="mainhall" required>
                        <input placeholder="Vip-Hall" type="text" name="viphall" required><br />
                        <input placeholder="Private Hall" type="text" name="privatehall" required><br />
                        <br>
                        <label>Add Poster</label>
                        <input type="file" name="movieImg" accept="image/*">

                        <button type="submit" value="submit" name="submit" style="background-color: #4547cf";>Add Movie</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors,
                                            mainhall,
                                            viphall,
                                            privatehall)
                            VALUES (        'img/" . $_POST['movieImg'] . "',
                                            '" . $_POST["movieTitle"] . "',
                                            '" . $_POST["movieGenre"] . "',
                                            '" . $_POST["movieDuration"] . "',
                                            '" . $_POST["movieRelDate"] . "',
                                            '" . $_POST["movieDirector"] . "',
                                            '" . $_POST["movieActors"] . "',
                                            '" . $_POST["mainhall"] . "',
                                            '" . $_POST["viphall"] . "',
                                            '" . $_POST["privatehall"] . "')";
                           $rs= mysqli_query($con, $insert_query);
                           if ($rs) {
                            echo "<script>alert('Sussessfully Submitted');
                                  window.location.href='addmovie.php';</script>";
                        }
                        }
                        ?>
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Recent Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>MovieID</th>
                            <th>MovieTitle</th>
                            <th>Movie_Genre</th>
                            <th>Release_date</th>
                            <th>Director</th>
                            <th>More</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            $host = "localhost"; /* Host name */
                            $user = "root"; /* User */
                            $password = ""; /* Password */
                            $dbname = "cinema_db"; /* Database name */

                            $con = mysqli_connect($host, $user, $password, $dbname);
                            $select = "SELECT * FROM `movietable`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $ID = $row['movieID'];
                                $title = $row['movieTitle'];
                                $genere = $row['movieGenre'];
                                $releasedate = $row['movieRelDate'];
                                $movieactor = $row['movieDirector'];
                            ?>
                                <tr align="center">
                                    <td><?php echo $ID; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $genere; ?></td>
                                    <td><?php echo $releasedate; ?></td>
                                    <td><?php echo $movieactor; ?></td>
                                    <!--<td><?php echo  "<a href='deletemovie.php?id=" . $row['movieID'] . "'>delete</a>"; ?></td>-->
                                    <td><button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-outline-danger"><?php echo  "<a href='deletemovie.php?id=" . $row['movieID'] . "'>Delete</a>"; ?></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>
