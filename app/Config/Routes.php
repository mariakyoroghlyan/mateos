<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Frontend Routes
$routes->get('/', 'Home::home');                              // Homepage
$routes->get('/SiteMap', 'SitemapController::index');                              // Homepage
$routes->get('/verhaal', 'Home::verhaal');                          // News listing page
$routes->get('/news', 'Home::news');                          // News listing page
$routes->get('/news-details', 'Home::news_details');          // News details page
$routes->get('/catalogs', 'Home::catalogs');                  // Catalogs listing page
$routes->get('/catalog-details', 'Home::catalog_details');                  // Catalogs listing page
$routes->get('/agenda', 'Home::agenda');                      // Agenda listing page
$routes->get('/agenda-details', 'Home::agenda_details');      // Agenda details page
$routes->get('/contact', 'Home::contact');                    // Contact page
$routes->post('/news-sort', 'Home::NewsSortFunction'); // Handle login
$routes->post('/catalogs-sort', 'Home::CatalogSortFunction'); // Handle login
$routes->post('/search-catalogs', 'Home::searchCatalogs'); // Handle login
$routes->post('/search-news', 'Home::searchNews'); // Handle login
$routes->post('/search-agenda', 'Home::searchAgenda'); // Handle login
//$routes->get('language/switch/(:segment)', 'LanguageController::switch/$1');
$routes->get('language/switch/(:segment)', 'LanguageController::switch/$1');

// Admin Authentication
$routes->get('/admin/index', 'Admin::index');                 // Admin login page
$routes->post('/admin/login-function', 'Admin::loginFunction'); // Handle login
$routes->get('/admin/logout-function', 'Admin::logoutFunction'); // Logout

// Admin: News Management
$routes->get('/admin/admin-news', 'Admin::getNews');                  // News list
$routes->get('/admin/admin-news-add', 'Admin::news_add');             // Add news page
$routes->post('/admin/news-add-function', 'Admin::newsAdd');          // Handle add news
$routes->get('/admin/admin-news-edit', 'Admin::news_edit');           // Edit news page
$routes->post('/admin/news-edit-function', 'Admin::newsEdit');        // Handle edit news
$routes->get('/admin/news-delete-function', 'Admin::newsDelete');     // Handle delete news

// Admin: Catalog Management
$routes->get('/admin/admin-catalogs', 'Admin::getCatalogs');                  // Catalog list
$routes->get('/admin/admin-catalog-add', 'Admin::catalogs_add');              // Add catalog page
$routes->post('/admin/catalog-add-function', 'Admin::catalogsAdd');           // Handle add catalog
$routes->get('/admin/admin-catalog-edit', 'Admin::catalogs_edit');            // Edit catalog page
$routes->post('/admin/catalog-edit-function', 'Admin::catalogsEdit');         // Handle edit catalog
$routes->get('/admin/catalog-delete-function', 'Admin::catalogsDelete');      // Handle delete catalog

// Admin: Agenda Management
$routes->get('/admin/admin-agenda', 'Admin::getAgenda');                  // Agenda list
$routes->get('/admin/admin-agenda-add', 'Admin::agenda_add');            // Add agenda page
$routes->post('/admin/agenda-add-function', 'Admin::agendaAdd');         // Handle add agenda
$routes->get('/admin/admin-agenda-edit', 'Admin::agenda_edit');          // Edit agenda page
$routes->post('/admin/agenda-edit-function', 'Admin::agendaEdit');       // Handle edit agenda
$routes->get('/admin/agenda-delete-function', 'Admin::agendaDelete');      // Handle delete catalog

// Admin: Text Control
$routes->get('/admin/admin-text-control', 'Admin::getAdminTextControl');          // Admin text control page
$routes->get('/admin/admin-text-edit', 'Admin::edit_admin_text');                 // Edit admin text
$routes->post('/admin/admin-text-edit-function', 'Admin::AdminTextChange');       // Handle admin text update

// Admin: Password Management
$routes->get('/admin/admin-update-password', 'Admin::getUpdatePassword');        // Password update page
$routes->post('/admin/admin-update-password-function', 'Admin::updatePassword'); // Handle password update

// Enable Auto Routing (not recommended in production)
$routes->setAutoRoute(true);
