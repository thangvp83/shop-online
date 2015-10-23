<?php

namespace Admin\Controller;

use App\Controller\AppController as BaseController;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * @property bool|object Menus
 * @property bool layout
 */
class AppController extends BaseController
{
    public $imageFields = [];

    public function initialize()
    {
        parent::initialize();
    }

    /**
     * @param Event $event
     */
    public function beforeRender(Event $event)
    {
        //$this->set('imageFields', $this->imageFields);
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }
}
