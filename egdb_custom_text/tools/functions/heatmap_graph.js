
var color_array = ["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6",'#546ead','#666','#999','#ccc','#000',"#a61101", "#c89", "#ab5700", "#798b00", "#437801", "#036aab", "#d0f", "#700982", "#fe9989", "#f8aedf", "#ffdf64", "#cbff89", "#6befff", "#f77ffa","#b66"];
       
 // ######################################################## Heatmap btn
  var color_ranges=[{from:0,to:0.99,name:"0-0.99",color:"#c8c8c8"},{from:1,to:2.99,name:"1-2.99",color:"#f0c320"},{from:3,to:9.99,name:"3-9.99",color:"#ff8800"},{from:10,to:49.99,name:"10-49.99",color:"#ff7469"},{from:50,to:99.99,name:"50-99.99",color:"#de2515"},{from:100,to:199.99,name:"100-199.99",color:"#b71005"},{from:200,to:4999.99,name:"200-4999.99",color:"#0bb4ff"},{from:5000,to:20000,name:"5000-infinite",color:"#8000FF"}];
  
  var legend_color_ranges=["#c8c8c8","#f0c320","#ff8800","#ff7469","#de2515","#b71005","#0bb4ff","#8000FF"];

    $( "#red_color_btn" ).click(function() {
        // alert("hi");
        for(var n=0;n<3;n++)
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
        for(var n=0;n<3;n++)
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
        for(var n=0;n<3;n++)
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

for(var i=0;i<3;i++)
{
    var options = {
        series: heatmap_series[i],
        chart: {
          height: 350,
          type: 'heatmap',
        },
        dataLabels: {
          enabled: true
        },
        colors: color_array,
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
        title: {
          text: name_table[i]
        },
        
        xaxis: {
          type: 'category',
          categories: sample_array[i],
          tickAmount: sample_array[i].length-1
        }
        
      };    
     
    heatmap_chart[i] = new ApexCharts(document.querySelector(chart[i]), options);
    
}// end for

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
