<?php

if ( ! function_exists('gerarSenha'))
{
    function gerarSenha($tamanho = 8, $maiusculas = true, $numeros = true)
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';

        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
}

if ( ! function_exists('formataIngToBr'))
{
    function formataIngToBr($data='')
    {
        if($data):
            return (date('d/m/Y', strtotime($data)));
        else:
            return false;
        endif;
    }
}

if ( ! function_exists('formataDataHora'))
{
    function formataDataHora($texto='')
    {
        if($texto):
            return (date('d/m/Y H:i:s', strtotime($texto)));
        else:
            return false;
        endif;
    }
}

if ( ! function_exists('formataHora'))
{
    function formataHora($hora='')
    {
        if($hora):
            return (date('H:i', strtotime($hora)));
        else:
            return false;
        endif;
    }
}

if ( ! function_exists('formataValor'))
{
    function formataValor($valor='')
    {
        if($valor):
            return (number_format($valor,2,",","."));
        else:
            return False;
        endif;
    }
}

if ( ! function_exists('formataNumero'))
{
    function formataNumero($numero='', $zeros=3)
    {
        if($numero):
            return str_pad($numero, $zeros, "0", STR_PAD_LEFT);
        else:
            return False;
        endif;
    }
}

if ( ! function_exists('formataTemplateEmail'))
{
    function formataTemplateEmail($texto='', $variaveis=[])
    {
        if(!empty($texto) && !empty($variaveis)):
            
            foreach($variaveis as $chave => $valor):
                $texto = str_replace('{'.$chave.'}', $valor, $texto);
            endforeach;

            $texto = nl2br($texto);
            return $texto;
        else:
            return $texto;
        endif;
    }
}

if ( ! function_exists('enviarEmailSistema'))
{
    function enviarEmailSistema($PHPMailer=null, $config=[], $destinatario=null, $mensagem=null, $assunto=null, $anexo=null){
         
        $PHPMailer->isSMTP();
        $PHPMailer->IsHTML(true);
        $PHPMailer->SMTPDebug  = false;
        $PHPMailer->CharSet    = 'UTF-8';

        if (!empty($config)):
            $PHPMailer->From       = strtolower($config['usuario']);
            $PHPMailer->Host       = strtolower($config['servidor']);
            $PHPMailer->Username   = strtolower($config['usuario']);
            $PHPMailer->Password   = $config['senha'];
            $PHPMailer->Port       = $config['porta'];
            $PHPMailer->FromName   = $config['remetente'];

            if ($config['autenticacao'] == 'NONE'):
                $PHPMailer->SMTPSecure = '';
                $PHPMailer->SMTPAuth   = false;
            else:
                $PHPMailer->SMTPSecure = strtolower($config['autenticacao']);
                $PHPMailer->SMTPAuth   = true;
            endif;
        endif;

        $PHPMailer->addAddress($destinatario);
        $PHPMailer->Subject    = $assunto;
        $PHPMailer->Body       = $mensagem;

        if ($anexo):
            $PHPMailer->addAttachment($anexo, '');
        endif;
        
        if($PHPMailer->Send()):
            return true;
        else:
            return false;
        endif;
    }
}