<?php

error_reporting(0);

$id = $_COOKIE['id'];
$sID = $_COOKIE['us_uuid'];
$country = $_COOKIE['country'];
include('conexao.php');

$sql = $pdo->query("SELECT * FROM (SELECT * FROM `$id` ORDER BY `sendid` DESC LIMIT 500) sub ORDER BY `sendid`");

$queryclean = "SELECT * FROM `$id` where `tag` != '' and `mensagem` != ''";
$conclear = mysqli_query($conexao, $queryclean);
$rowclear = mysqli_num_rows($conclear);

$queryclean2 = "SELECT * FROM `$id` where `tag` != '' and `img` != ''";
$conclear2 = mysqli_query($conexao, $queryclean2);
$rowclear2 = mysqli_num_rows($conclear2);

$queryclean3 = "SELECT * FROM `$id` where `tag` != '' and `video` != ''";
$conclear3 = mysqli_query($conexao, $queryclean3);
$rowclear3 = mysqli_num_rows($conclear3);

$queryclean4 = "SELECT * FROM `$id` where `tag` != '' and `file` != ''";
$conclear4 = mysqli_query($conexao, $queryclean4);
$rowclear4 = mysqli_num_rows($conclear4);

$queryC = "SELECT * FROM `$id` where `id` = '$sID'";
$sqlC = mysqli_query($conexao, $queryC);
$sqlCON = $conexao->query($queryC);
$rowC = mysqli_num_rows($sqlC);

$queryC2 = "SELECT * FROM `$id` where `id` = '$sID' and `Banido` = 'Sim';";
$sqlC2 = mysqli_query($conexao, $queryC2);
$sqlCON2 = $conexao->query($queryC2);
$rowC2 = mysqli_num_rows($sqlC2);

$queryAN = "SELECT * FROM `$id` where `tag` != '' and `anunciado` = '0'";
$resultAN = mysqli_query($conexao, $queryAN);
$rowAN = mysqli_num_rows($resultAN);

$queryAN2 = "SELECT * FROM `$id` where `salapublica` != '2' and `anunciado` = '0'";
$resultAN2 = mysqli_query($conexao, $queryAN2);
$rowAN2 = mysqli_num_rows($resultAN2);

