<?php
class  MY_Form_validation extends CI_Form_validation {
  public function __construct()
  {
    parent::__construct();
  }

   /**
   * 独自バリデーション(必須でない、数値)
   */
  public function empty_numeric($str){

    if(empty($str)) {
      return true;

    }

    return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
  }
}
?>