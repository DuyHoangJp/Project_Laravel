<?php
namespace App\Helpers;

use Config;

class Form{
    public static function show($elements){
        // echo '<pre>';
        // print_r($elements);
        // echo '</pre>';
       $xhtml = null;
        foreach($elements as $element){

            $xhtml .= self::formGroup($element);
              
            
        }
     return $xhtml;      
  }
  public static function formGroup($element){
        
    $type = isset($element['type']) ? $element['type'] : "input"; 
    $xhtml = null;
      switch($type){
        case 'input':
                $xhtml .= sprintf(
                    '<div class="form-group">
                    %s
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        %s
                    </div>
                </div>',$element['label'],$element['element']
                );
        break;
        case 'thumb':
            $xhtml .= sprintf(
            '<div class="form-group">
               %s
                <div class="col-md-6 col-sm-6 col-xs-12">
               %s
                   
                </div>
            </div>',$element['label'],$element['element']
            );
       break;
       case 'thumb_edit':
        $xhtml .= sprintf(
        '<div class="form-group">
           %s
            <div class="col-md-6 col-sm-6 col-xs-12">
           %s
                <p style="margin-top: 50px;">%s</p>
            </div>
        </div>',$element['label'],$element['element'],$element['thumb']
        );
      break;
      case 'avatar':
        $xhtml .= sprintf(
        '<div class="form-group">
           %s
            <div class="col-md-6 col-sm-6 col-xs-12">
           %s
               
            </div>
        </div>',$element['label'],$element['element']
        );
   break;
   case 'avatar_edit':
    $xhtml .= sprintf(
    '<div class="form-group">
       %s
        <div class="col-md-6 col-sm-6 col-xs-12">
       %s
            <p style="margin-top: 50px;">%s</p>
        </div>
    </div>',$element['label'],$element['element'],$element['avatar']
    );
break;

       case 'button':
                $xhtml .= sprintf(
                    '<hr>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            %s
                        </div>,
                    </div>',$element['element']
                );
       break;
      }

      return $xhtml; 
  }
       
} 

?>