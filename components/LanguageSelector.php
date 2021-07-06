<?php


namespace app\components;

use yii\base\BootstrapInterface;


class LanguageSelector implements BootstrapInterface
{
    public $suportedLanguage = ['en-US', 'ru-RU'];

    public function bootstrap($app)
    {
        $cookieLanguage = $app->request->cookies['language'];
        if(isset($cookieLanguage) && in_array($cookieLanguage, $this->suportedLanguage)){
            $app->language = $app->request->cookies['language'];
        }
    }
}