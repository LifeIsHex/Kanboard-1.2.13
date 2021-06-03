<?php
namespace Kanboard\Plugin\TaskSwimlaneChangeMoreThanDays;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskSwimlaneChangeMoreThanDays\Action\TaskSwimlaneChangeMoreThanDays;
use Kanboard\Core\Translator;//new by mahdi hezaveh

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskSwimlaneChangeMoreThanDays($this->container));
    }
	
    public function onStartup() //new by mahdi hezaveh #
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
	
    public function getPluginName()
    {
        return 'TaskSwimlaneChangeMoreThanDays';
    }

    public function getPluginDescription()
    {
        return t('Automatically change swimlanes when a tasks due date is MORE than a certain number of days away');
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
        return 'https://github.com/dmorlitz/kanboard-TaskSwimlaneChangeMoreThanDays';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}
