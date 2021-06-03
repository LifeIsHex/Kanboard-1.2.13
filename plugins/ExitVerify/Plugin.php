<?php

namespace Kanboard\Plugin\ExitVerify;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        if ($this->configModel->get('verify_exit', 1) == 1) {
            $this->hook->on("template:layout:js", array("template" => "plugins/ExitVerify/Assets/unload_verify.js"));
        }
        $this->template->hook->attach("template:config:application", "ExitVerify:config/exit-verify");
    }
	
    public function onStartup() //new by mahdi hezaveh #
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }
	
    public function getPluginName()
    {
        return 'ExitVerify';
    }

    public function getPluginDescription()
    {
        return t('This plugin adds dialog box with confirmation to leave page by clicking on external link.');
    }

    public function getPluginAuthor()
    {
        return 'ipunkt Business Solutions';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/ipunkt/kanboard-exit-verify/';
    }

}