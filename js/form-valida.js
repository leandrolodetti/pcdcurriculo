$("#inputDataNascimento").mask("00/00/0000");
$("#idNascResponsavel").mask("00/00/0000");
$("#cep").mask("00000-000");
$("#idCpf").mask("000.000.000-00");
$("#idCpfResponsavel").mask("000.000.000-00");
$("#idContato").mask("(00)000000000");
$("#idContatoEmpresa").mask("(00)000000000");
$("#idContatoResponsavel").mask("(00)000000000");
$("#idAlteraContatoCandidato").mask("(00)000000000");
$("#inputNumero").mask("00000");
$("#idFormLoginCnpj").mask("00.000.000/0000-00");
$("#idCNPJ").mask("00.000.000/0000-00");
$("#idAlteraCnpj").mask("00.000.000/0000-00");

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
	        //if (document.getElementById("rua").value == "...") {document.getElementById("rua").value=(conteudo.logradouro);}
	        //if (document.getElementById("bairro").value == "...") {document.getElementById("bairro").value=(conteudo.bairro);}
        document.getElementById("rua").value=(conteudo.logradouro);
        document.getElementById("bairro").value=(conteudo.bairro);
        document.getElementById("cidade").value=(conteudo.localidade);
        document.getElementById("uf").value=(conteudo.uf);
      // 	if (document.getElementById("cidade").value == "...") {document.getElementById("cidade").value=(conteudo.localidade);}
      //  if (document.getElementById("uf").value == "...") {document.getElementById("uf").value=(conteudo.uf);}
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
	        	/*
	        	//var y = document.getElementById("idSmallCep");
	            //Preenche os campos com "..." enquanto consulta webservice.
	            if (document.getElementById("rua").value == "") {document.getElementById("rua").value="...";}
	            if (document.getElementById("bairro").value == "") {document.getElementById("bairro").value="...";}
	            //document.getElementById('rua').value="...";
	            //document.getElementById('bairro').value="...";
	            if (document.getElementById("cidade").value == "") {document.getElementById("cidade").value="...";}
	            if (document.getElementById("uf").value == "") {document.getElementById("uf").value="...";}
	            //document.getElementById('ibge').value="...";
				*/
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

function validarEstadoCivil(idErro, msg) {
	var solteiro = document.getElementById("idSolteiro");
	var casado = document.getElementById("idCasado");
	var separado = document.getElementById("idSeparado");
	var divorciado = document.getElementById("idDivorciado");
	var viuvo = document.getElementById("idViuvo");
	var y = document.getElementById(idErro);

	if ((solteiro.checked == true) || 
		(casado.checked == true) ||
		(separado.checked == true) ||
		(divorciado.checked == true) ||
		(viuvo.checked == true)
	   ) {
		y.innerHTML = "";
		return true;
	}
	else{
		y.innerHTML = msg;
		return false;
	}
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

function calcularIdadeResponsavel(id) {
	var id1 = document.getElementById(id);
	var nascimento = document.getElementById(id).value.split("/");
	//document.getElementById("idFormResponsavel").style.visibility = "hidden";
    var dataNascimento = new Date(parseInt(nascimento[2], 10),
    parseInt(nascimento[1], 10) - 1,
    parseInt(nascimento[0], 10));
    var diferenca = Date.now() -  dataNascimento.getTime();
    var idade = new Date(diferenca);

    if (Math.abs(idade.getUTCFullYear() - 1970) < 18) {
    	id1.style.backgroundColor = "#F08080";
    	id1.focus();
    	alert("Idade do responsável inferior a 18 anos!");
    	return false;
    }
    else{
		id1.style.backgroundColor = "white";
		return true;
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

function confirmarEmail(id, id2, idErro, msg) {
	if (erroEmail == "" && confirmarCampo(id, id2, idErro, msg)) {
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

function validarCNPJ(id, idErro, msg) {
 	var cnpj = document.getElementById(id).value;
 	var y = document.getElementById(idErro);

    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') {
    	document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;
    }
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj.length != 14 ||
    	cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999") {

    	document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;
    }
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)) {
    	document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;
    }
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)) {
    	document.getElementById(id).style.backgroundColor = "#F08080";
		document.getElementById(id).focus();
		y.innerHTML = msg;
		return false;
    }
    y.innerHTML = "";
	document.getElementById(id).style.backgroundColor = "white";
	return true;
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
	var id1 = document.getElementById(id);
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

    	document.getElementById("idLabelNascResponsavel").innerHTML = "";
    	document.getElementById("idNascResponsavel").setAttribute("type", "hidden");

    	id1.style.backgroundColor = "#F08080";
    	id1.focus();
    	alert("Idade inferior a 16 anos!");
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

		document.getElementById("idLabelEmailResponsavel").innerHTML = "E-mail do responsável";
    	document.getElementById("idEmailResponsavel").setAttribute("type", "text");

    	document.getElementById("idLabelNascResponsavel").innerHTML = "Data nascimento";
    	document.getElementById("idNascResponsavel").setAttribute("type", "text");
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
	   	 	!diferencaCampo("idContato","idContatoResponsavel","idSmallContatoResponsavel","Contato igual do candidato") ||
	   	 	!validarEmail("idEmailResponsavel", "idSmallEmailResponsavel", "E-mail Inválido") ||
	   	 	!diferencaCampo("idEmail","idEmailResponsavel","idSmallEmailResponsavel","E-mail igual do candidato") ||
	   	 	!validaNumCaracteres("idNascResponsavel","idSmallNascResponsavel",10,"Data Inválida") ||
	   	 	!calcularIdadeResponsavel("idNascResponsavel")
	   	 	) {
	   		return false;
	   	}
	   	y.innerHTML = "";
		id2.style.backgroundColor = "white";
	   	return true;
	}
	return true;
}

