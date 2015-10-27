<?php

/* *************************************************************** */
include_once("connection/conexao.class.php");
$conexao = Conexao::getInstance();
/* *************************************************************** */

function validaCPF($cpf = null) {
 
    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina possivel mascara
    $cpf = ereg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}

function dataAtendimento($nome){
	$inicialNome = mb_strtoupper(substr($nome, 0, 1),'utf8');
	$numeroCorrespondente = NULL;
	switch($inicialNome){
		case 'A': $numeroCorrespondente = 1; break;
		case 'B': $numeroCorrespondente = 2; break;
		case 'C': $numeroCorrespondente = 3; break;
		case 'D': $numeroCorrespondente = 4; break;
		case 'E': $numeroCorrespondente = 5; break;
		case 'F': $numeroCorrespondente = 6; break;
		case 'G': $numeroCorrespondente = 7; break;
		case 'H': $numeroCorrespondente = 8; break;
		case 'I': $numeroCorrespondente = 9; break;
		case 'J': $numeroCorrespondente = 10; break;
		case 'K': $numeroCorrespondente = 11; break;
		case 'L': $numeroCorrespondente = 12; break;
		case 'M': $numeroCorrespondente = 13; break;
		case 'N': $numeroCorrespondente = 14; break;
		case 'O': $numeroCorrespondente = 15; break;
		case 'P': $numeroCorrespondente = 16; break;
		case 'Q': $numeroCorrespondente = 17; break;
		case 'R': $numeroCorrespondente = 18; break;
		case 'S': $numeroCorrespondente = 19; break;
		case 'T': $numeroCorrespondente = 20; break;
		case 'U': $numeroCorrespondente = 21; break;
		case 'V': $numeroCorrespondente = 22; break;
		case 'W': $numeroCorrespondente = 23; break;
		case 'X': $numeroCorrespondente = 24; break;
		case 'Y': $numeroCorrespondente = 25; break;
		case 'Z': $numeroCorrespondente = 26; break;
		default: $numeroCorrespondente = 0;
	}
	return $numeroCorrespondente;
}


