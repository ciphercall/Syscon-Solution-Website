<?php
use App\Http\Controllers\DmsubcategorieController;
use App\Http\Controllers\DmcategorieController;
use App\Http\Controllers\DmarketingController;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkedbrandController;
use App\Http\Controllers\SysnewController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProcategorieController;
use App\Http\Controllers\NewscategorieController;
use App\Http\Controllers\DevsubcategorieController;
use App\Http\Controllers\DevelopmentController;
use App\Http\Controllers\DevcategorieController;
use App\Http\Controllers\ContactsiteController;
use App\Http\Controllers\InquiryController;




use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;

// /////////////////////// site Controller /////////////////
// use App\Http\Controllers\Site\HomesiteController;


// Route::get('/',[HomesiteController::class,'index' ]);

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/', [App\Http\Controllers\Site\HomesiteController::class,'index'])->name('homesite');
// Route::get('change/lang',[App\Http\Controllers\Site\HomesiteController::class,'lang_change'])->name('LangChange');


// Route::get('LangChange',[App\Http\Controllers\Site\ContactController::class,'lang_change'])->name('LangChange');
Route::get('/contact', [App\Http\Controllers\Site\ContactController::class,'index'])->name('contact');
Route::post('/contactmsg', [App\Http\Controllers\Site\ContactController::class,'store'])->name('contactmsg.store');

// Route::resource("inquiry",[App\Http\Controllers\Site\InquiryController::class]);

Route::get('/inquiry', [App\Http\Controllers\Site\InquiryController::class,'index'])->name('inquiry');
Route::post('/inquirymsg', [App\Http\Controllers\Site\InquiryController::class,'store'])->name('inquirymsg.store');



Route::get('/about', [App\Http\Controllers\Site\AboutController::class,'index'])->name('about');

Route::get('/news', [App\Http\Controllers\Site\NewsController::class,'index'])->name('news');


Route::get('/project', [App\Http\Controllers\Site\ProjectController::class,'index'])->name('project');

Route::get('/mproject', [App\Http\Controllers\Site\ProjectController::class,'moreproject'])->name('mproject');

Route::get('/project-details/{id}', [App\Http\Controllers\Site\ProjectController::class,'show'])->name('project-details');
Route::resource('project-details', ProductController::class);
//  Route::get('/project-details/{id}',[App\Http\Controllers\Site\ProjectController::class,'show']);

Route::get('/service', [App\Http\Controllers\Site\ServiceController::class,'index'])->name('service');
Route::get('/contract-type', [App\Http\Controllers\Site\ServiceController::class,'contract_type'])->name('contract-type');



Route::get('/dmarketing', [App\Http\Controllers\Site\DigitalmarketingController::class,'index'])->name('dmarketing');

Route::get('/d-marketing/{url}', [App\Http\Controllers\Site\DigitalmarketingController::class,'d_web_page'])->name('s-marketing');

Route::get('/s-devolopment/{url}', [App\Http\Controllers\Site\DevolopmentController::class,'web_page'])->name('s-devolopment');

// Route::get('business_unit/{url}',[BusinessunitController::class,'business_unit' ]);




// Route::get('/', function () {
//     return view('layout.site.index');
// });



////////////////////////////////

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

Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();

////////////////////////////////////////////

Route::resource("employees",EmployeeController::class);

// Route::post('addemployee',[CustomerController::class,'addemployee' ])->name('addemployee');
///////////////////////////////////////
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


	Route::resource("customers",CustomerController::class);

    Route::post('add-customers',[CustomerController::class,'store' ])->name('add-customers');

// /////////////////////////////////////////////////////////////////////////////


	Route::resource("submenus",SubmenuController::class);
    Route::get('edit-submenus/{id}',[SubmenuController::class,'edit' ]);
    Route::put('submenus-update',[SubmenuController::class,'update' ]);
    Route::delete('delete-submenus',[SubmenuController::class,'destroy' ]);
    Route::get('show-submenus/{id}',[SubmenuController::class,'show' ]);
////////////////////////////


	Route::resource("menus",MenuController::class);
    Route::get('edit-menus/{id}',[MenuController::class,'edit' ]);
    Route::put('menus-update',[MenuController::class,'update' ]);
    Route::delete('delete-menus',[MenuController::class,'destroy' ]);
    Route::get('show-menus/{id}',[MenuController::class,'show' ]);
// /////////////////////////////////////////////////////////////////////////////

Route::resource("workedbrands",WorkedbrandController::class);
// /////////////////////////////////////////////////////////////////////////////

Route::resource("sysnews",SysnewController::class);

// /////////////////////////////////////////////////////////////////////////////
Route::resource("projects",ProjectController::class);

