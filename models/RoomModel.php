<?php

/**
 * RoomModel
 */
class RoomModel extends Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    /**
     * $movie_cinema_id this will be the unique auto increment ID
    */
    public function get_movie_room($movie_cinema_id)
    {
        $sql = "SELECT * FROM movie_cinemas WHERE id = '" . $movie_cinema_id . "'";
        $result = mysqli_query($this->connection, $sql);

        return mysqli_fetch_object($result);
    }

    public function add()
    {
        $name = $_POST["name"];

        $sql = "INSERT INTO `rooms`(`name`) VALUES ('" . $name . "')";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "success",
            "message" => "Room has been added"
        );
    }

    public function get_all()
    {
        $sql = "SELECT * FROM rooms ORDER BY name ASC";
        $result = mysqli_query($this->connection, $sql);

        $data = array();
        while ($row = mysqli_fetch_object($result))
        {
            array_push($data, $row);
        }
        return $data;
    }

    public function do_delete($room_id)
    {
        $sql = "DELETE FROM `rooms` WHERE id = '" . $room_id . "'";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "error",
            "message" => "Room has been deleted"
        );
    }

    public function get($room_id)
    {
        $sql = "SELECT * FROM rooms WHERE id = '" . $room_id . "'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_object($result);
        return $row;
    }

    public function edit($room_id)
    {
        $name = $_POST["name"];

        $sql = "UPDATE `rooms` SET `name` = '" . $name . "' WHERE id = '" . $room_id . "'";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "success",
            "message" => "Room has been updated"
        );
    }
}