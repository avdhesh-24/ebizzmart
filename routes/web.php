<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/error', function () {
    abort(404);
});
 

Auth::routes(['verify' => true]);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

/*-----------------------Public---------------------*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('cookie-policy', [App\Http\Controllers\HomeController::class, 'cookie_policy'])->name('cookie-policy');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('help/{alias?}', [App\Http\Controllers\HomeController::class, 'Help'])->name('help');
Route::get('search', [App\Http\Controllers\HomeController::class, 'Search'])->name('search');
Route::post('contact-form', [App\Http\Controllers\EnquiryController::class, 'Contact_Form'])->name('contact-form');
Route::get('country-city', [App\Http\Controllers\AccountController::class, 'Country_City'])->name('country-city')->middleware('verified');

////// CATELOG
Route::get('category/{alias?}', [App\Http\Controllers\HomeController::class, 'Category'])->name('category');
Route::get('product/{alias?}', [App\Http\Controllers\HomeController::class, 'Product'])->name('product');
Route::get('company/{alias?}/{page?}', [App\Http\Controllers\HomeController::class, 'Company'])->name('company');
Route::get('companies', [App\Http\Controllers\HomeController::class, 'Companies'])->name('companies');

///// OTHERCONTROLLER
Route::post('ckeditor-image-upload', [App\Http\Controllers\OtherController::class, 'Ckeditor_Image'])->name('ckeditor.image-upload');

///// ENQUIRYCONTROLLER
Route::post('company-contact-enquiry', [App\Http\Controllers\EnquiryController::class, 'Company_Contact_Enquiry'])->name('company-contact-enquiry');

////// USER ACCOUNT 
Route::get('complete-registration', [App\Http\Controllers\AccountController::class, 'Complete_Registration'])->name('account.complete-registration')->middleware('verified');
Route::post('profiles', [App\Http\Controllers\OtherController::class, 'Profiles'])->name('profiles');
Route::post('save-profile', [App\Http\Controllers\AccountController::class, 'Save_Complete_Profile'])->name('account.save-profile');
Route::get('profile', [App\Http\Controllers\AccountController::class, 'index'])->name('profile')->middleware('verified');
Route::get('update-user-information', [App\Http\Controllers\AccountController::class, 'User_Information'])->name('account.update-user-information')->middleware('verified');
Route::get('update-company-information', [App\Http\Controllers\AccountController::class, 'Company_Information'])->name('account.update-company-information')->middleware('verified');
Route::get('update-bank-information', [App\Http\Controllers\AccountController::class, 'Bank_Information'])->name('account.update-bank-information')->middleware('verified');
Route::post('update-trade-capacity', [App\Http\Controllers\AccountController::class, 'Update_Trade_Capacity'])->name('account.update-trade-capacity')->middleware('verified');
Route::post('update-company-introduction', [App\Http\Controllers\AccountController::class, 'Update_Company_Introduction'])->name('account.update-company-introduction')->middleware('verified');

Route::get('remove-company-banner', [App\Http\Controllers\AccountController::class, 'Remove_Company_Banner'])->name('account.remove-company-banner')->middleware('verified');
Route::post('update-company-logo', [App\Http\Controllers\AccountController::class, 'Company_Logo'])->name('account.update-company-logo')->middleware('verified');
Route::post('update-company-album', [App\Http\Controllers\AccountController::class, 'Company_Album'])->name('account.update-company-album')->middleware('verified');
Route::get('remove-company-album', [App\Http\Controllers\AccountController::class, 'Remove_Company_Album'])->name('account.remove-company-album')->middleware('verified');
Route::post('upload-company-certifications', [App\Http\Controllers\AccountController::class, 'Company_Certifications'])->name('account.upload-company-certifications')->middleware('verified');
Route::get('remove-company-certifications', [App\Http\Controllers\AccountController::class, 'Remove_Company_Certifications'])->name('account.remove-company-certifications')->middleware('verified');
Route::post('upload-company-product-certifications', [App\Http\Controllers\AccountController::class, 'Company_Product_Certifications'])->name('account.upload-company-product-certifications')->middleware('verified');
Route::get('remove-company-product-certifications', [App\Http\Controllers\AccountController::class, 'Remove_Company_Product_Certifications'])->name('account.remove-company-product-certifications')->middleware('verified');
Route::post('add-partner-factories', [App\Http\Controllers\AccountController::class, 'Save_Partner_factories'])->name('account.add-partner-factories')->middleware('verified');

Route::get('company-information', [App\Http\Controllers\AccountController::class, 'Company'])->name('account.company-information')->middleware('verified');
Route::get('company-introduction', [App\Http\Controllers\AccountController::class, 'Company_Introduction'])->name('account.company-introduction')->middleware('verified');
Route::get('certifications-and-trademarks', [App\Http\Controllers\AccountController::class, 'Certifications_Trademarks'])->name('account.certifications-and-trademarks')->middleware('verified');
Route::get('trade-capacity', [App\Http\Controllers\AccountController::class, 'Trade_Capacity'])->name('account.trade-capacity')->middleware('verified');
Route::get('partner-factories', [App\Http\Controllers\AccountController::class, 'Partner_Factories'])->name('account.partner-factories')->middleware('verified');

Route::get('manage-product', [App\Http\Controllers\AccountProductController::class, 'index'])->name('account.manage-product')->middleware('verified');
Route::get('post-product/{category?}', [App\Http\Controllers\AccountProductController::class, 'New'])->name('account.post-product')->middleware('verified');


Route::namespace("Admin")->prefix('control-panel')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/dashboard', 'HomeController@index')->name('admin.home');
    Route::get('/our-mobile-app', 'HomeController@Mobile_App')->name('admin.our-mobile-app');
    Route::post('/update-mobile-app', 'HomeController@Update_Mobile_App')->name('admin.update-mobile-app');
    
    Route::get('/complete-and-notice', 'HomeController@Complete_And_Notice')->name('admin.complete-and-notice');
    Route::post('/update-complete-notice', 'HomeController@Update_Complete_Notice')->name('admin.update-complete-notice');
    Route::get('/remove-complete-notice/{id}', 'HomeController@Remove_Complete_Notice')->name('admin.complete-notice-remove');
    

    Route::namespace('Auth')->group(function(){
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
    }); 
 
    /*----------------BANNER MANAGEMENT-----------------*/
    Route::get('/banner', 'BannerController@index')->name('admin.banner');
    Route::get('/add-banner', 'BannerController@New')->name('admin.add-banner');
    Route::get('/edit-banner/{id}', 'BannerController@Edit')->name('admin.editbanner');
    Route::post('/save-banner', 'BannerController@Save')->name('admin.save-banner');
    Route::post('/update-banner', 'BannerController@Update')->name('admin.updatebanner');
    Route::post('/remove-banner', 'BannerController@Remove')->name('admin.banner-remove');
    Route::get('/banner-status/{status}/{id}', 'BannerController@Status')->name('admin.banner-status');
    /*--------------- END BANNER MANGEMENT --------------*/


    /*----------------Advertisement MANAGEMENT-----------------*/
    Route::get('/advertisement-management', 'AdvertisementController@index')->name('admin.addvertisment');
    Route::get('/add-advertisement', 'AdvertisementController@New')->name('admin.new-advertisement');
    Route::get('/edit-advertisement/{id}', 'AdvertisementController@Edit')->name('admin.edit-advertisement');
    Route::post('/save-advertisement', 'AdvertisementController@Save')->name('admin.save-advertisement');
    Route::post('/update-advertisement', 'AdvertisementController@Update')->name('admin.update-advertisement');
    Route::post('/remove-advertisement', 'AdvertisementController@Remove')->name('admin.advertisement-remove');
    Route::get('/advertisement-status/{status}/{id}', 'AdvertisementController@Status')->name('admin.advertisement-status');
    Route::post('/mapped-advertisement-section', 'AdvertisementController@Mapped')->name('admin.mapped-advertisement-section');
    Route::get('/get-advertisement-section', 'AdvertisementController@Section')->name('admin.get-advertisement-section');
    /*--------------- END Advertisement MANGEMENT --------------*/


    /*----------------BANNER BOTTOM MANAGEMENT-----------------*/
    Route::get('/bottom', 'BottomController@index')->name('admin.bottom');
    Route::get('/add-bottom', 'BottomController@New')->name('admin.add-bottom');
    Route::post('/save-bottom', 'BottomController@Save')->name('admin.save-bottom');
    Route::get('/edit-bottom/{id}', 'BottomController@Edit')->name('admin.edit-bottom');
    Route::post('/update-bottom', 'BottomController@Update')->name('admin.update-bottom');
    Route::get('/bottom-status/{status}/{id}', 'BottomController@Status')->name('admin.bottom-status');
    Route::post('/remove-banner-bottom', 'BottomController@Remove')->name('admin.banner-bottom-remove');
    
    /*--------------- END BANNER BOTTOM MANGEMENT --------------*/

        
    /*----------------FOUR SERVICE MANAGEMENT-----------------*/
    Route::get('/four-service', 'FourServiceController@index')->name('admin.four-service');
    Route::get('/edit-four-service/{id}', 'FourServiceController@Edit')->name('admin.edit-four-service');
    Route::post('/update-four-service', 'FourServiceController@Update')->name('admin.update-four-service');
    Route::get('/four-service-status/{status}/{id}', 'FourServiceController@Status')->name('admin.four-service-status');
    /*--------------- END FOUR SERVICE MANGEMENT --------------*/


    /*---------------- Top Category ----------------*/
    Route::get('/top-category', 'HomeController@Top_Category')->name('admin.top-category');
    Route::post('/save-top-category', 'HomeController@Save_Top_Category')->name('admin.save-top-category');
    Route::post('/remove-top-category', 'HomeController@Remove_Top_Category')->name('admin.remove-top-category');
    /*---------------- End Top Category ----------------*/

    /*----------------PRODUCT MANAGEMENT-----------------*/
    Route::get('/products', 'ProductController@index')->name('admin.products');
    Route::get('/add-products', 'ProductController@New')->name('admin.add-products');
    Route::get('/edit-products/{id}', 'ProductController@Edit')->name('admin.edit-products');
    Route::post('/save-products', 'ProductController@Save')->name('admin.save-products');
    Route::post('/update-products', 'ProductController@Update')->name('admin.update-products');
    Route::post('/remove-products', 'ProductController@Remove')->name('admin.products-remove');
    Route::get('/products-featured/{status}/{id}', 'ProductController@Featured')->name('admin.products-featured');
    Route::get('/products-status/{status}/{id}', 'ProductController@Status')->name('admin.products-status');
    
    Route::get('/get-product-images', 'ProductController@Get_Product_Images')->name('admin.get-product-images');
    Route::get('/get-product-category-attributes', 'ProductController@Product_Category_Attribute')->name('admin.get-product-category-attributes');
    /*--------------- END PRODUCT MANGEMENT --------------*/

    /*--------------------Attributes MANAGEMENT-------------------------------*/
    Route::get('/attribute-group', 'AttributeController@Group_index')->name('admin.attribute-group');
    Route::get('/add-attribute-group', 'AttributeController@New_Group')->name('admin.add-attribute-group');
    Route::post('/save-attribute-group', 'AttributeController@Save_Group')->name('admin.save-attribute-group');
    Route::get('/edit-attribute-group/{id}', 'AttributeController@Edit_Group')->name('admin.edit-attribute-group');
    Route::post('/update-attribute-group', 'AttributeController@Update_Group')->name('admin.update-attribute-group');
    Route::post('/remove-attribute-group', 'AttributeController@Remove_Group')->name('admin.remove-attribute-group');
    Route::get('/attribute-group-status/{status}/{id}', 'AttributeController@Group_Status')->name('admin.attribute-group-status');
    Route::get('/attribute-group-search', 'AttributeController@Search_Group')->name('admin.attribute-group-search');

    Route::get('/attributes/{id}', 'AttributeController@index')->name('admin.attributes');
    Route::get('/add-attributes/{id}', 'AttributeController@New')->name('admin.add-attributes');
    Route::post('/save-attributes', 'AttributeController@Save')->name('admin.save-attributes');
    Route::get('/edit-attributes/{id}', 'AttributeController@Edit')->name('admin.edit-attributes');
    Route::post('/update-attributes', 'AttributeController@Update')->name('admin.update-attributes');
    Route::post('/remove-attributes', 'AttributeController@Remove')->name('admin.remove-attributes');
    Route::get('/attributes-status/{status}/{id}', 'AttributeController@Status')->name('admin.attributes-status');
    Route::get('/attributes-search', 'AttributeController@Search')->name('admin.attributes-search');
    /*--------------------END Attributes MANAGEMENT-------------------------------*/

    /*----------------CATEGORY MANAGEMENT-----------------*/
    Route::get('/brand-mapping/{category}', 'CategoryController@Brand')->name('admin.brand');
    Route::post('/save-map-brand', 'CategoryController@Save_Brand')->name('admin.save-map-brand');
    Route::post('/remove-category-brand', 'CategoryController@Remove_Brand')->name('admin.remove-category-brand');
    
    Route::get('/get-category-attribute-group', 'CategoryController@Attribute_Group')->name('admin.get-category-attribute-group');
    Route::post('/mapped-category-attribute-group', 'CategoryController@Mapped_Attribute_Group')->name('admin.mapped-category-attribute-group');

    Route::get('/category/{parent?}', 'CategoryController@index')->name('admin.category');
    Route::get('/add-category/{parent?}', 'CategoryController@New')->name('admin.add-category');
    Route::get('/edit-category/{id}', 'CategoryController@Edit')->name('admin.edit-category');
    Route::post('/save-category', 'CategoryController@Save')->name('admin.save-category');
    Route::post('/update-category', 'CategoryController@Update')->name('admin.update-category');
    Route::post('/remove-category', 'CategoryController@Remove')->name('admin.category-remove');
    Route::get('/category-status/{status}/{id}', 'CategoryController@Status')->name('admin.category-status');
    Route::get('/category-top-status/{status}/{id}', 'CategoryController@TopStatus')->name('admin.category-top-status');
    Route::get('/category-home-status/{status}/{id}', 'CategoryController@HomeStatus')->name('admin.category-home-status');
    
    /*--------------- END CATEGORY MANGEMENT --------------*/



    /*----------------CMS MANAGEMENT-----------------*/
    Route::get('/cms/{id}', 'CmsController@index')->name('admin.cms');
    Route::get('/new-cms', 'CmsController@New')->name('admin.newcms');
    Route::get('/edit-cms/{id}', 'CmsController@Edit')->name('admin.editcms');
    Route::post('/save-cms', 'CmsController@Save')->name('admin.savecms');
    Route::post('/update-cms', 'CmsController@Update')->name('admin.updatecms');
    Route::post('/update-othercms', 'CmsController@Update2')->name('admin.update-cms');
    Route::get('/cms-status/{status}/{id}', 'CmsController@Status')->name('admin.cmsstatus');
    /*--------------- END CMS MANGEMENT --------------*/



    /*----------------Blog Category MANAGEMENT-----------------*/
    Route::get('/blog-category', 'BlogCategoryController@index')->name('admin.blog-category');
    Route::get('/new-blog-category', 'BlogCategoryController@New')->name('admin.new-blog-category');
    Route::post('/save-blog-category', 'BlogCategoryController@Save')->name('admin.save-blog-category');
    Route::get('/edit-blog-category/{id}', 'BlogCategoryController@Edit')->name('admin.edit-blog-category');
    Route::post('/update-blog-category', 'BlogCategoryController@Update')->name('admin.update-blog-category');
    Route::get('/blog-category-status/{status}/{id}', 'BlogCategoryController@Status')->name('admin.blog-category-status');
    Route::post('/remove-blog-category', 'BlogCategoryController@Remove')->name('admin.blog-category-remove');
    
    Route::get('/blog-management', 'BlogController@index')->name('admin.blog-management');
    Route::get('/new-blog', 'BlogController@New')->name('admin.new-blog');
    Route::post('/save-blog', 'BlogController@Save')->name('admin.save-blog');
    Route::get('/edit-blog/{id}', 'BlogController@Edit')->name('admin.edit-blog');
    Route::post('/update-blog', 'BlogController@Update')->name('admin.update-blog');
    Route::get('/blog-status/{status}/{id}', 'BlogController@Status')->name('admin.blog-status');
    Route::post('/remove-blog', 'BlogController@Remove')->name('admin.blog-remove');
    /*--------------- END Blog Category MANGEMENT --------------*/
    



    /*----------------Country MANAGEMENT-----------------*/
    Route::get('/country', 'CountryController@index')->name('admin.country');
    Route::get('/new-country', 'CountryController@New')->name('admin.new-country');
    Route::post('/save-country', 'CountryController@Save')->name('admin.save-country');
    Route::get('/edit-country/{id}', 'CountryController@Edit')->name('admin.edit-country');
    Route::post('/update-country', 'CountryController@Update')->name('admin.update-country');
    Route::get('/country-status/{status}/{id}', 'CountryController@Status')->name('admin.country-status');
    Route::get('/country-footer-status/{status}/{id}', 'CountryController@Footer_Status')->name('admin.country-footer-status');
    Route::post('/remove-country', 'CountryController@Remove')->name('admin.country-remove');


    Route::get('/country-state/{id}', 'StateController@index')->name('admin.country-state');
    Route::get('/new-country-state/{country}', 'StateController@New')->name('admin.new-country-state');
    Route::post('/save-country-state', 'StateController@Save')->name('admin.save-country-state');
    Route::get('/edit-country-state/{id}', 'StateController@Edit')->name('admin.edit-country-state');
    Route::post('/update-country-state', 'StateController@Update')->name('admin.update-country-state');
    Route::get('/country-state-status/{status}/{id}', 'StateController@Status')->name('admin.country-status-state');
    Route::post('/remove-country-state', 'StateController@Remove')->name('admin.country-state-remove');


    Route::get('/state-city/{id}', 'CityController@index')->name('admin.state-city');
    Route::get('/new-state-city/{country}', 'CityController@New')->name('admin.new-state-city');
    Route::post('/save-state-city', 'CityController@Save')->name('admin.save-state-city');
    Route::get('/edit-state-city/{id}', 'CityController@Edit')->name('admin.edit-state-city');
    Route::post('/update-state-city', 'CityController@Update')->name('admin.update-state-city');
    Route::get('/state-city-status/{status}/{id}', 'CityController@Status')->name('admin.state-city-state');
    Route::post('/remove-state-city', 'CityController@Remove')->name('admin.state-city-remove');
    

    /*--------------- END Country MANGEMENT --------------*/



    /*----------------Contact MANAGEMENT-----------------*/
    Route::get('/contact', 'ContactController@index')->name('admin.contact');
    Route::get('/new-contact', 'ContactController@New')->name('admin.new-contact');
    Route::post('/save-contact', 'ContactController@Save')->name('admin.save-contact');
    Route::get('/edit-contact/{id}', 'ContactController@Edit')->name('admin.edit-contact');
    Route::post('/update-contact', 'ContactController@Update')->name('admin.update-contact');
    Route::get('/caste-contact/{status}/{id}', 'ContactController@Status')->name('admin.contact-status');
    Route::post('/remove-contact', 'ContactController@Remove')->name('admin.contact-remove');
    /*--------------- END Contact MANGEMENT --------------*/


    /*----------------USER MANAGEMENT-----------------*/
    Route::get('/user-management/{id?}', 'UserController@index')->name('admin.user-management');
    Route::post('/remove-user', 'UserController@Remove')->name('admin.user-remove');
    Route::get('/user-status/{status}/{id}', 'UserController@Status')->name('admin.user-status');
    Route::get('/user-verificatiion-status/{status}/{id}', 'UserController@Verification_Status')->name('admin.user-verificatiion-status');
    
    /*--------------- END USER MANGEMENT --------------*/


    /*----------------Social Media MANAGEMENT-----------------*/
    Route::get('/social-media', 'SocialMediaController@index')->name('admin.social-media');
    Route::post('/remove-social-media', 'SocialMediaController@Remove')->name('admin.social-media-remove');
    Route::post('/save-social-media', 'SocialMediaController@Save')->name('admin.save-social-media');
    Route::post('/update-social-media', 'SocialMediaController@Update')->name('admin.update-social-media');
    /*--------------- END Social Media MANGEMENT --------------*/

    /*----------------Region Suppliers-----------------*/
        Route::get('/region-suppliers', 'HomeController@Region_Suppliers')->name('admin.region-suppliers');
        Route::post('/remove-region-suppliers', 'HomeController@Remove_Region_Suppliers')->name('admin.remove-region-suppliers');
        Route::post('/save-region-suppliers', 'HomeController@Save_Region_Suppliers')->name('admin.save-region-suppliers');
        Route::get('/region-suppliers-status/{status}/{id}', 'HomeController@Region_Supplier_Status')->name('admin.region-suppliers-status');
        Route::post('/edit-supplier-region', 'HomeController@Region_Supplier_Edit')->name('admin.edit-supplier-region');
    /*--------------- END Region Suppliers --------------*/

    /*----------------Our Facility-----------------*/
        Route::get('/our-facility', 'FacilityController@index')->name('admin.our-facility');
        Route::post('/remove-our-facility', 'FacilityController@Remove')->name('admin.remove-our-facility');
        Route::post('/save-our-facility', 'FacilityController@Save')->name('admin.save-our-facility');
        Route::get('/our-facility-status/{status}/{id}', 'FacilityController@Status')->name('admin.our-facility-status');
        Route::post('/edit-our-facility', 'FacilityController@Edit')->name('admin.edit-our-facility');
    /*--------------- END Our Facility--------------*/

    /*----------------Brand-----------------*/
    Route::get('/brand', 'BrandController@index')->name('admin.brand');
    Route::get('/brand-detail', 'BrandController@Detail')->name('admin.brand-detail');
    Route::post('/remove-brand', 'BrandController@Remove')->name('admin.remove-brand');
    Route::post('/save-brand', 'BrandController@Save')->name('admin.save-brand');
    Route::get('/brand-status/{status}/{id}', 'BrandController@Status')->name('admin.brand-status');
    Route::post('/edit-brand', 'BrandController@Edit')->name('admin.edit-brand');
/*--------------- END Brand--------------*/


    /*-------------------- Export Excel -------------------------*/
        Route::post('/order-export', 'ExportController@Order')->name('admin.order-export');
        Route::post('/brand-export', 'ExportController@Brand')->name('admin.brand-export');
        Route::get('/category-export/{parent?}', 'ExportController@Category')->name('admin.category-export');
        Route::post('/product-export', 'ExportController@Product')->name('admin.product-export');
        Route::post('/coupon-export', 'ExportController@Coupon')->name('admin.coupon-export');
        Route::post('/users-export', 'ExportController@Users')->name('admin.users-export');
        Route::get('/category-product/{category}', 'ExportController@Download_Product_CategoryCSV')->name('admin.category-product');
    /*-------------------- END Export Excel -------------------------*/


    /*----------------Setting MANAGEMENT-----------------*/
     Route::get('/setting', 'SettingController@index')->name('admin.setting');
     Route::post('/update-setting', 'SettingController@Update')->name('admin.update-setting');
    /*--------------- END Setting MANGEMENT --------------*/
 

});


