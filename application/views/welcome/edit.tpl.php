<div id="Content">

	<img src="<?= site_url('/public/logo.png'); ?>" />
			
	<form>
		<h4>Enter list name:</h4>
		<input type="text" name="listname" value="<?php echo $list_data['list_name'] ?>">
		<h4>Add checklist items, one per line:</h4>
		<textarea rows=12 cols=50><?php 
				$json_list = json_decode($list_data['checklist']); 
				
				foreach($json_list as $data) {
					echo $data."\n";
				}
		
			?></textarea>
		
		<input type="submit" value="Edit" name="edit">
	
	</form>

</div>

<script>
		$('input[name="edit"]').click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			var getItems = $('textarea').val();
			getItems = $.trim(getItems);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/update_list",
				//url: "getlist.php",
				data: { "list": getItems, "name": $('input[type=text]').val(), "unique_id": getId },
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