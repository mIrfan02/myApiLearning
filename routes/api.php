<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Symfony\Component\HttpFoundation\Response;

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

Route::post('/loginuser', [AuthController::class, 'login']);
Route::post('/signupuser',[AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/profile',function (Request $request) {
        $users = User::all();
        return response()->json([
            'users' => $users,
            'authentic_user' => auth()->user()
        ], Response::HTTP_OK);
    });

    Route::post('/signupuser',[AuthController::class, 'signup']);
    Route::post('/courses', [CourseController::class, 'store']);
      // Fetch courses for authenticated user
      Route::get('/courses', [CourseController::class, 'index']);
});
