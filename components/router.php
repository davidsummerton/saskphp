<?php


class Router {
    
    private $routes = array();
    private $matchfound = false;
    
    
    public function add($pattern, $action) {

        $pattern = strtolower('/' . trim($pattern,'/'));

        $pattern = str_replace(':i', '(\d+)', $pattern);
        $pattern = str_replace(':s', '([A-Za-z0-9\-\_]+)', $pattern);

        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$pattern] = $action;
    }
    

    public function route() {


        $url = strtolower($_SERVER['REQUEST_URI']);
        $base = BASE_DIR; //str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));


        if (strpos($url, $base) === 0) {
            $url = substr($url, strlen($base));
        }

        $url = '/' . trim($url, '/');

        foreach ($this->routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);

                $actions = explode('/',$callback);
                $class = $actions[0];
                $function = $actions[1];

                $this->matchfound = true;

                
                $route = new $class();
                call_user_func_array(array($route, $function), array_values($params));

            }

        }

        if(!$this->matchfound) {
            System::redirect(BASE_DIR . NOTFOUND_URI);
        }

    }

    public function notfound ($file = null) {
        header('HTTP/1.0 404 Not Found');
        if (is_null($file)) {
            exit("<h1>404 Not Found</h1>\nThe page that you have requested could not be found.");
        } else {
            include_once($file);
            exit;
        }
    }
}

?>