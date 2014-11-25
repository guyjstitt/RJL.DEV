<style>
.nav-tabs, h3{
	display: none;
}

.messageHead {
	display: none;
}

#footLinks {
	display: none;
}

.toolbar{
	display: none;
}

#buffer {
	height: 50px;
}

#login {
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 20px;
}

h1 {
	text-align: center;
}

</style>
<div id="login">
<div id="loginIn">
<div id="loginHead">
<h1>Log in</h1>
</div>
<div id="loginForm">
<?php
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Log in');
?>
</div>
<div id="loginFoot">
<a href="http://rjlou.org">Return to Homepage</a>
</div>
</div>
</div>