<?php

class mysql{

  function __construct(){

    /* mysql connection should go here */

    /* this includes variables for $server, $dbname, $user, $password  */
    /* config.php is on .gitignore so the info isn't in the repo     */
    include("config.php");



    try {
      $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    /* makes connection available to other functions in class  */
    $this->db=$db;

  }

  function getCollectionInfo($collectionID){
    /* get db connection */
    $db=$this->db;

    try {
      $stmt = $db->prepare("select * from collections where id=:id");
      $stmt->execute(array(":id"=>$collectionID));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $e) {

      echo $e;
    }
    return $rows;

  }






}



?>
