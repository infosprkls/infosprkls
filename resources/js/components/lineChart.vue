<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,
  mounted() {
    this.renderChart(
      {
        labels: [
            "M","T","W","T","F","S","S"
        ],
        datasets: [
          {
            label: "Target",
            data: [2, 10, 5, 9, 0, 6, 20],
            backgroundColor: "transparent",
            borderWidth:3,
            borderColor: "#fff",
            pointBackgroundColor: "#fff",
            pointBorderColor: "#fff",
            hoverBorderColor: "orange",
          }
        ]
      },
      {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            labels: {
                fontColor: "#fff"
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "#fff",
                    fontSize: 14,
                    stepSize: 1,
                    beginAtZero: true
                }
            }],
             xAxes: [{
                ticks: {
                    fontColor: "#fff",
                    fontSize: 14,
                    stepSize: 1,
                    beginAtZero: true
                }
            }]
        }
      }
    );
  }
};
</script>