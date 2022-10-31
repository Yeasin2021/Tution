

@extends('back-end.index')

@section('content')

<style>
/* Import Google Font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #43AFFC;
}
::selection{
  color: #fff;
  background: #43AFFC;
}
.wrapper{
  width: 400px;
  background: #fff;
  border-radius: 7px;
  box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.05);
}
.wrapper header{
  display: flex;
  font-size: 21px;
  font-weight: 500;
  color: #43AFFC;
  padding: 16px 15px;
  align-items: center;
  border-bottom: 1px solid #ccc;
}
header i{
  font-size: 0em;
  cursor: pointer;
  margin-right: 8px;
}
.wrapper.active header i{
  margin-left: 5px;
  font-size: 30px;
}
.wrapper .input-part{
  margin: 20px 25px 30px;
}
.wrapper.active .input-part{
  display: none;
}
.input-part .info-txt{
  display: none;
  font-size: 17px;
  text-align: center;
  padding: 12px 10px;
  border-radius: 7px;
  margin-bottom: 15px;
}
.input-part .info-txt.error{
  color: #721c24;
  display: block;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
}
.input-part .info-txt.pending{
  color: #0c5460;
  display: block;
  background: #d1ecf1;
  border: 1px solid #bee5eb;
}
.input-part :where(input, button){
  width: 100%;
  height: 55px;
  border: none;
  outline: none;
  font-size: 18px;
  border-radius: 7px;
}
.input-part input{
  text-align: center;
  padding: 0 15px;
  border: 1px solid #ccc;
}
.input-part input:is(:focus, :valid){
  border: 2px solid #43AFFC;
}
.input-part input::placeholder{
  color: #bfbfbf;
}
.input-part .separator{
  height: 1px;
  width: 100%;
  margin: 25px 0;
  background: #ccc;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
.separator::before{
  content: "or";
  color: #b3b3b3;
  font-size: 19px;
  padding: 0 15px;
  background: #fff;
}
.input-part button{
  color: #fff;
  cursor: pointer;
  background: #43AFFC;
  transition: 0.3s ease;
}
.input-part button:hover{
  background: #1d9ffc;
}

.wrapper .weather-part{
  display: none;
  margin: 30px 0 0;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.wrapper.active .weather-part{
  display: flex;
}
.weather-part img{
  max-width: 125px;
}
.weather-part .temp{
  display: flex;
  font-weight: 500;
  font-size: 72px;
}
.weather-part .temp .numb{
  font-weight: 600;
}
.weather-part .temp .deg{
  font-size: 40px;
  display: block;
  margin: 10px 5px 0 0;
}
.weather-part .weather{
  font-size: 21px;
  text-align: center;
  margin: -5px 20px 15px;
}
.weather-part .location{
  display: flex;
  font-size: 19px;
  padding: 0 20px;
  text-align: center;
  margin-bottom: 30px;
  align-items: flex-start;
}
.location i{
  font-size: 22px;
  margin: 4px 5px 0 0;
}
.weather-part .bottom-details{
  display: flex;
  width: 100%;
  justify-content: space-between;
  border-top: 1px solid #ccc;
}
.bottom-details .column{
  display: flex;
  width: 100%;
  padding: 15px 0;
  align-items: center;
  justify-content: center;
}
.column i{
  color: #5DBBFF;
  font-size: 40px;
}
.column.humidity{
  border-left: 1px solid #ccc;
}
.column .details{
  margin-left: 3px;
}
.details .temp, .humidity span{
  font-size: 18px;
  font-weight: 500;
  margin-top: -3px;
}
.details .temp .deg{
  margin: 0;
  font-size: 17px;
  padding: 0 2px 0 1px;
}
.column .details p{
  font-size: 14px;
  margin-top: -6px;
}
.humidity i{
  font-size: 37px;
}
</style>

<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-2">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                    <input type="checkbox" id="checkbox" />
                    <div class="slider round open_miniSide"></div>
                </label>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <div class="serach_button">
                                <i class="ti-search"></i>
                                <div class="serach_field-area d-flex align-items-center">
                                    <div class="search_inner">
                                        <form action="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search here..." />
                                            </div>
                                            <button class="close_search"><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="bell_notification_clicker" href="#">
                                <img src="{{ asset('back-end') }}/img/icon/bell.svg" alt="" />
                                <span>2</span>
                            </a>

                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/2.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Cool Marketing</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/4.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Awesome packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/3.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>what a packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/2.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Cool Marketing</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/4.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Awesome packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('back-end') }}/img/staf/3.png" alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>what a packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="CHATBOX_open" href="#"> <img src="{{ asset('back-end') }}/img/icon/msg.svg" alt="" /> <span>2</span> </a>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="{{ asset('back-end') }}/img/client_img.png" alt="#" />
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>Neurologist</p>
                                <h5>Dr. Robar Smith</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="#">My Profile </a>
                                <a href="#">Settings</a>
                                <a href="{{ route('logout') }}">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Dashboard</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Analytic</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                        <div class="page_date_button">
                            August 1, 2020 - August 31, 2020
                        </div>
                        <div class="dropdown common_bootstrap_button">
                            <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                action
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item f_s_16 f_w_600" href="#"> Download</a>
                                <a class="dropdown-item f_s_16 f_w_600" href="#"> Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="white_card mb_30 card_height_100">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Revenue</h3>
                            </div>
                            <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Day</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="marketchart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30 sales_card_wrapper">
                    <div class="white_card_header d-flex justify-content-end">
                        <button class="export_btn">Export</button>
                    </div>

                    <div class="sales_card_body">
                        <div class="single_sales">
                            <span>Paid Visit</span>
                            <h3>6550</h3>
                        </div>
                        <div class="single_sales">
                            <span>Total Visit</span>
                            <h3>5646,454</h3>
                        </div>
                        <div class="single_sales">
                            <span>Expence</span>
                            <h3>$650</h3>
                        </div>
                        <div class="single_sales">
                            <span>Commission</span>
                            <h3>$56</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30 social_media_card">
                    <div class="white_card_header">
                        <div class="main-title">
                            <h3 class="m-0">Social media</h3>
                            <span>About Your Social Popularity</span>
                        </div>
                    </div>
                    <div class="media_thumb ml_25">
                        <img src="{{ asset('back-end') }}/img/media.svg" alt="" />
                    </div>
                    <div class="media_card_body">
                        <div class="media_card_list">
                            <div class="single_media_card">
                                <span>Followers</span>
                                <h3>35.6 K</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Followers</span>
                                <h3>35.6 K</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Followers</span>
                                <h3>35.6 K</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Followers</span>
                                <h3>35.6 K</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Visitors by Browser</h3>
                                <span>15654 Visaitors</span>
                            </div>
                            <div class="float-lg-right float-none common_tab_btn justify-content-end">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Day</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="chart-currently"></div>
                        <div class="monthly_plan_wraper">
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('back-end') }}/img/crome.png" alt="" />
                                    </div>
                                    <div>
                                        <h5>Chrome Users</h5>
                                        <span>Today</span>
                                    </div>
                                </div>
                                <span class="brouser_btn">+2155</span>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('back-end') }}/img/safari.png" alt="" />
                                    </div>
                                    <div>
                                        <h5>Chrome Users</h5>
                                        <span>Today</span>
                                    </div>
                                </div>
                                <span class="brouser_btn">+54</span>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('back-end') }}/img/OBJECTS.png" alt="" />
                                    </div>
                                    <div>
                                        <h5>Chrome Users</h5>
                                        <span>Today</span>
                                    </div>
                                </div>
                                <span class="brouser_btn">+22</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="main-title">
                            <h3 class="m-0">Visitors by Device</h3>
                            <span>15654 Visaitors</span>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="card_container">
                            <div id="platform_type_dates_donut" style="height:280px"></div>
                        </div>
                        <div class="devices_btn text-center">
                            <a class="color_button color_button2" href="#">Android</a>
                            <a class="color_button" href="#">iphone</a>
                            <a class="color_button color_button3" href="#">Others</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Running Campain</h3>
                                        <span>Overview</span>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body QA_section">
                                <div class="QA_table">
                                    <table class="table lms_table_active2 p-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Campain</th>
                                                <th scope="col">Start Time</th>
                                                <th scope="col">Company</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="customer d-flex align-items-center">
                                                        <div class="social_media">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </div>
                                                        <div class="ml_18">
                                                            <h3 class="f_s_18 f_w_900 mb-0">Facebook Promotion</h3>
                                                            <span class="f_s_12 f_w_700 text_color_8">Unique Watch</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_900 mb-0">08:32</h3>
                                                        <span class="f_s_12 f_w_700 color_text_3">12.12.2022</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_800 mb-0">H&G Fashion</h3>
                                                        <span class="f_s_12 f_w_500 color_text_3">Fashion and design</span>
                                                    </div>
                                                </td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                    <a href="#" class="badge_active">Active</a>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="customer d-flex align-items-center">
                                                        <div class="social_media insta_bg">
                                                            <i class="fab fa-instagram"></i>
                                                        </div>
                                                        <div class="ml_18">
                                                            <h3 class="f_s_18 f_w_900 mb-0">Instagram</h3>
                                                            <span class="f_s_12 f_w_700 text_color_9">Unique Watch</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_900 mb-0">08:32</h3>
                                                        <span class="f_s_12 f_w_700 color_text_3">12.12.2022</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_800 mb-0">H&G Fashion</h3>
                                                        <span class="f_s_12 f_w_500 color_text_3">Fashion and design</span>
                                                    </div>
                                                </td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                    <a href="#" class="badge_active2">Posed</a>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="customer d-flex align-items-center">
                                                        <div class="social_media twitter_bg">
                                                            <i class="fab fa-twitter"></i>
                                                        </div>
                                                        <div class="ml_18">
                                                            <h3 class="f_s_18 f_w_900 mb-0">Twitter</h3>
                                                            <span class="f_s_12 f_w_700 text_color_10">Unique Watch</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_900 mb-0">08:32</h3>
                                                        <span class="f_s_12 f_w_700 color_text_3">12.12.2022</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_800 mb-0">H&G Fashion</h3>
                                                        <span class="f_s_12 f_w_500 color_text_3">Fashion and design</span>
                                                    </div>
                                                </td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                    <a href="#" class="badge_active3">Closed</a>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="customer d-flex align-items-center">
                                                        <div class="social_media youtube_bg">
                                                            <i class="fab fa-youtube"></i>
                                                        </div>
                                                        <div class="ml_18">
                                                            <h3 class="f_s_18 f_w_900 mb-0">Youtube</h3>
                                                            <span class="f_s_12 f_w_700 text_color_11">Summer Campain</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_900 mb-0">08:32</h3>
                                                        <span class="f_s_12 f_w_700 color_text_3">12.12.2022</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h3 class="f_s_18 f_w_800 mb-0">H&G Fashion</h3>
                                                        <span class="f_s_12 f_w_500 color_text_3">Fashion and design</span>
                                                    </div>
                                                </td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                    <a href="#" class="badge_active4">End soon</a>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 white_card_body pt_25">
                            <div class="project_complete">
                                <div class="single_pro d-flex">
                                    <div class="probox"></div>
                                    <div class="box_content">
                                        <h4>5685</h4>
                                        <span>Project completed</span>
                                    </div>
                                </div>
                                <div class="single_pro d-flex">
                                    <div class="probox blue_box"></div>
                                    <div class="box_content">
                                        <h4 class="bluish_text">5685</h4>
                                        <span class="grayis_text">Project completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Work List</h3>
                                <span>Todo</span>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body QA_section">
                        <div class="todo_wrapper">
                            <div class="single_todo d-flex justify-content-between align-items-center">
                                <div class="lodo_left d-flex align-items-center">
                                    <div class="bar_line mr_10"></div>
                                    <div class="todo_box">
                                        <label class="form-label primary_checkbox d-flex mr_10">
                                            <input type="checkbox" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="todo_head">
                                        <h5 class="f_s_18 f_w_900 mb-0">Assign market analysis</h5>
                                        <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                    </div>
                                </div>
                                <div class="lodo_right"><a href="#" class="badge_complete">Complete</a></div>
                            </div>
                            <div class="single_todo d-flex justify-content-between align-items-center">
                                <div class="lodo_left d-flex align-items-center">
                                    <div class="bar_line red_line mr_10"></div>
                                    <div class="todo_box">
                                        <label class="form-label primary_checkbox d-flex mr_10">
                                            <input type="checkbox" />
                                            <span class="checkmark red_check"></span>
                                        </label>
                                    </div>
                                    <div class="todo_head">
                                        <h5 class="f_s_18 f_w_900 mb-0">Assign market analysis</h5>
                                        <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                    </div>
                                </div>
                                <div class="lodo_right"><a href="#" class="mark_complete">Mark as completed</a></div>
                            </div>
                            <div class="single_todo d-flex justify-content-between align-items-center">
                                <div class="lodo_left d-flex align-items-center">
                                    <div class="bar_line red_line mr_10"></div>
                                    <div class="todo_box">
                                        <label class="form-label primary_checkbox d-flex mr_10">
                                            <input type="checkbox" />
                                            <span class="checkmark red_check"></span>
                                        </label>
                                    </div>
                                    <div class="todo_head">
                                        <h5 class="f_s_18 f_w_900 mb-0">Assign market analysis</h5>
                                        <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                    </div>
                                </div>
                                <div class="lodo_right"><a href="#" class="mark_complete">Mark as completed</a></div>
                            </div>
                            <div class="single_todo d-flex justify-content-between align-items-center">
                                <div class="lodo_left d-flex align-items-center">
                                    <div class="bar_line mr_10"></div>
                                    <div class="todo_box">
                                        <label class="form-label primary_checkbox d-flex mr_10">
                                            <input type="checkbox" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="todo_head">
                                        <h5 class="f_s_18 f_w_900 mb-0">Assign market analysis</h5>
                                        <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                    </div>
                                </div>
                                <div class="lodo_right"><a href="#" class="badge_complete">Complete</a></div>
                            </div>
                            <div class="single_todo d-flex justify-content-between align-items-center">
                                <div class="lodo_left d-flex align-items-center">
                                    <div class="bar_line mr_10"></div>
                                    <div class="todo_box">
                                        <label class="form-label primary_checkbox d-flex mr_10">
                                            <input type="checkbox" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="todo_head">
                                        <h5 class="f_s_18 f_w_900 mb-0">Assign market analysis</h5>
                                        <p class="f_s_12 f_w_400 mb-0 text_color_8">Due 5 Days</p>
                                    </div>
                                </div>
                                <div class="lodo_right"><a href="#" class="badge_complete">Complete</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                {{-- <div class="white_card card_height_100 mb_20">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Visitors from country</h3>
                                <span>Visitors all over the world</span>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="world-map-markers" class="dashboard_w_map pb_20"></div>
                        <div class="world_list_wraper">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single_progressbar">
                                                <h6 class="f_s_14 f_w_400">USA</h6>
                                                <div id="bar4" class="barfiller">
                                                    <div class="tipWrap">
                                                        <span class="tip"></span>
                                                    </div>
                                                    <span class="fill" data-percentage="81"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single_progressbar">
                                                <h6>Australia</h6>
                                                <div id="bar5" class="barfiller">
                                                    <div class="tipWrap">
                                                        <span class="tip"></span>
                                                    </div>
                                                    <span class="fill" data-percentage="58"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single_progressbar">
                                                <h6>Brazil</h6>
                                                <div id="bar6" class="barfiller">
                                                    <div class="tipWrap">
                                                        <span class="tip"></span>
                                                    </div>
                                                    <span class="fill" data-percentage="42"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single_progressbar">
                                                <h6>Latvia</h6>
                                                <div id="bar7" class="barfiller">
                                                    <div class="tipWrap">
                                                        <span class="tip"></span>
                                                    </div>
                                                    <span class="fill" data-percentage="55"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <button type="button" onclick="showPosition();">Show My Position on Google Map</button> --}}
                <div id="embedMap" style="width: 600px; height: 500px;">
                    <!--Google map will be embedded here-->
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Recent Update</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="Activity_timeline">
                            <ul>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell bell_lite"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell bell_lite"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="date_picker_wrapper">
                        <div class="default-datepicker">
                            <div class="datepicker-here" data-language="en"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="weatcher_update_wrapper height_100">
                        <div class="row height_100">
                            {{-- <div class="col-lg-6">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Weather Update</h3>
                                    </div>
                                    <p id="test"></p>
                                </div>
                                <div class="weather_img_1 mt_30">
                                    <img class="img-fluid" src="{{ asset('back-end') }}/img/man.png" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="weather_img_2"></div>
                            </div> --}}

                            <div class="wrapper"  style="background-image: url('back-end/img/man.png'); background-repeat: no-repeat;">
                                <header><i class='bx bx-left-arrow-alt'></i>Weather App</header>
                                <section class="input-part">
                                  <p class="info-txt"></p>
                                  <div class="content">
                                    <input type="text" spellcheck="false" placeholder="Enter city name" required>
                                    {{-- <div class="separator"></div> --}}
                                    {{-- <button>Get Device Location</button> --}}
                                  </div>
                                </section>
                                <section class="weather-part">
                                  <img src="" alt="Weather Icon">
                                  <div class="temp">
                                    <span class="numb">_</span>
                                    <span class="deg">°</span>C
                                  </div>
                                  <div class="weather">_ _</div>
                                  <div class="location">
                                    <i class='bx bx-map'></i>
                                    <span>_, _</span>
                                  </div>
                                  <div class="bottom-details">
                                    <div class="column feels">
                                      <i class='bx bxs-thermometer'></i>
                                      <div class="details">
                                        <div class="temp">
                                          <span class="numb-2">_</span>
                                          <span class="deg">°</span>C
                                        </div>
                                        <p>Feels like</p>
                                      </div>
                                    </div>
                                    <div class="column humidity">
                                      <i class='bx bxs-droplet-half'></i>
                                      <div class="details">
                                        <span>_</span>
                                        <p>Humidity</p>
                                      </div>
                                    </div>
                                  </div>
                                </section>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // document.getElementById('test').innerHTML = "Wow Its working !!!";

    // fetch('https://api.openweathermap.org/data/2.5/weather?lat=23.774616 &lon=90.423777 &appid=c6987ccb58e23f933b7771e368619ac7')
    // .then((response) => response.json())
    // .then((json) => console.log(json))

const wrapper = document.querySelector(".wrapper"),
inputPart = document.querySelector(".input-part"),
infoTxt = inputPart.querySelector(".info-txt"),
inputField = inputPart.querySelector("input"),
locationBtn = inputPart.querySelector("button"),
weatherPart = wrapper.querySelector(".weather-part"),
wIcon = weatherPart.querySelector("img"),
arrowBack = wrapper.querySelector("header i");

let api;

inputField.addEventListener("keyup", e =>{
    // if user pressed enter btn and input value is not empty
    if(e.key == "Enter" && inputField.value != ""){
        requestApi(inputField.value);
    }
});

// locationBtn.addEventListener("click", () =>{
//     if(navigator.geolocation){ // if browser support geolocation api
//         navigator.geolocation.getCurrentPosition(onSuccess, onError);
//     }else{
//         alert("Your browser not support geolocation api");
//     }
// });


// window.onload = "getWeather();"
 function getWeather(){
    if(navigator.geolocation){ // if browser support geolocation api
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }else{
        alert("Your browser not support geolocation api");
    }
}

function requestApi(city){
    api = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=c6987ccb58e23f933b7771e368619ac7`;
    fetchData();
}

function onSuccess(position){
    const {latitude, longitude} = position.coords; // getting lat and lon of the user device from coords obj
    api = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&appid=c6987ccb58e23f933b7771e368619ac7`;
    fetchData();
}

function onError(error){
    // if any error occur while getting user location then we'll show it in infoText
    infoTxt.innerText = error.message;
    infoTxt.classList.add("error");
}

function fetchData(){
    infoTxt.innerText = "Getting weather details...";
    infoTxt.classList.add("pending");
    // getting api response and returning it with parsing into js obj and in another
    // then function calling weatherDetails function with passing api result as an argument
    fetch(api).then(res => res.json()).then(result => weatherDetails(result)).catch(() =>{
        infoTxt.innerText = "Something went wrong";
        infoTxt.classList.replace("pending", "error");
    });
}

function weatherDetails(info){
    if(info.cod == "404"){ // if user entered city name isn't valid
        infoTxt.classList.replace("pending", "error");
        infoTxt.innerText = `${inputField.value} isn't a valid city name`;
    }else{
        //getting required properties value from the whole weather information
        const city = info.name;
        const country = info.sys.country;
        const {description, id} = info.weather[0];
        const {temp, feels_like, humidity} = info.main;

        // using custom weather icon according to the id which api gives to us
        if(id == 800){
            wIcon.src = "icons/clear.svg";
        }else if(id >= 200 && id <= 232){
            wIcon.src = "back-end/img/weather-icon/storm.svg";
        }else if(id >= 600 && id <= 622){
            wIcon.src = "back-end/img/weather-icon/snow.svg";
        }else if(id >= 701 && id <= 781){
            wIcon.src = "back-end/img/weather-icon/haze.svg";
        }else if(id >= 801 && id <= 804){
            wIcon.src = "back-end/img/weather-icon/cloud.svg";
        }else if((id >= 500 && id <= 531) || (id >= 300 && id <= 321)){
            wIcon.src = "back-end/img/weather-icon/rain.svg";
        }

        //passing a particular weather info to a particular element
        weatherPart.querySelector(".temp .numb").innerText = Math.floor(temp);
        weatherPart.querySelector(".weather").innerText = description;
        weatherPart.querySelector(".location span").innerText = `${city}, ${country}`;
        weatherPart.querySelector(".temp .numb-2").innerText = Math.floor(feels_like);
        weatherPart.querySelector(".humidity span").innerText = `${humidity}%`;
        infoTxt.classList.remove("pending", "error");
        infoTxt.innerText = "";
        inputField.value = "";
        wrapper.classList.add("active");
    }
}

arrowBack.addEventListener("click", ()=>{
    wrapper.classList.remove("active");
});


</script>

@endsection
