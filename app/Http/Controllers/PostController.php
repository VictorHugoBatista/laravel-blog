<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\User;
use App\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except([
            'index',
            'show',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tags')->orderBy('created_at');

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        return view('posts.index', [
            'posts' => $posts->get(),
        ]);
    }

    public function myPosts()
    {
        return view('posts.my-posts', [
            'posts' => auth()->user()->posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->publish(new Post(request(['title', 'content'])));
        
        session()->flash('flash-type', 'success');
        session()->flash('flash-message', 'O post <strong>' . request('title') . '</strong> foi salvo com sucesso!');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::with(['comments', 'tags'])->find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postToEdit = Post::find($id);

        if (! $this->verifyPolicy($postToEdit, 'posts.update',
            'Você apenas pode alterar ou excluir seus próprios posts!')) {
            return back();
        }

        return view('posts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postToExclude = Post::find($id);

        if (! $this->verifyPolicy($postToExclude, 'posts.delete',
            'Você apenas pode alterar ou excluir seus próprios posts!')) {
            return back();
        }

        $postTitle = $postToExclude->title;
        $postToExclude->delete();

        session()->flash('flash-type', 'success');
        session()->flash('flash-message', 'O post <strong>' . request('title') . '</strong> foi excluído com sucesso!');

        return back();
    }

    private function verifyPolicy(Post $post, $policyName, $errorMessage)
    {
        if (Gate::denies($policyName, $post)) {
            session()->flash('flash-type', 'danger');
            session()->flash('flash-message', $errorMessage);
            return false;
        }
        return true;
    }
}
