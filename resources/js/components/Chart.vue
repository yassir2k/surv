<template>
<div>
    <div class="row">
        <div class="col-sm-12">
            <NavBar /> 
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8" style="height: 100%">
            <div class="card bg-white mb-1 shadow-sm" style="width: 100%; height:100%; border-radius: 0.5em; border-bottom: 4px solid #50C878">
                <div class="card-body">
                    <h3>Heading</h3>
                    <hr class="separator">
                    <!-- Your Chart Here-->
                    <bar-chart :chart-data="chartdata"></bar-chart>
                    <button @click="renderChart()">Randomize</button>
                    <p class="card-text"><b class="font-pref14">TOTAL FEEDBACK RECEIVED</b></p>
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
    <br />
    <br />
</div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import NavBar from './navigations/StatsNav.vue';

export default {
  extends: Bar,
  data: () => ({
    chartdata: {
      labels: ['January', 'February'],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: '#f87979',
          data: [40, 20]
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    },
  }),
  components:{
        NavBar
    }
}
</script>
