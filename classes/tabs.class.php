<?php

  class tabs {

    // function __construct() {}

    /* home tab! */
    function home_tab() {
      /* retrieves $info variable from collections() function */
      $info = $this->info;
      /* defines relevant variables according to retrieved data*/
      $name = $info[0]["Group_Name"];
      $overview = $info[0]["Overview"];
      $taxonomic = $info[0]["Taxonomic"];
      $geographic = $info[0]["Geographic"];
      $contributions = $info[0]["Contributions"];
      $imageURL = $info[0]["Group_Image_URL"];
      ?>
      <!-- html content for the 'home' tab -->
      <div class="container my-5">
        <div class="row">
          <div class="col-sm-12">
            <p><?php echo $overview; ?></p>
            </div>
        </div>
        <div class="row my-5">
          <div class="col-md-6">
            <h2>Taxonomic Coverage</h2>
            <p><?php echo $taxonomic; ?></p>
          </div>
          <div class="col-md-6">
            <h2>Geographic Coverage</h2>
            <p><?php echo $geographic; ?></p>
          </div>
        </div>
      </div>
      <?php
    }

    /* specimens tab! */
    function specimens_tab() {
      /* retrieves $info variable from collections() function */
      $specimens = $this->specimens;
      //dump specimens + relevant gallery info
      if (count($specimens) == 0) {
        echo '<h2 class="text-center py-5">Specimens coming soon!</h2>';
        return;
      }
      for ($i = 0; $i < count($specimens); $i++) {
        $specimenID = $specimens[$i]["Specimen_ID"];
        $collectedBy = $specimens[$i]["Full_Name"];
        $taxType = $specimens[$i]["Tax_Type"];
        $specificTax = $specimens[$i]["Tax_Name"];
        $lotNumber = $specimens[$i]["Lot_Number"];
        $areaName = $specimens[$i]["Area_Name"];
        $locDesc = $specimens[$i]["Location_Description"];
        $stProvAbbrev = $specimens[$i]["StProv_Abbrev"];
        $substrate = $specimens[$i]["Substrate"];
        $habitat = $specimens[$i]["Habitat"];
        $method = $specimens[$i]["Method"];
        $collDate = $specimens[$i]["Coll_Date"];
        $imageSmall = $specimens[$i]["Image_Small"];
        $imageLarge = $specimens[$i]["Image_Large"];
        $imageAlt = $specimens[$i]["Image_Alternate"];
        $readDate = date("M jS, Y", strtotime($collDate));

        if ($taxType == "Species"){
          // $parentName=Get_Tax_Name ($db, $specificTax);
          // $specificTax =  $parentName . " " . $specificTax;
        }
        if(($i % 4 == 0 || $i == count($specimens)) && $i!=0) { echo '</div>'; }
        if ($i % 4 == 0) { echo '<div class="row">'; }

        echo '<div class="col-md-3 col-xs-12">';
        echo '<ul class="list-group" style="max-width:300px">';
        echo '<a class="fancybox okzoom" href="' . $imageLarge . '">' . '<img class="img-responsive" alt="specimen photo" src="' . $imageSmall . '">' . '</a>';
        echo '<li class="list-group-item">' .'<b>'. 'Collector ' . '</b>' . $collectedBy . '</li>';
        echo '<li class="list-group-item">' .'<b>'. 'Collection date ' . '</b>' . $readDate . '</li>';
        echo '<li class="list-group-item">' . '<b>' . 'Identification ' . '</b>' . $specificTax . '</li>';
        echo '<li class="list-group-item">' .'<b>' . 'ID level ' . '</b>' . $taxType . '</li>';

        if ($locDesc != NULL){
          echo '<li class="list-group-item">' . '<b>' . 'Location ' . '</b>' . $locDesc . ', ' . $areaName . ' (' . $stProvAbbrev . ')' .  '</li>';
        }
        if ($habitat != NULL){
          echo '<li class="list-group-item">' .'<b>' . 'Location note ' . '</b>' . $substrate . ', ' . $habitat .  '</li>';
        }
        echo '<li class="list-group-item">' . '<b>' . 'Collection method ' . '</b>' . $method . '</li>';
        echo '</ul>';
        echo '</div>';
      }
    }

    /* notables tab! */
    function notables_tab() {
    }

    /* people tab! */
    function people_tab() {
      /* retrieves $info variable from collections() function */
      $people = $this->people;
      ?>
      <!-- html for people tab -->
      <?php
    }
  }
?>
