<?php

use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ClothingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\HouseapplianceController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\WaterfilterController;
use App\Http\Controllers\MachineryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UnverifiedProductController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AvailableProductController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\RedeemProductController;
use App\Http\Controllers\SellerProductController;
use App\Http\Livewire\ProductViewComponent;

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
Route::get('/', [IndexController::class,'index'])->name('index');

//seller register
Route::get('/seller-register', [SellerController::class,'view'])->name('user-register');
Route::get('/seller-register/ref={refer}', [SellerController::class,'inviteRegister'])->name('user-invite-register');
Route::post('/add-seller', [SellerController::class,'store'])->name('add-seller');
Route::get('/verify/email/{verification_code}',[SellerController::class,'verify_email'])->name('verify_email');
Route::get('/verify/{id}',[SellerController::class,'sendVerificationCode'])->name('verification-code');
Route::get('/verify-email/{id}',[SellerController::class,'verificationCode']);

//buyer
Route::get('/buyer-register', [BuyerController::class,'getRegister'])->name('buyer-register');
Route::post('/buyer-register', [BuyerController::class,'store'])->name('add-buyer');
Route::get('/buyer/email/verify/{verification_code}',[BuyerController::class,'verify_email'])->name('buyer_email_verify');
Route::get('/buyer/change-password/{id}', [BuyerController::class,'getChangePassword'])->name('buyer-changes-password');
Route::post('/buyer/change-password', [BuyerController::class,'postChangePassword'])->name('change-buyer-password');
Route::get('/buyer/profile', [BuyerController::class,'viewDetail'])->name('buyer-profile-detail');
Route::get('/buyer/profile-edit', [BuyerController::class,'edit'])->name('edit-buyer-profile');
Route::post('/buyer/profile-edit', [BuyerController::class,'update'])->name('update-buyer');
Route::post('/buyer/detail/delete', [BuyerController::class,'destroy'])->name('delete-buyer');
Route::get('/buyer-register/ref={refer}', [BuyerController::class,'buyerInviteRegister'])->name('buyer-invite-register');

//buyer login
Route::post('/buyer-login', [LoginController::class,'buyerLogin'])->name('buyer-login');
Route::get('/buyer/forget-password', [BuyerController::class,'forgetPassword'])->name('buyer-forget-password');
Route::post('/buyer/forget-password', [BuyerController::class,'resetPassword'])->name('get-buyer-reset-password-link');
Route::get('/buyer/reset/password/{token}',[BuyerController::class,'getResetPassword'])->name('get-reset-password');
Route::post('/buyer/change/password',[BuyerController::class,'changePassword'])->name('buyer-change-password');

//profile
Route::get('/profile-details', [SellerController::class,'viewProfile'])->name('profile-details');
Route::post('/profile-update', [SellerController::class,'update'])->name('update-profile');

//invite
Route::get('/invite', [InviteController::class,'index'])->name('invite');
Route::get('/buyer/invite', [InviteController::class,'buyerInvite'])->name('buyer-invite');

//change password
Route::get('/user/change-password/{id}', [SellerController::class,'getChangePassword'])->name('get-change-password');
Route::post('/user/change-password', [SellerController::class,'postChangePassword'])->name('post-change-password');

//login
Route::get('/seller-dashboard-login', [LoginController::class,'userLogin'])->name('user-login');
Route::post('/seller/login', [LoginController::class,'sellerLogin'])->name('seller-login');

//recharge
Route::get('/recharge-points', [EsewaController::class,'index'])->name('recharge-points');
Route::get('/payment-verify', [EsewaController::class,'verifyPayment'])->name('verify-payment');

//order
Route::get('/place-order', [UnverifiedProductController::class,'view'])->name('order-form');
Route::post('/user/order/step1', [UnverifiedProductController::class,'step1'])->name('step1');
Route::post('/user/order/add', [UnverifiedProductController::class,'store'])->name('add-order');
Route::get('/verify/buyer/email/{verification_code}',[UnverifiedProductController::class,'verify_buyer_email'])->name('verify_buyer_email');
Route::get('/my-orders', [BuyerController::class,'myOrder'])->name('my-order');

