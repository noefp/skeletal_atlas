var color_array = ["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6",'#546ead','#666','#999','#ccc','#000',"#a61101", "#c89", "#ab5700", "#798b00", "#437801", "#036aab", "#d0f", "#700982", "#fe9989", "#f8aedf", "#ffdf64", "#cbff89", "#6befff", "#f77ffa",'#b66'];


// ########################################################  Replicates

$(document).ready( function(){

    $( "#sel10" ).change(function() {
      // // alert( this.value );  
      var scatter_title =this.value+' Expression values';
      // alert(scatter_title);
      // //scatter_one_gene = scatter_all_genes[this.value];
      // replicates_one_gene = replicates_all_genes[this.value];
      
      scatter_chart[0].updateOptions({
        title: {
          text: scatter_title,
            align: 'center'
        }
      })
      // scatter_chart.updateSeries(
      //   // scatter_one_gene
      //   replicates_one_gene
      // )
      // alert($('#'+this.id).val()+" Pulsado");
  });


$( "#sel11" ).change(function() {
  // // alert( this.value );  
  var scatter_title =this.value+' Expression values';
  // alert(scatter_title);
  // //scatter_one_gene = scatter_all_genes[this.value];
  // replicates_one_gene = replicates_all_genes[this.value];
  
  scatter_chart[1].updateOptions({
    title: {
      text: scatter_title,
        align: 'center'
    }
  })
  // scatter_chart.updateSeries(
  //   // scatter_one_gene
  //   replicates_one_gene
  // )
  // alert($('#'+this.id).val()+" Pulsado");
});


$( "#sel12" ).change(function() {
  // // alert( this.value );  
  var scatter_title =this.value+' Expression values';
  // alert(scatter_title);
  // //scatter_one_gene = scatter_all_genes[this.value];
  // replicates_one_gene = replicates_all_genes[this.value];
  
  scatter_chart[2].updateOptions({
    title: {
      text: scatter_title,
        align: 'center'
    }
  })
  // scatter_chart.updateSeries(
  //   // scatter_one_gene
  //   replicates_one_gene
  // )
  // alert($('#'+this.id).val()+" Pulsado");
});

}); 



// //----- create replicates graph-------

var chart=["#chart_rep0","#chart_rep1","#chart_rep2"];
var name_table=['Single Cell RNA-seq','Bulk RNA-seq','Proteomics'];
var scatter_chart=[];;
var i=0;

cartoon_load.forEach(load => {
  // alert(JSON.stringify(replicates_one_gene[i][2]));
  // alert(replicates_one_gene[i]);
  // alert(samples_found[i]);
  var scatter_title = (samples_found[i][0])+' Expression values';
  // alert(scatter_title);
  // {
      var options = {
        // series: scatter_one_gene,
        series: replicates_one_gene[i][i],
      //   // series: test,
        chart: {
          height: 350,
          type: 'scatter',
          zoom: {
            enabled: false,
            type: 'xy'
          }
        },
        colors: color_array,
        title: {
          text: scatter_title,
          align: 'center',
          style: {
            fontSize: '24'
          }
        },
        
        xaxis: {
          type: 'category',
          // categories: samples_found[i],
          // tickAmount: samples_found[i].length-1,
         categories: sample_array[i],
         tickAmount: sample_array[i].length-1,
          labels: {
            rotate: -45,
            rotateAlways: true,
            hideOverlappingLabels: false,
            trim: false
          }
        },
        yaxis: {
          tickAmount: 5
        },
        legend: {
          show: false,
          position: 'top'
        }
      };
      // }
        // else{
        // function
      // }

  scatter_chart[i] = new ApexCharts(document.querySelector(chart[i]), options);
  scatter_chart[i].render();
  i++;
  });
  
  // ################################### render replicates graph when opening replicates section
  
  // $('#replicates_graph').on('shown.bs.collapse', function(){
  //   $('#replicates_graph').click(function(){
  //   // for(var n=0;n<=i;i++){
  //     scatter_chart[0].render();
  //     scatter_chart[1].render();
  //     scatter_chart[2].render();
  // //   }
  // });
  
  
