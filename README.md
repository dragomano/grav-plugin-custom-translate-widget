# Custom Translate Widget Plugin

The **Custom Translate Widget** Plugin is an extension for [Grav CMS](https://github.com/getgrav/grav) that adds a custom language switcher to quickly translate pages on your site using the Yandex.Translator widget.

Плагин **Custom Translate Widget** для [Grav CMS](https://github.com/getgrav/grav) добавляет кастомизированный переключатель языков для быстрого перевода страниц вашего сайта с помощью виджета Яндекс.Переводчика.

## Installation | Установка

Installing the Custom Translate Widget plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

Установка плагина Custom Translate Widget может быть выполнена одним из трех способов: через GPM (менеджер пакетов Grav), с помощью zip-файла, с помощью плагина админки.

### GPM Installation | Установка через GPM

To install the plugin via the [GPM](https://learn.getgrav.org/17/cli-console/grav-cli-gpm#install), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

При использовании [GPM](https://grav-docs.ru/cli-console/grav-cli-gpm/#install) в консоли перейдите в корень установленного сайта и введите команду:

    bin/gpm install custom-translate-widget

This will install the Custom Translate Widget plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/custom-translate-widget`.

### Manual Installation | Ручная установка

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `custom-translate-widget`.

При ручной установке просто распакуйте содержимое zip-архива в директорию `/your/site/grav/user/plugins`. Затем переименуйте папку в `custom-translate-widget`.

### Admin Plugin | Плагин админки

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

При использовании плагина админки данный плагин можно установить в разделе `Плагины`, нажав на кнопку `Добавить`.

## Integration | Интеграция

Insert the code below into your own theme anywhere inside the `body` tag.

Вставьте указанный ниже код в вашу собственную тему в любом месте внутри тега `body`.

```twig
{% if config.plugins['custom-translate-widget'].enabled %}
    {% include 'partials/custom-translate-widget.html.twig' %}
{% endif %}
```

## Configuration | Конфигурация

Before configuring this plugin, you should copy the `user/plugins/custom-translate-widget/custom-translate-widget.yaml` to `user/config/plugins/custom-translate-widget.yaml` and only edit that copy.

Прежде чем изменять настройки плагина, скопируйте файл `user/plugins/custom-translate-widget/custom-translate-widget.yaml` в `user/config/plugins/custom-translate-widget.yaml` и редактируйте последний.

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
trans_lang: null
```

Note that if you use the Admin Plugin, a file with your configuration named custom-translate-widget.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

При сохранении настроек через плагин админки нужный файл с настройками плагина будет создан автоматически.
