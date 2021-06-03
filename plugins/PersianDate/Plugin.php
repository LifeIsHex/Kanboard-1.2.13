<?php

namespace Kanboard\Plugin\PersianDate;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        if ($this->languageModel->getCurrentLanguage() == "fa_IR") {
            $this->hook->on("template:layout:css", array("template" => "plugins/PersianDate/Assets/css/persian-datepicker.min.css"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianDate/Assets/js/persian-date.min.js"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianDate/Assets/js/persian-datepicker.min.js"));
            $this->hook->on("template:layout:js", array("template" => "plugins/PersianDate/Assets/js/PersianDate.js"));
        }
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'Persian Date';
    }

    public function getPluginDescription()
    {
        return t('Make Kanboard compatible with Persian date.');
    }

    public function getPluginAuthor()
    {
        return 'Mahdi Hezaveh';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        return '>1.2.11';
    }

    public function getPluginHomepage()
    {
        return 'http://mytaskboard.ir';
    }
}