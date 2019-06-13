<?php
  class mysql{

    function __construct(){
      /* config.php includes variables for $server, $dbname, $user, $password,
      but is on .gitignore so the info isn't in the repo     */
      include("includes/config.php");
      try {
        $db = new PDO("mysql:host=$server; dbname=$dbname", $user, $password);
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
      /* makes connection available to other functions in "mysql" class  */
      $this->db = $db;
    }

    /* get info from Tax_Groups */
    function getCollectionInfo($collectionID) {
      /* get db connection */
      $db = $this->db;
      try {
        $stmt = $db->prepare("SELECT * FROM Tax_Group WHERE TaxGroup_ID=:id");
        $stmt->execute(array(":id"=>$collectionID));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        echo $e;
      }
      return $rows;
    }

    /* get info from People, Taxonomy_Nested, Collection_Event, State_Province, Coll_Method*/
    function getSpecimens($collectionID) {
      /* get db connection */
      $db = $this->db;
      try {
  			$stmt = $db->prepare(
          "SELECT * FROM watzekdi_naturalHistory.Specimen, People, Taxonomy_Nested, Collection_Event, State_Province, Coll_Method
          WHERE Specimen.TaxGroup_ID=:id
          AND Specimen.Collected_By=People.Person_ID
          AND Specimen.Tax_Name = Taxonomy_Nested.Tax_Name
          And Specimen.Lot_Number = Collection_Event.Lot_Number
          AND Collection_Event.State_ID = State_Province.StProv_ID
          AND Collection_Event.Collection_Method = Coll_Method.Method_ID"
        );
  			$stmt->execute(array(":id"=>$collectionID));
  			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  		} catch(Exception $e) {
  			echo $e;
  		}
      return $rows;
    }

    /* get info from */
    function getPeople($collectionID) {
      /* get db connection */
      $db = $this->db;
      try {
  			$stmt = $db->prepare(
          "SELECT * FROM People, Institution, People_Tax_Group
          WHERE People_Tax_Group.Tax_Group_ID=:id
          AND People.Institution = Institution.Institution_ID
          AND People.Person_ID = People_Tax_Group.People_ID
          ORDER BY Last_Name ASC"
        );
  			$stmt->execute(array(":id"=>$collectionID));
  			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  		} catch (Exception $e) {
  			echo $e;
  		}
      return $rows;
    }

    /* search database, if there's time */
    function search() {}
  }
?>
