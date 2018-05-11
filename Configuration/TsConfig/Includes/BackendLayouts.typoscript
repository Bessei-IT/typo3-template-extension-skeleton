mod.web_layout.BackendLayouts {
    FullWidth {
        title = Full width
        config {
            backend_layout {
                colCount = 1
                rowCount = 5
                rows {
                    5 {
                        columns {
                            1 {
                                name = Content
                                colPos = 0
                            }
                        }
                    }
                }
            }
        }
    }

    FullWidthWithHeader < .FullWidth
    FullWidthWithHeader {
        title = Full width with header
        config.backend_layout.rows.1.columns.1 {
            name = Header
            colPos = 1
        }
    }
}