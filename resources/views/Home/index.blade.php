<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('elements.style_frontend')   
    
</head>
<body>
    <div class="super_container">


        
        <!-- Header -->
        @include('News.header')   
        <!-- Menu -->
       
        <!-- Home -->
        @include('News.slider')   
        <section class="content">
            @yield("content")
        </section> 
        <!-- Content Container -->
        <div class="content_container">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-9">
                        <div class="main_content">
                            <!-- Featured -->
                            @include('News.block.featured',['items'=>$itemsFeatured])
                            <!-- Category -->
                           
                            @include('News.block.category')
                        </div>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <!-- Latest Posts -->
                            {{-- <div class="sidebar_latest">
                                <div class="sidebar_title">Bài viết gần đây</div>
                                <div class="latest_posts">
                                    <!-- Latest Post -->
                                    <div class="latest_post d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="latest_post_image"><img src="images/article/105x105-C4DtP4ico8.png"
                                                                                alt="Tia cực tím tại Hà Nội ở mức &#39;nguy hiểm&#39;">
                                            </div>
                                        </div>
                                        <div class="latest_post_content">
                                            <div class="post_category_small cat_video"><a href="the-loai/suc-khoe-3.html">Sức
                                                khỏe</a></div>
                                            <div class="latest_post_title"><a
                                                    href="bai-viet/tia-cuc-tim-tai-ha-noi-o-muc-nguy-hiem-20.html">Tia cực
                                                tím tại Hà Nội ở mức 'nguy hiểm'</a></div>
                                            <div class="latest_post_date">16/05/2019</div>
                                        </div>
                                    </div>
                                    <!-- Latest Post -->
                                    <div class="latest_post d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="latest_post_image"><img src="images/article/105x105-gCPGos7mhY.png"
                                                                                alt="Blockchain và trí tuệ nhân tạo AI làm thay đổi giáo dục trực tuyến">
                                            </div>
                                        </div>
                                        <div class="latest_post_content">
                                            <div class="post_category_small cat_video"><a href="the-loai/giao-duc-2.html">Giáo
                                                dục</a></div>
                                            <div class="latest_post_title"><a
                                                    href="bai-viet/blockchain-va-tri-tue-nhan-tao-ai-lam-thay-doi-giao-duc-truc-tuyen-21.html">Blockchain
                                                và trí tuệ nhân tạo AI làm thay đổi giáo dục trực tuyến</a></div>
                                            <div class="latest_post_date">16/05/2019</div>
                                        </div>
                                    </div>
                                    <!-- Latest Post -->
                                    <div class="latest_post d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="latest_post_image"><img src="images/article/105x105-nt1QxhKUXM.jpeg"
                                                                                alt="Huawei nói lệnh cấm sẽ khiến Mỹ tụt hậu về 5G">
                                            </div>
                                        </div>
                                        <div class="latest_post_content">
                                            <div class="post_category_small cat_video"><a href="the-loai/so-hoa-6.html">Số
                                                hóa</a></div>
                                            <div class="latest_post_title"><a
                                                    href="bai-viet/huawei-noi-lenh-cam-se-khien-my-tut-hau-ve-5g-22.html">Huawei
                                                nói lệnh cấm sẽ khiến Mỹ tụt hậu về 5G</a></div>
                                            <div class="latest_post_date">16/05/2019</div>
                                        </div>
                                    </div>
                                    <!-- Latest Post -->
                                    <div class="latest_post d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="latest_post_image"><img src="images/article/105x105-aiC6j6fWZY.png"
                                                                                alt="Asus ra mắt Zenfone 6 với camera lật tự động">
                                            </div>
                                        </div>
                                        <div class="latest_post_content">
                                            <div class="post_category_small cat_video"><a href="the-loai/so-hoa-6.html">Số
                                                hóa</a></div>
                                            <div class="latest_post_title"><a
                                                    href="bai-viet/asus-ra-mat-zenfone-6-voi-camera-lat-tu-dong-23.html">Asus
                                                ra mắt Zenfone 6 với camera lật tự động</a></div>
                                            <div class="latest_post_date">16/05/2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Advertisement -->
                            <!-- Extra -->
                            {{-- <div class="sidebar_extra">
                                <a href="#">
                                    <div class="sidebar_title">Quảng cáo</div>
                                    <div class="sidebar_extra_container">
                                        <div class="background_image"
                                             style="background-image:url(blog/images/extra_1.jpg)"></div>
                                        <div class="sidebar_extra_content">
                                            <div class="sidebar_extra_title">30%</div>
                                            <div class="sidebar_extra_title">off</div>
                                            <div class="sidebar_extra_subtitle">Mua online ngay bây giờ</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            <!-- Most Viewed -->
                            {{-- <div class="most_viewed">
                                <div class="sidebar_title">Xem nhiều nhẩt</div>
                                <div class="most_viewed_items">
                                    <!-- Most Viewed Item -->
                                    <div class="most_viewed_item d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="most_viewed_num">01.</div>
                                        </div>
                                        <div class="most_viewed_content">
                                            <div class="post_category_small cat_video"><a href="category.html">video</a>
                                            </div>
                                            <div class="most_viewed_title"><a href="single.html">New tech development</a>
                                            </div>
                                            <div class="most_viewed_date"><a href="#">March 12, 2018</a></div>
                                        </div>
                                    </div>
                                    <!-- Most Viewed Item -->
                                    <div class="most_viewed_item d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="most_viewed_num">02.</div>
                                        </div>
                                        <div class="most_viewed_content">
                                            <div class="post_category_small cat_world"><a href="category.html">world</a>
                                            </div>
                                            <div class="most_viewed_title"><a href="single.html">Robots are taking over</a>
                                            </div>
                                            <div class="most_viewed_date"><a href="#">March 12, 2018</a></div>
                                        </div>
                                    </div>
                                    <!-- Most Viewed Item -->
                                    <div class="most_viewed_item d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="most_viewed_num">03.</div>
                                        </div>
                                        <div class="most_viewed_content">
                                            <div class="post_category_small cat_technology"><a href="category.html">tech</a>
                                            </div>
                                            <div class="most_viewed_title"><a href="single.html">10 tips to tech world</a>
                                            </div>
                                            <div class="most_viewed_date"><a href="#">March 12, 2018</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Tags -->
                            {{-- <div class="tags">
                                <div class="sidebar_title">Tags</div>
                                <div class="tags_content d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="tag cat_technology"><a href="category.html">technology</a></div>
                                    <div class="tag"><a href="category.html">design</a></div>
                                    <div class="tag"><a href="category.html">travel</a></div>
                                    <div class="tag cat_video"><a href="category.html">video</a></div>
                                    <div class="tag cat_party"><a href="category.html">party</a></div>
                                    <div class="tag"><a href="category.html">music</a></div>
                                    <div class="tag cat_world"><a href="category.html">world</a></div>
                                    <div class="tag"><a href="category.html">adventure</a></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Footer -->
        <footer class="footer">
            <div class="footer_social">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <ul class="footer_social_list d-flex flex-row align-items-center justify-content-center">
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
@include('elements.script_frontend')
</body>
</html>