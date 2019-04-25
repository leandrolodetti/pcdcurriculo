$("#inputDataNascimento").mask("00/00/0000");
$("#cep").mask("00000-000");
$("#idCpf").mask("000.000.000-00");
$("#idCpfResponsavel").mask("000.000.000-00");
$("#idContato").mask("(00)000000000");
$("#idContatoResponsavel").mask("(00)000000000");
$("#idAlteraContatoCandidato").mask("(00)000000000");
$("#inputNumero").mask("00000");

var erroCep = "";
var erroSenha = "";
var erroEmail = "";

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
	y.innerHTML = "";
	x.style.backgroundColor = "white";
	return true;
}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById("rua").value="";
    document.getElementById("bairro").value="";
    document.getElementById("cidade").value="";
    document.getElementById("uf").value="";
    //document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
	var y = document.getElementById("idSmallCep");
    if (!("erro" in conteudo)) {

        //Atualiza os campos com os valores.
        if (document.getElementById("rua").value == "...") {document.getElementById("rua").value=(conteudo.logradouro);}
        if (document.getElementById("bairro").value == "...") {document.getElementById("bairro").value=(conteudo.bairro);}
        //document.getElementById("rua").value=(conteudo.logradouro);
        //document.getElementById("bairro").value=(conteudo.bairro);
        document.getElementById("cidade").value=(conteudo.localidade);
        document.getElementById("uf").value=(conteudo.uf);
        //document.getElementById('ibge').value=(conteudo.ibge);
        y.innerHTML = "";
        erroCep = "";
        //return true;
    }   //end if.
    else {
    	//var x = document.getElementById("cep");
        //var y = document.getElementById("idSmallCep");
        //CEP não Encontrado.
        limpa_formulário_cep();
        erroCep = "true";
        y.innerHTML = "CEP não encontrado.";
        //x.focus();
        //alert("CEP não encontrado.");
        //return false;
    }
}
      
function pesquisacep() {
	var x = document.getElementById("cep");
	var y = document.getElementById("idSmallCep");
	var valor = document.getElementById("cep").value;
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

	    //Verifica se campo cep possui valor informado.
	    if (cep != "") {
	        //Expressão regular para validar o CEP.
	        var validacep = /^[0-9]{8}$/;

	        //Valida o formato do CEP.
	        if(validacep.test(cep)) {
	        	//var y = document.getElementById("idSmallCep");
	            //Preenche os campos com "..." enquanto consulta webservice.
	            if (document.getElementById("rua").value == "") {document.getElementById("rua").value="...";}
	            if (document.getElementById("bairro").value == "") {document.getElementById("bairro").value="...";}
	            //document.getElementById('rua').value="...";
	            //document.getElementById('bairro').value="...";
	            document.getElementById('cidade').value="...";
	            document.getElementById('uf').value="...";
	            //document.getElementById('ibge').value="...";

	            //Cria um elemento javascript.
	            var script = document.createElement('script');

	            //Sincroniza com o callback.
	            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

	            //Insere script no documento e carrega o conteúdo.
	            document.body.appendChild(script);
	            //y.innerHTML = "";
	            //erroCep = "";
	        } //end if.   
	        else {
	            //cep é inválido.
	            limpa_formulário_cep();
	            x.focus();
	            erroCep = "true";
	            y.innerHTML = "CEP Inválido";
	            //x.blur();
	            //return false;
	            //alert("Formato de CEP inválido.");
	        }
	    } //end if.
	    
	    else {
	        //cep sem valor, limpa formulário.
	        limpa_formulário_cep();
	        x.focus();
	        erroCep = "true";
	        y.innerHTML = "CEP Inválido";
	        //x.blur();
	        //return false;
	    }
	x.blur();
}

function validarGenero(idM,idF,idErro,msg) {
	var idM = document.getElementById(idM);
	var idF = document.getElementById(idF);
	var y = document.getElementById(idErro);

	if ((idM.checked == true) || (idF.checked == true)) {
		y.innerHTML = "";
		return true;
	}
	else{
		y.innerHTML = msg;
		return false;
	}
}

function validarDeficiencia(idErro,msg) {
	var a = document.getElementById("idDefFisica");
	var b = document.getElementById("idDefAuditiva");
	var c = document.getElementById("idDefFala");
	var d = document.getElementById("idDefMental");
	var e = document.getElementById("idDefVisual");

	var y = document.getElementById(idErro);

	if (a.checked == true || b.checked == true || c.checked == true || d.checked == true || e.checked == true){
		y.innerHTML = "";
		return true;
	}
	else{
		y.innerHTML = msg;
		return false;
	}
}

