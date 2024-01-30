CREATE TABLE /*TABLE_PREFIX*/fa_category_icons (
    fa_pk_i_id INT(10) UNSIGNED NOT NULL,
    fa_icon VARCHAR(30) NULL,
    fa_color VARCHAR(30) NULL,

        PRIMARY KEY (fa_pk_i_id),
        FOREIGN KEY (fa_pk_i_id) REFERENCES /*TABLE_PREFIX*/t_category (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';