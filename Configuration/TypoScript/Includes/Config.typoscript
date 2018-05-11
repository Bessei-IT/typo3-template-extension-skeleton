config {
    pageTitleFirst = 1
    pageTitleSeparator = |
    pageTitleSeparator.noTrimWrap = | | |

    tx_realurl_enable = 1

    uniqueLinkVars = 1
    language = {$plugin.tx_template.settings.defaultLanguage}
    locale_all = {$plugin.tx_template.settings.defaultLocaleAll}
    sys_language_uid = 0

    concatenateJs = 1
    concatenateCss = 1

    absRefPrefix = {$plugin.tx_template.settings.absRefPrefix}
    doctype = html5
    htmlTag_setParams = lang="{$plugin.tx_template.settings.defaultLanguage}"
}

# Detect development environment
[applicationContext = Development*]
    config {
        concatenateJs = 0
        concatenateCss = 0
        debug = 1
    }
[end]