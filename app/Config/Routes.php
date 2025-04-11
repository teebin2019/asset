<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Frontend
$routes->get('/', 'Home::index');
$routes->get('/notification', 'Notification::index');
$routes->post('public/index.php/notification/sendPushNotification', 'Notification::sendPushNotification');
$routes->get('Notification1', 'BackofficeController::notification');

// Backend
$routes->match(['get', 'post'], 'Dashboard', 'DashboardController::index', ['filter' => 'authGuard']);
$routes->get('asset-list', 'BackofficeController::index');
$routes->get('asset_add', 'BackofficeController::add');
$routes->post('asset_submit', 'BackofficeController::save');
$routes->get('asset-edit-view/(:any)', 'BackofficeController::update/$1');
$routes->post('assets-update', 'BackofficeController::update_asset');
$routes->get('assets-delete/(:any)', 'BackofficeController::delete/$1');

// สถานที่
$routes->get('Localtion_view', 'BackofficeController::localtion');
$routes->get('Localtion_add', 'BackofficeController::addlocaltion');
$routes->post('Localtion_submit', 'BackofficeController::addlocaltion_save');
$routes->get('Localtion_edit/(:num)', 'BackofficeController::editlocaltion/$1');
$routes->post('Localtion_update', 'BackofficeController::update_localtion');
$routes->get('Localtion_delete/(:num)', 'BackofficeController::delete_localtion/$1');


// ประเภทงบประมาณ
$routes->get('CurrencyTypes_view', 'BackofficeController::type');
$routes->get('CurrencyTypes_add', 'BackofficeController::addtype');
$routes->post('CurrencyTypes_submit', 'BackofficeController::addtype_save');
$routes->get('CurrencyTypes_edit/(:num)', 'BackofficeController::edit_type/$1');
$routes->post('CurrencyTypes_update', 'BackofficeController::update_type');
$routes->get('CurrencyTypes_delect/(:num)', 'BackofficeController::delete_type/$1');



// วิธีการที่ได้มา
$routes->get('Method_view', 'BackofficeController::method');
$routes->get('Method_add', 'BackofficeController::addmethod');
$routes->post('Method_submit', 'BackofficeController::addmethod_save');
$routes->get('Method_edit/(:num)', 'BackofficeController::edit_method/$1');
$routes->post('Method_update', 'BackofficeController::update_method');
$routes->get('Method_delect/(:num)', 'BackofficeController::delete_method/$1');

// ประเภทการจัดซื้อ
$routes->get('AssetTypes_view', 'BackofficeController::assetType');
$routes->get('AssetTypes_add', 'BackofficeController::addassetType');
$routes->post('AssetTypes_submit', 'BackofficeController::addassetType_save');
$routes->get('AssetTypes_edit/(:num)', 'BackofficeController::edit_assetType/$1');
$routes->post('AssetTypes_update', 'BackofficeController::update_assetType');
$routes->get('AssetTypes_delect/(:num)', 'BackofficeController::delete_assetType/$1');

// ข้อมูลผู้ใช้งาน
$routes->get('User_view', 'BackofficeController::users');
$routes->get('User_edit/(:num)', 'BackofficeController::edit_users/$1');
$routes->post('User_update', 'BackofficeController::update_users');
$routes->get('User_delect/(:num)', 'BackofficeController::delete_users/$1');

// ข้อมูลผู้ซื้อขาย
$routes->get('Suppliers_view', 'BackofficeController::suppliers');
$routes->get('Suppliers_add', 'BackofficeController::addsuppliers');
$routes->post('Suppliers_submit', 'BackofficeController::addsuppliers_save');
$routes->get('Suppliers_edit/(:num)', 'BackofficeController::edit_suppliers/$1');
$routes->post('Suppliers_update', 'BackofficeController::update_suppliers');
$routes->get('Suppliers_delect/(:num)', 'BackofficeController::delete_suppliers/$1');

// เก็บประวัติการเข้าออกจากระบบ
$routes->get('log_view', 'BackofficeController::log');



// รายงาน
$routes->get('exportData_asset', 'BackofficeController::serch_export');
$routes->post('serch_asset', 'BackofficeController::exportToCSV_asset');
$routes->get('exportData_currency', 'BackofficeController::exportToCSV_currency');
$routes->get('exportData_localtion', 'BackofficeController::exportToCSV_localtion');
$routes->get('exportData_type_assets', 'BackofficeController::exportToCSV_type_asset');





// รายละเอียด
$routes->get('asset-detail/(:any)', 'BackofficeController::detail/$1');


$routes->get('search', 'SearchController::index');
$routes->match(['get', 'post'], 'search/search', 'SearchController::search');

$routes->get('/asset/calculateDepreciation/(:any)', 'BackofficeController::calculateDepreciation/$1');
$routes->get('/depart', 'DepreciationController::index');


// Logup
$routes->get('/logup', 'BackofficeController::Register');
$routes->match(['get', 'post'], 'Logup/store', 'BackofficeController::store');
$routes->match(['get', 'post'], 'Login/loginAuth', 'BackofficeController::loginAuth');
$routes->get('/login', 'BackofficeController::login');
$routes->get('/logout', 'BackofficeController::logout');

// ปฎิทิน
$routes->match(['get', 'post'], '/Calendar', 'FullCalendar::index');

// โปรไฟล์
$routes->get('/profile', 'BackofficeController::profile');

// ปริ้นpdf
$routes->get('/printpdf', 'BackofficeController::pdf');
$routes->get('PdfController/htmlToPDF', 'BackofficeController::htmlToPDF');
$routes->get('pdf/print-preview', 'BackofficeController::printPreview');
$routes->get('csv/test', 'Textexport::index');

// qr code
$routes->get('/qr-codes', 'QrCodeGeneratorController::index');

// send email
$routes->get('/send_email', 'SendMail::index');
$routes->match(['get', 'post'], 'SendMail/sendMail', 'SendMail::sendMail');


// Forget Password
$routes->get('/forget_password', 'ForgetPassword::index');
// Handle the submission of the forgot password form
$routes->post('sendresetlink', 'ForgetPassword::sendResetLink');

// Display the password reset form
$routes->get('reset-password/(:any)', 'ForgetPassword::showResetForm/$1');

// Handle the submission of the password reset form
$routes->post('reset-password', 'ForgetPassword::resetPassword');


// คู่มือการใช้งาน
$routes->get('/guide', 'BackofficeController::guide');

// การตั้งค่า  
$routes->get('/Setting', 'BackofficeController::setting');
$routes->post('/setting', 'BackofficeController::upload');


// Reset Password
$routes->get('reset_password_User/(:num)', 'BackofficeController::reset_password/$1');
$routes->post('reset_password_User', 'BackofficeController::resetpasword');


// หน้าปริ้นPdfแบบครุภัณฑ์ตัวเดียว
$routes->get('/print_pdf/(:any)', 'BackofficeController::printpdf/$1');
$routes->match(['get', 'post'],'/print_pdf_value', 'BackofficeController::print_pdf_value');