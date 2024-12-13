<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeptController;
// use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\MailController;
// use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;
use App\Livewire\About;
use App\Livewire\Admin\Department;
use App\Livewire\ContactCreate;
// use Illuminate\Support\Facades\Auth;
use App\Livewire\ContactIndex;
use App\Livewire\Employee;
use App\Livewire\Goodsreq\AllocateReq;
use App\Livewire\Goodsreq\EditGoodsRequest;
use App\Livewire\goodsreq\FormGoodsReq;
use App\Livewire\goodsreq\GoodsRequest;
use App\Livewire\goodsreq\RequestStatus;
use App\Livewire\goodsreq\StatusGoodsRequest;
use App\Livewire\Purchase\EditPurchaseRequest;
use App\Livewire\Purchase\FormPurchaseRequest;
use App\Livewire\Purchase\PurchaseRequest;
use App\Livewire\Purchase\PurchaseStatus;
use App\Livewire\Rumah;
use App\Livewire\UserTest;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::get('/lte',function(){
    return view('layouts.backend.master');
});

Route::view('/blankpage','layouts.backend.blankpage');

Route::view('/home','home');
Route::view('/rumah','rumah');
// Route::get('/rumah',\App\Livewire\Rumah::class)->name('rumah');
Route::get('/about',\App\Livewire\About::class)->name('about');
// Route::get('/blankpage',function(){
//     return view('layouts.backend.blankpage');
// });

Route::get('admin/dept/list',[DeptController::class, 'list']);

Route::get('admin/dept',[DeptController::class, 'list'])->middleware(['auth'])->name('deptlist');
Route::get('admin/employee',[UserController::class, 'list'])->middleware(['auth'])->name('employeelist');
Route::get('admin/goods',[GoodsController::class, 'list'])->middleware(['auth'])->name('goodslist');

 Route::get('/goodsrequest',GoodsRequest::class)->middleware(['auth','verified'])->name('goodsrequest');
 Route::get('/formgoodsrequest',FormGoodsReq::class)->middleware(['auth','verified'])->name('formgoodsrequest');
 Route::get('/list_req_status',StatusGoodsRequest::class)->middleware(['auth','verified'])->name('list_req_status');
 Route::get('/request_status',\App\Livewire\GoodsReq\RequestStatus::class)->name('request_status');
 Route::get('/editgoodsrequest/{req_id}',EditGoodsRequest::class)->middleware('auth')->name('editgoodsrequest');
 
 Route::get('purchaserequest',PurchaseRequest::class)->middleware(['auth','verified'])->name('purchaserequest');
 Route::get('formpurchaserequest',FormPurchaseRequest::class)->middleware(['auth','verified'])->name('formpurchaserequest');
 Route::get('editpurchaserequest/{pr_id}',EditPurchaseRequest::class)->middleware(['auth','verified'])->name('editpurchaserequest');
 Route::get('/list_purchase_status',PurchaseStatus::class)->middleware(['auth','verified'])->name('list_purchase_status');

Route::get('/allocatereq',AllocateReq::class)->name('allocatereq');
Route::get('admin/department',Department::class)->name('admin.department');
Route::get('/contact',ContactIndex::class)->name('contact');
Route::get('/contactcreate',ContactCreate::class)->name('contactcreate');
Route::get('/employee',Employee::class)->name('employee');
Route::get('usertest',UserTest::class)->name('user.test');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/','layouts.backend.blank')->middleware(['auth','verified'])->name('utama');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('logout',[AuthController::class,'logout']);
// Route::get('login',[AuthController::class,'login']);

Route::get('send-email', function(){
    $email = new SendEmail();
    Mail::to('jekson@tiarakencana.com')->send($email);
    return 'success';
});

Route::get('/kirimemail','MalasngodingController@index');

// Route::get('/email',[SendEmailController::class, 'index'])->name('email');
// Route::get('/sending_email',[SendEmailController::class, 'send_email'])->name('send_email');

// Jalan bagus
Route::get('send-mail/{req_id}',[MailController::class,'sendEmail']);
Route::get('send-mail-purchase/{req_id}',[MailController::class,'sendEmailPurchase']);

Route::view('/mailform', 'mailform');
// Route::post('/email/send',[EmailController::class,'send'])->name('email.send');