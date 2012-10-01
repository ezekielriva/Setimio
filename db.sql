CREATE TABLE news_Category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_B604D8C6727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE news_News (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, published_by_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, published TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_683CC0E512469DE2 (category_id), INDEX IDX_683CC0E55B075477 (published_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE news_News_Tags (news_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_848710F1B5A459A0 (news_id), INDEX IDX_848710F1BAD26311 (tag_id), PRIMARY KEY(news_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE news_Tag (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE news_Category ADD CONSTRAINT FK_B604D8C6727ACA70 FOREIGN KEY (parent_id) REFERENCES news_Category (id);
ALTER TABLE news_News ADD CONSTRAINT FK_683CC0E512469DE2 FOREIGN KEY (category_id) REFERENCES news_Category (id);
ALTER TABLE news_News ADD CONSTRAINT FK_683CC0E55B075477 FOREIGN KEY (published_by_id) REFERENCES fos_user (id);
ALTER TABLE news_News_Tags ADD CONSTRAINT FK_848710F1B5A459A0 FOREIGN KEY (news_id) REFERENCES news_News (id) ON DELETE CASCADE;
ALTER TABLE news_News_Tags ADD CONSTRAINT FK_848710F1BAD26311 FOREIGN KEY (tag_id) REFERENCES news_Tag (id) ON DELETE CASCADE


-- Valores iniciales

INSERT INTO `news_Category`(`id`, `parent_id`, `description`) VALUES (1,null,"Sin Categoria");
INSERT INTO `Setimio`.`fos_user` (
`id` ,
`username` ,
`username_canonical` ,
`email` ,
`email_canonical` ,
`enabled` ,
`salt` ,
`password` ,
`last_login` ,
`locked` ,
`expired` ,
`expires_at` ,
`confirmation_token` ,
`password_requested_at` ,
`roles` ,
`credentials_expired` ,
`credentials_expire_at`
)
VALUES (
NULL , 'setimio', 'setimio', 'setimio@argentina.com.ar', 'setimio@argentina.com.ar', '1', 'swl6muhdtj4wc4o8g8wgwg80ss0o800', 'KhnXWGIKodQkASeZrwL0LSH0pc7YqDkaIkrVkugD/895kGq+LALfcQkXLaiXByFnxCIiRCu1Y9HqMkuzsuU5iA==', '2012-10-01 11:41:38', '0', '0', NULL , NULL , NULL , 'a:1:{i:0;s:10:"ROLE_ADMIN";}', '0', NULL
);