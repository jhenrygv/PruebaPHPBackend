<?php

$string = file_get_contents(__DIR__. "/../json/employees.json");
$model = json_decode($string, true);

// employees
$app->get('/employees', function ($request, $response, $args) use ($model) {
    return $this->renderer->render($response, 'employees.phtml', [
    	"result"   => $model, 
    	"base_url" => $request->getUri()->getBaseUrl(),
    ]);
});

$app->get('/employees/view/{id}', function ($request, $response, $args) use ($model) {
    
	$id = $args['id'];
	$key = array_search($id, array_column($model, 'id'));

    return $this->renderer->render($response, 'employee.phtml', [
    	"result" => $key!==false?$model[$key]:false, 
    	"base_url" => $request->getUri()->getBaseUrl(),
    ]);
    
});

$app->post('/employees/search_by_email', function ($request, $response) use ($model) {
	$base_url = $request->getUri()->getBaseUrl();
	$data = $request->getParsedBody();

	if (strlen(trim($data["email"])) ==0)
		return $response->withStatus(301)->withHeader('Location', $base_url);

	
	$result = array_filter($model, function ($item) use ($data) {
	    if (stripos($item["email"], $data["email"]) !== false) {
	        return true;
	    }
	    return false;
	});

    return $this->renderer->render($response, 'employee_finded_email.phtml', [
    	"result" => $result, 
    	"base_url" => $base_url,
    	"email"  => $data["email"]
    ]);
});