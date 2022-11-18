<?php
if(isset($_SESSION['vlogin']) and isset($_SESSION['vsenha']))
{
{
	if(isset($_SESSION['sessao']))
	{
		$sessao = $_SESSION['sessao'];
		
		if($sessao != 'ok')
		{
			echo "<script>
			window.location.replace('../index.php');
		  </script>";
	}
}
}
}
?>