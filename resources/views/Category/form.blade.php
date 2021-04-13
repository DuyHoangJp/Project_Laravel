@extends("Home.Layout")
@section("content")


@php 
  $title = $controllerName;

  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;
  

    $formLabelClass =  config('config.template.form_label.class');
     $formInputClass =  config('config.template.form_input.class');
     $statusValue = ['active'=>config('config.template.status.active.name'),'inactive'=>config('config.template.status.inactive.name')];
     $isHomeValue = ['1'=>config('config.template.is_home.1.name'),'0'=>config('config.template.is_home.0.name')];
     $displayValue = ['default'=>'select','list'=>config('config.template.display.list.name'),'grid'=>config('config.template.display.grid.name')];
     $inputHiden = Form::hidden('id','');
     $elements = [
        [
            'label' =>  Form::label('name','Name',['class'=>$formLabelClass]),
            'element' =>  Form::text('name','',['class'=>$formInputClass,'id'=>'name'])
        ],
        [
            'label' =>  Form::label('status','status',['class'=>$formLabelClass]),
            'element' =>Form::select('status', $statusValue, '',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('is_home','is_home',['class'=>$formLabelClass]),
            'element' =>Form::select('is_home', $isHomeValue,'',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('display','display',['class'=>$formLabelClass]),
            'element' =>Form::select('display', $displayValue, '',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('created_by','created_by',['class'=>$formLabelClass]),
            'element' =>  Form::text('created_by','',['class'=>$formInputClass,'id'=>'created_by']),
        ],
        [
            'label' =>  Form::label('modified_by','modified_by',['class'=>$formLabelClass]),
            'element' =>  Form::text('modified_by','',['class'=>$formInputClass,'id'=>'modified_by']),
        ],
        [
            'element' => $inputHiden .Form::submit('save',['class'=>'btn-success', 'style'=>'border: 0px']),
            'type'    => 'button'
        ],
];

@endphp
<h4 class="panel-heading text-primary">List {{ $title}} </h4>

@include('templates.error')

<div class=" pull-right">
    <a href="{{route($controllerName)}}" class="btn btn-success"><i
            class=""></i> Quay về</a>
</div>


{!! Form::open([
    'method' => 'POST',
    'url'    => route("$controllerName/save"),
    'accept-charset'=>'UTF-8',
    'enctype' => 'multipart/form-data',
    'class' => 'form-horizontal form-label-left',
    'id' => 'main-form'])!!}
{!!FormTemplate::show($elements)!!}


{!! Form::close() !!}



@endsection
