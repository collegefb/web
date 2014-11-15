<?php

namespace CollegeFBWeb\Controllers\Admin;

class Index extends \SlimController\SlimController
{
    public function dashboardAction()
    {
        $this->render('index/dashboard', array(
            'conference_form'   => $this->app->container['settings']['di']['conference_form']->getForm(),
            'college_form'      => $this->app->container['settings']['di']['college_form']->getForm(),
        ));
    }

    public function loginAction()
    {
        $this->render('index/login');
    }

    public function logoutAction()
    {
        $this->redirect($this->app->urlFor('Index:login'));
    }
}
