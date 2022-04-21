<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {

        $searchDesktop = cache()->get('searchDesktop')->shuffle()->take(1);

        $searchMobile = cache()->get('searchMobile')->shuffle()->take(1);

        $name = $request->name;

        $designs = Design::with('subCategoryDesign')
                                ->where('name', 'LIKE', '%' . $name . '%')
                                ->orWhere(function($q) use($name){
                                    $q->whereHas('subCategoryDesign', function($q) use($name){
                                        $q->where('name', 'LIKE', '%' . $name . '%');
                                    });
                                })
                                ->orWhere(function($q) use($name){
                                    $q->whereHas('product', function($q) use($name){
                                        $q->where('name', 'LIKE', '%' . $name . '%');
                                    });
                                })
                                ->paginate(20);

        $designs->withPath('/search?name=' . $name);

        $latestDesigns = cache()->get('latestDesigns');

        $videos = cache()->get('videos')->shuffle()->take(9);

        return view('search', compact('designs', 'name', 'latestDesigns', 'videos', 'searchMobile', 'searchDesktop'));
    }
}
