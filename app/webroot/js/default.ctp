<DOCTYPE! html>
<html lang="en">
<head>
<title>RJLou CMS</title>
	    

	
	<?php
		//css
	    echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', 'forms.css','/css/south-street/jquery-ui-1.10.4.custom.min'));
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
        $(document).ready(function () {  
            $('.dropdown-toggle').dropdown();  
        });  
    </script>
 
</head>
<body>
<div class="container">
<div id="content" class="row-fluid">
<div class="span12 text-center">
<img src="http://dhcp068167.cbpa-vmware-client.louisville.edu/rjl/app/webroot/css/logo.png">
</div>
</div>
<div id="content" class="row-fluid">
<div class="span12">
<ul class="nav nav-tabs">
	<li <?php if($this->params['controller'] == 'home'){echo 'class="active"';}?>><a href="/rjl/home">Dashboard</a></li>
	<li <?php if($this->params['controller'] == 'RjCases'){echo 'class="active"';}?> class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="/rjl/RjCases/">
      Cases <b class="caret greycaret"></b>
    </a>
    <ul class="dropdown-menu">
		<li><a href="/rjl/RjCases/index/">View Cases</a></li>
        <li><a href="/rjl/RjCases/add/">Add Case</a></li>
		<li><a href="/rjl/RjCases/notes">Add Case Notes</a></li>
    </ul>
  </li>
  <li <?php if($this->params['controller'] == 'Victims'){echo 'class="active"';}?> class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="Victims/">
      Victims <b class="caret greycaret"></b>
    </a>
    <ul class="dropdown-menu">
		<li><a href="/rjl/Victims/">View Victims</a></li>
		<li><a href="/rjl/Victims/add">Add Victim</a></li>
    </ul>
  </li>
  <li <?php if($this->params['controller'] == 'Offenders'){echo 'class="active"';}?> class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="Offenders/">
      Offenders <b class="caret greycaret"></b>
    </a>
    <ul class="dropdown-menu">
		<li><a href="/rjl/Offenders/">View Offenders</a></li>
		<li><a href="/rjl/Offenders/add">Add Offender</a></li>
    </ul>
  </li>
  <li <?php if($this->params['controller'] == 'Volunteers'){echo 'class="active"';}?> class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="Volunteers/">
      Volunteers <b class="caret greycaret"></b>
    </a>
    <ul class="dropdown-menu">
		<li><a href="/rjl/Volunteers/">View Volunteers</a></li>
		<li><a href="/rjl/Volunteers/add">Add Volunteer</a></li>
    </ul>
  </li>
	<?php if(isset($cur_user) && $cur_user['role']=='admin')
	{
		echo "<li ";
		if($this->params['controller'] == 'Users'){echo "class='active'";}
		echo "class='dropdown'>";
		echo "<a class='dropdown-toggle' data-toggle='dropdown' href='/rjl/Users/'>Users <b class='caret greycaret'></b></a>";
		echo "<ul class='dropdown-menu'>";
		echo 	"<li><a href='/rjl/Users/index'>View Users</a></li>";
		echo 	"<li><a href='/rjl/Users/add'>Add User</a></li>";
		echo "</ul>";
	}?>
</ul>
</div>
</div>
<div id="buffer"></div>
<div id="content" class="row-fluid">

<div class="span10 main">

<div class="alert">
	<strong>Welcome </strong><?php if(isset($cur_user['username'])){echo $cur_user['username']; echo "!<br><a href='users\logout\'>Log out</a><br>";}
									else{echo "<br><a href='/rjl/users/login/'>Log in</a><br>";}?>
</div>
   
    <h1>Restorative Justice Louisville</h1>
	<h3>Case Management System</h3>
	<br>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	

</div>
	
</div>
</div>
</body>
</html>