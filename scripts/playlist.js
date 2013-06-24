$(document).ready(function() {

	$('#formulaire_tag').submit(function(evt) {
		evt.preventDefault();
		
		if ($('#tag').val() != '') {
			
			$.ajax({
				type: 'POST',
				data: $('#formulaire_tag').serialize(),
				url: '../controleurs/affichage_sequences.php',
				dataType: 'json',
				success: function(data) {
					$('#playlist').remove();
					if (data == 'Aucune vidéo ne correspond à ce tag.' ) {
						$('#container').html(data);
					} else {
						$('#container').empty();
						
						$('#wrapper').append('<div id="playlist"><h2>Séquences</h2><ul></ul></div>');
						
						var tab_sequences = new Array();
						
						$.each(data, function(index, seq) {
							var objet_seq = { src: seq['src'], in: parseInt(seq['debut']), out: parseInt(seq['fin'])};
							tab_sequences.push(objet_seq);
							
							var lien = '<li><a href="#" onclick="javascript:$(\'#container\').empty(); sequence = Popcorn.sequence(\'container\',' + objet_seq + '); $(\'video\').width(800); $(\'video\').height(640); sequence.play();">' + seq['titre'] + '</a></li>';
							$('#playlist ul').append(lien);
						})
						
						var sequence = Popcorn.sequence(
							'container', tab_sequences);
						
						$('video').width(800);
						$('video').height(640);
						
						sequence.play();
					}
				}
			});
			
		} else {
			alert('Le tag ne peut pas être vide');
		}
	
	});
});
