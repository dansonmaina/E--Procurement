
/*
Template Name: Codefox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 3.1.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Sparkline Charts init js
*/

$( document ).ready(function() {
    
    var DrawSparkline = function() {
        $('#sparkline1').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
            type: 'line',
            width:'100%',
            height: '165',
            chartRangeMax: 50,
            lineColor: '#1ea69a',
            fillColor: 'rgba(30, 166, 154, 0.3)',
            highlightLineColor: 'rgba(102, 122, 142,.1)',
            highlightSpotColor: 'rgba(102, 122, 142,.2)',
        });

        $('#sparkline1').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
            type: 'line',
            width:'100%',
            height: '165',
            chartRangeMax: 40,
            lineColor: '#f7531f',
            fillColor: 'rgba(247, 83, 31, 0.3)',
            composite: true,
            highlightLineColor: 'rgba(102, 122, 142,.1)',
            highlightSpotColor: 'rgba(102, 122, 142,.2)',
        });
    
        $('#sparkline2').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'bar',
            height: '165',
            barWidth: '10',
            barSpacing: '3',
            barColor: '#348cd4'
        });
        
        $('#sparkline3').sparkline([20, 40, 30, 10], {
            type: 'pie',
            width: '165',
            height: '165',
            sliceColors: ['#348cd4', '#45bbe0', '#78c350', '#8892d6']
        });
    
        $('#sparkline4').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
            type: 'line',
            width:'100%',
            height: '165',
            chartRangeMax: 50,
            lineColor: '#78c350',
            fillColor: 'transparent',
            highlightLineColor: 'rgba(102, 122, 142,.1)',
            highlightSpotColor: 'rgba(102, 122, 142,.2)'
        });
    
        $('#sparkline4').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
            type: 'line',
            width:'100%',
            height: '165',
            chartRangeMax: 40,
            lineColor: '#348cd4',
            fillColor: 'transparent',
            composite: true,
            highlightLineColor: 'rgba(102, 122, 142,1)',
            highlightSpotColor: 'rgba(102, 122, 142,1)'
        });

        $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'line',
            width:'100%',
            height: '165',
            lineColor: '#7fc1fc',
            fillColor: 'rgba(127,193,292,0.5)',
            highlightLineColor: 'rgba(102, 122, 142,.1)',
            highlightSpotColor: 'rgba(102, 122, 142,.2)'
        });

        $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'bar',
            height: '165',
            barWidth: '10',
            barSpacing: '5',
            composite: true,
            barColor: '#f06292'
        });
    

        
        
    },
        DrawMouseSpeed = function () {
            var mrefreshinterval = 500; // update display every 500ms
            var lastmousex=-1; 
            var lastmousey=-1;
            var lastmousetime;
            var mousetravel = 0;
            var mpoints = [];
            var mpoints_max = 30;
            $('html').mousemove(function(e) {
                var mousex = e.pageX;
                var mousey = e.pageY;
                if (lastmousex > -1) {
                    mousetravel += Math.max( Math.abs(mousex-lastmousex), Math.abs(mousey-lastmousey) );
                }
                lastmousex = mousex;
                lastmousey = mousey;
            });
            var mdraw = function() {
                var md = new Date();
                var timenow = md.getTime();
                if (lastmousetime && lastmousetime!=timenow) {
                    var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                    mpoints.push(pps);
                    if (mpoints.length > mpoints_max)
                        mpoints.splice(0,1);
                    mousetravel = 0;
                    $('#sparkline5').sparkline(mpoints, {
                        tooltipSuffix: ' pixels per second',
                        type: 'line',
                        width:'100%',
                        height: '165',
                        chartRangeMax: 50,
                        lineColor: '#1ea69a',
                        fillColor: 'rgba(30, 166, 154, 0.3)',
                        highlightLineColor: 'rgba(24,147,126,.1)',
                        highlightSpotColor: 'rgba(24,147,126,.2)',
                    });
                }
                lastmousetime = timenow;
                setTimeout(mdraw, mrefreshinterval);
            }
            // We could use setInterval instead, but I prefer to do it this way
            setTimeout(mdraw, mrefreshinterval); 
        };
    
    DrawSparkline();
    DrawMouseSpeed();
    
    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
            DrawMouseSpeed();
        }, 300);
    });
});
    