function validarNascimento() {
	if (calcularIdade("inputDataNascimento")) {
		return true;
	}
	return false;
}

function validarCep() {
	pesquisacep();
	if (erroCep == "") {
		return true;
	}
	return false;
}

function validarSenha(id, idErro, tamanho, msg) {
	if (validaNumCaracteres(id, idErro, 6, msg)) {
		erroSenha="";
		return true;
	}
	erroSenha="true";
	return false;
}

function confirmarSenha(id, id2, idErro, msg) {
	if (erroSenha == "") {
		if (confirmarCampo(id, id2, idErro, msg)) {
			return true;
		}
	}
	return false;
}

function validaSelect(id, idErro, msg) {
	var y = document.getElementById(idErro);
	var x = document.getElementById(id);
	if (x.value=="") {
		x.style.backgroundColor = "#F08080";
		x.focus();
		y.innerHTML = msg;
		return false;
	}
	x.style.backgroundColor = white;
	y.innerHTML = "";
	return true;
}

function validaForm() {

	if (!validaNumCaracteres("idNome","idSmallNome",3,"Nome inválido") || //validar nome candidato
		!validaNumCaracteres("idSobrenome","idSmallSobrenome",3,"Sobrenome inválido") || //validar sobrenome candidato
		!validaNumCaracteres("inputDataNascimento","idSmallNascimento",10,"Data Inválida") || //validar data nascimento candidato
		!validaNumCaracteres("idContato","idSmallContato",12,"Número inválido") || //validar contato candidato
		!validarGenero("idMasculino","idFeminino","idSmallGenero","Selecione uma opção!") ||
		!validarCPF("idCpf","idSmallCpf","CPF Inválido") ||
		!validarEmail("idEmail","idSmallEmail","E-mail Inválido") ||
		!confirmarEmail("idEmail","idConfirmarEmail","idSmallConfirmaEmail","E-mails não conferem!") ||
		!validarEstadoCivil("idSmallEstadoCivil", "Selecione uma opção!") || //validar estado civil
		!validarCep() ||
		!validaNumCaracteres("rua", "idSmallEndereco", 3, "Endereço Inválido") || //validar logradouro candidato
		!validaNumCaracteres("inputNumero", "idSmallNumero", 1, "Número Inválido") || //validar numero logradouro candidato
		!validaNumCaracteres("bairro", "idSmallBairro", 3, "Campo Inválido") || //validar bairro candidato
		!validarDeficiencia("idSmallDeficiencia","Selecione uma opção") ||
		!validaNumCaracteres("idCid","idSmallCid",3,"Código inválido") ||
		!validarSenha("idSenha1", "idSmallSenha", 6, "Campo Inválido") ||
		!confirmarSenha("idSenha1", "idConfirmarSenha", "idSmallConfirmaSenha", "Senhas não conferem!") ||
		!validarNascimento()
		) {
		return false;
	}
	return true;
}

