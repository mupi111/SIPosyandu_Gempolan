<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'admin::index');
$routes->get('/home/index', 'Home::index');
$routes->get('/home/about', 'Home::about');
$routes->get('/home/blogs', 'Home::blogs');
$routes->get('/login', 'Login::index');

// ==================================Admin========================== //
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
// ===  DATA USER === //
$routes->get('/datauser', 'Admin::datauser', ['filter' => 'role:admin']);
$routes->get('/tambahuser', 'Admin::tambahuser', ['filter' => 'role:admin']);
$routes->get('/admin/tambahuser', 'Admin::tambahuser', ['filter' => 'role:admin']);
$routes->get('/admin/datauser/(:any)', 'Admin:detailuser/$1', ['filter' => 'role:admin']);
$routes->get('/admin/edituser/(:any)', 'Admin:edituser/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/datauser/(:num)', 'Admin:hapususer/$1', ['filter' => 'role:admin']);
// ===  DATA BIDAN === //
$routes->get('/databidan', 'Bidan::index', ['filter' => 'role:admin']);
$routes->get('/tambahbidan', 'Bidan::tambahbidan', ['filter' => 'role:admin']);
$routes->post('/save', 'Bidan::save', ['filter' => 'role:admin']);
$routes->get('/detailbidan/(:segment)', 'Bidan::detailbidan/$1', ['filter' => 'role:admin']);
$routes->post('/editbidan/(:num)', 'Bidan::editbidan/$1', ['filter' => 'role:admin']);
$routes->delete('/hapusbidan/(:num)', 'Bidan::hapusbidan/$1', ['filter' => 'role:admin']);
// ===  DATA KADER === //
$routes->get('/datakader', 'Kader::index', ['filter' => 'role:admin']);
$routes->get('/tambahkader', 'Kader::tambahkader', ['filter' => 'role:admin']);
$routes->get('/datakader/(:any)', 'Kader::detailkader/$1', ['filter' => 'role:admin']);
$routes->get('/editkader/(:any)', 'Kader::editkader/$1', ['filter' => 'role:admin']);
$routes->delete('/hapuskader/(:num)', 'Kader::hapuskader/$1', ['filter' => 'role:admin']);
// ===  DATA PUSKESMAS === //
$routes->get('/datapuskesmas', 'Puskesmas::index', ['filter' => 'role:admin']);
$routes->get('/tambahpuskesmas', 'Puskesmas::tambahpuskesmas', ['filter' => 'role:admin']);
$routes->get('/datapuskesmas/(:any)', 'Puskesmas::detailpuskesmas/$1', ['filter' => 'role:admin']);
$routes->get('/editpuskesmas/(:any)', 'Puskesmas::editpuskesmas/$1', ['filter' => 'role:admin']);
$routes->delete('/hapuspuskesmas/(:num)', 'Puskesmas::hapuspuskesmas/$1', ['filter' => 'role:admin']);
// ===  DATA POSYANDU === //
$routes->get('/posyandudata', 'Posyandu::index', ['filter' => 'role:admin']);
$routes->get('/posyandudata/(:any)', 'Posyandu::detailposyandu/$1', ['filter' => 'role:admin']);
// ===  DATA KELUARGA === //
$routes->get('/keluargadata', 'Keluarga::index', ['filter' => 'role:admin']);
$routes->get('/keluargadata/(:any)', 'Keluarga::detailkeluarga/$1', ['filter' => 'role:admin']);
// ===  DATA BUMIL === //
$routes->get('/bumildata', 'Bumil::index', ['filter' => 'role:admin']);
$routes->get('/bumildata/(:any)', 'Bumil::detailbumil/$1', ['filter' => 'role:admin']);
// ===  DATA ANAK === //
$routes->get('/anakdata', 'Anak::index', ['filter' => 'role:admin']);
$routes->get('/anakdata/(:any)', 'Anak::detailanak/$1', ['filter' => 'role:admin']);
// ===  DATA KB === //
$routes->get('/kbdata', 'Kb::index', ['filter' => 'role:admin']);
$routes->get('/kbdata/(:any)', 'Kb::detailkb/$1', ['filter' => 'role:admin']);

