<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest as MainRequest;
// use App\Models\CategoryModel as CategoryModel;
 use App\Models\CategoryModel as MainModel;


class CategoryController extends Controller
{
   private $pathViewController = 'Category.';
   private $controllerName = 'category';
   private $model ;
   private $params = [];
 

    public function __construct()
    {
        $this->model =new MainModel();
        $this->params["pagination"]["total"] = 8;
        view()->share('controllerName',$this->controllerName);

    }
   // Trang list 
    public function list(Request $request)
    {
        // echo '<h3 style="color:red">' . $request->input('filter_status','all').'</h3>';
        $this->params['filter']['status'] = $request->input('filter_status','all');
        $this->params['search']['field'] = $request->input('search_field','id');
        $this->params['search']['value'] = $request->input('search_value','');

        // echo '<pre style="color:red">';
        // print_r( $this->params);
        // echo '</pre>';

        // $items = CategoryModel::all();
        //  $mainModel = new MainModel();
        $items =  $this->model ->listItems($this->params,['task' =>"admin"]);
        $is_home =  $this->model ->IsHome($this->params,['task' =>"is_home"]);
        $countByStatus  = $this->model ->countItems($this->params,['task' =>"count_items"]);


        // echo '<pre style="color:red">';
        // print_r($countByStatus);
        // echo '</pre>';
    
        return view($this->pathViewController.'Category',[
            'params' => $this->params,
            'data'=>$items,
            'countByStatus'=>$countByStatus,
            ]);
    }

    public function status(Request $request)
    {
        $params['currentStatus'] = $request->status;
        $params['id'] = $request->id;
        $this->model->saveItem($params,['task'=>'change_status']);
        return redirect()->route($this->controllerName)->with('notify_list', '?????i status th??nh c??ng!');
       

    }
    public function is_home(Request $request)
    {
        $params['current_IsHome'] = $request->is_home;
        $params['id'] = $request->id;
        
        $this->model->saveItem($params,['task'=>'change_isHome']);
        return redirect()->route($this->controllerName)->with('notify_list', '?????i tr???ng th??i th??nh c??ng th??nh c??ng');
       
    }
    public function display(Request $request)
    {
        $params['current_display'] = $request->display;
        $params['id'] = $request->id;
        $this->model->saveItem($params,['task'=>'change_display']);
        return redirect()->route($this->controllerName)->with('notify_list', '?????i display thanh cong');
       

    }
    
    public function add()
    {
        
        return view($this->pathViewController.'form');
    }
    public function edit(Request $request)
    {
        $params['id'] = $request->id;
        $items = $this->model->getItem($params,['task'=>'get_Item']);

        // echo '<pre style="color:red">';
        // print_r($items);
        // echo '</pre>';
        return view($this->pathViewController.'edit',[
            'data'=>$items,
            ]);
        // return view('Layout.index');
    }
    public function save(MainRequest $request)
    {
      
      if ($request->method() == 'POST'){
          $params = $request->all();
          $task = 'add_item';
          $notify = 'Th??m ph???n t??? th??nh c??ng';
          if($params['id'] !== null){
              $task = 'edit_item';
              $notify = "S???a  th??nh c??ng ";

          }
          $this ->model->saveItem($params,['task'=>$task]);
          return redirect()->route($this->controllerName)->with('notify_list',$notify);
      }
    }
    public function delete(Request $request)
    {
        $params['id'] = $request->id;
        $this->model->deleteItem($params,['task'=>'delete_Item']);
        return redirect()->route($this->controllerName)->with('notify_list', 'X??a ph???n t??? th??nh c??ng');
    }
    
}