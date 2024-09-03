<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\factsController;
use App\Http\Controllers\frontend\Home;
use App\Http\Controllers\heroContents;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin_dashboard', function () {
//     return view('auth.login');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

#home route
Route::get('/', [Home::class, 'index'])->name('home');

#Home Page

// Route::get('/', [adminController::class, 'mainHome'])->name('mainHome');
Route::middleware('auth')->group(function () {

    Route::get('/admin_dashboard', [adminController::class, 'admin_dashboard'])->name('admin_dashboard');

#Dashboard Pages

    Route::get('/add_heroContent', [heroContents::class, 'index'])->name('add_heroContent');
    Route::post('/saveHeroContent', [heroContents::class, 'create'])->name('saveHeroContent');
    Route::get('/heroContent_List', [heroContents::class, 'store'])->name('heroContent_List');
    Route::get('/editList/{id}', [heroContents::class, 'edit'])->name('editList');
    Route::post('/updateList/{id}', [heroContents::class, 'update'])->name('updateList');
    Route::get('/pendingStatus/{id}', [heroContents::class, 'pending'])->name('pendingStatus');
    Route::get('/activeStatus/{id}', [heroContents::class, 'active'])->name('activeStatus');
    Route::get('/deleteList/{id}', [heroContents::class, 'destroy'])->name('deleteList');

#about section

    Route::get('/add_aboutContent', [aboutController::class, 'create'])->name('add_aboutContent');
    Route::post('/saveAboutContent', [aboutController::class, 'store'])->name('saveAboutContent');
    Route::get('/aboutContent_list', [aboutController::class, 'index'])->name('aboutContent_list');
    Route::get('/deleteAboutList/{id}', [aboutController::class, 'destroy'])->name('deleteAboutList');
    Route::get('/editAboutList/{id}', [aboutController::class, 'edit'])->name('editAboutList');
    Route::post('/updateAboutData/{id}', [aboutController::class, 'update'])->name('updateAboutData');
    Route::get('/aboutPendingStatus/{id}', [aboutController::class, 'AboutPending'])->name('aboutPendingStatus');
    Route::get('/aboutActiveStatus/{id}', [aboutController::class, 'AboutActive'])->name('aboutActiveStatus');

#Facts Section

    Route::get('/add_factsContent', [factsController::class, 'create'])->name('add_factsContent');
    Route::post('/saveFactContent', [factsController::class, 'store'])->name('saveFactContent');
    Route::get('/factsContent_list', [factsController::class, 'index'])->name('factsContent_list');
    Route::get('/deleteFactList/{id}', [factsController::class, 'destroy'])->name('deleteFactList');
    Route::get('/factPendingStatus/{id}', [factsController::class, 'factPending'])->name('factPendingStatus');
    Route::get('/factActiveStatus/{id}', [factsController::class, 'factActive'])->name('factActiveStatus');
    Route::get('/editFactList/{id}', [factsController::class, 'edit'])->name('editFactList');
    Route::post('/updateFactsData/{id}', [factsController::class, 'update'])->name('updateFactsData');

#service Section

    Route::get('/add_serviceContent', [ServiceController::class, 'create'])->name('add_serviceContent');
    Route::post('/saveServiceContent', [ServiceController::class, 'store'])->name('saveServiceContent');
    Route::get('/serviceContent_list', [ServiceController::class, 'index'])->name('serviceContent_list');
    Route::get('/deleteServiceList/{id}', [ServiceController::class, 'destroy'])->name('deleteServiceList');
    Route::get('/ServicePendingStatus/{id}', [ServiceController::class, 'servicePending'])->name('ServicePendingStatus');
    Route::get('/serviceActiveStatus/{id}', [ServiceController::class, 'serviceActive'])->name('serviceActiveStatus');
    Route::get('/editServiceList/{id}', [ServiceController::class, 'edit'])->name('editServiceList');
    Route::post('/saveServiceData/{id}', [ServiceController::class, 'update'])->name('saveServiceData');

#Call to Action section

    Route::get('/add_callActionContent', [ActionController::class, 'create'])->name('add_callActionContent');
    Route::post('/saveActionContent', [ActionController::class, 'store'])->name('saveActionContent');
    Route::get('/callActionContent_list', [ActionController::class, 'index'])->name('callActionContent_list');
    Route::get('/deleteActionList/{id}', [ActionController::class, 'destroy'])->name('deleteActionList');
    Route::get('/actionPending/{id}', [ActionController::class, 'PendingAction'])->name('actionPending');
    Route::get('/actionActive/{id}', [ActionController::class, 'ActiveAction'])->name('actionActive');
    Route::get('/editActionList/{id}', [ActionController::class, 'edit'])->name('editActionList');
    Route::post('/updateActionContent/{id}', [ActionController::class, 'update'])->name('updateActionContent');

#portfolio Section

    Route::get('/add_categories', [PortfolioController::class, 'addCategory'])->name('add_categories');
    Route::post('/saveCategory', [PortfolioController::class, 'saveCategory'])->name('saveCategory');
    Route::get('/add_portfolioContent', [PortfolioController::class, 'create'])->name('add_portfolioContent');
    Route::post('/savePortfolioFeatures', [PortfolioController::class, 'store'])->name('savePortfolioFeatures');
    Route::get('/portfolioContent_list', [PortfolioController::class, 'index'])->name('portfolioContent_list');
    Route::get('/deletePortfolioList/{id}', [PortfolioController::class, 'destroy'])->name('deletePortfolioList');
    Route::get('/category_list', [PortfolioController::class, 'categoryList'])->name('category_list');
    Route::get('/editPortfolioList/{id}', [PortfolioController::class, 'edit'])->name('editPortfolioList');
    Route::post('/updatePortfolioFeatures/{id}', [PortfolioController::class, 'update'])->name('updatePortfolioFeatures');
    Route::get('/deleteCategory/{id}', [PortfolioController::class, 'destroyCategory'])->name('deleteCategory');
    Route::get('/editCategory/{id}', [PortfolioController::class, 'editCat'])->name('editCategory');
    Route::post('/updateCategory/{id}', [PortfolioController::class, 'updateCat'])->name('updateCategory');

#Team Section

    Route::get('/add_teamContent', [TeamController::class, 'create'])->name('add_teamContent');
    Route::post('/addTeamContent', [TeamController::class, 'store'])->name('addTeamContent');
    Route::get('/teamContent_list', [TeamController::class, 'index'])->name('teamContent_list');
    Route::get('/deleteTeamMember/{id}', [TeamController::class, 'destroy'])->name('deleteTeamMember');
    Route::get('/pendingMember/{id}', [TeamController::class, 'pendingMem'])->name('pendingMember');
    Route::get('/activeMember/{id}', [TeamController::class, 'activeMem'])->name('activeMember');
    Route::get('/editTeamList/{id}', [TeamController::class, 'edit'])->name('editTeamList');
    Route::post('/updateTeamContent/{id}', [TeamController::class, 'update'])->name('updateTeamContent');

#contact section

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/EmailInfo_list', [ContactController::class, 'index'])->name('EmailInfo_list');
    Route::get('/deleteMassageList/{id}', [ContactController::class, 'destroy'])->name('deleteMassageList');
    Route::get('/add_ContactContent', [ContactController::class, 'create'])->name('add_ContactContent');
    Route::post('/addContactContent', [ContactController::class, 'storeContent'])->name('addContactContent');
    Route::get('/ContactContent_list', [ContactController::class, 'indexContactList'])->name('ContactContent_list');
    Route::get('/pendinginfo/{id}', [ContactController::class, 'pendingCon'])->name('pendinginfo');
    Route::get('/activeinfo/{id}', [ContactController::class, 'activeCon'])->name('activeinfo');
    Route::get('/deleteContactInfo/{id}', [ContactController::class, 'destroyContactInfo'])->name('deleteContactInfo');
    Route::get('/editContactListinfo/{id}', [ContactController::class, 'edit'])->name('editContactListinfo');
    Route::post('/updateContactContent/{id}', [ContactController::class, 'update'])->name('updateContactContent');

#setting section

    Route::get('/add_SettingContent', [SettingController::class, 'create'])->name('add_SettingContent');
    Route::post('/storeSettingContent', [SettingController::class, 'update'])->name('storeSettingContent');
    Route::get('/Logo_Change', [SettingController::class, 'createLogo'])->name('Logo_Change');
    Route::post('/add_logo', [SettingController::class, 'logo_Add'])->name('add_logo');
    Route::get('/footer_Section', [SettingController::class, 'createFooter'])->name('footer_Section');
    Route::post('/addFooterContent', [SettingController::class, 'updateFooter'])->name('addFooterContent');

});
