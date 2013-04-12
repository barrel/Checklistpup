<h1>Checklistpup</h1>
<br />
<h3>Add checklist items, one per line.</h3>
		
<form>
		
	<input type="text" name="listname" value="<?php echo $list_data['list_name'] ?>">
	<br/>
	<textarea rows=12 cols=50>
		<?php 
			$json_list = json_decode($list_data['checklist']); 
			
			foreach($json_list as $data) {
				echo $data.'<br/>';
			}
	
		?>
	</textarea>
	<br/>
	<input type="submit" value="Edit">

</form>


<script>
	
		
</script>