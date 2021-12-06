<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>OTU Cinema</title>
    <link rel="icon" type="image/jpg" href="homepage/logo.jpg">
    <script src="_.js "></script>
</head>

<body>
    <?php
        include "connection.php";
        $sql = "SELECT * FROM movieTable";
    ?>
    <!-- <header></header> -->
    <?php include('./sections/header.php'); ?>
    <div id="home-section-1" class="movie-show-container">
        <h1>Currently Showing</h1>
        <h3>Book a Movie!</h3>

        <div class="movies-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i <= 5; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '<div class="movie-box">';
                        echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                        echo '<div class="movie-info ">';
                        echo '<h3>' . $row['movieTitle'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </div>
    </div>

    <div id="home-section-2" class="services-section">
        <h1>Simple, Quick & Easy!</h1>
        <h3>3 Steps to Book a Movie:</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose a Movie</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Purchase Tickets</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Select Seating & Enjoy!</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>
    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Explore Popular Movies</h1>
        <h3>Popular Movies</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-1.jpg" alt="">
                <div class="trailer-item-info" data-video="Z1BCujX3pw8">
                    <h3>Captain Marvel</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-2.jpg" alt="">
                <div class="trailer-item-info" data-video="OPEfsEaFv_c">
                    <h3>Karmat Bytmrmt</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-3.jpg" alt="">
                <div class="trailer-item-info" data-video="cksYkEzUa7k">
                    <h3>The Lego Movie</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-4.jpg" alt="">
                <div class="trailer-item-info" data-video="Ze5YA4mkzhI">
                    <h3>Secret Men Club</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-5.jpg" alt="">
                <div class="trailer-item-info" data-video="lbUAVTc7NTo">
                    <h3>VICE</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/movie-thumb-6.jpg" alt="">
                <div class="trailer-item-info" data-video="RyFlfN4dD14">
                    <h3>The Vanishing</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- <footer></footer> -->
    <?php include('./sections/footer.php'); ?>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
