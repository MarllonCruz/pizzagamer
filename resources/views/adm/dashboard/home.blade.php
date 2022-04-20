@extends('adm.common.template')

@section('content')
   <section class="dashboard">
      <h2>Dashaboard</h2>

      <div class="content">
        <div class="left">
            <div class="amounts">
                <div class="box">
                    <h3>Total usuários</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="box">
                    <h3>Total postagens</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                </div>
                <div class="box">
                    <h3>Total videos</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-clapperboard"></i>
                    </div>
                </div>
              </div>
              
              <div class="chart-days">
                <canvas style="width: 100%; height: 100%; margin: 0;" id="chartDays"></canvas>
              </div>
        </div>
        <div class="right">
          <div class="chart-most-visited-pages">
            <canvas style="width: 100%; height: 100%; margin: 0;" id="chartMostVisitedPages"></canvas>
          </div>
          <div class="chart-devices">
            <canvas style="height: 180px; margin: 0;" id="chartDevices"></canvas>
          </div>
        </div>
      </div>
   </section>
@endsection

@section('script')
<script>
    // Chart Dyas
    const labelsDyas = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'January',
      'February',
      
    ];
  
    const dataDyas = {
      labels: labelsDyas,
      datasets: [{
        label: 'Visualização',
        backgroundColor: '#fff',
        borderColor: '#fff',
        data: [0, 10, 5, 2, 20, 30, 45, 0, 10, 5, 2, 2, 20, 30, 45, 0, 10, 5, 2, 2],
        borderRadius: 5,
      }]
    };
  
    const configDyas = {
      type: 'bar',
      data: dataDyas,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
          title: {
            display: true,
            text: 'Visitas no site',
            color: "#FFF",
            align: 'start',
            font: {
              size: 26,
              weight: 'bold',
              family: 'Fredoka'
            },
            padding: 20
          }
        }
      }
    };

    const chartDays = new Chart(
        document.getElementById('chartDays'),
        configDyas
    );
    
    // Chart Visited Pages
    const labelsPages = [
      'Page 1',
      'Page 2',
      'Page 3',
      'Page 4',
      'Page 5',
    ];

    const dataPages = {
      labels: labelsPages,
      datasets: [{
        label: 'Visualização',
        backgroundColor: '#fff',
        borderColor: '#fff',
        data: [2, 10, 5, 2, 20],
        borderRadius: 5,
      }]
    };

    const configPages = {
      type: 'bar',
      data: dataPages,
      options: {
        indexAxis: 'y',
        elements: {
          bar: {
            borderWidth: 2,
          }
        },
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
          title: {
            display: true,
            text: 'Paginas mais visitadas',
            color: "#FFF",
            align: 'start',
            font: {
              size: 22,
              weight: 'bold',
              family: 'Fredoka'
            },
            padding: 20
          }
        }
      },
    };

    const chartPages = new Chart(
      document.getElementById('chartMostVisitedPages'),
      configPages
    );

    // Chart Devices
    const dataDevices = {
      labels: ['Mobile', 'PC', 'Tablet'],
      datasets: [
        {
          label: 'Dataset 1',
          data: [10, 20, 25],
          backgroundColor: ['blue', 'red', 'green'],
          borderColor: '#1e1f25',
          borderWidth: 5,
          borderRadius: 8,
        }
      ]
    };

    const configDevices = {
      type: 'doughnut',
      data: dataDevices,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
          title: {
            display: true,
            text: 'Dispositos',
            color: "#FFF",
            align: 'start',
            font: {
              size: 22,
              weight: 'bold',
              family: 'Fredoka'
            }
          }
        }
      },
    };

    const chartDevices = new Chart(
      document.getElementById('chartDevices'),
      configDevices
    );
</script>
@endsection