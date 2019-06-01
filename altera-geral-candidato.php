<?php
require_once("logica-candidato.php");
verificaCandidato();

$idResponsavel = $usuarioAtual["Responsavel_idResponsavel"];

$selectMasculino = "";
$selectFeminino = "";
if ($usuarioAtual["genero"] == "M") {
    $selectMasculino = "checked='checked'";
}
else{
    $selectFeminino = "checked='checked'";
}

$checkedAuditiva = "";
$checkedFala = "";
$checkedFisica = "";
$checkedIntelectual = "";
$checkedVisual = "";

$deficiencias = listaDeficienciasCandidato($conexao, $usuarioAtual["idCandidato"]);
foreach ($deficiencias as $def) {
    if ($def["tipo_deficiencia"] == "Auditiva") {
        $checkedAuditiva = "checked='checked'";
    }
    else
    if ($def["tipo_deficiencia"] == "Fala") {
        $checkedFala = "checked='checked'";
    }
    else
    if ($def["tipo_deficiencia"] == "Física") {
        $checkedFisica = "checked='checked'";
    }
    else
    if ($def["tipo_deficiencia"] == "Intelectual/Mental") {
        $checkedIntelectual = "checked='checked'";
    }
    else
    if ($def["tipo_deficiencia"] == "Visual") {
        $checkedVisual = "checked='checked'";
    }

$selectedDivorciado = "";
$selectedCasado = "";
$selectedSolteiro = "";
$selectedSeparado = "";
$selectedViuvo = "";

if (strcasecmp($usuarioAtual["estado_civil"], "Divorciado(a)") == 0) {
    $selectedDivorciado = "selected='selected'";
}
elseif (strcasecmp($usuarioAtual["estado_civil"], "Casado(a)") == 0) {
    $selectedCasado = "selected='selected'";
}
elseif (strcasecmp($usuarioAtual["estado_civil"], "Solteiro(a)") == 0) {
    $selectedSolteiro = "selected='selected'";
}
elseif (strcasecmp($usuarioAtual["estado_civil"], "Separado(a)") == 0) {
    $selectedSeparado = "selected='selected'";
}
elseif (strcasecmp($usuarioAtual["estado_civil"], "Viúvo(a)") == 0) {
    $selectedViuvo = "selected='selected'";
}

}

?>
<div class="border-bottom border-success" style="padding-top: 25px;">
    <h4 class="text-left font-weight-normal">Configurações básicas</h4>
    <p class="text-left font-weight-normal">Altere suas configurações básicas</p>
</div>

<form onsubmit="return validaAlteraGeralCandidato(<?php echo $idResponsavel; ?>);" action="update-candidato.php?geral-candidato" method="post">
    <input type="hidden" name="confirmaUpdate" value="yes">
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="idAlteraNomeCandidato">Candidato</label>
                <input type="text" class="form-control" maxlength="30" id="idAlteraNomeCandidato" value="<?php echo $usuarioAtual ["nome"]; ?>" name="nome" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraNome" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="idAlteraSobrenomeCandidato">Sobrenome</label>
                <input type="text" class="form-control" maxlength="30" value="<?php echo $usuarioAtual ["sobrenome"]; ?>" name="sobrenome" id="idAlteraSobrenomeCandidato" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraSobrenome" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="idAlteraCPF">CPF</label>
                <input type="text" id="idAlteraCPF" class="form-control" name="cpf" value="<?php echo $usuarioAtual ["cpf"]; ?>" style="min-width: 200px; max-width: 200px;">
                <small id="idSmallAlteraCPF" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="idAlteraNascimento">Data Nascimento</label>
                <input type="text" class="form-control" id="idAlteraNascimento" value="<?php echo $usuarioAtual ["data_nascimento"]; ?>" name="nascimento" style="min-width: 200px; max-width: 200px;">
                <small id="idSmallAlteraNascimento" class="form-text text-muted"></small>
            </div>
            <legend class="col-form-label col-sm-0 pt-0">Tipo(s) deficiência</legend>
            <div class="form-group col-md-0">
                <div class="form-check">
                    <input class="form-check-input" <?php echo $checkedAuditiva; ?> type="checkbox" name="DefAuditiva" id="idDefAuditiva" value="1">
                    <label class="form-check-label" for="idDefAuditiva">Auditiva</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $checkedFala; ?> type="checkbox" name="DefFala" id="idDefFala" value="2">
                    <label class="form-check-label" for="idDefFala">Fala</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $checkedFisica; ?> type="checkbox" name="DefFisica" id="idDefFisica" value="3">
                    <label class="form-check-label" for="idDefFisica">Física</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $checkedIntelectual; ?> type="checkbox" name="DefMental" id="idDefMental" value="4">
                    <label class="form-check-label" for="idDefMental">Intelectual/Mental</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $checkedVisual; ?> type="checkbox" name="DefVisual" id="idDefVisual" value="5">
                    <label class="form-check-label" for="idDefVisual">Visual</label>
                </div>
                <small id="idSmallDeficiencia" class="form-text text-danger"></small>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="idAlteraCid">CID</label>
                <input type="text" class="form-control" maxlength="45" id="idAlteraCid" value="<?php echo $usuarioAtual ["cid10"]; ?>" name="cid" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraCid" class="form-text text-muted"></small>
            </div>
            <legend class="col-form-label col-sm-0 pt-0">Gênero</legend>
            <div class="form-group col-md-0">
                <div class="form-check">
                    <input class="form-check-input" <?php echo $selectMasculino; ?> type="radio" name="gridGenero" id="idMasculino" value="M">
                    <label class="form-check-label" for="idMasculino">Masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $selectFeminino; ?> type="radio" name="gridGenero" id="idFeminino" value="F">
                    <label class="form-check-label" for="idFeminino">Feminino</label>
                </div>
                <small id="idSmallGenero" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label for="idAlteraEstadoCivil">Estado Civil</label>
                <select id="idAlteraEstadoCivil" name="estadoCivil" class="form-control" style="min-width: 200px; max-width: 200px;">
                    <option value="">Escolher...</option>
                    <option <?php echo $selectedSolteiro; ?> value="Solteiro(a)">Solteiro(a)</option>
                    <option <?php echo $selectedCasado; ?> value="Casado(a)">Casado(a)</option>
                    <option <?php echo $selectedSeparado; ?>value="Separado(a)">Separado(a)</option>
                    <option <?php echo $selectedDivorciado; ?> value="Divorciado(a)">Divorciado(a)</option>
                    <option <?php echo $selectedViuvo; ?> value="Viúvo(a)">Viúvo(a)</option>
                </select>
                <small id="idSmallEstadoCivil" class="form-text text-danger"></small>
            </div>      
            <div class="form-group">
                <label for="idAlteraEmailCandidato">E-mail</label>
                <input type="text" class="form-control" maxlength="45" name="email" value="<?php echo $usuarioAtual ["email"]; ?>" id="idAlteraEmailCandidato" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraEmail" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="idConfirmarEmailAlteradoCandidato">Confirmar E-mail</label>
                <input type="text" class="form-control" maxlength="45" id="idConfirmarEmailAlteradoCandidato" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallConfirmaEmail" class="form-text text-muted"></small>
            </div>
        </div>
    </div>  
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>