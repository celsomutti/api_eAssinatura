<?php

	include 'config.inc.php';
	ini_set('default_charset','UTF-8');
	 // Check whether username or password is set from android	
  if(isset($_POST['agente']))
  {
    // Innitialize Variable
    $agente = $_POST['agente'];

    // Query database for row exist or not
    $sql = "SELECT * FROM listagem_jornal WHERE cod_agente in (" . $agente . ") order by des_endereco";
    $stmt = $conn->prepare($sql);
    //$stmt->bindParam(':agente', $agente, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount())
    {
      $row_all = $stmt->fetchall(PDO::FETCH_ASSOC);
      header('Content-type: application/json');
      echo json_encode($row_all);	
    } elseif(!$stmt->rowCount()) {
      echo "false";
    }
  }
	
?>