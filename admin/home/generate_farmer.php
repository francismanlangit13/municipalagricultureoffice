<?php
  include('../includes/header.php');
?>
<ol class="breadcrumb mb-4 noprint">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Generate</li>
  <li class="breadcrumb-item">Farmer</li>
</ol>

<div class="col-xl-12 col-md-12 mb-4 noprint">
	<div class="card border-left-primary border-equal-primary shadow">
		<div class="card-body">
			<fieldset>
				<legend>Filter</legend>
				<form action="" id="filter" method="POST">
					<div class="row align-items-end">
						<div class="form-group col-md-2">
							<label for="address" class="required">Barangay</label>
							<select class="form-control" name="barangay" id="barangay" required>
								<option value="" selected="true" disabled="disabled">Select Barangay</option>
								<option value="Adorable">Adorable</option>    
								<option value="Butuay">Butuay</option> 
								<option value="Carmen">Carmen</option> 
								<option value="Corrales">Corrales</option> 
								<option value="Dicoloc">Dicoloc</option> 
								<option value="Gata">Gata</option> 
								<option value="Guintomoyan">Guintomoyan</option> 
								<option value="Malibacsan">Malibacsan</option> 
								<option value="Macabayao">Macabayao</option> 
								<option value="Matugas Alto">Matugas Alto</option> 
								<option value="Matugas Bajo">Matugas Bajo</option> 
								<option value="Mialem">Mialem</option> 
								<option value="Naga">Naga</option> 
								<option value="Palilan">Palilan</option> 
								<option value="Nacional">Nacional</option> 
								<option value="Rizal">Rizal</option>
								<option value="San Isidro">San Isidro</option> 
								<option value="Santa Cruz">Santa Cruz</option>
								<option value="Sibaroc">Sibaroc</option>
								<option value="Sinara Alto">Sinara Alto</option>
								<option value="Sinara Bajo">Sinara Bajo</option>
								<option value="Seti">Seti</option>
								<option value="Tabo-o">Tabo-o</option>
								<option value="Taraka">Taraka</option>
							</select>
                        </div>
						<div class="form-group" style="margin-left:1.5rem;">
							<input class="form-check-input" type="checkbox" value="Phone" name="Phone">
							<label class="form-check-label" for="Phone">Phone</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="Email" name="Email">
							<label class="form-check-label" for="Email">Email</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="Purok" name="Purok">
							<label class="form-check-label" for="Purok">Purok</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="PWD" name="PWD">
							<label class="form-check-label" for="PWD">PWD</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="4ps" name="4ps">
							<label class="form-check-label" for="4ps">4ps</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="Indigenous" name="Indigenous">
							<label class="form-check-label" for="Indigenous">Indigenous</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="farmersassoc" name="farmersassoc">
							<label class="form-check-label" for="farmersassoc">Farmers Association/Cooperative</label>
						</div>
						<div class="form-group" style="margin-left:2rem;">
							<input class="form-check-input" type="checkbox" value="Main Livelihood" name="Livelihood">
							<label class="form-check-label" for="Main Livelihood">Main Livelihood</label>
						</div>
						<div class="form-group col-md-4">
							<button class="btn btn-primary btn-flat btn-sm" name="submit-btn" id="submit-btn"><i class="fa fa-filter"></i> Filter</button>
							<button class="btn btn-sm btn-flat btn-secondary" type="button" onclick="window.print()" <?php if(isset($_POST['barangay'])) { } else { echo "disabled";} ?>><i class="fa fa-print"></i> Print</button>
							<button class="btn btn-sm btn-flat btn-success" type="button" id="export-btn-csv" <?php if(isset($_POST['barangay'])) { } else { echo "disabled";} ?>><i class="fas fa-file-csv"></i> CSV</button>
							<button class="btn btn-sm btn-flat btn-danger" type="button" onclick="printPDF()" <?php if(isset($_POST['barangay'])) { } else { echo "disabled";} ?>><i class="fas fa-file-pdf"></i> PDF</button>
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
			<h3 class="text-center"><b>List of Farmer in Barangay (<?php if(isset($_POST['barangay'])) { echo $barangay = $_POST['barangay']; } else { echo "Undefined";} ?>)</b></h3>
			<br><br>
		</div>
		<div class="col-2"></div>
	</div>
	<?php
		if(isset($_POST['submit-btn'])){
			$barangay = $_POST['barangay'];
			if(isset($_POST['Phone'])) {
				$phone = $_POST['Phone'];
			}
			if(isset($_POST['Email'])) {
				$email = $_POST['Email'];
			}
			if(isset($_POST['Purok'])) {
				$purok = $_POST['Purok'];
			}
			if(isset($_POST['PWD'])) {
				$pwd = $_POST['PWD'];
			}
			if(isset($_POST['4ps'])) {
				$forps = $_POST['4ps'];
			}
			if(isset($_POST['Indigenous'])) {
				$indigenous = $_POST['Indigenous'];
			}
			if(isset($_POST['farmersassoc'])) {
				$farmersassoc = $_POST['farmersassoc'];
			}
			if(isset($_POST['Livelihood'])) {
				$livelihood = $_POST['Livelihood'];
			}

			$stmt = $con->prepare("SELECT * FROM user WHERE user_type_id = 3 AND barangay = ?");
			$stmt->bind_param("s", $barangay);
			$stmt->execute();
			$result = $stmt->get_result();
	?>
	<table class="table text-center table-hover table-striped">
		<colgroup>
			<col width="10%">
			<col width="10%">
			<?php if(isset($_POST['Phone'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['Email'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['Purok'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['PWD'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['4ps'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['Indigenous'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['farmersassoc'])) { ?>
				<col width="10%">
			<?php } ?>
			<?php if(isset($_POST['Livelihood'])) { ?>
				<col width="10%">
			<?php } ?>
		</colgroup>
		<thead>
			<tr class="bg-success text-light">
				<th>RSBSA No.</th>
				<th>Farmer</th>
				<?php if(isset($_POST['Phone'])) { ?>
					<th>Phone number</th>
				<?php } ?>
				<?php if(isset($_POST['Email'])) { ?>
					<th>Email</th>
				<?php } ?>
				<?php if(isset($_POST['Purok'])) { ?>
					<th>Purok</th>
				<?php } ?>
				<?php if(isset($_POST['PWD'])) { ?>
					<th>PWD</th>
				<?php } ?>
				<?php if(isset($_POST['4ps'])) { ?>
					<th>4ps</th>
				<?php } ?>
				<?php if(isset($_POST['Indigenous'])) { ?>
					<th>Indigenous</th>
				<?php } ?>
				<?php if(isset($_POST['farmersassoc'])) { ?>
					<th>Farmers Association/Cooperative</th>
				<?php } ?>
				<?php if(isset($_POST['Livelihood'])) { ?>
					<th>Main Livelihood</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php		
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<tr>';
							echo '<td class="text-center">' . $row['reference_number'] . '</td>';
							echo '<td class=""><p class="m-0">' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix'] . '</p></td>';
							if(isset($_POST['Phone'])) { 
								echo '<td class=""><p class="m-0">' . $row['phone'] . '</p></td>';
							}
							if(isset($_POST['Email'])) { 
								echo '<td class=""><p class="m-0">' . $row['email'] . '</p></td>';
							}
							if(isset($_POST['Purok'])) { 
								echo '<td class=""><p class="m-0">' . $row['purok'] . '</p></td>';
							}
							if(isset($_POST['PWD'])) { 
								echo '<td class=""><p class="m-0">' . $row['pwd'] . '</p></td>';
							}
							if(isset($_POST['4ps'])) { 
								echo '<td class=""><p class="m-0">' . $row['4ps'] . '</p></td>';
							}
							if(isset($_POST['Indigenous'])) { 
								echo '<td class=""><p class="m-0">' . $row['ig'] . '</p></td>';
							}
							if(isset($_POST['farmersassoc'])) { 
								echo '<td class=""><p class="m-0">' . $row['farmersassoc'] . '</p></td>';
							}
							if(isset($_POST['Livelihood'])) { 
								echo '<td class=""><p class="m-0">' . $row['livelihood'] . '</p></td>';
							}
							echo '</tr>';
						}
					} else {
						echo '<tr>';
						echo '<th class="py-1 text-center" colspan="12">No Data.</th>';
						echo '</tr>';
					}

					$stmt->close();
				}
			?>
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
        var filename = "export_farmer-" + date + ".csv";
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
			pdf.save("export_farmer-" + date + ".pdf");
		});
	}
</script>