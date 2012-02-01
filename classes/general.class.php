<?php
class General {
    private $conn;

    function __construct() {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
        die('There was a problem connecting to the database.');
    }
    // end contructor
    function getTours() {
        $arr = array();
        $q = 'SELECT id, tour_name, tour_price, tour_location, tour_date, tour_description, tour_link, tour_image, tour_type FROM tours WHERE online = 1 AND tour_date >= NOW() ORDER BY tour_date ASC';
        if ($stmt = $this->conn->prepare($q)) {
            $stmt->bind_result($id, $name, $price, $location, $date, $description, $link, $image, $type);
            $stmt->execute();
            while ($stmt->fetch()) {
                $arr[] = array('id'=>$id, 'name'=>$name, 'price'=>$price, 'location'=>$location, 'date'=>$date, 'description'=>$description, 'link'=>$link, 'image'=>$image, 'type'>$type);
            }
            return $arr;
        } else return $this->conn->error;
    }

}