$errors = array(); // array to hold validation errors
$data   = array(); // array to pass back data

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cpf'])) {
	if($conexao->getStatus()){
		$cpf = $_POST['cpf'];
		//$cpf = '018.664.061-75';
	
		if (empty($cpf)) {
			$errors['cpf'] = 'Desculpe! Informe o número do CPF.';
		}
		else if (validaCPF($cpf)){	
			$preparedCPF = str_replace('-','',str_replace('.','',$cpf));
		
			//$sql = "SELECT s.nome, a.numero, IF(a.nome='', 'Servidor já possui conta na CAIXA ECONÔMICA e receberá seu salário nessa conta.', a.nome) as agencia, IF(a.telefone='','',a.telefone) as telefone, IF(a.endereco='','',a.endereco) as endereco FROM servidores s INNER JOIN agencias a WHERE s.cpf='".$preparedCPF."' LIMIT 1";
			
			$sql = "SELECT nome, numero, agencia, IF(telefone='','',telefone) as telefone, IF(endereco='','',endereco) as endereco, IF(gerente='','',gerente) as gerente, novaconta FROM lista WHERE cpf='".$preparedCPF."' LIMIT 1";	
			
			$query = $conexao->selectQuery($sql);
			if($query){
				if($query->num_rows > 0){
					$result = $query->fetch_object();
					$nomeServidor = $result->nome;
					$numeroAgencia = $result->numero;
					$nomeAgencia = $result->agencia;
					$telefoneAgencia = $result->telefone;
					$enderecoAgencia = $result->endereco;
					$gerenteAgencia = $result->gerente;
					$checkContaNova = $result->novaconta;
					
					$mensagemP1 = "<p class='text-center'>Sr(a). <strong>$nomeServidor</strong><br />OBRIGADO POR JÁ SER NOSSO CLIENTE!<br /></p><br /><p class='text-justify mensagem'>Identificamos que você já possui conta corrente na CAIXA - $nomeAgencia ($numeroAgencia), portanto, não precisa se preocupar. Se você ainda não recebia seu salário por esta conta, a partir de agora você receberá por ela. Se já recebia, PARABÉNS, não sofrerá alteração. Nenhum procedimento a mais é necessário e você também terá direito aos novos benefícios exclusivos para os servidores de Aparecida!</p><p class='text-justify mensagem'>Qualquer dúvida, entre em contato com sua agência de relacionamento ou procure uma agência da CAIXA em Aparecida de Goiânia entre os dias <strong>";
					$mensagemP2 = "";
					$mensagemP3 = ", das 9:00hs às 11:00hs ou das 16:30hs às 18:00hs</strong>, onde você terá atendimento especial! Informações também podem ser obtidas com o RH da Prefeitura.</p>";
					
					$mensagemNovaP1 = "<p class='text-center'>Sr(a). <strong>$nomeServidor</strong><br />BEM-VINDO À CAIXA! VOCÊ AGORA POSSUI UMA CONTA EM NOSSO BANCO!<br />Confira abaixo a sua nova agência bancária:</p><br /><p class='text-center text-danger'><em>Agência</em>: <strong>$numeroAgencia - $nomeAgencia</strong><br /><em>Gerente</em>: $gerenteAgencia<br /><em>Endereço</em>: $enderecoAgencia<br /><em>Telefone</em>: $telefoneAgencia</p><br /><p class='text-justify mensagem'>Sr(a). $nomeServidor, constatamos que você não possuía conta na CAIXA, por isso, automaticamente, abrimos uma conta para você na $nomeAgencia. Porém, é necessário fazer a atualização do seu cadastro. Para tanto, estamos disponibilizando dias e horários especiais para antendê-lo(a). Faça o download e imprima a <a href='#ficha'><span><strong>Ficha de Pré-Cadastro</strong></span></a> e leve-a preenchida à sua nova agência de relacionamento ($nomeAgencia) entre os dias <strong>";
					$mensagemNovaP2 = "";
					$mensagemNovaP3 = ", das 9:00hs às 11:00hs ou das 16:30hs às 18:00hs</strong>, para proceder com a regularização da sua conta.</p><p class='text-justify mensagem'>Qualquer dúvida, entre em contato com sua nova agência de relacionamento ou procure qualquer agência da CAIXA em Aparecida de Goiânia. Informações também podem ser obtidas com o RH da Prefeitura.</p>";
					
					if(!$checkContaNova && dataAtendimento($nomeServidor)<12){
						$mensagemP2 = "09/02 a 13/02";
					}
					else if(!$checkContaNova && dataAtendimento($nomeServidor)>11){
						$mensagemP2 = "18/02 a 24/02";
					}
					else {
						if(dataAtendimento($nomeServidor)<12){
							$mensagemNovaP2 = "09/02 a 13/02";
						}
						else{
							$mensagemNovaP2 = "18/02 a 24/02";
						}
						
						$data['messageNova'] = $mensagemNovaP1.$mensagemNovaP2.$mensagemNovaP3;
					}
					$data['messageExistente'] = $mensagemP1.$mensagemP2.$mensagemP3;
				}
				else{
					$errors['cpfQueryNotFound'] = 'Desculpe! Nenhuma informação foi encontrada para o CPF <strong>'.$cpf.'</strong> em nossa base de dados. Pode ser que você seja um servidor novo na prefeitura ou que tenha informado o CPF errado. Verifique o CPF digitado e caso este erro persista entre em contato com o RH solicitando a conferência dos seus dados cadastrais.';
				}
			}
			else{
				$errors['cpfQuery'] = 'Desculpe! Devido a um erro interno não foi possível realizar a consulta. Informe o problema à DTI e/ou tente novamente mais tarde.';
			}
		}
		else{
			$errors['cpf'] = 'Por favor, digite um número de CPF válido.';
		}	
		
	}
	else {
		$errors['cpfQuery'] = 'Desculpe! Devido a um erro interno não foi possível conectar à base de dados. Informe o problema à DTI e/ou tente novamente mais tarde.';
	}
	
	// if there are any errors in our errors array, return a success boolean or false
	if (!empty($errors)) {
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		$data['success'] = true;
	}
    // return all our data to an AJAX call
    echo json_encode($data);
}
else{ return false; }