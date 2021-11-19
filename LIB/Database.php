<?php 
class Database{
private $host = DB_HOST;
private $user = DB_USER;
private $pass = DB_PASS;
private $dbname = DB_NAME;

private $dbh;
private $error;
private $stmt; 

function __construct(){
   $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

   $options = array(
       PDO::ATTR_PERSISTENT => TRUE,
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   );

   try{

    $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
 
   } catch (PDOException $e){
      $this->error = $e->getMessage(); 
   }

}

public function query($query){
    $this->stmt = $this->dbh->prepare($query);
}

public function bind($parram, $value, $type = null){

        if(is_null($type)){
            switch(true){
            case is_int( $value ) : $type = PDO::PARAM_INT;
            break;
            case is_bool( $value ) : $type = PDO::PARAM_BOOL;
            break;
            case is_null( $value ) : $type = PDO::PARAM_NULL;
            break;
            default : $type = PDO::PARAM_STR;
            }
}

$this->stmt->bindValue($parram, $value, $type);

}

public function execute(){
    return $this->stmt->execute();
}

public function getResult(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
}

public function fetchSingle(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
}

}

?>