<?php

use App\Http\Controllers\Admin\Blogs;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\Coursecontroller;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\Pagecontroller;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\Front\Commoncontroller;
use App\Http\Controllers\Front\Homecontroller;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ImpactStoryController;
use App\Http\Controllers\Menucontroller;
use App\Http\Controllers\InclusivityPulseController;
use App\Http\Middleware\Superadmin;
use App\Http\Middleware\Team;
use Illuminate\Support\Facades\Route;


//  -website routes -

Route::get('/', [Homecontroller::class, 'index'])->name('index');
Route::get('/about-us', [Homecontroller::class, 'about'])->name('about');
Route::get('/key-benefits', [Homecontroller::class, 'key_benefits'])->name('key_benefits');
Route::get('/training-material', [Homecontroller::class, 'training_material'])->name('training_material');
Route::get('/partner-with-us', [Homecontroller::class, 'partner_withus'])->name('partner_withus');
Route::get('/product-catalogue', [Homecontroller::class, 'product_catalogue'])->name('product_catalogue');
Route::get('/store-fitment-catalogue', [Homecontroller::class, 'store_fitmentcatalogue'])->name('store_fitmentcatalogue');
Route::get('/locate-store', [Homecontroller::class, 'locatestore'])->name('locatestore');
Route::get('/discounts', [Homecontroller::class, 'discounts'])->name('discounts');
Route::get('/har-hith-news', [Homecontroller::class, 'harhithnews'])->name('arhith-news');
Route::get('/contact-us', [Homecontroller::class, 'contactus'])->name('contactus');


Route::get('/franchise-registration', [Homecontroller::class, 'franchise_registration'])->name('franchise_registration');
Route::get('/login', [Homecontroller::class, 'login'])->name('login');

// Route::get('/flight-list', [Homecontroller::class, 'flight_list'])->name('flight-list');
// Route::get('/hotel-list', [Homecontroller::class, 'hotel_list'])->name('hotel-list');
// Route::get('/contact-us', [Homecontroller::class, 'contactus'])->name('contactus');
// Route::get('/blogs', [Homecontroller::class, 'blogs'])->name('blogs');
// Route::get('/blog/{slug}', [Homecontroller::class, 'blogdetail'])->name('blogdetail');

// Route::get('/blog', [Commoncontroller::class, 'blog'])->name('blog');

// Route::get('/blog/{slug}', [Commoncontroller::class, 'singleblog'])->name('singleblog');
// Route::post('/single-blog/{slug}', [Commoncontroller::class, 'singleblog'])->name('singleblog');
// // Route::get('/contactdata', [Commoncontroller::class, 'contactdata'])->name('contactdata');
// // Route::post('/contactdata', [Commoncontroller::class, 'contactdata'])->name('contactdata');

// Route::get('/our-team', [Commoncontroller::class, 'ourteam'])->name('ourteam');
// Route::get('/services', [Commoncontroller::class, 'services'])->name('services');
// Route::get('/industries', [Commoncontroller::class, 'industries'])->name('industries');
// Route::get('/case-studies', [Commoncontroller::class, 'case_studie'])->name('case_studie');
// Route::get('/service/{slug}', [Commoncontroller::class, 'servicesdetails'])->name('services-details');
// Route::get('/industry/{slug}', [Commoncontroller::class, 'industryDetails'])->name('industry-details');
// Route::get('/case-study/{slug}', [Commoncontroller::class, 'caseStudyDetails'])->name('case-study-details');
// Route::post('contact-form', [Commoncontroller::class, 'contactForm'])->name('contact-form');

Route::post('subscription-form', [Commoncontroller::class, 'subscriptionForm'])->name('subscription-form');

