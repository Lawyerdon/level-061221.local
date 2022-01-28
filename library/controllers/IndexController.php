<?php
namespace controllers;
use View;
use Storage;
use Route;
class IndexController
{
    /**
     * @var View
     */
    private $view;
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(){
        $this->storage = new Storage();
        $this->view = new View('default');
    }
    public function index(){
        $this->view->render('index', ['articles' => $this->storage->articles]);
    }
    public function create(){
        $this->view->render('create');
    }
    public function store(){
        $title = filter_input(INPUT_POST, 'title');
        //TODO validator
        $this->storage->addArticle(['title' => $title]);
        Route::redirect(Route::url('index', 'index'));
    }
    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        $this->storage->deleteById($id);
        Route::redirect(Route::url('index', 'index'));
    }
    //=======================================================================
    public function edit(){
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $this->view->render('edit',[ 'id' => $id, 'title' => $title,]);
    }
    public function save(){
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $this->storage->editArticle($id,$title);
        Route::redirect(Route::url('index', 'index'));
    }
    //=======================================================================
}