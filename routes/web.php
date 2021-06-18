<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
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

Route::get('message-notification', [App\Http\Controllers\NotificationController::class, 'sendmessageNotification']);

Route::get('/', function () {
    return view('hello');
});

Auth::routes(['verify' => true]);



//frontpages
Route::get('/updates', [App\Http\Controllers\PostController::class, 'AllPost']);
Route::get('/updates/{slug}', [App\Http\Controllers\PostController::class, 'ViewPost']);
Route::get('/terms-and-conditions', function () {
    return view('terms');
});
Route::get('/private-policy', function () {
    return view('policy');
});

Route::get('/brands', function () {
    return view('brands');
});
Route::get('/creators-influencers', function () {
    return view('creators');
});
Route::get('/creators/top', function () {
    return view('topcreators');
});



//inbox messages
Route::get('messages/inbox', [App\Http\Controllers\InboxController::class, 'show']);
//admin Blogpost section
Route::get('admin/blogs', [App\Http\Controllers\Admin\PostController::class, 'AllPost']);

Route::get('admin/blogs/addpost', [App\Http\Controllers\Admin\PostController::class, 'AddNew']);

Route::post('admin/blogs/addpost', [App\Http\Controllers\Admin\PostController::class, 'AddNewPost']);

//admin userlist
Route::get('admin/userlist', [App\Http\Controllers\Admin\UserlistController::class, 'AllUsers']);
Route::get('admin/userlist/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'edituser']);
Route::post('admin/userlist/{id}', [App\Http\Controllers\Admin\UserlistController::class, 'update']);

//adminplatforms
Route::get('admin/platform', [App\Http\Controllers\Admin\PlatformController::class, 'show']);
Route::get('admin/platform/{id}/edit', [App\Http\Controllers\Admin\PlatformController::class, 'edit']);
Route::post('admin/platform/{id}/edit', [App\Http\Controllers\Admin\PlatformController::class, 'post']);
//admincampaigns
Route::get('admin/campaign', [App\Http\Controllers\Admin\CampaignController::class, 'show']);
Route::get('admin/campaign/{id}/edit', [App\Http\Controllers\Admin\CampaignController::class, 'edit']);
Route::post('admin/campaign/{id}/edit', [App\Http\Controllers\Admin\CampaignController::class, 'postedit']);
Route::get('admin/campaign/{id}/view', [App\Http\Controllers\Admin\CampaignController::class, 'viewcampaign']);
//admin bank
Route::get('admin/bank/transactions', [App\Http\Controllers\Admin\BankController::class, 'transactions']);
//withdrawal request
Route::get('admin/bank/withdrawalrequest', [App\Http\Controllers\Admin\BankController::class, 'withdrawalrequest']);
Route::get('admin/bank/withdrawalrequest/{id}/edit', [App\Http\Controllers\Admin\BankController::class, 'withdrawaledit']);
Route::post('admin/bank/withdrawalrequest/{id}/edit', [App\Http\Controllers\Admin\BankController::class, 'withdrawaleditpost']);
Route::get('admin/bank/taskcompletepay', [App\Http\Controllers\Admin\BankController::class, 'taskcompletepay']);

//profileview
Route::get('loft/{brandname}', [App\Http\Controllers\User\ProfileviewController::class, 'index'])->name('viewcreator');

//dashboards
Route::get('admin', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
Route::get('creator/campaigns', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user');
Route::get('brand/dashboard', [App\Http\Controllers\Brands\DashboardController::class, 'index']);

//profile
Route::get('admin-profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('Profile');
Route::get('creator/profile', [App\Http\Controllers\User\ProfileController::class, 'show']);
Route::post('creator/profile', [App\Http\Controllers\User\ProfileController::class, 'update']);
Route::get('brand/profile', [App\Http\Controllers\Brands\ProfileController::class, 'show']);
Route::post('brand/profile', [App\Http\Controllers\Brands\ProfileController::class, 'update']);
Route::get('brand/profile/plan', [App\Http\Controllers\Brands\ProfileController::class, 'account']);

//webhook for payment plan

Route::post('brand/profile/plan', [App\Http\Controllers\Brands\ProfileController::class, 'paysub'])->name('paysub');
Route::get('brand/webhook', [App\Http\Controllers\Brands\ProfileController::class, 'webhook'])->name('webhookplan');

//wallet
Route::get('admin-wallet', [App\Http\Controllers\Admin\WalletController::class, 'show']);
Route::get('creator/wallet', [App\Http\Controllers\User\WalletController::class, 'show']);
Route::post('creator/wallet', [App\Http\Controllers\User\WalletController::class, 'AddAmount']);
Route::get('brand/wallet', [App\Http\Controllers\Brands\WalletController::class, 'show']);
Route::post('brand/wallet', [App\Http\Controllers\Brands\WalletController::class, 'deposit']);

//ravepayment
Route::post('brand/wallet', [App\Http\Controllers\Brands\WalletController::class, 'deposit'])->name('pay');
Route::get('rave/callback', [App\Http\Controllers\Brands\WalletController::class, 'callback'])->name('callback');
//Route::post('pay', [App\Http\Controllers\RaveController::class, 'initialize'])->name('pay');
//Route::post('rave/callback', [App\Http\Controllers\RaveController::class, 'callback'])->name('callback');
//Route::post('pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
//Route::post('payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('handleGatewayCallback');

//platform
Route::get('admin-platform', [App\Http\Controllers\Admin\PlatformController::class, 'show']);
Route::get('user-platform', [App\Http\Controllers\User\PlatformController::class, 'show']);
Route::post('user-platform', [App\Http\Controllers\User\PlatformController::class, 'AddTwitterInsert']);

Route::get('brand-platform', [App\Http\Controllers\Brands\PlatformController::class, 'show']);



//update platform
Route::get('update/{id}/platform', [App\Http\Controllers\User\PlatformController::class, 'updateplatform']);

Route::post('update/{id}/platform', [App\Http\Controllers\User\PlatformController::class, 'updateplatformpost'])->name('updateplatformpost');
Route::delete('user-platform/delete/{id}', [App\Http\Controllers\User\PlatformController::class, 'destroy'])->name('deleteplatform');

//services
Route::get('add-services/{id}', [App\Http\Controllers\User\PlatformController::class, 'AddServices']);
Route::post('add-services/{id}', [App\Http\Controllers\User\ServiceController::class, 'AddServicesInsert']);
Route::delete('add-services/{id}/delete', [App\Http\Controllers\User\ServiceController::class, 'destroy'])->name('deleteservice');


//campaign
Route::get('brand/campaign', [App\Http\Controllers\Brands\CampaignController::class, 'show']);
Route::get('brand/campaign/create', [App\Http\Controllers\Brands\CampaignController::class, 'TwitterPost']);

Route::get('brand/campaign/{id}/update/{amount}', [App\Http\Controllers\Brands\CampaignController::class, 'updatecampaign']);
Route::post('brand/campaign/twitter/post', [App\Http\Controllers\Brands\CampaignController::class, 'TwitterPostInsert']);
Route::delete('brand/campaign/{id}/delete', [App\Http\Controllers\Brands\CampaignController::class, 'destroy']);

//view influencers
Route::get('brand/influencers/view', [App\Http\Controllers\Brands\InfluencersController::class, 'show'])->name('creatorview');
Route::get('brand/list/view', [App\Http\Controllers\Brands\InfluencersController::class, 'mylist'])->name('mylist');
Route::post('brand/list/view', [App\Http\Controllers\Brands\InfluencersController::class, 'mylistpost']);
Route::get('brand/list/{id}/myinfluencers', [App\Http\Controllers\Brands\InfluencersController::class, 'myinfluencers'])->name('myinfluencers');
Route::post('brand/list/myinfluencers', [App\Http\Controllers\Brands\InfluencersController::class, 'myinfluencerspost'])->name('myinfluencerspost');
//Route::post('brand/invite', [App\Http\Controllers\Brands\InfluencersController::class, 'invite']);


//view campaigns
Route::get('creator/campaign/{id}/view/{amount}', [App\Http\Controllers\User\DashboardController::class, 'show']);
Route::post('creator/campaign/{id}/view/{amount}', [App\Http\Controllers\User\DashboardController::class, 'sendProposal']);
Route::get('creator/proposal/view', [App\Http\Controllers\User\DashboardController::class, 'showProposal']);

//creator's dashboard
Route::get('creator/dashboard', [App\Http\Controllers\User\DashController::class, 'show']);

Route::get('creator/myproposal/{id}/view', [App\Http\Controllers\User\DashboardController::class, 'myProposal'])->name('myproposal');
Route::put('creator/myproposal/{id}/view', [App\Http\Controllers\User\DashboardController::class, 'myProposalMgs'])->name('myproposalmgs');

Route::get('notifications', [App\Http\Controllers\NotificationController::class, 'notify'])->name('notifications');

Route::delete('deletenotification/{id}', [App\Http\Controllers\NotificationController::class, 'destroy']);

//follow logic
//Route::post('follow', [App\Http\Controllers\Brands\influencersController::class, 'FollowRequest'])->name('follow');

//campaign for brands
Route::get('brand/campaign/{id}/view/{amount}', [App\Http\Controllers\Brands\CampaignController::class, 'viewCampaign']);
Route::get('brand/campaign/proposal/{id}/view', [App\Http\Controllers\Brands\CampaignController::class, 'viewActions'])->name('viewproposal');
Route::put('brand/campaign/proposal/{id}/view', [App\Http\Controllers\Brands\CampaignController::class, 'viewProposal'])->name('viewproposalpost');
Route::get('brand/campaign/{id}/proposal', [App\Http\Controllers\Brands\CampaignController::class, 'allProposal'])->name('allproposal');

Route::get('brand/campaign/stats/{id}/{amount}', [App\Http\Controllers\Brands\CampaignstatController::class, 'index'])->name('viewCampaignStats');

//tasks for creators
Route::get('creator/tasks/view', [App\Http\Controllers\User\TasksController::class, 'show']);
Route::get('creator/tasks/{id}/update', [App\Http\Controllers\User\TasksController::class, 'update']);
Route::post('creator/tasks/{id}/update', [App\Http\Controllers\User\TasksController::class, 'updateNow'])->name('taskupdate');

//inbox
Route::get('inbox', [App\Http\Controllers\InboxController::class, 'inbox'])->name('inbox');
Route::get('messages/create', [App\Http\Controllers\InboxController::class, 'create'])->name('createmessage');
Route::post('loft/{brandname}', [App\Http\Controllers\InboxController::class, 'store'])->name('messagestore');
Route::post('brand/influencers/view', [App\Http\Controllers\InboxController::class, 'storeit'])->name('messagestoreit');
Route::get('messages/{id}/view', [App\Http\Controllers\InboxController::class, 'show'])->name('messageview');
Route::put('messages/{id}/view', [App\Http\Controllers\InboxController::class, 'update'])->name('messageupdate');

//admin task
Route::get('admin/alltasks', [App\Http\Controllers\Admin\ProposalController::class, 'alltasks']);
Route::get('admin/allproposal', [App\Http\Controllers\Admin\ProposalController::class, 'allproposal']);
Route::get('admin/completedtasks', [App\Http\Controllers\Admin\ProposalController::class, 'completedtasks']);
//admin subscribers
Route::get('admin/allsubscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'index']);
Route::get('admin/createplan', [App\Http\Controllers\Admin\SubscriptionController::class, 'createplan']);
Route::post('admin/createplan', [App\Http\Controllers\Admin\SubscriptionController::class, 'createplanpost']);
Route::get('admin/editplan/{id}', [App\Http\Controllers\Admin\SubscriptionController::class, 'editplanview']);
Route::post('admin/editplan/{id}', [App\Http\Controllers\Admin\SubscriptionController::class, 'editplan']);


//Gmail route
Route::get('/oauth/gmail', function (){
    return LaravelGmail::redirect();
});

Route::get('/oauth/gmail/callback', function (){
    LaravelGmail::makeToken();
    return redirect()->to('/');
});

Route::get('/oauth/gmail/logout', function (){
    LaravelGmail::logout(); //It returns exception if fails
    return redirect()->to('/');
});











