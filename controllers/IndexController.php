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
    $v->rule('password2_field', 'same[password1_field]', 'Does not match');
    $v->rule('between_field', 'between[25,555]', 'Not between 25 and 555');
    return $v;
  }
  public function get_index() {
    $this->view->renderTemplate(
      "views/index.php",
      array(
        'title' => 'Form validation',
        'form' => [
          'required_field' => '',
          'phone_field' => '555-555-555',
          'email_field' => 'foo@bar',
          'integer_field' => '3.14',
          'float_field' => '6.023E23a',
          'money_field' => '$5.0',
          'password1_field' => 'too_weak',
          'password2_field' => 'also_too_weak',
          'between_field' => '20',
        ],
      )
    );
  }

  public function post_index() {
    $form = safeParam($_POST, 'form');
    $form_validator = $this->build_validator();
    $errors = $form_validator->get_errors($form);
    if (!$errors) {
      $this->view->flash("Form validated!");
    }
    $this->view->renderTemplate(
      "views/index.php",
      array(
        'title' => 'Form validation',
        'form' => $form,
        'errors' => $errors,
      )
    );
  }
}
?>