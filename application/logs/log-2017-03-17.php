<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-03-17 12:21:01 --> 404 Page Not Found: Auth/sound
ERROR - 2017-03-17 12:36:45 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:36:50 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:36:51 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:36:57 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:38:28 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:38:52 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:38:53 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:38:55 --> Severity: Warning --> preg_match(): Compilation failed: unmatched parentheses at offset 12 C:\xampp\htdocs\myclinicsoft\system\core\Router.php 411
ERROR - 2017-03-17 12:38:55 --> 404 Page Not Found: My-patients/index
ERROR - 2017-03-17 12:39:36 --> 404 Page Not Found: My-patients/index
ERROR - 2017-03-17 19:45:25 --> Severity: Notice --> Undefined variable: filter_option C:\xampp\htdocs\myclinicsoft\application\views\ajax\patients.php 7
ERROR - 2017-03-17 19:45:25 --> Severity: Notice --> Undefined variable: filter_option C:\xampp\htdocs\myclinicsoft\application\views\ajax\patients.php 32
ERROR - 2017-03-17 19:45:25 --> Severity: Notice --> Undefined variable: filter_option C:\xampp\htdocs\myclinicsoft\application\views\ajax\patients.php 36
ERROR - 2017-03-17 12:45:27 --> 404 Page Not Found: Courses/load_ajax
ERROR - 2017-03-17 12:47:53 --> 404 Page Not Found: Courses/load_ajax
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 12:49:46 --> 404 Page Not Found: Courses/count
ERROR - 2017-03-17 13:26:33 --> Query error: Unknown column 'data' in 'field list' - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '6876a35e9f7bd5511387226759bb53178646103b'
ERROR - 2017-03-17 13:27:26 --> Query error: Unknown column 'data' in 'field list' - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '6876a35e9f7bd5511387226759bb53178646103b'
ERROR - 2017-03-17 13:31:27 --> 404 Page Not Found: Auth/sound
ERROR - 2017-03-17 20:31:33 --> Severity: Notice --> Undefined property: stdClass::$isonline C:\xampp\htdocs\myclinicsoft\application\views\include\sidebar.php 9
ERROR - 2017-03-17 20:34:43 --> Query error: Unknown column 'type' in 'field list' - Invalid query: SELECT users.id as id, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as fullname, username, email, r.role_name as rolename, DATE_FORMAT(users.created, '%M %d, %Y') as created, type
FROM `users`
LEFT JOIN `users_profiles` as `up` ON `users`.`id` = `up`.`user_id`
LEFT JOIN `users_role` as `r` ON `users`.`role_id` = `r`.`role_id`
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-03-17 20:35:05 --> Query error: Unknown column 'type' in 'field list' - Invalid query: SELECT users.id as id, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as fullname, username, email, r.role_name as rolename, DATE_FORMAT(users.created, '%M %d, %Y') as created, type
FROM `users`
LEFT JOIN `users_profiles` as `up` ON `users`.`id` = `up`.`user_id`
LEFT JOIN `users_role` as `r` ON `users`.`role_id` = `r`.`role_id`
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2017-03-17 20:35:30 --> Query error: Unknown column 'type' in 'field list' - Invalid query: SELECT users.id as id, CONCAT(IF(up.firstname != '', up.firstname, ''), ', ', IF(up.lastname != '', up.lastname, '')) as fullname, username, email, r.role_name as rolename, DATE_FORMAT(users.created, '%M %d, %Y') as created, type
FROM `users`
LEFT JOIN `users_profiles` as `up` ON `users`.`id` = `up`.`user_id`
LEFT JOIN `users_role` as `r` ON `users`.`role_id` = `r`.`role_id`
