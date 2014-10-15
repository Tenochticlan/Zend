<html>
<body>
<h1>Anmelden</h1>
<p>bitte hier anmelden</p>
<form method="POST" action="<?php echo $this->url(array('controller'=>'auth','action'=>'identify')); ?>">

	<div>
		<label>Username</label>
		<input type="text" name="username" value="" />
	</div>
	<div>
		<label>passwort</label>
		<input type="password" name="password" value="" />
	</div>
	<div>
		<input type="submit" name="login" value="Login" />	
	</div>
</form>
</body>
</html>