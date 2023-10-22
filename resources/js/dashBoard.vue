<template>
    <div class="mr-10">
      <div class="line-chart mb-5 shadow-md">
        <div class="grid grid-cols-2">
          <div class="line-chart-about">
            <h6 class="text-xs font-extrabold">summery</h6>
            <h6 class="text-xs font-extrabold text-gray-500 mt-4">total sale</h6>
            <h2 class="text-md font-extrabold mt-3">$5,000.5</h2>
            <div>
              <button class="btn-component text-xs">increase by 20%</button>
              <h6 class="text-xs font-extrabold text-gray-500">
                since 9/10/2023
              </h6>
            </div>
          </div>
          <div>
            <canvas id="lineCanvas" class="line-chart-body"> </canvas>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 bar-chart-wrapper gap-x-4">
        <div class="bar-graph shadow-md">
          <div class="flex justify-between">
            <h6 class="text-xs font-extrabold">Top sale by employeer</h6>
            <h6 class="text-xs font-bold text-gray-500">view all</h6>
          </div>
          <h2 class="text-sm font-extrabold mt-1">Mubarak Luiz</h2>
          <canvas id="barCanvas1" class="line-chart-body"> </canvas>
        </div>
        <div class="bar-graph shadow-md">
          <div class="flex justify-between">
            <h6 class="text-xs font-extrabold">Top sale by employeer</h6>
            <h6 class="text-xs font-bold text-gray-500">view all</h6>
          </div>
          <h2 class="text-sm font-extrabold mt-1">Mubarak Luiz</h2>
          <canvas id="barCanvas" class="line-chart-body"> </canvas>
        </div>
      </div>
    </div>
  </template>
  <style></style>
  <script setup>
  import { onMounted } from "vue";

  import Graph from "./services/chart";


  /*
   * Chart : this is the class that allows us to use charts in the website
   * chartBluePrint: Is a function used to get a chart type and it properties
   *
   **/

  const Chart = new Graph();

  onMounted(() => {
    //plot a line chart
    const lineCtx = document.getElementById("lineCanvas");
    Chart.chartBluePrint(lineCtx, "line", "#6200FF");
    //plotting a bar chart
    const barCtx1 = document.getElementById("barCanvas1");
    Chart.chartBluePrint(barCtx1, "bar", ["#6200FF","#B086F3"]);
    //ploting the second bar chart
    const barCtx =document.getElementById('barCanvas')
    Chart.chartBluePrint(barCtx, "bar", ["#118E25","#B086F3"]);

  });
  </script>

  <style scoped>
  .line-chart {
    width: 80%;
    height: 200px;
    margin-right: 20px;
    background-color: white;
    padding: 30px;
    margin-right: 30px;
    border-radius: 15px;
  }
  .line-chart-about {
    border-right: 1px solid gray;
  }
  .bar-graph {
    height: 250px;
    background-color: white;
    border-radius: 15px;
    padding: 15px;
    margin-bottom: 20px;
  }
  .bar-chart-wrapper {
    width: 80%;
    margin-right: 20px;
  }

  .line-chart-body {
    width: 200px;
    height: 200px;
    margin-left: 10px;
    /* background-color: red; */
  }
  </style>
