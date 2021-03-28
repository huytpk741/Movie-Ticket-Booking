<?php

/**
 * PaymentModel
 */
class PaymentModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function payment_successfull()
    {
        $type = $_POST["type"];
        $order_id = $_POST["order_id"];

        $sql = "INSERT INTO `payments`(`order_id`, `type`, `is_confirm`) VALUES ('" . $order_id . "', '" . $type . ", 'Pending')";
        mysqli_query($this->connection, $sql);
    }

    public function create_for_CIH($order_id, $token)
    {
        $sql = "INSERT INTO `payments`(`order_id`, `type`, `status`, `is_confirm`) VALUES ('" . $order_id . "', 'Cash in Hand', 'Pending', '$token')";
        mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

        return mysqli_insert_id($this->connection);
    }

    public function create_for_online($order_id, $token)
    {
        $sql = "INSERT INTO `payments`(`order_id`, `type`, `status`, `is_confirm`) VALUES ('" . $order_id . "', 'Online Payment', 'Pending', '$token')";
        mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

        return mysqli_insert_id($this->connection);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM payments WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($result) == 0) {
            return null;
        }

        return mysqli_fetch_object($result);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM payments WHERE id = '" . $id . "'";
        mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
    }

    public function get_by_order($order_id)
    {
        $sql = "SELECT * FROM payments WHERE order_id = $order_id";
        $result = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($result) == 0) {
            return null;
        }

        return mysqli_fetch_object($result);
    }

    public function get_order_by_payment($payment_id)
    {
        $sql = "SELECT * FROM payments INNER JOIN orders ON payments.order_id = orders.id WHERE id = {$payment_id}";
        $result = mysqli_query($this->connection, $sql);

        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function is_confirm_payment($payment_id, $token)
    {
        $sql = "SELECT * FROM `payments` WHERE id = '$payment_id' AND is_confirm = '$token'";
        $result = mysqli_query($this->connection, $sql);

        return mysqli_num_rows($result) > 0;
    }

    public function is_paid_payment($payment_id, $token)
    {
        $sql = "SELECT * FROM `payments` WHERE id = '$payment_id' AND is_confirm = '$token'";
        $result = mysqli_query($this->connection, $sql);

        return mysqli_num_rows($result) > 0;
    }

    public function is_payment($payment_id)
    {
        $sql = "SELECT * FROM `payments` WHERE id = '$payment_id' AND (status = 'Paid' OR status = 'Confirmed')";
        $result = mysqli_query($this->connection, $sql);

        return mysqli_num_rows($result) > 0;
    }

    public function confirm_payment($payment_id, $token)
    {
        $sql = "UPDATE `payments` SET status = 'Confirmed', is_confirm = NULL WHERE id = '$payment_id' AND is_confirm = '$token'";
        mysqli_query($this->connection, $sql);
    }

    public function paid_payment($payment_id, $token, $type, $paymentId)
    {
        $sql = "UPDATE `payments` SET type = '$type', status = 'Paid', is_confirm = NULL, payment_id = '$paymentId' WHERE id = '$payment_id' AND is_confirm = '$token'";
        mysqli_query($this->connection, $sql);
    }
}
