<?php
namespace Kanboard\Plugin\TaskMoveOnCreate;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskMoveOnCreate\Action\TaskMoveOnCreate;
use Kanboard\Core\Translator;//new by mahdi hezaveh

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskMoveOnCreate($this->container));
    }
	
    public function onStartup() //new by mahdi hezaveh #
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
	
    public function getPluginName()
    {
        return 'TaskMoveOnCreate';
    }

    public function getPluginDescription()
    {
        return t('Automatically move to a column on task creation');
    }

    public function getPluginAuthor()
    {
        return 'David Morlitz';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dmorlitz/kanboard-TaskMoveOnCreate';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}
