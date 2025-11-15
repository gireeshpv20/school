<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/login/auth', 'Home::auth');
$routes->get('/logout', 'Home::logout');
$routes->get('/dashboard', 'Home::dashboard');
$routes->match(['get', 'post'], '/classgroup', 'Home::classgroups');
$routes->match(['get', 'post'], '/classlist', 'Home::classlists');

$routes->match(['get', 'post'], '/studentlist', 'Home::studentlists');
$routes->get('student/details/(:num)', 'Home::studentDetails/$1');
$routes->post('student/update/(:num)', 'Home::updateStudent/$1');
$routes->match(['get', 'post'], 'student/add', 'Home::addStudent');

$routes->match(['get', 'post'], '/teacherlist', 'Home::teacherlists');
$routes->post('teacher/update/(:num)', 'Home::updateTeacher/$1');
$routes->match(['get', 'post'], 'teacher/add', 'Home::addTeacher');

$routes->get('ajax/classlist', 'Home::getClassList');



$routes->get('get-subjects', 'Home::getSubjects');
$routes->get('get-classes', 'Home::getClasses');


$routes->match(['get', 'post'], '/examlist', 'Home::examlists');
$routes->match(['get', 'post'], '/timetablelist', 'Home::timetablelists');

$routes->match(['get', 'post'], '/classlist', 'Home::classlists');
$routes->get('class/details/(:num)', 'Home::classDetails/$1');
$routes->post('class/update/(:num)', 'Home::updateClass/$1');
$routes->match(['get', 'post'], 'class/add', 'Home::addClass');
$routes->get('ajax/get-teachers', 'Home::getTeachersBySchool');


$routes->get('ajax/classgroup', 'Home::getClassGroup');






/*

$routes->GET('/', 'Home::index');
$routes->GET('/login', 'Home::login');
$routes->POST('/login/auth', 'Home::auth');
$routes->GET('/logout', 'Home::logout');
$routes->GET('/dashboard', 'Home::dashboard');

$routes->MATCH(['GET', 'POST'], '/classgroup', 'Home::classgroups');
$routes->MATCH(['GET', 'POST'], '/classlist', 'Home::classlists');
$routes->MATCH(['GET', 'POST'], '/studentlist', 'Home::studentlists');

$routes->GET('student/details/(:num)', 'Home::studentDetails/$1');
$routes->POST('student/update/(:num)', 'Home::updateStudent/$1');
$routes->MATCH(['GET', 'POST'], 'student/add', 'Home::addStudent');

$routes->MATCH(['GET', 'POST'], '/teacherlist', 'Home::teacherlists');
$routes->POST('teacher/update/(:num)', 'Home::updateTeacher/$1');
$routes->MATCH(['GET', 'POST'], 'teacher/add', 'Home::addTeacher');

$routes->GET('ajax/classlist', 'Home::getClassList');
$routes->GET('get-subjects', 'Home::getSubjects');
$routes->GET('get-classes', 'Home::getClasses');

$routes->MATCH(['GET', 'POST'], '/examlist', 'Home::examlists');
$routes->MATCH(['GET', 'POST'], '/timetablelist', 'Home::timetablelists');
$routes->MATCH(['GET', 'POST'], '/classlist', 'Home::classlists');

$routes->GET('class/details/(:num)', 'Home::classDetails/$1');
$routes->POST('class/update/(:num)', 'Home::updateClass/$1');
$routes->MATCH(['GET', 'POST'], 'class/add', 'Home::addClass');

$routes->GET('ajax/get-teachers', 'Home::getTeachersBySchool');

$routes->GET('ajax/classgroup', 'Home::getClassGroup');


*/