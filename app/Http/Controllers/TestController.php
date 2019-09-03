<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\HandbookCategory;
use App\Models\CguCategory;
use App\Models\CguCatalog;
use Dropbox\Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function categoriesTable()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://publicservice.uz/api/categories');

        $arr = json_decode($res->getBody()->getContents());

        foreach ($arr as $item)
        {
            if($item->parent_id == 0){
                $category = \App\Models\HandbookCategory::create([
                    'ru_title' => $item->ru_title,
                    'en_title' => $item->en_title,
                    'uz_title' => $item->uz_title,
                    'image' => $item->image,
                    'position' => $item->position,
                    'color' => $item->color,
                    'parent_id' => $item->parent_id,
                ]);

                $category->image = $item->image;
                $category->position = $item->position;
                $category->color = $item->color;
                $category->save();
            }
        }

        foreach ($arr as $item)
        {
            if($item->parent_id != 0) {
                $category = \App\Models\HandbookCategory::create([
                    'ru_title' => $item->ru_title,
                    'en_title' => $item->en_title,
                    'uz_title' => $item->uz_title,
                    'image' => $item->image,
                    'position' => $item->position,
                    'color' => $item->color,
                ]);

                $category->image = $item->image;
                $category->position = $item->position;
                $category->color = $item->color;
                $category->save();

                foreach ($arr as $cat)
                {
                    if($item->parent_id == $cat->id)
                    {
                        $cate = HandbookCategory::where('ru_title', 'like', '%' . $cat->ru_title . '%')->first();
                        $category->appendToNode($cate)->save();
                    }
                }


            }
        }
    }


    public function companiesTable()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://publicservice.uz/api/companies');

        $arr = json_decode($res->getBody()->getContents());
        $companies = $arr[0];
        $categories = $arr[1];

        foreach ($companies as $company)
        {
            $comp = Company::create([
                'ru_title' => $company->ru_title,
                'en_title' => $company->en_title,
                'uz_title' => $company->uz_title,
                'ru_description' => $company->ru_description,
                'en_description' => $company->en_description,
                'uz_description' => $company->uz_description,
                'url' => $company->url,
                'user_id' => $company->user_id,
                'active' => $company->active,
                'phone_number' => $company->phone_number,
            ]);

            foreach ($categories as $category)
            {
                if($company->category_id == $category->id)
                {
                    $cat = HandbookCategory::where('ru_title', 'like', '%' . $category->ru_title . '%')->first();
                    $comp->category_id = $cat->id;
                }
            }

            $comp->image = $company->image;
            $comp->position = $company->position;
            $comp->save();
        }
    }

    public function cguCategoriesTable()
    {
        foreach (Company::all() as $category)
        {
            if($category->image != null)
            {
                try{
                File::copy(public_path() . '/uploads2/' . $category->image, public_path() . '/' . Company::UPLOAD_DIRECTORY . $category->image);
                }
                catch (\Exception $e) {

                }
            }
        }
    }

    public function cguCatalogsTable()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://publicservice.uz/api/cguCatalogs');

        $arr = json_decode($res->getBody()->getContents());
        $catalogs = $arr[0];
        $categories = $arr[1];

        foreach($catalogs as $catalog)
	 {
            $newCatalog = CguCatalog::create([
                'ru_title' => $catalog->ru_title,
                'en_title' => $catalog->en_title,
                'uz_title' => $catalog->uz_title,
                'ru_description' => $catalog->ru_description,
                'en_description' => $catalog->en_description,
                'uz_description' => $catalog->uz_description,
                'file' => $catalog->image,
                'video' => $catalog->video,
                'active' => $catalog->active,
            ]);
            foreach($categories as $category)
            {
                if ($catalog->category_id == $category->id)
                {
			$parentCategory = CguCategory::where('ru_title', 'like', '%' . $category->ru_title . '%')->first();
		    if (!$parentCategory)
	      	        continue;
                    $newCatalog->category_id = $parentCategory->id;
                    $newCatalog->save();
                }
            }
        }
    }
}
