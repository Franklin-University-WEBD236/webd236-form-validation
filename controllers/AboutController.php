<?php
class AboutController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function get_index() {
    // Put your code for get_index here, something like
    // 1. Load and validate parameters or form contents
    // 2. Query or update the database
    // 3. Render a template or redirect
    $this->view->renderTemplate(
      "views/AboutUs.php",
      array(
        'title' => 'About Us',
      )
    );
  }
}