<?php


Class Account extends Controller
{
   
    public function index()
    {
        $data['page_title'] = "Account";
        $this->view("my-account", $data);
     
              
    }
}