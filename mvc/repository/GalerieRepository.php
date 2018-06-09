
<?php  

require_once '../lib/Repository.php';


class GalerieRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'galerie';


 public function create($username, $image)
    {
        
        $query = "INSERT INTO $this->tableName (benutzer, image) VALUES (?, ?)";
        $image = '/' . $image;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $image);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    /**
     * @param $image
     * @return string
     */
    public function imgToFolder($image)
    {
     $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
     $timestamp = time();
     $file_destination = "/images" . $timestamp . '.' . $ext;

     if (move_uploaded_file($image['tmp_name'], $file_destination)){
         echo $file_destination;
     }
     return $file_destination;
    }

}
?>