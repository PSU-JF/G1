<?php
	
if(isset($_GET['clase']) && isset($_GET['funcion']))
{
	$clase = $_GET['clase'];
	$funcion = $_GET['funcion'];
	llamar($clase,$funcion);
	}//fin if

	else
	{
		$clase = 'pagina';
		$funcion = 'home';
		llamar($clase,$funcion);
	}

	function llamar($clase, $funcion)
	{
		require_once("controlador/".$clase."_controlador.php");

		switch ($clase)
		{
			case 'pagina'://insta
			$control = new Diseno();
			break;
		}//fin switch

		$control->{$funcion}();
	}


?>