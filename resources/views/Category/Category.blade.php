@extends(".Home.Layout")
@section("content")
 @include('Category.Search')
@php
  use App\Helpers\Template as Template;
  use App\Helpers\Hightlight as Hightlight;
  $title = $controllerName;
 @endphp
<div class="col-md-12">
    {{-- <div style="margin-bottom:5px;">
        <a class="btn btn-danger"  href="{{ url('slider/Category/add') }}">Add category</a>
    </div> --}}
        @if (session('notify_list'))
        <div class="alert alert-success" style="width:100px ,background =blue ">
            {{ session('notify_list') }}
        </div>
     @endif
    <div class="panel panel-primary">
        <div class="panel-heading">List {{ $title}}</div>
        <div class=" pull-left" style="padding: 10px">
            <a href="{{route($controllerName. '/form')}}" class="btn btn-success"><i
                    class="fa fa-plus-circle"></i> Thêm mới</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>status</th>
                    <th>created_at2</th>
                    <th>created_by</th>
                    <th>update_at</th>
                    <th>modifile_by</th>
                    <th>is_home</th>
                    <th>display 132</th>

                    <th style="width:100px;"></th>
                </tr>
                @foreach($data as $key =>$value)
                @php
                  $no = $key +1;
                  $id = $value["id"];
                  $status =$value["status"];
                  $name =Hightlight::show($value["name"],$params['search'],'name');
        
                  $created_by =$value["created_by"];
                  $updated_at =$value["updated_at"];
                  $modified_by =$value["modified_by"];
                  $is_home =Template::showItemIsHome($controllerName,$id,$value["is_home"]);
                  $display =Template::showItemSelect($controllerName,$id,$value["display"],'display');
                //  
                $crea = Template::showTime($value["created_at"]);
                $status_change = Template::showItemStatus($controllerName,$id,$value["status"]);
                $listButton = Template::showButton($controllerName,$id);
                @endphp
                
                <tr> 
                    <td><a href=""></a>{{$no}}</td>
                    <td><a href=""></a>{!!$name!!}</td>
                   
                    
                     <td>{!! $status_change!!}</td>

                    <td><a href=""></a>{{$crea}}</td>

                    <td><a href=""></a>{{$created_by}}</td>
                   <td><a href=""></a>{{$updated_at}}</td>
                    <td><a href=""></a>{{$modified_by}}</td>
                    <td><a href=""></a>{!!$is_home!!}</td>
                    <td><a href=""></a>{!!$display!!}</td>
                    <td><a href=""></a>{!!$listButton!!}</td> 
                    
                </tr>
            @endforeach
            </table>
            {{-- @include('elements.main-sidebar') --}}
            @include('Category.pagi')
            
        </div>
    </div>
    
</div>
<!-- end content -->
</div>

@endsection