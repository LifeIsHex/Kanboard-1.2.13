<?php
namespace Kanboard\Plugin\TaskAssignOwner;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskAssignOwner\Action\TaskAssignOwner;
use Kanboard\Core\Translator;//new by mahdi hezaveh

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignOwner($this->container));
    }
	
    public function onStartup() //new by mahdi hezaveh #
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
	
    public function getPluginName()
    {
        return 'TaskAssignOwner';
    }

    public function getPluginDescription()
    {
        return t('Automatically assign an owner regardless of column');
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
        return 'https://github.com/dmorlitz/kanboard-TaskAssignOwner';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}
