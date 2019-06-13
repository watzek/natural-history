<?php
  include ("mysql.class.php");
  include ("tabs.class.php");

  class templates extends tabs {
    function __construct() {
      /* instantiates the mysql class  */
      $mysql = new mysql();
      /* makes the mysql class accesible to other functions in this class */
      $this->mysql = $mysql;
    }

    /* the home page!  */
    function home(){
      ?>

        <div class="container-fluid py-5" id="title-panel">
          <div class="container text-right text-white my-5">
            <h3 class="">LEWIS AND CLARK COLLEGE</h3>
            <h1 class="pb-5">Natural History Collection</h1>
            <button class="btn btn-light">Search Collections</button>
          </div>
        </div>

      <?php
    }

    /* the about page! */
    function about(){
      ?>
      <!-- html for the "about" page -->
      <?php
    }

    /* the collection page!  */
    function collections($collectionID) {
        /* retrieves $mysql from the contruct funtion */
        $mysql = $this->mysql;
        /* gets basic info from Tax_Groups by calling getCollectionInfo() from mysql class */
        $info = $mysql->getCollectionInfo($collectionID);
        $this->info = $info;
        /* gets specimens info by calling getSpecimens() from mysql class */
        $specimens = $mysql->getSpecimens($collectionID);
        $this->specimens = $specimens;
        /* gets people info by calling getPeople() from mysql class */
        $people = $mysql->getPeople($collectionID);
        $this->people = $people;
        /* retrieves image URL from database */
        $imageURL = $info[0]["Group_Image_URL"];
      ?>
      <!-- html for the "collection" page -->
      <?php echo '<img class="img-fluid" src="' . $imageURL . '">'; ?>

      <!-- navigation bar with home/specimens/notables/people/info tabs, requires "tab.js" -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="specimens-tab" data-toggle="tab" href="#specimens" role="tab" aria-controls="specimens" aria-selected="false">Specimens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="notables-tab" data-toggle="tab" href="#notables" role="tab" aria-controls="notables" aria-selected="false">Notables</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="people-tab" data-toggle="tab" href="#people" role="tab" aria-controls="people" aria-selected="false">People</a>
        </li>
      </ul>

      <!-- tab content -->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
          <!-- retrieves content for "home" tab from "tabs" class -->
          <?php $this->home_tab(); ?>
        </div>
        <div class="tab-pane fade" id="specimens" role="tabpanel" aria-labelledby="specimens-tab">
          <!-- retrieves content for "specimens" tab from "tabs" class -->
           <?php $this->specimens_tab(); ?>
        </div>
        <div class="tab-pane fade" id="notables" role="tabpanel" aria-labelledby="notables-tab">
          <!-- retrieves content for "notables" tab from "tabs" class -->
          <?php $this->notables_tab(); ?>
        </div>
        <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="people-tab">
          <!-- retrieves content for "people" tab from "tabs" class -->
          <?php $this->people_tab(); ?>
        </div>
      </div>
      <?php
    }

    /* the search page! */
    function search() {
      ?>
      <!-- html for the "search" page -->
      <?php
    }

    /* the get involved page! */
    function getInvolved() {
      ?>
      <!-- html for the "get involved" page -->
      <?php
    }
  }
?>
