@extends("Home.Layout")
@section("content")
 @include('Category.Search')
@php
  use App\Helpers\Template as Template;
  use App\Helpers\Hightlight as Hightlight;
  $title = $controllerName;
 @endphp
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        {{-- <a class="btn btn-danger"  href="{{ url('slider/Category/add') }}">Add category</a> --}}
        @if (session('notify_list'))
        <div class="alert alert-success" style="width:100px ,background =blue ">
            {{ session('notify_list') }}
        </div>
        @endif
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List {{ $title}}</div>
        <div class=" pull-left" style="padding: 10px">
            <a href="{{route($controllerName. '/form')}}" class="btn btn-success"><i
                    class="fa fa-plus-circle"></i> Thêm mới</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th >No</th>
                    <th >Name</th>
                    <th >descirption</th>
                    <th>category</th>
                    <th >thumb</th>
                     <th >type</th>
                 
                    
                </tr>
                @foreach($data as $key =>$value)
                @php
                  $no = $key +1;
                  $id = $value["id"];
                  $status =$value["status"];
                  $category =$value["category_name"];
                  $name = Hightlight::show($value["name"],$params['search'],'name');
                  $content =Hightlight::show($value["content"],$params['search'],'content');
                  $thumb =$value["thumb"];
                  $type =Template::showItemSelect($controllerName,$id,$value["type"],'type');
                  $created_by =$value["created_by"];
                  $updated_at =$value["updated_at"];
                  $modified_by =$value["modified_by"];
                  
                  
                //  
                $crea = Template::showTime($value["created_at"]);
                $thumb = Template::showItemThumb($controllerName,$value["thumb"],$value["name"]);
                $status_change = Template::showItemStatus($controllerName,$id,$value["status"]);
                $listButton = Template::showButton($controllerName,$id);
                @endphp
                
                <tr> 
                    <td class="td-10"></a>{{$no}}</td>
                    <td class="td-10"></a>{!!$name!!}</td>
                    {{-- <td class="td-10"></a>{!!$content!!}</td> --}}
                    <td class="td-10"></a>{!!$category!!}</td>
                    {{-- <td class="td-3">{!! $status_change!!}</td> --}}
                     <td class="td-10"></a>{!!$thumb!!}</td>
                     <td class="td-10"></a>{!!$type!!}</td>
                     {{-- <td class="td-10"></a>{{$created_by}}</td> --}}
                    
                     <td class="td-10"></a>{!!$listButton!!}</td> 
                
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