<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-15 12:14:28 --> 404 Page Not Found: Landing_Page/img
ERROR - 2017-02-15 12:14:59 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-15 19:42:49 --> Query error: Column 'type' in field list is ambiguous - Invalid query: SELECT id, name, description, type, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
WHERE `status` =0
ERROR - 2017-02-15 19:43:58 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
WHERE `status` =0
ERROR - 2017-02-15 22:58:50 --> 404 Page Not Found: Auth/sound
