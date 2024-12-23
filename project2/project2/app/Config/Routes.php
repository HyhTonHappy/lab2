<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); 
$routes->get('/list', 'ListSub::index'); 
$routes->get('/add_Sub', 'AddTodo::index'); 
$routes->post('/addSub/store', 'AddTodo::store'); 
$routes->get('deleteSub/(:num)', 'DeleteTodo::delete/$1');  
$routes->get('editSub/(:num)', 'EditTodo::edit/$1'); 
$routes->post('editSub/(:num)', 'EditTodo::update/$1');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::register');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::authenticate');
$routes->get('/manager', 'ManagerHome::index');
$routes->get('/manageruser', 'ManagerUser::index');
$routes->post('/manageruser', 'Register::manageRegis');
$routes->get('/manageruser/deleteUser/(:segment)', 'ManagerUser::deleteUser/$1');
$routes->post('/manageruser/updateUser', 'ManagerUser::updateUser');
$routes->get('/commentForm/(:num)', 'TodoComment::showForm/$1');
$routes->post('/addComment', 'TodoComment::addComment');
$routes->post('/', 'Logout::index');
$routes->get('subjectInfo/(:num)', 'TodoDetail::subjectInfo/$1');
$routes->post('/comments/todo/(:num)', 'TodoDetail::getCommentsByTodoID/$1');
$routes->get('/user', 'UserHome::index');
$routes->post('/assignUser', 'ListSub::assignUser');
$routes->get('/listuser', 'PosTodos::index');
$routes->post('update-status/(:num)', 'EditTodo::updateStatus/$1');

