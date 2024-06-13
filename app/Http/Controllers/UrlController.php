<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Url;
class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $urls = $user->urls;
        return view("url.list", ["urls" => $urls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('url.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
       
    //   $url=new Url();
    //   $url->user_id = Auth::id();
    //   $url->original_url=request("original_url");
    //   $url->short_url=request("short_url");
    //   $url->save();
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url=Url::find($id);
        return view("url.edit",["url"=>$url]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'original_url' => 'required|url',
        // ]);
   
        $url=Url::find($id);
        $url->user_id=Auth::id();
        $url->original_url=request("original_url");
        $url->save();
        return redirect("/list");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $url=Url::find($id);
        $url->user_id = Auth::id();
        $url->delete();
        return redirect("/list");
    }

public function shortend(Request $request)
{
    $request->validate([
        'original_url' => 'required|url',
    ]);

    $short_url = $this->generateShortenedUrl();
    $url = Url::create([
        'user_id' => Auth::id(),
        'original_url' => $request->input("original_url"),
        'short_url' => $short_url,
    ]);

    return view('url.show', ["url" => $url]);
}
private function generateShortenedUrl()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    do {
        $short_url = substr(str_shuffle($characters), 0, 10);
        $full_url = "http://localhost:8000/" . $short_url;
    } while (Url::where('short_url', $full_url)->exists());

    return $full_url;
}

}