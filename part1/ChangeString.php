<?php	
	class ChangeString {
		/**
		*  @param  string $str una entrada valor cadena.
		*  @return string cada letra de la cadena es reemplazada por la letra siguiente del alfabeto. 
		*		   ejem->	input:  "**Casa 52Z"  output: "**Dbtb​ 52A​"
		*/
		function build($str) {
			// asignamos a $abc las letras del abecedario.
			$abc  = "abcdefghijklmnñopqrstuvwxyz";
			// agregamos las mayúsculas del abc.
			$abc .= mb_strtoupper($abc);
			// consideramos también las tildes y su letra siguiente del abc.
			$tild = "ábéfíjópúv";
			// agregamos las tildes
			$abc .= $tild;
			// agregamos las tildes mayúsculas 
            $abc .= mb_strtoupper($tild);

			//arreglo con en resultado de los caracteres agregados.
			$out = [];
			// inicio del recorrido de cada carácter de la cadena ingresada.
			$i 	 = 0;
			// recorremos cada carácter desde su posición cero de la cadena ingresada
			while ($i < mb_strlen($str)) {
				// tomamos un carácter de la posición actual de $i en el bucle.
				$l = mb_substr($str,$i,1,"UTF-8");
				// ¿el carácter es una letra válida?, se considera ñ y tildes.
				if (preg_match('/^\p{L}+$/ui', $l)) {
					// si el carácter es z se agrega al resultado la primera letra "a", mayús/minús respectivamente.
					if ($l == "z" || $l == "Z")
						array_push($out, ($l == "z" ? "a": "A"));
					else
						// se agrega al resultado la siguiente letra del abecedario.
						array_push($out, mb_substr($abc,(mb_strpos($abc, $l)+1),1,"UTF-8"));
				} else {
					// se agrega el carácter de la posición actual en la cadena de entrada.
					array_push($out,$l);
				}
				// auto-incrementa en 1 el valor $i
				$i++;
			}
			// retornamos el resultado arreglo expresado en cadena.
			return implode("", $out);
		}
	} 

?>