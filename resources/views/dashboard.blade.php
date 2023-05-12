<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <!-- dashboard -->
              <section id="wrapper">
  <div class="p-6">
    <div class="welcome">
      <div class="content rounded-md p-6">
        <h1 class="fs-3">Bem-vindo ao painel de controle</h1>
        <p class="mb-0">Olá {{Auth::user()->name}}, bem-vindo ao seu painel de controle!</p>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="flex flex-wrap ">
        <div class="lg:w-1/3 pr-4 pl-4">
          <div class="box flex rounded-sm items-center mb-4 lg:mb-0 p-6">
            <i class="uil-envelope-shield fs-2 text-center bg-blue-600 rounded-full"></i>
            <div class="ml-3">
              <div class="flex items-center">
                <h3 class="mb-0">13</h3> <span class="block ms-2">Emails</span>
              </div>
              <p class="fs-normal mb-0">Emails enviados</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 pr-4 pl-4">
          <div class="box flex rounded-2 items-center mb-4 lg:mb-0 p-6">
            <i class="uil-file fs-2 text-center bg-red-600 rounded-full"></i>
            <div class="ms-3">
              <div class="flex items-center">
                <h3 class="mb-0">34</h3> <span class="block ms-2">Documentos</span>
              </div>
              <p class="fs-normal mb-0">Documentos cadastrados</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 pr-4 pl-4">
          <div class="box flex rounded-2 items-center p-6">
            <i class="uil-users-alt fs-2 text-center bg-green-500 rounded-full"></i>
            <div class="ms-3">
              <div class="flex items-center">
                <h3 class="mb-0">1</h3> <span class="block ms-2">Usuário</span>
              </div>
              <p class="fs-normal mb-0">Usuários cadastrados</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="flex flex-wrap ">
        <div class="lg:w-1/2 pr-4 pl-4">
          <div class="chart-container rounded-2 p-6">
            <h3 class="fs-6 mb-3">Entrada e saída</h3>
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <div class="lg:w-1/2 pr-4 pl-4">
          <div class="chart-container rounded-2 p-6">
            <h3 class="fs-6 mb-3">Movimentações</h3>
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </section>

    <section class="admins mt-4">
      <div class="flex flex-wrap ">
        <div class="md:w-1/2 pr-4 pl-4">
          <div class="box">
            <!-- <h4>Admins:</h4> -->
            <div class="admin flex items-center rounded-2 p-6 mb-4">
              <div class="img">
                <img class="max-w-full h-auto rounded-full py-2 px-4"
                     width="75" height="75"
                     src="assets/user.png"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">{{Auth::user()->name}}</h3>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="statis mt-4 text-center">
      <div class="flex flex-wrap ">
        <div class="md:w-1/2 pr-4 pl-4 lg:w-1/4 pr-4 pl-4 mb-4 lg:mb-0">
          <div class="box bg-blue-600 p-6">
            <i class="uil-eye"></i>
            <h3>502</h3>
            <p class="text-xl font-light">Documentos vistos</p>
          </div>
        </div>
        <div class="md:w-1/2 pr-4 pl-4 lg:w-1/4 pr-4 pl-4 mb-4 lg:mb-0">
          <div class="box bg-red-600 p-6">
            <i class="uil-user"></i>
            <h3>3</h3>
            <p class="text-xl font-light">Usuários registrados</p>
          </div>
        </div>
        <div class="md:w-1/2 pr-4 pl-4 lg:w-1/4 pr-4 pl-4 mb-4 md:mb-0">
          <div class="box bg-yellow-500 p-6">
            <i class="uil-shopping-cart"></i>
            <h3>93</h3>
            <p class="text-xl font-light">Itens retirados</p>
          </div>
        </div>
        <div class="md:w-1/2 pr-4 pl-4 lg:w-1/4 pr-4 pl-4">
          <div class="box bg-green-500 p-6">
            <i class="uil-feedback"></i>
            <h3>839</h3>
            <p class="text-xl font-light">Modificações</p>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="chart-container p-6">
        <h3 class="fs-6 mb-3">Prazos de guarda</h3>
        <div style="height: 300px">
          <canvas id="chart3" width="100%"></canvas>
        </div>
      </div>
    </section>
  </div>
</section>
<script>
  // Other important pens.
// Map: https://codepen.io/themustafaomar/pen/ZEGJeZq
// Navbar: https://codepen.io/themustafaomar/pen/VKbQyZ

'use strict'


function $(selector) {
  return document.querySelector(selector)
}

function find(el, selector) {
  let finded
  return (finded = el.querySelector(selector)) ? finded : null
}

function siblings(el) {
  const siblings = []
  for (let sibling of el.parentNode.children) {
    if (sibling !== el) {
      siblings.push(sibling)
    }
  }
  return siblings
}

const wrapper = $('#wrapper')



