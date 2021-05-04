<?php

Class Newsletter extends Controller
{
    
    public function index()
    {
        
               
        if($_SERVER['REQUEST_METHOD'] == "POST")   
        {
         

            $user = $this->load_model("User");
            $user->subscribe($_POST);
        } 
        $data['page_title'] ="footer";
        $this->view("footer", $data);
     
    }
}