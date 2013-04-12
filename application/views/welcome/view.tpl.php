

<?php

// Do some shit with our awesome data array

//foreach ($list_data as $data){
	echo 'List name: '.$list_data['list_name'].'<br />';
	//print_r($list_data);
	//echo "</br>".$list_data."whats this</br>";
	$json_list = json_decode($list_data['checklist']);
	$json_values = json_decode($list_data['set_value'], true);
	//print_r($json_values);
	$counter = 0;
	foreach($json_list as $data) {
		if ($json_values[$counter]== '0') {
			echo '<div><input type="checkbox" name="checked">'.$data.'</div>';
		} else {
			echo '<div><input type="checkbox" name="checked" class="list-check">'.$data.'</div>';
		}
		$counter++;
	}
	
	
	//echo $json_list."<br/>";
	//print_r($json_list);
//}

?>

<input type="submit" name="delete" value="Delete">
<input type="submit" name="reset" value="Reset">

<script>
	// Marked correct checked boxes
	$(".list-check").attr('checked','true');

	// Delete list
		$('input[name="delete"]').click(function() {
			//var getItems = $('textarea').val();
			//alert(getItems);
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			alert(getId);
			$.ajax({
				type: 'POST',
				url: siteUrl+"welcome/delete_list",
				//url: "getlist.php",
				data: { "unique_id": getId },
				success: function(msg) {
					if (msg){
						//alert(msg);
						//$('body').html('');
						alert("List has beed deleted.");
						window.location.href = siteUrl;
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
						alert(msg);
						//$(".list-check").attr('checked','false');
						location.reload();
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
	
	// Count checkboxes
		var finishMsg = "<div id='FinishMsg'>Congratulations! You completed the list!</div>"
		var incompleteMsg = "<div id='IncompleteMsg'>Looks like you still have some stuff to do.</div>";
		var howMany = $("input[type=checkbox]").size();
		
		//alert(howMany);
		$("input[type=checkbox]").click(function() {
			var getId = window.location+'';
			getId = getId.substr(getId.length - 5);
			
			var whichOne = ($(this).parent().index())-1;
			
			//alert(whichOne-1);
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
						alert("effin awesome");
					}
				},
				error: function() {
					alert("no work");
				}
			});
			
			// Display end message
			var countCheck = $(".list-check").size();
			//alert(countCheck);
			if (countCheck == howMany) {
				//$("IncompleteMsg").remove();
				$('body').append(finishMsg);
			} else {
				$("#FinishMsg").remove();
				//$("body").append(incompleteMsg);
			}
		});
</script>
