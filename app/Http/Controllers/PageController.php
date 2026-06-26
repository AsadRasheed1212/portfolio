<?php
namespace App\Http\Controllers;
use App\Models\Work;
use App\Models\Service;
use App\Models\Credential;

class PageController extends Controller
{
    public function home()
    {
        $works = Work::latest()->take(4)->get();
        return view('pages.home', compact('works'));
    }
    public function about()
    {
        $skills = ['Data Entry','MS Excel','MS Word','WordPress','PHP / Laravel','MySQL','Video Editing','HTML / CSS','E-Commerce Operations'];
        return view('pages.about', compact('skills'));
    }
    public function service()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('pages.service', compact('services'));
    }
    public function works()
    {
        $works = Work::latest()->get();
        $categories = Work::distinct()->pluck('category');
        return view('pages.works', compact('works','categories'));
    }
    public function workDetail($id)
    {
        $work = Work::findOrFail($id);
        $related = Work::where('category',$work->category)->where('id','!=',$id)->take(3)->get();
        return view('pages.work-detail', compact('work','related'));
    }
    public function credentials()
    {
        $credentials = Credential::orderByDesc('year')->get();
        return view('pages.credentials', compact('credentials'));
    }
    public function contact()
    {
        return view('pages.contact');
    }
}