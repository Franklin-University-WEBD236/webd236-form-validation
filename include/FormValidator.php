<?php
class FormValidator {
  private $validator;
  private $rules;
  
  /**
   * Automate form validation. Create the rules, pass in the form
   * and get back all the errors.
   */
  public function __construct() {
    $this->validator = new Validator();
    $this->rules = [];
  }
  
  /**
   * Allows you to add a validation rule for a form.
   *  param $field: the field name (key) in the form to validate
   *  param $func: a function in Validator.php that validates the field.
   *    options are required, phone, email, integer, float, money, password,
   *    between[low,high], same[otherFieldName]
   */
  public function rule($field, $func, $message=false) {
    $this->rules[] = [
      'field' => $field,
      'func' => $func,
      'message' => $message,
    ];
  }
  
  /**
   * Checks a form parameter (an associative array of key fields and values)
   * for validity based on the rules added.
   */
  public function get_errors($form) {
    foreach ($this->rules as $rule) {
      $extra_params = [];
      // get field, func, and message from each rule
      extract($rule);
      
      // is it a rule with extra parameters (e.g. between or same)
      if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[(.*)\]$/m', $func, $matches)) {
        $func = $matches[1];
        $extra_params = explode(",", $matches[2]);
      }
      if (!method_exists($this->validator, $func)) {
        die("Unknown form validation rule $func.");
      }
      if (!isset($form[$field])) {
        die("No field $field in form.");
      }
      
      // build the array of parameters to the function in Validator.php
      $params = [$field, $form[$field]];
      
      // if the extra params are keys in the form, use their values
      // otherwise just use the parameter as the value
      foreach ($extra_params as $param) {
        if (isset($form[$param])) {
          $params[] = $form[$param];
        } else {
          $params[] = $param;
        }
      }
      $params[] = $message;

      call_user_func_array(array($this->validator, $func), $params);
    }
    
    return $this->validator->allErrors();
  }
}