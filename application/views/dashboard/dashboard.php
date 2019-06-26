 <section data-brackets-id='320'>
        <div data-brackets-id='321' class="container-fluid">
            <!-- Page Header-->
            <header data-brackets-id='322'>
                <!-- <h1 class="h3 display">Tables</h1> -->
            </header>
            <div data-brackets-id='323' class="row">
                <div data-brackets-id='324' class="col-lg-6">
                    <div data-brackets-id='325' class="card">
                        <div data-brackets-id='326' class="card-header text-center">
                            <h4 data-brackets-id='327'>Market place</h4>
                        </div>
                        <div data-brackets-id='328' class="card-body">
                            <div data-brackets-id='329' id="container1"
                                 style="width: 99%; height: 300px; margin: 0 auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div data-brackets-id='330' class="col-lg-6">
                    <div data-brackets-id='331' class="card">
                        <div data-brackets-id='332' class="card-header text-center">
                            <h4 data-brackets-id='333'>Gender</h4>
                        </div>
                        <div data-brackets-id='334' class="card-body">
                            <div data-brackets-id='335' id="container2"
                                 style="width: 99%; height: 300px; margin: 0 auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div data-brackets-id='336' class="col-lg-6">
                    <div data-brackets-id='337' class="card">
                        <div data-brackets-id='338' class="card-header text-center">
                            <h4 data-brackets-id='339'>Freelancers earnings</h4>
                        </div>
                        <div data-brackets-id='340' class="card-body">
                            <div data-brackets-id='341' id="container3"
                                 style="width: 99%; height: 300px; margin: 0 auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div data-brackets-id='342' class="col-lg-6">
                    <div data-brackets-id='343' class="card">
                        <div data-brackets-id='344' class="card-header text-center">
                            <h4 data-brackets-id='345'>Course type</h4>
                        </div>
                        <div data-brackets-id='346' class="card-body">
                            <div data-brackets-id='347' id="container4"
                                 style="width: 99%; height: 300px; margin: 0 auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- high charts -->
 <script data-brackets-id='358' src="<?php echo base_url('assets/js/dashboard/highcharts.js'); ?>"></script>
 <!-- high charts -->
 <script>
     // Build the chart
     Highcharts.chart('container1', {
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             type: 'pie'
         },
         title: {
             text: ''
         },
         tooltip: {
             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: false
                 },
                 showInLegend: true
             }
         },
         series: [{
             name: 'Brands',
             colorByPoint: true,
             data: [{
                 name: 'Fiverr',
                 y: <?php echo $marketplace_freelancers[0]; ?>,
                 sliced: true,
                 selected: true,
                 color: '#48b7b6'
             }, {
                 name: 'People Per Hour',
                 y: <?php echo $marketplace_freelancers[2]; ?>,
                 color:'#f48f30'
             }, {
                 name: 'Upwork',
                 y: <?php echo $marketplace_freelancers[1]; ?>,
                 color: '#adb824'
             }, {
                 name: 'Freelancer',
                 y: <?php echo $marketplace_freelancers[3]; ?>,
                 color: '#a01f5d'
             }]
         }]
     });
     // Build the chart
     Highcharts.chart('container2', {
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             type: 'pie'
         },
         title: {
             text: ''
         },
         tooltip: {
             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: false
                 },
                 showInLegend: true
             }
         },
         series: [{
             name: 'Brands',
             colorByPoint: true,
             data: [{
                 name: 'Male',
                 y: <?php echo $calculation[0]; ?>,
                 sliced: true,
                 selected: true,
                 color: '#3DB5AD'
             }, {
                 name: 'Female',
                 y: <?php echo $calculation[1]; ?>,
                 color:'#ED5A51'
             }]
         }]
     });



     // Create the chart
     Highcharts.chart('container3', {
         chart: {
             type: 'column'
         },
         title: {
             text: ''
         },
         subtitle: {
             text: ''
         },
         xAxis: {
             type: 'category'
         },
         yAxis: {
             title: {
                 text: 'Total percent market share'
             }

         },
         legend: {
             enabled: false
         },
         plotOptions: {
             series: {
                 borderWidth: 0,
                 dataLabels: {
                     enabled: true,
                     format: '{point.y:.1f}%'
                 }
             }
         },

         tooltip: {
             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
             pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
         },

         "series": [
             {
                 "name": "Browsers",
                 "colorByPoint": true,
                 "data": [
                     {
                         "name": "$ 0-500",
                         "y": <?php echo $marketplace_earnings[0]; ?>,
                         "drilldown": "Chrome"
                     },
                     {
                         "name": "$ 501-1000",
                         "y": <?php echo $marketplace_earnings[1]; ?>,
                         "drilldown": "Firefox"
                     },
                     {
                         "name": "$ 1001-2000",
                         "y": <?php echo $marketplace_earnings[2]; ?>,
                         "drilldown": "Internet Explorer"
                     },
                     {
                         "name": "$ 2000 +",
                         "y": <?php echo $marketplace_earnings[3]; ?>,
                         "drilldown": "Safari"
                     }
                 ]
             }
         ],
         "drilldown": {
             "series": [
                 {
                     "name": "Chrome",
                     "id": "Chrome",
                     "data": [
                         [
                             "v65.0",
                             0.1
                         ],
                         [
                             "v64.0",
                             1.3
                         ],
                         [
                             "v63.0",
                             53.02
                         ],
                         [
                             "v62.0",
                             1.4
                         ],
                         [
                             "v61.0",
                             0.88
                         ],
                         [
                             "v60.0",
                             0.56
                         ],
                         [
                             "v59.0",
                             0.45
                         ],
                         [
                             "v58.0",
                             0.49
                         ],
                         [
                             "v57.0",
                             0.32
                         ],
                         [
                             "v56.0",
                             0.29
                         ],
                         [
                             "v55.0",
                             0.79
                         ],
                         [
                             "v54.0",
                             0.18
                         ],
                         [
                             "v51.0",
                             0.13
                         ],
                         [
                             "v49.0",
                             2.16
                         ],
                         [
                             "v48.0",
                             0.13
                         ],
                         [
                             "v47.0",
                             0.11
                         ],
                         [
                             "v43.0",
                             0.17
                         ],
                         [
                             "v29.0",
                             0.26
                         ]
                     ]
                 },
                 {
                     "name": "Firefox",
                     "id": "Firefox",
                     "data": [
                         [
                             "v58.0",
                             1.02
                         ],
                         [
                             "v57.0",
                             7.36
                         ],
                         [
                             "v56.0",
                             0.35
                         ],
                         [
                             "v55.0",
                             0.11
                         ],
                         [
                             "v54.0",
                             0.1
                         ],
                         [
                             "v52.0",
                             0.95
                         ],
                         [
                             "v51.0",
                             0.15
                         ],
                         [
                             "v50.0",
                             0.1
                         ],
                         [
                             "v48.0",
                             0.31
                         ],
                         [
                             "v47.0",
                             0.12
                         ]
                     ]
                 },
                 {
                     "name": "Internet Explorer",
                     "id": "Internet Explorer",
                     "data": [
                         [
                             "v11.0",
                             6.2
                         ],
                         [
                             "v10.0",
                             0.29
                         ],
                         [
                             "v9.0",
                             0.27
                         ],
                         [
                             "v8.0",
                             0.47
                         ]
                     ]
                 },
                 {
                     "name": "Safari",
                     "id": "Safari",
                     "data": [
                         [
                             "v11.0",
                             3.39
                         ],
                         [
                             "v10.1",
                             0.96
                         ],
                         [
                             "v10.0",
                             0.36
                         ],
                         [
                             "v9.1",
                             0.54
                         ],
                         [
                             "v9.0",
                             0.13
                         ],
                         [
                             "v5.1",
                             0.2
                         ]
                     ]
                 }
             ]
         }
     });


     // Build the chart
     Highcharts.chart('container4', {
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             type: 'pie'
         },
         title: {
             text: ''
         },
         tooltip: {
             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: false
                 },
                 showInLegend: true
             }
         },
         series: [{
             name: 'Brands',
             colorByPoint: true,
             data: [{
                 name: 'Offline',
                 y: <?php echo $course_type[1]; ?>,
                 sliced: true,
                 selected: true,
                 color: '#48b7b6'
             }, {
                 name: 'Online',
                 y: <?php echo $course_type[0]; ?>,
                 color:'#f48f30'
             }]
         }]
     });
 </script>
