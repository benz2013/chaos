<?php

require_once('response/response.class.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<style>
		.resp{
			padding:10px;
			border: 1px solid #000;
			float:left;
			width:100px;
			max-width:200px;
		}
		.row{
			max-width:250px;
		}
		</style>
	</head>
	<body>
	<?php
	
	try{
		$buttons = new Requests("getButtonsDef");
		 } catch(Exception $e){
			echo $e->getMessage();//Show user error mesage
		}
	?>
	<div id="response-codes"></div>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
	<script src="callServer.js"></script>
</html>
