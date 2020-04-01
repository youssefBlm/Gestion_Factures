<?php
class View {
  private $vars;
  public function construct(){}
  public function render($controllername,$viewname){
    if (isset($this->vars)){
      extract($this->vars);
    }
    include VIEWS.DS.'common'.DS.'header.php';
    include VIEWS.DS.'common'.DS.'navbar.php'; 
    echo '<body>';
    include VIEWS.DS.strtolower($controllername).DS.strtolower($viewname).'.php';
    include VIEWS.DS.'common'.DS.'bs_js.php';
    
    include VIEWS.DS.'common'.DS.'scripts.php'; 
  }
  public function setVar($key, $value = null){
    if (is_array($key)){
      $this->vars = $key;
    } else {
      $this->vars[$key] = $value;
    }
  }
}
?>