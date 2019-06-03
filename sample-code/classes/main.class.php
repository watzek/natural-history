<?php
include ("templates.class.php");


/* the "main" class is sort of the switchboard for changing views within the page.
It relies on the templates class (in templates.class.php) for

*/

class main{


  /* This is a PHP convention - the __construct function gets run every time the class is initiated    */

  /* The variable $state is passed to it when the class is called from index.php */
  function __construct(){

    /**/
    $templates=new templates();
    $this->templates=$templates;

  }

  function getView($state){

    $templates=$this->templates;

    switch($state){

      case "home":
      $templates->home();
      break;

      case "about":
      $templates->about();
      break;

      case "collection":
      $templates->collection($_GET["collectionID"]);
      break;

    }





  }




}

?>
