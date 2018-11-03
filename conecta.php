<?php

$conexao = mysqli_connect('mysql942.umbler.com:41890', 'erick.nishimoto', 'Ehn*170890', 'erick_bd');
mysqli_set_charset($conexao,"utf8");
mysqli_query($conexao, "SET lc_time_names = 'pt_BR';"); 