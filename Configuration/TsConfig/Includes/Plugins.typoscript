[globalVar = TSFE:id = {$plugin.tx_template.settings.txNewsFolders}]
    // Clear cache of news page
    TCEMAIN.clearCacheCmd = {$plugin.tx_template.settings.txNewsPages}
[end]

TCEMAIN.preview {
    tx_news_domain_model_news {
        previewPageId = {$plugin.tx_template.settings.txNewsPreviewPage}
        useDefaultLanguageRecord = 0
        fieldToParameterMap {
            uid = tx_news_pi1[news_preview]
        }

        additionalGetParameters {
            tx_news_pi1.controller = News
            tx_news_pi1.action = detail
        }
    }
}