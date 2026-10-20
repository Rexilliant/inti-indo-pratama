<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\News;
use App\Models\CompanyLicense;
use App\Models\NewsCategory;
use App\Models\Faq;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function landingPage()
    {
        $products = Product::latest()->take(6)->get();
        $news = News::latest()->take(6)->get();
        return view('landing_page.index', compact('products', 'news'));
    }

    public function faqs()
    {
        return view('faqs.index');
    }

    public function news(Request $request)
    {
        $query = News::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%')
                    ->orWhere('hook', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category_id')) {
            $query->whereHas('news_categories', function ($q) use ($request) {
                $q->where('news_categories.id', $request->category_id);
            });
        }

        $newsList = $query->latest('published_at')->paginate(6)->appends($request->all());
        $categories = NewsCategory::all();

        return view('news.index', compact('newsList', 'categories'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('news.news-detail', compact('news'));
    }

    public function feedback()
    {
        return view('feedback.index');
    }

    public function aboutUs()
    {
        return view('about_us.index');
    }

    public function companyLicensing()
    {
        $licenses = CompanyLicense::all();
        return view('company_licensing.index', compact('licenses'));
    }

    public function adminTestimoni()
    {
        return view('admin.testimoni.index');
    }

    public function adminTestimoniCreate()
    {
        return view('admin.testimoni.create');
    }

    public function adminTestimoniEdit()
    {
        return view('admin.testimoni.edit');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
