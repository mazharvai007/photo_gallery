  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- TinyMCE Editor Integration -->
  <script src="//cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Views',    <?php echo $session->count; ?>],
              ['Comments',    <?php echo Comment::count_all(); ?>],
              ['Users',    <?php echo User::count_all(); ?>],
              ['Photos', <?php echo Photo::count_all(); ?>]
          ]);

          var options = {
              is3D: true,
              title: 'My Daily Activities',
              legend: 'none',
              pieSliceText: 'label',
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
      }
  </script>

  <script src="js/dropzone.js"></script>
  <script src="js/script.js"></script>

</body>

</html>
