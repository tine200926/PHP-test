<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function createCategory(Request $request) {
        $title = $request->input('title');
        $ranking = $request->input('ranking', 1);

        $category = NewsCategory::create([
            'title'   => $title,
            'ranking' => $ranking,
        ]);

        return [
            'success' => true,
            'data'    => $category,
        ];
    }

    public function updateCategory(Request $request) {
        $id = $request->route('id');
        $title = $request->input('title');
        $ranking = $request->input('ranking');

        $category=NewsCategory::where('id',$id)->first();

        $category->title = $title;
        $category->ranking = $ranking;
        $category->save();



        return [
            'success' => true,
            'data'    => $category,
        ];

    }

    public function deleteCategory(Request $request) {
        $id = $request->route('id');
        $res=NewsCategory::where('id',$id)->delete();

        if ($res){
            $data=[
                'success' => true,
                'msg'=>'success'
          ];
          }else{
            $data=[
                'success' => false,
                'msg'=>'failed'
          ];
        }

        return $data;

    }

    public function getCategory(Request $request) {
        $id = $request->route('id');

        $data=NewsCategory::where('id',$id)->get();

        return $data;
    }


    public function getAllCategories(Request $request) {

        $data = NewsCategory::limit(10)->get();
        return $data;

    }

}
