<?php

    class Slide{
        

        public static function cadastrarSlider($fk_usuario,$nome,$img){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_site.slider` VALUES (null,?,?,?)");
            $sql->execute(array($fk_usuario,$nome,$img));
        }

        public function atualizarUsuario($nome,$senha,$imagem){
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?,senha = ?,img = ? WHERE usuario = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}
        }

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

        public static function select($table,$query = '',$arr = ''){
			if($query != false){
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetch();
        }

        
        public static function imagemValida($imagem){
			if($imagem['type'] == 'image/jpeg' ||
				$imagem['type'] == 'imagem/jpg' ||
				$imagem['type'] == 'imagem/png'){

				$tamanho = intval($imagem['size']/1024);
				if($tamanho < 300)
					return true;
				else
					return false;
			}else{
				return false;
			}
		}

        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_USUARIO.'/uploads/'.$imagemNome)) {
                return $imagemNome;
            }else{
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink('uploads/'.$file);
        }

        public static function deletar($tabela,$id=false){
			if($id == false){
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
			}else{
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE pk_slider = $id");
			}
			$sql->execute();
        }

        public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
        }
        
        public static function update_noticias($arr,$single = false){
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
					$sql = MySql::conectar()->prepare($query.' WHERE pk_depo=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}
    }
    