// /////////////////////////////////////////////////////////////////////////////

Route::resource("procategories",ProcategorieController::class);

// /////////////////////////////////////////////////////////////////////////////
Route::resource("newscategories",NewscategorieController::class);

// /////////////////////////////////////////////////////////////////////////////

Route::resource("devsubcategories",DevsubcategorieController::class);
Route::post('add-devsubcategories',[DevsubcategorieController::class,'store' ])->name('add-devsubcategories');
Route::delete('delete-devsubcategories',[DevsubcategorieController::class,'destroy' ])->name('delete-devsubcategories');
// /////////////////////////////////////////////////////////////////////////////

Route::resource("developments",DevelopmentController::class);

// /////////////////////////////////////////////////////////////////////////////

Route::resource("devcategories",DevcategorieController::class);
Route::post('add-devcategories',[DevcategorieController::class,'store' ])->name('add-devcategories');
// /////////////////////////////////////////////////////////////////////////////
Route::resource("contactsites",ContactsiteController::class);


// /////////////////////////////////////////////////////////////////////////////

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource("dmsubcategories",DmsubcategorieController::class);

Route::resource("dmsubcategories",DmsubcategorieController::class);
Route::get('edit-dmsubcategories/{id}',[DmsubcategorieController::class,'edit' ]);
Route::put('dmsubcategories-update',[DmsubcategorieController::class,'update' ]);
Route::delete('delete-dmsubcategories',[DmsubcategorieController::class,'destroy' ]);
Route::get('show-dmsubcategories/{id}',[DmsubcategorieController::class,'show' ]);


////////////////////////////


Route::resource("dmcategories",DmcategorieController::class);

Route::resource("dmcategories",DmcategorieController::class);
Route::get('edit-dmcategories/{id}',[DmcategorieController::class,'edit' ]);
Route::put('dmcategories-update',[DmcategorieController::class,'update' ]);
Route::delete('delete-dmcategories',[DmcategorieController::class,'destroy' ]);
Route::get('show-dmcategories/{id}',[DmcategorieController::class,'show' ]);


// ////////

Route::resource("dmarketings",DmarketingController::class);

Route::resource("dmarketings",DmarketingController::class);
Route::get('edit-dmarketings/{id}',[DmarketingController::class,'edit' ]);
Route::put('dmarketings-update',[DmarketingController::class,'update' ]);
Route::delete('delete-dmarketings',[DmarketingController::class,'destroy' ]);
Route::get('show-dmarketings/{id}',[DmarketingController::class,'show' ]);


////////////////////////////

Route::resource("dboxwithdrawals",DboxwithdrawalController::class);
Route::get('edit-dboxwithdrawal/{id}',[DboxwithdrawalController::class,'edit' ]);
Route::put('dboxwithdrawal-update',[DboxwithdrawalController::class,'update' ]);
Route::delete('delete-dboxwithdrawal',[DboxwithdrawalController::class,'destroy' ]);
Route::get('show-dboxwithdrawal/{id}',[DboxwithdrawalController::class,'show' ]);

///////////////////////////

Route::resource("invitations",InvitationController::class);
Route::get('edit-invitation/{id}',[InvitationController::class,'edit']);
Route::put('invitation-update',[InvitationController::class,'update']);
Route::delete('delete-invitation',[InvitationController::class,'destroy' ]);
Route::get('show-invitation/{id}',[InvitationController::class,'show' ]);


//////////////////////////////

Route::resource("fazleahmadis",FazleahmadiController::class);
Route::get('edit-fazleahmadi/{id}',[FazleahmadiController::class,'edit' ]);
Route::put('fazleahmadi-update',[FazleahmadiController::class,'update' ]);
Route::delete('delete-fazleahmadi',[FazleahmadiController::class,'destroy' ]);
Route::get('show-fazleahmadi/{id}',[FazleahmadiController::class,'show' ]);


////////////////////////////
Route::resource("expenseaccounts",ExpenseaccountController::class);
Route::get('edit-expenseaccount/{id}',[ExpenseaccountController::class,'edit' ]);
Route::put('expenseaccount-update',[ExpenseaccountController::class,'update' ]);
Route::delete('delete-expenseaccount',[ExpenseaccountController::class,'destroy' ]);
Route::get('show-expenseaccount/{id}',[ExpenseaccountController::class,'show' ]);



/////////////////////////

Route::resource("depositcenters",DepositcenterController::class);
Route::get('edit-depositcenter/{id}',[DepositcenterController::class,'edit' ]);
Route::put('depositcenter-update',[DepositcenterController::class,'update' ]);
Route::delete('delete-depositcenter',[DepositcenterController::class,'destroy' ]);
Route::get('show-depositcenter/{id}',[DepositcenterController::class,'show' ]);


