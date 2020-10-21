<?php  

class Template{

protected $template;
protected $vars = array();


public function __construct($template){

    $this->template = $template;

}

public function __get($key){
    return $this->vars[$key];
}

public function __set($key, $value){
    $this->vars[$key] = $value;
}

public function  __toString(){

    extract($this->vars);
    //Changes the current directory to the directory pass as argument
    chdir(dirname($this->template));
    
    ob_start();
    
    //Including the basename from the argument passed attaching the frontpage filename.
    include basename($this->template);

   return  ob_get_clean();

}


}

?>