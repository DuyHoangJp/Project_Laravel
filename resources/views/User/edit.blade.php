@extends("Home.Layout")
@section("content")


@php 
  $title = $controllerName;

  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;

     $formLabel =  config('config.template.form_label');
     $formInput=  config('config.template.form_input');
     $statusValue = ['default' => 'Select','active'=>config('config.template.status.active.name'),'inactive'=>config('config.template.status.inactive.name')];
     $levelValue = ['Admin'=>config('config.template.level.admin.name'),'Member'=>config('config.template.level.member.name')];
     $inputHiden = Form::hidden('id',$data['id']);
     $inputCurrent = Form::hidden('avatar_current',$data['avatar']);

    
    $elements = [
        [
            'label' =>  Form::label('username','Username', $formLabel),
            'element' =>  Form::text('username',$data['username'], $formInput)
        ],
        [
            'label' =>  Form::label('email','Email', $formLabel),
            'element' =>  Form::text('email',$data['email'], $formInput),
        ],
        [
            'label' =>  Form::label('status','status', $formLabel),
            'element' =>Form::select('status', $statusValue, $data['status'], $formInput),
        ],
        [
            'label' =>  Form::label('level','Level',$formLabel),
            'element' =>Form::select('level', $levelValue, $data['level'],$formInput),
        ],
        [
            'label' =>  Form::label('created_by','created_by', $formLabel),
            'element' =>  Form::text('created_by',$data['created_by'], $formInput),
        ],
        [
            'label' =>  Form::label('modified_by','modified_by', $formLabel),
            'element' =>  Form::text('modified_by',$data['modified_by'], $formInput),
        ],
        [
            'label' =>  Form::label('avatar','avatar', $formLabel),
            'element' =>  Form::file('avatar',$formInput),
            'avatar' =>  Template::showItemThumb($controllerName,$data['avatar'],$data['name']),
            'type'  =>"avatar_edit",
        ],
        [
            'element' => $inputHiden .$inputCurrent. Form::submit('save',['class'=>'btn-success', 'style'=>'border: 0px']),
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
