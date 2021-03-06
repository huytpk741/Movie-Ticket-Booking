<?php

/**
 * CategoryModel
 */
class CategoryModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        $name = $_POST["name"];

        $sql = "INSERT INTO `categories`(`name`) VALUES ('" . $name . "')";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "success",
            "message" => "Category has been added"
        );
    }

    public function get_all()
    {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        $result = mysqli_query($this->connection, $sql);

        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function do_delete($category_id)
    {
        $sql = "DELETE FROM `categories` WHERE id = '" . $category_id . "'";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "error",
            "message" => "Category has been deleted"
        );
    }

    public function delete_movies($movie_id)
    {
        $sql = "DELETE FROM `movie_categories` WHERE movie_id = '" . $movie_id . "'";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "error",
            "message" => "Movies categories has been deleted"
        );
    }

    public function get($category_id)
    {
        $sql = "SELECT * FROM categories WHERE id = '" . $category_id . "'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_object($result);
        return $row;
    }

    public function edit($category_id)
    {
        $name = $_POST["name"];

        $sql = "UPDATE `categories` SET `name` = '" . $name . "' WHERE id = '" . $category_id . "'";
        mysqli_query($this->connection, $sql);

        return array(
            "status" => "success",
            "message" => "Category has been updated"
        );
    }

    public function search_by_category($value)
    {
        $sql = "SELECT * FROM movie_categories INNER JOIN categories ON movie_categories.category_id = categories.id WHERE categories.name LIKE '%" . $value . "%'";
        $result = mysqli_query($this->connection, $sql);

        $data = array();
        while ($category = mysqli_fetch_object($result)) {
            $sql = "SELECT * FROM movies WHERE id = '" . $category->movie_id . "'";
            $result_movie = mysqli_query($this->connection, $sql);
            while ($movie = mysqli_fetch_object($result_movie)) {
                $sql = "SELECT * FROM movie_thumbnails WHERE movie_id = '" . $movie->id . "' LIMIT 1";
                $result_thumbnails = mysqli_query($this->connection, $sql);
                if (mysqli_num_rows($result_thumbnails) > 0) {
                    $movie->picture = mysqli_fetch_object($result_thumbnails)->file_path;
                } else {
                    $movie->picture = "public/img/user-placeholder.png";
                }
                array_push($data, $movie);
            }
        }
        return $data;
    }
}
