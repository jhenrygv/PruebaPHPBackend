<?php	
	class CompleteRange {
		/**
		*  @param  array $arr un arreglo de enteros positivos ordenados ascendentemente.
		*  @return array colección completa del arreglo de enteros ingresados. 
		*		   ejem->	input: [1, 2, 4, 5]   output:  [1, 2, 3​, 4, 5]  
		*/
		function build(array $arr) {
			try {
				
				for ($i = 0; $i < sizeof($arr); $i++) {
					if (!is_int($arr[$i]) || (is_int($arr[$i]) && $arr[$i] < 0)) {
						throw new Exception('El valor de la coleccion deben ser numeros enteros positivos.');
						
					}
				}
				
				$sorted = array_values($arr);
				sort($sorted);

				if ( $arr !== $sorted ) {
					throw new Exception('La coleccion de enteros deben estar ordenados ascendentemente.');
				}

				$out = [];
				if (sizeof($arr)) {
					$i = $arr[0]; 	
					do {
						$out[] = $i;
						$i++;
					} while ($i <= $arr[sizeof($arr)-1]);
				}
				return $out;
			} catch (Exeption $e) {
				echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			}
			return null;
		}
	}


?>