//product
Route::get('/products/{name}', [ProductController::class,'viewProduct'])->name('view-product');
// Route::get('/getPosts', [ProductController::class, 'getPosts'])->name('getPosts');
// Route::get('/products/{name}', ProductViewComponent::class)->name('view-product');


//enquiry
// Route::get('/{name}-{id}',[EnquiryController::class,'index'])->name('get-enquiry');
Route::post('/send-enquiry-now',[EnquiryController::class,'store'])->name('post-enquiry');

//buyer
Route::get('/buyer-form', [BuyerController::class,'view'])->name('buyer-form');

// leads
Route::get('/seller-dashboard', [LeadController::class,'index'])->name('buy-leads');
Route::post('/buy-lead', [LeadController::class,'store'])->name('add-leads');
Route::get('/free-leads', [LeadController::class,'viewFreeLead'])->name('view-free-lead');
Route::get('/premium-leads', [LeadController::class,'viewPremiumLead'])->name('view-premium-lead');
Route::get('/regular-leads', [LeadController::class,'viewRegularLead'])->name('view-regular-lead');
Route::get('/seller-lead-manager', [LeadController::class,'show'])->name('view-lead-manager');
Route::post('/lead/detail/update/{id}', [LeadController::class,'update'])->name('update-lead-detail');

//terms and condition
Route::get('/terms-and-condition', [ProductController::class,'viewTerms'])->name('terms-condition');
Route::get('/registeration/terms-and-condition', [ProductController::class,'viewRegisterTerms'])->name('register-terms-condition');

//products
Route::get('/user-product-details/{id}', [ProductController::class,'viewProductDetails'])->name('user-product-details');
Route::get('/seller/product/add', [SellerProductController::class,'index'])->name('seller-product');
Route::post('/seller/product/add', [SellerProductController::class,'store'])->name('seller-product-add');
Route::get('/seller/products/list', [SellerProductController::class,'show'])->name('product-list');
Route::get('/seller/products/{id}', [SellerProductController::class,'edit'])->name('seller-product-edit');
Route::post('/seller/products', [SellerProductController::class,'update'])->name('seller-product-update');

//balance
Route::get('/seller/wallet/my-balance', [WalletController::class,'viewBalance'])->name('view-balance');
Route::post('/user/payment/credit/detail', [WalletController::class,'showCreditDetails'])->name('credit-payment-detail');
Route::post('/user/payment/debit/detail', [WalletController::class,'showDebitDetails'])->name('debit-payment-detail');

// admin
Route::get('/9851240938/admin/add', [UserController::class,'getAddAdmin'])->name('admin');
Route::post('/admin/add', [UserController::class,'store'])->name('add-admin');
Route::get('/9851240938/admin', [UserController::class,'index'])->name('user');
Route::post('/user-status-change', [UserController::class, 'changeStatus'])->name('user-status-change');
Route::post('/admin/edit',[UserController::class,'edit'])->name('edit-admin');
Route::post('/admin/update',[UserController::class,'update'])->name('admin-update');
Route::post('/admin/delete',[UserController::class,'destroy'])->name('delete_admin');

//seller
Route::get('/9851240938/seller', [SellerController::class,'index'])->name('seller');
Route::post('/seller-status-change', [SellerController::class, 'changeStatus'])->name('seller-status-change');
Route::post('/seller/delete',[SellerController::class,'destroy'])->name('delete_seller');
Route::post('/seller/view/details',[SellerController::class,'show'])->name('show_seller-detail');
Route::get('/seller/edit/{id}',[SellerController::class,'edit'])->name('edit_seller');
Route::get('/profile/edit/{id}',[SellerController::class,'editProfile'])->name('edit_profile');
Route::get('/9851240938/seller/expired', [SellerController::class,'expired'])->name('seller-expire');

