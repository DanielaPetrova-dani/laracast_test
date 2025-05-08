<?php

define('BASE_PATH', '/laracast_php');

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$uri = str_replace('/laracast_php', '', $uri); 

$routes= [
"/"=>"controllers/index.php",
"/about"=>"controllers/about.php",
"/contact"=>"controllers/contact.php",
"/notes"=>"controllers/notes.php",
];

function abort($code=404)
{
    http_response_code($code);
    require "view/{$code}.php";
    die();
}

function routesToController($uri,$routes){
if (array_key_exists($uri,$routes))
{
    require $routes[$uri];
}
else
{
    abort();
}
}

routesToController($uri,$routes);