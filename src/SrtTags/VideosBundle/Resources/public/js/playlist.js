$(document).ready(function() {

	$('#form_tag').submit(function(evt) {
		evt.preventDefault();
		
		if ($('#tag').val() != '') {
			
			$.ajax({
				type: 'POST',
				data: $('#form_tag').serialize(),
				url: 'printsequences',
				dataType: 'json',
				success: function(data) {
					$('#playlist').remove();	
					$('#wrapper').append('<aside id="playlist"><h2>Séquences</h2><ul></ul></aside>');
						
					array_sequences = new Array();
						
					$.each(data, function(index, seq) {
						object_seq = { src: '../uploads/videos/' + seq['path'], in: parseInt(seq['start']), out: parseInt(seq['stop'])};
						array_sequences.push(object_seq);
							
						lien = '<li><a href="#" onclick="javascript:playSequences([array_sequences[' + index + ']]);">' + seq['title'] +'</a></li>';
						$('#playlist ul').append(lien);
					})
						
					playSequences(array_sequences);
				},
				statusCode: {
					404: function() {
						$('#playlist').remove();
						$('#container').html('<p>Aucune vidéo ne correspond à ce tag.</p>');
					}
				}
			});
			
		} else {
			alert('Le tag ne peut pas être vide');
		}
	
	});
});

function playSequences(sequences) {
	$('#container').empty();
	var sequence = Popcorn.sequence('container', sequences);
	$('video').width(800);
	$('video').height(640);
	sequence.play();
}
