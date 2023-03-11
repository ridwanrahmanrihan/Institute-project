<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\Department;
use App\Models\Job;
use App\Models\Library;
use App\Models\Notice;
use App\Models\Office;
use App\Models\Person;
use App\Models\PhotoGallery;
use App\Models\Principal;
use App\Models\Registrar;
use App\Models\Routine;
use App\Models\Security;
use App\Models\Store;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home',[
            "persons" => Person::all(),
            "notices" => Notice::paginate(1),
            "latest_notice" => Notice::all(),
        ]);
    }
    public function teacher( Request $request)
    {  
        $teachers = Teacher::paginate(8);
        return view('frontend.teacher', compact('teachers'));
    }
    public function about(Request $request)
     {
        return view('frontend.about');
     }
    public function gallery( Request $request)
    {  
        $galleries=  PhotoGallery::paginate(6);
        return view('frontend.gallery', compact('galleries'));
    }
    public function message( Request $request)
    {  
        $message=  Principal::all();
        return view('frontend.message', compact('message'));
    }
    public function student( Request $request)
    {  
        $students=  Student::paginate(10);
        return view('frontend.student', compact('students'));
    }
    public function office( Request $request)
    {  
        $offices=  Office::paginate(10);
        return view('frontend.office', compact('offices'));
    }
    public function registar( Request $request)
    {  
        $registars=  Registrar::paginate(10);
        return view('frontend.registrar', compact('registars'));
    }
    public function library( Request $request)
    {  
        $librarians=  Library::paginate(10);
        return view('frontend.librarian', compact('librarians'));
    }
    public function store( Request $request)
    {  
        $stores=  Store::paginate(10);
        return view('frontend.store', compact('stores'));
    }
    public function account( Request $request)
    {
        $accounts=  account::paginate(10);
        return view('frontend.account', compact('accounts'));
    }
    public function security( Request $request)
    {  
        $securitys=  Security::paginate(10);
        return view('frontend.security', compact('securitys'));
    }
    public function notice( Request $request)
    { 
        $notices = Notice::paginate(1);
        return view('frontend.notice', compact('notices'));
    }
    public function job( Request $request)
    { 
        $jobs = Job::paginate(10);
        return view('frontend.job', compact('jobs'));
    }
    public function contact( Request $request)
    { 
        return view('frontend.contact');
    }
    public function department( Request $request)
    { 
        $departments = Department::paginate(4);
        return view('frontend.department', compact('departments'));
    }
    public function routine( Request $request)
    { 
        $routines = Routine::paginate(2);
        return view('frontend.routine', compact('routines'));
    }
}