<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LogActivityController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LicensingController;
use App\Models\CompanyLicense;
use App\Http\Controllers\Admin\ProductController;



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

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/news', function () {
    return view('news.index');
})->name('news.index');

Route::get('/news-detail', function () {
    return view('news.news-detail');
})->name('news.news-detail');

// Fix Route Guest
Route::get('/company-licensing', function () {
    $licenses = CompanyLicense::all();
    return view('company_licensing.index', compact('licenses'));
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
        Route::controller(FaqController::class)
            ->prefix('faqs')
            ->name('admin.faqs.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{faq}/edit', 'edit')->name('edit');
                Route::put('/{faq}', 'update')->name('update');
                Route::delete('/{faq}', 'destroy')->name('destroy');
            });

            
        // Feedback
        Route::controller(FeedbackController::class)
            ->prefix('feedback')
            ->name('admin.feedback.')
            ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Company Licensing
        Route::controller(LicensingController::class)
            ->prefix('licensing')
            ->name('admin.company_licensing.')
            ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/download/{id}', 'download')->name('license.download');
        });

        // Product
        Route::controller(ProductController::class)
            ->prefix('product')
            ->name('admin.our_product.')
            ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{product}/edit', 'edit')->name('edit');
            Route::put('/{product}', 'update')->name('update');
            Route::delete('/{product}', 'destroy')->name('destroy');

            // Endpoint khusus buat upload gambar TinyMCE
            Route::post('/tinymce/upload', 'uploadTinyMce')->name('tinymce.upload');
        });

        Route::controller(LogActivityController::class)
            ->prefix('log-activity')
            ->name('admin.log-activity.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{activity}', 'show')->name('show');
            });
        // News
        Route::controller(NewsController::class)
            ->prefix('news')
            ->name('admin.news.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{news}/edit', 'edit')->name('edit');
                Route::put('/{news}', 'update')->name('update');
                Route::delete('/{news}', 'destroy')->name('destroy');
            });
        // News Category
        Route::controller(NewsCategoryController::class)
            ->prefix('news-category')
            ->name('admin.news-category.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{news_category}/edit', 'edit')->name('edit');
                Route::put('/{news_category}', 'update')->name('update');
                Route::delete('/{news_category}', 'destroy')->name('destroy');
            });
    });

require __DIR__ . '/auth.php';