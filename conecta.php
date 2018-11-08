<?php

@$conexao = mysqli_connect('mysql942.umbler.com:41890', 'erick.nishimoto', 'Ehn*170890', 'erick_bd') or die(
    header("Location: erro?mysql=".mysqli_connect_errno()));
mysqli_set_charset($conexao,"utf8");
mysqli_query($conexao, "SET lc_time_names = 'pt_BR';"); 