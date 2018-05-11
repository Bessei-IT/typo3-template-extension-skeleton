#
# Extend tt_content
#
# CREATE TABLE tt_content (
#   tx_template_grid_items             INT(11) UNSIGNED DEFAULT NULL,
# );

#
# Example table for a grid item
#
# CREATE TABLE tx_template_domain_model_grid_item (
#   uid                     INT(11) UNSIGNED                   NOT NULL AUTO_INCREMENT,
#   pid                     INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#
#   header                  VARCHAR(255) DEFAULT ''            NOT NULL,
#   link                    VARCHAR(255) DEFAULT ''            NOT NULL,
#   layout                  INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#   assets                  INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#   bodytext                MEDIUMTEXT,
#
#   # 1:n to tt_content
#   tt_content_uid          INT(11) UNSIGNED                            DEFAULT NULL,
#
#   # Allow parent element to store sorting here
#   sorting_foreign         INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#
#   tstamp                  INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#   crdate                  INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#
#   sorting                 INT(11) UNSIGNED DEFAULT '0'       NOT NULL,
#   hidden                  TINYINT(3) UNSIGNED DEFAULT '0'    NOT NULL,
#   deleted                 TINYINT(3) UNSIGNED DEFAULT '0'    NOT NULL,
#
#   PRIMARY KEY (uid)
# );