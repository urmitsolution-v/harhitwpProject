<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\Navigationcontroller;
use App\Http\Controllers\Apis\ConversationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('/main-menus', [Navigationcontroller::class, 'getMainMenus']);
// Route::get('/sub-menus/{menu_id}', [Navigationcontroller::class, 'getSubMenus']);
// Route::get('/page/{slug}', [Navigationcontroller::class, 'getPageBySlug']);
// Route::get('/blogs', [Navigationcontroller::class, 'blogs']);
// Route::get('/blog-categories', [Navigationcontroller::class, 'blogCategories']);
// Route::get('/blogs/search', [Navigationcontroller::class, 'searchBlogs']);
// Route::get('/blogs/by-category', [Navigationcontroller::class, 'blogsByCategory']);
// Route::post('/contactus-enquiry', [Navigationcontroller::class, 'submitContactForm']);
// Route::get('/blog/{slug}', [Navigationcontroller::class, 'getBlogDetail']);
// Route::get('/who-we-are', [Navigationcontroller::class, 'whoWeAre']);
// Route::get('/teams', [Navigationcontroller::class, 'getTeams']);
// Route::get('/team/{slug}', [Navigationcontroller::class, 'getTeamsbyslug']);
// Route::get('/banners', [Navigationcontroller::class, 'getBanners']);
// Route::get('/insights', [Navigationcontroller::class, 'getinsights']);
// Route::get('/home-insights', [Navigationcontroller::class, 'gethomeinsights']);
// Route::get('/home-blogs', [Navigationcontroller::class, 'gethomeblogs']);
// Route::get('/insights-detail-page/{slug}', [Navigationcontroller::class, 'insightdetails']);
// Route::get('/career', [Navigationcontroller::class, 'getCareer']);




Route::controller(Navigationcontroller::class)->group(function () {

    // Menu Endpoints
    Route::get('/main-menus', 'getMainMenus');
    Route::get('/sub-menus/{menu_id}', 'getSubMenus');

    // Static Page
    Route::get('/page/{slug}', 'getPageBySlug');

    // Blog APIs
    Route::get('/blogs', 'blogs');
    Route::get('/blog/{slug}', 'getBlogDetail');
    Route::get('/blog-categories', 'blogCategories');
    Route::get('/blogs/search', 'searchBlogs');
    Route::get('/blogs/by-category', 'blogsByCategory');

    // Contact Form
    Route::post('/contactus-enquiry', 'submitContactForm');

    // About Us
    Route::get('/who-we-are', 'whoWeAre');

    // Teams
    Route::get('/teams', 'getTeams');
    Route::get('/team/{slug}', 'getTeamsbyslug');

    // Banners
    Route::get('/banners', 'getBanners');

    // Insights
    Route::get('/insights', 'getinsights');
    Route::get('/insights-detail-page/{slug}', 'insightdetails');

    // Home Specific Data
    Route::get('/home-insights', 'gethomeinsights');
    Route::get('/home-blogs', 'gethomeblogs');

    // Career
    Route::get('/career', 'getCareer');
    Route::get('/investments', 'getinvestments');
    Route::get('/publications', 'getpublications');
    Route::get('/faqs', 'getfaqs');
    Route::get('/impact-stories', 'getimpactstories');
    Route::get('/global-dpi-summit', 'getglobaldpi');
    Route::get('/inclusivity-pulse', 'getInclusivityPulseData');
    Route::get('/about-us', 'getAboutUsData');
    Route::get('/infrastructure-thinking', 'infrastructureThinkingApi');
    Route::get('/government-solutions', 'governmentSolutionsApi');
    Route::get('/home-partners', 'homePartnersApi');
    Route::get('/investments-partners', 'InvestmentPartnersApi');
    Route::get('/gds-highlights', 'getGdsHighlights');
    Route::get('/countries', 'countries');
    Route::get('/country/{slug}', 'countryDetails');

    Route::post('/subscribe', 'subscribe');
    Route::get('/general-setting', 'getGeneralSetting');
    Route::get('/highlights', 'highlights');
    Route::get('/impact', 'getImpact');
    Route::get('/event-highlight', 'getEventHighlight');

});


Route::post('/conversation', [ConversationController::class, 'store']);