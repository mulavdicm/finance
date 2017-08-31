// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawIncomeChart);

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawExpenseChart);

function drawIncomeChart() {
  var jsonData = $.ajax({
      url: "getPieChartIncomeData.php",
      dataType: "json",
      async: false
      }).responseText;

  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);

  // Set chart options
//   var options = {width:400, height:400};

var options = {
    legend: { 
        position: 'right', 
        alignment: 'start' 
    },
    width: '100%',
    height: '100%',
    chartArea: {
        left: "10%",
        top: "3%",
        bottom: "4%",
        right: '0%',
        height: "100%",
        width: "100%"
    }
  };

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('piechart_income'));

  function selectHandler() {
      var selectedItem = chart.getSelection()[0];
      if (selectedItem) {
          var topping = data.getValue(selectedItem.row, 0);
          alert('The user selected ' + topping);
      }
  }
  
  google.visualization.events.addListener(chart, 'select', selectHandler);
  
  chart.draw(data, options);
}

function drawExpenseChart() {
    var jsonData = $.ajax({
        url: "getPieChartExpenseData.php",
        dataType: "json",
        async: false
        }).responseText;
        
    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);
  
    // Set chart options
    var options = {
        legend: { 
        position: 'right', 
        alignment: 'start' 
        },
        width: '100%',
        height: '100%',
        chartArea: {
            left: "10%",
            top: "3%",
            bottom: "4%",
            right: '0%',
            height: "100%",
            width: "100%"
        }
      };
  
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('piechart_expense'));
  
    function selectHandler() {
        var selectedItem = chart.getSelection()[0];
        if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);
            alert('The user selected ' + topping);
        }
    }
    
    google.visualization.events.addListener(chart, 'select', selectHandler);
  
    chart.draw(data, options);
}