function validaFormAlteraContato() {
	if (!validarCep()) {
		return false;
	}
	return true;
}

function validaFormEmpresa() {
	if (!validaNumCaracteres("idRazaoSocial","idSmallRazaoSocial",3,"Razão social inválida") ||
		!validaNumCaracteres("idFantasia","idSmallFantasia",3,"Nome fantasia inválido") ||
		!validaNumCaracteres("idContatoEmpresa","idSmallContatoEmpresa",12,"Número inválido") ||
		!validarCNPJ("idCNPJ", "idSmallCnpj", "CNPJ inválido") ||
		!validarEmail("idEmailEmpresa", "idSmallEmailEmpresa", "E-mail Inválido") || //validar email empresa
		!confirmarEmail("idEmailEmpresa","idConfirmarEmailEmpresa","idSmallConfirmaEmailEmpresa","E-mails não conferem!") ||
		!validaNumCaracteres("idResponsavelEmpresa","idSmallResponsavelEmpresa",3,"Nome inválido") ||
		!validarCep() ||
		!validaNumCaracteres("rua", "idSmallEnderecoEmpresa", 3, "Endereço Inválido") ||
		!validaNumCaracteres("inputNumeroEmpresa", "idSmallNumeroEmpresa", 1, "Número Inválido") ||
		!validaNumCaracteres("bairro", "idSmallBairroEmpresa", 3, "Campo Inválido") ||
		!validaNumCaracteres("idRamoAtividade","idSmallRamoAtividade",3,"Campo inválido") || //validar ramo de atividade
		!validarSenha("idSenhaEmpresa1", "idSmallSenhaEmpresa", 6, "Campo Inválido") || //validar senha empresa
		!confirmarSenha("idSenhaEmpresa1", "idConfirmarSenhaEmpresa", "idSmallConfirmaSenhaEmpresa", "Senhas não conferem!")
		) {
		return false;
	}
	return true;
}

function validaAlteraGeralEmpresa() {
	if (!validaNumCaracteres("idAlteraRazaoSocial","idSmallRazaoSocial",3,"Razão social inválida") ||
		!validaNumCaracteres("idAlteraFantasia","idSmallFantasia",3,"Nome fantasia inválido") ||
		!validarCNPJ("idAlteraCnpj", "idSmallCnpj", "CNPJ inválido") ||
		!validarEmail("idAlteraEmailEmpresa", "idSmallEmailEmpresa", "E-mail Inválido") ||
		!confirmarEmail("idAlteraEmailEmpresa","idConfirmarEmailEmpresa","idSmallConfirmaEmailEmpresa","E-mails não conferem!")
		) {
		return false;
	}
	return true;
}

function validaCadastroVaga() {
	if (!validaNumCaracteres("idTituloVaga","idSmallTituloVaga",3,"Campo inválido") ||
 		!validaNumCaracteres("idVagaDescricao","idSmallDescricaoVaga",5,"Campo inválido") ||
 		!validaNumCaracteres("idVagaRequisito","idSmallRequisitoVaga",5,"Campo inválido") ||
 		!validaNumCaracteres("idVagaBeneficio","idSmallBeneficioVaga",5,"Campo inválido") ||
 		!validaNumCaracteres("idVagaCargaHoraria","idSmallCargaHoraria",5,"Campo inválido") ||
 		!validaNumCaracteres("idVagaSalario","idSmallSalario",3,"Campo inválido")
		) {
		return false;
	}
	return true;
}