//buyer
Route::get('/9851240938/buyer', [BuyerController::class,'show'])->name('buyer-detail');

// login
Route::get('/9851240938/kanxiko-admin', [LoginController::class,'index'])->name('admin-login');
Route::post('/admin/login', [LoginController::class,'login']);

//change password
Route::get('/admin/change-password/{id}', [UserController::class,'getChangePassword'])->name('get-admin-change-password');
Route::post('/admin/change-password', [UserController::class,'postChangePassword'])->name('post-admin-change-password');

//facebook
Route::get('/9851240938/embed/facebook', [IndexController::class,'embedFacebook'])->name('embed-facebook');
Route::post('/embed/facebook/add', [IndexController::class,'store'])->name('add-facebook');
Route::post('/embed-facebook-link/delete', [IndexController::class,'destroy'])->name('delete-facebook');

// wallet
Route::get('/9851240938/wallet/credit-point',[WalletController::class,'index'])->name('wallet');
Route::get('/9851240938/wallet/details',[WalletController::class,'show'])->name('wallet_details');
Route::post('/waller/credit-point',[WalletController::class,'store'])->name('store_wallet');
Route::post('/wallet/details/delete',[WalletController::class,'destroy'])->name('delete_wallet');
Route::post('/wallet/details/edit',[WalletController::class,'edit'])->name('edit_wallet');
Route::post('/wallet/details/update',[WalletController::class,'update'])->name('update_wallet');

//eSewa
Route::get('/9851240938/eSewa-payment-details',[EsewaController::class,'show'])->name('esewa');

//banner
Route::get('/9851240938/banner/add-homepage-banner',[BannerController::class,'index'])->name('homepage_banner');
Route::post('/banner/add-banner',[BannerController::class,'store'])->name('store_banner');
Route::get('/9851240938/banner/add-user-dashboard-banner',[BannerController::class,'showUserDashboardBanner'])->name('user_dashboard_banner');
Route::post('/banner/delete',[BannerController::class,'destroy'])->name('delete-banner');

//products
Route::get('/9851240938/products',[ProductController::class,'index'])->name('product');
Route::post('/products/details',[ProductController::class,'show'])->name('product_details');
Route::post('/products/details/delete',[ProductController::class,'destroy'])->name('delete_product');
Route::post('/products/details/edit',[ProductController::class,'edit'])->name('edit_product');
Route::post('/products/details/update',[ProductController::class,'update'])->name('update_product');
Route::get('/9851240938/product/add',[ProductController::class,'view'])->name('add_product');
Route::post('/product/add',[ProductController::class,'store'])->name('store_product');

//available products
Route::get('/9851240938/availabe/product/add',[AvailableProductController::class,'index'])->name('available-product');
Route::post('/availabe/product/add',[AvailableProductController::class,'store'])->name('post-available-product');
Route::post('/available-products/delete',[AvailableProductController::class,'destroy'])->name('delete_available_product');
Route::post('/available-products/edit',[AvailableProductController::class,'edit'])->name('edit_available_product');
Route::post('/available-products/update',[AvailableProductController::class,'update'])->name('update-available-product');

// unverified
Route::get('/9851240938/unverified-products',[UnverifiedProductController::class,'index'])->name('unverified_product');
Route::get('/9851240938/unverified-product/detail/{id}',[UnverifiedProductController::class,'show'])->name('show_unverified_product');
Route::post('/unverified-product/verify/{id}',[UnverifiedProductController::class,'verify'])->name('verify_product');
Route::post('/unverified-product/delete',[UnverifiedProductController::class,'destroy'])->name('delete_unverified_product');

//enquiry
Route::get('/9851240938/enquiry/details',[EnquiryController::class,'show'])->name('enquiry-show');
Route::post('/enquiry/delete/{id}',[EnquiryController::class,'destroy'])->name('enquiry-delete');

