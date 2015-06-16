<?php
/**
 * Created by PhpStorm.
 * User: yourfather
 * Date: 2015/6/16
 * Time: 21:27
 */
namespace Blog\Model;

class Article{

    public $id;

    public $title;

    public $content;

    public $category;

    public $author;

    public $update_time;

    public $create_time;

    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
        $this->content = (!empty($data['content'])) ? $data['content'] : null;
        $this->category = (!empty($data['category'])) ? $data['category'] : null;
        $this->author = (!empty($data['author'])) ? $data['author'] : null;
        $this->update_time = (!empty($data['update_time'])) ? $data['update_time'] : null;
        $this->create_time = (!empty($data['create_time'])) ? $data['create_time'] : null;
    }
}