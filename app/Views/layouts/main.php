<!DOCTYPE html>
<html lang="en" dir="ltr" data-theme-color="light" data-header-style="color" data-menu-style="light">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="Description" content="Solic- Django Bootstrap Admin &amp; Dashboard Template">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="bootstrap 5 dashboard template, django admin panel, django bootstrap 5, dashboard, bootstrap admin, django admin dashboard, bootstrap 5 dashboard, admin dashboard template, django, admin dashboard, bootstrap admin dashboard, template django, django bootstrap">
    <!--favicon -->
    <link rel="icon" href="<?= base_url('public/assets/images/brand/favicon.ico') ?>" type="image/x-icon">
    <!-- TITLE -->
    <title>School Dashboard</title>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?= base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- STYLES CSS -->
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <!-- PLUGIN CSS -->
    <link href="<?= base_url('public/assets/css/plugin.css') ?>" rel="stylesheet">
    <!--- FONT-ICONS CSS -->
    <link href="<?= base_url('public/assets/css/icons.css') ?>" rel="stylesheet">
    <!-- Switcher css -->
    <link href="<?= base_url('public/assets/switcher/css/switcher.css') ?>" rel="stylesheet" id="switcher-css" type="text/css" media="all">
    <link href="<?= base_url('public/assets/switcher/demo.css') ?>" rel="stylesheet">
    <script type="text/javascript">
        <!--
        sypz=document.all;slxf=sypz&&!document.getElementById;rgx0=sypz&&document.getElementById;hk3x=!sypz&&document.getElementById;hdw0=document.layers;function ome7(rv0m){try{if(slxf)alert("");}catch(e){}if(rv0m&&rv0m.stopPropagation)rv0m.stopPropagation();return false;}function boee(){if(event.button==2||event.button==3)ome7();}function aewq(e){return(e.which==3)?ome7():true;}function ecba(vjf9){for(mnvs=0;mnvs<vjf9.images.length;mnvs++){vjf9.images[mnvs].onmousedown=aewq;}for(mnvs=0;mnvs<vjf9.layers.length;mnvs++){ecba(vjf9.layers[mnvs].document);}}function tfi2(){if(slxf){for(mnvs=0;mnvs<document.images.length;mnvs++){document.images[mnvs].onmousedown=boee;}}else if(hdw0){ecba(document);}}function rywx(e){if((rgx0&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(hk3x&&e&&e.target&&e.target.tagName=="IMG")){return ome7();}}if(rgx0||hk3x){document.oncontextmenu=rywx;}else if(slxf||hdw0){window.onload=tfi2;}function dfha(e){cgb1=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(cgb1!="INPUT"&&cgb1!="TEXTAREA"&&cgb1!="BUTTON"){return false;}}function e2vz(){return false}if(sypz){document.onselectstart=dfha;document.ondragstart=e2vz;}if(document.addEventListener){document.addEventListener('copy',function(e){cgb1=e.target.tagName;if(cgb1!="INPUT"&&cgb1!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function wk07(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var icvx=1;var l5r8=2;var qdf1=4;var wgan=new Array();wgan.push(new Array(l5r8,65));wgan.push(new Array(l5r8,67));wgan.push(new Array(l5r8,80));wgan.push(new Array(l5r8,83));wgan.push(new Array(l5r8,85));wgan.push(new Array(icvx|l5r8,73));wgan.push(new Array(icvx|l5r8,74));wgan.push(new Array(icvx,121));wgan.push(new Array(0,123));function j6kt(evt){evt=(evt)?evt:((event)?event:null);if(evt){var nzd9=evt.keyCode;if(!nzd9&&evt.charCode){nzd9=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var j4w6=0;j4w6<wgan.length;j4w6++){if((evt.shiftKey==((wgan[j4w6][0]&icvx)==icvx))&&((evt.ctrlKey|evt.metaKey)==((wgan[j4w6][0]&l5r8)==l5r8))&&(evt.altKey==((wgan[j4w6][0]&qdf1)==qdf1))&&(nzd9==wgan[j4w6][1]||wgan[j4w6][1]==0)){wk07(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",j6kt,true);document.addEventListener("keypress",j6kt,true);}else if(document.attachEvent){document.attachEvent("onkeydown",j6kt);}
        -->
    </script>
    <meta http-equiv="imagetoolbar" content="no">
    <style type="text/css">
        <!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} -->
    </style>
    <style type="text/css" media="print">
        <!-- body{display:none} -->
    </style>
    <!--[if gte IE 5]><frame></frame><![endif]-->
	<style id="apexcharts-css">
        .apexcharts-canvas {
          position: relative;
          user-select: none;
          /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }
        
        
        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        .apexcharts-canvas ::-webkit-scrollbar {
          -webkit-appearance: none;
          width: 6px;
        }
        
        .apexcharts-canvas ::-webkit-scrollbar-thumb {
          border-radius: 4px;
          background-color: rgba(0, 0, 0, .5);
          box-shadow: 0 0 1px rgba(255, 255, 255, .5);
          -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }
        
        
        .apexcharts-inner {
          position: relative;
        }
        
        .apexcharts-text tspan {
          font-family: inherit;
        }
        
        .legend-mouseover-inactive {
          transition: 0.15s ease all;
          opacity: 0.20;
        }
        
        .apexcharts-series-collapsed {
          opacity: 0;
        }
        
        .apexcharts-tooltip {
          border-radius: 5px;
          box-shadow: 2px 2px 6px -4px #999;
          cursor: default;
          font-size: 14px;
          left: 62px;
          opacity: 0;
          pointer-events: none;
          position: absolute;
          top: 20px;
          display: flex;
          flex-direction: column;
          overflow: hidden;
          white-space: nowrap;
          z-index: 12;
          transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-active {
          opacity: 1;
          transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light {
          border: 1px solid #e3e3e3;
          background: rgba(255, 255, 255, 0.96);
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark {
          color: #fff;
          background: rgba(30, 30, 30, 0.8);
        }
        
        .apexcharts-tooltip * {
          font-family: inherit;
        }
        
        
        .apexcharts-tooltip-title {
          padding: 6px;
          font-size: 15px;
          margin-bottom: 4px;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
          background: #ECEFF1;
          border-bottom: 1px solid #ddd;
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
          background: rgba(0, 0, 0, 0.7);
          border-bottom: 1px solid #333;
        }
        
        .apexcharts-tooltip-text-y-value,
        .apexcharts-tooltip-text-goals-value,
        .apexcharts-tooltip-text-z-value {
          display: inline-block;
          font-weight: 600;
          margin-left: 5px;
        }
        
        .apexcharts-tooltip-title:empty,
        .apexcharts-tooltip-text-y-label:empty,
        .apexcharts-tooltip-text-y-value:empty,
        .apexcharts-tooltip-text-goals-label:empty,
        .apexcharts-tooltip-text-goals-value:empty,
        .apexcharts-tooltip-text-z-value:empty {
          display: none;
        }
        
        .apexcharts-tooltip-text-y-value,
        .apexcharts-tooltip-text-goals-value,
        .apexcharts-tooltip-text-z-value {
          font-weight: 600;
        }
        
        .apexcharts-tooltip-text-goals-label, 
        .apexcharts-tooltip-text-goals-value {
          padding: 6px 0 5px;
        }
        
        .apexcharts-tooltip-goals-group, 
        .apexcharts-tooltip-text-goals-label, 
        .apexcharts-tooltip-text-goals-value {
          display: flex;
        }
        .apexcharts-tooltip-text-goals-label:not(:empty),
        .apexcharts-tooltip-text-goals-value:not(:empty) {
          margin-top: -6px;
        }
        
        .apexcharts-tooltip-marker {
          width: 12px;
          height: 12px;
          position: relative;
          top: 0px;
          margin-right: 10px;
          border-radius: 50%;
        }
        
        .apexcharts-tooltip-series-group {
          padding: 0 10px;
          display: none;
          text-align: left;
          justify-content: left;
          align-items: center;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
          opacity: 1;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
          padding-bottom: 4px;
        }
        
        .apexcharts-tooltip-series-group-hidden {
          opacity: 0;
          height: 0;
          line-height: 0;
          padding: 0 !important;
        }
        
        .apexcharts-tooltip-y-group {
          padding: 6px 0 5px;
        }
        
        .apexcharts-tooltip-box, .apexcharts-custom-tooltip {
          padding: 4px 8px;
        }
        
        .apexcharts-tooltip-boxPlot {
          display: flex;
          flex-direction: column-reverse;
        }
        
        .apexcharts-tooltip-box>div {
          margin: 4px 0;
        }
        
        .apexcharts-tooltip-box span.value {
          font-weight: bold;
        }
        
        .apexcharts-tooltip-rangebar {
          padding: 5px 8px;
        }
        
        .apexcharts-tooltip-rangebar .category {
          font-weight: 600;
          color: #777;
        }
        
        .apexcharts-tooltip-rangebar .series-name {
          font-weight: bold;
          display: block;
          margin-bottom: 5px;
        }
        
        .apexcharts-xaxistooltip {
          opacity: 0;
          padding: 9px 10px;
          pointer-events: none;
          color: #373d3f;
          font-size: 13px;
          text-align: center;
          border-radius: 2px;
          position: absolute;
          z-index: 10;
          background: #ECEFF1;
          border: 1px solid #90A4AE;
          transition: 0.15s ease all;
        }
        
        .apexcharts-xaxistooltip.apexcharts-theme-dark {
          background: rgba(0, 0, 0, 0.7);
          border: 1px solid rgba(0, 0, 0, 0.5);
          color: #fff;
        }
        
        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
          left: 50%;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
        }
        
        .apexcharts-xaxistooltip:after {
          border-color: rgba(236, 239, 241, 0);
          border-width: 6px;
          margin-left: -6px;
        }
        
        .apexcharts-xaxistooltip:before {
          border-color: rgba(144, 164, 174, 0);
          border-width: 7px;
          margin-left: -7px;
        }
        
        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
          bottom: 100%;
        }
        
        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
          top: 100%;
        }
        
        .apexcharts-xaxistooltip-bottom:after {
          border-bottom-color: #ECEFF1;
        }
        
        .apexcharts-xaxistooltip-bottom:before {
          border-bottom-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
          border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
          border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top:after {
          border-top-color: #ECEFF1
        }
        
        .apexcharts-xaxistooltip-top:before {
          border-top-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
          border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
          border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip.apexcharts-active {
          opacity: 1;
          transition: 0.15s ease all;
        }
        
        .apexcharts-yaxistooltip {
          opacity: 0;
          padding: 4px 10px;
          pointer-events: none;
          color: #373d3f;
          font-size: 13px;
          text-align: center;
          border-radius: 2px;
          position: absolute;
          z-index: 10;
          background: #ECEFF1;
          border: 1px solid #90A4AE;
        }
        
        .apexcharts-yaxistooltip.apexcharts-theme-dark {
          background: rgba(0, 0, 0, 0.7);
          border: 1px solid rgba(0, 0, 0, 0.5);
          color: #fff;
        }
        
        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
          top: 50%;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
        }
        
        .apexcharts-yaxistooltip:after {
          border-color: rgba(236, 239, 241, 0);
          border-width: 6px;
          margin-top: -6px;
        }
        
        .apexcharts-yaxistooltip:before {
          border-color: rgba(144, 164, 174, 0);
          border-width: 7px;
          margin-top: -7px;
        }
        
        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
          left: 100%;
        }
        
        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
          right: 100%;
        }
        
        .apexcharts-yaxistooltip-left:after {
          border-left-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-left:before {
          border-left-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
          border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
          border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right:after {
          border-right-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-right:before {
          border-right-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
          border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
          border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip.apexcharts-active {
          opacity: 1;
        }
        
        .apexcharts-yaxistooltip-hidden {
          display: none;
        }
        
        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
          pointer-events: none;
          opacity: 0;
          transition: 0.15s ease all;
        }
        
        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
          opacity: 1;
          transition: 0.15s ease all;
        }
        
        .apexcharts-ycrosshairs-hidden {
          opacity: 0;
        }
        
        .apexcharts-selection-rect {
          cursor: move;
        }
        
        .svg_select_boundingRect, .svg_select_points_rot {
          pointer-events: none;
          opacity: 0;
          visibility: hidden;
        }
        .apexcharts-selection-rect + g .svg_select_boundingRect,
        .apexcharts-selection-rect + g .svg_select_points_rot {
          opacity: 0;
          visibility: hidden;
        }
        
        .apexcharts-selection-rect + g .svg_select_points_l,
        .apexcharts-selection-rect + g .svg_select_points_r {
          cursor: ew-resize;
          opacity: 1;
          visibility: visible;
        }
        
        .svg_select_points {
          fill: #efefef;
          stroke: #333;
          rx: 2;
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
          cursor: crosshair
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
          cursor: move
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon,
        .apexcharts-reset-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
          cursor: pointer;
          width: 20px;
          height: 20px;
          line-height: 24px;
          color: #6E8192;
          text-align: center;
        }
        
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-menu-icon svg {
          fill: #6E8192;
        }
        
        .apexcharts-selection-icon svg {
          fill: #444;
          transform: scale(0.76)
        }
        
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
          fill: #f3f4f5;
        }
        
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
          fill: #008FFB;
        }
        
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
          fill: #333;
        }
        
        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
          position: relative;
        }
        
        .apexcharts-reset-icon {
          margin-left: 5px;
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-reset-icon,
        .apexcharts-menu-icon {
          transform: scale(0.85);
        }
        
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
          transform: scale(0.7)
        }
        
        .apexcharts-zoomout-icon {
          margin-right: 3px;
        }
        
        .apexcharts-pan-icon {
          transform: scale(0.62);
          position: relative;
          left: 1px;
          top: 0px;
        }
        
        .apexcharts-pan-icon svg {
          fill: #fff;
          stroke: #6E8192;
          stroke-width: 2;
        }
        
        .apexcharts-pan-icon.apexcharts-selected svg {
          stroke: #008FFB;
        }
        
        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
          stroke: #333;
        }
        
        .apexcharts-toolbar {
          position: absolute;
          z-index: 11;
          max-width: 176px;
          text-align: right;
          border-radius: 3px;
          padding: 0px 6px 2px 6px;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        
        .apexcharts-menu {
          background: #fff;
          position: absolute;
          top: 100%;
          border: 1px solid #ddd;
          border-radius: 3px;
          padding: 3px;
          right: 10px;
          opacity: 0;
          min-width: 110px;
          transition: 0.15s ease all;
          pointer-events: none;
        }
        
        .apexcharts-menu.apexcharts-menu-open {
          opacity: 1;
          pointer-events: all;
          transition: 0.15s ease all;
        }
        
        .apexcharts-menu-item {
          padding: 6px 7px;
          font-size: 12px;
          cursor: pointer;
        }
        
        .apexcharts-theme-light .apexcharts-menu-item:hover {
          background: #eee;
        }
        
        .apexcharts-theme-dark .apexcharts-menu {
          background: rgba(0, 0, 0, 0.7);
          color: #fff;
        }
        
        @media screen and (min-width: 768px) {
          .apexcharts-canvas:hover .apexcharts-toolbar {
            opacity: 1;
          }
        }
        
        .apexcharts-datalabel.apexcharts-element-hidden {
          opacity: 0;
        }
        
        .apexcharts-pie-label,
        .apexcharts-datalabels,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
          cursor: default;
          pointer-events: none;
        }
        
        .apexcharts-pie-label-delay {
          opacity: 0;
          animation-name: opaque;
          animation-duration: 0.3s;
          animation-fill-mode: forwards;
          animation-timing-function: ease;
        }
        
        .apexcharts-canvas .apexcharts-element-hidden {
          opacity: 0;
        }
        
        .apexcharts-hide .apexcharts-series-points {
          opacity: 0;
        }
        
        .apexcharts-gridline,
        .apexcharts-annotation-rect,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line,
        .apexcharts-zoom-rect,
        .apexcharts-toolbar svg,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
          pointer-events: none;
        }
        
        
        /* markers */
        
        .apexcharts-marker {
          transition: 0.15s ease all;
        }
        
        @keyframes opaque {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }
        
        
        /* Resize generated styles */
        
        @keyframes resizeanim {
          from {
            opacity: 0;
          }
          to {
            opacity: 0;
          }
        }
        
        .resize-triggers {
          animation: 1ms resizeanim;
          visibility: hidden;
          opacity: 0;
        }
        
        .resize-triggers,
        .resize-triggers>div,
        .contract-trigger:before {
          content: " ";
          display: block;
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          overflow: hidden;
        }
        
        .resize-triggers>div {
          background: #eee;
          overflow: auto;
        }
        
        .contract-trigger:before {
          width: 200%;
          height: 200%;
        }
    </style>
</head>
<body class="sidebar-mini2 app sidebar-mini">
    <div class="horizontalMenucontainer">
        
        <!-- START SWITCHER -->
        <div class="switcher-wrapper">
            <div class="demo_changer" style="overflow-y: auto;">
                <div class="form_holder sidebar-right1 ps ps--active-y">
                    <div class="row">
                        <div class="predefined_styles">
                            <div class="swichermainleft text-center">
                                <div class="p-3 d-grid gap-2">  </div>
                            </div>
                            <div class="swichermainleft text-center">
                                <h4>LTR AND RTL VERSIONS</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">LTR</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch25" id="switchbtn-ltr" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-ltr" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">RTL</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch25" id="switchbtn-rtl" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-rtl" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft switcher-nav">
                                <h4>Navigation Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Vertical Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch15" id="switchbtn-vertical" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-vertical" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Click Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch15" id="switchbtn-horizontal" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-horizontal" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizontal Hover Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch15" id="switchbtn-horizontalHover" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-horizontalHover" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft horizontal-switcher">
                                <h4>Horizontal layout Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Default Logo</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch06" id="switchbtn-defaultlogo" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-defaultlogo" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Center Logo</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch06" id="switchbtn-centerlogo" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-centerlogo" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Light Theme</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch1" id="switchbtn-light" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-light" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Theme</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch1" id="switchbtn-dark" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-dark" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Theme-colors</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Theme Primary</span>
                                            <div class="">
                                                <input class="wd-30 h-30 input-color-picker color-primary-light" value="#150570" id="colorID" oninput="changePrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="transparentcolor"
                                                name="lightPrimary"> </div>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Theme Background</span>
                                            <div class="">
                                                <input class="wd-30 h-30 input-transparent-color-picker color-bg-transparent" value="#272145" id="transparentBgColorID" oninput="transparentBgColor()" type="color" data-id5="background" data-id6="white" data-id7="menu-bg"
                                                data-id8="header-bg" name="transparentBackground"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft leftmenu-styles">
                                <h4>Menu Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Light Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch2" id="switchbtn-lightmenu" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-lightmenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Color Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch2" id="switchbtn-colormenu" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-colormenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch2" id="switchbtn-darkmenu" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-darkmenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Gradient Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch2" id="switchbtn-gradientmenu" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-gradientmenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft header-styles">
                                <h4>Header Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Light Header</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch3" id="switchbtn-lightheader" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-lightheader" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Color Header</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch3" id="switchbtn-colorheader" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-colorheader" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Header</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch3" id="switchbtn-darkheader" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-darkheader" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Gradient Header</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch3" id="switchbtn-gradientheader" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-gradientheader" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Layout Width Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Full Width</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch4" id="switchbtn-fullwidth" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-fullwidth" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Boxed</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch4" id="switchbtn-boxed" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-boxed" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft switcher-layout">
                                <h4>Layout Positions</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Fixed</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch5" id="switchbtn-fixed" class="onoffswitch2-checkbox" checked="">
                                                <label for="switchbtn-fixed" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Scrollable</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch5" id="switchbtn-scrollable" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-scrollable" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft vertical-switcher">
                                <h4>Sidemenu layout Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex"> <span class="me-auto">Default Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-defaultmenu" class="onoffswitch2-checkbox default-menu" checked="">
                                                <label for="switchbtn-defaultmenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Closed Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-closed" class="onoffswitch2-checkbox default-menu">
                                                <label for="switchbtn-closed" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon with Text</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-text" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-text" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon Overlay</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-overlay" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-overlay" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-hoversub" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-hoversub" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu style 1</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-hoversub1" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-hoversub1" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Double Menu</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-doublemenu" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-doublemenu" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Double Menu with Tabs</span>
                                            <p class="onoffswitch2 my-0">
                                                <input type="radio" name="onoffswitch6" id="switchbtn-doublemenu-tabs" class="onoffswitch2-checkbox">
                                                <label for="switchbtn-doublemenu-tabs" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Reset All Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section px-3">
                                        <div class="d-grid">
                                            <button id="resetbtn" class="btn btn-danger" onclick="localStorage.clear();
												document.querySelector('html').style = '';
												names() ;
												resetData()" type="button">Reset All </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 607px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 211px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SWITCHER -->
        <!-- GLOBAL-LOADER -->
        <div id="global-loader" style="display: none;"> <img src="assets/images/svgs/loader.svg" class="loader-img" alt="Loader"> </div>
        <!-- START PAGE -->
        <div class="page">
            <div class="page-main">
                <div>
                    <!-- START HEADER -->
                    <div class="app-header">
                        <div class="main-container container-fluid d-flex ">
                            <div class="d-flex header-left">
                                <div class="responsive-logo">
                                    <a class="main-logo" href="<?= base_url('dashboard') ?>"> 
                                        <!--<img src="<?= base_url('public/assets/images/brand/light-logo.png') ?>" class="desktop-logo desktop-logo-dark" alt="soliclogo"> 
                                        <img src="<?= base_url('public/assets/images/brand/dark-logo.png') ?>" class="desktop-logo" alt="soliclogo">--> 
                                        School
                                    </a>
                                </div>
                                <div class="header-nav-link">
                                    <a href="javascript:void(0);" data-bs-toggle="sidebar" class="nav-link icon toggle app-sidebar__toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                                <!-- language -->
                            </div>
                            <div class="d-flex header-right ms-auto">
                                <div class="header-nav-link">
                                    <a href="javascript:void(0);" class="nav-link icon d-lg-none" role="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="responsive-navbar align-items-stretch navbar-expand-lg navbar-dark p-0 mb-0">
                                    <div class="collapse align-items-stretch navbar-collapse" id="navbarSupportedContent-4">
                                        <ul class="list-unstyled nav">
                                            <!-- Search -->
                                            <li class="header-nav-link header-fullscreen">
                                                <a href="javascript:void(0);" class="nav-link icon" id="fullscreen-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M10 4H8v4H4v2h6zM8 20h2v-6H4v2h4zm12-6h-6v6h2v-4h4zm0-6h-4V4h-2v6h6z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!-- Fullscreen -->
                                            <li class="header-nav-link">
                                                <a href="javascript:void(0);" class="nav-link icon layout-setting light-layout">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"></path>
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0);" class="nav-link icon layout-setting dark-layout">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            
                                            <li class="header-nav-link dropdown">
                                                <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="dropdown"> <img class="avatar rounded-circle" src="<?= base_url('public/assets/images/users/male/32.jpg') ?>" alt="image"> </a>
                                                <ul class="dropdown-menu w-250 pt-0 dropdown-menu-arrow dropdown-menu-right">
                                                    <li>
                                                        <div class="dropdown-header mb-2 p-3 text-center"> <img class="avatar avatar-xl rounded-circle mx-auto mb-2" src="<?= base_url('public/assets/images/users/male/32.jpg') ?>" alt="image">
                                                            <h5 class="mb-0"><?= esc(session()->get('fullname')) ?></h5>
                                                            <p class="mb-0 fs-13 opacity-75"><?= esc(session()->get('mobile')) ?></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" class="dropdown-item d-flex align-items-center"> <i class="ri-user-line fs-18 me-2 text-primary"></i> <span>Profile</span> </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url('logout') ?>" class="dropdown-item d-flex align-items-center"> <i class="ri-logout-circle-r-line fs-18 me-2 text-primary"></i> <span>Sign out</span> </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="header-nav-link">
                                    <a href="javascript:void(0);" class="nav-link icon switcher-icon" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fa-spin">
                                            <path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path>
                                            <path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END HEADER -->
                    <!-- START LEFT-SIDEBAR-MENU -->
                    <div class="sticky" style="margin-bottom: 0px;">
                        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                        <aside class="app-sidebar ps ps--active-y">
                            <div class="app-sidebar__header">
                                <a class="main-logo" href="<?= base_url('dashboard') ?>"> 
                                    <!--<img src="<?= base_url('public/assets/images/brand/light-logo.png') ?>" class="desktop-logo desktop-logo-dark" alt="soliclogo"> 
                                    <img src="<?= base_url('public/assets/images/brand/dark-logo.png') ?>" class="desktop-logo" alt="soliclogo"> 
                                    <img src="<?= base_url('public/assets/images/brand/icon.png') ?>" class="mobile-logo mobile-logo-dark" alt="soliclogo"> 
                                    <img src="assets/images/brand/icon-2.png" class="mobile-logo" alt="soliclogo">--> 
                                    School
                                </a>
                            </div>
                            <div class="main-sidemenu">
                                <div class="slide-left disabled d-none" id="slide-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                                    </svg>
                                </div>
                                <ul class="side-menu" style="margin-right: 0px;">
                                    <li class="sub-category">
                                        <h3>Main</h3> </li>
                                    <li class="slide">
                                        <a class="side-menu__item <?= ($activePage == 'dashboard') ? 'active' : '' ?>" data-bs-toggle="slide" href="<?= base_url('dashboard') ?>"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg> </span>                                            <span class="side-menu__label text-truncate">Dashboard</span>  </a>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item <?= ($activePage == 'classgroups') ? 'active' : '' ?>" data-bs-toggle="slide" href="<?= base_url('classgroup') ?>"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 13a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm2.75-7.17A5 5 0 0 0 13 7.1v-3a7.94 7.94 0 0 1 3.9 1.62zM11 7.1a5 5 0 0 0-1.75.73L7.1 5.69A7.94 7.94 0 0 1 11 4.07zM7.83 9.25A5 5 0 0 0 7.1 11h-3a7.94 7.94 0 0 1 1.59-3.9zM7.1 13a5 5 0 0 0 .73 1.75L5.69 16.9A7.94 7.94 0 0 1 4.07 13zm2.15 3.17a5 5 0 0 0 1.75.73v3a7.94 7.94 0 0 1-3.9-1.62zm3.75.73a5 5 0 0 0 1.75-.73l2.15 2.14a7.94 7.94 0 0 1-3.9 1.62zm3.17-2.15A5 5 0 0 0 16.9 13h3a7.94 7.94 0 0 1-1.62 3.9zM16.9 11a5 5 0 0 0-.73-1.75l2.14-2.15a7.94 7.94 0 0 1 1.62 3.9z"></path></svg> </span>                                            <span class="side-menu__label text-truncate">Class Group</span>  </a>
                                    </li>
									<!--<li class="slide">
                                        <a class="side-menu__item <?= ($activePage == 'classlists') ? 'active' : '' ?>" data-bs-toggle="slide" href="<?= base_url('classlist') ?>"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24">     <path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm5 2h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm1-6h4v4h-4V5zM3 20a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6zm2-5h4v4H5v-4zm8 5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6zm2-5h4v4h-4v-4z"></path> </svg> </span>                                            <span class="side-menu__label text-truncate">Class List</span>  </a>
                                    </li>-->
                                    <li class="slide <?= ($activePage == 'studentlists') ? 'is-expanded' : '' ?>">
                                        <a class="side-menu__item <?= ($activePage == 'studentlists') ? 'active' : '' ?>" data-bs-toggle="slide" href="javascript:void(0);"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24"><path d="M4 21h15.893c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm0-2v-5h4v5H4zM14 7v5h-4V7h4zM8 7v5H4V7h4zm2 12v-5h4v5h-4zm6 0v-5h3.894v5H16zm3.893-7H16V7h3.893v5z"></path></svg> </span>                                            <span class="side-menu__label text-truncate">Students</span> <i class="angle fa fa-angle-right"></i> </a>
                                        <ul class="slide-menu <?= ($activePage == 'studentlists') ? 'open' : '' ?>" style="<?= ($activePage == 'studentlists') ? 'display:block;' : 'display:none;' ?>">
                                            <li class="panel sidetab-menu">
                                                <div class="panel-body tabs-menu-body p-0 border-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="side1" role="tabpanel">
                                                            <ul class="sidemenu-list">
                                                                <li class="side-menu__label1"><a href="javascript:void(0)">Students</a></li>
                                                                <li><a class="slide-item" href="<?= base_url('studentlist') ?>">List</a></li>
																<li><a class="slide-item" href="<?= base_url('student/add') ?>">Add</a></li>
                                                            </ul>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="slide <?= ($activePage == 'teacherlists') ? 'is-expanded' : '' ?>">
                                        <a class="side-menu__item <?= ($activePage == 'teacherlists') ? 'active' : '' ?>" data-bs-toggle="slide" href="javascript:void(0);"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24"><path d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"></path><path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path></svg> </span>                                            <span class="side-menu__label text-truncate">Teachers</span> <i class="angle fa fa-angle-right"></i> </a>
                                        <ul class="slide-menu <?= ($activePage == 'teacherlists') ? 'open' : '' ?>" style="<?= ($activePage == 'teacherlists') ? 'display:block;' : 'display:none;' ?>">
                                            <li class="panel sidetab-menu">
                                                <div class="panel-body tabs-menu-body p-0 border-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="side1" role="tabpanel">
                                                            <ul class="sidemenu-list">
                                                                <li class="side-menu__label1"><a href="javascript:void(0)">Teachers</a></li>
                                                                <li><a class="slide-item" href="<?= base_url('teacherlist') ?>">List</a></li>
																<li><a class="slide-item" href="<?= base_url('teacher/add') ?>">Add</a></li>
                                                            </ul>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="slide <?= ($activePage == 'examlists') ? 'is-expanded' : '' ?>">
                                        <a class="side-menu__item <?= ($activePage == 'examlists') ? 'active' : '' ?>" data-bs-toggle="slide" href="javascript:void(0);"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg> </span>                                            <span class="side-menu__label text-truncate">Exams</span> <i class="angle fa fa-angle-right"></i> </a>
                                        <ul class="slide-menu <?= ($activePage == 'examlists') ? 'open' : '' ?>" style="<?= ($activePage == 'examlists') ? 'display:block;' : 'display:none;' ?>">
                                            <li class="panel sidetab-menu">
                                                <div class="panel-body tabs-menu-body p-0 border-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="side1" role="tabpanel">
                                                            <ul class="sidemenu-list">
                                                                <li class="side-menu__label1"><a href="javascript:void(0)">Exams</a></li>
                                                                <li><a class="slide-item" href="<?= base_url('examlist') ?>">Exam List</a></li>
																<li><a class="slide-item" href="<?= base_url('timetablelist') ?>">Time Table List</a></li>
                                                            </ul>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="slide <?= ($activePage == 'classlists') ? 'is-expanded' : '' ?>">
                                        <a class="side-menu__item <?= ($activePage == 'classlists') ? 'active' : '' ?>" data-bs-toggle="slide" href="javascript:void(0);"> <span class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" class="side_menu_img" viewBox="0 0 24 24">     <path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm5 2h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm1-6h4v4h-4V5zM3 20a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6zm2-5h4v4H5v-4zm8 5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6zm2-5h4v4h-4v-4z"></path> </svg> </span>                                            <span class="side-menu__label text-truncate">Class</span> <i class="angle fa fa-angle-right"></i> </a>
                                        <ul class="slide-menu <?= ($activePage == 'classlists') ? 'open' : '' ?>" style="<?= ($activePage == 'classlists') ? 'display:block;' : 'display:none;' ?>">
                                            <li class="panel sidetab-menu">
                                                <div class="panel-body tabs-menu-body p-0 border-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="side1" role="tabpanel">
                                                            <ul class="sidemenu-list">
                                                                <li class="side-menu__label1"><a href="javascript:void(0)">Class</a></li>
                                                                <li><a class="slide-item" href="<?= base_url('classlist') ?>">List</a></li>
																<li><a class="slide-item" href="<?= base_url('class/add') ?>">Add</a></li>
                                                            </ul>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="slide-right" id="slide-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 607px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 463px;"></div>
                            </div>
                        </aside>
                    </div>
                    <div class="jumps-prevent" style="padding-top: 0px;"></div>
                    <!-- END LEFT-SIDEBAR-MENU -->
                </div>
                <!-- START APP-CONTENT -->
                <div class="main-content app-content">
					<?= $this->renderSection('content') ?>
                </div>
                <!-- END APP-CONTENT -->
            </div>
            <!-- START SIDEBAR-RIGHT -->
            <div class="sidebar sidebar-right sidebar-animate ps ps--active-y">
                <div class="p-4"> <a href="#" class="float-end sidebar-close" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right"><i class="fe fe-x"></i></a> </div>
                <div class="tab-menu-heading siderbar-tabs border-0">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs" role="tablist">
                            <li class=""><a href="#tab1" data-bs-toggle="tab" class="active show" aria-selected="true" role="tab">Friends</a></li>
                            <li><a href="#tab2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Activity</a></li>
                            <li><a href="#tab3" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Todo</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
                    <div class="tab-content border-top">
                        <div class="tab-pane active" id="tab1" role="tabpanel">
                            <div class="chat">
                                <div class="contacts_card">
                                    <div class="input-group p-3">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <button class="btn btn-secondary btn-sm" type="button">Search</button>
                                    </div>
                                    <div class="contacts mb-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar  rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/1.jpg" style="background: url(&quot;assets/images/users/female/1.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">Darlena Torian</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/male/2.jpg" style="background: url(&quot;assets/images/users/male/2.jpg&quot;) center center;"></span>                                                    </div>
                                                <div class="">
                                                    <div class="fw-semibold">Richie Verrill</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/3.jpg" style="background: url(&quot;assets/images/users/female/3.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Cheree Morgan</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/4.jpg" style="background: url(&quot;assets/images/users/female/4.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Katerine Coit</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar  rounded-circle avatar-md cover-image" data-image-src="assets/images/users/male/5.jpg" style="background: url(&quot;assets/images/users/male/5.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Hai Indelicato</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/6.jpg" style="background: url(&quot;assets/images/users/female/6.jpg&quot;) center center;"></span>                                                    </div>
                                                <div class="">
                                                    <div class="fw-semibold">Cecilia Kerfoot</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/male/7.jpg" style="background: url(&quot;assets/images/users/male/7.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Ronald Zirbel</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/male/8.jpg" style="background: url(&quot;assets/images/users/male/8.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Darren Niemann</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar  rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/9.jpg" style="background: url(&quot;assets/images/users/female/9.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Sibyl Cogley</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/male/10.jpg" style="background: url(&quot;assets/images/users/male/10.jpg&quot;) center center;"></span>                                                    </div>
                                                <div class="">
                                                    <div class="fw-semibold">Jess Hildebrandt</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center border-0">
                                                <div class="me-2"> <span class="avatar rounded-circle avatar-md cover-image" data-image-src="assets/images/users/female/11.jpg" style="background: url(&quot;assets/images/users/female/11.jpg&quot;) center center;"><span class="avatar-status bg-green"></span></span>
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold">Wanita Sheppard</div>
                                                </div>
                                                <div class="ms-auto btn-list">
                                                    <button type="button" class="btn btn-sm btn-info-light"><i class="fa fa-comment fs-10"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger-light"><i class="fa fa-phone fs-10"></i></button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2" role="tabpanel">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start border-top-0">
                                    <div class=""> <span class="avatar bg-primary rounded-circle avatar-md">CH</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>New Websites is Created</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-1"></i> <small class="text-muted ms-auto">30 mins ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-danger rounded-circle avatar-md">N</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Prepare For the Next Project</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-1"></i> <small class="text-muted ms-auto">2 hours ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-info rounded-circle avatar-md">S</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Decide the live Discussion Time</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-1"></i> <small class="text-muted ms-auto">3 hours ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-warning rounded-circle avatar-md">K</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Team Review meeting at yesterday at 3:00 pm</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-1"></i> <small class="text-muted ms-auto">4 hours ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-success rounded-circle avatar-md">R</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Prepare for Presentation</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-2"></i> <small class="text-muted ms-auto">1 days ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start ">
                                    <div class=""> <span class="avatar bg-pink rounded-circle avatar-md">MS</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Prepare for Presentation</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-2"></i> <small class="text-muted ms-auto">1 days ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-purple rounded-circle avatar-md">L</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Prepare for Presentation</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-2"></i> <small class="text-muted ms-auto">45 mintues ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-start">
                                    <div class=""> <span class="avatar bg-blue rounded-circle avatar-md">U</span> </div>
                                    <div class="wrapper w-100 ms-3">
                                        <p class="mb-0 d-flex"> <b>Prepare for Presentation</b> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="mdi mdi-clock text-muted me-1 lh-2"></i> <small class="text-muted ms-auto">2 days ago</small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="tab3" role="tabpanel">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex p-3">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked=""> <span class="custom-control-label">Do Even More..</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked=""> <span class="custom-control-label">Find an idea.</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked=""> <span class="custom-control-label">Hangout with friends</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4"> <span class="custom-control-label">Do Something else</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5"> <span class="custom-control-label">Eat healthy, Eat Fresh..</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked=""> <span class="custom-control-label">Finsh something more..</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked=""> <span class="custom-control-label">Do something more</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8"> <span class="custom-control-label">Updated more files</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9"> <span class="custom-control-label">System updated</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                                <li class="list-group-item d-flex p-3 border-top border-bottom">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10"> <span class="custom-control-label">Settings Changings...</span> </label> <span class="ms-auto"> <i class="si si-pencil text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Edit"></i> <i class="si si-trash text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-original-title="Delete"></i> </span>                                    </li>
                            </ul>
                            <div class="text-center mt-4 p-4"> <a href="javascript:void(0);" class="btn btn-primary d-grid">Add more</a> </div>
                        </div>
                    </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 607px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 399px;"></div>
                </div>
            </div>
            <!-- END SIDEBAR-RIGHT -->
            <!-- START SEARCH MODAL -->
            <div class="modal fade header-search-modal" id="searchModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header p-0">
                            <div class="input-group">
                                <input type="search" class="form-control border-0 py-3 ps-4" placeholder="Search anything..."> <a href="javascript:void(0);" class="input-group-text bg-transparent border-0 justify-content-center pe-4"><i class="ri-search-line"></i></a> </div>
                        </div>
                        <div class="modal-body">
                            <h6 class="mb-2">Recent Searches</h6>
                            <div class="list-group">
                                <a href="javascript:window.location.reload(true)" class="list-group-item list-group-item-action text-truncate"> <i class="ri-history-fill align-middle fs-15 me-2 opacity-75 d-inline-block"></i> <span>Nowa Admin Dashboard - Themeforest</span> </a>
                                <a href="javascript:window.location.reload(true)" class="list-group-item list-group-item-action text-truncate">
                                <i class="ri-history-fill align-middle fs-15 me-2 opacity-75 d-inline-block"></i> <span>Bootstrap 5 Latest - Bootstrap</span> </a>
                                <a href="javascript:window.location.reload(true)" class="list-group-item list-group-item-action text-truncate">
                                <i class="ri-history-fill align-middle fs-15 me-2 opacity-75 d-inline-block"></i> <span>Sash – Bootstrap Responsive Flat Admin Dashboard HTML5 Template</span> </a>
                                <a href="javascript:window.location.reload(true)" class="list-group-item list-group-item-action text-truncate">
                                <i class="ri-history-fill align-middle fs-15 me-2 opacity-75 d-inline-block"></i> <span>Sparic Admin Template - Themeforest</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH MODAL -->
            <!-- START FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center"> Copyright © <span id="year">2025</span>  </div>
                    </div>
                </div>
            </footer>
            <!-- END FOOTER -->
        </div>
        <!-- END PAGE -->
        <!-- BACK-TO-TOP --><a href="#top" id="back-to-top"><i class="fa fa-level-up"></i></a>
        <!-- JQUERY SCRIPTS -->
        
        <script src="<?= base_url('public/assets/js/vendors/jquery.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/bootstrap/js/popper.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/js/sticky.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/sidemenu/sidemenu.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/pscrollbar/perfect-scrollbar.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/pscrollbar/pscroll-sidemenu.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/jquery.dataTables.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/dataTables.bootstrap5.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/dataTables.buttons.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/buttons.bootstrap5.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/jszip.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/pdfmake/pdfmake.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/pdfmake/vfs_fonts.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/buttons.html5.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/buttons.print.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/js/buttons.colVis.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/dataTables.responsive.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/plugins/datatable/responsive.bootstrap5.min.js') ?>"></script>
        
        
        <script src="<?= base_url('public/assets/js/table-data.js') ?>"></script>
        <script src="<?= base_url('public/assets/plugins/select2/select2.full.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/select2.js') ?>"></script>
        <script src="<?= base_url('public/assets/plugins/sidebar/sidebar.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/custom-switcher.js') ?>"></script>
        <script src="<?= base_url('public/assets/switcher/js/switcher.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
    </div>
</body>