<template>
    <div class="mr-10">
      <div class="line-chart mb-5 shadow-md">
        <div class="grid grid-cols-2">
          <div class="line-chart-about">
           <div class="flex justify-between">
               <h6 class="text-xs font-extrabold">summery</h6>
             <div class="flex gap-3">
                 <h6 class="text-xs font-extrabold text-gray-500">Total sales</h6>
                 <h2 class="text-md font-extrabold mr-3">${{ salesInfo[0].total_sales}}</h2>
             </div>
           </div>
                  <h6 class="text-xs font-extrabold text-gray-500 mt-4">total sale by {{user.name}}</h6>

            <h2 class="text-md font-extrabold mt-3">${{ salesInfo[0].total_sales }}</h2>
            <div>
              <button class="btn-component text-xs">increase by 20%</button>
              <h6 class="text-xs font-extrabold text-gray-500">
                since {{ moment(salesInfo[0].created_at).format('LL') }}
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
          <h2 class="text-sm font-extrabold mt-1">{{ user.name }}</h2>
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
import { defineProps } from "vue";
import moment from  "moment"
import {Graph} from "../../../services/chart"


const props =defineProps({
    user:Object,
    salesInfo:Array,
    all:Array

})


  /*
   * Chart : this is the class that allows us to use charts in the website
   * chartBluePrint: Is a function used to get a chart type and it properties
   *
   **/

  const Chart = new Graph();

  const data = props.all.map((data)=>data.total_sales);
  const date = props.all.map((date)=>date.created_at);



const doplicatedLabels = new Set(date.map((rowDate)=> moment(rowDate).format('MMMM')));

const labels = [...doplicatedLabels];

console.log(labels)



  onMounted(() => {
    //plot a line chart
    const lineCtx = document.getElementById("lineCanvas");
    Chart.chartBluePrint(lineCtx, "line", "#6200FF",data,labels);
    //plotting a bar chart
    const barCtx1 = document.getElementById("barCanvas1");
    Chart.chartBluePrint(barCtx1, "bar", ["#6200FF","#B086F3"],data,labels);
    //ploting the second bar chart
    const barCtx =document.getElementById('barCanvas')
    Chart.chartBluePrint(barCtx, "bar", ["#118E25","#B086F3"],data,labels);

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
