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
    
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">

    <!-- javascript -->
    <script src="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script>
    
</head>

<style>
    #BannerSpace {
    height: 60px;
    opacity: 0%;
    }
</style>

<body>
    <?php
        include "connection.php";
        $sql = "SELECT * FROM movieTable";
    ?>
    <header></header>
    <div id="home-section-1" class="movie-show-container">
        <div id=BannerSpace></div>
        <h1>Currently Showing</h1>
        <h3>Book a Movie!</h3>
        
        <div class="row">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i <= 9; $i++) {
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
          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>
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
        <h1 class="section-title">Explore new movies</h1>
        <h3>Trailers</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/dune.thumb" alt="">
                <div class="trailer-item-info" data-video="8g18jFHCLXk">
                    <h3>Dune</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/encanto.thumb" alt="">
                <div class="trailer-item-info" data-video="CaimKeDcudo">
                    <h3>Encanto</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/ghostbusters.thumb" alt="">
                <div class="trailer-item-info" data-video="ahZFCF--uRY">
                    <h3>Ghostbusters: Afterlife</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/gucci.thumb" alt="">
                <div class="trailer-item-info" data-video="pGi3Bgn7U5U">
                    <h3>House of Gucci</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/resident.thumb" alt="">
                <div class="trailer-item-info" data-video="4q6UGCyHZCI">
                    <h3>Resident Evil: Welcome to Raccoon City</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/richard.thumb" alt="">
                <div class="trailer-item-info" data-video="BKP_0z52ZAw">
                    <h3>King Richard</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/clifford.thumb" alt="">
                <div class="trailer-item-info" data-video="4zH5iYM4wJo">
                    <h3>Clifford the Big Red Dog</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/eternals.thumb" alt="">
                <div class="trailer-item-info" data-video="x_me3xsvDgk">
                    <h3>Eternals</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/notime.thumb" alt="">
                <div class="trailer-item-info" data-video="N_gD9-Oa0fg">
                    <h3>No Time To Die</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/venom.thumb" alt="">
                <div class="trailer-item-info" data-video="FmWuCgJmxo">
                    <h3>Venom: Let There Be Carnage</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/belfast.thumb" alt="">
                <div class="trailer-item-info" data-video="Ja3PPOnJQ2k">
                    <h3>Belfast</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/french.thumb" alt="">
                <div class="trailer-item-info" data-video="TcPk2p0Zaw4">
                    <h3>The french Dispatch</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <footer>
      <script src="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/vendors/highlight.js"></script>
      <script src="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/js/app.js"></script>
    </footer>
</body>
</html>
