<?PHP
function showNews($news){
	echo "<DIV class='newsDIV'><Table class'newsHeader'><tr><td class='newsName'><H2>".$news["name"]."</H2></td><td class='newsConrols'>";

	if($_SESSION["user_ID"]==$news["author_id"]){	
		echo "<form action='index.php?task=news&action=edit' method = 'post'><input name='author_ID' id='author_ID' type='hidden' value='".$news['author_id']."'><input name='note_id' id='note_id' type='hidden' value='".$news['note_ID']."'><input type='submit' value = 'Edit'></form>
			<form action='index.php?task=news&action=delete' method = 'post'><input name='author_ID' id='author_ID' type='hidden' value='".$news['author_id']."'><input name='note_id' id='note_id' type='hidden' value='".$news['note_ID']."'><input type='submit' value = 'Delete'></form></td></tr>";
	}
	else{
		echo "</td></tr>";
	}

	echo "<tr><td class='newsDescription'>".$news["description"]."</td></tr>
		<tr><td></td><td class='newsDates'><table><tr><td class='newsCreatedDate'>Created: ".$news["created_at"]."</td><td class='newsUpdeatedDate'> Updeated: ".$news["updeated_at"]."</td></tr></table></td></tr></table><br/>";
}
?>