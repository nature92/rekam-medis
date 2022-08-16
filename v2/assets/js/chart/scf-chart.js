var ctx = document.getElementById("scf-chart").getContext("2d");
let max = Math.max(...[...dataNilaiPokok, ...dataBiayaSCFPindad]);
let cursorToggler;
var scf_chart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [...labels],
    datasets: [
      {
        label: "Nilai Pokok",
        data: [...dataNilaiPokok],
        fill: false,
        backgroundColor: "rgba(255, 71, 108, 0.2)",
        borderColor: "rgb(255, 71, 108)",
        borderWidth: 1,
      },
      {
        label: "Biaya SCF Pindad",
        data: [...dataBiayaSCFPindad],
        fill: false,
        backgroundColor: "rgba(71, 114, 255, 0.2)",
        borderColor: "rgb(71, 114, 255)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    onClick: function (_, i) {
      if (i.length) {
        const indexMonth = i[0]._index + 1;
        getAjaxDetailChart(indexMonth);
      }
    },
    hover: {
      onHover: function (e) {
        var point = this.getElementAtEvent(e);
        if (point.length) {
          e.target.style.cursor = "pointer";
          cursorToggler = "bar";
        } else if (cursorToggler == "bar") {
          e.target.style.cursor = "default";
          cursorToggler = "";
        }
      },
    },
    tooltips: {
      displayColors: true,
      callbacks: {
        mode: "x",
        title: function (tooltipItem, data) {
          return `${data.datasets[tooltipItem[0].datasetIndex].label} - ${tooltipItem[0].label}`;
        },
        label: function (tooltipItem) {
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
          const newLabel = Math.ceil(formatNumber(max, value) * 100) / 100;
          return value != 0 ? newLabel : "";
        },
        listeners: {
          click: function (context) {
            const indexMonth = context.dataIndex + 1;
            getAjaxDetailChart(indexMonth);
          },
          enter: function (context) {
            context.hovered = true;
            var el = document.getElementById("scf-chart");
            el.style.cursor = "pointer";
            return true;
          },
          leave: function (context) {
            context.hovered = false;
            var el = document.getElementById("scf-chart");
            el.style.cursor = "default";
            return true;
          },
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
              return Math.ceil(formatNumber(max, value));
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
    },
  },
});

//Y Label
scf_chart.options.scales.yAxes[0].scaleLabel.labelString = "SCF ( x " + satuan + " )";

//Padding Top
scf_chart.options.scales.yAxes[0].ticks.max = Math.ceil(max) + Math.ceil(max) / 5;

//Label Responsive
scf_chart.width < 500 && (scf_chart.options.plugins.datalabels.display = false);

scf_chart.update();
