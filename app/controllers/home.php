<?php

//default controller

Class Home extends Controller
{
    //here you catch the params in index() url 3 / 4 /.. depending on requested params in index(..) best to assign them empty to keep them optional
    public function index()
    {
        
        $User = $this->load_model('User');
        $user_data = $User->check_login();
 
        if(is_object($user_data))
        {
          $data['user_data'] = $user_data;
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST")   
        {
         
           $User->subscribe($_POST);
        } 
        // give a specific name for every page by passing the $data value will also come in handy for db passing
        $data['page_title'] ="Home";
        $this->view("index", $data);
       // $this->view("home");
       // $this->view("login");

        
    }
}