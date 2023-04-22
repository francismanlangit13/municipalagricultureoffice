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
  <li class="breadcrumb-item">Concern</li>
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
							<button class="btn btn-primary btn-flat btn-sm" id="submit-btn"><i class="fa fa-filter"></i> Filter</button>
							<button class="btn btn-sm btn-flat btn-success" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
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
<div class="container-fluid">
	<div class="row">
		<div class="col-2 d-flex justify-content-center align-items-center">
			<img src="<?php echo base_url ?>assets/img/system/logo.png" class="img-circle" id="sys_logo" alt="System Logo">
		</div>
		<div class="col-8">
			<h4 class="text-center"><b>Municipal Agriculture Office Jimenez</b></h4>
			<h3 class="text-center"><b>Concern</b></h3>
			<h5 class="text-center"><b>as of</b></h5>
			<h5 class="text-center"><b><?php echo date("F d, Y", strtotime($from)). " - ".date("F d, Y", strtotime($to)); ?></b></h5>
		</div>
		<div class="col-2"></div>
	</div>
	<table class="table text-center table-hover table-striped">
		<colgroup>
			<col width="5%">
			<col width="10%">
			<col width="15%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
		</colgroup>
		<thead>
			<tr class="bg-success text-light">
				<th>No.</th>
				<th>Date/Time Concern</th>
				<th>Concern Message</th>
				<th>Farmer</th>
				<th>Action by</th>
				<th>Action by date</th>
				<th>Delete by</th>
				<th>Delete by date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$i = 1;
				$qry = $con->query("SELECT concern.*, user.*,
				DATE_FORMAT(concern.date_created, '%m-%d-%Y %h:%i:%s %p') as short_date_created,
				DATE_FORMAT(concern.date_updated, '%m-%d-%Y %h:%i:%s %p') as short_date_updated,
				DATE_FORMAT(concern.date_deleted, '%m-%d-%Y %h:%i:%s %p') as short_date_deleted
				FROM user INNER JOIN concern where user.user_id = concern.user_id AND date(date_created) between '{$from}' and '{$to}' order by unix_timestamp(date_created) asc");
				while($row = $qry->fetch_assoc()):
			?>
				<tr>
					<td class="text-center"><?php echo $row['concern_id'] ?></td>
					<td class=""><?php echo $row['short_date_created'] ?></td>
					<td class=""><p class="m-0"><?php echo $row['message'] ?></p></td>
					<td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
					<td class=""><p class="m-0"><?php echo $row['person'] ?></p></td>
					<td class="">
						<p class="m-0">
							<?php if($row['date_updated'] == '0000-00-00 00:00:00'){
							} else{ echo $row['short_date_updated']; } ?>
						</p>
					</td>
					<td class=""><p class="m-0"><?php echo $row['deleted_by'] ?></p></td>
					<td class="">
						<p class="m-0">
							<?php if($row['date_deleted'] == '0000-00-00 00:00:00'){
							} else{ echo $row['short_date_deleted']; } ?>
						</p>
					</td>
					<td class="text-center">
						<?php 
							switch ($row['status_id']){
								case 1:
									echo '<span class="rounded-pill badge badge-secondary bg-gradient-secondary px-3">Pending</span>';
									break;
								case 2:
									echo '<span class="rounded-pill badge badge-primary bg-gradient-purple px-3">Approved</span>';
									break;
								case 3:
									echo '<span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Deny</span>';
									break;
							}
						?>
					</td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
        $('.select2').select2({
            width:'100%'
        })
        $('#filter').submit(function(e){
            e.preventDefault();
            //location.href= './?page=reports/date_wise_transaction&'+$(this).serialize();
        })
	})
</script>
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