
<?php
class AjaxController extends AppController {
   var $name = 'Ajax';
   var $uses = NULL;

   public function helloAjax()
   {
       $this->layout='ajax';
       // result can be anything coming from $this->data
	   
       $result =  $this->request->data;
	   die(debug($result));
       $this->set("result", $result);
   }
}

?>