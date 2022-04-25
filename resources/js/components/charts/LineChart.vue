<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    data() {
      return {
        _begin: '',
        _end: '',
        vsatisfied:'',
        satisfied:'',
        dissatisfied: '',
        vdissatisfied: '',
        chartData: {
          labels: ["Total", "Very Satisfied", "Satisfied", "Dissatisfied", "Very Dissatisfied"],
          datasets: [{
            label: 'Bar Chart',
            borderWidth: 1,
            backgroundColor: [
              'rgba(137, 148, 153, 0.2)',
              'rgba(114, 204, 102, 0.2)',
              'rgba(64, 181, 173, 0.2)',
              'rgba(255, 191, 0, 0.2)',
              'rgba(255, 0, 0, 0.2)'
            ],
            borderColor: [
              'rgba(137, 148, 153,1)',
              'rgba(114, 204, 102, 1)',
              'rgba(64, 181, 173, 1)',
              'rgba(255, 191, 0, 1)',
              'rgba(255, 0, 0, 1)'
            ],
            pointBorderColor: '#2554FF',
            data: [20, 16, 2, 4, 2]
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
    mounted() {
      this.renderChart(this.chartData, this.options)
    },
    method:{}
  }
</script>