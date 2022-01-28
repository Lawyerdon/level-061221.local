<?php

class Storage//считывает все статьи и работает с ними
{
    const FILE = 'storage.json';
    public $articles = [];
    public $id;
    public function __construct()
    {
        $this->load();//загрузка файла на моменте создания
    }
    public function addArticle($article){//добавление статьи и записывает в массив и сохраняет
        $this->articles[]=$article;
        $this->save();
    }
    private function save(){//преобразовывает в джейсон и записывает его в константу FILE
        $json = json_encode($this->articles);
        file_put_contents(self::FILE,$json);
    }
    private function load(){//получаем из джейсона и возвращаем в ассоциативный массив
        // в том случае, если есть файл
        if (file_exists(self::FILE)){
            $json = file_get_contents(self::FILE);
            $this->articles = json_decode($json,true);
        }
    }
    public function deleteById($id){//удаляем статью по АЙДИ
        unset($this->articles[$id]);
        $this->articles = array_values($this->articles);
        $this->save();
    }
    public function editArticle($id,$title){
        $this->articles[$id] = ['title' => $title];
        $this->articles = array_values($this->articles);
        $this->save();
      }
}