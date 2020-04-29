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
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Perbandingan Total Kasus Penderita Covid-19 di 10 Negara',
					data: <?php echo json_encode($total_kasus); ?>,
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54,162,235,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>