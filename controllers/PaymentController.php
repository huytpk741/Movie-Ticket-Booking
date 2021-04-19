<?php

/**
 * PaymentController
 */
class PaymentController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function payment_successfull($token)
    {
        Security::csrf_token();
        $paymentId = $_POST["payment_id"];
        $order_id  = $_POST["order_id"];
        $type      = $_POST["type"];
        $order_detail = $this->load_model("OrderModel")->get_detail($order_id);

        if ($this->user == null) {
            echo false;
            exit();
        }

        if ($order_detail["order"]->user_id != $this->user->id) {
            echo false;
            exit();
        }

        $has_coupon_code_applied = ($order_detail["coupon"] != null);

        $movie = $order_detail["movie"];

        $email = file_get_contents("views/emails/ticket-booked.php");
        $seats = "";
        $price_text = $movie->price_per_ticket;
        foreach ($order_detail["tickets"] as $ticket) {
            $grand_total = 0;
            if ($order_detail["order"]->coupon_code_id == 0) {
                $grand_total += $movie->price_per_ticket;
            } else {
                $discount = $movie->price_per_ticket * ($order_detail["coupon"]->discount / 100);
                $discount_price = $movie->price_per_ticket - $discount;

                $grand_total += $discount_price;
                $price_text = "<del>" . $movie->price_per_ticket . "</del> " . $grand_total;
            }

            $variable_seats = array(
                "{{ cinema_name }}" => $ticket['cinema']->name,
                "{{ movie_name }}" => $movie->name,
                "{{ languages }}" => $movie->languages,
                "{{ seat_location }}" => $ticket['ticket']->ticket_location,
                "{{ time }}" => $ticket['ticket']->movie_time,
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

            $variables = array(
                "{{ URL }}" => URL,
                "{{ username }}" => $_SESSION["user"]->name,
                "{{ CONTACTUS_URL }}" => URL . "contact",
                "{{ seats }}" => $seats
            );
        }


        foreach ($variables as $key => $value)
            $email = str_replace($key, $value, $email);

        $this->send_mail($_SESSION["user"]->email, "Cinema Ticket Booking", $email);

        $_SESSION["success"] = "Your ticket(s) has been booked. Kindly reach 30 mint before movie starts. Please check your email.";
        $is_paid_payment = $this->load_model("PaymentModel")->is_confirm_payment($order_detail["payment"]->id, $token);
        if ($is_paid_payment) {
            $this->load_model("PaymentModel")->paid_payment($order_detail["payment"]->id, $token, $type, $paymentId);

            $_SESSION["success"] = "Your ticket(s) has been booked. Kindly reach 30 mint before movie starts.";
            header("Location: " . URL . "movie/all");
            exit();
        } else {
            show_404();
        }

        echo true;
        exit();
    }

    public function verify_coupon_code()
    {
        $MovieModel = $this->load_model("MovieModel");

        $order_id = $_POST["order_id"];
        $movie_id = $_POST["movie_id"];
        $coupon_code = $_POST["coupon_code"];

        $movie = $MovieModel->get($movie_id);

        if ($MovieModel->has_coupon_code($movie_id)) {
            $coupon_code = $MovieModel->verify_coupon_code($movie_id, $coupon_code);
            if ($coupon_code != null) {
                $order_detail = $this->load_model("OrderModel")->get_detail($order_id);

                $grand_total = 0;
                foreach ($order_detail["tickets"] as $ticket) {
                    $grand_total += $order_detail["movie"]->price_per_ticket;
                }

                $discount = $grand_total * ($coupon_code->discount / 100);
                $discount_price = $grand_total - $discount;

                $this->load_model("OrderModel")->update_coupon_code($order_id, $coupon_code->id);

                echo $discount_price;
                exit();
            }
        }

        echo 0;
        exit();
    }

    public function order($id)
    {
        if ($this->user == null) {
            header("Location: " . URL);
            exit();
        }

        $order_detail = $this->load_model("OrderModel")->get_detail($id);

        $is_payment = $this->load_model("PaymentModel")->is_payment($order_detail["payment"]->id);

        $created_date = $order_detail["order"]->created_at;
        $createdDate = strtotime($created_date);
        $infivem = $createdDate + (60 * 5);
        $formatDate = date("Y-m-d H:i:s", $infivem);

        if ($is_payment) {
            show_404();
        } else {

            $movie = $this->load_model("MovieModel")->get_detail($order_detail["movie"]->id);

            if ($order_detail["order"]->user_id != $this->user->id) {
                header("Location: " . URL);
                exit();
            }

            /* stripe secret and publishable keys are in db.php */
            $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

            $grand_total = 0;
            foreach ($order_detail["tickets"] as $ticket) {
                if ($order_detail["coupon"] == null) {
                    $grand_total += $movie->movie->price_per_ticket;
                } else {
                    $discount = $movie->movie->price_per_ticket * ($order_detail["coupon"]->discount / 100);
                    $discount_price = $movie->movie->price_per_ticket - $discount;

                    $order_detail["movie"]->price_per_ticket = $discount_price;

                    $grand_total += $discount_price;
                }
            }

            $has_coupon_code_applied = ($order_detail["coupon"] != null);

            /* creating setup intent */
            $payment_intent = $stripe->paymentIntents->create([
                'payment_method_types' => ['card'],

                /* convert double to integer for stripe payment intent,
                    multiply by 100 is required for stripe */
                'amount' => round($grand_total) * 100,

                'currency' => 'usd',
            ]);

            require_once VIEW . "layout/header.php";
            require_once VIEW . 'payments/order.php';
            require_once VIEW . "layout/footer.php";
        }
    }

    public function history($page)
    {
        if ($this->user == null) {
            header("Location: " . URL);
            exit();
        }

        $per_page = 3;

        if ($page == "" || $page == 1) {
            $page_1 = 0;
        } else {
            $page_1 = ($page * $per_page) - $per_page;
        }

        $count = $this->load_model("OrderModel")->count_by_user($this->user->id);
        $count_order = ceil($count / $per_page);

        $orders = $this->load_model("OrderModel")->get_by_user($this->user->id, $page_1, $per_page);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        foreach ($orders as $order) {
            $created_date = $order["order"]->created_at;
            $formatDate = new DateTime($created_date);
            $formatDate->add(new DateInterval('P0DT0H5M0S'));
            $formatDate->format('Y-m-d H:i:s');
            $nowDate = new DateTime();
            $nowDate->format('Y-m-d H:i:s');

            if ($formatDate < $nowDate  && $order['payment']->status == "Pending") {
                $this->load_model("PaymentModel")->delete($order['payment']->id);
                foreach ($order["tickets"] as $ticket) {
                    $this->load_model("TicketModel")->delete_ticket($ticket['ticket']->id);
                }
                $this->load_model("OrderModel")->delete($order['order']->id);
            }
        }


        require_once VIEW . "layout/header.php";
        require_once VIEW . 'payments/history.php';
        require_once VIEW . "layout/footer.php";
    }

    public function expired()
    {
        $order_id = $_POST["order_id"];
        $order_detail = $this->load_model("OrderModel")->get_detail($order_id);
        if ($order_detail['payment']->status == "Pending") {
            $this->load_model("PaymentModel")->delete($order_detail['payment']->id);
            foreach ($order_detail["tickets"] as $ticket) {
                $this->load_model("TicketModel")->delete_ticket($ticket['ticket']->id);
            }
            $this->load_model("OrderModel")->delete($order_detail['order']->id);
            $_SESSION["error"] = "You did not pay your ticket in 5 minutes. Please try again later!";
        }
    }

    public function confirm_order($payment_id, $token)
    {
        Security::csrf_token();
        $error = "";
        $is_confirm_payment = $this->load_model("PaymentModel")->is_confirm_payment($payment_id, $token);
        if ($is_confirm_payment) {

            $this->load_model("PaymentModel")->confirm_payment($payment_id, $token);

            $_SESSION["success"] = "Your ticket(s) has been booked. Kindly reach 30 mint before movie starts.";
            header("Location: " . URL . "movie/all");
            exit();
        } else {
            show_404();
        }
    }
}
