<?php

include ("mysql.class.php");

class templates{

  function __construct(){
    /* instantiates the mysql class  */
    $mysql=new mysql();

    /* makes the mysql class so it can be retrieved by other functions in this class */
    $this->mysql=$mysql;

  }

  /* the home page!  */
  function home(){

    ?>
      <h2>it's home!</h2>



    <?php

  }


  /* the about page! */
  function about(){

    ?>

      <p>about the project!</p>
      <p>blah blah more html</p>

    <?php
  }


  /* the collection page  */
  function collection($collectionID){

    /*  this retrieves $mysql from the contruct funtion, so we can use it   */
    $mysql=$this->mysql;

    $info=$mysql->getCollectionInfo($collectionID);

    $name=$info[0]["name"];

    ?>
    <h3><?=$name ?></h3>

    <?php

  }





}



 ?>
