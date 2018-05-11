lib.mainNavigation = TYPO3\CMS\Frontend\DataProcessing\MenuProcessor
lib.mainNavigation {
    as = menuItems
    expandAll = 1
    titleField = nav_title // title
    levels = 3
    dataProcessing {
        10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
        10 {
            references.fieldName = media
        }
    }
}