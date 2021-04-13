@php
  use App\Helpers\Template as Template;
  $xhtmlStatus = Template::showCountButton($controllerName,$countByStatus,$params['filter']['status']);
  $xhtmlSearch = Template::showSearch($controllerName,$params['search']);

  $pageTitle = 'Quản lý'. ' ' . ucfirst( $controllerName);
 @endphp
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h3> {{ $pageTitle}}</h3>
            <ul class="nav navbar-right panel_toolbox">
               <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
               </li>
            </ul>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <div class="row">
               <div class="col-md-6">
                  {!! $xhtmlStatus!!}
               </div>
               <div class="col-md-6">
                  {!!  $xhtmlSearch!!}
               </div>
               {{-- <div class="col-md-2">
                  <select name="select_filter" class="form-control" data-field="level">
                     <option value="default" selected="selected">Select Level</option>
                     <option value="admin">Admin</option>
                     <option value="member">Member</option>
                  </select>
               </div> --}}
            </div>
         </div>
      </div>
   </div>


   {{--  <a href="?filter_status=all" type="button" class="btn btn-primary">
      All <span class="badge bg-white">4123</span>
      </a><a href="?filter_status=active" type="button" class="btn btn-success">
      Active <span class="badge bg-white">2</span>
      </a><a href="?filter_status=inactive" type="button" class="btn btn-success">
      Inactive <span class="badge bg-white">2</span>
      </a>  --}}