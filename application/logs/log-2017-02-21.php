<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-21 06:37:30 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:37:32 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:37:32 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 43
ERROR - 2017-02-21 06:38:34 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:38:34 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:38:34 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\my-courses' is not found
ERROR - 2017-02-21 06:39:30 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:39:30 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:39:33 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:39:33 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:39:56 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:39:56 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:40:04 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:40:04 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:40:15 --> Severity: Warning --> Missing argument 1 for Courses::index() C:\xampp\htdocs\crnv1\application\controllers\Courses.php 38
ERROR - 2017-02-21 06:40:15 --> Severity: Notice --> Undefined variable: type C:\xampp\htdocs\crnv1\application\controllers\Courses.php 40
ERROR - 2017-02-21 06:42:08 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\available-courses' is not found
ERROR - 2017-02-21 06:44:11 --> 404 Page Not Found: 'C:\xampp\htdocs\crnv1\Courses\available-courses' is not found
ERROR - 2017-02-21 00:00:36 --> 404 Page Not Found: Group/my-groups
ERROR - 2017-02-21 00:01:10 --> 404 Page Not Found: Group/js
ERROR - 2017-02-21 00:02:34 --> 404 Page Not Found: Group/js
ERROR - 2017-02-21 00:03:37 --> 404 Page Not Found: Group/js
ERROR - 2017-02-21 00:03:48 --> 404 Page Not Found: Group/js
ERROR - 2017-02-21 11:39:27 --> 404 Page Not Found: Landing_Page/img
ERROR - 2017-02-21 11:39:40 --> 404 Page Not Found: Auth/sound
ERROR - 2017-02-21 19:21:23 --> Severity: Notice --> Undefined property: Groups::$Group C:\xampp\htdocs\crnv1\application\controllers\Groups.php 94
ERROR - 2017-02-21 19:21:23 --> Severity: Error --> Call to a member function insert() on null C:\xampp\htdocs\crnv1\application\controllers\Groups.php 94
ERROR - 2017-02-21 19:23:45 --> Severity: Error --> Call to undefined method Group::insert() C:\xampp\htdocs\crnv1\application\controllers\Groups.php 94
ERROR - 2017-02-21 19:23:57 --> Severity: Error --> Call to undefined method Group::insert() C:\xampp\htdocs\crnv1\application\controllers\Groups.php 94
ERROR - 2017-02-21 12:24:52 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:27:59 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:33:11 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:33:47 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:34:06 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:42:42 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 12:45:02 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 19:53:18 --> Query error: Column 'status' in field list is ambiguous - Invalid query: SELECT groups.id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, status, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
LEFT JOIN `group_members` as `gm` ON `groups`.`id` = `gm`.`group_id`
WHERE `gm`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 19:54:21 --> Query error: Column 'status' in field list is ambiguous - Invalid query: SELECT groups.id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, status, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
LEFT JOIN `group_members` as `gm` ON `groups`.`id` = `gm`.`group_id`
WHERE `gm`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 19:57:45 --> Query error: Unknown column 'gm.status' in 'field list' - Invalid query: SELECT groups.id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, gm.status as statuses, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 19:59:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= null, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname !=' at line 1 - Invalid query: SELECT groups.id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, statuses == null, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author
FROM `groups`
LEFT JOIN `users_profiles` as `up` ON `groups`.`author` = `up`.`user_id`
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 13:04:28 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 13:04:40 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 13:07:26 --> Severity: Compile Error --> Cannot redeclare Groups::request() C:\xampp\htdocs\crnv1\application\controllers\Groups.php 110
ERROR - 2017-02-21 13:07:55 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 13:09:09 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 13:09:21 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 13:09:30 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 14:47:36 --> 404 Page Not Found: Group/sound
ERROR - 2017-02-21 15:17:48 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\xampp\htdocs\crnv1\application\controllers\Enroll.php 176
ERROR - 2017-02-21 15:21:46 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 22:32:49 --> Query error: Unknown column 'course_endrolies.expiration_date' in 'field list' - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, 0 as expiration, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author, DATE_FORMAT(course_endrolies.expiration_date, '%M %d, %Y') as expiration
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`id` = `ce`.`courses_id`
WHERE `courses`.`status` =0
AND `ce`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 22:35:51 --> Query error: Unknown column 'course_endrolies.expiration_date' in 'field list' - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, 0 as expiration, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author, DATE_FORMAT(course_endrolies.expiration_date, '%M %d, %Y') as expiration
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`id` = `ce`.`courses_id`
WHERE `courses`.`status` =0
AND `ce`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 22:39:32 --> Query error: Unknown column 'course_endrolies.expiration_date' in 'field list' - Invalid query: SELECT courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, 0 as expiration, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as author, DATE_FORMAT(course_endrolies.expiration_date, '%M %d, %Y') as expiration
FROM `courses`
LEFT JOIN `users_profiles` as `up` ON `courses`.`author` = `up`.`user_id`
LEFT JOIN `course_endrolies` as `ce` ON `courses`.`id` = `ce`.`courses_id`
WHERE `courses`.`status` =0
AND `ce`.`user_id` = '3'
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-02-21 15:52:23 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 15:52:32 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:04:56 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:06:32 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:07:53 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:08:00 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:09:05 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:23:53 --> 404 Page Not Found: Course/sound
ERROR - 2017-02-21 16:27:20 --> 404 Page Not Found: Course/sound
