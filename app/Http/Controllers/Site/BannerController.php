<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Fix banner url redirect
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function index(int $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->clicks += 1;
        $banner->save();
        return redirect()->route('site.catalog.index');
    }
}
