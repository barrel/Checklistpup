<div id="Content">

	<img src="<?= site_url('/public/logo.png'); ?>" />

	<?php
	
		echo '<h2>'.$list_data['list_name'].'</h2>';
		$json_list = json_decode($list_data['checklist']);
		$json_values = json_decode($list_data['set_value'], true);
	
		echo '<div class="listed">';
		$counter = 0;
		foreach($json_list as $data) {
			if ($json_values[$counter]== '0') {
				echo '<div><input type="checkbox" name="checked">'.$data.'</div>';
			} else {
				echo '<div><input type="checkbox" name="checked" class="list-check">'.$data.'</div>';
			}
			$counter++;
		}
		echo '</div>';
	?>
	<input type="submit" name="edit" value="Edit">
	<input type="submit" name="reset" value="Reset">
	<input type="submit" name="delete" value="Delete">

</div>

<script>
	// Marked correct checked boxes
	$(".list-check").attr('checked','true');

	// Delete list
		$('input[name="delete"]').click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			var deleteMsg = "<div id='DeleteMsg'>The list has been deleted.</div>"
			
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/delete_list",
				data: { "unique_id": getId },
				success: function(msg) {
					if (msg){
						//alert("List has beed deleted.");
						setTimeout(function() {
							window.location.href = siteUrl;
						}, 1000);
					}else{
						//alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			return false;
		});
		
	// Reset list
		$('input[name="reset"]').click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/reset_list",
				data: { "unique_id": getId },
				success: function(msg) {
					if (msg){
						//alert(msg);
						location.reload();
					}else{
						//alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			
			return false;
		});
		
	// Edit list
		$('input[name="edit"]').click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/edit_list",
				data: { "unique_id": getId },
				success: function(msg) {
					if (msg){
						//alert(msg);
						//location.reload();
						window.location.href = siteUrl+"edit/"+msg;
					}else{
						//alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			
			return false;
		});
	
	// Count checkboxes
		var finishMsg = "<h4 id='FinishMsg'>Congratulations! You completed the list!</h4>"
		var howMany = $("input[type=checkbox]").size();
		
		//alert(howMany);
		$("input[type=checkbox]").click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			
			var whichOne = ($(this).parent().index())-1;
			
			$(this).toggleClass('list-check');
			var checkClass = $(this).attr('class'); 
			
			// Set value in DB
			$.ajax ({
				type: 'POST',
				url: siteUrl+"welcome/set_check_value",
				data: { "which_box": whichOne, "unique_id": getId, "class": checkClass },
				success: function(msg) {
					if (msg){
						//alert(msg);
					}else{
						//alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			
			// Display end message
			var countCheck = $(".list-check").size();
			if (countCheck == howMany) {
				//$("IncompleteMsg").remove();
				$('#Content').append(finishMsg);
			} else {
				$("#FinishMsg").remove();
				//$("body").append(incompleteMsg);
			}
		});
</script>
