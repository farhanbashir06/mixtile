@extends('layout.admin') @section('style') <!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles--> @endsection

@section('script') <!--begin::Page Vendors(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.5"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.5"></script>
		<script src="assets/plugins/custom/gmaps/gmaps.js?v=7.0.5"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script>
			"use strict";

			// Class definition
			var KTWidgets = function() {
				// Private properties

				// General Controls
				var _initDaterangepicker = function() {
					if ($('#kt_dashboard_daterangepicker').length == 0) {
						return;
					}

					var picker = $('#kt_dashboard_daterangepicker');
					var start = moment();
					var end = moment();

					function cb(start, end, label) {
						var title = '';
						var range = '';

						if ((end - start) < 100 || label == 'Today') {
							title = 'Today:';
							range = start.format('MMM D');
						} else if (label == 'Yesterday') {
							title = 'Yesterday:';
							range = start.format('MMM D');
						} else {
							range = start.format('MMM D') + ' - ' + end.format('MMM D');
						}

						$('#kt_dashboard_daterangepicker_date').html(range);
						$('#kt_dashboard_daterangepicker_title').html(title);
					}

					picker.daterangepicker({
						direction: KTUtil.isRTL(),
						startDate: start,
						endDate: end,
						opens: 'left',
						applyClass: 'btn-primary',
						cancelClass: 'btn-light-primary',
						ranges: {
							'Today': [moment(), moment()],
							'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
							'Last 7 Days': [moment().subtract(6, 'days'), moment()],
							'Last 30 Days': [moment().subtract(29, 'days'), moment()],
							'This Month': [moment().startOf('month'), moment().endOf('month')],
							'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
						}
					}, cb);

					cb(start, end, '');
				}

				// Stats widgets
				var _initStatsWidget7 = function() {
					var element = document.getElementById("kt_stats_widget_7_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40]
						}],
						chart: {
							type: 'area',
							height: 150,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initStatsWidget8 = function() {
					var element = document.getElementById("kt_stats_widget_8_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40]
						}],
						chart: {
							type: 'area',
							height: 150,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['danger']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['danger']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initStatsWidget9 = function() {
					var element = document.getElementById("kt_stats_widget_9_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40]
						}],
						chart: {
							type: 'area',
							height: 150,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['primary']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['primary']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['primary']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['primary']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initStatsWidget10 = function() {
					var element = document.getElementById("kt_stats_widget_10_chart");
					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'info';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [40, 40, 30, 30, 35, 35, 50]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 55,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initStatsWidget11 = function() {
					var element = document.getElementById("kt_stats_widget_11_chart");

					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'success';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [40, 40, 30, 30, 35, 35, 50]
						}],
						chart: {
							type: 'area',
							height: 150,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 55,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initStatsWidget12 = function() {
					var element = document.getElementById("kt_stats_widget_12_chart");

					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [40, 40, 30, 30, 35, 35, 50]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 55,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				// Charts widgets
				var _initChartsWidget1 = function() {
					var element = document.getElementById("kt_charts_widget_1_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [44, 55, 57, 56, 61, 58]
						}, {
							name: 'Revenue',
							data: [76, 85, 101, 98, 87, 105]
						}],
						chart: {
							type: 'bar',
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['30%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 2,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							opacity: 1
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()['colors']['gray']['gray-300']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget2 = function() {
					var element = document.getElementById("kt_charts_widget_2_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [44, 55, 57, 56, 61, 58]
						}, {
							name: 'Revenue',
							data: [76, 85, 101, 98, 87, 105]
						}],
						chart: {
							type: 'bar',
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['30%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 2,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							opacity: 1
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['warning'], KTApp.getSettings()['colors']['gray']['gray-300']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget3 = function() {
					var element = document.getElementById("kt_charts_widget_3_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 40, 40, 90, 90, 70, 70]
						}],
						chart: {
							type: 'area',
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {

						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['info']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['theme']['base']['info'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['info']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						},
						markers: {
							//size: 5,
							//colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
							strokeColor: KTApp.getSettings()['colors']['theme']['base']['info'],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget4 = function() {
					var element = document.getElementById("kt_charts_widget_4_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [60, 50, 80, 40, 100, 60]
						}, {
							name: 'Revenue',
							data: [70, 60, 110, 40, 50, 70]
						}],
						chart: {
							type: 'area',
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth'
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['theme']['light']['success'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()['colors']['theme']['base']['warning']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						},
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['success'], KTApp.getSettings()['colors']['theme']['light']['warning']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['light']['success'], KTApp.getSettings()['colors']['theme']['light']['warning']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget5 = function() {
					var element = document.getElementById("kt_charts_widget_5_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [40, 50, 65, 70, 50, 30]
						}, {
							name: 'Revenue',
							data: [-30, -40, -55, -60, -40, -20]
						}],
						chart: {
							type: 'bar',
							stacked: true,
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['12%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 2,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: -80,
							max: 80,
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							opacity: 1
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['info'], KTApp.getSettings()['colors']['theme']['base']['primary']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget6 = function() {
					var element = document.getElementById("kt_charts_widget_6_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							type: 'bar',
							stacked: true,
							data: [40, 50, 65, 70, 50, 30]
						}, {
							name: 'Revenue',
							type: 'bar',
							stacked: true,
							data: [20, 20, 25, 30, 30, 20]
						}, {
							name: 'Expenses',
							type: 'area',
							data: [50, 80, 60, 90, 50, 70]
						}],
						chart: {
							stacked: true,
							height: 350,
							toolbar: {
								show: false
							}
						},
						plotOptions: {
							bar: {
								stacked: true,
								horizontal: false,
								endingShape: 'rounded',
								columnWidth: ['12%']
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 2,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							max: 120,
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							opacity: 1
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['info'], KTApp.getSettings()['colors']['theme']['base']['primary'], KTApp.getSettings()['colors']['theme']['light']['primary']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							},
							padding: {
								top: 0,
								right: 0,
								bottom: 0,
								left: 0
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget7 = function() {
					var element = document.getElementById("kt_charts_widget_7_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 30, 50, 50, 35, 35]
						}, {
							name: 'Revenue',
							data: [55, 20, 20, 20, 70, 70]
						}, {
							name: 'Expenses',
							data: [60, 60, 40, 40, 30, 30]
						}],
						chart: {
							type: 'area',
							height: 300,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 2,
							colors: [KTApp.getSettings()['colors']['theme']['base']['warning'], 'transparent', 'transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['warning'], KTApp.getSettings()['colors']['theme']['light']['info'], KTApp.getSettings()['colors']['gray']['gray-100']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							}
						},
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['warning'], KTApp.getSettings()['colors']['theme']['light']['info'], KTApp.getSettings()['colors']['gray']['gray-100']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['warning'], KTApp.getSettings()['colors']['theme']['base']['info'], KTApp.getSettings()['colors']['gray']['gray-500']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initChartsWidget8 = function() {
					var element = document.getElementById("kt_charts_widget_8_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 30, 50, 50, 35, 35]
						}, {
							name: 'Revenue',
							data: [55, 20, 20, 20, 70, 70]
						}, {
							name: 'Expenses',
							data: [60, 60, 40, 40, 30, 30]
						}, ],
						chart: {
							type: 'area',
							height: 300,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 2,
							colors: ['transparent', 'transparent', 'transparent']
						},
						xaxis: {
							x: 0,
							offsetX: 0,
							offsetY: 0,
							padding: {
								left: 0,
								right: 0,
								top: 0,
							},
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							y: 0,
							offsetX: 0,
							offsetY: 0,
							padding: {
								left: 0,
								right: 0
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['success'], KTApp.getSettings()['colors']['theme']['light']['danger'], KTApp.getSettings()['colors']['theme']['light']['info']],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							padding: {
								top: 0,
								bottom: 0,
								left: 0,
								right: 0
							}
						},
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['success'], KTApp.getSettings()['colors']['theme']['light']['danger'], KTApp.getSettings()['colors']['theme']['light']['info']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()['colors']['theme']['base']['danger'], KTApp.getSettings()['colors']['theme']['base']['info']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				// Mixed widgets
				var _initMixedWidget1 = function() {
					var element = document.getElementById("kt_mixed_widget_1_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var strokeColor = '#D13647';

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40, 40, 40]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							dropShadow: {
								enabled: true,
								enabledOnSeries: undefined,
								top: 5,
								left: 0,
								blur: 3,
								color: strokeColor,
								opacity: 0.5
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 0
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [strokeColor]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							}
						},
						yaxis: {
							min: 0,
							max: 80,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['transparent'],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
							strokeColor: [strokeColor],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget2 = function() {
					var element = document.getElementById("kt_mixed_widget_2_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var strokeColor = '#287ED7';

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40, 40, 40]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							dropShadow: {
								enabled: true,
								enabledOnSeries: undefined,
								top: 5,
								left: 0,
								blur: 3,
								color: strokeColor,
								opacity: 0.5
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 0
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [strokeColor]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 80,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['transparent'],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['info']],
							strokeColor: [strokeColor],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget3 = function() {
					var element = document.getElementById("kt_mixed_widget_3_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var strokeColor = KTApp.getSettings()['colors']['theme']['base']['white'];

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 45, 32, 70, 40, 40, 40]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							dropShadow: {
								enabled: true,
								enabledOnSeries: undefined,
								top: 5,
								left: 0,
								blur: 3,
								color: strokeColor,
								opacity: 0.3
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 0
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [strokeColor]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 80,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['transparent'],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['dark']],
							strokeColor: [strokeColor],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget4 = function() {
					var element = document.getElementById("kt_mixed_widget_4_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [35, 65, 75, 55, 45, 60, 55]
						}, {
							name: 'Revenue',
							data: [40, 70, 80, 60, 50, 65, 60]
						}],
						chart: {
							type: 'bar',
							height: height,
							toolbar: {
								show: false
							},
							sparkline: {
								enabled: true
							},
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['30%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 1,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 100,
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							type: ['solid', 'solid'],
							opacity: [0.25, 1]
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['#ffffff', '#ffffff'],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							},
							padding: {
								left: 20,
								right: 20
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget5 = function() {
					var element = document.getElementById("kt_mixed_widget_5_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [35, 65, 75, 55, 45, 60, 55]
						}, {
							name: 'Revenue',
							data: [40, 70, 80, 60, 50, 65, 60]
						}],
						chart: {
							type: 'bar',
							height: height,
							toolbar: {
								show: false
							},
							sparkline: {
								enabled: true
							},
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['30%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 1,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 100,
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							type: ['solid', 'solid'],
							opacity: [0.25, 1]
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['#ffffff', '#ffffff'],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							},
							padding: {
								left: 20,
								right: 20
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget6 = function() {
					var element = document.getElementById("kt_mixed_widget_6_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [35, 65, 75, 55, 45, 60, 55]
						}, {
							name: 'Revenue',
							data: [40, 70, 80, 60, 50, 65, 60]
						}],
						chart: {
							type: 'bar',
							height: height,
							toolbar: {
								show: false
							},
							sparkline: {
								enabled: true
							},
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['30%'],
								endingShape: 'rounded'
							},
						},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 1,
							colors: ['transparent']
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 100,
							labels: {
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						fill: {
							type: ['solid', 'solid'],
							opacity: [0.25, 1]
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['#ffffff', '#ffffff'],
						grid: {
							borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
							strokeDashArray: 4,
							yaxis: {
								lines: {
									show: true
								}
							},
							padding: {
								left: 20,
								right: 20
							}
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget13 = function() {
					var element = document.getElementById("kt_mixed_widget_13_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 25, 45, 30, 55, 55]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['info']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 60,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['info']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['info']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['info']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget14 = function() {
					var element = document.getElementById("kt_mixed_widget_14_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [74],
						chart: {
							height: height,
							type: 'radialBar',
						},
						plotOptions: {
							radialBar: {
								hollow: {
									margin: 0,
									size: "65%"
								},
								dataLabels: {
									showOn: "always",
									name: {
										show: false,
										fontWeight: '700'
									},
									value: {
										color: KTApp.getSettings()['colors']['gray']['gray-700'],
										fontSize: "30px",
										fontWeight: '700',
										offsetY: 12,
										show: true
									}
								},
								track: {
									background: KTApp.getSettings()['colors']['theme']['light']['success'],
									strokeWidth: '100%'
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['success']],
						stroke: {
							lineCap: "round",
						},
						labels: ["Progress"]
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget15 = function() {
					var element = document.getElementById("kt_mixed_widget_15_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 30, 60, 25, 25, 40]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'gradient',
							opacity: 1,
							gradient: {

								type: "vertical",
								shadeIntensity: 0.5,
								gradientToColors: undefined,
								inverseColors: true,
								opacityFrom: 1,
								opacityTo: 0.375,
								stops: [25, 50, 100],
								colorStops: []
							}
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['danger']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 65,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['danger']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget16 = function() {
					var element = document.getElementById("kt_mixed_widget_16_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [60, 50, 75, 80],
						chart: {
							height: height,
							type: 'radialBar',
						},
						plotOptions: {
							radialBar: {
								hollow: {
									margin: 0,
									size: "30%"
								},
								dataLabels: {
									showOn: "always",
									name: {
										show: false,
										fontWeight: "700",
									},
									value: {
										color: KTApp.getSettings()['colors']['gray']['gray-700'],
										fontSize: "18px",
										fontWeight: "700",
										offsetY: 10,
										show: true
									},
									total: {
										show: true,
										label: 'Total',
										fontWeight: "bold",
										formatter: function (w) {
											// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
											return '60%';
										}
									}
								},
								track: {
									background: KTApp.getSettings()['colors']['gray']['gray-100'],
									strokeWidth: '100%'
								}
							}
						},
						colors: [
							KTApp.getSettings()['colors']['theme']['base']['info'],
							KTApp.getSettings()['colors']['theme']['base']['danger'],
							KTApp.getSettings()['colors']['theme']['base']['success'],
							KTApp.getSettings()['colors']['theme']['base']['primary']
						],
						stroke: {
							lineCap: "round",
						},
						labels: ["Progress"]
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget17 = function() {
					var element = document.getElementById("kt_mixed_widget_17_chart");
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'warning';
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [30, 25, 45, 30, 55, 55]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 60,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget18 = function() {
					var element = document.getElementById("kt_mixed_widget_18_chart");
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [74],
						chart: {
							height: height,
							type: 'radialBar',
							offsetY: 0
						},
						plotOptions: {
							radialBar: {
								startAngle: -90,
								endAngle: 90,

								hollow: {
									margin: 0,
									size: "70%"
								},
								dataLabels: {
									showOn: "always",
									name: {
										show: true,
										fontSize: "13px",
										fontWeight: "700",
										offsetY: -5,
										color: KTApp.getSettings()['colors']['gray']['gray-500']
									},
									value: {
										color: KTApp.getSettings()['colors']['gray']['gray-700'],
										fontSize: "30px",
										fontWeight: "700",
										offsetY: -40,
										show: true
									}
								},
								track: {
									background: KTApp.getSettings()['colors']['theme']['light']['primary'],
									strokeWidth: '100%'
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['base']['primary']],
						stroke: {
							lineCap: "round",
						},
						labels: ["Progress"]
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				// Tiles
				var _initTilesWidget1 = function() {
					var element = document.getElementById("kt_tiles_widget_1_chart");
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';
					var height = parseInt(KTUtil.css(element, 'height'));

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [20, 22, 30, 28, 25, 26, 30, 28, 22, 24, 25, 35]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'gradient',
							opacity: 1,
							gradient: {

								type: "vertical",
								shadeIntensity: 0.55,
								gradientToColors: undefined,
								inverseColors: true,
								opacityFrom: 1,
								opacityTo: 0.2,
								stops: [25, 50, 100],
								colorStops: []
							}
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 37,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						},
						padding: {
							top: 0,
							bottom: 0
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initTilesWidget2 = function() {
					var element = document.getElementById("kt_tiles_widget_2_chart");

					if (!element) {
						return;
					}

					var strokeColor = KTUtil.colorDarken(KTApp.getSettings()['colors']['theme']['base']['danger'], 20);
					var fillColor = KTUtil.colorDarken(KTApp.getSettings()['colors']['theme']['base']['danger'], 10);

					var options = {
						series: [{
							name: 'Net Profit',
							data: [10, 10, 20, 20, 12, 12]
						}],
						chart: {
							type: 'area',
							height: 75,
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							padding: {
								top: 0,
								bottom: 0
							}
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [strokeColor]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							}
						},
						yaxis: {
							min: 0,
							max: 22,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							fixed: {
								enabled: false
							},
							x: {
								show: false
							},
							y: {
								title: {
									formatter: function (val) {
										return val + "";
									}
								}
							}
						},
						colors: [fillColor],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
							strokeColor: [strokeColor],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initTilesWidget5 = function() {
					var element = document.getElementById("kt_tiles_widget_5_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [10, 15, 18, 14]
						}, {
							name: 'Revenue',
							data: [8, 13, 16, 12]
						}],
						chart: {
							type: 'bar',
							height: 75,
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							padding: {
								left: 20,
								right: 20
							}
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: ['25%'],
								endingShape: 'rounded'
							},
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: ['solid', 'gradient'],
							opacity: 0.25
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May']
						},
						yaxis: {
							min: 0,
							max: 20
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							fixed: {
								enabled: false
							},
							x: {
								show: false
							},
							y: {
								title: {
									formatter: function (val) {
										return val + "";
									}
								}
							},
							marker: {
								show: false
							}
						},
						colors: ['#ffffff', '#ffffff']
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initTilesWidget8 = function() {
					var element = document.getElementById("kt_tiles_widget_8_chart");
					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'danger';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [20, 20, 30, 15, 40, 30]
						}],
						chart: {
							type: 'area',
							height: 150,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid'
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 45,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						},
						padding: {
							top: 0,
							bottom: 0
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initTilesWidget17 = function() {
					var element = document.getElementById("kt_tiles_widget_17_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [10, 20, 20, 8]
						}],
						chart: {
							type: 'area',
							height: 150,
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							},
							padding: {
								top: 0,
								bottom: 0
							}
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							}
						},
						yaxis: {
							min: 0,
							max: 22,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							fixed: {
								enabled: false
							},
							x: {
								show: false
							},
							y: {
								title: {
									formatter: function (val) {
										return val + "";
									}
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initTilesWidget20 = function() {
					var element = document.getElementById("kt_tiles_widget_20_chart");

					if (!element) {
						return;
					}

					var options = {
						series: [74],
						chart: {
							height: 250,
							type: 'radialBar',
							offsetY: 0
						},
						plotOptions: {
							radialBar: {
								startAngle: -90,
								endAngle: 90,

								hollow: {
									margin: 0,
									size: "70%"
								},
								dataLabels: {
									showOn: "always",
									name: {
										show: true,
										fontSize: "13px",
										fontWeight: "400",
										offsetY: -5,
										color: KTApp.getSettings()['colors']['gray']['gray-300']
									},
									value: {
										color: KTApp.getSettings()['colors']['theme']['inverse']['primary'],
										fontSize: "22px",
										fontWeight: "bold",
										offsetY: -40,
										show: true
									}
								},
								track: {
									background: KTUtil.colorLighten(KTApp.getSettings()['colors']['theme']['base']['primary'], 7),
									strokeWidth: '100%'
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['inverse']['primary']],
						stroke: {
							lineCap: "round",
						},
						labels: ["Progress"]
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget21 = function() {
					var element = document.getElementById("kt_tiles_widget_21_chart");
					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'info';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [20, 20, 30, 15, 30, 30]
						}],
						chart: {
							type: 'area',
							height: height,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 32,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				var _initMixedWidget23 = function() {
					var element = document.getElementById("kt_tiles_widget_23_chart");
					var height = parseInt(KTUtil.css(element, 'height'));
					var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';

					if (!element) {
						return;
					}

					var options = {
						series: [{
							name: 'Net Profit',
							data: [15, 25, 15, 40, 20, 50]
						}],
						chart: {
							type: 'area',
							height: 125,
							toolbar: {
								show: false
							},
							zoom: {
								enabled: false
							},
							sparkline: {
								enabled: true
							}
						},
						plotOptions: {},
						legend: {
							show: false
						},
						dataLabels: {
							enabled: false
						},
						fill: {
							type: 'solid',
							opacity: 1
						},
						stroke: {
							curve: 'smooth',
							show: true,
							width: 3,
							colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
						},
						xaxis: {
							categories: ['Jan, 2020', 'Feb, 2020', 'Mar, 2020', 'Apr, 2020', 'May, 2020', 'Jun, 2020'],
							axisBorder: {
								show: false,
							},
							axisTicks: {
								show: false
							},
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							},
							crosshairs: {
								show: false,
								position: 'front',
								stroke: {
									color: KTApp.getSettings()['colors']['gray']['gray-300'],
									width: 1,
									dashArray: 3
								}
							},
							tooltip: {
								enabled: true,
								formatter: undefined,
								offsetY: 0,
								style: {
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						yaxis: {
							min: 0,
							max: 55,
							labels: {
								show: false,
								style: {
									colors: KTApp.getSettings()['colors']['gray']['gray-500'],
									fontSize: '12px',
									fontFamily: KTApp.getSettings()['font-family']
								}
							}
						},
						states: {
							normal: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							hover: {
								filter: {
									type: 'none',
									value: 0
								}
							},
							active: {
								allowMultipleDataPointsSelection: false,
								filter: {
									type: 'none',
									value: 0
								}
							}
						},
						tooltip: {
							style: {
								fontSize: '12px',
								fontFamily: KTApp.getSettings()['font-family']
							},
							y: {
								formatter: function(val) {
									return "$" + val + " thousands"
								}
							}
						},
						colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
						markers: {
							colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
							strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
							strokeWidth: 3
						}
					};

					var chart = new ApexCharts(element, options);
					chart.render();
				}

				// Forms
				var _initFormsWidget1 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_1_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget2 = function() {
					var formEl = KTUtil.getById("kt_forms_widget_2_form");
					var editorId = 'kt_forms_widget_2_editor';

					// init editor
					var options = {
						modules: {
							toolbar: {
								container: "#kt_forms_widget_2_editor_toolbar"
							}
						},
						placeholder: 'Type message...',
						theme: 'snow'
					};

					if (!formEl) {
						return;
					}

					// Init editor
					var editorObj = new Quill('#' + editorId, options);
				}

				var _initFormsWidget3 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_3_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget4 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_4_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget5 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_5_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget6 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_6_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget7 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_7_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget8 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_8_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget9 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_9_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget10 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_10_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget11 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_11_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				var _initFormsWidget12 = function() {
					var inputEl = KTUtil.getById("kt_forms_widget_12_input");

					if (inputEl) {
						autosize(inputEl);
					}
				}

				// Advance Tables
				var _initAdvancedTableGroupSelection = function(element) {
					var table = KTUtil.getById(element);

					KTUtil.on(table, 'thead th .checkbox > input', 'change', function(e) {
						var checkboxes = KTUtil.findAll(table, 'tbody td .checkbox > input');

						for (var i = 0, len = checkboxes.length; i < len; i++) {
							checkboxes[i].checked = this.checked;
						}
					});
				}

				// Education Show More Demo
				var _initEducationShowMoreBtn = function() {
					var el = KTUtil.getById('kt_app_education_more_feeds_btn');

					KTUtil.addEvent(el, 'click', function(e) {
						var elements = document.getElementsByClassName('education-more-feeds');

						if (!elements || elements.length <= 0) {
							return;
						}

						KTUtil.btnWait(el, 'spinner spinner-right spinner-white pr-15', 'Please wait...', true);

						setTimeout(function() {
							KTUtil.btnRelease(el);
							KTUtil.addClass(el, 'd-none');

							var item;

							for (var i = 0, len = elements.length; i < len; i++) {
								item = elements[0];
								KTUtil.removeClass(elements[i], 'd-none');

								var textarea = KTUtil.find(item, 'textarea');
								if (textarea) {
									autosize(textarea);
								}
							}

							KTUtil.scrollTo(item);
						}, 1000);
					});
				}

				// Public methods
				return {
					init: function() {
						// General Controls
						_initDaterangepicker();

						// Stats Widgets
						_initStatsWidget7();
						_initStatsWidget8();
						_initStatsWidget9();
						_initStatsWidget10();
						_initStatsWidget11();
						_initStatsWidget12();

						// Charts Widgets
						_initChartsWidget1();
						_initChartsWidget2();
						_initChartsWidget3();
						_initChartsWidget4();
						_initChartsWidget5();
						_initChartsWidget6();
						_initChartsWidget7();
						_initChartsWidget8();

						// Mixed Widgets
						_initMixedWidget1();
						_initMixedWidget2();
						_initMixedWidget3();
						_initMixedWidget4();
						_initMixedWidget5();
						_initMixedWidget6();
						_initMixedWidget13();
						_initMixedWidget14();
						_initMixedWidget15();
						_initMixedWidget16();
						_initMixedWidget17();
						_initMixedWidget18();

						// Tiles Widgets
						_initTilesWidget1();
						_initTilesWidget2();
						_initTilesWidget5();
						_initTilesWidget8();
						_initTilesWidget17();
						_initTilesWidget20();
						_initMixedWidget21();
						_initMixedWidget23();

						// Table Widgets
						_initAdvancedTableGroupSelection('kt_advance_table_widget_1');
						_initAdvancedTableGroupSelection('kt_advance_table_widget_2');
						_initAdvancedTableGroupSelection('kt_advance_table_widget_3');
						_initAdvancedTableGroupSelection('kt_advance_table_widget_4');

						// Forms widgets
						_initFormsWidget1();
						_initFormsWidget2();
						_initFormsWidget3();
						_initFormsWidget4();
						_initFormsWidget5();
						_initFormsWidget6();
						_initFormsWidget7();
						_initFormsWidget8();
						_initFormsWidget9();
						_initFormsWidget10();
						_initFormsWidget11();

						// Education App
						_initEducationShowMoreBtn();
					}
				}
			}();

			// Webpack support
			if (typeof module !== 'undefined') {
				module.exports = KTWidgets;
			}

			jQuery(document).ready(function() {
				KTWidgets.init();
			});

		</script>
		<!--end::Page Scripts-->
@endsection

@section('content') <!--begin::Subheader-->
						<div class="subheader py-5 py-lg-10 gutter-b subheader-transparent" id="kt_subheader" style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image:url({{asset('assets/media/svg/patterns/taieri.svg')}})">
							<div class="container d-flex flex-column">
								<!--begin::Title-->
								<div class="d-flex align-items-sm-end flex-column flex-sm-row mb-5">
									<h2 class="text-white mr-5 mb-0">Search Job</h2>
									<span class="text-white opacity-60 font-weight-bold">Job Management System</span>
								</div>
								<!--end::Title-->
								<!--begin::Search Bar-->
								<div class="d-flex align-items-md-center mb-2 flex-column flex-md-row">
									<div class="bg-white rounded p-4 d-flex flex-grow-1 flex-sm-grow-0">
										<!--begin::Form-->
										<form class="form d-flex align-items-md-center flex-sm-row flex-column flex-grow-1 flex-sm-grow-0">
											<!--begin::Input-->
											<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
												<span class="svg-icon svg-icon-lg">
													<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Job Title" />
											</div>
											<!--end::Input-->
											<!--begin::Input-->
											<span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
											<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
												<span class="svg-icon svg-icon-lg">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
															<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="kt_searchbar_7_category-options" data-offset="0,10" readonly="readonly" />
												<div id="kt_searchbar_7_category-options" class="dropdown-menu dropdown-menu-sm">
													<div class="dropdown-item cursor-pointer">HR Management</div>
													<div class="dropdown-item cursor-pointer">Developers</div>
													<div class="dropdown-item cursor-pointer">Creative</div>
													<div class="dropdown-divider"></div>
													<div class="dropdown-item cursor-pointer">Top Management</div>
												</div>
											</div>
											<!--end::Input-->
											<!--begin::Input-->
											<span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
											<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
												<span class="svg-icon svg-icon-lg">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Rec.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<input id="kt_subheader_7_location" type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Location" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target="#subheader7Modal" readonly="readonly" />
											</div>
											<!--end::Input-->
											<button type="submit" class="btn btn-dark font-weight-bold btn-hover-light-primary mt-3 mt-sm-0 px-7">Search</button>
										</form>
										<!--end::Form-->
									</div>
									<!--begin::Advanced Search-->
									<div class="mt-4 my-md-0 mx-md-10">
										<a href="#" class="text-white font-weight-bolder text-hover-primary">Advanced Search</a>
									</div>
									<!--end::Advanced Search-->
								</div>
								<!--end::Search Bar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Modal-->
						<div class="modal fade" id="subheader7Modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Select Location</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<i aria-hidden="true" class="ki ki-close"></i>
										</button>
									</div>
									<div class="modal-body">
										<div id="kt_subheader_leaflet" style="height:450px; width: 100%;"></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
										<button id="submit" type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Apply</button>
									</div>
								</div>
							</div>
						</div>
						<!--end::Modal-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container-fluid">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-6 col-xxl-4">
										<!--begin::Mixed Widget 1-->
										<div class="card card-custom bg-gray-100 card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title font-weight-bolder text-white">Sales Stat</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Sales</a>
														</div>
														<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
														</div>
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row m-0">
														<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item Orders</a>
														</div>
														<div class="col bg-light-success px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
																		<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
															<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug Reports</a>
														</div>
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 1-->
									</div>
									<div class="col-lg-6 col-xxl-4">
										<!--begin::List Widget 9-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">My Activity</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<div class="timeline timeline-5 mt-3">
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Outlines keep you honest. And keep structure</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Content-->
														<div class="timeline-content d-flex">
															<span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
														</div>
														<!--end::Content-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit
														<a href="#" class="text-primary">USD 700</a>. to ESL</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-primary icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed
														<a href="#" class="text-primary">#XF-2356</a>.</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-info icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-primary icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">New order placed
														<a href="#" class="text-primary">#XF-2356</a>.</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
												</div>
												<!--end: Items-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end: Card-->
										<!--end: List Widget 9-->
									</div>
									<div class="col-lg-6 col-xxl-4">
										<!--begin::Stats Widget 11-->
										<div class="card card-custom card-stretch card-stretch-half gutter-b">
											<!--begin::Body-->
											<div class="card-body p-0">
												<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-success mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-success">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																		<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</span>
													<div class="d-flex flex-column text-right">
														<span class="text-dark-75 font-weight-bolder font-size-h3">750$</span>
														<span class="text-muted font-weight-bold mt-2">Weekly Income</span>
													</div>
												</div>
												<div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px"></div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 11-->
										<!--begin::Stats Widget 12-->
										<div class="card card-custom card-stretch card-stretch-half gutter-b">
											<!--begin::Body-->
											<div class="card-body p-0">
												<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-primary mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-primary">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</span>
													<div class="d-flex flex-column text-right">
														<span class="text-dark-75 font-weight-bolder font-size-h3">+6,5K</span>
														<span class="text-muted font-weight-bold mt-2">New Users</span>
													</div>
												</div>
												<div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px"></div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 12-->
									</div>
									<div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
										<!--begin::List Widget 1-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Tasks Overview</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Pending 10 tasks</span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-ver"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-8">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-primary mr-5">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-lg svg-icon-primary">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																		<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Project Briefing</a>
														<span class="text-muted">Project Manager</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-warning mr-5">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-lg svg-icon-warning">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																		<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg">Concept Design</a>
														<span class="text-muted">Art Director</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-lg svg-icon-success">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
																		<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Functional Logics</a>
														<span class="text-muted">Lead Developer</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-danger mr-5">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-lg svg-icon-danger">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
																		<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
																		<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
																		<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Development</a>
														<span class="text-muted">DevOps</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-2">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-info mr-5">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-lg svg-icon-info">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
																		<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
																		<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Testing</a>
														<span class="text-muted">QA Managers</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 1-->
									</div>
									<div class="col-xxl-8 order-2 order-xxl-1">
										<!--begin::Advance Table Widget 2-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">New Arrivals</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
												</h3>
												<div class="card-toolbar">
													<ul class="nav nav-pills nav-pills-sm nav-dark-75">
														<li class="nav-item">
															<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_1_1">Month</a>
														</li>
														<li class="nav-item">
															<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_1_2">Week</a>
														</li>
														<li class="nav-item">
															<a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_1_3">Day</a>
														</li>
													</ul>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-3 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														<thead>
															<tr>
																<th class="p-0" style="width: 50px"></th>
																<th class="p-0" style="min-width: 200px"></th>
																<th class="p-0" style="min-width: 100px"></th>
																<th class="p-0" style="min-width: 125px"></th>
																<th class="p-0" style="min-width: 110px"></th>
																<th class="p-0" style="min-width: 150px"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-4">
																	<div class="symbol symbol-50 symbol-light mr-1">
																		<span class="symbol-label">
																			<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
																	<div>
																		<span class="font-weight-bolder">Email:</span>
																		<a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
																	</div>
																</td>
																<td class="text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
																	<span class="text-muted font-weight-bold">Paid</span>
																</td>
																<td class="text-right">
																	<span class="text-muted font-weight-500">ReactJs, HTML</span>
																</td>
																<td class="text-right">
																	<span class="label label-lg label-light-primary label-inline">Approved</span>
																</td>
																<td class="text-right pr-0">
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-4">
																	<div class="symbol symbol-50 symbol-light">
																		<span class="symbol-label">
																			<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Application Development</a>
																	<div>
																		<span class="font-weight-bolder">Email:</span>
																		<a class="text-muted font-weight-bold text-hover-primary" href="#">app@dev.com</a>
																	</div>
																</td>
																<td class="text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
																	<span class="text-muted font-weight-bold">Paid</span>
																</td>
																<td class="text-right">
																	<span class="text-muted font-weight-500">Python, MySQL</span>
																</td>
																<td class="text-right">
																	<span class="label label-lg label-light-warning label-inline">In Progress</span>
																</td>
																<td class="text-right pr-0">
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-4">
																	<div class="symbol symbol-50 symbol-light">
																		<span class="symbol-label">
																			<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Payrol Application</a>
																	<div>
																		<span class="font-weight-bolder">Email:</span>
																		<a class="text-muted font-weight-bold text-hover-primary" href="#">company@dev.com</a>
																	</div>
																</td>
																<td class="text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
																	<span class="text-muted font-weight-bold">Paid</span>
																</td>
																<td class="text-right">
																	<span class="text-muted font-weight-500">Laravel, Metronic</span>
																</td>
																<td class="text-right">
																	<span class="label label-lg label-light-success label-inline">Success</span>
																</td>
																<td class="text-right pr-0">
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-4">
																	<div class="symbol symbol-50 symbol-light">
																		<span class="symbol-label">
																			<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">HR Management System</a>
																	<div>
																		<span class="font-weight-bolder">Email:</span>
																		<a class="text-muted font-weight-bold text-hover-primary" href="#">hr@demo.com</a>
																	</div>
																</td>
																<td class="text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
																	<span class="text-muted font-weight-bold">Paid</span>
																</td>
																<td class="text-right">
																	<span class="text-muted font-weight-bold">AngularJS, C#</span>
																</td>
																<td class="text-right">
																	<span class="label label-lg label-light-danger label-inline">Rejected</span>
																</td>
																<td class="text-right pr-0">
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-4">
																	<div class="symbol symbol-50 symbol-light">
																		<span class="symbol-label">
																			<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Mobile Application</a>
																	<div>
																		<span class="font-weight-bolder">Email:</span>
																		<a class="text-muted font-weight-bold text-hover-primary" href="#">ktr@demo.com</a>
																	</div>
																</td>
																<td class="text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
																	<span class="text-muted font-weight-bold">Paid</span>
																</td>
																<td class="text-right">
																	<span class="text-muted font-weight-500">ReactJS, Ruby</span>
																</td>
																<td class="text-right">
																	<span class="label label-lg label-light-warning label-inline">In Progress</span>
																</td>
																<td class="text-right pr-0">
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 2-->
									</div>
									<div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
										<!--begin::List Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title font-weight-bolder text-dark">Authors</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/avatars/009-boy-4.svg" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Ricky Hunt</a>
														<span class="text-muted">PHP, SQLite, Artisan CLI</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/avatars/006-girl-3.svg" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Anne Clarc</a>
														<span class="text-muted">PHP, SQLite, Artisan CLI</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/avatars/011-boy-5.svg" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Kristaps Zumman</a>
														<span class="text-muted">PHP, SQLite, Artisan CLI</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end:Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-10">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/avatars/015-boy-6.svg" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Ricky Hunt</a>
														<span class="text-muted">PHP, SQLite, Artisan CLI</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-2">
													<!--begin::Symbol-->
													<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="assets/media/svg/avatars/016-boy-7.svg" class="h-75 align-self-end" alt="" />
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1 font-weight-bold">
														<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Carles Puyol</a>
														<span class="text-muted">PHP, SQLite, Artisan CLI</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 3-->
									</div>
									<div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
										<!--begin::List Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title font-weight-bolder text-dark">Todo</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-light btn-sm font-size-sm font-weight-bolder dropdown-toggle text-dark-75" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
												<!--begin::Item-->
												<div class="d-flex align-items-center">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-success align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" name="select" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">Create FireStone Logo</a>
														<span class="text-muted font-weight-bold">Due in 2 Days</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end:Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mt-10">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-primary align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-primary checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">Stakeholder Meeting</a>
														<span class="text-muted font-weight-bold">Due in 3 Days</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mt-10">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-warning align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-warning checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-size-sm font-weight-bold font-size-lg mb-1">Scoping &amp; Estimations</a>
														<span class="text-muted font-weight-bold">Due in 5 Days</span>
													</div>
													<!--end::Text-->
													<!--begin: Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mt-10">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-info align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-info checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox-->
													<!--begin::Text-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">Sprint Showcase</a>
														<span class="text-muted font-weight-bold">Due in 1 Day</span>
													</div>
													<!--end::Text-->
													<!--begin::Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center mt-10">
													<!--begin::Bullet-->
													<span class="bullet bullet-bar bg-danger align-self-stretch"></span>
													<!--end::Bullet-->
													<!--begin::Checkbox-->
													<label class="checkbox checkbox-lg checkbox-light-danger checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" value="1" />
														<span></span>
													</label>
													<!--end::Checkbox:-->
													<!--begin::Title-->
													<div class="d-flex flex-column flex-grow-1">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">Project Retro</a>
														<span class="text-muted font-weight-bold">Due in 12 Days</span>
													</div>
													<!--end::Text-->
													<!--begin: Dropdown-->
													<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end:List Widget 4-->
									</div>
									<div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">
										<!--begin::List Widget 8-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title font-weight-bolder text-dark">Trends</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-ver"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header pb-1">
																	<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
																		<span class="navi-text">Order</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
																		<span class="navi-text">Event</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
																		<span class="navi-text">Report</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Post</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
																		<span class="navi-text">File</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0">
												<!--begin::Item-->
												<div class="mb-10">
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Text-->
														<div class="d-flex flex-column flex-grow-1">
															<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Top Authors</a>
															<span class="text-muted font-weight-bold">5 day ago</span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Section-->
													<!--begin::Desc-->
													<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the top Authors that fits within this section</p>
													<!--end::Desc-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="mb-10">
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Text-->
														<div class="d-flex flex-column flex-grow-1">
															<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Popular Authors</a>
															<span class="text-muted font-weight-bold">5 day ago</span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Section-->
													<!--begin::Desc-->
													<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the Popular Authors that fits within this section</p>
													<!--end::Desc-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="">
													<!--begin::Section-->
													<div class="d-flex align-items-center">
														<!--begin::Symbol-->
														<div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Text-->
														<div class="d-flex flex-column flex-grow-1">
															<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">New Users</a>
															<span class="text-muted font-weight-bold">5 day ago</span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Section-->
													<!--begin::Desc-->
													<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the New Users that fits within this section</p>
													<!--end::Desc-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end: Card-->
										<!--end::List Widget 8-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-4">
										<!--begin::Mixed Widget 14-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title font-weight-bolder">Action Needed</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<div class="flex-grow-1">
													<div id="kt_mixed_widget_14_chart" style="height: 200px"></div>
												</div>
												<div class="pt-5">
													<p class="text-center font-weight-normal font-size-lg pb-7">Notes: Current sprint requires stakeholders
													<br />to approve newly amended policies</p>
													<a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate Report</a>
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 14-->
									</div>
									<div class="col-lg-8">
										<!--begin::Advance Table Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Agents Stats</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
												</h3>
												<div class="card-toolbar">
													<a href="#" class="btn btn-info font-weight-bolder font-size-sm mr-3">New Report</a>
													<a href="#" class="btn btn-danger font-weight-bolder font-size-sm">Create</a>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<div class="tab-content">
													<!--begin::Table-->
													<div class="table-responsive">
														<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
															<thead>
																<tr class="text-left text-uppercase">
																	<th style="min-width: 250px" class="pl-7">
																		<span class="text-dark-75">products</span>
																	</th>
																	<th style="min-width: 100px">earnings</th>
																	<th style="min-width: 100px">comission</th>
																	<th style="min-width: 100px">company</th>
																	<th style="min-width: 130px">rating</th>
																	<th style="min-width: 80px"></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
																				<span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$8,000,000</span>
																		<span class="text-muted font-weight-bold">In Proccess</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
																		<span class="text-muted font-weight-bold">Paid</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
																		<span class="text-muted font-weight-bold">Web, UI/UX Design</span>
																	</td>
																	<td>
																		<img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
																		<span class="text-muted font-weight-bold d-block font-size-sm">Best Rated</span>
																	</td>
																	<td class="pr-0 text-right">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
																	</td>
																</tr>
																<tr>
																	<td class="pl-0 py-0">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Jessie Clarcson</a>
																				<span class="text-muted font-weight-bold d-block">C#, ASP.NET, MS SQL</span>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$23,000,000</span>
																		<span class="text-muted font-weight-bold">Pending</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$1,600</span>
																		<span class="text-muted font-weight-bold">Rejected</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Agoda</span>
																		<span class="text-muted font-weight-bold">Houses &amp; Hotels</span>
																	</td>
																	<td>
																		<img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
																		<span class="text-muted font-weight-bold d-block font-size-sm">Above Avarage</span>
																	</td>
																	<td class="pr-0 text-right">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
																	</td>
																</tr>
																<tr>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Lebron Wayde</a>
																				<span class="text-muted font-weight-bold d-block">PHP, Laravel, VueJS</span>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$34,000,000</span>
																		<span class="text-muted font-weight-bold">Paid</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$6,700</span>
																		<span class="text-muted font-weight-bold">Paid</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">RoadGee</span>
																		<span class="text-muted font-weight-bold">Paid</span>
																	</td>
																	<td>
																		<img src="assets/media/logos/stars.png" alt="image" style="width: 5.5rem" />
																		<span class="text-muted font-weight-bold d-block font-size-sm">Best Rated</span>
																	</td>
																	<td class="pr-0 text-right">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
																	</td>
																</tr>
																<tr>
																	<td class="pl-0 py-0">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Natali Trump</a>
																				<span class="text-muted font-weight-bold d-block">Python, PostgreSQL, ReactJS</span>
																			</div>
																		</div>
																	</td>
																	<td class="text-left pr-0">
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,600,000</span>
																		<span class="text-muted font-weight-bold">Paid</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$14,000</span>
																		<span class="text-muted font-weight-bold">Pending</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">The Hill</span>
																		<span class="text-muted font-weight-bold">Insurance</span>
																	</td>
																	<td>
																		<img src="assets/media/logos/stars.png" style="width: 5.5rem" alt="" />
																		<span class="text-muted font-weight-bold d-block font-size-sm">Avarage</span>
																	</td>
																	<td class="pr-0 text-right">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm" style="width: 7rem">View Offer</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<!--end::Table-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 4-->
									</div>
								</div>
								<!--end::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry--> @endsection
