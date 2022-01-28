<?php

spl_autoload_register(function ($className){
    $className = str_replace('\\',DIRECTORY_SEPARATOR,$className);
    $classFile = 'library'.DIRECTORY_SEPARATOR.$className.'.php';
    if (file_exists($classFile)){
        include_once $classFile;
        return true;
    }
    return false;
});


//$storage = new Storage();
//$storage->addArticle(['title'=>'test']);

//$view = new View('default');
//$storage = new Storage();
//$view->render('index',['articles'=>$storage->articles]);

//$URIs = explode('/',$_SERVER['REQUEST_URI']);
//array_shift($URIs);

Route::init();