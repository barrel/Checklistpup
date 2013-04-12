<h1>Checklistpup</h1>
<br />
<h3>Add checklist items, one per line.</h3>
		
<form>
		
	<input type="text" name="listname" value="<?php echo $list_data['list_name'] ?>">
	<br/>
	<textarea rows=12 cols=50><?php 
			$json_list = json_decode($list_data['checklist']); 
			
			foreach($json_list as $data) {
				echo $data."\n";
			}
	
		?></textarea>
	<br/>
	<input type="submit" value="Edit" name="edit">

</form>

<script>
		$('input[name="edit"]').click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/update_list",
				//url: "getlist.php",
				data: { "list": $('textarea').val(), "name": $('input[type=text]').val(), "unique_id": getId },
				success: function(msg) {
					if (msg){
						//alert(msg);
						window.location.href = siteUrl+"list/"+msg;
					}else{
						alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			return false;
		});
</script>