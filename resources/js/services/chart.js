import Chart from 'chart.js/auto';

/*
 * Graph : this is the class that allows us to use charts in the website
 * chartBluePrint: Is a function used to get a chart type and it properties
 *
 **/
 export class Graph{
     chartBluePrint(ctx,graphType,colors,data,labels){
        new Chart(ctx, {
            type: graphType,
            data: {
              labels: labels,
              datasets: [{
                label: 'total sale',
                data: data,
                borderWidth: 1,
                borderColor: "#6200FF",
                backgroundColor:colors
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
    }
}

export default Graph;
