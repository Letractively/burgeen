<?php
session_start();
?>
<html>
<p>Hello <?php echo $_SESSION[firstname_email]." ".$_SESSION[lastname_email]; ?></p>
<hr>
<p><b>Congratulations for the registration in ict1.natawebs.com</b></p>
</br>
<p>
<font color=white>test</font>
</p>
</br>
<p>
username : <?php  echo $_SESSION[username_email]; ?>
</p>
<p>
password : <?php echo $_SESSION[password_email]; ?>
</p>
<p>
<font color=white>test</font>
</p>
</br>
<p>
You MUST have accurate and updated your contact information. Providing false or inaccurate contact information 
can be grounds for the cancellation of your account registration.
</p></br>

<p>
Now you can login with the following link address here:
</p>
</br>
<p>
Login Page: <a href="http://ict1.natawebs.com/login-page/">http://ict1.natawebs.com/login-page/</a>
</p>
</br>
<p>---------------------------------------------------------------------------------------------</p>
</br>
<p>
<font color=white>test</font>
</p>
</br>

<p>Sincerely,</p>
<p>Burgeen Admin</p>
<p>admin@natawebs.com</p>



</html>