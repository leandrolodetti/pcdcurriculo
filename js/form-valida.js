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
function validaForm() {
	
	function validarNome() {
	 	var x = document.forms["form-cadastro-candidato"]["nome"].value;
	  	if (x == "" || x.length<3) {
	  		//alert("Nome Deve ser Preenchido!");
	  		document.getElementById("idNome").value="";
	  		document.getElementById("idNome").style.backgroundColor = "#F08080";
	    	document.getElementById("idNome").focus();
	    	document.getElementById("idSmallNome").innerHTML = "Nome é obrigatório";
	    	
	    	return false;
	  	}
	  	document.getElementById("idSmallNome").innerHTML = "";
	  	document.getElementById("idNome").style.backgroundColor = "white";
	  	return true;
 	}

 	function validarNomeResponsavel() {
 		//var x = document.forms["form-cadastro-candidato"]["testeRespo"].value;
	 	var x = document.getElementById("idNomeResponsavel").value;
	  	if (x == "" || x.length<3) {
	  		//alert("Nome Deve ser Preenchido!");
	  		document.getElementById("idNomeResponsavel").value="";
	  		document.getElementById("idNomeResponsavel").style.backgroundColor = "#F08080";
	    	document.getElementById("idNomeResponsavel").focus();
	    	return false;
	  	}
	  	document.getElementById("idNomeResponsavel").style.backgroundColor = "white";
	  	return true;
 	}

 	function validarSobrenome() {
	 	var x = document.forms["form-cadastro-candidato"]["sobrenome"].value;
	  	if (x == "" || x.length<3) {
	  		//alert("Nome Deve ser Preenchido!");
	  		document.getElementById("idSobrenome").value="";
	  		document.getElementById("idSobrenome").style.backgroundColor = "#F08080";
	    	document.getElementById("idSobrenome").focus();
	    	return false;
	  	}
	  	document.getElementById("idSobrenome").style.backgroundColor = "white";
	  	return true;
 	}

 	function validarCPF() {
 		var cpf = document.forms["form-cadastro-candidato"]["cpf"].value;
		cpf = cpf.replace(/[^\d]+/g,'');	
		if(cpf == '') {
			//alert("CPF Deve ser Preenchido!");
			document.getElementById("idCpf").value="";
			document.getElementById("idCpf").style.backgroundColor = "#F08080";
			document.getElementById("idCpf").focus();
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
			document.getElementById("idCpf").value="";
			document.getElementById("idCpf").style.backgroundColor = "#F08080";
			document.getElementById("idCpf").focus();
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
				document.getElementById("idCpf").value="";
				document.getElementById("idCpf").style.backgroundColor = "#F08080";
				document.getElementById("idCpf").focus();
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
			document.getElementById("idCpf").value="";
			document.getElementById("idCpf").style.backgroundColor = "#F08080";
			document.getElementById("idCpf").focus();
			return false;		
		}
		document.getElementById("idCpf").style.backgroundColor = "white";
		return true;
	}
	
	function calcularIdade() {
		//var nascimento = document.forms["form-cadastro-candidato"]["dataNascimento"].value.split("/");
		var nascimento = document.getElementById("inputDataNascimento").value.split("/");
	    //var nascimento = aniversario.split("/");
	    var dataNascimento = new Date(parseInt(nascimento[2], 10),
	    parseInt(nascimento[1], 10) - 1,
	    parseInt(nascimento[0], 10));
	    //var strResponsavel = "input type="text" class="form-control" id="idNomeResponsavel" name="NomeResponsavel" placeholder="Nome"";
	    var diferenca = Date.now() -  dataNascimento.getTime();
	    var idade = new Date(diferenca);

	    if (Math.abs(idade.getUTCFullYear() - 1970) < 18) {
	    	//document.getElementById("inputDataNascimento").value="";
			//document.getElementById("inputDataNascimento").style.backgroundColor = "#F08080";
			//document.getElementById("inputDataNascimento").focus();
			//document.getElementById("myModal").modal("show");
			//$("#myModal").modal();
			//$('#myModal').modal({show:true});
			//document.getElementById("idFormCadastroCandidatoNomeResponsavel").innerHTML = strResponsavel;
			document.getElementById("idFormResponsavel").style.visibility = "visible";
			if (!validarNomeResponsavel()) {
				return false;
			}
			//return false;
	    }
	    //return alert(Math.abs(idade.getUTCFullYear() - 1970));
	    //return Math.abs(idade.getUTCFullYear() - 1970);
	    return true;
	}
	
	if (!calcularIdade() || !validarNome() || !validarSobrenome() || !validarCPF()) {
		return false;
	}
}