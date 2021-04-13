<?php
namespace App\Helpers;

use Config;

class Template
{
    public static function showTime($time)
    {
        $xhtml = sprintf(' %s', date(config::get('config.format.short_time'), strtotime($time)));
        return $xhtml;
    }
    public static function showDatetime($dateTime)
    {
        return date_format(date_create($dateTime),config::get('config.format.short_time'));
    }
    public static function showItemThumb($controllerName,$thumbName,$thumbAlt)
    {
        $xhtml = sprintf(' <img src="%s" alt="%s" style="width: 140px;height: 60px;" class= "thumb">', asset("images/$controllerName/$thumbName"),$thumbAlt);
        return $xhtml;
    }
    public static function showCountButton($controllerName, $countByStatus, $currentStatus)
    {
        $xhtml = null;
        $tmplStatus = config::get('config.template.status');
        if (count($countByStatus) > 0) {
            array_unshift($countByStatus, [
                'count' => array_sum(array_column($countByStatus, 'count')),
                'status' => 'all',

            ]);

            foreach ($countByStatus as $items) { // items =[count,status]

                $statusValue = $items['status'];
                $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
                $currentStatus = $tmplStatus[$statusValue];

                //  $link = route('category')."?filter_status=".$statusValue;
                $link = route($controllerName) . "?filter_status=" . $statusValue;

                $xhtml .= sprintf('<a href="%s" type="button" class="btn btn-primary">
                %s <span class="badge bg-white">%s</span>

                </a>', $link, $currentStatus['name'], $items['count']);
            }

        }

        return $xhtml;
    }
    public static function showItemStatus($controllerName,$id,$statusValue)
    // public static function showItemStatus($statusValue)
    {
        $tmplStatus = config::get('config.template.status');

        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

        $currentStatus = $tmplStatus[$statusValue];

        $link = route($controllerName . '/status',['status'=>$statusValue,'id'=>$id]);
        // $link = route($controllerName) . "?filter_status=" . $statusValue;
        // $link = route('slider'); 
        $xhtml = sprintf('<a href="%s" type="button" class="btn btn-icon btn-success  %s ">%s</a>',
        $link, $currentStatus['class'], $currentStatus['name']);
        
        return $xhtml;
    }
    public static function showItemIsHome($controllerName,$id,$isHomeValue)
  
    {


        $tmpl_IsHome = config::get('config.template.is_home');

        $isHomeValue = array_key_exists($isHomeValue, $tmpl_IsHome) ? $isHomeValue : '1';

        $current_IsHome = $tmpl_IsHome[$isHomeValue];
        $link = route($controllerName . '/is_home',['is_home'=>$isHomeValue,'id'=>$id]);
       
        $xhtml = sprintf('<a href="%s" type="button" class="btn btn-icon btn-success  %s ">%s</a>',
        $link, $current_IsHome['class'], $current_IsHome['name']);
        
        return $xhtml;
    }
    public static function showItemSelect($controllerName,$id,$displayValue,$fieldName)
  
    {
        $tmplDisplay = config::get('config.template.'.$fieldName);
        $displayValue = array_key_exists($displayValue, $tmplDisplay) ? $displayValue : 'default';
        $link = route($controllerName . '/'.$fieldName,[$fieldName=>'value_new','id'=>$id]);
        $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class= "form-control">',$link);
             foreach ($tmplDisplay as $key => $value){
                $xhtmlSelect = '';
              if($key == $displayValue) $xhtmlSelect = 'selected = "selected" ';
              $xhtml .= sprintf(' <option value="%s" %s>%s</option>',$key, $xhtmlSelect,$value['name']);
             }
        
       
        $xhtml .= '</select>';
        
       
        
        return $xhtml;
    }
    public static function showButton($controllerName,$id)
    {
        $tmplButton = config::get('config.template.tmplButton');

        // $tmplButton =[
        //     'edit'    => ['class' => 'btn-success','title'=>'Edit','icon'=>'fa-pencil','route'=>'edit'], //,'route-name'=>$controller.'/form'
        //     'delete'  => ['class' => 'btn-danger','title'=>'delete','icon'=>'fa-trash','route'=>$controllerName.'/delete'],
        //     'info'    => ['class' => 'btn-info','title'=>'info','icon'=>'fa-pencil','route'=>'Edit'],
        // ];
       
        $buttonInArea = config::get('config.config.buttonInArea');
        $controllerName = array_key_exists($controllerName, $buttonInArea) ? $controllerName : 'default';
        $listButton = $buttonInArea[ $controllerName];  //edit,delete
         
         $xhtml = '<div class="zvn-box-btn-filter">';
        foreach( $listButton  as $btn){
           $curren =  $tmplButton[$btn];
        //    $link = "#";
        
        // $link = route($tmplButton['edit']['route']);
        $link = route($controllerName.$curren['route'],['id'=>$id]);
         $xhtml .= sprintf('<a href="%s" type="button" data-toggle="tooltip" data-placement="top" title="%s" class="btn btn-icon  %s"
        
         
         data-original-title ="%s">
         
         <i class ="fa %s" ></i>
         </a>',
         $link, $curren['title'], $curren['class'], $curren['title'],$curren['icon']);

        }

        $xhtml .='</div>';
       

        return $xhtml;
    }

    public static function showSearch($controllerName,$paramsSearch)
    {

        $xhtml = null;

        $tmpField          = config::get('config.template.search');
        
        $fiedInController = config::get('config.config.search');
        $controllerName = (array_key_exists($controllerName, $fiedInController)) ? $controllerName : 'default';
        $xhtmlField = null;

        foreach ($fiedInController[$controllerName] as $field) {
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmpField[$field]['name']);

        }

          
        $searchField = (in_array($paramsSearch['field'] ,  $fiedInController[$controllerName])) ? $paramsSearch['field'] : "all";
       
          $searchValue = $paramsSearch['value'] ? $paramsSearch['value'] : "";
        $xhtml = sprintf('
        <div class="input-group">
                     <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
                        %s <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        %s

                        </ul>
                     </div>
                     <input type="text" class="form-control" name="search_value" value="%s">
                     <input type="hidden" name="search_field" value="%s">
                     <span class="input-group-btn">
                     <button id="btn-clear" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                     <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                     </span>
                     
                  </div>
         ',$tmpField[$searchField]['name'], $xhtmlField,$searchValue,$searchField);

        return $xhtml;
    }
    public static function showContent($content,$lenght,$prefix = '...')
    {
        $prefix = ($lenght == 0) ? '' : $prefix;
        $content = str_replace(['<p>','</p>'], '',$content);
        return preg_replace('/\s+?(\S+)?$/', '',substr($content,0,$lenght)).$prefix;
    }

}
