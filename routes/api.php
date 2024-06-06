<?php

use App\Http\Controllers\apiControllers\MailController;
use App\Jobs\CreateProductJob;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    CreateProductJob::dispatch(3);
})->name('test');

Route::get('/send-email', [MailController::class, 'sendEmail']);

require __DIR__ . '/api/AuthRoutes.php';

Route::middleware('auth:sanctum')->group(function () {

    require __DIR__ . '/api/TeamRoutes.php';
    require __DIR__ . '/api/UserRoutes.php';
    require __DIR__ . '/api/ProvinceRoutes.php';
    require __DIR__ . '/api/CityRoutes.php';
    require __DIR__ . '/api/BrandRoutes.php';
    require __DIR__ . '/api/CategoryRoutes.php';
    require __DIR__ . '/api/LabelRoutes.php';
    require __DIR__ . '/api/ProductRoutes.php';
    require __DIR__ . '/api/OrderRoutes.php';
    require __DIR__ . '/api/MessageRoutes.php';
    require __DIR__ . '/api/TaskRoutes.php';
    require __DIR__ . '/api/TicketRoutes.php';
    require __DIR__ . '/api/WarrantyRoutes.php';
    require __DIR__ . '/api/NoteRoutes.php';
    require __DIR__ . '/api/ProfileRoutes.php';
    require __DIR__ . '/api/FactorRoutes.php';
    require __DIR__ . '/api/MediaRoutes.php';
    require __DIR__ . '/api/FileRoutes.php';

});

// Route::resources([
//     'user' => UserController::class,
//     'product' => UserController::class,
//     'order' => UserController::class,
//     'task' => UserController::class,
//     'category' => UserController::class,
// ]);
