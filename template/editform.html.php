<?PHP
echo "<form method='post' action='index.php?task=news&action=update'><table class='newsEditFormTable'><tr><td>Name: </td>
	<td><input type='text' size='100' name='name' reqired=true value='".$this->data["name"]."'></td></tr>
	<tr><td>Description: </td><td><textarea name='description' rows='5' cols='100'>".$this->data["description"]."</textarea></td></tr></table>
	<input type='hidden' name='author_id' value='".$_SESSION["user_ID"]."'>
	<input type='hidden' name='note_id' value='".$this->data["note_ID"]."'>
	<input type='hidden' name='updeated_at' value='CURRENT_TIMESTAMP()'>
	<input type='hidden' name='is_active' value=1><input type='submit' value='save'></form>";
?>