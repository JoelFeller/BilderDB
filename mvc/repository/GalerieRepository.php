
<?php  

require_once '../lib/Repository.php';


class GalerieRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'galerie';


 public function create($benutzer, $galeriename, $privacy){

        $query = "INSERT INTO $this->tableName (benutzer, galeriename, privacy) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $benutzer, $galeriename, $privacy);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function updateById($galeriename, $privacy, $id){

        if($galeriename != null){
            $query = "UPDATE {$this->tableName} SET username = ? WHERE id = ?";
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement-> bind_param('si', $galeriename, $id);

            if(!$statement->execute())
            {
                throw new Exception($statement->error);
            }

        }


        if($privacy != null){
            $privacyquery = "UPDATE {$this->tableName} SET privacy = ? WHERE id = ?";
            $statement = ConnectionHandler::getConnection()->prepare($privacyquery);
            $statement-> bind_param('si', $privacy, $id);

            if(!$statement->execute())
            {
                throw new Exception($statement->error);
            }

        }
    }

}
?>