<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-17 05:30:57 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Dashboard\js' is not found
ERROR - 2017-02-17 05:32:25 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Dashboard\js' is not found
ERROR - 2017-02-17 05:45:47 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\$1' is not found
ERROR - 2017-02-17 05:45:52 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\$1' is not found
ERROR - 2017-02-17 05:46:03 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\all' is not found
ERROR - 2017-02-17 05:46:21 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\all' is not found
ERROR - 2017-02-17 05:46:23 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\all' is not found
ERROR - 2017-02-17 05:46:32 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\all' is not found
ERROR - 2017-02-17 06:03:05 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`author` = `ce`.`user_id`
WHERE `status` =0
AND `course_endrolies`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-17 06:03:43 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`author` = `ce`.`user_id`
WHERE `status` =0
AND `course_endrolies`.`user_id` = '3'
ERROR - 2017-02-17 06:03:59 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`author` = `ce`.`user_id`
WHERE `status` =0
AND `course_endrolies`.`user_id` = '3'
ERROR - 2017-02-17 06:04:11 --> Query error: Unknown column 'course_endrolies.user_id' in 'where clause' - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`author` = `ce`.`user_id`
WHERE `courses`.`status` =0
AND `course_endrolies`.`user_id` = '3'
ERROR - 2017-02-17 06:06:07 --> Query error: Unknown column 'course_endrolies.user_id' in 'where clause' - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`id` = `ce`.`courses_id`
WHERE `courses`.`status` =0
AND `course_endrolies`.`user_id` = '3'
ERROR - 2017-02-17 06:37:02 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
LEFT JOIN `group_members` as `gm` ON `groups`.`id` = `gm`.`group_id`
WHERE `status` =0
AND `gm`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-17 18:22:05 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\crnv1\application\hooks\load_config.php 46
ERROR - 2017-02-17 11:37:03 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-17 19:08:42 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\crnv1\application\views\themes\default.php 5
ERROR - 2017-02-17 12:27:24 --> 404 Page Not Found: Landing_Page/img
ERROR - 2017-02-17 19:31:10 --> Query error: Table 'lms.user_autologin' doesn't exist - Invalid query: DELETE FROM `user_autologin`
WHERE `user_id` = '3'
AND `user_agent` = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36'
AND `last_ip` = '::1'
ERROR - 2017-02-17 12:33:01 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-17 20:02:46 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\topics' is not found
ERROR - 2017-02-17 14:23:39 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:23:39 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:23:40 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:23:40 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:25:53 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:25:53 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:27:30 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:27:30 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:28:23 --> 404 Page Not Found: Img/flags
ERROR - 2017-02-17 14:28:23 --> 404 Page Not Found: Topic/detail
ERROR - 2017-02-17 14:29:06 --> 404 Page Not Found: Img/flags
ERROR - 2017-02-17 21:39:24 --> Query error: Table 'lms.users_profile' doesn't exist - Invalid query: SELECT *
FROM `course_topics`
LEFT JOIN `users_profile` ON `course_topics`.`author`=`users_profile`.`user_id`
WHERE `id` = '17'
ERROR - 2017-02-17 21:39:51 --> Query error: Table 'lms.users_profile' doesn't exist - Invalid query: SELECT *
FROM `course_topics`
LEFT JOIN `users_profile` ON `course_topics`.`author`=`users_profile`.`user_id`
WHERE `id` = '17'
ERROR - 2017-02-17 21:40:10 --> Query error: Table 'lms.users_profile' doesn't exist - Invalid query: SELECT *
FROM `course_topics`
LEFT JOIN `users_profile` ON `course_topics`.`author`=`users_profile`.`user_id`
WHERE `id` = '17'
ERROR - 2017-02-17 21:47:22 --> Severity: Notice --> Undefined property: MY_Loader::$Role C:\xampp\htdocs\crnv1\application\views\ajax\topic_details.php 43
ERROR - 2017-02-17 21:47:22 --> Severity: Error --> Call to a member function get_info() on null C:\xampp\htdocs\crnv1\application\views\ajax\topic_details.php 43
ERROR - 2017-02-17 21:48:04 --> Severity: Notice --> Undefined property: MY_Loader::$Role C:\xampp\htdocs\crnv1\application\views\ajax\topic_details.php 43
ERROR - 2017-02-17 21:48:04 --> Severity: Error --> Call to a member function get_info() on null C:\xampp\htdocs\crnv1\application\views\ajax\topic_details.php 43
ERROR - 2017-02-17 21:52:40 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT *
FROM `course_topics`
LEFT JOIN `users` ON `course_topics`.`author`=`users`.`id`
LEFT JOIN `users_profiles` ON `course_topics`.`author`=`users_profiles`.`user_id`
WHERE `id` = '17'
ERROR - 2017-02-17 21:54:30 --> Severity: Error --> Call to undefined method Person::get_info() C:\xampp\htdocs\crnv1\application\views\ajax\topic_details.php 43
ERROR - 2017-02-17 22:17:51 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-17 22:23:34 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-17 22:51:59 --> 404 Page Not Found: Enroll/2
ERROR - 2017-02-17 22:52:40 --> 404 Page Not Found: Enroll/2
ERROR - 2017-02-17 22:53:18 --> 404 Page Not Found: Enroll/2
