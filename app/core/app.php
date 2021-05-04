<?php

Class App
{
    //default controller and method, protected so for only in this class
    protected $controller = "home";
    //see controllers/home 
    protected $method = "index";
    protected $params;
    
    //returns once with instantiating
    public function __construct()
    {
        $url = $this->parseURL();
        //see functions
        //show($url);
        
        // search for file in first [0] of url array
        if(file_exists("../app/controllers/" . strtolower($url[0]) . ".php" ))
        {
            //if exest replace default controller (home) to that specific controller
            $this->controller = strtolower($url[0]);
            // not sure  destroy the variable inside of the function 1time
            unset($url[0]);

        }
        //get the controller from the folder and instantiate it!! dynamic variables
        require "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // if method is found as second part of url set new method then unset its value
        if(isset($url[1]))
        {
                $url[1] = strtolower($url[1]);
                if(method_exists($this->controller, $url[1]))
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }
        }
        //see if params in url are not empty
        // set them to params value else go to home array
        $this->params = (count($url) > 0) ? $url : ["home"]; 
        // array_values create an new array  and get al the values of one array and forget the keys so it start from 0 again
        //show(array_values($url));

        //run the function index in controller/home 
        call_user_func_array([$this->controller, $this->method], $this->params); 
    }
    
    private function parseURL()
    {
        //if users types your base url it will get an error therefore the isset statement 
        //if url is set assign $url(1st value) to $_GET['url'] (=3th param) to url ifnot set it to home
        // $url is fixed in php 
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
       // above line of code is not safe therefore explode it and sanitaze it
       // explode: first param is the separator vb: / of " " 
       //2th param name of value u want to split into an array
       //trim remove white spaces or characters from beginning and end of a sting,  1st param: string that wil be trimmed, 2th param character you like to trim
       //filter_var filters variable with a specific filter 1param the variable, 2param the used filter
       //FILTER-SANITZE_URL removes all illegal URL characters from a string ($-_.+!*'(),{}|\\^~[]`"><#%;/?:@&= =is allowed)
        return explode( "/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));


       


    }
    
}