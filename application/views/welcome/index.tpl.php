<div id="Content">

	<img src="<?= site_url('/public/logo.png'); ?>" />
			
	<form>
		<h4>Enter list name:</h4>	
		<input type="text" name="listname">
		<h4>Add checklist items, one per line:</h4>
		<textarea rows=12 cols=50></textarea>
		
		<input type="submit" value="Create">
	
	</form>

</div>

<script>
		$('input[type="submit"]').click(function() {
			var getItems = $('textarea').val();
			getItems = $.trim(getItems);
			//alert(getItems);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/ajax_func",
				//url: "getlist.php",
				data: { "list": getItems, "name": $('input[type=text]').val() },
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
