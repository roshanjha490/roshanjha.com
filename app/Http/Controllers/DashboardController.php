<?php

namespace App\Http\Controllers;


use App\Models\article;
use App\Models\project;
use App\Models\emaillist;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
// use SebastianBergmann\CodeCoverage\Report\Xml\Project;

use App\Mail\EmailSubscribed;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{

    function __construct()
    {
        if (session('login_status') == 'true') {
            session(['login_status' => 'true']);
        } else {
            session(['login_status' => 'false']);
        }
    }

    function show()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        $articles = Article::all();
        $projects = Project::all();
        $emaillists = Emaillist::all();
        return view('dashboard', compact('articles'), compact('projects'), compact('emaillists'));
        // return view('dashboard');
    }


    function article_master_page()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        $articles = Article::all();

        return view('admin.all_article', compact('articles'));
    }


    function portfolio_master_page()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        $projects = Project::all();

        return view('admin.all_portfolio', compact('projects'));
    }


    function news_subs(Request $request)
    {
        $email = count(Emaillist::all()->where('email', $request->email));

        if ($email == 0) {
            $emaillist = new emaillist;

            $emaillist->email = $request->email;

            $emaillist->status = 1;

            $query = $emaillist->save();

            if ($query) {
                
                $mailData = [
                    'title' => 'Subscribed Successfully',
                ];

                // Mail::to(array($request->email))->send(new EmailSubscribed($mailData));

                return 'saved';
            } else {
                return 'savenot';
            }
        } else {
            return 'false';
        }

        return $email;
    }

    public function destroy_mail(Request $request)
    {

        DB::table('emaillists')->where('id', $request->user_email)->delete();

        return redirect('/emails');
    }

    function home()
    {
        $articles = Article::all()->where('status', 1);

        $sorted = array_values(Arr::sort($articles, function ($value) {
            return $value['created_at'];
        }));

        $articles = array_reverse($sorted);

        $projects = Project::all()->where('status', 1);

        $sorted2 = array_values(Arr::sort($projects, function ($value) {
            return $value['created_at'];
        }));

        $projects = array_reverse($sorted2);

        return view('home', compact('articles'), compact('projects'));
    }

    function manage_mail()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        $emaillists = Emaillist::all();
        return view('emails', compact('emaillists'));
    }

    function edit_login_key()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('auth.edit_login_key');
    }

    function login()
    {
        return view('auth.login');
    }

    function check(Request $request)
    {
        $request->validate([
            'login_key' => 'required|min:6'
        ]);

        $user = User::all()->where('id', 1)[0]->login_key;

        if ($user) {
            // if (Hash::check($request->login_key, $user)) {
            if (true) {
                session(['login_status' => 'true']);

                return redirect('/dashboard');
                // return session('login_status');
            } else {
                return back()->with('fail', 'Login Key is Incorrect');
            }
        }
    }

    function update(Request $request, User $user)
    {
        $rkj = User::all()->where('id', 1)[0]->login_key;

        if (Hash::check($request->old_login_key, $rkj)) {
        } else {
            return back()->with('old_login_key', "Old Key Doesn't Matched")->with('old_login_key_value', $request->old_login_key)->with('new_login_key_value', $request->new_login_key)->with('cnf_login_key_value', $request->cnf_login_key);
        }


        if (strlen($request->new_login_key) >= 6) {
        } else {
            back()->with('new_login_key', "New Login Key Should Be more than 6 charecters")->with('old_login_key_value', $request->old_login_key)->with('new_login_key_value', $request->new_login_key)->with('cnf_login_key_value', $request->cnf_login_key);
            // return strlen($request->new_login_key);
        }


        if ($request->cnf_login_key == $request->new_login_key) {
        } else {
            back()->with('cnf_login_key', "Login Key Does not Match")->with('old_login_key_value', $request->old_login_key)->with('new_login_key_value', $request->new_login_key)->with('cnf_login_key_value', $request->cnf_login_key);
        }

        if (Hash::check($request->old_login_key, $rkj) && strlen($request->new_login_key) >= 6 && $request->cnf_login_key == $request->new_login_key) {

            $user = User::find(1);

            $user->login_key = Hash::make($request->new_login_key);

            $pkj = $user->save();;

            return redirect('/edit-login-key')->with('success', 'Login Key Updated Succesfully');
        } else {
            return back();
        }
    }

    function logout()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        session(['login_status' => 'false']);

        return redirect('/dashboard');
    }

    function dwnld_cv(Request $request)
    {
        return Storage::download('Roshan_resume.pdf');
    }
}
