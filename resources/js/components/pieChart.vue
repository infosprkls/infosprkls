<script>
import { Pie } from "vue-chartjs";

export default {
  extends: Pie,
  mounted() {
    this.gradient = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient2 = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient3 = this.$refs.canvas
    .getContext("2d")
    .createLinearGradient(0, 0, 0, 450);

    this.gradient4 = this.$refs.canvas
    .getContext("2d")
    .createLinearGradient(0, 0, 0, 450);
      
    this.gradient.addColorStop(0, "rgba(171, 71, 188, 0.5)");
    this.gradient.addColorStop(0.5, "rgba(142, 36, 70, 0.6)");

    this.gradient2.addColorStop(0.8, "rgba(255, 152, 0, 1)");
    this.gradient2.addColorStop(0.6, "rgba(251, 140, 0, 0.9)");

    this.gradient3.addColorStop(0.8, "rgba(76, 175, 80, 0.6)");
    this.gradient3.addColorStop(1, "rgba(80, 212, 87, 0.9)");

    this.gradient4.addColorStop(0.4, "rgba(244, 67, 54, 0.6)");
    this.gradient4.addColorStop(1, "rgba(146, 108, 98, 0.9)");

    this.renderChart(
      {
        labels: ["WBSO", "VIA", "MIT", "Other"],
        datasets: [
          {
            backgroundColor: [this.gradient, this.gradient2, this.gradient3, this.gradient4],
            data: [40, 20, 10, 20]
          }
        ]
      },
      
      { 
        responsive: true, 
        maintainAspectRatio: false,
        legend: {
              labels: {
                  fontColor: "#3C4858"
              }
          },
      }
    );
  }
};
</script>