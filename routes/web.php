<?php

use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\DentistController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\TestimonialController;

use App\Http\Controllers\Frontend\FaqController;







Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::delete('service-sections/destroy', 'ServiceSectionController@massDestroy')->name('service-sections.massDestroy');
Route::resource('service-sections', 'ServiceSectionController');

Route::get('about-page-section', 'AboutPageSectionController@index')->name('about-page-section.index');
    Route::put('about-page-section', 'AboutPageSectionController@update')->name('about-page-section.update');
    

    Route::get('dentist-profile-section', 'DentistProfileSectionController@index')->name('dentist-profile-section.index');
Route::put('dentist-profile-section', 'DentistProfileSectionController@update')->name('dentist-profile-section.update');

Route::delete('gallery-categories/destroy', 'GalleryCategoryController@massDestroy')->name('gallery-categories.massDestroy');
Route::resource('gallery-categories', 'GalleryCategoryController');

Route::delete('gallery-items/destroy', 'GalleryItemController@massDestroy')->name('gallery-items.massDestroy');
Route::resource('gallery-items', 'GalleryItemController');

Route::delete('before-after-galleries/destroy', 'BeforeAfterGalleryController@massDestroy')->name('before-after-galleries.massDestroy');
Route::resource('before-after-galleries', 'BeforeAfterGalleryController');

Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
Route::resource('testimonials', 'TestimonialController');

Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::get('/services', [ServicesController::class, 'index'])->name('frontend.services.index');

Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');


Route::get('/dentist-profile', [DentistController::class, 'index'])->name('frontend.dentist-profile');

Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery');


Route::get('/testimonials', [TestimonialController::class, 'index'])->name('frontend.testimonials');


Route::get('/faq', [FaqController::class, 'index'])->name('frontend.faq');