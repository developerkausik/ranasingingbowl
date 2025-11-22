$(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';

  if ($("#doughnutChartIncome").length) {
    var doughnutChartCanvas = $("#doughnutChartIncome").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
  if ($("#doughnutChartExpense").length) {
    var doughnutChartCanvas = $("#doughnutChartExpense").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
});
