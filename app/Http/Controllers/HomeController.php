<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\CategoryModel;
use App\Models\ArticleModel;



class HomeController extends Controller
{
   private $pathViewController = 'Home.';
   private $controllerName = 'home';
   private $params = [];
  
   public function __construct()
   {
      
       view()->share('controllerName',$this->controllerName);

   }
    public function index(Request $request)
    {      
         $sliderModel  = new SliderModel();
         $items =  $sliderModel->listItems(null,['task' =>"list_news"]);
         $CategoryModel  = new CategoryModel();
         $itemsCategory =  $CategoryModel->listItems(null,['task' =>"list_news_is_home"]);
         $ArticleModel  = new ArticleModel();
         $itemsFeatured =  $ArticleModel->listItems(null,['task' =>"list_news_featured"]);
         return view($this->pathViewController.'Index',[
            'params' =>$this->params,
            'data' => $items,
            'itemsCategory' =>$itemsCategory,
            'itemsFeatured' =>$itemsFeatured,

        ]);
      
       
    }
    public function home(Request $request)
    { 
      
        return view($this->pathViewController.'Home');
    }
    public function test(Request $request)
    { 
      
        return view('News.index');
    }
    
}