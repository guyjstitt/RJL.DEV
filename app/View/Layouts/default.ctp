<DOCTYPE! html>
<html lang="en">
<head>
<title>RJLou CMS</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">	    
<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php 
		//css
	    echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', 'forms.css','jquery-ui-1.10.4.custom.css','jquery-ui-1.10.4.custom.min.css'));
		//layout scripts
		echo $this->Html->script(array(
			'jquery-1.10.2.js',
			'bootstrap.min.js',
			'jquery-ui-1.10.4.custom.min.js',
			'dataTable.js'
			));
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>






<script>  
$(document).ready(function(){
  $(".messageHead").click(function(){
    $(".messageContent").slideToggle();
  });
});

</script>




 
</head>

<body>


<div class="container">
<div id="content" class="row-fluid">
	<div class="span12 text-center">
	<img src="http://www.rjlou.org/rjl/app/webroot/css/logo.png">
	</div>
</div>

<div id="content" class="row-fluid">
	<div class="span12">
	<ul class="nav nav-tabs">
	
		<li id="dash" <?php if($this->params['controller'] == 'home'){echo 'class="active"';}?>><a href="/rjl/home">Dashboard</a></li>
		<?php if ($cur_user['role']!=='facilitator' && $cur_user['role']!=='casemanager'): ?>
		<li <?php if($this->params['controller'] == 'RjCases'){echo 'class="active"';}?> class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" >
		  Cases <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/rjl/RjCases/index/">View Cases</a></li>
			<li><a href="/rjl/RjCases/add">Add Case</a></li>
		
		</ul>
	  </li>
	 <?php endif?>
		<?php if ($cur_user['role']!=='facilitator' && $cur_user['role']!=='casemanager'): ?>
	  <li <?php if($this->params['controller'] == 'Victims'){echo 'class="active"';}?> class="dropdown" id="vic">
		<a class="dropdown-toggle" data-toggle="dropdown" >
		  Victims <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
				<li><a href="/rjl/Victims/">View Victims</a></li> 
			<li><a href="/rjl/Victims/add">Add Victim</a></li>
		</ul>
	  </li>
	  <li <?php if($this->params['controller'] == 'Offenders'){echo 'class="active"';}?> class="dropdown" id="off">
		<a class="dropdown-toggle" data-toggle="dropdown">
		  Offenders <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/rjl/Offenders/">View Offenders</a></li>
			<li><a href="/rjl/Offenders/add">Add Offender</a></li>
		</ul>
	  </li>
	  <li <?php if($this->params['controller'] == 'Volunteers'){echo 'class="active"';}?> class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" >
		  Volunteers <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/rjl/Volunteers/">View Volunteers</a></li>
			<li><a href="/rjl/Volunteers/add">Add Volunteer</a></li>
		</ul>
	  </li>
	  <?php endif ?>
		<?php if(isset($cur_user) && $cur_user['role']=='admin')
		{ 
			echo "<li ";
			if($this->params['controller'] == 'Users'){echo "class='active'";}
			echo "class='dropdown'>";
			echo "<a class='dropdown-toggle' data-toggle='dropdown' >Users <b class='caret greycaret'></b></a>";
			echo "<ul class='dropdown-menu'>";
			echo 	"<li><a href='/rjl/Users/index'>View Users</a></li>";
			echo 	"<li><a href='/rjl/Users/add'>Add User</a></li>";
			echo "</ul>";
		}?>
		<li <?php if($this->params['controller'] == 'Facilitators') {echo 'class="active"';}?> class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown">
		  Documents <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/rjl/Facilitators/">View Documents</a></li>
		</ul>
	  </li>
	 <?php if ($cur_user['role']=='admin'): ?>
		<li id="admin" <?php if($this->params['controller'] == 'Messages'){echo 'class="active"';}?> class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" >
		  Admin <b class="caret greycaret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/rjl/Messages/">View Announcements</a></li>
			<li><a href="/rjl/Reasons/">View Case Close Reasons</a></li>
			<li><a href="/rjl/Codes/">View Note Codes</a></li>
			<li><a href="/rjl/Charges/">View Charges</a></li>
			<li><a href="/rjl/Donors/">View Donors</a></li>
			<li><a href="/rjl/Events/">View Events</a></li>
			<li><a href="/rjl/Reports/">Reports</a></li>
		</ul>
	  </li>
	<?php endif ?>
	</ul>
	</div>
</div>

<div id="buffer">
<span>Welcome <?php if(isset($cur_user['username'])){echo $cur_user['Person']['firstName']; echo "! <strong><a href='/rjl/users/logout'>Log out</a></strong>";}
						else{echo "<strong><a href='/rjl/users/login/'>Log in</a></strong>";}?></span>
</div>

<?php if($this->params['controller'] == 'home'): ?>

 <div class="messageHead">
 <h2>Announcements</h2>
<p>Click to hide/show</p>
<div class="messageContent">

<?php if ($cur_user['role']=='admin'): ?>
 <?php  {
if($this->params['controller'] == 'home'){
 foreach ($adminMessages as $message): 	
echo $message['Message']['announcement']; 
 endforeach; 
 }
}
?>
<?php endif ?>

<?php if ($cur_user['role']=='caseadmin'): ?>
 <?php  {
if($this->params['controller'] == 'home'){
 foreach ($caseAdminMessages as $message): 	
echo $message['Message']['announcement']; 
 endforeach; 
 }
}
?>
<?php endif ?>

<?php if ($cur_user['role']=='casemanager'): ?>
 <?php  {
if($this->params['controller'] == 'home'){
 foreach ($caseManagerMessages as $message): 	
echo $message['Message']['announcement']; 
 endforeach; 
 }
}
?>
<?php endif ?>


<?php if ($cur_user['role']=='facilitator'): ?>
 <?php  {
if($this->params['controller'] == 'home'){
 foreach ($facilitatorMessages as $message): 	
echo $message['Message']['announcement']; 
 endforeach; 
 }
}
?>
<?php endif ?>




</div>	
</div>




<?php endif ?>

<div id="content" class="row-fluid">
	<div class="span10 main">	
		<h1>Case Management System</h1>
		<br>
		<div id="container">
			<div id="header">
			</div>
			<div id="content">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>	
</div>

<?php echo $this->element('sql_dump'); ?>

<div id="content" class="row-fluid">
	<div class="span12">
		<div id="footer">
		<?php if ($cur_user['role']!=='facilitator' && $cur_user['role']!=='casemanager'): ?>
			<div id="footLinks">
				<a href="http://www.rjlou.org/rjl/home">Dashboard</a> |
				<a href="http://www.rjlou.org/rjl/RjCases/index/">Cases</a> |
				<a href="http://www.rjlou.org/rjl/Victims/">Victims</a> |
				<a href="http://www.rjlou.org/rjl/Offenders/">Offenders</a> |
				<a href="http://www.rjlou.org/rjl/Volunteers/">Volunteers</a> |
				<a href="http://www.rjlou.org/rjl/Donors/">Donors</a> |
				<a href="http://www.rjlou.org/rjl/Events/">Events</a> |
				<a href="http://www.rjlou.org/rjl/Reports/">Reports</a> |
				<a href="http://www.rjlou.org">RJL Website</a>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>

</div>

</body>
</html>