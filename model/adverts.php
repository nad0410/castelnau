<?php
include_once 'database.php';

class adverts extends database {
    private $db;
    public $id = "";
    public $title = "";
    public $description = "";
    public $postal_code = "";
    public $city = "";
    public $type = "";
    public $price = "";
    public $reservation_message = "";
    
    public function __construct(){
        $db = database::getInstance();
        $this->db = $db->getDbh();
    }
    public function createAdvert(){
        $request = 'INSERT INTO adverts (id, title, description, postal_code, city, type,
                    price, reservation_message)
                    VALUES (:id, :title, :description, :postal_code, :city, :type, 
                    :price, :reservation_message)';
        $statement = $this->db->prepare($request);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $statement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $statement->bindValue(':postal_code', $this->postal_code, PDO::PARAM_STR);
        $statement->bindValue(':city', $this->city, PDO::PARAM_STR);
        $statement->bindValue(':type', $this->type, PDO::PARAM_STR);
        $statement->bindValue(':price', $this->price, PDO::PARAM_INT);
        $statement->bindValue(':reservation_message', $this->reservation_message, PDO::PARAM_STR);
        return $statement->execute();

    }
    public function getAdvert(){
        $sqlQuery = 'SELECT id, title, description, postal_code, city, type, price, reservation_message
                     FROM adverts';
        $statement = $this->db->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchall(PDO::FETCH_ASSOC);
   }
   public function getAdvertsById(){
    $sqlQuery = 'SELECT adverts.id as advertsId, title, description, postal_code, city, type, price, reservation_message
                FROM adverts';
    $statement = $this->db->prepare($sqlQuery);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}
public function updateAdverts(){
    $sqlQuery = 'UPDATE adverts SET title = :title, description = :description, postal_code = :postal_code, city = :city,
               type = :type, price = :price, reservation_message = :reservation_message WHERE id = :id';
    $statement = $this->db->prepare($sqlQuery);
    $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
    $statement->bindParam(':title', $this-> title, PDO::PARAM_STR);
    $statement->bindParam(':description', $this-> description, PDO::PARAM_STR);
    $statement->bindParam(':postal_code', $this-> postal_code, PDO::PARAM_STR);
    $statement->bindParam(':city', $this-> city, PDO::PARAM_STR);
    $statement->bindParam(':type', $this-> type, PDO::PARAM_STR);
    $statement->bindParam(':price', $this-> price, PDO::PARAM_INT);
    $statement->bindParam(':reservation_message', $this-> reservation_message, PDO::PARAM_STR);
    return $statement->execute();
    
}
}   
