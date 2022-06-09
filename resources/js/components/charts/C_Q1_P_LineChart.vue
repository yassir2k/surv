<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    data() {
      return {
        chartData: {
          labels: ["Document Editing", "Password/Username Reset", "Incomplete Report", "Entity Status Update", "Stamp Duty Deleted", "Others"],
          datasets: [{
            label: 'Bar Chart',
            borderWidth: 1,
            backgroundColor: [
              'rgba(114, 204, 102, 0.2)',
              'rgba(64, 181, 173, 0.2)',
              'rgba(218, 224, 33, 0.2)',
              'rgba(255, 191, 0, 0.2)',
              'rgba(255, 0, 0, 0.2)',
              'rgba(255, 191, 0, 0.2)'
            ],
            borderColor: [
              'rgba(114, 204, 102, 1)',
              'rgba(64, 181, 173, 1)',
              'rgba(218, 224, 33, 1)',
              'rgba(255, 191, 0, 1)',
              'rgba(255, 0, 0, 1)',
              'rgba(255, 191, 0, 1)',
            ],
            pointBorderColor: '#2554FF',
            data: this._chartData
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                display: true
              }
            }],
            xAxes: [{
              gridLines: {
                display: false
              }
            }]
          },
          legend: {
            display: false
          },
          responsive: true,
          maintainAspectRatio: false
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