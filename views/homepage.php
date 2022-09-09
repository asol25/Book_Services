<?php

echo "<pre>";
var_dump($_SERVER);
var_dump($database, $auth);
echo "</pre>";
echo "<main>
<h2>Login Form</h2>

<form method='post' action='login'>
  <div class='imgcontainer'>
  </div>

  <div class='container'>
    <label for='uname'><b>Username</b></label>
    <input type='text' placeholder='Enter Username' name='username' value='admin' required>

    <label for='psw'><b>Password</b></label>
    <input type='password' placeholder='Enter Password'  name='password' value='admin' required>
        
    <button type='submit' name='submit' value='login'>LOGIN</button>
    <label>
      <input type='checkbox' checked='checked' name='remember'> Remember me
    </label>
  </div>
</form>
</main>";

?>
<style>
    <?php include_once __DIR__. '/../assets/css/login.css'; ?>
</style>