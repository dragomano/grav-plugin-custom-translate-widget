<?php

namespace Grav\Plugin;

use Grav\Common\Language\Language;
use Grav\Common\Plugin;
use Grav\Common\Grav;
use stdClass;

class CustomTranslateWidgetPlugin extends Plugin
{
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
        ];
    }

    public function onPluginsInitialized(): void
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ]);
    }

    /** @event */
    public function onTwigTemplatePaths(): void
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /** @event */
    public function onTwigSiteVariables(): void
    {
        $data = new stdClass;
        $data->langCodes = $this->config()['languages'];
        $data->transLang = $this->config()['trans_lang'];

        $langCodes = $this->grav['twig']->twig_vars['language_codes'];

        $data->langTitles = [];
        foreach ($data->langCodes as $lang) {
            $data->langTitles[$lang] = $langCodes->getNativeName($lang);
        }

        $this->grav['twig']->twig_vars[str_replace('-', '_', $this->name)] = $data;

        $this->grav['assets']->addCss("plugin://$this->name/assets/style.css");
        $this->grav['assets']->addJs("plugin://$this->name/assets/script.js");
    }

    /** @options for languages select in blueprints */
    public static function getLangList(): array
    {
        return self::getTranslate('PLUGIN_CUSTOM_TRANSLATE_WIDGET.LANGUAGES_SET');
    }

    /** @options for trans_lang select in blueprints */
    public static function getLangList2(): array
    {
        return array_merge(['' => self::getTranslate('GRAV.NO')], self::getLangList());
    }

    protected static function getTranslate(string $key)
    {
        return self::getLangObject()->translate($key, self::getLanguages(), true);
    }

    protected static function getLangObject(): Language
    {
        return Grav::instance()['language'];
    }

    protected static function getLanguages(): array
    {
        return self::getLangObject()->getLanguages();
    }
}
