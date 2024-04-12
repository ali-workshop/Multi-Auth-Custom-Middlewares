# build mulit authentication using middlewares
## The main idea of Role-Based Access Control (RBAC) in the context of multi-authentication in Laravel is to manage access to resources and actions within an application based on the roles assigned to users.
## How to implement (RBAC)??????
### USING GUARDS
### GATES AND POLICIES
### USING ROLE-BASED ACCESS CONTROL (RBAC) BACKAGES
#### 1.	LARAVEL RBAC PACKAGE BY ITSTRUCTURE
#### 2.	BOUNCER
#### 3.	WNIKK LARAVEL ACCESS RULES
#### 4.	LARAVEL SPATIE BACKAGE ROLES AND PERMISSIONS
#### 5.	USING CUSTOM MIDDLEWARE
in this repo i will solve the mullti auth using 
USING CUSTOM MIDDLEWARE



## Appendix


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','role:User'])->group(function(){
  Route::get('/user/home/',[UserController::class,'userhome'])
  ->name('home.user');
///here is playground for any user routes/
});
#second way
// Route::get('/user/home/',[UserController::class,'userhome'])
// ->middleware(['auth','role:User'])
// ->name('home.user');


Route::middleware(['auth','role:Admin'])
->group(function(){
Route::get('/admin/home/',[UserController::class,'adminhome'])
->name('home.admin');
});

Route::middleware(['auth','role:Manager'])
->group(function(){
Route::get('/manager/home/',[UserController::class,'managerhome'])
->name('home.manager');
});![alt text](https://as1.ftcdn.net/v2/jpg/05/47/33/06/1000_F_547330682_ZIaIyw71gtdxlxZ9N2UyTAHHCrlEgj9c.jpg)
