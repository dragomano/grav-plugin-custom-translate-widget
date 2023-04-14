# Custom Translate Widget for Grav CMS

The **Custom Translate Widget** is an extension for [Grav CMS](https://github.com/getgrav/grav) that adds a custom language switcher to quickly translate pages on your site using the Yandex.Translator widget.

## Installation

Installing the Custom Translate Widget plugin can be done in [one of three ways](https://learn.getgrav.org/17/plugins/plugin-install):

* via GPM (Grav Package Manager): `bin/gpm install custom-translate-widget`
* via a zip file: extract the package into `/your/site/grav/user/plugins` and rename to `custom-translate-widget`
* via the [Admin Plugin](https://github.com/getgrav/grav-plugin-admin).

## Integration

Paste the following code into one of the files (for example, `partials/base.html.twig`) of the theme you are using before the ending `body` tag.

```twig
{% if config.plugins['custom-translate-widget'].enabled %}
    {% include 'partials/custom-translate-widget.html.twig' %}
{% endif %}
```

## Configuration

Note that if you use the Admin Plugin, a file with your configuration named `custom-translate-widget.yaml` will be saved in the `user/config/plugins/` folder once the configuration is saved in the Admin.

In manual mode, before configuring this plugin, you should copy the `user/plugins/custom-translate-widget/custom-translate-widget.yaml` to `user/config/plugins/custom-translate-widget.yaml` and only edit that copy.

```yaml
enabled: true
languages:
  - de
  - el
  - en
  - es
  - nl
  - sv
  - tr
  - hi
  - it
  - pt
  - ru
  - fr
  - uk
  - zh
  - eo
  - ar
auto_translate: false
```

---

Плагин **Custom Translate Widget** для [Grav CMS](https://github.com/getgrav/grav) добавляет кастомизированный переключатель языков для быстрого перевода страниц вашего сайта с помощью виджета Яндекс.Переводчика.

## Установка

Установка плагина Custom Translate Widget может быть выполнена [одним из трех способов](https://grav-docs.ru/plugins/plugin-install/):

* через GPM (менеджер пакетов Grav): `bin/gpm install custom-translate-widget`
* с помощью zip-файла: извлеките содержимое архива в `/your/site/grav/user/plugins`, затем переименуйте в `custom-translate-widget`
* с помощью [плагина админки](https://github.com/getgrav/grav-plugin-admin).

## Интеграция

Вставьте указанный ниже код в один из файлов (например, в `partials/base.html.twig`) используемой вами темы перед завершающим тегом `body`.

```twig
{% if config.plugins['custom-translate-widget'].enabled %}
    {% include 'partials/custom-translate-widget.html.twig' %}
{% endif %}
```

## Конфигурация

При сохранении настроек через плагин админки нужный файл с настройками плагина будет создан автоматически.

Если же админкой вы не пользуетесь, скопируйте файл `user/plugins/custom-translate-widget/custom-translate-widget.yaml` в `user/config/plugins/custom-translate-widget.yaml` и редактируйте последний.

```yaml
enabled: true
languages:
  - de
  - el
  - en
  - es
  - nl
  - sv
  - tr
  - hi
  - it
  - pt
  - ru
  - fr
  - uk
  - zh
  - eo
  - ar
auto_translate: false
```
