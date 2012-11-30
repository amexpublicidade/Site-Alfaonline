DROP TABLE IF EXISTS `seo_config`;
CREATE TABLE `seo_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `analytics` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `seo_config` */
insert  into `seo_config`(`id`,`title`,`author`,`description`) values (1,'','');

/*Table structure for table `seo_keywords` */

DROP TABLE IF EXISTS `seo_keywords`;
CREATE TABLE `seo_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;