// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart 1
var ctx = document.getElementById("myBarChart");

var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["0 - 1000", "1001 - 4400", "4401 - 6600", "6601 - 8800", "8801 - 11100"],
    datasets: [{
      label: "Depth",
      backgroundColor: "rgba(255, 165, 0)",
      borderColor: "rgba(2,117,216,1)",
      data: [
        909, 1200, 2400
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        type: 'category',
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 5000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

// Bar Chart 2
var ctx = document.getElementById("myBarChart2");

var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["0 - 1000", "1001 - 4400", "4401 - 6600", "6601 - 8800", "8801 - 11100"],
    datasets: [{
      label: "Depth",
      backgroundColor: "rgba(255, 165, 0)",
      borderColor: "rgba(2,117,216,1)",
      data: [
        909, 1200, 2400
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        type: 'category',
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 5000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

