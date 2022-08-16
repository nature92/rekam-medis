var ctx = document.getElementById("acc-receivable-chart").getContext("2d");
let max = Math.max(...datasets);
var acc_receivable_chart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [...labels],
    datasets: [
      {
        label: "Account Receivable",
        data: [...datasets],
        fill: false,
        backgroundColor: [...bgColor],
        borderColor: [...borderColor],
        borderWidth: 1,
      },
    ],
  },
  options: {
    tooltips: {
      displayColors: true,
      callbacks: {
        mode: "x",
        label: function (tooltipItem, data) {
          const label = "Rp. " + separateNumber(tooltipItem.yLabel);
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
          const newLabel = Math.round(formatNumber(max, value) * 100) / 100;
          return "Rp. " + newLabel + " " + satuan.substring(0, 1);
        },
      },
    },
    scales: {
      yAxes: [
        {
          scaleLabel: {
            display: true,
          },
          ticks: {
            beginAtZero: true,
            callback: function (value, index, values) {
              if (max == 0) {
                max = values[0];
              }
              return Math.ceil(formatNumber(max, value) / 100) * 100;
            },
          },
          type: "linear",
        },
      ],
    },
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: "bottom",
      labels: {
        generateLabels: function (chart) {
          return [
            {
              text: "Account Receivable",
              fillStyle: "rgb(75, 192, 192)",
            },
            {
              text: "Hari ini",
              fillStyle: "rgb(255, 159, 64)",
            },
          ];
        },
      },
    },
  },
});

//Y Label
acc_receivable_chart.options.scales.yAxes[0].scaleLabel.labelString =
  "Account Receivable ( x " + satuan + " )";

//Padding Top
acc_receivable_chart.options.scales.yAxes[0].ticks.max =
  Math.ceil(max) + Math.ceil(max) / 5;

//Label Responsive
acc_receivable_chart.width < 500 &&
  (acc_receivable_chart.options.plugins.datalabels.display = false);

acc_receivable_chart.update();
