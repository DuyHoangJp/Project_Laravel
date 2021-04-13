<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


// c1
 use DB;
class CategoryModel extends Model
{
    //
    // c2
    protected $table = 'category';
    protected $folderUpload = 'category';
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id',
        'name',
        
    ];
    protected $fieldNotAccepted = [
        '_token',
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
            ->limit(8);
            $result = $query->get()->toArray();
         }
         if($options['task'] == "list_news_is_home"){
            $query = $this->select()
            ->where('status','active')
            ->where('is_home','1');

            $result = $query->get()->toArray();
         } 
         if($options['task'] == "items_select"){
            $query = $this->select()
            ->orderBy('name','asc')
            ->where('status','active');
          $result = $query->pluck('name')->toArray();
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
        if($options['task'] == "change_isHome"){
            $isHome=($params['current_IsHome'] == "1") ? "0" :"1";
           self::where('id' , $params['id'])->update(['is_home' =>$isHome]);
        }
        if($options['task'] == "change_display"){
            $display=($params['current_display']);
           self::where('id' , $params['id'])->update(['display' =>$display]);
        }
        
        if($options['task'] == "add_item"){
           $params = array_diff_key($params,array_flip($this->fieldNotAccepted));
            self::insert($params);  
        }
        if($options['task'] == "edit_item"){
            $params = array_diff_key($params,array_flip($this->fieldNotAccepted));
            self::where('id' , $params['id'])->update($params);
        }
       
    }
    
    public  static function getItem($params =null ,$options=null){
       $result =null;
        if($options['task'] == "get_Item"){
          $result = self::where('id' , $params['id'])->first();
        }
       
        return $result ;
    }
    
    public function deleteItem($params =null ,$options=null){
        if($options['task'] == "delete_Item"){
           self::where('id' , $params['id'])->delete();
        }
    }
}
