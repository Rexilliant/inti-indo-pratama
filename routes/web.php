<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LogActivityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Client Side (Front Office)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing-page', function () {
    return view('landing_page.index');
})->name('landing_page.index');

Route::get('/about-us', function () {
    return view('about_us.index');
})->name('about_us.index');

Route::get('/faqs', function () {
    return view('faqs.index');
})->name('faqs.index');

Route::get('/our-product', function () {
    return view('our_product.index');
})->name('our_product.index');

Route::get('/product-details', function () {
    return view('our_product.product-details');
})->name('our_product.product-details');

Route::get('/feedback', function () {
    return view('feedback.index');
})->name('feedback.index');

Route::get('/news', function () {
    return view('news.index');
})->name('news.index');

Route::get('/news-detail', function () {
    return view('news.news-detail');
})->name('news.news-detail');

Route::get('/company-licensing', function () {
    return view('company_licensing.index');
})->name('company_licensing.index');

// Admin (Back Office)

// Testimoni Back Office
Route::get('/admin-testimoni', function () {
    return view('admin.testimoni.index');
})->name('admin.testimoni.index');

Route::get('/admin-testimoni-create', function () {
    return view('admin.testimoni.create');
})->name('admin.testimoni.create');

Route::get('/admin-testimoni-edit', function () {
    return view('admin.testimoni.edit');
})->name('admin.testimoni.edit');

// Company Licensing
Route::get('/admin-licensing', function () {
    return view('admin.company_licensing.index');
})->name('admin.licensing.index');

Route::get('/admin-licensing-create', function () {
    return view('admin.company_licensing.create');
})->name('admin.licensing.create');

Route::get('/admin-licensing-edit', function () {
    return view('admin.company_licensing.edit');
})->name('admin.licensing.edit');

// Feedback
Route::get('/admin-feedback', function () {
    return view('admin.feedback.index');
})->name('admin.feedback.index');

// Our Product
Route::get('/admin-product', function () {
    return view('admin.our_product.index');
})->name('admin.product.index');

Route::get('/admin-product.create', function () {
    return view('admin.our_product.create');
})->name('admin.product.create');

Route::get('/admin-product.edit', function () {
    return view('admin.our_product.edit');
})->name('admin.product.edit');

// Our News
Route::get('/admin-news', function () {
    return view('admin.news.index');
})->name('admin.news.index');

Route::get('/admin-news.create', function () {
    return view('admin.news.create');
})->name('admin.news.create');

Route::get('/admin-news.edit', function () {
    return view('admin.news.edit');
})->name('admin.news.edit');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // FaQs
        Route::controller(FaqController::class)->prefix('faqs')->name('admin.faqs.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{faq}/edit', 'edit')->name('edit');
            Route::put('/{faq}', 'update')->name('update');
            Route::delete('/{faq}', 'destroy')->name('destroy');
        });
        // Log Activity
        Route::controller(LogActivityController::class)->prefix('log-activity')->name('admin.log-activity.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{activity}', 'show')->name('show');
        });
        
    });

require __DIR__ . '/auth.php';
