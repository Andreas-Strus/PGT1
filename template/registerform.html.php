<?PHP
echo '<form action= "index.php?task=login&action=register2" method= "post" class = "LoginForm">
		<table ID="login_form" class="RegisterForm"align ="center"><tbody>
		<tr><td>Email:</td><td><input type = "email" id = "email" name = "email"/></td></tr>
		<tr><td>Password:</td><td><input type = "password" id = "password" name = "password"></td></tr>		
		<tr><td>Repeat Password:</td><td><input type = "password" id = "rpassword" name = "rpassword"></td></tr>
		<tr><td>First Name:</td><td><input type = "text" id = "firstName" name = "firstName"></td></tr>
		<tr><td>Last Name:</td><td><input type = "text" id = "lastName" name = "lastName"></td></tr>
		
		<tr><td>Gender:</td><td><input type = "radio" id = "GenderBoy" name = "gender" value = "B" checked=true>Boy<br/>
		<input type = "radio" id = "GenderGirl" name="gender" value = "G">Girl</td></tr>
		</tbody></table>
		<br/><input value = "Register" type = "submit" class ="RegisterButton"/></form>';
?>