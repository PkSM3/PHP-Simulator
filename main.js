function distribucion(element){
    console.log("en distribucion");
	var distriucion = $(element).text();
	switch(distriucion.toLowerCase()){
		case 'normal':
		case 'log-normal':
			removeA();
			removeB();
			removeLambda();
			removeP();

			showMu();
			showTeta();
		break;
		case 'uniforme continuia':
		case 'uniforme discreta':
		case 'beta':
			removeLambda();
			removeP();
			removeTeta();
			removeMu();

			showA();
			showB();
		break;
		case 'gamma':
			removeA();
			removeP();
			removeTeta();
			removeMu();

			showLambda();
			showB();
		break;
		case 'bernoulli':
		case 'geométrica':
			removeA();
			removeB();
			removeLambda();
			removeTeta();
			removeMu();

			showP();
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

			showLambda();
		break;
	}
	$('#distribucion').text('Distribución: '+distriucion);
	$('#tipo_distribucion').val(distriucion.toLowerCase());
	$('#text_inicio').hide(200);
	$('#form_data').show(200);
	return false;
}

function showA(){
	$("#a_label").show();
	$("#a").show();
}

function showB(){
	$("#b_label").show();
	$("#b").show();
}

function showLambda(){
	$("#lambda_label").show();
	$("#lambda").show();
}

function showMu(){
	$("#mu_label").show();
	$("#mu").show();
}

function showP(){
	$("#p_label").show();
	$("#p").show();
}

function showTeta(){
	$("#teta_label").show();
	$("#teta").show();
}



function removeA(){
	$("#a_label").hide();
	$("#a").hide();
}

function removeB(){
	$("#b_label").hide();
	$("#b").hide();
}

function removeLambda(){
	$("#lambda_label").hide();
	$("#lambda").hide();
}

function removeMu(){
	$("#mu_label").hide();
	$("#mu").hide();
}

function removeP(){
	$("#p_label").hide();
	$("#p").hide();
}

function removeTeta(){
	$("#teta_label").hide();
	$("#teta").hide();
}

function ejecutarSimulador(){
        $('#chart_div').html("<img src='img/ajax-loader.gif' />");
	$.ajax({
		method:'GET',
		url:'php/Interface.php',
		cache: false,
                contentType: "application/json",               
		data: $("#form_data").serialize(),
		success:function(res){
			$('#result').empty();
			$('#result').html(res);
			$('#result').show();
                        google.load("visualization", "1", {packages:["corechart"]});
                        google.setOnLoadCallback(drawChart(res));
		},
		error:function(res){                    
                        alert("mal");
                }
	});
        return false;
}
//
function drawChart(res){
    console.log(res);
    var data=google.visualization.arrayToDataTable(res);
    var options = {
          title: 'Valores generados',
          legend: { position: 'none' }
    };
    
    var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
    chart.draw(data, options);

}