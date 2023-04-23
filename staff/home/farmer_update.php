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
    <li class="breadcrumb-item">Update Account</li>
</ol>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $users = "SELECT * FROM user WHERE user_id='$id' AND user_status != 3 AND user_type NOT IN (1, 2)";
        $users_run = mysqli_query($con, $users);
        if(mysqli_num_rows($users_run) > 0){
            foreach($users_run as $user){
?>
<form action="code.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-1">
                <div class="card-header">
                    <h5>PART I: Farmer Information</h5>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <input type="text" name="user_id" value="<?=$user['user_id'];?>" hidden>
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Reference Number</label>
                            <input required placeholder="Enter Reference Number" type="text" name="reference_number" value="<?=$user['reference_number'];?>" pattern="\d*" minlength="15" maxlength="15" class="form-control" id="reference_number-input">
                            <div id="reference_number-error"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required placeholder="Enter First Name" type="text" value="<?=$user['lname'];?>" name="lname" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" type="text" value="<?=$user['mname'];?>" name="mname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required placeholder="Enter First Name" type="text" value="<?=$user['fname'];?>" name="fname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" name="suffix">
                                    <option value="" selected disabled>Select Suffix</option>
                                    <option value="Jr" <?= isset($user['suffix']) && $user['suffix'] == 'Jr' ? 'selected' : '' ?>>Jr</option>
                                    <option value="Sr" <?= isset($user['suffix']) && $user['suffix'] == 'Sr' ? 'selected' : '' ?>>Sr</option>
                                    <option value="I" <?= isset($user['suffix']) && $user['suffix'] == 'I' ? 'selected' : '' ?>>I</option>
                                    <option value="II" <?= isset($user['suffix']) && $user['suffix'] == 'II' ? 'selected' : '' ?>>II</option>
                                    <option value="III" <?= isset($user['suffix']) && $user['suffix'] == 'III' ? 'selected' : '' ?>>III</option>
                                    <option value="IV" <?= isset($user['suffix']) && $user['suffix'] == 'IV' ? 'selected' : '' ?>>IV</option>
                                    <option value="V" <?= isset($user['suffix']) && $user['suffix'] == 'V' ? 'selected' : '' ?>>V</option>
                                    <option value="VI" <?= isset($user['suffix']) && $user['suffix'] == 'VI' ? 'selected' : '' ?>>VI</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Gender</label>
                            <br>
                            <input required class="ml-2" type="radio" name="gender" value="Male" <?php if($user['gender']=="Male") {?> <?php echo "checked";?> <?php }?>> Male
                            <input required class="ml-2"  type="radio" name="gender" value="Female" <?php if($user['gender']=="Female") {?> <?php echo "checked";?> <?php }?>> Female
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Email Address</label>
                            <input required placeholder="Enter Email Address" type="email" value="<?=$user['email'];?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email-input">
                            <div id="email-error"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">   
                            <label for="" class="required">Purok</label>
                            <input required placeholder="Enter Purok No." type="text" pattern="\d*" minlength="1" maxlength="2" value="<?=$user['purok'];?>" name="purok" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Street</label>
                            <input required placeholder="Enter Street" type="text" value="<?=$user['street'];?>" name="street" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="address" class="required">Barangay</label>
                                <select class="form-control" name="barangay" id="barangay" required>
                                    <option value="" selected="true" disabled="disabled">Select Barangay</option>
                                    <option value="Adorable" <?= isset($user['barangay']) && $user['barangay'] == 'Adorable' ? 'selected' : '' ?>>Adorable</option>    
                                    <option value="Butuay" <?= isset($user['barangay']) && $user['barangay'] == 'Butuay' ? 'selected' : '' ?>>Butuay</option> 
                                    <option value="Carmen" <?= isset($user['barangay']) && $user['barangay'] == 'Carmen' ? 'selected' : '' ?>>Carmen</option> 
                                    <option value="Corrales" <?= isset($user['barangay']) && $user['barangay'] == 'Corrales' ? 'selected' : '' ?>>Corrales</option> 
                                    <option value="Dicoloc" <?= isset($user['barangay']) && $user['barangay'] == 'Dicoloc' ? 'selected' : '' ?>>Dicoloc</option> 
                                    <option value="Gata" <?= isset($user['barangay']) && $user['barangay'] == 'Gata' ? 'selected' : '' ?>>Gata</option> 
                                    <option value="Guintomoyan" <?= isset($user['barangay']) && $user['barangay'] == 'Guintomoyan' ? 'selected' : '' ?>>Guintomoyan</option> 
                                    <option value="Malibacsan" <?= isset($user['barangay']) && $user['barangay'] == 'Malibacsan' ? 'selected' : '' ?>>Malibacsan</option> 
                                    <option value="Macabayao" <?= isset($user['barangay']) && $user['barangay'] == 'Macabayao' ? 'selected' : '' ?>>Macabayao</option> 
                                    <option value="Matugas Alto" <?= isset($user['barangay']) && $user['barangay'] == 'Matugas Alto' ? 'selected' : '' ?>>Matugas Alto</option> 
                                    <option value="Matugas Bajo" <?= isset($user['barangay']) && $user['barangay'] == 'Matugas Bajo' ? 'selected' : '' ?>>Matugas Bajo</option> 
                                    <option value="Mialem" <?= isset($user['barangay']) && $user['barangay'] == 'Mialem' ? 'selected' : '' ?>>Mialem</option> 
                                    <option value="Naga" <?= isset($user['barangay']) && $user['barangay'] == 'Naga' ? 'selected' : '' ?>>Naga</option> 
                                    <option value="Palilan" <?= isset($user['barangay']) && $user['barangay'] == 'Palilan' ? 'selected' : '' ?>>Palilan</option> 
                                    <option value="Nacional" <?= isset($user['barangay']) && $user['barangay'] == 'Nacional' ? 'selected' : '' ?>>Nacional</option> 
                                    <option value="Rizal" <?= isset($user['barangay']) && $user['barangay'] == 'Rizal' ? 'selected' : '' ?>>Rizal</option>
                                    <option value="San Isidro" <?= isset($user['barangay']) && $user['barangay'] == 'San Isidro' ? 'selected' : '' ?>>San Isidro</option> 
                                    <option value="Santa Cruz" <?= isset($user['barangay']) && $user['barangay'] == 'Santa Cruz' ? 'selected' : '' ?>>Santa Cruz</option>
                                    <option value="Sibaroc" <?= isset($user['barangay']) && $user['barangay'] == 'Sibaroc' ? 'selected' : '' ?>>Sibaroc</option>
                                    <option value="Sinara Alto" <?= isset($user['barangay']) && $user['barangay'] == 'Sinara Alto' ? 'selected' : '' ?>>Sinara Alto</option>
                                    <option value="Sinara Bajo" <?= isset($user['barangay']) && $user['barangay'] == 'Sinara Bajo' ? 'selected' : '' ?>>Sinara Bajo</option>
                                    <option value="Seti" <?= isset($user['barangay']) && $user['barangay'] == 'Seti' ? 'selected' : '' ?>>Seti</option>
                                    <option value="Tabo-o" <?= isset($user['barangay']) && $user['barangay'] == 'Tabo-o' ? 'selected' : '' ?>>Tabo-o</option>
                                    <option value="Taraka" <?= isset($user['barangay']) && $user['barangay'] == 'Taraka' ? 'selected' : '' ?>>Taraka</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Municipality/City</label>
                            <input value="<?=$user['municipality'];?>" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Province</label>
                            <input value="<?=$user['province'];?>" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Region</label>
                            <input value="<?=$user['region'];?>" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Mobile Number</label>
                            <input required placeholder="Enter Mobile Number" type="text" value="<?=$user['phone'];?>" pattern="09[0-9]{9}" maxlength="11" name="phone" class="form-control" id="phone-input">
                            <div id="phone-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Religion</label>
                            <input required placeholder="Enter Religion" type="text" value="<?=$user['religion'];?>" name="religion" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="date" class="required">Date of Birth</label>
                            <input required class="form-control" id="date" value="<?=$user['birthday'];?>" name="dob" placeholder="MM/DD/YYY" type="date"/>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Place of Birth</label>
                            <textarea required placeholder="Enter Place of Birth" type="text" value="<?=$user['birthplace'];?>" name="placeofbirth" class="form-control"><?=$user['birthplace'];?></textarea>
                        </div> 

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Civil Status</label>
                            <select name="civilstatus" required class="form-control">
                                <option value="" selected="true" disabled="disabled">Select Civil Status</option>
                                <option value="Single" <?= isset($user['civil_status']) && $user['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= isset($user['civil_status']) && $user['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= isset($user['civil_status']) && $user['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                <option value="Separated" <?= isset($user['civil_status']) && $user['civil_status'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Person with Disability (PWD)</label>
                            <br>
                            <input required class="ml-2" type="radio" name="pwd" value="Yes" <?php if($user['pwd']=="Yes") {?> <?php echo "checked";?> <?php }?>> Yes
                            <input required class="ml-2" type="radio" name="pwd" value="No" <?php if($user['pwd']=="No") {?> <?php echo "checked";?> <?php }?>> No
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">4P's Beneficiary?</label>
                            <br>
                            <input required class="ml-2" type="radio" name="fourps" value="Yes" <?php if($user['4ps']=="Yes") {?> <?php echo "checked";?> <?php }?>> Yes
                            <input required class="ml-2" type="radio" name="fourps" value="No" <?php if($user['4ps']=="No") {?> <?php echo "checked";?> <?php }?>> No
                        </div>

                        <div class="col-md-12 mb-3">
                        <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of an <strong>Indigenous Group</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="ig" id="igyes" value="Yes"> Yes
                        <input required class="ml-2" type="radio" name="ig" id="igno" value="No"> No
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="igyes" class="">If yes, please specify:</label>
                            <input  placeholder="" type="text" name="igyes" class="form-control" value="<?=$user['ig_specify'];?>">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">With <strong>Government ID</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="govid" id="govidyes" value="Yes"> Yes
                        <input required class="ml-2" type="radio" name="govid" id="govidno" value="No"> No
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="govidyes" class="">If yes, specify:</label>
                            <input  placeholder="" type="text" name="govidyes" class="form-control" value="<?=$user['govid_specify'];?>">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of any <strong>Farmers Association/Cooperative</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="fac" id="facyes" value="Yes"> Yes
                        <input required class="ml-2"  type="radio" name="fac" id="facno" value="No"> No
                        </div>

                        
                        <div class="col-md-8 mb-3">
                            <label for="facyes" class="">If yes, specify:</label>
                            <input  placeholder="" type="text" name="facyes" class="form-control" value="<?=$user['farmersassoc_specify'];?>">
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
                            <input required class="ml-4" type="radio" name="livelihood" value="Farmer" id="option1" onclick="showDiv('div1')" <?php if($user['livelihood']=="Farmer") {?> <?php echo "checked"; ?> <?php }?>> Farmer
                            <input required  class="ml-4" type="radio" name="livelihood" value="Farmworker" id="option2" onclick="showDiv('div2')" <?php if($user['livelihood']=="Farmworker") {?> <?php echo "checked";?> <?php }?>> Farmworker/Laborer
                            <input required  class="ml-4" type="radio" name="livelihood" value="Agri Youth" id="option3" onclick="showDiv('div3')" <?php if($user['livelihood']=="Agri Youth") {?> <?php echo "checked";?> <?php }?>> Agri Youth
                        </div>

                        <div class="col-md-12 mb-3"  id="div1" style="display: none;">
                            <h5 class="text-center mt-4"><b>FOR FARMER</b></h5>
                            <h6 class="text-center mt-4"><u>Type of Farming Activity</u></strong></h6>
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Rice" name="rice" <?php if($user['rice']=="Rice") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="rice">Rice</label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Corn" name="corn" <?php if($user['corn']=="Corn") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="corn">Corn</label>
                            </div>

                            <label fowr="">Other Crops Specify:</label>
                            <input placeholder="" type="text" name="other_crops_specify" value="<?=$user['other_crops_specify'];?>" class="form-control">

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Livestock" id="livestock" name="livestock">
                                <label class="form-check-label" for="livestock">Livestock</label>
                            </div>

                            <label for="livestock_specify" class="">Specify:</label>
                            <input placeholder="" type="text" id="livestock_specify" value="<?=$user['livestock_specify'];?>" name="livestock_specify" class="form-control" disabled>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Poultry" id="poultry" name="poultry">
                                <label class="form-check-label" for="poultry">Poultry</label>
                            </div>
                            
                            <label for="poultry_specify" class="">Specify:</label>
                            <input placeholder="" type="text" id="poultry_specify" value="<?=$user['poultry_specify'];?>" name="poultry_specify" class="form-control" disabled>
                        </div>

                        <div class="col-md-12 mb-3" id="div2" style="display: none;">
                            <h5 class="text-center mt-4"><b>FOR FARMWORKER</b></h5>
                            <h6 class="text-center mt-4"><u>Kind of Work</u></strong></h6>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Owner" name="owner" <?php if($user['owner']=="Owner") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="owner">Owner</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Land Preparation" name="land" <?php if($user['land']=="Land Preparation") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="land">Land Preparation</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cultivation" name="cultivation" <?php if($user['cultivation']=="Cultivation") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="cultivation">Cultivation</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Planting" name="planting" <?php if($user['planting']=="Planting") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="planting">Planting</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Harvesting" name="harvesting" <?php if($user['harvesting']=="Harvesting") {?> <?php echo "checked";?> <?php }?>>
                                <label class="form-check-label" for="Harvesting">Harvesting</label>
                            </div>
                                
                            <label for="">Others, Please Specify:</label>
                            <input placeholder="" type="text" name="othersfarmworker" value="<?=$user['other_farmworker_specify'];?>" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3" id="div3" style="display: none;">
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
                            <input placeholder="" type="text" name="other_agri_youth_specify" value="<?=$user['other_agri_youth_specify'];?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="card mt-1">
                <div class="card-header">
                    <h5>PART III: Farm Document</h5>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="qrcode">
                                <label class="required">
                                    SCAN QR CODE HERE
                                    <input required type="text" name="qrcode_text" id="qrscan" value="<?=$user['qrcode'];?>" readonyy="" style="opacity:0%;margin:-6.2rem;z-index:-10;zoom:1%;">
                                </label>
                                <video id="preview" width="100%"></video>
                            </div>
                            <div class="succqrcode" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                    QR Scan Success!
                                </div>
                                <button type="button" id="rescan-btn" class="btn btn-warning"><i class="fa fa-qrcode"></i> Rescan QR Code</button>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" style="margin-left:15rem;">
                            <label for="" class="required">User Status (<label id="myValueName"><?php if($user['user_status']=="1") { echo "Active"; } else { echo "In active"; } ?></label>)</label>
                            <br>
                            <label class="switch-new" style="margin-left:3.3rem;">
                                <input type="checkbox" id="mySwitch" <?php if($user['user_status']=="1") {?> <?php echo "checked";?> <?php }?>>
                                <span class="slider-new round-new"></span>
                            </label>
                            <input type="hidden" name="status" id="myValue" value="<?= $user['user_status']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="update_farmer" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
    </div>
</form>
<?php
        }
    }
    else{ ?>
        <h4>No Record Found!</h4>
    <?php }
    }
?>

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {
    // disable submit button by default
    //$('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);
    var debouncedCheckRefNumber = _.debounce(checkRefNumber, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);
    $('#phone-input').on('input', debouncedCheckPhone);
    $('#reference_number-input').on('input', debouncedCheckRefNumber);

    function checkEmail() {
        var email = $('#email-input').val();
        $.ajax({
        url: 'ajax.php', // replace with the actual URL to check email
        method: 'POST', // use the appropriate HTTP method
        data: { email: email },
        success: function(response) {
            if (response.exists) {
                // disable submit button if email is taken
                $('#submit-btn').prop('disabled', true);
                $('#email-error').text('Email already taken').css('color', 'red');
                $('#email-input').addClass('is-invalid');
            } else {
            $('#email-error').empty();
            $('#email-input').removeClass('is-invalid');
            // enable submit button if email is valid
            checkIfAllFieldsValid();
            }
        },
        error: function() {
            $('#email-error').text('Error checking email');
        }
        });
    }

    function checkPhone() {
        var phone = $('#phone-input').val();
        $.ajax({
        url: 'ajax.php', // replace with the actual URL to check phone
        method: 'POST', // use the appropriate HTTP method
        data: { phone: phone },
        success: function(response) {
            if (response.exists) {
            $('#phone-error').text('Phone number already taken').css('color', 'red');
            $('#phone-input').addClass('is-invalid');
            // disable submit button if phone number is taken
            $('#submit-btn').prop('disabled', true);
            } else {
            $('#phone-error').empty();
            $('#phone-input').removeClass('is-invalid');
            // enable submit button if phone number is valid
            checkIfAllFieldsValid();
            }
        },
        error: function() {
            $('#phone-error').text('Error checking phone number');
        }
        });
    }

    function checkRefNumber() {
    var reference_number = $('#reference_number-input').val();
    $.ajax({
        url: 'ajax.php', // replace with the actual URL to check reference number
        method: 'POST', // use the appropriate HTTP method
        data: { reference_number: reference_number },
        success: function(response) {
        if (response.exists) {
            $('#reference_number-error').text('Reference number already taken').css('color', 'red');
            $('#reference_number-input').addClass('is-invalid');
            // disable submit button if reference number is taken
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#reference_number-error').empty();
            $('#reference_number-input').removeClass('is-invalid');
            // enable submit button if reference number is valid
            checkIfAllFieldsValid();
        }
        },
        error: function() {
        $('#reference_number-error').text('Error checking reference number');
        }
    });
    }

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty') && $('#phone-error').is(':empty') && $('#reference_number-error').is(':empty')) {
            $('#submit-btn').prop('disabled', false);
        }
    }
    });

    // Camera scan for QR Code
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('No cameras found');
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan',function(c){
        document.getElementById('qrscan').value=c;
        //document.forms[0].submit();
        $(document).ready(function() {
            $(".qrcode").hide();
            $(".succqrcode").show();
        });
    });
    
    document.getElementById('rescan-btn').addEventListener('click', function() {
        scanner.start();
        document.getElementById('qrscan').value = ''; // clear the input field
        $(".qrcode").show();
        $(".succqrcode").hide();
    });

    // This is for checkbox button
    function handleCheckboxChange(checkbox, checkboxField, requiredLabel) {
        // Add event listener to the checkbox
        checkbox.addEventListener('change', function() {
            // If checkbox is checked, make the text input field required and enable it
            checkboxField.required = this.checked;
            checkboxField.disabled = !this.checked;
            requiredLabel.classList.add('required');

            // If checkbox is unchecked, clear the input field
            if (!this.checked) {
                checkboxField.value = '';
                requiredLabel.classList.remove('required');
            }
        });
    }

    // Usage:
    handleCheckboxChange(document.getElementById('livestock'), document.getElementById('livestock_specify'), document.querySelector('label[for="livestock_specify"]'));
    handleCheckboxChange(document.getElementById('poultry'), document.getElementById('poultry_specify'), document.querySelector('label[for="poultry_specify"]'));

    function handleRadioChange(radioGroup, radioYesField, requiredLabel) {
        // Add event listener to the radio buttons
        for (var i = 0; i < radioGroup.length; i++) {
            radioGroup[i].addEventListener('change', function() {
                // If "Yes" radio button is selected, make the text input field required and enable it
                if (this.value === 'Yes') {
                    radioYesField.required = true;
                    radioYesField.disabled = false;
                    requiredLabel.classList.add('required');
                } else {
                    // If "No" radio button is selected, make the text input field not required and disable it
                    radioYesField.required = false;
                    radioYesField.disabled = true;
                    radioYesField.value = ''; // clear the input field
                    requiredLabel.classList.remove('required');
                }
            });
        }
    }

    // Usage:
    handleRadioChange(document.getElementsByName('ig'), document.getElementsByName('igyes')[0], document.querySelector('label[for="igyes"]'));
    handleRadioChange(document.getElementsByName('govid'), document.getElementsByName('govidyes')[0], document.querySelector('label[for="govidyes"]'));
    handleRadioChange(document.getElementsByName('fac'), document.getElementsByName('facyes')[0], document.querySelector('label[for="facyes"]'));
</script>

<script>
    var mySwitch = document.getElementById("mySwitch");
    var myValue = document.getElementById("myValue");
    var myValueName = document.getElementById("myValueName");
    mySwitch.addEventListener("change", function() {
        if(this.checked) {
            myValue.value = "1";
            myValueName.innerHTML = "Active";
        } else {
            myValue.value = "2";
            myValueName.innerHTML = "In active";
        }
    });
</script>