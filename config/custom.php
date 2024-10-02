<?php
//config("custom.option1"); //returns true
//use Config Facade
//Config::set('custom.option1', false);
//Config::get('custom.option1'); //returns false


return [
    "option1" => true,
    "option2" => false,
];


//caching
//cli cmd =>  artisan config:cache
//cli cmd =>  artisan config:clear

//publish config to edit them => hashing etc.
//cli cmd =>  artisan config:publish
//cli cmd =>  artisan vendor:publish --provider="XXXX"
