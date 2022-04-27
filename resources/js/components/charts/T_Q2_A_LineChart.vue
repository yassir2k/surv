<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    data() {
      return {
        chartData: {
          labels: ["Total", "Email", "Telephone", "Face-to-Face", "Online Support Ticket System", "Others"],
          datasets: [{
            label: 'Bar Chart',
            borderWidth: 1,
            backgroundColor: [
              'rgba(137, 148, 153, 0.2)',
              'rgba(203, 195, 227, 0.2)',
              'rgba(204, 204, 255, 0.2)',
              'rgba(207, 159, 255, 0.2)',
              'rgba(218, 112, 214, 0.2)',
              'rgba(128, 0, 128, 0.2)'
            ],
            borderColor: [
              'rgba(137, 148, 153,1)',
              'rgba(203, 195, 227, 1)',
              'rgba(204, 204, 255, 1)',
              'rgba(207, 159, 255, 1)',
              'rgba(218, 112, 214, 1)',
              'rgba(128, 0, 128, 1)'
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