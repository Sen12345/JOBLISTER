<?php  
/**
 *  @author Sean Wragg <seanwragg@gmail.com>
 *  @version 1.0 template.class.php
 */

class Template {  
  protected $file; 
  public $values;

  // attempt to locate file upon instantiation
  function __construct( $file ) {
    if (!file_exists( $file )) die('unable to locate file');
    $this->file = $file;
  }

  // arg must be an array
  public function set( $values ) {
    foreach( $values as $key => $value ) {
        $this->values[$key] = $value;
    }
  }

  // render's html with keys replaced
  public function renderHTML() {
    $contents = file_get_contents( $this->file );
    foreach( $this->values as $key => $value ) {
        $contents = str_replace('[@'. $key .']', $value, $contents); 
    }
    echo $contents;
  }
}

// file: example.php
include 'template.class.php';  
$template = new Template('example.html');

$args = array(
  'WOULD' => 'would be', 
  'EXAMPLE' => 'an awesome <i>example</i>'
);

$template->set($args);
$template->renderHTML();
