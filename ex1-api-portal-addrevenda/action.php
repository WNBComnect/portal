<?php
    /*AUTENTICAÇÃO*/
    $emailAuth = '***';
    $wspassword = '***';

    /*DADOS REVENDA*/
    $razao = $_POST['razao'];
    $fantasia = $_POST['fantasia'];
    $email= filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $cnpj = $_POST['cnpj'];
    $responsavel = $_POST['responsavel'];
    
try{ 
    $url = "http://portal2.comnect.com.br/webservice2/wsdl";

    $soapclient = new SoapClient($url);
    $credenciais = array('email'=>$emailAuth, 'wspassword'=>$wspassword);

    $dadosrevenda = array(
        'razao'=>$razao,
        'fantasia'=>$fantasia,
        'email'=>$email,
        'cnpj'=>$cnpj,
        'responsavel'=>$responsavel
    );
        
    $response = $soapclient->addrevenda($credenciais, $dadosrevenda);

    print_r($response);

    exit; 

}catch(Exception $e){
    echo $e->getMessage();
}

?>
