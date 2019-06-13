<?php
  include ("templates.class.php");
  /* the "main" class serves as the switchboard for changing views within the page */
  class main{
    /* the variable $page is passed to _construct() when the class is called from index.php */
    function __construct() {
      $templates = new templates();
      /* allows other functions in class "main" access to $templates */
      $this->templates = $templates;
    }

    function getView($page) {
      $templates = $this->templates;

      switch($page) {
        case "home":
          $templates->home();
          break;
        case "about":
          $templates->about();
          break;
        case "collections":
          $templates->collections($_GET["id"]);
          break;
        case "search":
          $templates->search();
          break;
        case "get-involved":
          $templates->getInvolved();
      }
    }
  }
?>
