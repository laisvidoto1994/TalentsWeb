<?php

require_once('../../model/basica/empresa.php');
require_once('../../controller/fachada.php');

session_name('sessao');
session_start();

try{
	$fachada = Fachada::getInstance();

	$cnpj = $_POST['cnpj'];
	$razao_social = $_POST['razaosocial'];
	$nome_fantasia = $_POST['nomefantasia'];
	$porte = $_POST['porte'];
	$area_atuacao = $_POST['areaatuacao'];
	$responsavel = $_POST['responsavel'];
	$telefone = $_POST['telefone'];
	$site = $_POST['site'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$empresa = new Empresa();
	$empresa->setNrCnpj($cnpj);
	$empresa->setDsRazaoSocial($razao_social);
	$empresa->setDsNomeFantasia($nome_fantasia);
	$empresa->setNrPorte($porte);
	$empresa->setDsAreaAtuacao($area_atuacao);
	$empresa->setDsResponsavelCadastro($responsavel);   
	$empresa->setDsSite($site);
	$empresa->setDsTelefone($telefone);
	$empresa->setDsEmail($email);
	$empresa->setDsSenha($senha);

	$array = $fachada->empresaCadastrar($empresa);

	foreach ($array as $key => $value) {
	    if ($key == 'sucess'){
	    	$empresalogada = $fachada->empresaLogar($empresa->getDsEmail(), $empresa->getDsSenha());

	    	foreach ($empresalogada as $key => $value) {
			    if ($key == 'sucess'){
			        $_SESSION['empresaLogada'] = json_decode(json_encode($value), true);
			    }else{
			        echo $value;
			        exit;   
			    }
			}
	        echo 1;
	    }else{
	        echo $value; 
	    }
	}
}catch(Exception $e){
	echo $e->getMessage();
}

?>