// ==================================Kader========================== //
$routes->get('/kader', 'Kader::index', ['filter' => 'role::kader']);
// ===  DATA POSYANDU === //
$routes->get('/dataposyandu', 'Posyandu::index', ['filter' => 'role:kader']);
$routes->get('/tambahposyandu', 'Posyandu::tambahposyandu', ['filter' => 'role:kader']);
$routes->get('/dataposyandu/(:any)', 'Posyandu::detailposyandu/$1', ['filter' => 'role:kader']);
$routes->get('/editposyandu/(:any)', 'Posyandu::editposyandu/$1', ['filter' => 'role:kader']);
$routes->delete('/hapusposyandu/(:num)', 'Posyandu::hapusposyandu/$1', ['filter' => 'role:kader']);
// ===  DATA KELUARGA === //
$routes->get('/datakeluarga', 'Keluarga::index', ['filter' => 'role:kader']);
$routes->get('/tambahkeluarga', 'Keluarga::tambahkeluarga', ['filter' => 'role:kader']);
$routes->get('/datakeluarga/(:any)', 'Keluarga::detailkeluarga/$1', ['filter' => 'role:kader']);
$routes->get('/editkeluarga/(:any)', 'Keluarga::editkeluarga/$1', ['filter' => 'role:kader']);
$routes->delete('/hapuskeluarga/(:num)', 'Keluarga::hapuskeluarga/$1', ['filter' => 'role:kader']);
// ===  DATA BUMIL === //
$routes->get('/databumil', 'Bumil::index', ['filter' => 'role:kader']);
$routes->get('/tambahbumil', 'Bumil::tambahbumil', ['filter' => 'role:kader']);
$routes->get('/databumil/(:any)', 'Bumil::detailbumil/$1', ['filter' => 'role:kader']);
$routes->get('/editbumil/(:any)', 'Bumil::editbumil/$1', ['filter' => 'role:kader']);
$routes->delete('/hapusbumil/(:num)', 'Bumil::hapusbumil/$1', ['filter' => 'role:kader']);
// ===  DATA ANAK === //
$routes->get('/dataanak', 'Anak::index', ['filter' => 'role:kader']);
$routes->get('/tambahanak', 'Anak::tambahanak', ['filter' => 'role:kader']);
$routes->get('/dataanak/(:any)', 'Anak::detailanak/$1', ['filter' => 'role:kader']);
$routes->get('/editanak/(:any)', 'Anak::editanak/$1', ['filter' => 'role:kader']);
$routes->delete('/hapusanak/(:num)', 'Anak::hapusanak/$1', ['filter' => 'role:kader']);
// ===  DATA KB === //
$routes->get('/datakb', 'Kb::index', ['filter' => 'role:kader']);
$routes->get('/tambahkb', 'Kb::tambahkb', ['filter' => 'role:kader']);
$routes->get('/datakb/(:any)', 'Kb::detailkb/$1', ['filter' => 'role:kader']);
$routes->get('/editkb/(:any)', 'Kb::editkb/$1', ['filter' => 'role:kader']);
$routes->delete('/hapuskb/(:num)', 'Kb::hapuskb/$1', ['filter' => 'role:kader']);

// ==================================Masyarakat========================== //
$routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'role:masyarakat']);
// $routes->get('/masyarakat/tambahkeluarga', 'Masyarakat:tambahkeluarga', ['filter' => 'role:masyarakat']);
// $routes->get('/masyarakat/datakeluarga/(:any)', 'Masyarakat:detailkeluarga/$1', ['filter' => 'role:masyarakat']);
// $routes->get('/masyarakat/editkeluarga/(:any)', 'Masyarakat:editkeluarga/$1', ['filter' => 'role:masyarakat']);
// $routes->delete('/masyarakat/datakeluarga/(:num)', 'Masyarakat:hapuskeluarga/$1', ['filter' => 'role:masyarakat']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
