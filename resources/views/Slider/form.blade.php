@extends("Home.Layout")
@section("content")


@php 
  $title = $controllerName;

  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;
                           //for , lable ,class
    // $namelabel =  Form::label('name','Name',['class'=>'control-label col-md-3 col-sm-3 col-xs-12','style'=>'text-align:right']);
    //                         //  name, value ,class, id
    // $nameInput =  Form::text('name','',['class'=>'form-control col-md-6 col-xs-12','id'=>'nameid']);

    // $descriptionlabel =  Form::label('description','description',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
    // $descriptionInput =  Form::textarea('description','',['class'=>'form-control col-md-6 col-xs-12','id'=>'description']);

    $formLabelClass =  config('config.template.form_label.class');
     $formInputClass =  config('config.template.form_input.class');
     $statusValue = ['active'=>config('config.template.status.active.name'),'inactive'=>config('config.template.status.inactive.name')];
     $inputHiden = Form::hidden('id','');
     $inputCurrent = Form::hidden('thumb_current','');

    $elements = [
        [
            'label' =>  Form::label('name','Name',['class'=>$formLabelClass]),
            'element' =>  Form::text('name','',['class'=>$formInputClass,'id'=>'name'])
        ],
        [
            'label' =>  Form::label('status','description',['class'=>$formLabelClass]),
            'element' =>  Form::text('description','',['class'=>$formInputClass,'id'=>'description']),
        ],
        [
            'label' =>  Form::label('status','status',['class'=>$formLabelClass]),
            'element' =>Form::select('status', $statusValue, '',['class'=>$formInputClass]),
        ],
        [
            'label' =>  Form::label('link','link',['class'=>$formLabelClass]),
            'element' =>  Form::text('link','',['class'=>$formInputClass,'id'=>'link']),
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
            'label' =>  Form::label('thumb','thumb',['class'=>$formLabelClass]),
            'element' =>  Form::file('thumb',['class'=>$formInputClass,'id'=>'thumb']),
            'thumb' =>  Template::showItemThumb($controllerName,null,null),
            'type'  =>"thumb",
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
