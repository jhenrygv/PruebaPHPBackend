<?php	
	class ClearPar {
		/**
		*  @param  string $str una entrada valor cadena formada por paréntesis.
		*  @return string una cadena limpia con los paréntesis en pares.
		*		   ejem->	input: "()())()"  output: "()()()"  
		*/
		function build($str) {
			$pila  = []; 
			$size  = strlen($str);
			$i     = 0;
			$str   = str_split($str);
			
			while ($i < $size) {
				if ($str[$i] == "(") {
					array_push($pila, $i);
				} elseif ($str[$i] == ")") {
					if (sizeof($pila)) {
						array_pop($pila);
					} else {
						array_splice($str, $i, 1);
						$i-=1;
						$size-=1;
					}
				}
				$i+=1;
			}
			
			foreach($pila as $v)
				array_splice($str, array_pop($pila), 1);
			
			return implode("", $str);		

		}
	}
?>