// admin---panel-----work------------------>
Route::middleware([Superadmin::class])->prefix('admin')->group(function () {

    Route::match(['get', 'post'], '/dashboard', [AdminpanelController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], '/profile', [AdminpanelController::class, 'profile'])->name('profile');
    Route::post('/change-password', [AdminpanelController::class, 'change_password'])->name('change_password');
    Route::post('updateprofileadmin', [AdminpanelController::class, 'updateprofileadmin'])->name('updateprofileadmin');
    Route::get('/changestatus/{table}/{id}/{colom}/{value}', [AdminpanelController::class, 'changestatus'])->name('changestatus');
    Route::get('/deleterow/{table}/{id}', [AdminpanelController::class, 'deleterow'])->name('deleterow');
    // webpages
    Route::match(['get', 'post'], '/counters', [Pagecontroller::class, 'counteradd'])->name('counteradd');
    //pagesettings
    Route::match(['get', 'post'], '/new-page', [Pagecontroller::class, 'newpage'])->name('newpage');
    Route::match(['get', 'post'], '/pages-setting', [Pagecontroller::class, 'seomanagement'])->name('seomanagement');
    Route::match(['get', 'post'], '/edit-page/{id}', [Pagecontroller::class, 'editpage'])->name('editpage');
    Route::match(['get', 'post'], '/deletepage/{id}', [Pagecontroller::class, 'deletepage'])->name('deletepage');
    Route::match(['get', 'post'], '/awards', [Pagecontroller::class, 'awards'])->name('awards');
    Route::match(['get', 'post'], '/working-areas', [Pagecontroller::class, 'workingAreas'])->name('working-areas');
    Route::match(['get', 'post'], '/working-process', [Pagecontroller::class, 'workingprocess'])->name('processwork.about');
    Route::match(['get', 'post'], '/workingprocess-edit/{id}', [Pagecontroller::class, 'workingprocessedit'])->name('workingprocessedit');
    Route::match(['get', 'post'], '/create-working-proces', [Pagecontroller::class, 'createworkingproces'])->name('createworkingproces');
    Route::match(['get', 'post'], '/home-image', [Pagecontroller::class, 'homeimage'])->name('home-image');
    Route::match(['get', 'post'], '/have-a-look', [Pagecontroller::class, 'have_a_look'])->name('have_a_look');
    Route::match(['get', 'post'], '/news-articles', [Pagecontroller::class, 'news'])->name('news-articles');


    Route::match(['get', 'post'], '/global-dpi-summit', [Pagecontroller::class, 'globalDpiSummit'])->name('global-dpi-summit');
      Route::post('/global-dpi-summit', [Pagecontroller::class, 'store_globaldpisummit'])->name('global-dpi-summit.store');

      Route::get('/inclusivity-pulse-for-dpi', [Pagecontroller::class, 'store_inclusivitypulsefordpi'])->name('inclusivity-pulse-for-dpi.store');
      Route::post('/inclusivity-pulse-for-dpi-submit', [InclusivityPulseController::class, 'submitpulse'])->name('pulse-for-dpi.submit');

    // Route::match(['get', 'post'], '/faqs', [Pagecontroller::class, 'faq'])->name('faq');

    Route::resource('stories', ImpactStoryController::class);


    Route::get('faqs', [FaqController::class, 'index'])->name('faq.index');
    Route::post('faq-settings', [FaqController::class, 'storeSetting'])->name('faq.settings.store');
    Route::post('faq-store', [FaqController::class, 'storeFaq'])->name('faq.store');
    Route::delete('faq/{id}', [FaqController::class, 'destroyFaq'])->name('faq.destroy');
    Route::put('faqs/{faq}', [FaqController::class, 'updateFaq'])->name('faq.update');

    
    Route::match(['get', 'post'], '/schedule-an-intro', [Pagecontroller::class, 'scheduleAnIntro'])->name('schedule-an-intro');
    //skillsadd
    Route::match(['get', 'post'], '/skillsadd', [Pagecontroller::class, 'skillsadd'])->name('skillsadd');
    //
    Route::match(['get', 'post'], '/workingadd', [Pagecontroller::class, 'workingadd'])->name('workingadd');
    Route::match(['get', 'post'], '/careers', [Pagecontroller::class, 'careers'])->name('careers.admin');
    Route::match(['get', 'post'], '/investments', [Pagecontroller::class, 'investments'])->name('investments.admin');
    //
    Route::match(['get', 'post'], '/homeadd', [Pagecontroller::class, 'homeadd'])->name('homeadd');

    //aboutus
    Route::match(['get', 'post'], '/about-us', [Pagecontroller::class, 'aboutus'])->name('aboutus');
    Route::match(['get', 'post'], '/stores', [Pagecontroller::class, 'stores'])->name('stores');
    Route::match(['get', 'post'], '/eligibility-banner', [Pagecontroller::class, 'eligibilitybanner'])->name('eligibility-banner');
    Route::match(['get', 'post'], '/entrepreneurship', [Pagecontroller::class, 'entrepreneurship'])->name('entrepreneurship');
    Route::match(['get', 'post'], '/quality-products', [Pagecontroller::class, 'qualityproducts'])->name('qualityproducts');
    Route::match(['get', 'post'], '/become-a-part', [Pagecontroller::class, 'becomeapart'])->name('becomeapart');
    Route::match(['get', 'post'], '/haicl-strengthening-partners', [Pagecontroller::class, 'haicl_strengthening_partners'])->name('haicl_strengthening_partners');
    Route::match(['get', 'post'], '/best-sectoion', [Pagecontroller::class, 'bestSectoion'])->name('bestSectoion');
    Route::match(['get', 'post'], '/infrastructure-thinking', [Pagecontroller::class, 'infrastructureThinking'])->name('infrastructure-thinking');
    Route::match(['get', 'post'], '/government-solutions', [Pagecontroller::class, 'governmentSolutions'])->name('government-solutions');
    Route::match(['get', 'post'], '/impact', [Pagecontroller::class, 'impact'])->name('impact');
    Route::match(['get', 'post'], '/event-highlight', [Pagecontroller::class, 'eventhighlight'])->name('eventhighlight');

    // bannners
    Route::get('/banners', [Pagecontroller::class, 'home_banners'])->name('home_banners');
    Route::match(['get', 'post'], '/create-banner', [Pagecontroller::class, 'createbanner'])->name('createbanner');
    Route::match(['get', 'post'], '/banners-edit/{id}', [Pagecontroller::class, 'bannersedit'])->name('bannersedit');
    // Route::match(['get', 'post'], '/highlight-content', [Pagecontroller::class, 'highlightcontent'])->name('highlightcontent');
    //team

    Route::get('highlight-content', [HighlightController::class, 'index'])->name('highlights.index');
    Route::post('highlights/store', [HighlightController::class, 'store'])->name('highlights.store');
    Route::post('highlights/{highlight}/update', [HighlightController::class, 'update'])->name('highlights.update');
    Route::delete('highlights/{highlight}', [HighlightController::class, 'destroy'])->name('highlights.destroy');


    Route::match(['get', 'post'], '/edit-team/{id}', [TeamsController::class, 'editteam'])->name('editteam');
    Route::match(['get', 'post'], '/delete-team/{id}', [TeamsController::class, 'deleteteam'])->name('deleteteam');
    Route::match(['get', 'post'], '/teams', [TeamsController::class, 'team'])->name('teams-list');
    Route::match(['get', 'post'], '/new-team', [TeamsController::class, 'create'])->name('createteam');
    Route::match(['get', 'post'], '/edit-page-team', [TeamsController::class, 'editpageteam'])->name('editpageteam');
    Route::match(['get', 'post'], '/edit-page-blog', [TeamsController::class, 'editpageblog'])->name('editpageblog');

    //works
    Route::match(['get', 'post'], '/edit-whychooseus/{id}', [WorkController::class, 'edit'])->name('editwork');
    Route::match(['get', 'post'], '/delete-work/{id}', [WorkController::class, 'delete'])->name('deletework');
    Route::match(['get', 'post'], '/whychooseus', [WorkController::class, 'work'])->name('whychooseus');
    Route::match(['get', 'post'], '/add-whychooseus', [WorkController::class, 'create'])->name('create-work');
    //contact

    Route::match(['get', 'post'], '/contact-enquires', [ContactController::class, 'contactenquires'])->name('contactenquires');
    Route::match(['get', 'post'], '/conversations', [ContactController::class, 'conversations'])->name('conversations');
    Route::get('/fetch-conversations', [ContactController::class, 'fetchConversations']);

    Route::match(['get', 'post'], '/subscription', [ContactController::class, 'subscription'])->name('subscription.admin');
    Route::match(['get', 'post'], '/contact-list', [ContactController::class, 'contactdata'])->name('contact-list');
    Route::match(['get', 'post'], '/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact-delete');

    //Faq

    Route::match(['get', 'post'], '/faq', [FaqController::class, 'faq'])->name('faq');
    Route::match(['get', 'post'], '/create-faq', [FaqController::class, 'createfaq'])->name('createfaq');
    Route::match(['get', 'post'], '/edit-faq/{id}', [FaqController::class, 'editfaq'])->name('editfaq');
    Route::match(['get', 'post'], '/faq-delete/{id}', [FaqController::class, 'delete'])->name('faq-delete');

    Route::match(['get', 'post'], '/genral-setting', [Pagecontroller::class, 'genralsetting'])->name('genralsetting');
    Route::match(['get', 'post'], '/terms-condition', [Pagecontroller::class, 'terms'])->name('terms');
    Route::match(['get', 'post'], '/privacy-policy', [Pagecontroller::class, 'privacypolicy'])->name('privacypolicy');

    Route::match(['get', 'post'], '/testimonials', [Pagecontroller::class, 'testimonials'])->name('testimonials');
    Route::match(['get', 'post'], '/create-testimonials', [Pagecontroller::class, 'createtestimonials'])->name('createtestimonials');
    // projects

    Route::match(['get', 'post'], '/seo-management', [Pagecontroller::class, 'seomanagement'])->name('seomanagement');
    Route::match(['get', 'post'], '/new-page', [Pagecontroller::class, 'newpage'])->name('newpage');
    Route::match(['get', 'post'], '/edit-page/{id}', [Pagecontroller::class, 'editpage'])->name('editpage');
    // Route::match(['get', 'post'], '/about', [Pagecontroller::class, 'about'])->name('about');
    Route::match(['get', 'post'], '/homeabout', [Pagecontroller::class, 'homeabout'])->name('homeabout');
    Route::match(['get', 'post'], '/who-we-are', [Pagecontroller::class, 'whoweare'])->name('whoweare');
    Route::post('/who-we-are-store', [Pagecontroller::class, 'whowearestore']);
    Route::match(['get','post'],'/who-we-are/update/{id}', [Pagecontroller::class, 'whoweareupdate']);
    Route::delete('/who-we-are/{id}', [Pagecontroller::class, 'whowearedestroy'])->name('admin.who-we-are.item.delete');
    
    Route::match(['get', 'post'], '/partners', [Pagecontroller::class, 'partners'])->name('partners');
    Route::match(['get', 'post'], '/new-partner', [Pagecontroller::class, 'new_partner'])->name('new_partner');
    Route::match(['get', 'post'], '/edit-partner/{id}', [Pagecontroller::class, 'editpartners'])->name('editpartners');

    Route::match(['get', 'post'], '/edit-testimonials/{id}', [Pagecontroller::class, 'edittestimonials'])->name('edittestimonials');
    Route::match(['get', 'post'], '/delete-testimonials/{id}', [Pagecontroller::class, 'deletetestimonials'])->name('deletetestimonials');

    Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
Route::post('/publications/store', [PublicationController::class, 'store'])->name('publications.store');
Route::delete('/publications/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');

Route::post('/publications/basic-info', [PublicationController::class, 'updateBasicInfo'])->name('publications.basic_info');

    Route::match(['get', 'post'], '/menu-categories', [Menucontroller::class, 'categories'])->name('menu.categories');
    Route::match(['get', 'post'], '/menu-new-category', [Menucontroller::class, 'newCategory'])->name('menu.new.category');
    Route::match(['get', 'post'], '/menu-edit-category/{id}', [Menucontroller::class, 'editCategory'])->name('menu-categories.edit');
    Route::match(['get', 'post'], '/menu-categories-delete/{id}', [Menucontroller::class, 'deletemainmenu'])->name('menu-categories.destroy');
    Route::match(['get', 'post'], '/menu-subcategories-delete/{id}', [Menucontroller::class, 'deletesubmenu'])->name('menu-subcategory.destroy');
    Route::match(['get', 'post'], '/menu-subcategories', [Menucontroller::class, 'menusubcategories'])->name('menusubcategories');
    Route::match(['get', 'post'], '/new-submenu', [Menucontroller::class, 'newsubmenu'])->name('newsubmenu');
    Route::match(['get', 'post'], '/edit-submenu/{id}', [Menucontroller::class, 'editsubmenu'])->name('menu-subcategory.edit');


    Route::match(['get', 'post'], '/menu-tools/{id}', [Menucontroller::class, 'menuTools'])->name('menu-tools');
    Route::match(['get', 'post'], '/page-builder/{id}', [Menucontroller::class, 'page_builder'])->name('page-builder');

    Route::match(['get', 'post'], '/insights', [Blogs::class, 'insights'])->name('insightsadmin');
    Route::match(['get', 'post'], '/new-insight', [Blogs::class, 'newinsight'])->name('newinsight');
    Route::match(['get', 'post'], '/insight-edit/{id}', [Blogs::class, 'editinsight'])->name('editinsight');
    
    Route::match(['get', 'post'], '/blogs', [Blogs::class, 'blogs'])->name('blogsAdmin');
    Route::match(['get', 'post'], '/create-blog', [Blogs::class, 'newblog'])->name('newblog');
    Route::match(['get', 'post'], '/blogs-edit/{id}', [Blogs::class, 'editblogs'])->name('editblogs');
    // Route::match(['get', 'post'], '/contact-enquires', [Blogs::class, 'contactenquires'])->name('contactenquires');
    Route::match(['get', 'post'], '/view-enquiry/{id}', [Blogs::class, 'viewenquiry'])->name('viewenquiry');
    Route::match(['get', 'post'], '/categories', [Coursecontroller::class, 'categories'])->name('categories');
    Route::match(['get', 'post'], '/new-categories', [Coursecontroller::class, 'newcategories'])->name('newcategories');
    Route::match(['get', 'post'], '/edit-category/{id}', [Coursecontroller::class, 'editategories'])->name('editategories');

    Route::match(['get', 'post'], '/delete/{table}/{id}/{image}', [Pagecontroller::class, 'deleterow'])->name('deleterownew');

    //Project
    Route::match(['get', 'post'], '/add-project', [ProjectController::class, 'addproject'])->name('add-project');
    Route::match(['get', 'post'], '/projects-list', [ProjectController::class, 'index'])->name('projects-list');
    Route::match(['get', 'post'], '/projects-update/{id}', [ProjectController::class, 'update'])->name('project-update');
    Route::match(['get', 'post'], '/projects-delete/{id}', [ProjectController::class, 'delete'])->name('projects-delete');

    //services
    Route::match(['get', 'post'], '/new-industry', [ServiceController::class, 'newindustry'])->name('newindustry');
    Route::match(['get', 'post'], '/industries', [ServiceController::class, 'industries'])->name('industries');
    Route::match(['get', 'post'], '/edit-industry/{id}', [ServiceController::class, 'editindustry'])->name('editindustry');
    Route::match(['get', 'post'], '/casestudios', [ServiceController::class, 'casestudios'])->name('casestudios');
    Route::match(['get', 'post'], '/add-casestudio', [ServiceController::class, 'addcasestudio'])->name('addcasestudio');
    Route::match(['get', 'post'], '/edit-casestudio/{id}', [ServiceController::class, 'edit_casestudio'])->name('edit_casestudio');
    Route::match(['get', 'post'], '/add-services', [ServiceController::class, 'create'])->name('add-services');
    Route::match(['get', 'post'], '/services-list', [ServiceController::class, 'index'])->name('services-list');
    Route::match(['get', 'post'], '/services-update/{id}', [ServiceController::class, 'update'])->name('services-update');
    Route::match(['get', 'post'], '/services-delete/{id}', [ServiceController::class, 'delete'])->name('services-delete');
    Route::match(['get', 'post'], '/apis-docs', [Pagecontroller::class, 'apisdocs'])->name('apisdocs');
    Route::match(['get', 'post'], '/gds-highlights', [Pagecontroller::class, 'gds_highlights'])->name('gds_highlights');
    Route::match(['get', 'post'], '/dpi-world', [Pagecontroller::class, 'dpi_world'])->name('dpi_world');
    Route::match(['get', 'post'], '/countries', [Pagecontroller::class, 'countries'])->name('admin.country.index');
    Route::match(['get', 'post'], '/country_store', [Pagecontroller::class, 'country_store'])->name('admin.country.store');
    Route::match(['get', 'post'], '/country_edit/{id}', [Pagecontroller::class, 'country_edit'])->name('admin.country.edit');
    Route::match(['get', 'post'], '/country_update/{id}', [Pagecontroller::class, 'country_update'])->name('admin.country.update');
    Route::match(['get', 'post','delete'], '/country_destroy/{id}', [Pagecontroller::class, 'country_destroy'])->name('admin.country.destroy');

    Route::match(['get', 'post'], '/country_cms/{id}', [Pagecontroller::class, 'country_cms'])->name('admin.country.cms');
  });

// AUTH---WORK----

Route::match(['get', 'post'], '/superadmin/login', [AuthController::class, 'login'])->name('adminlogin');
Route::match(['get', 'post'], '/forgot-password', [AuthController::class, 'fotgotpassword'])->name('fotgotpassword');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], 'reset-password/{token}', [AuthController::class, 'ResetPassword'])->name('reset-password');