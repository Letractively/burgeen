<?php
session_start();

?>
<html>
<p><b>Hello, Somebody contact you....</b></p>
</br>
<hr>
<p>here is the detail person:</p>
<table border=0 >
<tr>
<td width="200px"><b>Name</td>
<td ><?php echo $_SESSION[name_email]; ?></td>
</tr>
<tr>
<td width="200px"><b>Company Name</td>
<td><?php echo $_SESSION[company_email]; ?></td>
</tr>
<tr>
<td><b>Email Address</td>
<td><?php echo $_SESSION[email_email]; ?></td>
</tr>
<tr>
<td><b>Website</td>
<td><?php echo $_SESSION[website_email]; ?></td>
</tr>
<tr>
<td><b>Phone Number</td>
<td><?php echo $_SESSION[phone_email]; ?></td>
</tr>
<tr>
<td><b>Country</td>
<td><?php echo $_SESSION[country_email]; ?></td>
</tr>
<tr>
<td><b>Message</td>
<td><?php echo $_SESSION[message_email]; ?></td>
</tr>
</table>



<hr>




</html>
