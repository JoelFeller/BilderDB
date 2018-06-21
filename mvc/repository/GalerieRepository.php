
<?php  

require_once '../lib/Repository.php';


class GalerieRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'galerie';


 public function create($benutzer, $galeriename, $privacy)
    {

        $query = "INSERT INTO $this->tableName (benutzer, galeriename, privacy) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $benutzer, $galeriename, $privacy);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

}
?>