<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    data() {
      return {
        chartData: {
          labels: ["Total", "Company (LLC)", "Business Names", "Incorporated Trustees", "Limited Partnership", "Limited Liability Partnership"],
          datasets: [{
            label: 'Bar Chart',
            borderWidth: 1,
            backgroundColor: [
              'rgba(137, 148, 153, 0.2)',
              'rgba(255, 127, 80, 0.2)',
              'rgba(137, 207, 240, 0.2)',
              'rgba(255, 234, 0, 0.2)',
              'rgba(192, 192, 192, 0.2)',
              'rgba(113, 121, 126, 0.2)',
            ],
            borderColor: [
              'rgba(137, 148, 153, 1)',
              'rgba(255, 127, 80, 1)',
              'rgba(137, 207, 240, 1)',
              'rgba(255, 234, 0, 1)',
              'rgba(192, 192, 192, 1)',
              'rgba(113, 121, 126, 1)'
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
            display: true
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