<?php

Class user
{
    private $error = "";



 
    public function signup($POST)
    {
        $data = array();
        $db = Database::getInstance();


        $data['firstname'] = trim($POST['firstname']);
        $data['lastname'] = trim($POST['lastname']);
        $data['email'] = trim($POST['email']);
        $data['pw'] = trim($POST['pw']);
        $confirm = trim($POST['confirm']);

        //preg_match return true or false 1param condition 2param checked value / filter_var easier way 
        if (empty($data['email']) || (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)))
        {
            $this->error .= "Please enter a valid email <br>";
        }
        if (empty($data['firstname']) || !preg_match("/^[a-zA-Z_-]+$/", $data['firstname']))
        {
            $this->error .= "Please enter a valid firstname <br>";
        }
        if (empty($data['lastname']) || !preg_match("/^[a-zA-Z_-]+$/", $data['lastname']))
        {
            $this->error .= "Please enter a valid lastname <br>";
        }
        //tip for safety of password you can add a regex do make it more safe
        if(  $data['pw'] !== $confirm)
        {
            $this->error .= "Passwords do not match <br>";
        }
        if( strlen( $data['pw']) < 6)
        {
            $this->error .= "Password must be at least 6 characters long<br>";
        }

        //check if email already exists
        $sql = "select * from users where user_mail = :email limit 1";
        $arr['email']= $data['email'];
        $check = $db->read($sql,$arr);
        if(is_array($check)){
            $this->error .= "Email address is already in use <br>";
        }

   
        if($this->error == "")
        {
            /* Save into the db

            *   optional values when added to db 
            *   unique url for user see functions $url_address = get_random_string_max(60);
            *   $date = date ("Y-m-d H:i:s");
            */
            $data['pw'] = hash('sha1',$data['pw']);

            $query = "insert into users (user_firstname, user_lastname, user_mail, user_pw) values (:firstname, :lastname, :email, :pw)";
           
            $result= $db->write($query, $data);

            if($result){
                 header("Location:" . ROOT . "login");
                 die;
            }

        }

        $_SESSION['error'] = $this->error; 


    }

    public function login($POST)
    {
        
        $data = array();
        $db = Database::getInstance();

       
        $data['email'] = trim($POST['email']);
        $data['pw'] = trim($POST['pw']);
       

        //preg_match return true or false 1param condition 2param checked value / filter_var easier way 
        if (empty($data['email']) || (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)))
        {
            $this->error .= "Please enter a valid email <br>";
        }
      

       
        if($this->error == "")
        {
         //confirm

            $data['pw'] = hash('sha1',$data['pw']);

                //check if email already exists
            $sql = "select * from users where user_mail = :email && user_pw = :pw limit 1";
            $arr['email']= $data['email'];
            $result = $db->read($sql,$data);
            if(is_array($result)){


               $_SESSION['user_id'] =  $result[0]->user_id;
                header("Location:" . ROOT . "home");
                die;
            }

            $this->error .= "Wrong email or password";
    
          
        }

        $_SESSION['error'] = $this->error; 


        
    }
    
    public function check_login()
    {
       // $_SESSION['user_firstname'] = $firstname;
        
        if(isset($_SESSION['user_id']))
        {
            $arr['id'] = $_SESSION['user_id'];
            
        
            $query = "select * from users where user_id = :id limit 1";
            $db = Database::getInstance();
            $result = $db->read($query,$arr);
            if(is_array($result))
            {
                return $result[0];
            }
        }

        return false;
    }

    
    public function logout()
    {
        if(isset($_SESSION['user_id']))
        {
        unset($_SESSION['user_id']);
        }
        
        
        header("Location:" . ROOT . "login");
        die;
        
    }
    
    public function subscribe($POST)
    {
        $data = array();     
        $db = Database::newInstance();
        $data['mail'] = $POST['mail'];
        if (empty($data['mail']) || (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)))
        {
            $this->error .= "Please enter a valid email <br>";
        }
        if($this->error == "")
        {
        $query = "insert into newsletter (mail) values (:mail)";
        $db->write($query, $data);
        }  
        $_SESSION['error'] = $this->error; 
    
    }
            
    
      
}