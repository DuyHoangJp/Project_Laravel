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
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Level</th>
                    <th>Avatar</th>
                    <th>Trạng thái</th>
                    <th>Tạo mới</th>
                    <th>modified_by</th>
                    <th>status</th>
                    <th></th>
                </tr>
                @foreach($data as $key =>$value)
                @php
                  $no = $key +1;
                  $id = $value["id"];
                  $status =$value["status"];
                  $username = Hightlight::show($value["username"],$params['search'],'username');
                  $fullname =Hightlight::show($value["fullname"],$params['search'],'fullname');
                  $email = Hightlight::show($value["email"],$params['search'],'email');
                  $level =Template::showItemSelect($controllerName,$id,$value["level"],'level');
                  $avatar = Template::showItemThumb($controllerName,$value["avatar"],$value["name"]);
                  $status_change = Template::showItemStatus($controllerName,$id,$value["status"]);
                  $created_by =$value["created_by"];
                  $updated_at = Template::showTime($value["updated_at"]);
                  $modified_by = Template::showTime($value["modified_by"]);
                  $listButton = Template::showButton($controllerName,$id);
                @endphp
                
                <tr> 
                    <td class="td-3"><a href=""></a>{{$no}}</td>
                    <td><a href=""></a>{!!$username!!}</td>
                    <td class="td-3"><a href=""></a>{!!$email!!}</td>
                    <td class="td-3"><a href=""></a>{!!$fullname!!}</td>
                    <td class="td-3"><a href=""></a>{!!$level!!}</td>
                    <td class="td-3"><a href=""></a>{!!$avatar!!}</td>
                    <td class="td-3">{!! $status_change!!}</td>
                    <td class="td-3"><a href=""></a>{{$created_by}}</td>
                    <td class="td-3"><a href=""></a>{!!$updated_at!!}</td>
                    <td class="td-3"><a href=""></a>{!!$modified_by!!}</td>
                    
                    <td class="td-3"><a href=""></a>{!!$listButton!!}</td> 
                
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