// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['line']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawIncomeLineChart);

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawExpenseLineChart);

function drawIncomeLineChart() {
  var jsonData = $.ajax({
      url: "get_income_line_chart_data.php",
      dataType: "json",
      async: false
      }).responseText;

  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);

    var options = {
        chart: {
            title: 'How much I earned',
            subtitle: 'per month'
        },
        width: 900,
        height: 500,
        hAxis: {
            title: 'Date',
            textStyle: {
              color: '#01579b',
              fontSize: 20,
              fontName: 'Arial',
              bold: true,
              italic: true
            },
            titleTextStyle: {
              color: '#01579b',
              fontSize: 16,
              fontName: 'Arial',
              bold: false,
              italic: true
            }
          },
          vAxis: {
            title: 'Amount',
            textStyle: {
              color: '#1a237e',
              fontSize: 24,
              bold: true
            },
            titleTextStyle: {
              color: '#1a237e',
              fontSize: 24,
              bold: true
            }
          },
          colors: ['#5CB85C', '#097138'],
          curveType: 'function',
          legend: { 
            position: 'top', 
            alignment: 'start' 
            },
    };

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.charts.Line(document.getElementById('income_line_chart'));
  
  chart.draw(data, google.charts.Line.convertOptions(options));
}

function drawExpenseLineChart() {
  var jsonData = $.ajax({
      url: "get_expense_line_chart_data.php",
      dataType: "json",
      async: false
      }).responseText;

  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);

    var options = {
        chart: {
            title: 'How much I spent',
            subtitle: 'per month'
        },
        width: 900,
        height: 500,
        hAxis: {
            title: 'Date',
            textStyle: {
              color: '#01579b',
              fontSize: 20,
              fontName: 'Arial',
              bold: true,
              italic: true
            },
            titleTextStyle: {
              color: '#01579b',
              fontSize: 16,
              fontName: 'Arial',
              bold: false,
              italic: true
            }
          },
          vAxis: {
            title: 'Amount',
            textStyle: {
              color: '#1a237e',
              fontSize: 24,
              bold: true
            },
            titleTextStyle: {
              color: '#1a237e',
              fontSize: 24,
              bold: true
            }
          },
          colors: ['#a52714', '#097138'],
          curveType: 'function',
          legend: { 
            position: 'top', 
            alignment: 'start' 
            },
    };

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.charts.Line(document.getElementById('expense_line_chart'));
  
  chart.draw(data, google.charts.Line.convertOptions(options));
}
