<?php

    class Solicitacao{

        public static function insert($arr){
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela')
                    continue;
                if ($value == '') {
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }
            $query.=")";
            if ($certo == true) {
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }

            return $certo;
        }

        public static function selectAll($tabela, $start = null, $end = null){
            if ($start == null && $end == null) {
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$end");  
            }
            $sql->execute(); 
            return $sql->fetchAll();
        }

        public static function update($arr,$single = false){
			$certo = true;
			$first = false;
			$nome_tabela = $arr['nome_tabela'];

			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				
				if($first == false){
					$first = true;
					$query.="$nome=?";
				}
				else{
					$query.=",$nome=?";
				}

				$parametros[] = $value;
			}

			if($certo == true){
				if($single == false){
					$parametros[] = $_GET['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE num_protocolo=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}

    }
    