<?php
class PostsController extends AppController {
    var $name = 'Posts';
 
    function import() {
        $messages = $this->Post->import('posts.csv');
       // debug($messages);
    }
}
?>