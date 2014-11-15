<?php

namespace CollegeFBWeb\Controllers\Web;

class Conferences extends \SlimController\SlimController
{
    public function listAction($division = null)
    {
        $service = $this->app->container['settings']['di']['conference_service'];

        $conferences_list = $service('listConferences')->run(array(
            'page'      => 0,
            'limit'     => 200,
            'division'  => $division,
        ));

        $this->render('conferences/list', array(
            'conferences'   => $this->app->container['settings']['di']['conference_adapter_private']->convert($conferences_list)
        ));
    }

    public function oneAction($conference)
    {
        $service = $this->app->container['settings']['di']['conference_service'];
        $news_service = $this->app->container['settings']['di']['news_service'];
        $college_service = $this->app->container['settings']['di']['college_service'];

        $conference_information = $service('oneConference')->run(array(
            'conference_url'    => $conference
        ));

        $conference_information->setTwitter($this->extractTwitterAccount($conference_information));

        $this->render('conferences/one', array(
            'conference'    => $this->app->container['settings']['di']['conference_adapter_private']->convert($conference_information),
            'news'          => $this->app->container['settings']['di']['news_adapter_private']->convert($news_service('listNews')->run(array(
                'origin_id'      => $conference_information->getName(),
                'limit'          => 15,
            ))),
            'colleges'          => $this->app->container['settings']['di']['college_adapter_private']->convert($college_service('listColleges')->run(array(
                'conference'    => $conference_information->getName(),
            ))),
        ));
    }

    private function extractTwitterAccount($conference)
    {
        $twitter_account = $conference->getTwitter();
        if (!empty($twitter_account)) {
            $parsed_url = parse_url($twitter_account, PHP_URL_PATH);

            $exploded_path = explode('/', $parsed_url);

            return end($exploded_path);
        }

        return null;
    }
}
