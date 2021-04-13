
@php
   // tổng số phần tử
    $totalData = $data->total();
    //tổng số trang
    $totalPage = $data->lastpage();
    //tổng số phần tử trên 1 trang
    $totalDataPerPage = $data->perpage();

@endphp
<div class="col-md-6">
   {{$data->links()}} 
    {{-- {{ $totalData}}  
    {{ $totalPage}}     
    {{ $totalDataPerPage}} --}}
</div>
@if(count($data)>2)
<div class="x_content">
    <div class="row">
        <div class="col-md-6">
        
        </div>
        <div class="col-md-6">
           
        </div>
    </div>
</div>
@endif