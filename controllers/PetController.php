<?php
class PetController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function get_give_treat() {
    // Put your code for get_give_treat here, something like
    // 1. Load and validate parameters or form contents
    // 2. Query or update the database
    // 3. Render a template or redirect
    $this->view->renderTemplate(
      "views/PetGive_treat.php",
      array(
        'title' => 'PetGive_treat',
      )
    );
  }
}