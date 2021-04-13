<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


// c1
 use DB;
class UsersModel extends Model
{
    //
    // c2
    protected $table = 'users';
    protected $folderUpload = 'users';
    // tự động cập nhât thời gian 
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id',
        'username',
        'email',
        'fullname',
        'avatar',
    ];
    protected $fieldNotAccepted = [
        '_token',
        'avatar_current',
        'password_confirmation'
        
    ];
    public function listItems($params = null ,$options= null){
       $result =null;

    	if($options['task'] == "admin"){
          
        $query = $this->select();

        if ($params['filter']['status'] !== "all") {
           $query->where('status' , '=' ,$params['filter']['status']);
        }
        if ($params['search']['value'] !== "") {
            if ($params['search']['field'] == "all") {
                $query->where(function($query) use($params) {

                    foreach($this->fieldSearchAccepted as $column){
                        $query->orwhere($column, 'like', "%{$params['search']['value']}%");
                    }
                   
                });

            }else if (in_array($params['search']['field'],$this->fieldSearchAccepted)){
                $query->where($params['search']['field'],'LIKE' ,"%{$params['search']['value']}%");
           }
        }
        $result= $query->orderBy('id','asc')
           ->paginate($params['pagination']['total']);
        }
        if($options['task'] == "list_news"){
           $query = $this->select()->where('status','active')
           ->limit(5);
           $result = $query->get()->toArray();
        }
    	return $result ;

    }

    public function IsHome($params =null ,$options=null){
       $result =null;
        if($options['task'] == "is_home"){
        
        $result = self::select()

        ->orderBy('id','desc')
        ->paginate($params['pagination']['total']);
        }
        return $result ;
    }
    public function countItems($params =null ,$options=null){
       $result =null;
        if($options['task'] == "count_items"){
            $query =$this::groupBy('status')
                    ->select(self::raw(' status, count(id) as count'));
            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function($query) use($params) {
    
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orwhere($column, 'like', "%{$params['search']['value']}%");
                        }
                       
                    });
    
                }else if (in_array($params['search']['field'],$this->fieldSearchAccepted)){
                    $query->where($params['search']['field'],'LIKE' ,"%{$params['search']['value']}%");
               }
            }
            $result= $query->get()->toArray();
            }
        return $result ;
    }

    public function saveItem($params =null ,$options=null){
        if($options['task'] == "change_status"){
            $status =($params['currentStatus'] == "active") ? "inactive" :"active";
           self::where('id' , $params['id'])->update(['status' =>$status]);
        }
        if($options['task'] == "change_level"){
            $level =$params['current_level']; 
           self::where('id' , $params['id'])->update(['level' =>$level]);
        }
        if($options['task'] == "add_item"){
             $avatar = $params['avatar'];
            $params['avatar'] =  Str::random(10) . '.'.$avatar->clientExtension() ;
            $avatar ->storeAs($this->folderUpload,$params['avatar'],'image');
            $params['password'] = md5($params['password']);  //md5("123$%^^".$params['password'].%$%$%$%);
            $params = array_diff_key($params,array_flip($this->fieldNotAccepted));
            self::insert($params);
           
          
        }
        if($options['task'] == "edit_item"){

            if(!empty($params['avatar'])){
                $avatar = $params['avatar'];
              Storage::disk('image')->delete($this->folderUpload .'/' . $params['avatar_current']);
             $params['avatar'] =  Str::random(10) . '.'.$avatar->clientExtension() ;
             $avatar ->storeAs($this->folderUpload,$params['avatar'],'image');
            }
            $params = array_diff_key($params,array_flip($this->fieldNotAccepted));
            self::where('id' , $params['id'])->update($params);
        }
       
    }
    
    public  static function getItem($params =null ,$options=null){
       $result =null;
        if($options['task'] == "get_Item"){
          $result = self::where('id' , $params['id'])->first();
        }
        if($options['task'] == "get_avatar"){
            $result = self::select('id' , 'avatar')->where('id' , $params['id'])->first();
          }
        return $result ;
    }
    
    public function deleteItem($params =null ,$options=null){
        if($options['task'] == "delete_Item"){
            // phải thêm static ở hàm getItem
            // $item = self::getItem($params,['task'=>'get_avatar']); 
            $item = $this->getItem($params,['task'=>'get_avatar']);
            Storage::disk('image')->delete($this->folderUpload .'/' . $item['avatar']);
          self::where('id' , $params['id'])->delete();
        }
    }
}
// echo '<pre>';
// print_r($params);
// echo '</pre>';