function diferencaCampo(id1, id2, idErro, msg) {
	var id2 = document.getElementById(id2);
	var id1 = document.getElementById(id1);
	var y = document.getElementById(idErro);
	if (id1.value == id2.value) {
		id2.style.backgroundColor = "#F08080";
		id2.focus();
		y.innerHTML = msg;
		return false;
	}
	else{
		y.innerHTML = "";
		id2.style.backgroundColor = "white";
		return true;
	}
}

function validarEmail(id, idErro, msg) {
	var y = document.getElementById(idErro);
	var field = document.getElementById(id);
	usuario = field.value.substring(0, field.value.indexOf("@"));
	dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
	 
	if ((usuario.length >=1) &&
	    (dominio.length >=3) && 
	    (usuario.search("@")==-1) && 
	    (dominio.search("@")==-1) &&
	    (usuario.search(" ")==-1) && 
	    (dominio.search(" ")==-1) &&
	    (dominio.search(".")!=-1) &&      
	    (dominio.indexOf(".") >=1)&& 
	    (dominio.lastIndexOf(".") < dominio.length - 1)) {
		y.innerHTML = "";
		field.style.backgroundColor = "white";
		erroEmail="";
		return true;
		//document.getElementById("msgemail").innerHTML="E-mail válido";
		//alert("E-mail valido");
	}
	else{
		
		field.style.backgroundColor = "#F08080";
		field.focus();
		y.innerHTML = msg;
		erroEmail="true";
		return false;
		//document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
		//alert("E-mail invalido");
	}
}

function confirmarEmail() {
	if (erroEmail == "" && confirmarCampo("idEmail","idConfirmarEmail","idSmallConfirmaEmail","E-mails não conferem!")) {
		return true;
	}
	return false;
}

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
	y.innerHTML = "";
	document.getElementById(id).style.backgroundColor = "white";
	return true;
}

function confirmarCampo(id1, id2, idErro, msg) {
	var id2 = document.getElementById(id2);
	var id1 = document.getElementById(id1);
	var y = document.getElementById(idErro);
	if (id1.value != id2.value) {
		id2.style.backgroundColor = "#F08080";
		id2.focus();
		y.innerHTML = msg;
		return false;
	}
	else{
		y.innerHTML = "";
		id2.style.backgroundColor = "white";
		return true;
	}
}

function validarNomeResponsavel() {
	if (validaNumCaracteres("idNomeResponsavel","idSmallNomeResponsavel",3,"Nome inválido")) {
		return true;
	}
	return false;
}

function validarContatoResponsavel() {
	if (validaNumCaracteres("idContatoResponsavel","idSmallContatoResponsavel",12,"Número inválido")) {
		return true;
	}
	return false;
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
	    	document.getElementById("idFormResponsavel").style.visibility = "hidden";

	    	document.getElementById("idLabelNomeResponsavel").innerHTML = "";
	    	document.getElementById("idNomeResponsavel").setAttribute("type", "hidden");

	    	document.getElementById("idLabelCpfResponsavel").innerHTML = "";
	    	document.getElementById("idCpfResponsavel").setAttribute("type", "hidden");

	    	document.getElementById("idLabelContatoResponsavel").innerHTML = "";
	    	document.getElementById("idContatoResponsavel").setAttribute("type", "hidden");

	    	document.getElementById("idLabelEmailResponsavel").innerHTML = "";
	    	document.getElementById("idEmailResponsavel").setAttribute("type", "hidden");
	    	alert("Idade Inferior a 16 anos!");
	    	return false;
	    }
	    else
	    if (Math.abs(idade.getUTCFullYear() - 1970) < 18) {
	    	document.getElementById("idFormResponsavel").style.visibility = "visible";

	    	document.getElementById("idLabelNomeResponsavel").innerHTML = "Responsável";
	    	document.getElementById("idNomeResponsavel").setAttribute("type", "text");

	    	document.getElementById("idLabelCpfResponsavel").innerHTML = "CPF";
	    	document.getElementById("idCpfResponsavel").setAttribute("type", "text");

	    	document.getElementById("idLabelContatoResponsavel").innerHTML = "Contato";
	    	document.getElementById("idContatoResponsavel").setAttribute("type", "text");

			document.getElementById("idLabelEmailResponsavel").innerHTML = "E-mail Responsável";
	    	document.getElementById("idEmailResponsavel").setAttribute("type", "text");
	    	/*
	    	validarNomeResponsavel();
	    	validarCPF("idCpfResponsavel","idSmallCpfResponsavel","CPF Inválido");
	    	diferencaCampo("idCpf","idCpfResponsavel","idSmallCpfResponsavel","CPF igual do candidato");

	    	validarContatoResponsavel();

	    	validarEmail("idEmailResponsavel", "idSmallEmailResponsavel", "E-mail Inválido");
	    	diferencaCampo("idEmail","idEmailResponsavel","idSmallEmailResponsavel","E-mail igual do candidato");
			*/
	    	if (!validarNomeResponsavel() ||
	    	 	!validarCPF("idCpfResponsavel","idSmallCpfResponsavel","CPF Inválido") ||
	    	 	!diferencaCampo("idCpf","idCpfResponsavel","idSmallCpfResponsavel","CPF igual do candidato") ||
	    	 	!validarContatoResponsavel() ||
	    	 	!validarEmail("idEmailResponsavel", "idSmallEmailResponsavel", "E-mail Inválido") ||
	    	 	!diferencaCampo("idEmail","idEmailResponsavel","idSmallEmailResponsavel","E-mail igual do candidato")
	    	 	) {
	    		return false;
	    	}
	    	return true;
	    }
	    return true;
}

