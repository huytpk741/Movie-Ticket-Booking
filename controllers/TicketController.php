<?php

/**
 * TicketController
 */
class TicketController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        if (isset($_SESSION["user"])) {
            if (isset($_POST["selected_seats"])) {
                if (count($_POST["selected_seats"]) > 0) {
                    if ($_POST["selected_payment"] == 'onlinepay') {
                        // Happens only when someone deactivate the client-side validations
                        $is_currently_playing = $this->load_model("MovieModel")->is_currently_playing($_POST["id"]);
                        $token = md5(time());
                        if (!$is_currently_playing) {
                            $_SESSION["error"] = "Movie is currently not being played in our cinemas.";
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $movie_cinema = $this->load_model("CinemaModel")->get_movie_cinema($_POST["selected_time"]);

                        if ($movie_cinema == null) {
                            $_SESSION["error"] = "Movie cinema does not exists anymore.";
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $order_id = $this->load_model("OrderModel")->create();
                        $payment_id = $this->load_model("PaymentModel")->create_for_online($order_id, $token);

                        $response = $this->load_model("TicketModel")->create($movie_cinema, $order_id);
                        if ($response["status"] == "error")
                        {
                            $_SESSION["error"] = $response["message"];
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $cinema = $this->load_model("CinemaModel")->get($_POST["selected_cinema"]);
                        $movie = $this->load_model("MovieModel")->get($_POST["id"]);

                        $_SESSION["success"] = "Please finish your payment to book.";

                        header("Location: " . URL . "payment/order/" . $order_id);
                    } 
                    ///////////////////////////////////////////////////////////////////////////////////////////////////
                    else if($_POST["selected_payment"] == 'cih') {
                        // Happens only when someone deactivate the client-side validations
                        $is_currently_playing = $this->load_model("MovieModel")->is_currently_playing($_POST["id"]);
                        $token = md5(time());
                        if (!$is_currently_playing) {
                            $_SESSION["error"] = "Movie is currently not being played in our cinemas.";
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $movie_cinema = $this->load_model("CinemaModel")->get_movie_cinema($_POST["selected_time"]);

                        if ($movie_cinema == null) {
                            $_SESSION["error"] = "Movie cinema does not exists anymore.";
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $order_id = $this->load_model("OrderModel")->create();
                        $payment_id = $this->load_model("PaymentModel")->create_for_CIH($order_id, $token);
                        

                        $response = $this->load_model("TicketModel")->create($movie_cinema, $order_id);
                        if ($response["status"] == "error") {
                            $_SESSION["error"] = $response["message"];
                            header("Location: " . $_SERVER["HTTP_REFERER"]);
                            exit();
                        }

                        $cinema = $this->load_model("CinemaModel")->get($_POST["selected_cinema"]);
                        $movie = $this->load_model("MovieModel")->get($_POST["id"]);

                        $email = file_get_contents("views/emails/confirm-order.php");
                        $seats = "";
                        $link = URL . "payment/confirm_order/" . $payment_id . "/" . $token;
                        foreach ($_POST["selected_seats"] as $seat) {
                            $price_text = $movie->price_per_ticket;
                            $variable_seats = array(
                                "{{ cinema_name }}" => $cinema->name,
                                "{{ movie_name }}" => $movie->name,
                                "{{ languages }}" => $movie->languages,
                                "{{ seat_location }}" => $seat,
                                "{{ time }}" => $_POST["selected_time"],
                                "{{ price }}" => $price_text
                            );
                            $textContent = '<tr>
                                <td>
                                    <div class="cardWrap">
                                        <div class="card cardLeft">
                                            <h1>{{ cinema_name }}</h1>
                                            <div class="title" style="margin-top: 40px;">
                                                <h2>{{ movie_name }}</h2>
                                                <span>movie</span>
                                            </div>
                                            <div class="name">
                                                <h2>{{ languages }}</h2>
                                                <span>language</span>
                                            </div>
                                            <div class="seat">
                                                <h2>{{ seat_location }}</h2>
                                                <span>seat</span>
                                            </div>
                                            <div class="time">
                                                <h2>{{ time }}</h2>
                                                <span>time</span>
                                            </div>
                                        </div>

                                        <div class="card cardRight">
                                            
                                            <div class="number" style="margin-top: 70px;">
                                                <h3>{{ seat_location }}</h3>
                                                <span>seat</span>
                                            </div>

                                            <div class="number">
                                                <h3 class="price-value">{{ price }}</h3>
                                                <span>price</span>
                                            </div>

                                            <div class="barcode"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                            foreach ($variable_seats as $key => $value)
                                $textContent = str_replace($key, $value, $textContent);
                            $seats .= $textContent;
                        }
                        $variables = array(
                            "{{ URL }}" => URL,
                            "{{ username }}" => $_SESSION["user"]->name,
                            "{{ CONTACTUS_URL }}" => URL . "contact",
                            "{{ seats }}" => $seats,
                            "{{ confirm_link }}" => $link
                        );

                        foreach ($variables as $key => $value)
                            $email = str_replace($key, $value, $email);

                        $this->send_mail($_SESSION["user"]->email, "Cinema Ticket Booking", $email);

                        $_SESSION["success"] = "You need to confirm that you are booking. Please check your email.";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                    else {
                        $_SESSION["error"] = "Please select a payment method.";
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
                else {
                    $_SESSION["error"] = "Please select seats.";
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
            } else {
                $_SESSION["error"] = "Please select seats.";
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        } else {
            $_SESSION["error"] = "Please login to book a ticket.";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}
