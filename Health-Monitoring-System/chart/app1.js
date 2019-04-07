// JavaScript Document



$(document).ready(function(){
  $.ajax({
    url: "http://localhost/chart/graph.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var player = [];
      var score = [];
      
      for(var i in data) {
        player.push("Time" + data[i].Time);
        score.push(data[i].Heart_Rate);
		
      }

      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Heart Rate',
			lineTension:0.1,
            backgroundColor: 'rgba(0,255,255,1.0)',
            borderColor: 'rgba(0,0,255, 0.75)',
            hoverBackgroundColor: 'rgba(0,255,255, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas1");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
   },
	  
	error: function(data) {
      console.log(data);
    }
	  
	  
	       
	  
  });
});