var ctx = document.getElementById("saldo-chart").getContext("2d");
let sum = [];
let max = 0;
var saldo_chart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [...label],
    datasets: [...dataset],
  },
  options: {
    tooltips: {
      displayColors: true,
      callbacks: {
        mode: "x",
        label: function (tooltipItem, data) {
          var label = data.datasets[tooltipItem.datasetIndex].label;

          if (label) {
            label += ": ";
          }
          label += currency + " " + separateNumber(tooltipItem.yLabel);
          return label;
        },
      },
    },
    plugins: {
      datalabels: {
        color: "black",
        anchor: "end",
        align: "end",
        formatter: function (value, ctx) {
          const data = ctx.chart.data;
          data.labels.map((date, iDate) => {
            sum[iDate] = 0;
            data.datasets.map((bank) => {
              sum[iDate] += bank.data[iDate];
            });
          });
          const label =
            "Total : " + currency + " " + separateNumber(sum[ctx.dataIndex]);
          if (!ctx.chart.data.datasets[ctx.datasetIndex + 1]) return label;
          else return "";
        },
      },
    },
    scales: {
      xAxes: [
        {
          stacked: true,
          gridLines: {
            display: false,
          },
        },
      ],
      yAxes: [
        {
          scaleLabel: {
            display: true,
          },
          stacked: true,
          ticks: {
            beginAtZero: true,
            callback: function (value, index, values) {
              if (max == 0) {
                max = values[0];
              }
              return formatNumber(max, value);
            },
          },
          type: "linear",
        },
      ],
    },

    responsive: true,
    maintainAspectRatio: false,
    legend: { position: "bottom" },
  },
});

//Label Responsive
saldo_chart.width < 500 &&
  (saldo_chart.options.plugins.datalabels.display = false);

//Y Label
saldo_chart.options.scales.yAxes[0].scaleLabel.labelString =
  "Cash On Hands ( x " + satuan + " )";

//Padding Top
saldo_chart.options.scales.yAxes[0].ticks.max =
  Math.ceil(max) + Math.ceil(max) / 5;

saldo_chart.update();
