<?php
    include('authentication.php');
?>
    <head>
        <?php
            include('includes/header.php');
        ?>
        <!-- Script QR Code scanner -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    </head>
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Farmer</li>
        <li class="breadcrumb-item">View Account</li>
    </ol>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $users = "SELECT * FROM user WHERE user_id='$id' ";
            $users_run = mysqli_query($con, $users);

            if(mysqli_num_rows($users_run) > 0){
                foreach($users_run as $user){
    ?>
    <div class="container">
    <form action="code.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <h5>PART I: Farmer Information</h5>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="reference_number">Reference Number</label>
                                <p><?=$user['reference_number'];?></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="Last Name">Last Name</label>
                                <p><?=$user['lname'];?></p>
                            </div> 
                        
                            <div class="col-md-3 mb-3">
                                <label for="Middle Name">Middle Name</label>
                                <p><?=$user['mname'];?></p>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="First Name">First Name</label>
                                <p><?=$user['fname'];?></p>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix">Suffix</label>
                                <p><?=$user['suffix'];?></p>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="Gender">Gender</label>
                                <p><?=$user['gender'];?></p>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="Email">Email Address</label>
                                <p><?=$user['email'];?></p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <hr>
                            </div>

                            <div class="col-md-4 mb-3">   
                                <label for="Purok">Purok</label>
                                <p><?=$user['purok'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Sreet">Street</label>
                                <p><?=$user['street'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Barangay">Barangay</label>
                                <p><?=$user['barangay'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Municipality/City">Municipality/City</label>
                                <p><?=$user['municipality'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Province">Province</label>
                                <p><?=$user['province'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Region">Region</label>
                                <p><?=$user['region'];?></p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <hr>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Mobile Number" class="required">Mobile Number</label>
                                <p><?=$user['phone'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Religion</label>
                                <p><?=$user['religion'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="date" class="required">Date of Birth</label>
                                <?=$user['birthday'];?>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="" class="required">Place of Birth</label>
                                <p><?=$user['birthplace'];?></p>
                            </div> 

                            <div class="col-md-3 mb-3">
                                <label for="" class="required">Civil Status</label>
                                <p><?=$user['civil_status'];?></p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <hr>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Person with Disability (PWD)</label>
                                <p><?=$user['pwd'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">4P's Beneficiary?</label>
                                <p><?=$user['4ps'];?></p>
                            </div>

                            <div class="col-md-12 mb-3">
                            <hr>
                            </div>

                            <div class="col-md-4 mb-3">
                            <label for="" class="required">Member of an <strong>Indigenous Group</strong>?</label>
                            <p><?=$user['ig'];?></p>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="">If yes, specify:</label>
                                <p><?=$user['ig_specify'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                            <label for="" class="required">With <strong>Government ID</strong>?</label>
                            <p><?=$user['govid'];?></p>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="">If yes, specify:</label>
                                <p><?=$user['govid_specify'];?></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Member of any <strong>Farmers Association/Cooperative</strong>?</label>
                                <p><?=$user['farmersassoc'];?></p>
                            </div>

                            
                            <div class="col-md-8 mb-3">
                                <label for="">If yes, specify:</label>
                                <p><?=$user['farmersassoc_specify'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card mt-1">
                    <div class="card-header">
                        <h5>PART II: Farm Profile</h5>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="required"><strong>Main Livelihood</strong></label>
                                <br>
                                <p><?=$user['livelihood'];?></p>
                            </div>

                            <?php if($user['livelihood']=="Farmer") { ?>
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-center mt-4"><b>FOR FARMER</b></h5>
                                    <h6 class="text-center mt-4"><u>Type of Farming Activity</u></strong></h6>
                                
                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Rice" name="rice" <?php if($user['rice']=="Rice") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="rice">Rice</label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input disabled class="form-check-input" type="checkbox" value="Corn" name="corn"<?php if($user['corn']=="Corn") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="corn">Corn</label>
                                    </div>

                                    <label fowr="">Other Crops Specify:</label>
                                    <p><?=$user['other_crops_specify'];?></p>
                                    <br>

                                    <div class="form-check mt-2">
                                        <input disabled class="form-check-input" type="checkbox" value="Livestock" id="livestock" name="livestock" <?php if($user['livestock']=="Livestock") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="livestock">Livestock</label>
                                    </div>

                                    <label for="">Specify:</label>
                                    <p><?=$user['livestock_specify'];?></p>
                                    <br>

                                    <div class="form-check mt-2">
                                        <input disabled class="form-check-input" type="checkbox" value="Poultry" id="poultry" name="poultry" <?php if($user['poultry']=="Poultry") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="poultry">Poultry</label>
                                    </div>
                                    
                                    <label for="">Specify:</label>
                                    <p><?=$user['poultry_specify'];?></p>
                                    <br>
                                </div>
                            <?php } ?>

                            <?php if($user['livelihood']=="Farmworker") { ?>
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-center mt-4"><b>FOR FARMWORKER</b></h5>
                                    <h6 class="text-center mt-4"><u>Kind of Work</u></strong></h6>

                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Owner" name="owner" <?php if($user['owner']=="Owner") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="owner">Owner</label>
                                    </div>

                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Land Preparation" name="land" <?php if($user['land']=="Land Preparation") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="land">Land Preparation</label>
                                    </div>

                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Cultivation" name="cultivation" <?php if($user['cultivation']=="Cultivation") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="cultivation">Cultivation</label>
                                    </div>

                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Planting" name="planting" <?php if($user['planting']=="Planting") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="planting">Planting</label>
                                    </div>

                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="checkbox" value="Harvesting" name="harvesting" <?php if($user['harvesting']=="Harvesting") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="Harvesting">Harvesting</label>
                                    </div>
                                        
                                    <label for="">Others, Please Specify:</label>
                                    <p><?=$user['other_farmworker_specify'];?></p>
                                    <br>
                                </div>
                            <?php } ?>

                            <?php if($user['livelihood']=="Agri Youth") {?>
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-center mt-4"><b>FOR AGRI YOUTH</b></h5>
                                    <h6 class="text-center mt-4"><u>Type of Involvement</u></strong></h6>
                                    <p class="text-info">For the purpose of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Part of a farming household" name="part_of_farming" <?php if($user['part_of_farming']=="Part of a farming household") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="Part of a farming household">Part of a farming household</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Attending/Attended formal agri-fishery related course" name="attending_formal" <?php if($user['attending_formal']=="Attending/Attended formal agri-fishery related course") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="Attending/Attended formal agri-fishery related course">Attending/Attended formal agri-fishery related course</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Attending/Attended non-formal agri-fishery related course" name="attending_nonformal" <?php if($user['attending_nonformal']=="Attending/Attended non-formal agri-fishery related course") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="Attending/Attended non-formal agri-fishery related course">Attending/Attended non-formal agri-fishery related course</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Participated in any agricultural activity/program" name="participated" <?php if($user['participated']=="Participated in any agricultural activity/program") {?> <?php echo "checked";?> <?php }?>>
                                        <label class="form-check-label" for="Participated in any agricultural activity/program">Participated in any agricultural activity/program</label>
                                    </div>

                                    <label for="">Others, Please Specify:</label>
                                    <p><?=$user['other_agri_youth_specify'];?></p>
                                    <br>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <br>
                <div class="card mt-1">
                    <div class="card-header">
                        <h5>PART III: Farm Document</h5>
                    </div>
                    <div class="col-md-5 text-center">
                        <br>
                        <h5>Current Picture</h5>
                        <img class="mt-2" id="frame"
                            <?php
                                if(isset($user['picture'])){
                                    echo 'src ="data:image;base64,'.base64_encode($user['picture']).'"';
                                } else { echo 'src ="../assets/img/no-image.png"'; }
                            ?>
                        alt="Profile Picture" width="240px" height="180px"/>
                    </div>
                    <br>
                </div>
                <br>
                
                <div class="text-right">
                    <a href="farmer_account.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <br>
            </div>
        </div>
    </form>
    <?php
            }
        } else{
    ?>
    <h4>No Record Found!</h4>
    <?php
            }
        }
    ?>

<?php include('includes/footer.php');?>
<script>
    // File upload image preview
    function preview() {
        let image = document.getElementById("frame");
        let fileInput = document.getElementsByName("profilepicture")[0];
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = "../assets/img/no-image.png";
        }
    }
</script>