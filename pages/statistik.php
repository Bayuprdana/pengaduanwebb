<div class="shadow rounded-lg bg-white overflow-hidden">
  <div class="box box-primary box-solid">
    <div class="box-header">
      <h3 class="box-title">
        <a href="https://banjaragung.id/first/statistik/4"><i class="fa fa-chart-pie mr-2 mr-1"></i>Statistik</a>
      </h3>
    </div>
    <div class="box-body">
      <script type="text/javascript">
        $(function () {
          var chart_widget;
          $(document).ready(function () {
            // Build the chart
            chart_widget = new Highcharts.Chart({
              chart: {
                renderTo: 'container_widget',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
              },
              title: {
                text: 'Jumlah Penduduk'
              },
              yAxis: {
                title: {
                  text: 'Jumlah'
                }
              },
              xAxis: {
                categories: [
                  ['1151 <br> LAKI-LAKI'],
                  ['1079 <br> PEREMPUAN'],
                  ['2230 <br> TOTAL'],
                ]
              },
              legend: {
                enabled: false
              },
              plotOptions: {
                series: {
                  colorByPoint: true
                },
                column: {
                  pointPadding: 0,
                  borderWidth: 0
                }
              },
              series: [{
                type: 'column',
                name: 'Populasi',
                data: [
                  ['LAKI-LAKI', 1151],
                  ['PEREMPUAN', 1079],
                  ['TOTAL', 2230],
                ]
              }]
            });
          });
        });
      </script>
      <div id="container_widget" style="width: 100%; height: 300px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="0" role="region" aria-label="Jumlah Penduduk. Highcharts interactive chart." aria-hidden="false">
        <!-- Chart container content -->
      </div>
    </div>
  </div>

  <div><br><br></div>

  <div class="box box-primary box-solid">
    <div class="box-header">
      <h3 class="box-title">
        <a href="https://banjaragung.id/first/gallery"><i class="fas fa-camera mr-1 mr-1"></i>Galeri</a>
      </h3>
    </div>
    <div class="box-body grid grid-cols-3 gap-2 flex-wrap">
      <a href="https://banjaragung.id/first/sub_gallery/6" title="Album : aparatur">
        <img src="https://banjaragung.id/desa/upload/galeri/kecil_uhyHzr_WhatsApp Image 2023-04-09 at 17.24.15(3).jpeg" alt="Album : aparatur" class="w-full">
      </a>
      <a href="https://banjaragung.id/first/sub_gallery/9" title="Album : linmas">
        <img src="https://banjaragung.id/desa/upload/galeri/kecil_6BymtJ_WhatsApp Image 2023-04-09 at 17.24.15(1).jpeg" alt="Album : linmas" class="w-full">
      </a>
      <a href="https://banjaragung.id/first/sub_gallery/12" title="Album : pengurus pengajian">
        <img src="https://banjaragung.id/desa/upload/galeri/kecil_hOJLm5_WhatsApp Image 2023-04-09 at 17.24.15.jpeg" alt="Album : pengurus pengajian" class="w-full">
      </a>
      <a href="https://banjaragung.id/first/sub_gallery/5" title="Album : songong ramadhan">
        <img src="https://banjaragung.id/desa/upload/galeri/kecil_DHjoat_WhatsApp Image 2023-03-13 at 11.34.36.jpeg" alt="Album : songong ramadhan" class="w-full">
      </a>
    </div>
  </div>
</div>
