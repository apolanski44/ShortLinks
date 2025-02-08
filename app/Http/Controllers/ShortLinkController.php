<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShortLink;
class ShortLinkController extends Controller
{
    public function createShortLink(Request $req) {
        $req->validate(['url'=>'required|url']);
        $shortCode = Str::random(4);
        $shortLink = ShortLink::create([
            'url'=> $req->input('url'),
            'short_url'=> $shortCode
        ]);
        return response()->json(['short_url'=>$shortCode]);
    }
    public function redirectToOriginal($shortCode){
        $link = ShortLink::where('short_url',$shortCode)->firstOrFail();
        return redirect($link->url);
    }
    public function showLinks(){
        $links = ShortLink::select('url', 'short_url')->get();
        return response()->json($links);
    }
}