///////////////////////////////
Route::resource("qurankhatams",QurankhatamController::class);
Route::get('edit-qurankhatam/{id}',[QurankhatamController::class,'edit' ]);
Route::put('qurankhatam-update',[QurankhatamController::class,'update' ]);
Route::delete('delete-qurankhatam',[QurankhatamController::class,'destroy' ]);
Route::get('show-qurankhatam/{id}',[QurankhatamController::class,'show' ]);



/////////////////////////////
Route::resource("complexes",ComplexeController::class);
Route::get('edit-complexe/{id}',[ComplexeController::class,'edit' ]);
Route::put('complexe-update',[ComplexeController::class,'update' ]);
Route::delete('delete-complexe',[ComplexeController::class,'destroy' ]);
Route::get('show-complexe/{id}',[ComplexeController::class,'show' ]);


///////////////////
Route::resource("donationboxes",DonationboxeController::class);
Route::get('edit-donationboxe/{id}',[DonationboxeController::class,'edit' ]);
Route::put('donationboxe-update',[DonationboxeController::class,'update' ]);
Route::delete('delete-donationboxe',[DonationboxeController::class,'destroy' ]);
Route::get('show-donationboxe/{id}',[DonationboxeController::class,'show' ]);

////////////////////////////////////

Route::resource("volunteers",VolunteerController::class);
Route::get('edit-volunteer/{id}',[VolunteerController::class,'edit' ]);
Route::get('show-volunteer/{id}',[VolunteerController::class,'show' ]);
Route::put('volunteer-update',[VolunteerController::class,'update' ]);
Route::delete('delete-volunteer',[VolunteerController::class,'destroy' ]);

// Route::get("getmembers",[CentralmemberController::class,'get_member_json']);

Route::get("getvolunteers",[VolunteerController::class,'get_volunteer_json']);
// Route::post("getvduties",[VolunteerController::class,'get_vduty_json']);


Route::get('api/fetch-vduties', [VolunteerController::class, 'fetchVduty']);
///////////////////////////////////


/////////////////////////////
Route::resource("mahfils",MahfilController::class);
Route::get('edit-mahfil/{id}',[MahfilController::class,'edit' ]);
Route::get('show-mahfil/{id}',[MahfilController::class,'show' ]);

Route::put('mahfil-update',[MahfilController::class,'update' ]);
Route::delete('delete-mahfil',[MahfilController::class,'destroy' ]);

Route::get("getbrunchs",[MahfilController::class,'get_brunch_json']);





Route::resource('guestmembers', GuestmemberController::class);
Route::get('edit-guestmember/{id}',[GuestmemberController::class,'edit' ]);
Route::put('guestmember-update',[GuestmemberController::class,'update' ]);
Route::delete('delete-guestmember',[GuestmemberController::class,'destroy' ]);
Route::get('all/gmember', [App\Http\Controllers\GuestmemberController::class, 'gmember_list'])->name('all/gmember');




///////////////////////////

Route::resource('centralmembers', CentralmemberController::class);
Route::get('edit-centralmember/{id}',[CentralmemberController::class,'edit' ]);
Route::put('centralmember-update',[CentralmemberController::class,'update' ]);
Route::delete('delete-centralmember',[CentralmemberController::class,'destroy' ]);

Route::get("getmembers",[CentralmemberController::class,'get_member_json']);

Route::get("getdutys",[VolunteerController::class,'get_vduty_json']);

Route::post('api/fetch-cmember', [CentralmemberController::class, 'fetchCmember']);

Route::get('all/cmember', [App\Http\Controllers\CentralmemberController::class, 'cmember_list'])->name('all/cmember');





Route::get('all/employee/card', [App\Http\Controllers\MemberController::class, 'member_list'])->name('all/employee/card');



// Route::get("member",[MemberController::class,'member_list']);

// Route::post('getStates',[StateController::class,'getStates'])->name('getStates');




// Route::post('get-work-by-country', [CountriesController::class, 'getCountry']);
// Route::post('get-country-by-state', [CountriesController::class, 'getState']);

// Route::get('dependent-dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-country', [DropdownController::class, 'fetchCountry']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
Route::post('api/fetch-district', [DropdownController::class, 'fetchDistrict']);
Route::post('api/fetch-upazilas', [DropdownController::class, 'fetchUpazila']);
Route::post('api/fetch-unions', [DropdownController::class, 'fetchUnion']);

// Route::post('api/fetch-bruch', [DropdownController::class, 'fetchBrunch']);division

// Route::get('newuser',[BranchdutieController::class,'newuser' ]);


