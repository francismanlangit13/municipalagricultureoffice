<head>
    <?php
        include('../includes/header.php');
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
                        <input disabled type="text" value="<?=$user['reference_number'];?>" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Last Name">Last Name</label>
                        <input disabled type="text" value="<?=$user['lname'];?>" class="form-control">
                    </div> 
                
                    <div class="col-md-3 mb-3">
                        <label for="Middle Name">Middle Name</label>
                        <input disabled type="text" value="<?=$user['mname'];?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="First Name">First Name</label>
                        <input disabled type="text" value="<?=$user['fname'];?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="suffix">Suffix</label>
                        <input disabled type="text" value="<?=$user['suffix'];?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="Gender">Gender</label>
                        <br>
                        <input disabled class="ml-2" type="radio" value="Male" <?php if($user['gender']=="Male") {?> <?php echo "checked";?> <?php }?>> Male
                        <input disabled class="ml-2"  type="radio" value="Female" <?php if($user['gender']=="Female") {?> <?php echo "checked";?> <?php }?>> Female
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="Email">Email Address</label>
                        <input disabled type="text" value="<?=$user['email'];?>" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>

                    <div class="col-md-4 mb-3">   
                        <label for="Purok">Purok</label>
                        <input disabled type="text" value="<?=$user['purok'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Sreet">Street</label>
                        <input disabled type="text" value="<?=$user['street'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Barangay">Barangay</label>
                        <input disabled type="text" value="<?=$user['barangay'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Municipality/City">Municipality/City</label>
                        <input disabled type="text" value="<?=$user['municipality'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Province">Province</label>
                        <input disabled type="text" value="<?=$user['province'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Region">Region</label>
                        <input disabled type="text" value="<?=$user['region'];?>" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Mobile Number">Mobile Number</label>
                        <input disabled type="text" value="<?=$user['phone'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Religion</label>
                        <input disabled type="text" value="<?=$user['religion'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="date">Date of Birth</label>
                        <input disabled class="form-control" value="<?=$user['birthday'];?>" placeholder="MM/DD/YYY" type="date"/>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="">Place of Birth</label>
                        <textarea disabled type="text" value="<?=$user['birthplace'];?>" class="form-control"><?=$user['birthplace'];?></textarea>
                    </div> 

                    <div class="col-md-3 mb-3">
                        <label for="">Civil Status</label>
                        <input disabled type="text" value="<?=$user['civil_status'];?>" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Person with Disability (PWD)</label>
                        <p><?=$user['pwd'];?></p>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">4P's Beneficiary?</label>
                        <p><?=$user['4ps'];?></p>
                    </div>

                    <div class="col-md-12 mb-3">
                    <hr>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="">Member of an <strong>Indigenous Group</strong>?</label>
                    <p><?=$user['ig'];?></p>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="">If yes, specify:</label>
                        <input disabled type="text" value="<?=$user['ig_specify'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                    <label for="">With <strong>Government ID</strong>?</label>
                    <p><?=$user['govid'];?></p>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="">If yes, specify:</label>
                        <input disabled type="text" value="<?=$user['govid_specify'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Member of any <strong>Farmers Association/Cooperative</strong>?</label>
                        <p><?=$user['farmersassoc'];?></p>
                    </div>

                    
                    <div class="col-md-8 mb-3">
                        <label for="">If yes, specify:</label>
                        <input disabled type="text" value="<?=$user['farmersassoc_specify'];?>" class="form-control">
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
                        <label for=""><strong>Main Livelihood</strong></label>
                        <br>
                        <input disabled class="ml-4" type="radio" value="Farmer" id="option1" onclick="showDiv('div1')" <?php if($user['livelihood']=="Farmer") {?> <?php echo "checked";?> <?php }?>> Farmer
                        <input disabled  class="ml-4" type="radio" value="Farmworker" id="option2" onclick="showDiv('div2')" <?php if($user['livelihood']=="Farmworker") {?> <?php echo "checked";?> <?php }?>> Farmworker/Laborer
                        <input disabled  class="ml-4" type="radio" value="Agri Youth" id="option3" onclick="showDiv('div3')" <?php if($user['livelihood']=="Agri Youth") {?> <?php echo "checked";?> <?php }?>> Agri Youth
                        <p><?=$user['livelihood'];?></p>
                    </div>

                    <?php if($user['livelihood']=="Farmer") { ?>
                        <div class="col-md-12 mb-3">
                            <h5 class="text-center mt-4"><b>FOR FARMER</b></h5>
                            <h6 class="text-center mt-4"><u>Type of Farming Activity</u></strong></h6>
                        
                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Rice" <?php if($user['rice']=="Rice") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="rice">Rice</label>
                            </div>

                            <div class="form-check mt-2">
                                <input disabled class="form-check-input" type="checkbox" value="Corn"<?php if($user['corn']=="Corn") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="corn">Corn</label>
                            </div>

                            <label fowr="">Other Crops Specify:</label>
                            <input disabled type="text" value="<?=$user['other_crops_specify'];?>" class="form-control">
                            <br>

                            <div class="form-check mt-2">
                                <input disabled class="form-check-input" type="checkbox" value="Livestock" id="livestock" <?php if($user['livestock']=="Livestock") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="livestock">Livestock</label>
                            </div>

                            <label for="">Specify:</label>
                            <input disabled type="text" value="<?=$user['livestock_specify'];?>" class="form-control">
                            <br>

                            <div class="form-check mt-2">
                                <input disabled class="form-check-input" type="checkbox" value="Poultry" id="poultry" <?php if($user['poultry']=="Poultry") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="poultry">Poultry</label>
                            </div>
                            
                            <label for="">Specify:</label>
                            <input disabled type="text" value="<?=$user['poultry_specify'];?>" class="form-control">
                            <br>
                        </div>
                    <?php } ?>

                    <?php if($user['livelihood']=="Farmworker") { ?>
                        <div class="col-md-12 mb-3">
                            <h5 class="text-center mt-4"><b>FOR FARMWORKER</b></h5>
                            <h6 class="text-center mt-4"><u>Kind of Work</u></strong></h6>

                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Owner"<?php if($user['owner']=="Owner") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="owner">Owner</label>
                            </div>

                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Land Preparation" <?php if($user['land']=="Land Preparation") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="land">Land Preparation</label>
                            </div>

                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Cultivation" <?php if($user['cultivation']=="Cultivation") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="cultivation">Cultivation</label>
                            </div>

                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Planting" <?php if($user['planting']=="Planting") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="planting">Planting</label>
                            </div>

                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" value="Harvesting" <?php if($user['harvesting']=="Harvesting") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Harvesting">Harvesting</label>
                            </div>
                                
                            <label for="">Others, Please Specify:</label>
                            <input disabled type="text" value="<?=$user['other_farmworker_specify'];?>" class="form-control">
                            <br>
                        </div>
                    <?php } ?>

                    <?php if($user['livelihood']=="Agri Youth") {?>
                        <div class="col-md-12 mb-3">
                            <h5 class="text-center mt-4"><b>FOR AGRI YOUTH</b></h5>
                            <h6 class="text-center mt-4"><u>Type of Involvement</u></strong></h6>
                            <p class="text-info">For the purpose of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Part of a farming household" <?php if($user['part_of_farming']=="Part of a farming household") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Part of a farming household">Part of a farming household</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Attending/Attended formal agri-fishery related course" <?php if($user['attending_formal']=="Attending/Attended formal agri-fishery related course") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Attending/Attended formal agri-fishery related course">Attending/Attended formal agri-fishery related course</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Attending/Attended non-formal agri-fishery related course" <?php if($user['attending_nonformal']=="Attending/Attended non-formal agri-fishery related course") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Attending/Attended non-formal agri-fishery related course">Attending/Attended non-formal agri-fishery related course</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Participated in any agricultural activity/program" <?php if($user['participated']=="Participated in any agricultural activity/program") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Participated in any agricultural activity/program">Participated in any agricultural activity/program</label>
                            </div>

                            <label for="">Others, Please Specify:</label>
                            <input disabled type="text" value="<?=$user['other_agri_youth_specify'];?>" class="form-control">
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
                <a href="
                    <?php
                        if(isset($user['picture'])){
                            if(!empty($user['picture'])) {
                                echo base_url . 'assets/img/users/' . $user['picture'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $user['fname'] . ' ' . $user['mname'] . ' ' . $user['lname'] . ' ' . $user['suffix']; ?>">
                    <img class="zoom img-fluid img-bordered-sm"
                    src="
                        <?php
                            if(isset($user['picture'])){
                                if(!empty($user['picture'])) {
                                    echo base_url . 'assets/img/users/' . $user['picture'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
            </div>
            <br>
        </div>
        <br>
        
        <div class="text-right">
            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <br>
    </div>
</div>
<?php
        }
    } else{
?>
<h4>No Record Found!</h4>
<?php
        }
    }
?>

<?php include('../includes/footer.php');?>
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