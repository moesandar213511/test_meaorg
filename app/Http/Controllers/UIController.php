<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Blog;
use App\Event;
use App\Gallery;
use App\GalleryData;
use App\Contact;
use Session;
use App\CustomClass\EventData;
use App\CustomClass\BlogData;
use App\CustomClass\CompanyData;
use App\CustomClass\CategoryData;

class UIController extends Controller
{
    public function index()
    {
        $category = Category::paginate(8);
        $category_limit = CategoryData::getCustomLimitCompany($category);
        return view('user.index')->with([
            'page' => 'home',
            'category_limit' => $category_limit
        ]);
    }
    public function company_list()
    {
        $category = Category::all();
        $categories = CategoryData::allCategory($category);

        $companies = Company::all();
        $cat_company=CompanyData::getCompanyFormat($companies);
        // return $arr;
        return view('user.company_list')->with([
            'page' => 'company',
            'companies' => $cat_company,
            'categories' => $categories
        ]);
    }

    public function search_company($cat_id, $keyword)
    {
        $category = Category::all();
        $categories = CategoryData::allCategory($category);

        $search_companylist = Company::where('category_id',$cat_id)->where('name','LIKE',"%$keyword%")->get();
        $company = CompanyData::getCompanyFormat($search_companylist);
        return view('user.company_list')->with([
            'page' => 'company',
            'companies' => $company,
            'categories' => $categories
        ]);
    }

    public function category_company($id)
    {
        $companies=Company::where('category_id',$id)->paginate(10);
        $cat_company=CompanyData::getCompanyFormat($companies);
        return view('user.company_list')->with([
            'page' => 'company',
            'companies' => $cat_company
        ]);
    }
    public function company_profile($id)
    {
        $obj = new CompanyData($id);
        $company_profile = $obj->getCompanyData();
        return view('user.company_profile')->with([
            'page' => 'company',
            'company_profile' => $company_profile
        ]);
//        return $obj->getCompanyData()['company_photos'];

    }
    public function about()
    {
        return view('user.about')->with([
            'page' => 'about'
        ]);
    }
    public function category()
    {
        $categories = Category::all();
        $all_category = CategoryData::allCategory($categories);
        return view('user.category')->with([
            'page' => 'category',
            'all_category'=> $all_category
        ]);
    }
    public function gallery()
    {
        $galleries = Gallery::orderBy('id','desc')->get();
        $arr = [];
        foreach($galleries as $data){
            array_push($arr,$data);
        }
        // return $arr;
        return view('user.gallery')->with([
            'page' => 'gallery',
            'galleries' => $arr
        ]);
    }

    public function blog()
    {
        $all_blogs = Blog::orderBy('id','desc')->paginate(10);
        $allBlog = BlogData::getAllBlog($all_blogs);

        $latest_blogs = BlogData::getLatestBlog(6);
        return view('user.blog')->with([
            'page' => 'blog',
            'allBlog' => $allBlog,
            'paginate' => $all_blogs,
            'latest_blogs' => $latest_blogs
        ]);
    }

    public function blog_detail($id)
    {
        $latest_blogs = BlogData::getLatestBlog(6);

        $blog = Blog::findOrFail($id);
        $obj = new BlogData($blog->id);
        $blog_detail = $obj->getBlogData();
        return view('user.blog_detail')->with([
            'page' => 'blog',
            'blog_detail' => $blog_detail,
            'latest_blogs' => $latest_blogs
        ]);
    }
    public function contactus(Request $request)
    {
        return view('user.contactus')->with([
            'page' => 'contact'
        ]);
    }

    public function insert_contact(Request $request){
        Session::flash('success', 'Insert Form Successfully');
        Contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        return redirect('/contact');
    }

    public function event_single($id)
    {
        $event = Event::orderBy('id','desc')->take(3)->get();
        $recent_event = EventData::getAllEvent($event);

        $event = Event::findOrFail($id);
        $obj = new EventData($event->id);
        $event_single = $obj->getEventData();
        return view('user.event_single')->with([
            'page' => 'event',
            'event_single' => $event_single,
            'recent_event' => $recent_event
        ]);
    }
    public function search_event(Request $request)
    {
        $event = Event::orderBy('id','desc')->take(3)->get();
        $recent_event = EventData::getAllEvent($event);

        $search_event = $request->get('search_event');
        $s_event = Event::where('title','LIKE',"%$search_event%")->get();
        $event_data = EventData::getAllEvent($s_event);
        return view('user.event')->with([
            'page' => 'event',
            'all_event' => $event_data,
            'recent_event' => $recent_event
        ]);
    }


    public function event()
    {
        $event = Event::orderBy('id','desc')->take(3)->get();
        $recent_event = EventData::getAllEvent($event);

        $event = Event::all();
        $all_event = EventData::getAllEvent($event);
        return view('user.event')->with([
            'page' => 'event',
            'event' => $event,
            'all_event' => $all_event,
            'recent_event' => $recent_event
        ]);
    }


    public function search_blog(Request $request)
    {
        $latest_blogs = BlogData::getLatestBlog(6);
        // $search_blog = $request->get('search_blog');
        // $blogs = Blog::where('name','LIKE',"%$search_blog%")->paginate(10);
        // $blog_data = BlogData::getAllBlog($s_blogs);
        if ($request->has('search_blog')) {
            $blogs = Blog::search($request->input('search_blog'))->paginate(1);
            $blog_data = BlogData::getAllBlog($blogs);
        } 
        else {
            $blogs = Blog::paginate(1);
            $blog_data = BlogData::getAllBlog($blogs);
        }
        return view('user.blog')->with([
            'page' => 'blog',
            'paginate' => $blogs,
            'allBlog' => $blog_data,
            'latest_blogs' => $latest_blogs
        ]);
    }

}