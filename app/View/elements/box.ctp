<?php

/* Set up new view that won't enter the ClassRegistry */
$view = new View($this, false);
$view->set('text', 'Hello World');
$view->viewPath = 'elements';
 
/* Grab output into variable without the view actually outputting! */
$view_output = $view->render('box');

?>