// Redeem Product
Route::get('/9851240938/redeem-product/add',[RedeemProductController::class,'create'])->name('redeem.product.create');
Route::post('/9851240938/redeem-product/add',[RedeemProductController::class,'store'])->name('redeem.product.store');
Route::get('/9851240938/redeem-product',[RedeemProductController::class,'index'])->name('redeem.product.index');
Route::get('/9851240938/redeem-product/edit/{id}',[RedeemProductController::class,'edit'])->name('redeem.product.edit');
Route::post('/9851240938/redeem-product/update',[RedeemProductController::class,'update'])->name('redeem.product.update');
Route::post('/9851240938/redeem-product/delete',[RedeemProductController::class,'destroy'])->name('redeem.product.destroy');
Route::get('/9851240938/buyer/redeem/order',[RedeemProductController::class,'view'])->name('buyer.redeem.order');
Route::get('/9851240938/buyer/redeem/status/change/{id}',[RedeemProductController::class,'changeStatus'])->name('redeem.status.change');

// Ads
Route::get('/9851240938/ads/add',[AdvertisementController::class,'index'])->name('admin.ads');
Route::post('/9851240938/ads/add',[AdvertisementController::class,'store'])->name('ads.add');
Route::get('/9851240938/ads/list',[AdvertisementController::class,'show'])->name('ads.show');
Route::post('/9851240938/ads/edit',[AdvertisementController::class,'edit'])->name('ads.edit');
Route::post('/9851240938/ads/update',[AdvertisementController::class,'update'])->name('ads.update');
Route::post('/9851240938/ads/delete',[AdvertisementController::class,'destroy'])->name('ads.delete');


//orders
//buyer
Route::get('/9851240938/orders/buyer',[BuyerController::class,'index'])->name('buyer');

//seller
Route::get('/9851240938/seller/leads',[LeadController::class,'viewLeads'])->name('seller-leads');

//category
Route::get('/9851240938/category/details',[CategoryController::class,'index'])->name('category');
Route::post('/category/add',[CategoryController::class,'store'])->name('add_category');
Route::post('/category/edit',[CategoryController::class,'edit'])->name('edit_category');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('update_category');
Route::post('/category/delete',[CategoryController::class,'destroy'])->name('delete_category');

//subcategory
Route::get('/9851240938/{name}/subcategory/details',[SubcategoryController::class,'index'])->name('subcategory');
Route::post('/{name}/subcategory/add',[SubcategoryController::class,'store'])->name('add_subcategory');
Route::post('/subcategory/edit',[SubcategoryController::class,'edit'])->name('edit_subcategory');
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'update'])->name('update_subcategory');
Route::post('/subcategory/delete',[SubcategoryController::class,'destroy'])->name('delete_subcategory');

//forget password
Route::get('/forget-password',[ForgetPasswordController::class,'index'])->name('forget-password');
Route::post('/get-reset-password-link',[ForgetPasswordController::class,'store'])->name('get-reset-password-link');
Route::get('/reset/password/{token}',[ForgetPasswordController::class,'resetPassword'])->name('reset-password');
// Route::get('/change/password',[ForgetPasswordController::class,'viewChangePassword'])->name('view-change-password');
Route::post('/change/password',[ForgetPasswordController::class,'changePassword'])->name('change-password');

// logout
Route::get('/logout', function () {
    Session::forget('admin');
    Session::forget('buyer_department');
    Session::forget('seller_department');
    Session::put('success','Logout Successfull');
    return redirect()->route('admin-login');
});
//seller logout
Route::get('/seller/logout', function () {
    Session::forget('seller');
    Session::put('success','Logout Successfull');
    return redirect()->route('user-login');
})->name('seller-logout');
//buyer logout
Route::get('buyer/logout',function(){
    Session::forget('buyer');
    Session::put('success','Logout Successfull');
    return redirect()->route('index');
})->name('buyer_logout');