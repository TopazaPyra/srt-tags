<html>
	<head>
		<meta charset="utf-8">
		
		<link type="text/css" href="../css/jquery-ui.min.css" rel="Stylesheet" />
		
		<script src="../libs/popcorn-complete.js"></script>
		<script src="../libs/jquery-2.0.2.min.js"></script>
		<script src="../libs/jquery-ui.min.js"></script>
		<script src="../scripts/autocompletion.js"></script>
		<?php if(isset($playlist)) echo '<script>' . $playlist . '</script>' ?>
		<title>Test</title>
	</head>
	
	<body>
		<form action='../controleurs/affichage_sequences.php' method='post'>
			<div class="ui-widget">
				<input type="text" name="tag" id="tag">
				<input type="submit" value="Envoyer">
			</div>	
		</form>
		
		<div id="container"></div>
	</body>
</html>
