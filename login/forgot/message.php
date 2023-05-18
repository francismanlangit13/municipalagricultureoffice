<?php
    if(isset($_SESSION['status']) && $_SESSION['status_code'] !='' ){
        $delay_time = 1500;
?>
<script>
    setTimeout(function() {
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            timer: 8000,
            button: "Close",
        }).then(
            function () {},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    //console.log('I was closed by the timer')
                }
            }
        )
    }, <?php echo $delay_time; ?>);
</script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>