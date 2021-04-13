@extends("Home.Layout")
@section("content")


@php 
  $title = $controllerName;

  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;
    
    $formLabelClass =  config('config.template.form_label.class');
     $formInputClass =  config('config.template.form_input.class');
     $statusValue = ['active'=>config('config.template.status.active.name'),'inactive'=>config('config.template.status.inactive.name')];
     $levelValue = ['Admin'=>config('config.template.level.admin.name'),'Member'=>config('config.template.level.member.name')];
     $inputHiden = Form::hidden('id','');
     $inputCurrent = Form::hidden('avatar_current','');

    $elements = [
        [
            'label' =>  Form::label('username','Username',['class'=>$formLabelClass]),
            'element' =>  Form::text('username','',['class'=>$formInputClass,'id'=>'username'])
        ],
        [
            'label' =>  Form::label('email','Email',['class'=>$formLabelClass]),
            'element' =>  Form::text('email','',['class'=>$formInputClass,'id'=>'email']),
        ],
        [
            'label' =>  Form::label('status','status',['class'=>$formLabelClass]),
            'element' =>Form::select('status', $statusValue, '',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('level','Level',['class'=>$formLabelClass]),
            'element' =>Form::select('level', $levelValue, '',['class'=>$formInputClass]),
        ],
       
        [
            'label' =>  Form::label('fullname','Fullname',['class'=>$formLabelClass]),
            'element' =>  Form::text('fullname','',['class'=>$formInputClass,'id'=>'created_by']),
        ],
        [
            'label' =>  Form::label('password','Password',['class'=>$formLabelClass]),
            'element' =>  Form::password('password',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('password_confirmation','Password_Confirm',['class'=>$formLabelClass]),
            'element' =>  Form::password('password_confirmation',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('modified_by','modified_by',['class'=>$formLabelClass]),
            'element' =>  Form::text('modified_by','',['class'=>$formInputClass,'id'=>'modified_by']),
        ],
        [
            'label' =>  Form::label('avatar','Avatar',['class'=>$formLabelClass]),
            'element' =>  Form::file('avatar',['class'=>$formInputClass]),
            'avatar' =>  Template::showItemThumb($controllerName,null,null),
            'type'  =>"avatar",
        ],
        [
            'element' =>  $inputHiden .$inputCurrent. Form::submit('save',['class'=>'btn-success', 'style'=>'border: 0px']),
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
