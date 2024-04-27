<?php

// use App\Http\Controllers\Auth\RegisterController;
// use Facade\FlareClient\View;

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SocialController;
// use App\Http\Controllers\CustomAuthController;
// use App\Models\Settings;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Define a group of routes with a common prefix, namespace, and alias for frontend routes.
 *
 * @param  array  $attributes
 *   An array of attributes for the route group.
 *   - 'prefix' (string): Specifies the common prefix for all routes in the group.
 *   - 'as' (string): Alias for the route group, used to generate named routes.
 *   - 'namespace' (string): The namespace for the controller class of the group.
 *
 * @param  Closure  $callback
 *   The callback function containing the route definitions for the group.
 *   Each route within this group will have the specified prefix, alias, and namespace.
 *
 * @return void
 */
  Auth::routes();
  Route::group(['prefix' => '/', 'as' => 'frontend.', 'namespace' => 'App\Http\Controllers\Frontend'], function () {

    /**
     * Define a route for the homepage.
     *
     * @method GET
     * @uri    /
     * @action PagesController@index
     */
    Route::get('/', "PagesController@index")->name('homepage');
    Route::get('/milk', "PagesController@milk")->name('milk');
    Route::get('sliders', [SliderController::class, 'index']);



    /**
     * Define a route for the 'about' page.
     *
     * @method GET
     * @uri    /about
     * @action PagesController@about
     */
    Route::get('/about', "PagesController@about")->name('about');

    /**
     * Define a route for the 'contact' page.
     *
     * @method GET
     * @uri    /contact
     * @action PagesController@contact
     */
    Route::get('/contact', "PagesController@contact")->name('contact');

    /**
     * Define a route for the 'products' page.
     *
     * @method GET
     * @uri    /products
     * @action PagesController@products
     */
    Route::get('/products', "PagesController@products")->name('products');

    /**
     * Define a route for the 'services' page.
     *
     * @method GET
     * @uri    /services
     * @action PagesController@services
     */
    Route::get('/services', "PagesController@services")->name('services');

    /**
     * Define a route for the details of a service.
     *
     * @method GET
     * @uri    /services/details
     * @action PagesController@serviceDetails
     */
    Route::get('/services/details/{id}', "PagesController@serviceDetails")->name('service-details');

    /**
     * Define a route for the 'blogs' page.
     *
     * @method GET
     * @uri    /blogs
     * @action PagesController@blogs
     */
    Route::get('/blog', "PagesController@blogs")->name('blog');
    Route::get('/gallery', "PagesController@gallery")->name('gallery');

    /**
     * Define a route for the details of a blog post.
     *
     * @method GET
     * @uri    /blogs/details
     * @action PagesController@blogDetails
     */
    Route::get('/blog/details', "PagesController@blogDetails")->name('blog-details');
});

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

route::get('/dashboard/login',[HomeController::class,'getLogen'])->name('getLogen');

Route::post('/dashboard/login',[HomeController::class,'postLogin'])->name('postLogin');
Route::get('/dashboard/forgot-password',[HomeController::class,'forgot'])->name('forgot');




// Route::get('login', [CustomAuthController::class, 'index'])->name('getLogen');
// Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('postLogin');
Route::get('/dashboard/register', [HomeController::class, 'registration'])->name('registration');
Route::post('/dashboard/registration', [HomeController::class, 'customRegistration'])->name('register.custom');
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


 Route::group(['middelware' => ['auth']], function(){
    Route::post('/dashboard/logout', [HomeController::class, 'logout'])->name('logout');
 });
//settings
Route::get('/dashboard/settings',[SettingsController::class,'show_settings'])->name('show.settings');
  Route::post('/dashboard/settings/store',[SettingsController::class,'update_title'])->name('update.title');
//update.logo
  Route::post('/dashboard/settings',[SettingsController::class,'update_logo'])->name('update.logo');

  //Route::post('/dashboard/update/logo',[SettingsController::class,'update_logo'])->name('update.logo');