if($rowC2 == 1) {
	if($country == "Brazil") {
	echo ("<p style='color: red; font-size: 20px;'>Erro de conexão: Você foi banido dessa sala. <br> <a href='index.php' style='list-style-type: none; color: green'>Clique aqui para ir à página principal.</a> </p>");
	} else {
		echo ("<p style='color: red; font-size: 20px;'>Connection error: You've been baned from this room. <br> <a href='index.php' style='list-style-type: none; color: green'>Click here to go to the main page.</a> </p>");
	}
} else {
if ($rowC == 0) {
	if($country == "Brazil") {
	echo ("<p style='color: red; font-size: 20px;'>Erro de conexão: Essa sala foi excluída ou você não faz parte dela. <br> <a href='index.php' style='list-style-type: none; color: green'>Clique aqui para ir à página principal.</a> </p>");
	exit();
	} else {
		echo ("<p style='color: red; font-size: 20px;'>Connection error: This room has been deleted or you're not part of it anymore. <br> <a href='index.php' style='list-style-type: none; color: green'>Click here to go to the main page.</a> </p>");
	exit();	
	}
} else {

	if($country == "Brazil") {
		echo ("<p style='text-align: center; color: darkcyan;'>Todas as mensagens enviadas são 100% criptografadas.</p>");
	} else {
		echo ("<p style='text-align: center; color: darkcyan;'>All the messages are 100% encrypted.</p>");
	}
	
	if($rowclear != 0 || $rowclear2 != 0 || $rowclear3 != 0 || $rowclear4 != 0 || $rowAN != 0 || $rowAN2 != 0) {

		foreach ($sql->fetchAll() as $key) {

			if($key['Cor'] == 1) {
				$cor = "yellow";
			}
			if($key['Cor'] == 2) {
				$cor = "red";
			}
			if($key['Cor'] == 3) {
				$cor = "lightblue";
			}
			if($key['Cor'] == 4) {
				$cor = "green";
			}
			if($key['Cor'] == 5) {
				$cor = "purple";
			}
			if($key['Cor'] == 6) {
				$cor = "orange";
			}
			if($key['Cor'] == 7) {
				$cor = "rgb(255,20,147)";
			}
			if($key['Cor'] == 8) {
				$cor =  "rgb(255,248,220)";
			}
			if($key['Cor'] == 9) {
				$cor = "white";
			}

			if($key['anunciado'] == '0' && $key['tag'] != "" && $key['saiu'] != "Sim") {
				if($country == "Brazil") {
				echo ("<main style='background-color: green;' class='entrou-saiu'>
				<p class='entrou'><span>".$key['tag']."</span> entrou na Sala</p>
			</main>");
				} else {
					echo ("<main style='background-color: green;' class='entrou-saiu'>
					<p class='entrou'><span>".$key['tag']."</span> joined in the room</p>
				</main>");	
				}
			}
			if($key['Banido'] == 'Sim' && $key['anunciado'] == '0') {
				if($country == "Brazil") {
				echo ("<main style='background-color: red;' class='entrou-saiu'>
				<p class='entrou'><span>".$key['user']."</span> foi banido da Sala</p>
			</main>");
				} else {
					echo ("<main style='background-color: red;' class='entrou-saiu'>
					<p class='entrou'><span>".$key['user']."</span> has been baned from the room</p>
				</main>");	
				}
			}
			if($key['saiu'] == 'Sim' && $key['anunciado'] == '0') {
				if($country == "Brazil") {
				echo ("<main style='background-color: #9B870C;' class='entrou-saiu'>
				<p class='entrou'><span>".$key['tag']."</span> saiu da Sala</p>
			</main>");	
				} else {
					echo ("<main style='background-color: #9B870C;' class='entrou-saiu'>
					<p class='entrou'><span>".$key['tag']."</span> left the room</p>
				</main>");	
				}
			}
			if($key['salapublica'] == '1' && $key['anunciado'] == '0') {
				if($country == "Brazil") {
				echo ("<main style='background-color: darkcyan' class='entrou-saiu'>
				<p class='entrou'>Essa sala agora é publica</p>
			</main>");	
				} else {
					echo ("<main style='background-color: darkcyan' class='entrou-saiu'>
				<p class='entrou'>This room is now public</p>
			</main>");
				}
			}
			if($key['salapublica'] == '0' && $key['anunciado'] == '0') {
				if($country == "Brazil") {
				echo ("<main style='background-color: #9B870C;' class='entrou-saiu'>
				<p class='entrou'>Essa sala agora é privada</p>
			</main>");	
				} else {
					echo ("<main style='background-color: #9B870C;' class='entrou-saiu'>
				<p class='entrou'>This room is now private</p>
			</main>");
				}
			}

			$userNickImg = $key['tag'];
			$queryShowImg = "SELECT * FROM `$id` where `id` = '$sID' and `tag` = '$userNickImg'";
			$conShowImg = mysqli_query($conexao, $queryShowImg);
			$rowShowImg = mysqli_num_rows($conShowImg);
	if($key['img'] != "") {
		if($rowShowImg == 0) { 
			echo "
			<main class='menssagemfirst1'>
			<main class='menssagem1'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<h1 style='margin-top: -50px; color: ".$cor."'>".$key['tag']."</h1>
				<a target='_blank' href='midia/".$key['img']."'><img draggable='false' style='margin-left: 5%; min-width: 90%; border-radius: 0px;' src='midia/".$key['img']."'></a>
			</main>
			<h2>".$key['horario']."</h2>
		</main>";
		} else {
			echo "
			<main class='menssagemfirst2'>
			<main class='menssagem2'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<a target='_blank' href='midia/".$key['img']."'><img draggable='false' style='margin-left: 5%; margin-top: -30px; min-width: 90%; max-width: 440px; border-radius: 0px;' src='midia/".$key['img']."'></a>
			</main>
			<h2>".$key['horario']."</h2>
		</main>";
		}
	}
	if($key['video'] != "") {
		if($rowShowImg != 1) { 
			echo "
			<main class='menssagemfirst1'>
			<main class='menssagem1'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<h1 style='margin-top: -50px; color: ".$cor."'>".$key['tag']."</h1>
				<a target='_blank' href='midia/".$key['video']."'><main class='play-button'><i class='fas fa-play-circle'></i></main><img draggable='false' style='margin-left: 5%; margin-top: -10px; min-width: 90%; max-width: 440px; border-radius: 0px;' src='imagens/black.jpg'></a>
			</main>
			<h2>".$key['horario']."</h2>
		</main>";
		} else {
			echo "
			<main class='menssagemfirst2'>
			<main class='menssagem2'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<a target='_blank' href='midia/".$key['video']."'><main class='play-button'><i class='fas fa-play-circle'></i></main><img draggable='false' style='margin-left: 5%; margin-top: -30px; min-width: 90%; max-width: 440px; border-radius: 0px;' src='imagens/black.jpg'></a>
				</main>
			<h2>".$key['horario']."</h2>
		</main>";
		}
	}
	if($key['file'] != "") {
		if($rowShowImg == 0) { 
			echo "
			<main class='menssagemfirst1'>
			<main style='background-color: rgb(128,128,0);' class='menssagem1'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<h1 style='margin-top: -50px; color: ".$cor."'>".$key['tag']."</h1>
				<a style='text-decoration: none;' target='_blank' href='midia/".$key['file']."'><p style='font-family: Arial; margin-top: -40px;'><span>".$key['filename']."<i style='font-size: 25px; margin-left: 5%;' class='fas fa-download'></i></span></p></a>
			</main>
			<h2>".$key['horario']."</h2>
		</main>";
		} else {
			echo "
			<main class='menssagemfirst2'>
			<main style='background-color: rgb(128,128,0);' class='menssagem2'>
				<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
				<a style='text-decoration: none;' target='_blank' href='midia/".$key['file']."'><p style='font-family: Arial; margin-top: -40px; text-align: center;'><span>".$key['filename']."<i style='font-size: 25px; margin-left: 5%;' class='fas fa-download'></i></span></p></a>
			</main>
			<h2>".$key['horario']."</h2>
		</main>";
		}
	}
	if($key['mensagem'] != "") {
				$keyone = $key['mensagem'];
				$queryENC = "SELECT * FROM `$id` where `Admin` = 'Sim'";
				$conENC = $conexao->query($queryENC);
			
				while($dadoENC = $conENC->fetch_array()) {
				$ciphering = "AES-128-CTR"; 
				$iv_length = openssl_cipher_iv_length($ciphering); 
				$options = 0;
				$decryption_iv = '1234567891011121';
				$decryption_key = $dadoENC['token']; 
				$firstdecrypt = openssl_decrypt($keyone, $ciphering, $decryption_key, $options, $decryption_iv);
				}
				
				$ciphering = "AES-128-CTR"; 
				$iv_length = openssl_cipher_iv_length($ciphering); 
				$options = 0;
				$decryption_iv = '1234567891011121';
				$decryption_key = "RHrND!g?6sL@u#Z7q=+nxJ%WtM'<vV{dm;Tf93_K2-()~`Y8S&utpZJy;s^!w`}G2jEBeYd~c-7QH.SWRDqkfAhT?@5xX&[N{V>Ubj>q<~;{9mzW?Gvs-KyQpYnhtd(6`a*ZcrTVNf%74^P/J#5SH:pW'S@4937#=mt5N}.6P8jxRK>)ck,nZ%T;s/qGMz{<b~_A]QCfL8vQtJc?!P7(dkpG*@Na{2Heu;/E#qs3Y_6}Xfb.CxW5[mTw]="; 
				$mensagemdec = openssl_decrypt($firstdecrypt, $ciphering, $decryption_key, $options, $decryption_iv);

				$send = $key['sendid'] - 1;
				$userNick = $key['tag'];
					$queryMSG = "SELECT * FROM `$id` where `sendid` = '$send' and `tag` = '$userNick' and `mensagem` != ''";
					$conMSG = mysqli_query($conexao, $queryMSG);
					$rowMSG = mysqli_num_rows($conMSG);
					$queryShowMsg = "SELECT * FROM `$id` where `id` = '$sID' and `tag` = '$userNick'";
					$conShowMsg = mysqli_query($conexao, $queryShowMsg);
					$rowShowMsg = mysqli_num_rows($conShowMsg);

					$mensagemhtml = htmlspecialchars($mensagemdec, ENT_QUOTES, 'UTF-8');

				$mensagemfinal = preg_replace(
					"~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
					"<a style='color: rgb(10, 0, 255); font-family: Arial' target='_blank' href=\"\\0\">\\0</a>", 
					$mensagemhtml);

					if($rowShowMsg == 0) {
						if($rowMSG == 0) {
								if($key['id'] = "BOT") {
									echo "
									<main class='menssagemfirst1'>
									<main class='menssagem1'>
										<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
										<h1 style='margin-top: -50px; color: ".$cor."'>".$key['tag']."</h1>
										<p style='font-family: Arial; margin-top: -30px;'>".$mensagemdec."</p>
									</main>
									<h2>".$key['horario']."</h2>
								</main>";
								} else {
									echo "
									<main class='menssagemfirst1'>
									<main class='menssagem1'>
										<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
										<h1 style='margin-top: -50px; color: ".$cor."'>".$key['tag']."</h1>
										<p style='font-family: Arial; margin-top: -30px;'>".$mensagemfinal."</p>
									<h2>".$key['horario']."</h2>
								</main>";	
								}	
				} else {
					echo "
					<main style='margin-top: 35px;' class='menssagemfirst1'>
					<main style='border-top-left-radius: 10px;' class='menssagem1'>
						<p style='font-family: Arial; margin-top: -30px;'>".$mensagemfinal."</p>
					</main>
					<h2>".$key['horario']."</h2>
				</main>
					";
					}
			} else {
				if($rowMSG == 0) {
							echo "
							<main class='menssagemfirst2'>
							<main class='menssagem2'>
								<img width='60' src='midia/".$key['profileimg']."' alt='perfil'>
								<p style='font-family: Arial; margin-top: -40px;'>".$mensagemfinal."</p>
							</main>
							<h2>".$key['horario']."</h2>
						</main>";
					} else {
								echo "
						<main style='margin-top: 40px;' class='menssagemfirst2'>
						<main style='border-top-right-radius: 10px;' class='menssagem2'>
						<p style='font-family: Arial; margin-top: -40px;'>".$mensagemfinal."</p>
						</main>
						<h2>".$key['horario']."</h2>
						</main>
						";	
					}	
			}
		}
	} 
	} else {
		if($country == "Brazil") {
			echo ("<br> <p style='color: orange; font-size: 20px; text-align: center;'>O chat foi limpo pelo Admin da sala.</p>");
		} else {
			echo ("<br> <p style='color: orange; font-size: 20px; text-align: center;'>The chat was clean by the room administrator.</p>");
		}
	} 
}
}



?>