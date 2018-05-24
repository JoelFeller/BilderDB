
<?php  

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ReviewRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'review';


 public function create($marke, $modell, $review, $image)
    {
        
        $query = "INSERT INTO $this->tableName (marke, modell, review, image) VALUES (?, ?, ?, ?)";
        $image = '/' . $image;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $marke, $modell, $review,$image);

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