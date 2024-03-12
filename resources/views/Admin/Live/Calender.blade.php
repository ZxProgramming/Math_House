@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Cancelation')
    @include('success')
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<div class="card ">
    <!--begin::Card header-->
    <div class="card-header">
        <h2 class="card-title fw-bold">
            Calendar
        </h2>

        <div class="card-toolbar">
            <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                <i class="ki-duotone ki-plus fs-2"></i> 
                Add Event
            </button>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Calendar-->
        <div id="kt_calendar_app" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">
            <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
            <div class="fc-toolbar-chunk">
            <div class="fc-button-group"><button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button fc-button fc-button-primary"><span class="fc-icon fc-icon-chevron-left"></span></button><button type="button" title="Next month" aria-pressed="false" class="fc-next-button fc-button fc-button-primary"><span class="fc-icon fc-icon-chevron-right"></span></button></div><button type="button" title="This month" aria-pressed="false" class="fc-today-button fc-button fc-button-primary" disabled="">today</button></div>
        <div class="fc-toolbar-chunk"><h2 class="fc-toolbar-title" id="fc-dom-1">March 2024</h2></div>
        <div class="fc-toolbar-chunk">
            <div class="fc-button-group"><button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active">month</button><button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button fc-button fc-button-primary">week</button><button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button fc-button fc-button-primary">day</button></div></div></div>
        <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 517.037px;">
            <div class="fc-daygrid fc-dayGridMonth-view fc-view"><table role="grid" class="fc-scrollgrid  fc-scrollgrid-liquid"><thead role="rowgroup"><tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header "><th role="presentation">
            <div class="fc-scroller-harness">
            <div class="fc-scroller" style="overflow: hidden;"><table role="presentation" class="fc-col-header " style="width: 696px;"><colgroup></colgroup><thead role="presentation"><tr role="row"><th role="columnheader" class="fc-col-header-cell fc-day fc-day-sun">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Sunday" class="fc-col-header-cell-cushion ">Sun</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Monday" class="fc-col-header-cell-cushion ">Mon</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-tue">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Tuesday" class="fc-col-header-cell-cushion ">Tue</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Wednesday" class="fc-col-header-cell-cushion ">Wed</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-thu">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Thursday" class="fc-col-header-cell-cushion ">Thu</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-fri">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Friday" class="fc-col-header-cell-cushion ">Fri</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-sat">
            <div class="fc-scrollgrid-sync-inner"><a aria-label="Saturday" class="fc-col-header-cell-cushion ">Sat</a></div></th></tr></thead></table></div></div></th></tr></thead><tbody role="rowgroup"><tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid"><td role="presentation">
            <div class="fc-scroller-harness fc-scroller-harness-liquid">
            <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;">
            <div class="fc-daygrid-body fc-daygrid-body-balanced " style="width: 696px;"><table role="presentation" class="fc-scrollgrid-sync-table" style="width: 696px; height: 472px;"><colgroup></colgroup><tbody role="presentation"><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2024-02-25" aria-labelledby="fc-dom-156">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-156" class="fc-daygrid-day-number" title="Go to February 25, 2024" data-navlink="" tabindex="0">25</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other" data-date="2024-02-26" aria-labelledby="fc-dom-158">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-158" class="fc-daygrid-day-number" title="Go to February 26, 2024" data-navlink="" tabindex="0">26</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other" data-date="2024-02-27" aria-labelledby="fc-dom-160">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-160" class="fc-daygrid-day-number" title="Go to February 27, 2024" data-navlink="" tabindex="0">27</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other" data-date="2024-02-28" aria-labelledby="fc-dom-162">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-162" class="fc-daygrid-day-number" title="Go to February 28, 2024" data-navlink="" tabindex="0">28</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other" data-date="2024-02-29" aria-labelledby="fc-dom-164">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-164" class="fc-daygrid-day-number" title="Go to February 29, 2024" data-navlink="" tabindex="0">29</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2024-03-01" aria-labelledby="fc-dom-166">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-166" class="fc-daygrid-day-number" title="Go to March 1, 2024" data-navlink="" tabindex="0">1</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past border-success bg-success text-inverse-success" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">All Day Event</div></div></div></div>
            <div class="fc-event-resizer fc-event-resizer-end"></div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2024-03-02" aria-labelledby="fc-dom-168">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-168" class="fc-daygrid-day-number" title="Go to March 2, 2024" data-navlink="" tabindex="0">2</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past border-info bg-info text-info-success" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">Company Trip</div></div></div></div>
            <div class="fc-event-resizer fc-event-resizer-end"></div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2024-03-03" aria-labelledby="fc-dom-170">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-170" class="fc-daygrid-day-number" title="Go to March 3, 2024" data-navlink="" tabindex="0">3</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -99.4219px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-light fc-event-solid-primary" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">ICT Expo 2021 - Product Release</div></div></div></div>
            <div class="fc-event-resizer fc-event-resizer-end"></div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 28px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2024-03-04" aria-labelledby="fc-dom-172">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-172" class="fc-daygrid-day-number" title="Go to March 4, 2024" data-navlink="" tabindex="0">4</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 28px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2024-03-05" aria-labelledby="fc-dom-174">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-174" class="fc-daygrid-day-number" title="Go to March 5, 2024" data-navlink="" tabindex="0">5</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2024-03-06" aria-labelledby="fc-dom-176">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-176" class="fc-daygrid-day-number" title="Go to March 6, 2024" data-navlink="" tabindex="0">6</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2024-03-07" aria-labelledby="fc-dom-178">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-178" class="fc-daygrid-day-number" title="Go to March 7, 2024" data-navlink="" tabindex="0">7</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2024-03-08" aria-labelledby="fc-dom-180">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-180" class="fc-daygrid-day-number" title="Go to March 8, 2024" data-navlink="" tabindex="0">8</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2024-03-09" aria-labelledby="fc-dom-182">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-182" class="fc-daygrid-day-number" title="Go to March 9, 2024" data-navlink="" tabindex="0">9</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-danger" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">4p</div>
            <div class="fc-event-title">Repeating Event</div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2024-03-10" aria-labelledby="fc-dom-184">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-184" class="fc-daygrid-day-number" title="Go to March 10, 2024" data-navlink="" tabindex="0">10</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2024-03-11" aria-labelledby="fc-dom-186">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-186" class="fc-daygrid-day-number" title="Go to March 11, 2024" data-navlink="" tabindex="0">11</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-primary" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">Conference</div></div></div></div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-today " data-date="2024-03-12" aria-labelledby="fc-dom-188">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-188" class="fc-daygrid-day-number" title="Go to March 12, 2024" data-navlink="" tabindex="0">12</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-end fc-event-today fc-event-primary" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">Conference</div></div></div></div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">Dinner</div></div></div></div>
            <div class="fc-event-resizer fc-event-resizer-end"></div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">10:30a</div>
            <div class="fc-event-title">Meeting</div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-info" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">12p</div>
            <div class="fc-event-title">Lunch</div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-warning" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">2:30p</div>
            <div class="fc-event-title">Meeting</div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-info" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">5:30p</div>
            <div class="fc-event-title">Happy Hour</div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"><a class="fc-daygrid-more-link fc-more-link" title="Show 6 more events" aria-expanded="false" aria-controls="" tabindex="0">+6 more</a></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2024-03-13" aria-labelledby="fc-dom-190">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-190" class="fc-daygrid-day-number" title="Go to March 13, 2024" data-navlink="" tabindex="0">13</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-primary" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">12p</div>
            <div class="fc-event-title">Birthday Party</div></a></div>
            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="visibility: hidden; top: 0px; left: 0px; right: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-solid-danger fc-event-light" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">6p</div>
            <div class="fc-event-title">Dinner</div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"><a class="fc-daygrid-more-link fc-more-link" title="Show 2 more events" aria-expanded="false" aria-controls="" tabindex="0">+2 more</a></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2024-03-14" aria-labelledby="fc-dom-192">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-192" class="fc-daygrid-day-number" title="Go to March 14, 2024" data-navlink="" tabindex="0">14</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future border-warning bg-warning text-inverse-success" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">1:30p</div>
            <div class="fc-event-title">Reporting</div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2024-03-15" aria-labelledby="fc-dom-194">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-194" class="fc-daygrid-day-number" title="Go to March 15, 2024" data-navlink="" tabindex="0">15</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2024-03-16" aria-labelledby="fc-dom-196">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-196" class="fc-daygrid-day-number" title="Go to March 16, 2024" data-navlink="" tabindex="0">16</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future" tabindex="0">
            <div class="fc-daygrid-event-dot"></div>
            <div class="fc-event-time">4p</div>
            <div class="fc-event-title">Repeating Event</div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2024-03-17" aria-labelledby="fc-dom-198">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-198" class="fc-daygrid-day-number" title="Go to March 17, 2024" data-navlink="" tabindex="0">17</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2024-03-18" aria-labelledby="fc-dom-200">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-200" class="fc-daygrid-day-number" title="Go to March 18, 2024" data-navlink="" tabindex="0">18</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2024-03-19" aria-labelledby="fc-dom-202">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-202" class="fc-daygrid-day-number" title="Go to March 19, 2024" data-navlink="" tabindex="0">19</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2024-03-20" aria-labelledby="fc-dom-204">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-204" class="fc-daygrid-day-number" title="Go to March 20, 2024" data-navlink="" tabindex="0">20</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2024-03-21" aria-labelledby="fc-dom-206">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-206" class="fc-daygrid-day-number" title="Go to March 21, 2024" data-navlink="" tabindex="0">21</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2024-03-22" aria-labelledby="fc-dom-208">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-208" class="fc-daygrid-day-number" title="Go to March 22, 2024" data-navlink="" tabindex="0">22</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2024-03-23" aria-labelledby="fc-dom-210">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-210" class="fc-daygrid-day-number" title="Go to March 23, 2024" data-navlink="" tabindex="0">23</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2024-03-24" aria-labelledby="fc-dom-212">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-212" class="fc-daygrid-day-number" title="Go to March 24, 2024" data-navlink="" tabindex="0">24</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2024-03-25" aria-labelledby="fc-dom-214">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-214" class="fc-daygrid-day-number" title="Go to March 25, 2024" data-navlink="" tabindex="0">25</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2024-03-26" aria-labelledby="fc-dom-216">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-216" class="fc-daygrid-day-number" title="Go to March 26, 2024" data-navlink="" tabindex="0">26</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2024-03-27" aria-labelledby="fc-dom-218">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-218" class="fc-daygrid-day-number" title="Go to March 27, 2024" data-navlink="" tabindex="0">27</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2024-03-28" aria-labelledby="fc-dom-220">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-220" class="fc-daygrid-day-number" title="Go to March 28, 2024" data-navlink="" tabindex="0">28</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-solid-info fc-event-light" tabindex="0">
            <div class="fc-event-main">
            <div class="fc-event-main-frame">
            <div class="fc-event-title-container">
            <div class="fc-event-title fc-sticky">Site visit</div></div></div></div>
            <div class="fc-event-resizer fc-event-resizer-end"></div></a></div>
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2024-03-29" aria-labelledby="fc-dom-222">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-222" class="fc-daygrid-day-number" title="Go to March 29, 2024" data-navlink="" tabindex="0">29</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2024-03-30" aria-labelledby="fc-dom-224">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-224" class="fc-daygrid-day-number" title="Go to March 30, 2024" data-navlink="" tabindex="0">30</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2024-03-31" aria-labelledby="fc-dom-72">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-72" class="fc-daygrid-day-number" title="Go to March 31, 2024" data-navlink="" tabindex="0">31</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2024-04-01" aria-labelledby="fc-dom-74">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-74" class="fc-daygrid-day-number" title="Go to April 1, 2024" data-navlink="" tabindex="0">1</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2024-04-02" aria-labelledby="fc-dom-76">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-76" class="fc-daygrid-day-number" title="Go to April 2, 2024" data-navlink="" tabindex="0">2</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2024-04-03" aria-labelledby="fc-dom-78">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-78" class="fc-daygrid-day-number" title="Go to April 3, 2024" data-navlink="" tabindex="0">3</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2024-04-04" aria-labelledby="fc-dom-80">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-80" class="fc-daygrid-day-number" title="Go to April 4, 2024" data-navlink="" tabindex="0">4</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2024-04-05" aria-labelledby="fc-dom-82">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-82" class="fc-daygrid-day-number" title="Go to April 5, 2024" data-navlink="" tabindex="0">5</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div>
            <div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2024-04-06" aria-labelledby="fc-dom-84">
            <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
            <div class="fc-daygrid-day-top"><a id="fc-dom-84" class="fc-daygrid-day-number" title="Go to April 6, 2024" data-navlink="" tabindex="0">6</a></div>
            <div class="fc-daygrid-day-events">
            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr></tbody></table></div></div></div></td></tr></tbody></table></div></div></div>
        <!--end::Calendar-->
    </div>
    <!--end::Card body-->
</div>
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('assets/js/custom/apps/calendar/calendar.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

</x-default-layout>