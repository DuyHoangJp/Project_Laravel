<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest as MainRequest;
use App\Models\UsersModel as MainModel;


class UsersController extends Controller
{
   private $pathViewController = 'User.';
   private $controllerName = 'users';
   private $model ;
   private $params = [];
 

    public function __construct()
    {
        $this->model =new MainModel();
        $this->params["pagination"]["total"] = 8;
        view()->share('controllerName',$this->controllerName);

    }
      public function list(Request $request)
    {
        
        $this->params['filter']['status'] = $request->input('filter_status','all');
        $this->params['search']['field'] = $request->input('search_field','id');
        $this->params['search']['value'] = $request->input('search_value','');
        $items =  $this->model ->listItems($this->params,['task' =>"admin"]);
        $is_home =  $this->model ->IsHome($this->params,['task' =>"is_home"]);
        $countByStatus  = $this->model ->countItems($this->params,['task' =>"count_items"]);
        
        return view($this->pathViewController.'User',[
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
        return redirect()->route($this->controllerName)->with('notify_list', 'Đổi status thành công!');
       

    }
    public function level(Request $request)
    {
        $params['current_level'] = $request->level;
        $params['id'] = $request->id;
        $this->model->saveItem($params,['task'=>'change_level']);
        return redirect()->route($this->controllerName)->with('notify_list', 'Đổi level thanh cong');
       

    }
    
    public function is_home(Request $request)
    {
        $params['current_IsHome'] = $request->is_home;
        $params['id'] = $request->id;
        
        $this->model->saveItem($params,['task'=>'change_isHome']);
        return redirect()->route($this->controllerName)->with('notify_list', 'Đổi trạng thái thành công thành công');
       
    }
    
    public function add()
    {
        
        return view($this->pathViewController.'form');
    }
    public function edit(Request $request)
    {
        $params['id'] = $request->id;
        $items = $this->model->getItem($params,['task'=>'get_Item']);
        return view($this->pathViewController.'edit',[
            'data'=>$items,
            ]);
       
    }
    public function save(MainRequest $request)
    {
      
      if ($request->method() == 'POST'){
          $params = $request->all();
          $task = 'add_item';
          $notify = 'Thêm phần tử thành công';
          if($params['id'] !== null){
              $task = 'edit_item';
              $notify = "Sửa  thành công ";

          }
          $this ->model->saveItem($params,['task'=>$task]);
          return redirect()->route($this->controllerName)->with('notify_list',$notify);
      }
    }
    public function delete(Request $request)
    {
        $params['id'] = $request->id;
        $this->model->deleteItem($params,['task'=>'delete_Item']);
        return redirect()->route($this->controllerName)->with('notify_list', 'Xóa phần tử thành công');
    }
    
}