<?php

namespace CollegeFBWeb\Slim;

abstract class RestController extends \SlimController\SlimController
{
    final public function indexAction()
    {
        $args = func_get_args();

        if ($this->request()->isPut() || $this->request()->isPatch()) {

            call_user_func_array(array($this, 'update'), $args);

        } elseif ($this->request()->isPost()) {

            call_user_func_array(array($this, 'create'), $args);

        } elseif ($this->request()->isDelete()) {

            call_user_func_array(array($this, 'remove'), $args);

        } elseif ($this->request()->isOptions()) {

            $this->app->response()->headers()->set('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
            $this->app->response()->headers()->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, X-Auth-Token');
            $this->render(200, array());

        } else {

            call_user_func_array(array($this, 'get'), $args);

        }
    }

    protected function isPrivateCall()
    {
        return ($this->app->container['settings']['di']['xauth_token'] === $this->request()->headers('X-Auth-Token'));
    }

    protected function renderResult($result)
    {
        $adapter = $this->getAdapter();
        $this->render(200, $adapter->convert($result));
    }

    abstract protected function getAdapter();

    abstract protected function get();

    abstract protected function update();

    abstract protected function create();

    abstract protected function remove();
}
