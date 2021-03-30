<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-content">
                    <h1>Order history</h1>

                    <?php if (isset($_SESSION["success"])) : ?>
                        <div class="offset-md-4 col-md-4 alert alert-success">
                            <?= $_SESSION["success"]; ?>
                        </div>
                    <?php unset($_SESSION["success"]);
                    endif; ?>

                    <?php if (isset($_SESSION["error"])) : ?>
                        <div class="offset-md-4 col-md-4 alert alert-danger">
                            <?= $_SESSION["error"]; ?>
                        </div>
                    <?php unset($_SESSION["error"]);
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- breadcrumb area end -->

<!-- transformers area start -->
<section class="transformers-area">
    <div class="container">
        <?php if ($orders != null) {
            foreach ($orders as $order) : ?>
                <div class="transformers-box" style="margin: 30px 0px;">
                    <div class="row flexbox-center">
                        <div class="col-lg-4 text-lg-left text-center">
                            <div class="movie-thumbnails transformers-content">
                                <?php $count = 0;
                                foreach ($order['thumbnails'] as $thumbnail) : ?>
                                    <img style="width: 300px; height: 400px;" class="<?= $count == 0 ? 'active' : ''; ?>" src="<?= URL . $thumbnail["thumbnail"]->file_path; ?>" alt="about" />
                                <?php $count++;
                                endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="transformers-content">
                                <h2><?= $order["movie"]->name; ?></h2>

                                <p>Order:
                                    <?=
                                    $order['order']->id;
                                    ?>
                                    ( <?= $order['payment']->status; ?> )
                                </p>

                                <ul>
                                    <li>
                                        <div class="transformers-left">
                                            Duration:
                                        </div>
                                        <div class="transformers-right">
                                            <?= $order["movie"]->duration; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Cinema:
                                        </div>
                                        <div class="transformers-right" style="width: 100%;">

                                            <div class="row">
                                                <div class="col-md-12 transformers-bottom">
                                                    <?= $order["tickets"][0]["cinema"]->name; ?>
                                                    (<?php foreach ($order["tickets"] as $ticket) : ?>
                                                    <?= $ticket["ticket"]->ticket_location; ?>
                                                    <?php endforeach; ?>)
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Time:
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12 transformers-bottom">
                                                <p>
                                                    <span><?= date("M d, Y h:i A", strtotime($ticket["ticket"]->movie_time)); ?></span>
                                                </p>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <div class="transformers-left">
                                            Total:
                                        </div>
                                        <div class="transformers-right">
                                            <?php
                                            $grand_total = 0;
                                            foreach ($order["tickets"] as $ticket) {
                                                if ($order["coupon"] == null) {
                                                    $grand_total += $order["movie"]->price_per_ticket;
                                                } else {
                                                    $discount = $order["movie"]->price_per_ticket * ($order["coupon"]->discount / 100);
                                                    $discount_price = $order["movie"]->price_per_ticket - $discount;
                                                    $order_detail["movie"]->price_per_ticket = $discount_price;
                                                    $grand_total += $discount_price;
                                                }
                                            }
                                            ?>
                                            $<?= $grand_total; ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if($order["payment"]->type == "Online Payment" && $order["payment"]->status == "Pending") {?>
                        <a href="<?= URL; ?>payment/order/<?= $order["order"]->id ?>" class="theme-btn"><i class="icofont icofont-ticket"></i> Pay</a>
                    <?php } ?>
                </div>
            <?php endforeach;
        } else { ?>
            <div class="transformers-box">
                <p style="font-size: 50px; margin: 100px 0px; text-align:center;">No order found!</p>
            </div>
        <?php } ?>

    </div>

    <div class="show-trailers" style="top: 20%;">
        <div class="container">
            <div class="buy-ticket-area" style="padding-top: 50px; background: black;">
                <a href="javascript:void(0);" style="color: white;" onclick="closeTrailers();"><i class="icofont icofont-close"></i></a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="movie-trailer-box">

                            <div class="movie-trailer-videos">
                                <?php $count = 0;
                                foreach ($movie->trailers as $trailer) : ?>
                                    <video class="<?= $count == 0 ? 'active' : ''; ?>" style="width: 100%; height: 400px;" controls src="<?= URL . $trailer->file_path; ?>"></video>
                                <?php $count++;
                                endforeach; ?>
                            </div>

                            <div class="offset-md-5 movie-trailer-indicators">
                                <?php $count = 0;
                                foreach ($movie->trailers as $trailer) : ?>
                                    <div onclick="gotoTrailer(this);" data-index="<?= $count; ?>" class="owl-dot <?= $count == 0 ? 'active' : ''; ?>"></div>
                                <?php $count++;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .movie-trailer-box video.active {
            display: block !important;
        }

        .movie-thumbnails img,
        .movie-trailer-box video {
            display: none !important;
        }

        .movie-thumbnails img.active {
            display: block !important;
            height: 500px;
            object-fit: cover;
        }

        .movie-thumbnail-indicators {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .movie-thumbnail-indicators div,
        .movie-trailer-indicators div {
            cursor: pointer;
        }
    </style>

    <script>
        function closeTrailers() {
            $('.show-trailers').hide();
            $('.show-trailers video').each(function() {
                $(this).get(0).pause();
            });
        }

        function gotoTrailer(self) {
            var index = self.getAttribute("data-index");

            var movieTrailerVideos = document.querySelector(".show-trailers .movie-trailer-videos").children;
            if (movieTrailerVideos.length > index) {
                for (var a = 0; a < movieTrailerVideos.length; a++) {
                    movieTrailerVideos[a].className = "";
                }
                movieTrailerVideos[index].className = "active";
            }

            var movieTrailerIndicators = document.querySelector(".show-trailers .movie-trailer-indicators").children;
            for (var a = 0; a < movieTrailerIndicators.length; a++) {
                movieTrailerIndicators[a].className = "owl-dot";
            }
            self.className = "owl-dot active";
        }

        function gotoThumbnail(self) {
            var index = self.getAttribute("data-index");
            var id = self.getAttribute("data-id");

            var movieThumbnails = document.querySelector(".movie-thumbnails").children;
            if (movieThumbnails.length > index) {
                for (var a = 0; a < movieThumbnails.length; a++) {
                    movieThumbnails[a].className = "";
                }
                movieThumbnails[index].className = "active";
            }

            var movieThumbnailIndicators = document.querySelector(".movie-thumbnail-indicators").children;
            for (var a = 0; a < movieThumbnailIndicators.length; a++) {
                movieThumbnailIndicators[a].className = "owl-dot";
            }
            self.className = "owl-dot active";
        }

        var ratings = 0;
        window.addEventListener("load", function() {
            $(".starrr").starrr().on("starrr:change", function(event, value) {
                ratings = value;

                $.ajax({
                    url: BASE_URL + "movie/add_ratings",
                    method: "POST",
                    data: {
                        "movie_id": $("#movie_id").val(),
                        "ratings": ratings
                    },
                    success: function(response) {
                        // whatever server echo, that will be displayed here in alert
                        // console.log(response);
                        var response = JSON.parse(response);
                        // console.log(response);

                        if (response.status == "error") {
                            swal("Error", response.message, "error");
                        } else {
                            $("#user-ratings").starrr("setRating", ratings);
                        }
                    }
                });
            });

            $("#movie-rating").starrr({
                readOnly: true,
                rating: $("#movie-rating").attr("data-rating")
            });
            $("#movie-rating a").attr("href", "javascript:void(0)");

            $("#user-ratings").starrr({
                readOnly: true,
                rating: $("#user-ratings").attr("data-rating")
            });
            $("#user-ratings a").attr("href", "javascript:void(0)");
        });
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '1117618298345382',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v8.0'
            });
        };

        function shareOnFacebook() {
            FB.ui({
                method: 'share',
                href: window.location.href,
            }, function(response) {});
        }
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

</section><!-- transformers area end -->