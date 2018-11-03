<?php

$conexao = mysqli_connect('localhost', 'root', 'root', 'trampoadmin_bd');
mysqli_set_charset($conexao,"utf8");
mysqli_query($conexao, "SET lc_time_names = 'pt_BR';"); 