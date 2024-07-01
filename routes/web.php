<?php

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserManagementController;
// use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::group(['middleware' => 'web'], function () {
// Route::resource('/students', StudentController::class);   // Default old line this //THIS IS USED FOR WITHOUT SLUG,,

// Route::get('/students/{slug}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Route::get('/students/{slug}/edit', [StudentController::class, 'edit']);
// Route::resource('/students/{slug}/edit', [StudentController::class, 'edit'])->name('edit_student');

// Route::resource('/students/{slug}/edit', StudentController::class);
// Route::get('/students/{slug}/edit', StudentController::class);

// Assuming you are using the ID as the first parameter and slug as the second
// Route::resource('/students/{id}/{slug}/edit', 'StudentController::class');   //this is used for both id fetch & slug
// Route::get('/students/{slug}/edit', 'StudentController@edit');  // this is only slug fetch

// Route::get('/students/{slug}/edit', [StudentController::class, 'edit']);

// Route::get('/students/{slug}/edit', [StudentController::class, 'edit'])->name('edit_student');  //Choose a unique name:

// Students  url used    ...
// Route::get('/students', [StudentController::class, 'index']);
// Route::get('/students/create', [StudentController::class, 'create']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('/students/{student}', [StudentController::class, 'show']);
// Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
// Route::put('/students/{student}', [StudentController::class, 'update']);
// Route::delete('/students/{student}', [StudentController::class, 'destroy']);



// Route::get('/', [HomeController::class, 'index'])->name('home');


// Students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::get('/students/{slug}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{slug}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

/////////////////////////////////
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
// Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
// Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
// // Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
// // Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
// Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

// // Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
// Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
// Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
// Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');


// Teachers
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

//////////////////////////////////
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

//////////////////////////////////////////
Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
Route::get('/batches/create', [BatchController::class, 'create'])->name('batches.create');
Route::post('/batches', [BatchController::class, 'store'])->name('batches.store');
Route::get('/batches/{id}', [BatchController::class, 'show'])->name('batches.show');
Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('batches.edit');
Route::put('/batches/{id}', [BatchController::class, 'update'])->name('batches.update');
Route::delete('/batches/{id}', [BatchController::class, 'destroy'])->name('batches.destroy');

////////////////////////////////

Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
Route::get('/enrollments/{id}', [EnrollmentController::class, 'show'])->name('enrollments.show');
Route::get('/enrollments/{id}/edit',[EnrollmentController::class, 'edit'])->name('enrollments.edit');
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');


// Route::resource('/teachers', TeacherController::class);
// Route::resource('/courses', CourseController::class);
// Route::resource('/batches', BatchController::class);
// Route::resource('/enrollments', EnrollmentController::class);

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');

// Show all payments
// Route::get('/payments', [PaymentController::class, 'index']);

// // Show the form to create a new payment
// Route::get('/payments/create', [PaymentController::class, 'create']);

// // Store a new payment
// Route::post('/payments', [PaymentController::class, 'store']);

// // Show a specific payment
// Route::get('/payments/{id}', [PaymentController::class, 'show']);

// Show the form to edit a payment
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');

// Update a specific payment
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');

// Delete a specific payment
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');



// Show all usermanagement
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Show the form to create a new usermanagement
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Store a new usermanagement
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Show a specific usermanagement
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Show the form to edit a usermanagement
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update a specific usermanagement
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Delete a specific usermanagement
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Show all roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// Show the form to create a new role
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');

// Store a new role
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// Show a specific role
Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
// Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show_unique');

// Show the form to edit a role
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');

// Update a specific role
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
// Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update_unique');

// Delete a specific role
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');



/////////////////////////////////////////////////////////
// Delete a multiple users at once
Route::delete('/students', [StudentController::class, 'deleteMultipleItems'])->name('deleteMultipleItems');

// Route::delete('/delete-multiple-items', 'StudentController')->name('deleteMultipleItems');


Route::get('/search_data', [StudentController::class, 'search_data'])->name('search_data');
// Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');

// Route::get('/batches/{id}/edit', [BatchController::class, edit');
// });




// Route::get('report/report1/{pid}', [ReportController::class, 'report'])->name('print');
Route::get('report/report1/{pid}', [ReportController::class, 'report1']);
// Route::get('payments/{id}/pdf', [ReportController::class, 'report1'])->name('payments.pdf');



// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\BatchController;
// use App\Http\Controllers\CourseController;
// use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\EnrollmentController;
// use App\Http\Controllers\UserManagementController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('layout');
// });

// Route::resource('/students', StudentController::class);
// Route::resource('/teachers', TeacherController::class);
// Route::resource('/courses', CourseController::class);
// Route::resource('/batches', BatchController::class);
// Route::resource('/enrollments', EnrollmentController::class);

// Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
// Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
// Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
// Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
// Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
// Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
// Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

// Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('usermanagement.index');
// Route::get('/usermanagement/create', [UserManagementController::class, 'create'])->name('usermanagement.create');
// Route::post('/usermanagement', [UserManagementController::class, 'store'])->name('usermanagement.store');
// Route::get('/usermanagement/{id}', [UserManagementController::class, 'show'])->name('usermanagement.show');
// Route::get('/usermanagement/{id}/edit', [UserManagementController::class, 'edit'])->name('usermanagement.edit');
// Route::put('/usermanagement/{id}', [UserManagementController::class, 'update'])->name('usermanagement.update');
// Route::delete('/usermanagement/{id}', [UserManagementController::class, 'destroy'])->name('usermanagement.destroy');

// Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
// Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
// Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
// Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
// Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
// Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
// Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Route::post('/students', [StudentController::class, 'deleteMultipleItems'])->name('deleteMultipleItems');
// Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');




// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// // Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::resources([
//     'roles' => RoleController::class,
//     'users' => UserController::class,
//     // 'products' => ProductController::class,
// ]);

// routes/web.php



// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::resource('roles', RoleController::class)->names([
//     'index' => 'roles.index',
//     'create' => 'roles.create',
//     'store' => 'roles.store',
//     'show' => 'roles.show', // Ensure this is unique
//     'edit' => 'roles.edit_unique', // Change 'roles.edit' to a unique name.
//     'update' => 'roles.update',
//     'destroy' => 'roles.destroy',
// ]);


// // Before
// Route::get('roles/{role}', 'RoleController@show')->name('roles.edit');

// // After
// Route::get('roles/{role}', 'RoleController@show')->name('roles.show');





// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
