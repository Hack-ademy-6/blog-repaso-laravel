<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->paginate(6);

        $articles->map(function($article, $key){
            $article->body = substr($article->body,0,200);
            return $article;
        });

        return view('home',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all();
        return view('storeArticle',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if(!$user = Auth::user()){
            return redirect()->route('articles.create')->withMessage('No estás autentificado');
        }

        $misdatos = $request->validate([
            'title'=>'required|min:3|max:255',
            'body'=>'required|min:10|max:1000',
            'tags'=>'required'
        ]);

        // Article::create($misdatos); 

        $article = $user->articles()->create($misdatos);

        $article->tags()->sync($misdatos['tags']);
        
        return redirect()->route('home')->withMessage('Articulo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('showArticle',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if(!$user = Auth::user()){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autentificado para editar');
        }

        if($user->id != $article->user_id){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autorizado a editar');
        }

        $tags = Tag::all();

        return view('editArticle',compact('article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if(!$user = Auth::user()){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autentificado para editar');
        }

        if($user->id != $article->user_id){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autorizado a editar');
        }

        $misdatos = $request->validate([
            'title'=>'required|min:3|max:255',
            'body'=>'required|min:10|max:1000',
            'tags'=>'required'
        ]);

        // $article->title = $misdatos['title'];
        // $article->body = $misdatos['body'];
        // $article->save();

        $article->update($misdatos);
        $article->tags()->sync($misdatos['tags']);
        
        return redirect()->route('articles.edit',$article->id)->withMessage('Articulo modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(!$user = Auth::user()){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autentificado para editar');
        }

        if($user->id != $article->user_id){
            return redirect()->route('articles.show',$article->id)->withMessage('No estás autorizado a editar');
        }

        $article->delete();

        return redirect()->route('home')->withMessage('Articulo eliminado con exito');

    }
}
