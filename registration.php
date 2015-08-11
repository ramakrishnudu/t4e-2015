<?php
include_once("settings/db_config.php");
if(isset($_POST) && !empty($_POST))
{
	$name = addslashes($_POST['name']);
	$desig = addslashes($_POST['desig']);
	$inst = addslashes($_POST['inst']);
	$paper = addslashes($_POST['paper']);
	$email = addslashes($_POST['email']);
	$phone = addslashes($_POST['phone']);
	$address1 = addslashes($_POST['address1']);
	$address2 = addslashes($_POST['address2']);
	$city = addslashes($_POST['city']);
	$state = addslashes($_POST['state']);
	$country = addslashes($_POST['country']);
	$pincode = addslashes($_POST['pincode']);
	$membership = addslashes($_POST['membership']);
	$curreny_code = addslashes($_POST['curreny_code']);
	$amount = addslashes($_POST['amount']);
	
	if($name != '' && $desig != '' && $inst != '' && $paper != '' && $email != '' && $phone != '' && $address1 != '' && $city != '' && $state != '' && $country != '' && $pincode != '' && $membership != '' && $curreny_code != '')
	{
		$payment_date = date("Y-m-d");
		$trackingNumber = time();
		$insertSql = "insert into users(name, desig, inst, paper, email, phone, address1, payment_date, address2, city, state, country, pincode, ref_no, membership, currency_code, amount) values ('".$name."', '".$desig."', '".$inst."', '".$paper."', '".$email."', '".$phone."', '".$address1."', '".$payment_date."', '".$address2."', '".$city."', '".$state."', '".$country."', '".$pincode."', '".$trackingNumber."', '".$membership."', '".$curreny_code."', '".$amount."')";
		$insertRes = mysql_query($insertSql);
		
		header("location:".BASE_URL . 'success.php?ref_no='.$trackingNumber);
	}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>T4E2015 - IEEE Conference on technology for education</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
        <!--
        Artcore Template
        http://www.templatemo.com/preview/templatemo_423_artcore
        -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo-misc.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
		
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> <!-- /#pageloader -->

        <?php include_once("header.php");?> <!-- /.site-header -->

        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>Registration</h2>
                        <!-- <span>Subtitle Goes Here</span> -->
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="project-detail row">
                <!-- Main Content Section -->
                    <div class="project-infos col-md-12"> 
                    <!-- Sub Section -->
                        <div class="box-content"> 
                        <!-- Box Content -->
                         <div class="panel panel-default remove-only-margin">
							<div class="box-content">
								<form method="post" name="frm" id="frm" action="registration.php">
									<table cellpadding="0" cellspacing="0" border="0" class="table-responsive" width="80%" style="border:none;">
										<tr>
											<td ><strong>Name<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="name" id="name" maxlength="100"></td>
										</tr>
										<tr>
											<td><strong>Designation<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="desig" id="desig" maxlength="100"></td>
										</tr>
										<tr>
											<td><strong>Institution / Organization<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="inst" id="inst" maxlength="150"></td>
										</tr>
										<tr>
											<td><strong>Paper Title<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="paper" id="paper" maxlength="150"></td>
										</tr>
										<tr>
											<td><strong>Email<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="email" id="email" maxlength="50"></td>
										</tr>
										<tr>
											<td><strong>Mobile / Phone<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="phone" id="phone" maxlength="20"></td>
										</tr>
										<tr>
											<td><strong>Membership Category<span style="color:#FF0000;">*</span> : </strong></td>
											<td>
												<select id="membership" name="membership">
													<option value="">Please Select Membership category</option>
													<option value="IEEE">IEEE Member</option>
													<option value="Non-IEEE">Non IEEE Member</option>
													<option value="IEEE-Student">IEEE Student Member</option>
													<option value="Non-IEEE-Student">Non IEEE Student Member</option>
												</select>
											</td>
										</tr>
										<tr style="display:none;" id="tr_amount">
											<td><strong>Curreny Type<span style="color:#FF0000;">*</span> : </strong></td>
											<td><select id="curreny_code" name="curreny_code">
													<option value="">Please Select Curreny Code</option>	
													<option value="INR">Indian Rupees</option>
													<option value="USD">U.S. Dollar</option>
												</select></td>
										</tr>
										<tr>
											<td><strong>Amount<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="hidden" name="amount" id="amount" maxlength="20" readonly >
												<span id="span_amount" style="padding-left:15px; color:#000;font-weight:bold;"></span>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left"><h2>Personal Details</h2></td>
										</tr>
															<tr>
											<td><strong>Adress Line 1<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="address1" id="address1" maxlength="250"></td>
										</tr>
										<tr>
											<td><strong>Address Line 2 : </strong></td>
											<td><input type="text" name="address2" id="address2" maxlength="250"></td>
										</tr>
										<tr>
											<td><strong>City<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="city" id="city" maxlength="150"></td>
										</tr>
										<tr>
											<td><strong>State<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="state" id="state" maxlength="150"></td>
										</tr>
										<tr>
											<td><strong>Country<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="country" id="country" maxlength="100"></td>
										</tr>
										<tr>
											<td><strong>PIN / ZIP<span style="color:#FF0000;">*</span> : </strong></td>
											<td><input type="text" name="pincode" id="pincode" maxlength="10"></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input name="submit" value=" " type="submit" class="payment" onClick="return clearAllWaterMarks(); "/></td>
										</tr>
									</table>
								</form>
							</div>
                         </div>       
                        </div> <!-- End of Box Content -->
                    </div> <!-- End of Sub Content Section -->
                </div> <!-- End of Main Content Section -->
                
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->

        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
                $('.loader-item').fadeOut(); // will first fade out the loading animation
                    $('#pageloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
		<script src="js/additional-methods.min.js" type="text/javascript"></script>
		<script src="js/jquery.watermarkinput.js" type="text/javascript"></script>
		<script type="text/javascript">

	$(document).ready(function() {		
		
		$("#frm").validate({
		errorElement: "span",
		rules: {
			name : {required : true},
			desig : {required : true},
			inst : {required : true},
			paper : {required : true},
			email : {required : true, email : true},
			phone : {required : true},
			address1 : {required : true},
			city : {required : true},
			state : {required : true},
			country : {required : true},
			pincode : {required : true},
			membership : {required : true},
			amount : {required : true}
			},
		messages:{			
			name : {required : "Name is required"},
			desig : {required : "Designation is Required."},
			inst : {required : "Institution / Organization is Required."},
			paper : {required : "Paper Title is Required."},
			email : {required : "Email is Required.", email : "Invalid Email Address."},
			phone : {required : "Phone is Required."},
			address1 : {required : "Address Line 1 is Required."},
			city : {required : "City is Required."},
			state : {required : "State is Required."},
			country : {required : "Country is Required."},
			pincode : {required : "Pin / Zip is required."},
			membership : {required : "Membership category is required."},
			amount : {required : "Amount is required."},
			curreny_code : {required : "Curreny Code is Required."}
			}
		});
		
		$("#name").Watermark("Name");
		$("#desig").Watermark("Designation");
		$("#inst").Watermark("Institution/Organization");
		$("#paper").Watermark("Paper Title");
		$("#email").Watermark("Email");
		$("#phone").Watermark("Phone");
		$("#address1").Watermark("Address Line 1");
		$("#city").Watermark("City");
		$("#state").Watermark("State");
		$("#country").Watermark("Country");
		$("#pincode").Watermark("Pincode");
		$("#membership").Watermark("Pincode");
		$("#curreny_code").Watermark("Pincode");
		
		$("#membership").change(function(){
			if($(this).val() !='')
			{
				$("#tr_amount").show("slideDown");
				$("#curreny_code").addClass("required");
				var membership= $(this).val();
				var currency  = $("#curreny_code").val();
				//alert(currency);
				if(currency != '')
					updateAmount(membership, currency);
			}
			else
			{
				$("#tr_amount").hide("slideUp");
				$("#amount").attr("value", "");
				$("#curreny_code").removeClass("required");
				
			}
		});
		
		$("#curreny_code").change(function(){
			var currency = $(this).val();
			var membership = $("#membership").val();
			updateAmount(membership, currency);
		});
});

function updateAmount(membership, currency)
{
	var amount = 0;
	if(membership == "IEEE" && currency == "INR")
		amount = "9230";
	else if(membership == "IEEE" && currency == "USD")
		amount = "142";
	else if(membership == "Non-IEEE" && currency == "INR")
		amount = "13455";
	else if(membership == "Non-IEEE" && currency == "USD")
		amount = "207";
	else if(membership == "IEEE-Student" && currency == "INR")
		amount = "4745";
	else if(membership == "IEEE-Student" && currency == "USD")
		amount = "73";
	else if(membership == "Non-IEEE-Student" && currency == "INR")
		amount = "6175";
	else if(membership == "Non-IEEE-Student" && currency == "USD")
		amount = "95";
		
	if(amount != 0)
	{
		$("#amount").attr("value", amount);
		$("#span_amount").html(amount+"&nbsp;"+currency)
	}
}
function clearAllWaterMarks(){
	 $.Watermark.HideAll();
}
</script>
    </body>
</html>
