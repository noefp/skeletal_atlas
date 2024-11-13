
// var color_array = ["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6",'#546ead','#666','#999','#ccc','#000',"#a61101", "#c89", "#ab5700", "#798b00", "#437801", "#036aab", "#d0f", "#700982", "#fe9989", "#f8aedf", "#ffdf64", "#cbff89", "#6befff", "#f77ffa","#b66"];
       
 // ######################################################## Heatmap btn

 var legend_color_ranges=colors; 
 var color_ranges=[];
 var i=0;

 legend_color_ranges.forEach(colors => {
    color_ranges.push({from:ranges[i][0],to:ranges[i][1],name:ranges_text[i],color:colors})
    i++;
 }); 


    $( "#red_color_btn" ).click(function() {
        // alert("hi");
        for(var n=0;n<=i;n++)
        {
            heatmap_chart[n].updateOptions({
                colors: ["#ff0000"],
                plotOptions: {
                    heatmap: {
                        shadeIntensity: 0.5,
                        radius: 0,
                        useFillColorAsStroke: true,
                        colorScale: {
                            ranges: []
                        }
                    }
                }
            });
        }
    });
      
      $( "#blue_color_btn" ).click(function() {
        // alert("hi");
        for(var n=0;n<=i;n++)
        {
            heatmap_chart[n].updateOptions({
                colors: ["#008FFB"],
                plotOptions: {
                    heatmap: {
                        colorScale: {
                            ranges: []
                        }
                    }
                }
            });
        }    
        
    });
      
      $( "#range_color_btn" ).click(function() {
        // alert("hi: "+color_ranges);
        for(var n=0;n<=i;n++)
        {
            heatmap_chart[n].updateOptions({
                colors: legend_color_ranges,
                plotOptions: {
                    heatmap: {
                        colorScale: {
                            ranges: color_ranges
                        }
                    }
                }
            });
        }    
        
    });
      
   // alert("heatmap_series: "+JSON.stringify(heatmap_series) );

//----- create heatmap--------

var chart=['#chart1','#chart2','#chart3'];
var name_table=['Single Cell RNA-seq','Bulk RNA-seq','Proteomics'];
var heatmap_chart=[];
var i=0;

cartoon_load.forEach(load => {
  if(load){
    var options = {
        series: heatmap_series[i],
        chart: {
          height: 350,
          type: 'heatmap',
        },
        dataLabels: {
          enabled: true
        },
        // colors: color_array,
        plotOptions: {
          heatmap: {
            shadeIntensity: 0.5,
            radius: 0,
            useFillColorAsStroke: true,
            colorScale: {
              ranges: color_ranges
            }
          }
        },

        legend: {
          fontSize: 13,
          showForSingleSeries: true,
          markers: {
            size: 10,
            shape: 'circle',
            strokeWidth: 2,
          
          },
        },
        title: {
          text: name_table[i]
        },
        
        xaxis: {
          type: 'category',
          categories: sample_array[i],
          tickAmount: sample_array[i].length-1,
        }
        
      };
    }    
    else
    {
      var options = {
        chart: {
          height: 50,
          type: 'heatmap',
        },
        title: {
          text: name_table[i]
        },  
      };    
    }

    heatmap_chart[i] = new ApexCharts(document.querySelector(chart[i]), options);
    i++;
    
});// end foreach

$(document).ready(function () {
  // ######################################################## Heatmap
    var heatmap_shown = 0;

    $("#banner_heatmap").click(function(){
      if (!heatmap_shown) {
        heatmap_chart[0].render();
        heatmap_chart[1].render();
        heatmap_chart[2].render();
        heatmap_shown = 1;
      }
      //$(".flip-card-inner").css("transform", "rotateY(180deg)");
    
    });
 });