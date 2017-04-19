<?php

$app->group('/api', function () {
    
    $this->get('', function ($request, $response, $args) {
        return $this->renderer->render($response, 'api.phtml', [	    	
	    	"base_url" => $request->getUri()->getBaseUrl(),
	    ]);
    });
    
    $this->get('/employees/get-by-range-salary', function ($request, $response, $args) {
    	try 
    	{   		    

    		$string = file_get_contents(__DIR__. "/../json/employees.json");
			$model = json_decode($string, true);

			$data = $request->getQueryParams();

			$result = array_filter($model, function ($item) use ($data) {
				$salary = preg_replace("/([^0-9\\.])/i", "", $item["salary"]);
				if ($salary >= $data["sal_min"] && $salary <= $data["sal_max"]   ) {
					return true;
				}
				return false;
			});
		
			$newResponse = $response->withHeader('Content-type', "application/xml");

	        $xml = new SimpleXMLElement('<root/>');	      	
		    foreach ($result as $r) {
		        $item = $xml->addChild('item');
		        $item->addChild('id', $r['id']);
		        $item->addChild('isOnline', $r['isOnline']);
		        $item->addChild('salary', $r['salary']);
		        $item->addChild('age', $r['age']); 
		        $item->addChild('position', $r['position']); 
		        $item->addChild('name', $r['name']); 
		        $item->addChild('gender', $r['gender']); 
		        $item->addChild('email', $r['email']); 
		        $item->addChild('phone', $r['phone']); 
		        $item->addChild('address', $r['address']); 
		        $skills = $item->addChild('skills');
		        foreach ($r["skills"] as $key => $value) {
		        	$skill  = $skills->addChild('skill', $value["skill"]);
		        }
		    }

			$newResponse ->write( $xml->asXml() );
			return $newResponse;
    	} catch (Exception $e) {
    		$newResponse = $response->withStatus(400);
    		$newResponse ->withHeader('X-Status-Reason',  $e->getMessage());
    		return $newResponse;			
	  	}    	
    });
    
    
});