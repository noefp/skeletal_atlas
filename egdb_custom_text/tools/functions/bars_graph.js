
 var color_array = ["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6",'#546ead','#666','#999','#ccc','#000',"#a61101", "#c89", "#ab5700", "#798b00", "#437801", "#036aab", "#d0f", "#700982", "#fe9989", "#f8aedf", "#ffdf64", "#cbff89", "#6befff", "#f77ffa","#b66"];

//#### Lines

//----- create lines graph--------

var chart=['#chart_bar1','#chart_bar2','#chart_bar3'];
var name_table=['Single Cell RNA-seq','Bulk RNA-seq','Proteomics'];
var bar_chart=[];
var i=0;


$( "#lines_btn" ).click(function() {
  for(var n=0;n<3;n++)
    {  
     bar_chart[n].updateOptions({
      chart: {
        type: 'line'
      },
      stroke: {
        width: 3,
      },
    });
    } 
  
});


$( "#bars_btn" ).click(function() {
  for(var n=0;n<3;n++)
    { 
      bar_chart[n].updateOptions({
      chart: {
      type: 'bar'
      },
    stroke: {
      width: 1
    },
  });
  }  
});


cartoon_load.forEach(load => {
  if(load){
    var options = {
      series: bar_series[i],
      chart: {
        type:'line',
        height: 500,
        zoom: {
         enabled: false,
          type: 'xy'
        },
        toolbar: {
          show: true
        },
      },

      colors: color_array,

      dataLabels: {
        enabled: true,
        offsetY: -5,
        colors:["#FF0000"]
      },

      stroke: {
        width: 2,
      },

      title: {
        text: name_table[i],
        align: 'left'
      },
      markers: {
        size: 3,
      },

      xaxis: {
        categories: sample_array[i],
        labels: {
          rotate: -50,
          rotateAlways: true,
          hideOverlappingLabels: true,
          trim: false,
          minHeight: 120
        }
      },
      yaxis: {
        title: {
          text: 'Expression value'
        }
      },
      legend: {
        position: 'top',
        horizontalAlign: 'center',
        inverseOrder: true,
        floating: true,
        offsetY: -30,
        offsetX: 25,
        fontSize: 13,
        showForSingleSeries: true,
        markers: {
          size: 11,
          shape: 'square',
          strokeWidth: 2,  
        },
      },
      tooltip: {
        inverseOrder: true
      }
    };
  }else{
    var options = {
      series: bar_series[i],
      chart: {
        type:'line',
        height: 1,
        zoom: {
         enabled: false,
          type: 'xy'
        },
        toolbar: {
          show: true
        },
      },
      title: {
        text: name_table[i],
        align: 'left'
      },
    };
  }

    bar_chart[i] = new ApexCharts(document.querySelector(chart[i]), options);
    bar_chart[i].render();
    i++;
  });



$(document).ready(function () {
  // ######################################################## Heatmap
    var bar_shown = 0;

    $("#banner_bars").click(function(){
      if (!bar_shown) {
        for(var n=0;n<3;n++)
          { 
            bar_chart[n].render();

            bar_chart[n].updateOptions({
              chart: {
                type: 'bar'
              },
              stroke: {
                width: 1
              },
            });
          }
        bar_shown = 1;
      }
      //$(".flip-card-inner").css("transform", "rotateY(180deg)");
    
    });
 });


