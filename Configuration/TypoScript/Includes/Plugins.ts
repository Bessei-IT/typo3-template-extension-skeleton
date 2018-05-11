plugin {
    tx_news {
        view {
            templateRootPaths >
            templateRootPaths {
                0 = EXT:news/Resources/Private/Templates/
                5 = EXT:news/Resources/Private/Templates/Styles/Twb/Templates
                15 = EXT:template/Resources/Private/Fluid/News/Templates/
            }

            partialRootPaths >
            partialRootPaths {
                0 = EXT:news/Resources/Private/Partials/
                5 = EXT:news/Resources/Private/Templates/Styles/Twb/Partials/
                15 = EXT:template/Resources/Private/Fluid/News/Partials/
            }

            layoutRootPaths >
            layoutRootPaths {
                0 = EXT:news/Resources/Private/Layouts/
                5 = EXT:news/Resources/Private/Templates/Styles/Twb/Layouts/
                15 = EXT:template/Resources/Private/Fluid/News/Layouts/
            }
        }

        settings {
            displayDummyIfNoMedia = 0

            list {
                media.image.width = 400
            }

            detail {
                showSocialShareButtons = 0
            }
        }
    }

    tx_template {
        view {
            templateRootPaths {
                20 = EXT:template/Resources/Private/Fluid/ContentElements/Templates/
            }

            partialRootPaths {
                20 = EXT:template/Resources/Private/Fluid/ContentElements/Partials/
            }

            layoutRootPaths {
                20 = EXT:template/Resources/Private/Fluid/ContentElements/Layouts/
            }
        }
    }

    tx_form {
        settings {
            yamlConfigurations {
                1511560813 = EXT:template/Configuration/Form/Frontend.yaml
            }
        }
    }
}