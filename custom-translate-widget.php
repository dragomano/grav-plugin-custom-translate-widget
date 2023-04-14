<?php

namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Grav;

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
        $langCodes = $this->grav['twig']->twig_vars['language_codes'];
        $languages = $this->config()['languages'];

        $langTitles = [];
        foreach ($languages as $lang) {
            $langTitles[$lang] = $langCodes->getNativeName($lang);
        }

        $this->grav['twig']->twig_vars['language_titles'] = $langTitles;

        $this->grav['assets']->addCss("plugin://$this->name/assets/style.css");
        $this->grav['assets']->addJs("plugin://$this->name/assets/script.js");
    }

    /** @options for languages select in blueprints */
    public static function getLangList(): array
    {
        $langObject = Grav::instance()['language'];
        $languages = $langObject->getLanguages();

        return $langObject->translate('PLUGIN_CUSTOM_TRANSLATE_WIDGET.LANGUAGES_SET', $languages, true);
    }
}
