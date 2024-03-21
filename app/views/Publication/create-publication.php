<form method="post" action="/Publication/create">
	<fieldset>
		<legend>Create new post</legend>

	<div><label>Title:<input type="text" name="publication-title"></label></div>
	
	<div><label>Body:<textarea name="publication-body"></textarea></label></div>
	<div><label>Visibility:
			<label>public<input type="radio" name="publication-visibility" value="public"></label>
			<label>private<input type="radio" name="publication-visibility" value="private"></label>
		</label></div>
		
	<div><button type="submit">Create post</button></div>
</fieldset>
</form>