<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing-page', function () {
    return view('landing_page.index');
}) ->name('landing_page.index');

Route::get('/faqs', function () {
    return view('faqs.index');
}) ->name('faqs.index');

Route::get('/our-product', function () {
    return view('our_product.index');
}) ->name('our_product.index');

Route::get('/feedback', function () {
    return view('feedback.index');
}) ->name('feedback.index');

Route::get('/news', function () {
    return view('news.index');
}) ->name('news.index');

Route::get('/company-licensing', function () {
    return view('company_licensing.index');
}) ->name('company_licensing.index');
