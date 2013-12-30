<?php
session_start();

?>
<html>
<p>Hello <?php echo $_SESSION[firstname_email]." ".$_SESSION[lastname_email]; ?></p>
</br>
<hr>

<p>Username: <?php echo $_SESSION[username_email]; ?></p>
<p>Your password has been reset to: <?php echo $_SESSION[new_password]; ?></p>
</br>
<p>---------------------------------------------------------------------------------------------------</p>
</br>
<p>Do not forget to change it after logging in (click on My Dashboard -> Profile -> Reset Password).</p>

</br>
<p>Login at: <a href="http://ict1.natawebs.com/login-page/">http://ict1.natawebs.com/login-page/</a></p>


</br>
---------------------------------------------------------------------------------------------------
</br>


<p>Thank you</p>

</html>
