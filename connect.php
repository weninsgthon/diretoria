<?php
$dbstr ="(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.4.3)(PORT = 1521))
(CONNECT_DATA =
(SERVER = DEDICATED)
(SERVICE_NAME = agricola)
))";

if($conn0 = oci_connect('agricola','0000d121c554', $dbstr)):
		//	print "conectao";

	else:
			print "ERRO NA CONEXAO";
	endif;
		
?>