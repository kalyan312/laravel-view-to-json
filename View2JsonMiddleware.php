<?php

namespace Khbd\view2json;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class View2JsonMiddleware
{
    private $config;

    public function __construct()
    {
        $this->config = (object) config('view2json');

        if(!isset($this->config->activate)){
            $this->config->activate = false;
        }
        if(!isset($this->config->secure_request)){
            $this->config->secure_request = false;
        }
        if(!isset($this->config->header_token)){
            $this->config->header_token = '';
        }
        if(!isset($this->config->response_shared_environment_data)){
            $this->config->response_shared_environment_data = false;
        }
    }

    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($this->config->activate && $this->isValidHeader($request) && $request->exists('response') && $request->get('response') === 'json') {
            return $this->view2Json($request, $next);
        }

        return $next($request);
    }

    private function view2Json(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$this->shouldConvert2Json($response)) {
            return $next($request);
        }

        $original = $response->getOriginalContent();

        $shared = [];
        if($this->config->response_shared_environment_data) {
            $shared = $original->getFactory()->getShared();
        }

        return response()->json(array_merge($original->getData(), $shared));
    }

    private function shouldConvert2Json(Response $response)
    {
        if ($response instanceof JsonResponse) {
            return false;
        }

        if ($response->isServerError() || $response->isNotFound()) {
            return false;
        }

        if ($response->isSuccessful() && !method_exists($response->getOriginalContent(), 'getData')) {
            return false;
        }

        return true;
    }

    private function isValidHeader($request){
        if(!$this->config->secure_request || empty($this->config->header_token)){
            return true;
        }

        $header = $request->header('view2json');
        if(isset($header) && $request->header('view2json') === $this->config->header_token ){
            return true;
        }

        return false;
    }
}
