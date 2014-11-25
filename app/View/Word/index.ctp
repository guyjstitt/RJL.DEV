
<head>

<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 

<style>
.messageHead {
	display: none;
}
</style>
<script>

function Merge()
{
	window.location.href = "/rjl/Word/Merge/";
}
</script>

</head>

<div class="word index">
    <h2>Word Merge</h2>
<label>Document Path</label>
<input id="docpath"></input>
<button id="Merge" text="Merge" onclick="Merge()">Merge</button>

</div>

<div class="navactions">
    <h3>Actions</h3>
    <ul>
        <li><?php echo $this->Html->link('New Charge', array('action' => 'add')); ?></li>
    </ul>
</div>
