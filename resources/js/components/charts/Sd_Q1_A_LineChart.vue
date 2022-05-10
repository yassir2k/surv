<script>
  import { Pie } from 'vue-chartjs'
  export default {
    extends: Pie,
    data() {
      return {
        chartData: {
          labels: ["Very Satisfied", "Satisfied", "Dissatisfied", "Very Dissatisfied"],
          datasets: [{
            label: 'Service Delivery Q1', 
            borderWidth: 1,
            backgroundColor: [
              'rgba(114, 204, 102, 0.2)',
              'rgba(64, 181, 173, 0.2)',
              'rgba(255, 191, 0, 0.2)',
              'rgba(255, 0, 0, 0.2)'
            ],
            borderColor: [
              'rgba(114, 204, 102, 1)',
              'rgba(64, 181, 173, 1)',
              'rgba(255, 191, 0, 1)',
              'rgba(255, 0, 0, 1)'
            ],
            pointBorderColor: '#2554FF',
            data: this._chartData
          }]
        },
        options: {
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: true
        }
      }
    },
    props: 
    {
      _chartData:{type: Array}
    },
    mounted() {
      this.renderChart(this.chartData, this.options)
    },
    method:{}
  }
</script>