// Global defaults
Chart.defaults.global.animation.duration = 2000; // Animation duration
Chart.defaults.global.title.display = false; // Remove title
Chart.defaults.global.defaultFontColor = '#71748c'; // Font color
Chart.defaults.global.defaultFontSize = 13; // Font size for every label

// Tooltip global resets
Chart.defaults.global.tooltips.backgroundColor = '#111827'
Chart.defaults.global.tooltips.borderColor = 'blue'

// Gridlines global resets
Chart.defaults.scale.gridLines.zeroLineColor = '#3b3d56'
Chart.defaults.scale.gridLines.color = '#3b3d56'
Chart.defaults.scale.gridLines.drawBorder = false

// Legend global resets
Chart.defaults.global.legend.labels.padding = 0;
Chart.defaults.global.legend.display = false;

// Ticks global resets
Chart.defaults.scale.ticks.fontSize = 12
Chart.defaults.scale.ticks.fontColor = '#71748c'
Chart.defaults.scale.ticks.beginAtZero = false
Chart.defaults.scale.ticks.padding = 10

// Elements globals
Chart.defaults.global.elements.point.radius = 0

// Responsivess
Chart.defaults.global.responsive = true
Chart.defaults.global.maintainAspectRatio = false

// The bar chart
var myChart = new Chart(document.getElementById('myChart'), {
  type: 'bar',
  data: {
    labels: ["janeiro", "fevereiro", "março", "abril", 'maio', 'junho', 'julho', 'agosto'],
    datasets: [{
      label: "Lost",
      data: [45, 25, 40, 20, 60, 20, 35, 25],
      backgroundColor: "#0d6efd",
      borderColor: 'transparent',
      borderWidth: 2.5,
      barPercentage: 0.4,
    }, {
      label: "Succes",
      startAngle: 2,
      data: [20, 40, 20, 50, 25, 40, 25, 10],
      backgroundColor: "#dc3545",
      borderColor: 'transparent',
      borderWidth: 2.5,
      barPercentage: 0.4,
    }]
  },
  options: {
    scales: {
      yAxes: [{
        gridLines: {},
        ticks: {
          stepSize: 15,
        },
      }],
      xAxes: [{
        gridLines: {
          display: false,
        }
      }]
    }
  }
})

// The line chart
var chart = new Chart(document.getElementById('myChart2'), {
  type: 'line',
  data: {
    labels: ["janeiro", "fevereiro", "março", "abril", 'maio', 'junho', 'julho', 'agosto'],
    datasets: [{
      label: "My First dataset",
      data: [4, 20, 5, 20, 5, 25, 9, 18],
      backgroundColor: 'transparent',
      borderColor: '#0d6efd',
      lineTension: .4,
      borderWidth: 1.5,
    }, {
      label: "Month",
      data: [11, 25, 10, 25, 10, 30, 14, 23],
      backgroundColor: 'transparent',
      borderColor: '#dc3545',
      lineTension: .4,
      borderWidth: 1.5,
    }, {
      label: "Month",
      data: [16, 30, 16, 30, 16, 36, 21, 35],
      backgroundColor: 'transparent',
      borderColor: '#f0ad4e',
      lineTension: .4,
      borderWidth: 1.5,
    }]
  },
  options: {
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false
        },
        ticks: {
          stepSize: 12,
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
        },
      }]
    }
  }
})

var chart = document.getElementById('chart3');
var myChart = new Chart(chart, {
  type: 'line',
  data: {
    labels: ["Um", "Dois", "Três", "Quatro", "Cinco", 'Seis', "Sete", "Oito"],
    datasets: [{
      label: "Lost",
      lineTension: 0.2,
      borderColor: '#d9534f',
      borderWidth: 1.5,
      showLine: true,
      data: [3, 30, 16, 30, 16, 36, 21, 40, 20, 30],
      backgroundColor: 'transparent'
    }, {
      label: "Lost",
      lineTension: 0.2,
      borderColor: '#5cb85c',
      borderWidth: 1.5,
      data: [6, 20, 5, 20, 5, 25, 9, 18, 20, 15],
      backgroundColor: 'transparent'
    },
               {
                 label: "Lost",
                 lineTension: 0.2,
                 borderColor: '#f0ad4e',
                 borderWidth: 1.5,
                 data: [12, 20, 15, 20, 5, 35, 10, 15, 35, 25],
                 backgroundColor: 'transparent'
               },
               {
                 label: "Lost",
                 lineTension: 0.2,
                 borderColor: '#337ab7',
                 borderWidth: 1.5,
                 data: [16, 25, 10, 25, 10, 30, 14, 23, 14, 29],
                 backgroundColor: 'transparent'
               }]
  },
  options: {
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false
        },
        ticks: {
          stepSize: 12
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
        },
      }],
    }
  }
})

</script>
              <!-- end dashboard -->
            </div>
        </div>
    </div>
</x-app-layout>
