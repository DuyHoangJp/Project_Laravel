@php 

use App\Models\CategoryModel as CategoryModel;
//Khởi tạo đối tượng
$categoryModel  = new CategoryModel();
$items =  $categoryModel->listItems(null,['task' =>"list_news"]);
$xhtml = '';
$xhtmlMobile = '';

if(count($items)>0){
    $xhtml = '<nav class="main_nav"><ul class="main_nav_list d-flex flex-row align-items-center justify-content-start">';
    $xhtmlMobile = '<nav class="menu_nav"> <ul class="menu_mm">';   
    foreach ($items as $key => $value) {
    $xhtml .= sprintf('<li><a href="index.html">%s</a></li>',$value['name']);
    $xhtmlMobile .= sprintf('<li class="menu_mm"><a href="index.html">%s</a></li>',$value['name']);
     }

    $xhtml .= '  </ul></nav>';
    $xhtmlMobile .= '  </ul></nav>';
    
}

@endphp




<header class="header">
    <!-- Header Content -->
    <div class="header_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justfy-content-start">
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo"><span>ZEND</span>VN123</div>
                            </a>
                        </div>
                        <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
                            <a href="#">
                                <div class="background_image"
                                     style="background-image:url(images/zendvn-online.png);background-size: contain"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Navigation & Search -->
    <div class="header_nav_container" id="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                        <!-- Logo -->
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo"><span>V</span>N</div>
                            </a>
                        </div>
                        <!-- Navigation -->
                        {!! $xhtml!!}
                        <!-- Hamburger -->
                        <div class="hamburger ml-auto menu_mm"><i class="fa fa-bars  trans_200 menu_mm"
                                                                  aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            
                {!!$xhtmlMobile!!}
            
</div>