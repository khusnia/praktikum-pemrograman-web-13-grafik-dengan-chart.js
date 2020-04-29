<?php
include('koneksi.php');
$negara = mysqli_query($koneksi,"select * from tbl_covid");
while($row = mysqli_fetch_array($negara)){
	$nama_negara[] = $row['nama_negara'];
	
	$query = mysqli_query($koneksi,"select id,nama_negara,total_kasus from tbl_covid where id='".$row['id']."'");
	$row = $query->fetch_array();
	$total_kasus[] = $row['total_kasus'];
}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($total_kasus); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(26, 214, 13, 0.2)',
					'rgba(138, 4, 113, 0.2)',
					'rgba(111, 80, 10, 0.2)',
					'rgba(128, 128, 128, 0.2)',
					'rgba(0, 0, 0, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(26, 214, 13, 1)',
					'rgba(138, 4, 113, 1',
					'rgba(111, 80, 10, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(0, 0, 0, 1)'
					],
					label: 'Grafik Perbandingan Total Kasus Penderita Covid-19 di 10 Negara'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>