// users
Route::get('/dashboard/users',[SettingsController::class,'shows'])->name('show.user');
//add user
Route::get('/dashboard/uses/add',[SettingsController::class,'store'])->name('users.store');
//update users
Route::post('/dashboard/users/update' , [SettingsController::class ,'update'])->name('users.update');
//users delete
Route::get('/dashboard/users/delete/{id}' , [SettingsController::class ,'delete'])->name('users.delete');

//show.about
Route::get('/dashboard/about',[SettingsController::class,'show_about'])->name('show.about');//slider
    //slider_store
    Route::get('/dashboard/about/store',[SettingsController::class,'store_about'])->name('store.about');
    //add_slider
    Route::post('/dashboard/about/add/',[SettingsController::class,'add_about'])->name('add.about');
    Route::get('/dashboard/about/updated/{id}',[SettingsController::class,'updated_about'])->name('updated.about');
    Route::post('/dashboard/about/edit/{id}',[SettingsController::class,'edit_about'])->name('edit.about');
    //delete about
    Route::get('/dashboard/about/delete/{id}',[SettingsController::class,'delete_about'])->name('delete.about');




//show.service

Route::get('/dashboard/service',[ServiceController::class,'show_service'])->name('show.service');
    //slider service
    Route::get('/dashboard/service/store',[ServiceController::class,'store_service'])->name('store.service');
    //add service
    Route::post('/dashboard/service/add/',[ServiceController::class,'add_service'])->name('add.service');
    Route::get('/dashboard/service/updated/{id}',[ServiceController::class,'update_service'])->name('update.service');
    Route::post('/dashboard/service/edit/{id}',[ServiceController::class,'edit_service'])->name('edit.service');
    //delete service
    Route::get('/dashboard/service/delete/{id}',[ServiceController::class,'delete_service'])->name('delete.service');



//slider_show
Route::get('/dashboard/slider',[SettingsController::class,'show_slider'])->name('show.slider');
    //slider_store
    Route::get('/dashboard/slider/store',[SettingsController::class,'slider_store'])->name('store.slider');
    //add_slider
    Route::post('/dashboard/slider/store/add',[SettingsController::class,'add_slider'])->name('add.slider');
    //delete slider delete.slider
    Route::get('/dashboard/slider/store/delete/{id}',[SettingsController::class,'delete_slider'])->name('delete.slider');


// show products
Route::get('/dashboard/products',[ProductController::class,'show_product'])->name('show.product');
//store.Product
    Route::get('/dashboard/products/store',[ProductController::class,'store_product'])->name('store.product');
    //add_slider
    Route::post('/dashboard/products/store/add',[ProductController::class,'add_product'])->name('add.product');
    Route::get('/dashboard/product/updated/{id}',[ProductController::class,'update_product'])->name('update.product');
    Route::post('/dashboard/product/edit/{id}',[ProductController::class,'edit_product'])->name('edit.product');
    Route::get('/dashboard/products/store/delete/{id}',[ProductController::class,'delete_product'])->name('delete.product');

// show teams
Route::get('/dashboard/teams',[TeamController::class,'show_teams'])->name('show.team');
    Route::get('/dashboard/teams/store',[TeamController::class,'store_teams'])->name('store.team');
    Route::post('/dashboard/teams/store/add',[TeamController::class,'add_teams'])->name('add.team');
    Route::get('/dashboard/teams/updated/{id}',[TeamController::class,'update_teams'])->name('update.team');
    Route::post('/dashboard/teams/edit/{id}',[TeamController::class,'edit_teams'])->name('edit.team');
    Route::get('/dashboard/teams/store/delete/{id}',[TeamController::class,'delete_teams'])->name('delete.team');

