lib.mainContent = CONTENT
lib.mainContent {
    table = tt_content
    select {
        orderBy = sorting
        where = colPos=0
        languageField = sys_language_uid
    }
}

page = PAGE
page {
    meta < lib.metaTags

    includeCSS {
        templateHeader = EXT:template/Resources/Public/Assets/Dist/Css/header.css
    }

    includeJS {
        templateHeader = EXT:template/Resources/Public/Assets/Dist/JavaScript/header.js
    }

    includeJSFooter {
        templateFooter = EXT:template/Resources/Public/Assets/Dist/JavaScript/footer.js
    }

    10 = FLUIDTEMPLATE
    10 {
        templateName = Default

        layoutRootPaths {
            10 = EXT:template/Resources/Private/Fluid/Pages/Layouts/
        }

        partialRootPaths {
            10 = EXT:template/Resources/Private/Fluid/Pages/Partials/
        }

        templateRootPaths {
            10 = EXT:template/Resources/Private/Fluid/Pages/Templates/
        }

        dataProcessing {
            10 < lib.mainNavigation
        }

        variables {
            mainContent < lib.mainContent
            headerContent < lib.mainContent
            headerContent.select.where = colPos=1
        }
    }
}
