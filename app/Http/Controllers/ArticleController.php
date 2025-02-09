<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Rules\UniqueSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->where('status', 1);

        $sorted = array_values(Arr::sort($articles, function ($value) {
            return $value['created_at'];
        }));

        $articles = array_reverse($sorted);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_slug' => 'unique:articles,slug',
            'meta_tags' => 'required',
            'blog_content' => 'required',
            'blog_author' => 'required',
            'blog_date' => 'required',
        ]);


        $article = new article;

        $article->title = $request->blog_title;
        $article->slug = strtolower(trim($request->blog_slug, ' '));
        $article->metatags = $request->meta_tags;
        $article->content = $request->blog_content;
        $article->author = $request->blog_author;
        $article->created_at = $request->blog_date;

        $query = $article->save();

        if ($query) {
            return redirect('manage-articles')->with('success', 'Article Added Successfully');
        } else {
            return redirect('manage-articles')->with('success', 'Article Not Added');
        }

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {

        if ($article->status == 0) {
            return view('errors.404');
        }

        return view('article.show', $article);
    }

    public function show_blog($slug)
    {
        $article = Article::all()->where('slug', $slug)->first();

        if (($article->status == 0) && (session('login_status') == 'false')) {
            return view('errors.404');
        }

        return view('article.show', $article);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */


    public function edit(article $article)
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {

        $request->validate([
            'blog_title' => 'required',
            'blog_slug' => new UniqueSlug,
            'meta_tags' => 'required',
            'blog_content' => 'required',
            'blog_author' => 'required',
            'blog_status' => 'required',
            'blog_date' => 'required'
        ]);

        $article->title = $request->blog_title;
        $article->slug = strtolower(trim($request->blog_slug, ' '));
        $article->metatags = $request->meta_tags;
        $article->content = $request->blog_content;
        $article->author = $request->blog_author;
        $article->status = $request->blog_status;
        $article->created_at = $request->blog_date;

        $query = $article->save();

        if ($query) {
            return redirect('manage-articles')->with('success', 'Article Edited Successfully');
        } else {
            return redirect('manage-articles')->with('success', 'Article Not Edited Succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        //
    }
}
