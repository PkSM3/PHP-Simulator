function distribucion(element){
	var distriucion = $(element).text();
	switch(distriucion.toLowerCase()){
		case 'normal':
		case 'log-normal':
			removeA();
			removeB();
			removeLambda();
			removeP();
		break;
		case 'uniforme continuia':
		case 'uniforme discreta':
		case 'beta':
			removeLambda();
			removeP();
			removeTeta();
			removeMu();
		break;
		case 'gamma':
			removeA();
			removeP();
			removeTeta();
			removeMu();
		break;
		case 'bernoulli':
		case 'geométrica':
			removeA();
			removeB();
			removeLambda();
			removeTeta();
			removeMu();
		break;
		case 'binomial':
			alert('en construccion');
		break;
		case 'poisson':
		case 'exponencial':
			removeA();
			removeB();
			removeP();
			removeTeta();
			removeMu();
		break;
	}
	$('#distribucion').text('Distribución: '+distriucion);
	$('#tipo_distribucion').val(distriucion.toLowerCase());
	$('#text_inicio').hide(200);
	$('#form_data').show(200);
	return false;
}

function removeA(){
	$("#a_label").remove();
	$("#a").remove();
}

function removeB(){
	$("#b_label").remove();
	$("#b").remove();
}

function removeLambda(){
	$("#lambda_label").remove();
	$("#lambda").remove();
}

function removeMu(){
	$("#mu_label").remove();
	$("#mu").remove();
}

function removeP(){
	$("#p_label").remove();
	$("#p").remove();
}

function removeTeta(){
	$("#teta_label").remove();
	$("#teta").remove();
}

function ejecutarSimulador(){
	$.ajax({
		method:'POST',
		url:'php/Interface.php',
		cache: false,
		data: $("#form_data").serialize(),
		success:function(res){
			$('#result').empty();
			$('#result').html(res);
			$('#result').show();
		}
	});
	return false;
}
