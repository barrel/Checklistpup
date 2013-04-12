<h1>Checklistpup</h1>
<br />
<h3>Add checklist items, one per line.</h3>
		
<form>
		
	<input type="text" name="listname">
	<br/>
	<textarea rows=12 cols=50></textarea>
	<br/>
	<input type="submit" value="Create">

</form>

<script>
		$('input[type="submit"]').click(function() {
			var getItems = $('textarea').val();
			alert(getItems);
			$.ajax({
				type: 'POST',
				url: siteUrl+"index.php/welcome/ajax_func",
				//url: "getlist.php",
				data: { "list": $('textarea').val(), "name": $('input[type=text]').val() },
				success: function(msg) {
					if (msg){
						alert(msg);
						window.location.href = siteUrl+"index.php/welcome/view/"+msg;
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
