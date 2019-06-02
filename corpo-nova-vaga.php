<?php

function corpoNovaVaga($titulo, $id) {
	$msg = '<?xml version="1.0" encoding="utf-8" ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" ><html lang="pt-br"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="encoding" content="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body bgcolor="#6f42c1" style="margin:0; height:100%;">
    <table style="height:100%;" width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#6f42c1">
<tr>
  <td align="center">    
    <!--[if (gte mso 9)|(IE)]>
    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td>
    <![endif]-->
    <table style="max-width:560px;" width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td align="center" height="82" valign="middle">
          </td>
        </tr>
    </table>

    <table style="max-width:560px; border-radius:4px;" width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td>

            <table style="border-radius:4px" width="100%" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#f2f2f2">
                <tr>
                  <td style="color:#4b97b9; font-size:24px; font-family:verdana, sans-serif; line-height:1em; padding:40px;" align="center">
                    
                    <div> 
                    </div>

                    <span style="line-height:1.5;">Nova vaga publicada</span>
                    <br>
                    <span style="font-size:15px; color:#4c4c4c;">Olá, selecionamos algumas oportunidades que podem lhe interessar</span>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#ffffff" style="color:#4c4c4c; font-size:12px; line-height:22px; font-family:verdana, sans-serif; padding:40px;">

                      <a href="https://pcdcurriculo.com.br/vaga.php?id='.$id.'" style="color:#000000; font-size:18px; text-decoration:none;">
                        '.$titulo.'</a><br>
                        <span style="color:#8c8c8c; font-size:12px"></span>
                  </td>
                </tr>
                <tr>
                  <td style="padding:40px 20px;" align="center"
                      class="es-m-txt-c" align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px;"> <span class="es-button-border es-button-border-2" style="border-style:solid;border-color:#5EC998;background:#5EC998;border-width:1px;display:inline-block;border-radius:5px;width:auto;"> <a href="https://www.pcdcurriculo.com.br" class="es-button es-button-1" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, arial, verdana, sans-serif;font-size:22px;color:#FFFFFF;border-style:solid;border-color:#5EC998;border-width:15px 25px 15px 25px;display:inline-block;background:#5EC998;border-radius:5px;font-weight:normal;font-style:normal;line-height:26px;width:auto;text-align:center;">Pesquisar mais vagas</a> </span>
                    <!--a target="_blank" href="https://www.pcdcurriculo.com.br" style="background-color:#4b97b9; border-radius:4px;color:#2f353e; color:#ffffff; display:inline-block; line-height:48px; text-align:center;text-decoration:none; text-transform:uppercase; font-family:verdana, sans-serif; font-size:13px; width:230px;">Pesquisar mais vagas</a-->
                    <table width="225" align="center">
                      <tr>
                        <td width="30" height="28">
                        </td>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td width="30" height="28">
                        </td>
                        <td>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>           
            
          </td>
        </tr>
    </table>

    &nbsp;
    <center style="margin:0 1%;">
    </center>
    &nbsp;
    
    <table style="max-width:560px;" width="98%" border="0" cellpadding="0" cellspacing="0" align="center">    
        <tr>
          <td align="center">
          </td>
        </tr>

        <tr>
            <td style="text-align:center; font-family:Arial; font-size:14px; color:#FFFFFF;">
              <br><br>
              Esta é uma mensagem automática. Por favor, não responda este e-mail.<br>
              <br>
              Você está recebendo este alerta de vaga pois ativou esta opção em seu cadastro.<br>
              <a href="https://pcdcurriculo.com.br/form-login-candidato.php" style="color:#DEDE26;">Acesse aqui</a> e altere a configuração de alerta de vagas para deixar de receber este e-mail.
            </td>
        </tr>
    </table>
    <br><br>
    <!--[if (gte mso 9)|(IE)]>
        </td>
      </tr>
    </table>
    <![endif]-->
  </td>
</tr>
</table>
  </body>
</html>';

return $msg;
}