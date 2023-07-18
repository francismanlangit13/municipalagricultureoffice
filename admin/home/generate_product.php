<?php
  include('../includes/header.php');

    $from = isset($_POST['from']) ? $_POST['from'] : date("Y-m-d",strtotime(date("Y-m-d"))); 
    $to = isset($_POST['to']) ? $_POST['to'] : date("Y-m-d",strtotime(date("Y-m-d"))); 
    function duration($dur = 0){
        if($dur == 0){
            return "00:00";
        }
        $hours = floor($dur / (60 * 60));
        $min = floor($dur / (60)) - ($hours*60);
        $dur = sprintf("%'.02d",$hours).":".sprintf("%'.02d",$min);
        return $dur;
    }
?>
<ol class="breadcrumb mb-4 noprint">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Generate</li>
  <li class="breadcrumb-item">Product</li>
</ol>

<div class="col-xl-12 col-md-12 mb-4 noprint">
	<div class="card border-left-primary border-equal-primary shadow">
		<div class="card-body">
			<fieldset>
				<legend>Filter</legend>
				<form action="" id="filter" method="POST">
					<div class="row align-items-end">
						<div class="form-group col-md-3">
							<label for="from" class="control-label">Date From</label>
							<input type="date" name="from" id="from" value="<?= $from ?>" class="form-control form-control-sm rounded-0">
						</div>
						<div class="form-group col-md-3">
							<label for="to" class="control-label">Date To</label>
							<input type="date" name="to" id="to" value="<?= $to ?>" class="form-control form-control-sm rounded-0">
						</div>
						<div class="form-group col-md-4">
							<button class="btn btn-primary btn-flat btn-sm" name="submit-btn" id="submit-btn"><i class="fa fa-filter"></i> Filter</button>
							<button class="btn btn-sm btn-flat btn-secondary" type="button" onclick="window.print()" <?php if(isset($_POST['submit-btn'])) { } else { echo "disabled";} ?>><i class="fa fa-print"></i> Print</button>
							<button class="btn btn-sm btn-flat btn-success" type="button" id="export-btn-csv" <?php if(isset($_POST['submit-btn'])) { } else { echo "disabled";} ?>><i class="fas fa-file-csv"></i> CSV</button>
							<button class="btn btn-sm btn-flat btn-danger" type="button" onclick="printPDF()" <?php if(isset($_POST['submit-btn'])) { } else { echo "disabled";} ?>><i class="fas fa-file-pdf"></i> PDF</button>
						</div>
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>
<style>
	#sys_logo{
		object-fit:cover;
		object-position:center center;
		width: 6.5em;
		height: 6.5em;
	}
</style>
<div class="container-fluid" id="capture-PDF">
	<div class="row">
		<div class="col-2 d-flex justify-content-center align-items-center">
			<img src="<?php echo base_url ?>assets/img/system/logo.png" class="img-circle" id="sys_logo" alt="System Logo">
		</div>
		<div class="col-8">
			<h4 class="text-center"><b>Municipal Agriculture Office Jimenez</b></h4>
			<h3 class="text-center"><b>Product</b></h3>
			<h5 class="text-center"><b>as of</b></h5>
			<h5 class="text-center"><b><?php echo date("F d, Y", strtotime($from)). " - ".date("F d, Y", strtotime($to)); ?></b></h5>
		</div>
		<div class="col-2"></div>
	</div>
	<table class="table text-center table-hover table-striped">
		<colgroup>
			<col width="5%">
			<col width="35%">
			<col width="20%">
			<col width="20%">
			<col width="20%">
		</colgroup>
		<thead>
			<tr class="bg-success text-light">
				<th>No.</th>
				<th>Product</th>
				<th>Total Dispatch</th>
				<th>Remaining</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$qry = $con->query("SELECT product.*, request.*, SUM(request.request_quantity) AS total_request_quantity
				FROM product 
				INNER JOIN request ON product.product_id = request.product_id
				WHERE DATE(request.request_date) BETWEEN '{$from}' AND '{$to}' 
				GROUP BY product.product_id
				ORDER BY UNIX_TIMESTAMP(request.request_date) ASC");
				while($row = $qry->fetch_assoc()):
			?>
				<tr>
					<td class="text-center"><?php echo $row['product_id'] ?></td>
					<td class=""><?php echo $row['product_name'] ?></td>
					<td class=""><p class="m-0"><?php echo $row['total_request_quantity'] ?></p></td>
					<td class=""><p class="m-0"><?php echo $row['product_quantity'] ?></p></td>
					<td class=""><?php if ($row['product_status'] == 1){ echo"Active"; } else{ echo"In active"; } ?></td>
				</tr>
			<?php endwhile; ?>
			<?php if($qry->num_rows <= 0): ?>
				<tr>
					<th class="py-1 text-center" colspan="12">No Data.</th>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<?php include('../includes/footer.php'); ?>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('outprint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><head><title>Print Content</title></head><body>' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		newWin.focus();
		setTimeout(function(){newWin.print();},1000);
	}
</script>

<script>
	const fromInput = document.querySelector('#from');
	const toInput = document.querySelector('#to');

	// Attach an event listener to the "from" input field
	fromInput.addEventListener('change', () => {
		// Get the selected date in the "from" input field
		const selectedDate = new Date(fromInput.value);

		// Set the minimum value of the "to" input field to be the selected date in the "from" input field
		toInput.min = selectedDate.toISOString().split('T')[0];

		// Disable the "to" input field and the "Filter" button if the selected date is greater than or equal to today's date
		const today = new Date();
		if (selectedDate >= today) {
		toInput.disabled = true;
		$('#submit-btn').prop('disabled', true);
		} else {
		toInput.disabled = false;
		$('#submit-btn').prop('disabled', false);
		}
	});
</script>

<script>
	// Function to export table as CSV/Excel
    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        csvFile = new Blob([csv], {type: "text/csv"});
        downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    // Export table when clicking on a button
    var exportBtn = document.querySelector("#export-btn-csv");
    exportBtn.addEventListener("click", function () {
        var date = '<?php echo date("Ymd_His"); ?>';
        var filename = "export_request-" + date + ".csv";
        exportTableToCSV(filename);
    });
</script>

<script>
	// Function to export table as PDF
	function printPDF() {
		html2canvas(document.getElementById('capture-PDF')).then(function(canvas) {
			var imgData = canvas.toDataURL('image/png');
			var imgWidth = 8.5;
			var pageHeight = imgWidth * canvas.height / canvas.width;
			var pdf = new jsPDF({
				orientation: 'portrait',
				unit: 'in',
				format: 'letter'
			});
			pdf.addImage(imgData, 'PNG', 0, 0.3, imgWidth, pageHeight);
			var date = '<?php echo date("Ymd_His"); ?>';
			pdf.save("export_request-" + date + ".pdf");
		});
	}
</script>