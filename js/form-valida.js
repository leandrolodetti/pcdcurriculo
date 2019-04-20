$("#inputDataNascimento").mask("00/00/0000");
$("#cep").mask("00000-000");
$("#idCpf").mask("000.000.000-00");
$("#idContato").mask("(00)000000000");
$("#idContatoResponsavel").mask("(00)000000000");
$("#idAlteraContatoCandidato").mask("(00)000000000");
//$("#idCurriculoPretSalarial").mask('R$ 00.999,99');
/*
function phpinfo(id) {
	var checkBox = document.getElementById(id);

	if (checkBox.checked == true){
    	window.location.href = 'resultado-vagas.php?'+id;
  	}
	//window.location.href = "teste.php";
}
*/

function validarCPF(id, idErro, msg) {
 	var cpf = document.getElementById(id).value;
 	var y = document.getElementById(idErro);
 	//var cpf = document.forms["form-cadastro-candidato"]["cpf"].value;
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') {
		//alert("CPF Deve ser Preenchido!");
		//cpf="";
		document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;
	}

	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999") {
		//alert("CPF Inválido!");
		//cpf="";
		document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;		
	}

	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))	{
			//alert("CPF Inválido!");
			//cpf="";
			document.getElementById(id).style.backgroundColor = "#F08080";
			document.getElementById(id).focus();
			y.innerHTML = msg;
			return false;	
		}		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10))) {
		//alert("CPF Inválido!");
		//cpf="";
		document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;		
	}
	document.getElementById(id).style.backgroundColor = "white";
	return true;
}

function validaNumCaracteres(id, idErro, caracteres, msg) {
	var x = document.getElementById(id);
	var y = document.getElementById(idErro);
	if (x.value.length < caracteres) {
	  		//x.value = "";
	  		x.style.backgroundColor = "#F08080";
	    	x.focus();
	    	y.innerHTML = msg;
	    	return false;
	  	}
	  	//y.innerHTML = x.value.length;
	  	//y.innerHTML = "";
	  	x.style.backgroundColor = "white";
	  	return true;	
}

function validarNomeResponsavel() {
	if (!validaNumCaracteres("idNomeResponsavel","idSmallNomeResponsavel",3,"Nome inválido")) {
		return false;
	}
}

function calcularIdade(id) {
		var nascimento = document.getElementById(id).value.split("/");
		document.getElementById("idFormResponsavel").style.visibility = "hidden";
	    var dataNascimento = new Date(parseInt(nascimento[2], 10),
	    parseInt(nascimento[1], 10) - 1,
	    parseInt(nascimento[0], 10));
	    var diferenca = Date.now() -  dataNascimento.getTime();
	    var idade = new Date(diferenca);

	    if (Math.abs(idade.getUTCFullYear() - 1970) < 16) {
	    	alert("Você ainda não tem idade para trabalhar!");
	    	return false;
	    }
	    else
	    if (Math.abs(idade.getUTCFullYear() - 1970) < 18) {
	    	document.getElementById("idFormResponsavel").style.visibility = "visible";
	    	if (!validarNomeResponsavel()) {
	    		return false;
	    	}
	    }
	    return true;
	}

function validarNome() {
	if (!validaNumCaracteres("idNome","idSmallNome",3,"Nome inválido")) {
		return false;
	}
}

function validarSobrenome() {
	if (!validaNumCaracteres("idSobrenome","idSmallSobrenome",3,"Sobrenome inválido")) {
		return false;
	}
}

function validarNascimento() {
	if (!validaNumCaracteres("inputDataNascimento","idSmallNascimento",10,"Data Inválida")) {
		return false;
	}
	if (!calcularIdade("inputDataNascimento")) {
		return false;
	}
}

function validarContato() {
	if (!validaNumCaracteres("idContato","idSmallContato",12,"Número inválido")) {
		return false;
	}
}

function validaForm() {

	validarNome();
	validarCPF("idCpf","idSmallCpf","CPF Inválido");
	validarContato();
	validarNascimento();
	validarSobrenome();

	if (!validarNome() ||
		!validarSobrenome() ||
		!validarNascimento() ||
		!validarContato() ||
		!validarCPF("idCpf","idSmallCpf","CPF Inválido")
		) {
		return false;
	}
	else
		return true;
}