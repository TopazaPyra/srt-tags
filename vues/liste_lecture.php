<html>
	<head>
		<meta charset="utf-8">
		
		<link type="text/css" href="../css/jquery-ui.min.css" rel="stylesheet" />
                <link type="text/css" href="../css/style.css" rel="stylesheet" />
		
		<script src="../libs/popcorn-complete.js"></script>
		<script src="../libs/jquery-2.0.2.min.js"></script>
		<script src="../libs/jquery-ui.min.js"></script>
		<script src="../scripts/autocompletion.js"></script>
		<?php if(isset($playlist)) echo '<script>' . $playlist . '</script>' ?>
		<title>Test</title>
	</head>
	
	<body>
            <div id="wrapper">
		<form action='../controleurs/affichage_sequences.php' method='post'>
			<div class="ui-widget">
				<input type="text" name="tag" id="tag">
				<input type="submit" value="Recherche">
			</div>	
		</form>
		
		<div id="container"><?php if(isset($erreur)) echo $erreur ?></div>
                <?php if(isset($liste_lecture)) echo '<div id="playlist"><h2>Séquences</h2>' . $liste_lecture . '</div>' ?>
            </div>
	</body>
</html>
