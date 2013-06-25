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
						$('#wrapper').append('<div id="playlist"><h2>Séquences</h2><ul></ul></div>');
						
						tab_sequences = new Array();
						
						$.each(data, function(index, seq) {
							objet_seq = { src: seq['src'], in: parseFloat(seq['debut']), out: parseFloat(seq['fin'])};
							tab_sequences.push(objet_seq);
							
							lien = '<li><a href="#" onclick="javascript:lectureSequences([tab_sequences[' + index + ']]);">' + seq['titre'] +'</a></li>';
							$('#playlist ul').append(lien);
						})
						
						lectureSequences(tab_sequences);
					}
				}
			});
			
		} else {
			alert('Le tag ne peut pas être vide');
		}
	
	});
});

function lectureSequences(sequences) {
	$('#container').empty();
	var sequence = Popcorn.sequence('container', sequences);
	$('video').width(800);
	$('video').height(640);
	sequence.play();
}
