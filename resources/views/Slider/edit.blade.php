@extends("Home.Layout")
@section("content")


@php 
  $title = $controllerName;

  use App\Helpers\Form as FormTemplate;
  use App\Helpers\Template as Template;

     $formLabel =  config('config.template.form_label');
     $formInput=  config('config.template.form_input');
     $statusValue = ['default' => 'Select','active'=>config('config.template.status.active.name'),'inactive'=>config('config.template.status.inactive.name')];
     $inputHiden = Form::hidden('id',$data['id']);
     $inputCurrent = Form::hidden('thumb_current',$data['thumb']);

    
    $elements = [
        [
            'label' =>  Form::label('name','Name', $formLabel),
            'element' =>  Form::text('name',$data['name'], $formInput)
        ],
        [
            'label' =>  Form::label('status','description', $formLabel),
            'element' =>  Form::text('description',$data['description'], $formInput),
        ],
        [
            'label' =>  Form::label('status','status', $formLabel),
            'element' =>Form::select('status', $statusValue, $data['status'], $formInput),
        ],
        [
            'label' =>  Form::label('link','link', $formLabel),
            'element' =>  Form::text('link',$data['link'], $formInput),
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
            'label' =>  Form::label('thumb','thumb', $formLabel),
            'element' =>  Form::file('thumb',$formInput),
            'thumb' =>  Template::showItemThumb($controllerName,$data['thumb'],$data['name']),
            'type'  =>"thumb_edit",
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
