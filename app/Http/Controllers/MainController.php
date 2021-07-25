<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class MainController extends Controller
{
    /**
     * [article 我的文章]
     * @return [type] [description]
     */
    public function article()
    {
    	if (session()->has('user_id')) {
    		$all = Articles::where('user_id', session()->get('user_id'))
    			->get();
    	} else {
    		$all = Articles::all();
    	}
    	return view('article.article_list', $all);
    }
    public function detail($id)
    {

    }
}
