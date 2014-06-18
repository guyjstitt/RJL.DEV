<!doctype html>

  <head>

<script src="http://136.165.68.167/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="http://136.165.68.167/rjl/app/webroot/js/chosen.jquery.js"></script>

<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/chosen.css">

  

<script>


$(document).ready(function() { 
   $('.chosen-select').chosen();
      $("#Inputfield_code").chained("#Inputfield_date");
      $("#Inputfield_code").trigger("chosen:change");
				
      $("#Inputfield_date").on("change", function(){
        $("#Inputfield_code").trigger("chosen:change")
      });
}); 
</script>
	

</head>
  
  <?php echo $this->Form->input('test', array('type'=>'select','class'=>'chosen-select')); ?>
  
  <body>
    <div class="holder">
      <label for="Inputfield_date">Date:</label>
      <select id="Inputfield_date" data-placeholder="Select event date" class="chosen-select">
        <option value=""></option>
        <option value="WA">WA</option>
        <option value="QLD">QLD</option>
        <option value="VIC">VIC</option>
        <option value="NSW">NSW</option>
        <option value="SA">SA</option>
      </select>
    </div>
    
    <div class="holder">
      <label for="Inputfield_code">Code:</label>
      <select id="Inputfield_code" data-placeholder="Response code" class="chosen-select">
        <option value=""></option>
        <option value="601" class="WA">601</option>
        <option value="602" class="WA">602</option>
        <option value="402" class="QLD">402</option>
        <option value="403" class="QLD">403</option>
        <option value="301" class="VIC">301</option>
        <option value="302" class="VIC">302</option>
        <option value="201" class="NSW">201</option>
        <option value="203" class="NSW">203</option>
        <option value="501" class="SA">501</option>
      </select>
    </div>
  
  


  </body>
</html>