function validarNome() {
	if (validaNumCaracteres("idNome","idSmallNome",3,"Nome inválido")) {
		return true;
	}
	return false;
}

function validarSobrenome() {
	if (!validaNumCaracteres("idSobrenome","idSmallSobrenome",3,"Sobrenome inválido")) {
		return false;
	}
	return true;
}

function validarNascimento() {
	//validaNumCaracteres("inputDataNascimento","idSmallNascimento",10,"Data Inválida");
	if (calcularIdade("inputDataNascimento")) {
		return true;
	}
	return false;
}

function validarContato() {
	if (!validaNumCaracteres("idContato","idSmallContato",12,"Número inválido")) {
		return false;
	}
	return true;
}

function validarCep() {
	pesquisacep();
	if (erroCep == "") {
		return true;
	}
	return false;
}

function validarRua() {
	if (validaNumCaracteres("rua", "idSmallEndereco", 3, "Endereço Inválido")) {
		return true;
	}
	return false;
}

function validarNumero() {
	if (validaNumCaracteres("inputNumero", "idSmallNumero", 1, "Número Inválido")) {
		return true;
	}
	return false;
}

function validarBairro() {
	if (validaNumCaracteres("bairro", "idSmallBairro", 3, "Campo Inválido")) {
		return true;
	}
	return false;
}

function validarSenha() {
	if (validaNumCaracteres("idSenha1", "idSmallSenha", 6, "Campo Inválido")) {
		erroSenha="";
		return true;
	}
	erroSenha="true";
	return false;
}

function confirmarSenha() {
	if (erroSenha == "") {
		if (confirmarCampo("idSenha1","idConfirmarSenha","idSmallConfirmaSenha","Senhas não conferem!")) {
			return true;
		}
	}
	return false;
}

function validaForm() {
/*
	validarNome();
	validarSobrenome();
	validaNumCaracteres("inputDataNascimento","idSmallNascimento",10,"Data Inválida");
	validarContato();
	validarCPF("idCpf","idSmallCpf","CPF Inválido");
	validarEmail("idEmail","idSmallEmail","E-mail Inválido");
	confirmarEmail();
	validarCep();
	validarRua();
	validarNumero();
	validarBairro();
	validarSenha();
	confirmarSenha();
	validarGenero("idMasculino","idFeminino","idSmallGenero","Selecione uma opção!");
	//validarNascimento();
*/
	if (!validarNome() ||
		!validarSobrenome() ||
		!validaNumCaracteres("inputDataNascimento","idSmallNascimento",10,"Data Inválida") ||
		!validarContato() ||
		!validarGenero("idMasculino","idFeminino","idSmallGenero","Selecione uma opção!") ||
		!validarCPF("idCpf","idSmallCpf","CPF Inválido") ||
		!validarEmail("idEmail","idSmallEmail","E-mail Inválido") ||
		!confirmarEmail() ||
		!validarCep() ||
		/*!validarGenero("idMasculino","idFeminino","idSmallGenero","Selecione uma opção!") ||*/
		!validarRua() ||
		!validarNumero() ||
		!validarBairro() ||
		!validarDeficiencia("idSmallDeficiencia","Selecione uma opção") ||
		!validaNumCaracteres("idCid","idSmallCid",3,"Código inválido") ||
		!validarSenha() ||
		!confirmarSenha() ||
		!validarNascimento()
		) {
		return false;
	}
	return true;
}