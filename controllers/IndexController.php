<?php

class IndexController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  private static function build_validator() {
    $v = new FormValidator();
    $v->rule('required_field', 'required', 'Field is required');
    $v->rule('phone_field', 'phone', 'Not a valid phone number');
    $v->rule('email_field', 'email', 'Not a valid email address');
    $v->rule('integer_field', 'integer', 'Not a valid integer');
    $v->rule('float_field', 'float', 'Not a valid floating point number');
    $v->rule('money_field', 'money', 'Not a valid amount of money');
    $v->rule('password1_field', 'password', 'Not strong enough');
    $v->rule('password2_field', 'same[password]', 'Does not match');
    $v->rule('between_field', 'between[25,555]', 'Not between 25 and 555');
    return $v;
  }
  public function get_index() {
    $this->view->renderTemplate(
      "views/index.php",
      array(
        'title' => 'Home',
        'form' => [
          'required_field' => '',
          'phone_field' => '',
          'email_field' => '',
          'integer_field' => '',
          'float_field' => '',
          '' => '',
          '' => '',
          '' => '',
          '' => '',
        ],
      )
    );
  }
}
?>