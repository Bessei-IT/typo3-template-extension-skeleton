#tt_content.gridelements_pi1 =< lib.contentElement
#tt_content.gridelements_pi1 {
#    templateName = Generic
#    variables {
#        content =< tt_content.gridelements_view
#    }
#}
#
#tt_content {
#    gridelements_pi1 = COA
#    gridelements_pi1 {
#        20 {
#            10 {
#                setup {
#                    GRID_ALIAS < lib.gridelements.defaultGridSetup
#                    GRID_ALIAS {
#                        cObject = FLUIDTEMPLATE
#                        cObject {
#                            layoutRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Layouts/
#                            partialRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Partials/
#                            templateRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Templates/
#                            file = EXT:template/Resources/Private/Fluid/ContentElements/Templates/GridElements/1_1_1_1.html
#                        }
#                    }
#                }
#            }
#        }
#    }
#}
#
#tt_content.gridelements_view < tt_content.gridelements_pi1