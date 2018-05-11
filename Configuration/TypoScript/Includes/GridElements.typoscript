tt_content.gridelements_pi1 =< lib.contentElement
tt_content.gridelements_pi1 {
    templateName = Generic
    variables {
        content =< tt_content.gridelements_view
    }
}

temp.gridelements.defaultCObject = FLUIDTEMPLATE
temp.gridelements.defaultCObject {
    layoutRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Layouts/
    partialRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Partials/
    templateRootPaths.1511514167 = EXT:template/Resources/Private/Fluid/ContentElements/Templates/
}

temp.gridelements.equalColumn < temp.gridelements.defaultCObject
temp.gridelements.equalColumn.file = EXT:template/Resources/Private/Fluid/ContentElements/Templates/GridElements/EqualColumn.html

tt_content {
    gridelements_pi1 = COA
    gridelements_pi1 {
        20 {
            10 {
                setup {
                    twoEqualColumn < lib.gridelements.defaultGridSetup
                    twoEqualColumn.cObject < temp.gridelements.equalColumn

                    threeEqualColumn < lib.gridelements.defaultGridSetup
                    threeEqualColumn.cObject < temp.gridelements.equalColumn

                    fourEqualColumn < lib.gridelements.defaultGridSetup
                    fourEqualColumn.cObject < temp.gridelements.equalColumn
                }
            }
        }
    }
}

tt_content.gridelements_view < tt_content.gridelements_pi1