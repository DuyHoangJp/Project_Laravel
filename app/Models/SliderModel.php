<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


// c1
 use DB;
class SliderModel extends Model
{
    //
    // c2
    protected $table = 'sliders';
    protected $folderUpload = 'slider';
    // tự động cập nhât thời gian 
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id',
        'name',
        'description',
        'link',
        'thumb',
    ];
    protected $fieldNotAccepted = [
        '_token',
        // 'thumb',
        'thumb_current',
        
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
        if($options['task'] == "add_item"){


             //Cach 1
            // $paramsInsert['name'] = $params['name'];
            // $paramsInsert['description'] = $params['description'];
            // $paramsInsert['status'] = $params['status'];
            // $paramsInsert['thumb'] = $params['thumb'];
            // $paramsInsert['link'] = $params['link'];
            // $paramsInsert['created_by'] = 'duy';
            // $paramsInsert['updated_at'] = date('Y-m-d');
            // $paramsInsert['created_at'] = date('Y-m-d');

            //  echo '<pre>';
            // print_r($params);
            // echo '</pre>';
            // die();
            $thumb = $params['thumb'];
            // $params['thumb'] =  Str::random(10);
            // $thumb ->storeAs('images',$params['thumb'] . '.'.$thumb->clientExtension() );
            $params['thumb'] =  Str::random(10) . '.'.$thumb->clientExtension() ;
            $thumb ->storeAs($this->folderUpload,$params['thumb'],'image');
            $params = array_diff_key($params,array_flip($this->fieldNotAccepted));
            self::insert($params);
             //Cach 1
            // $this->name = $params['name'];
            // $this->description = $params['description'];
            // $this->status = $params['status'];
            // $this->link = $params['link'];
            // $this->save();
          
        }
        if($options['task'] == "edit_item"){

            if(!empty($params['thumb'])){
                $thumb = $params['thumb'];
              Storage::disk('image')->delete($this->folderUpload .'/' . $params['thumb_current']);
             $params['thumb'] =  Str::random(10) . '.'.$thumb->clientExtension() ;
             $thumb ->storeAs($this->folderUpload,$params['thumb'],'image');
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
        if($options['task'] == "get_thumb"){
            $result = self::select('id' , 'thumb')->where('id' , $params['id'])->first();
          }
        return $result ;
    }
    
    public function deleteItem($params =null ,$options=null){
        if($options['task'] == "delete_Item"){
            // phải thêm static ở hàm getItem
            // $item = self::getItem($params,['task'=>'get_thumb']); 
            $item = $this->getItem($params,['task'=>'get_thumb']);
            Storage::disk('image')->delete($this->folderUpload .'/' . $item['thumb']);
          self::where('id' , $params['id'])->delete();
        }
    }
}
// echo '<pre>';
// print_r($params);
// echo '</pre>';