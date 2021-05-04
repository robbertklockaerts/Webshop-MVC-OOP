<?php

//making sure you only make one instance for the db con
Class Database 
{
   
    public static $con;

    public function __construct()
    {
        try{

            $string= DB_TYPE . ":host=" .DB_HOST . ";dbname=" . DB_NAME;
            self::$con = new PDO($string,DB_USER,DB_PASS);

        }catch (PDOException $e) {
            die($e->getMessage());

        }
       
    }



    //instantiating the class from within the class itself
    public static function getInstance()
    {
        
       if(self::$con) 
       {
        return self::$con;

        }

        return $instance = new self();
       
    }

    
 	public static function newInstance()
     {
         return $instance = new self();
      }

      
 
    //read and write from db
    public function read($query,$data = array())
    {
        $stm = self::$con->prepare($query);
        $result = $stm->execute($data);
        
        if($result) {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            //fetch the data coming back as an empty array + count how many items inside the array it should be bigger then 0
            if(is_array($data) && count($data) > 0)
            {
            return $data;
            }
        }
        return false;
    }
    

    public function write($query,$data = array())
    {
        $stm = self::$con->prepare($query);
        $result = $stm->execute($data);
        
        
        if($result) {
           
            return $data;
            }
        
        return false;
    }

}



/*
//show pdo array
$db = Database::getInstance();
show($db);

//understanding static properties
Class Database 
{
    //number stays in the original class when instantiated it will change 
    public static $number = 4;

    public function __construct()
    {
        //accessing a variable that is inside the original class
        //adds to the static value number
       self::$number++;
    }


}

$db = new Database();
echo $db::$number;

echo "<br>";


$db = new Database();
echo $db::$number;

echo "<br>";
$db = new Database();
echo $db::$number;

GIVES 5 - 6 -7   keeps adding up 

Class Database 
{

    public $number = 4;

    public function __construct()
    {
        $this->number++;
    }


}

$db = new Database();
echo $db->number;

echo "<br>";


$db = new Database();
echo $db->number;

// gives to times 5  so it creates two objects
//#12
//instanze repeating itself 
*/