// show Blog
Route::get('/dashboard/Blog',[BlogController::class,'show_blog'])->name('show.blog');
    Route::get('/dashboard/Blog/store',[BlogController::class,'store_blog'])->name('store.blog');
    Route::post('/dashboard/Blog/store/add',[BlogController::class,'add_blog'])->name('add.blog');
    Route::get('/dashboard/Blog/updated/{id}',[BlogController::class,'update_blog'])->name('update.blog');
    Route::post('/dashboard/Blog/edit/{id}',[BlogController::class,'edit_blog'])->name('edit.blog');
    Route::get('/dashboard/Blog/store/delete/{id}',[BlogController::class,'delete_blog'])->name('delete.blog');
// show partners
Route::get('/dashboard/partners',[PartnersController::class,'show_partner'])->name('show.partner');
    Route::get('/dashboard/partners/store',[PartnersController::class,'store_partner'])->name('store.partner');
    Route::post('/dashboard/partners/store/add',[PartnersController::class,'add_partner'])->name('add.partner');
    Route::get('/dashboard/partners/updated/{id}',[PartnersController::class,'update_partner'])->name('update.partner');
    Route::post('/dashboard/partners/edit/{id}',[PartnersController::class,'edit_partner'])->name('edit.partner');
    Route::get('/dashboard/partners/store/delete/{id}',[PartnersController::class,'delete_partner'])->name('delete.partner');
// show gallery
Route::get('/dashboard/gallery',[GalleryController::class,'show_gallery'])->name('show.gallery');
    Route::get('/dashboard/gallery/store',[GalleryController::class,'store_gallery'])->name('store.gallery');
    Route::post('/dashboard/gallery/store/add',[GalleryController::class,'add_gallery'])->name('add.gallery');
    Route::get('/dashboard/gallery/updated/{id}',[GalleryController::class,'update_gallery'])->name('update.gallery');
    Route::post('/dashboard/gallery/edit/{id}',[GalleryController::class,'edit_gallery'])->name('edit.gallery');
    Route::get('/dashboard/gallery/store/delete/{id}',[GalleryController::class,'delete_gallery'])->name('delete.gallery');

// show gallery
Route::get('/dashboard/socialMedia',[SocialController::class,'show_social'])->name('show.social');
    Route::get('/dashboard/socialMedia/store',[SocialController::class,'store_social'])->name('store.social');
    Route::post('/dashboard/socialMedia/store/add',[SocialController::class,'add_social'])->name('add.social');
    Route::get('/dashboard/socialMedia/updated/{id}',[SocialController::class,'update_social'])->name('update.social');
    Route::post('/dashboard/socialMedia/edit/{id}',[SocialController::class,'edit_social'])->name('edit.social');
    Route::get('/dashboard/socialMedia/store/delete/{id}',[SocialController::class,'delete_social'])->name('delete.social');

// show gallery
Route::get('/dashboard/contactUs',[ContactUsController::class,'show_contact'])->name('show.contact');
    Route::get('/dashboard/contactUs/store',[ContactUsController::class,'store_contact'])->name('store.contact');
    Route::post('/dashboard/contactUs/store/add',[ContactUsController::class,'add_contact'])->name('add.contact');
    Route::get('/dashboard/contactUs/updated/{id}',[ContactUsController::class,'update_contact'])->name('update.contact');
    Route::post('/dashboard/contactUs/edit/{id}',[ContactUsController::class,'edit_contact'])->name('edit.contact');
    Route::get('/dashboard/contactUs/store/delete/{id}',[ContactUsController::class,'delete_contact'])->name('delete.contact');

// show footer
Route::get('/dashboard/footer',[FooterController::class,'show_footer'])->name('show.footer');
    Route::get('/dashboard/footer/store',[FooterController::class,'store_footer'])->name('store.footer');
    Route::post('/dashboard/footer/store/add',[FooterController::class,'add_footer'])->name('add.footer');
    Route::get('/dashboard/footer/updated/{id}',[FooterController::class,'update_footer'])->name('update.footer');
    Route::post('/dashboard/footer/edit/{id}',[FooterController::class,'edit_footer'])->name('edit.footer');
    Route::get('/dashboard/footer/store/delete/{id}',[FooterController::class,'delete_footer'])->name('delete.footer');






