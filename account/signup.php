<?php
session_start(); ob_start();
require_once('includes/headerquery.php');
$signup = $_SESSION['signup']??0;

@$ref = (isset($_GET['ref'])) ? sqLx('user', 'user', $_GET['ref'], 'sn') : '';

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Signup</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
							<?php if(isset($report)){ $pro->Alert();} ?>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="signin.php">Sign in here</a>
										</p>
									</div>
									
									</div>
									<div class="form-body">
										<form method="post" class="row g-3">
											<?php if($signup==0){ ?>
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text" class="form-control" id="inputFirstName" placeholder="John" name="firstname" required>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="inputLastName" placeholder="Doe" name="lastname" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Gender</label>
												<select name="sex" class="form-control" id="inputEmailAddress"  required>
													<option value=""></option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Phone Number</label>
												<input type="number" name="phone" class="form-control" id="inputEmailAddress" placeholder="234 803 534 8734" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" required>
											</div>
											<div class="col-12">
												<label for="username" class="form-label">Username</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="funname" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent" required><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Referral Id</label>
												<input type="text" name="ref" class="form-control" id="inputSelectCountry" placeholder="2134" value="<?= $ref ?>">
													
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#myModal">Terms</a> & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="StartSignup"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										<?php }else{ ?>
											<div class="col-12 "><center>
												<label for="inputSelectCountry" class="form-label">Activation Cost</label>
												<h3>50 USD (400 GHS)</h3></center>
											</div>
											
											<div class="col-12">
											    
											    	<label for="inputSelectCountry" class="form-label">Registration PIN</label>
												<input type="text" name="pin" class="form-control" id="inputSelectCountry" placeholder="Enter PIN" ><br>
											    
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="PayWithPin"><i class='bx bx-user'></i>Pay with PIN</button>
												</div>
											</div>
											         <center><h3>OR</h3></center>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="finishSignUp"><i class='bx bx-user'></i>Pay Securely with Flutterwave</button>
												</div>
											</div>
											
										<?php }  ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	
	
	<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">AFFILIATE AGREEMENT</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">

							<p>Each participant in the affiliate program offered by EPG (the “Program Operator”) at (the “website”) expressly agrees to this affiliate agreement.
</p><p>NOTICE: Please read this agreement carefully. Unless you expressly agree and consent to this agreement, you may NOT participate in the affiliate program. By participating in the affiliate program, you are agreeing to comply with and be legally bound by the terms and conditions of this contract. If you do not agree to all of the terms of this agreement, please do not register for the affiliate program.
</p>
<p>This agreement incorporates the Program Operator's Terms and Conditions of Use herein as if it were set forth in full.
Throughout this agreement, “affiliate program” refers to the affiliate program operated by EPG (the Program Operator.)
</p>
<p>AFFILIATES<br>
Each affiliate is an independent contractor of the EPG and not an employee. Nothing herein is intended to create an employer/employee relationship.
</p>
<p>COMMISSIONS & REFERRAL FEES
<br>Whenever someone orders through your affiliate link, your affiliate ID is credited with a referral fee. When another affiliate registers as an affiliate using your affiliate link, your account is credited as the Sponsoring affiliate. You do not earn a referral fee for any other affiliate's registration. The commission/referral fee amount varies from product, service or opportunity. The rate at which your referral fee is generated can be found on the website and is subject to change at any time.
Before any affiliate may be a sent a commission check, the affiliate must submit to the EPG identification information. Such identification information shall include, at a minimum, a copy of a government issued, picture, identification card (for example, a driver’s license). These documents shall be faxed to the Program Operator as per the instructions sent in your "Welcome, affiliate" email. You will not receive any payment of commission/referral fees until such time as you submit the required documentation to the Program Operator.
Commissions for downline recruitment are paid at the rates as indicated on our brochure/website. EPG pays similar stated rates on further levels of downline recruitment.
</p>
<p>INCOME TAX LIABILITIES
<br>Each affiliate acts as an independent contractor and as such is responsible for any or all Ghanaian, state, or foreign income taxes and any other tax liabilities that affect or concern the sales of the products or services, in your state or location. If you are NOT a resident of Ghana, EPG will withhold the appropriate Ghanaian income tax applicable to foreign nationals, prior to your receipt of any commissions. EPG does so pursuant to Ghana’s Federal Internal Revenue Service laws and other applicable laws.
 
</p>
<p>COMMISSION SCHEDULE
<br>All commissions are calculated & paid in cash and other incentives as provided in our brochures.
Commissions are not paid for any sales for which payment has not been received, or for any transaction that has been rejected for any reason.
We are not responsible for paying interest to affiliates for accrued but not yet delivered commission payments.
If a transaction incurs a charge-back, or if an online transaction is not completed in every way, no commission payment is due to the affiliate. If a commission has already been paid, then it will be deducted from an active affiliate's future commissions.
Each affiliate is responsible for selecting the payment processor, through which to receive their commissions/referral fees, from the payment processors supported by the EPG. If you elect a payment processor through which to receive your commissions and you later terminate the account or the account becomes unavailable for any reason, the Program Operator is not responsible for your not receiving the money. Each affiliate is responsible for always maintaining the payment processor through which they receive their commissions/referral fees OR selecting an alternate method of payment supported by the Program Operator. This election is entirely made by the affiliate and the Program Operator assumes no responsibility for non-receipt of payments made according to the payment processor elected by the affiliate, or the affiliate's lack of ability to then conform to the payment processors or processes supported by EPG. We assumes no responsibility for an affiliate not electing a payment processor. If an affiliate fails to elect a payment processor, any sums due will be paid via check and any fees applicable to payments by check or bank draft will be deducted.
</p>
<p>MIXING OF PRODUCTS
<br>As an affiliate of the EPG, your platform on which you advertise any products or services of EPG  may only include products that are not capable of being viewed by persons 13 years of age or younger unless the Program Operator specifically allows such products. Your platform may NOT contain any content or images that are NOT suitable for being viewed by persons 13 years of age or younger. On any website on which you include any reference whatsoever to the EPG, its products and n services, you may NOT include any reference whatsoever to any form of "Adult" content. Any violation of these requirements will result in immediate termination of your affiliate status and you shall forfeit any commissions/referral fees that may be due. In the event that any violation of these requirements results in the suspension or termination of any payment processor for or the Program Operator, you shall be liable for liquidated damages in the amount of $10,000 as well as actual and any consequential or actual damages that or the Program Operator may incur.
</p>
<p>SPAM & UNSOLICITED COMMERCIAL EMAIL (UCE)
<br>EPG does not tolerate the sending of unsolicited bulk emails (UCE or SPAM) which promote, or make reference to the EPG, or any of their associated companies or websites, Partners, or employees, the websites, products or services. The provisions of the Terms and Conditions pertaining to UCE or SPAM shall apply to each affiliate. Any affiliate who, in the opinion of the EPG, breaches this rule will have their affiliate status canceled and any outstanding commissions will be forfeited.
 
</p>
<p>UNPROFESSIONAL CONDUCT<br>
EPG and their associated companies operate with the strictest codes of professional conduct. Any affiliate who brings EPG or their employees, partners, or associates into disrepute, or who promotes any form of slander, racism, or unfair business practices, will have their affiliate status canceled and any outstanding commissions will be forfeited.
<br>EPG reserves the right to reject any affiliate application if, in the Program Operator's opinion, that person or entity violates established laws or commonly held standards of decency. For example, we will reject applications from any person or company that promotes any form of violence, illegal activities, or from applicants who the Program Operator prefers not to be associated with.
</p>
<p>AFFILIATE SALES & TRACKING<br>
After signing up for the affiliate program, you will receive a unique affiliate link which you will use to advertise the website. When someone clicks through this URL, a cookie will be set in their browser with your affiliate ID and their IP address may also be logged with your affiliate ID. During that visit to the website or any later visit, when a purchase is made the commission will be given based on the existence of the cookie.
</p>
<p>TERM & TERMINATION<br>
This agreement will begin upon your sign-up with the affiliate program and will end when either you or the EPG terminates your affiliate status, or if your account is inactive in any continuous twelve month period. An affiliate may terminate this agreement at any time, and for any reason, by writing to - or emailing - EPG at the email address listed on the website. The affiliate may not transfer this agreement, or any rights conveyed in this agreement, to any third party whatsoever.
EPG may also terminate this agreement at any time, and for any reason, by writing to affiliate at the email address listed in the affiliate's Profile, with 30 days’ notice. EPG may transfer this agreement to any party whatsoever, at any time, and this agreement shall remain in full force and effect, without notice to affiliate. However, if this agreement should terminate for cause due to violation of this agreement or the Terms and Conditions, this agreement shall terminate immediately and affiliate shall forfeit all right to any commissions then due.
</p>
<p>RIGHTS TO MODIFY AGREEMENT<br>
EPG and its associated companies may, in good faith, modify any of this agreement and/or the Terms and Conditions (including the affiliate Commission Schedule), at any time and at its sole discretion, by posting a change notice or a new agreement on the website. These changes will come into force immediately upon posting. The affiliate's continued participation in the affiliate program following the said posting of a change notice or new agreement shall constitute binding acceptance by the affiliate of the change.
If any modification to this agreement is not acceptable to the affiliate, the affiliate's only recourse is to terminate this agreement. Upon termination of this agreement, the former affiliate must remove all affiliate links with EPG, and refrain from publishing same in any manner whatsoever.
</p>
<p>NO MISUSE<br>
It is understood that any individual that uses the EPG system shall not use it in connection with obscene, defamatory, slanderous, hateful, illegal or politically disruptive material, the definition of which shall be at the sole discretion of the EPG. It is also understood that affiliates shall not try to cheat the system in an effort to increase their payments due. If such misuse is detected, the affiliate will be immediately terminated as an affiliate and any sums paid and any sums payable as and for commissions will be withheld. All affiliates further agree to refrain from engaging in any hostile activity toward the system. Any individual that engages in such hostile activity, such as hacking, shall be held liable for any loss sustained by the Program Operator, or its associates due to such action.
</p>
<p>AS-IS ONLY<br>
There is no warranty or guarantee of any kind with respect to EPG system as far as reliability, stability, quality or dependability. This means that EPG, or its associates is not responsible for any loss or damage incurred directly or indirectly due to the use of the EPG website, products, services, or any other facet of the system. This shall include, but is not limited to, any system malfunction, period of being inoperative or unavailable, loss of data or discontinuation of service, other inconveniences.
</p>
<p>FEES<br>
Affiliates shall be charged a registration fee of $50 only by EPG for setting up an account to join affiliate programs or to join any program.
</p>
<p>ELECTRONIC COMMUNICATIONS & EMAIL<br>
EPG requires your primary email address be listed in your affiliate Profile. Affiliates will not be able to use the website or participate in the affiliate program until their email addresses are verified. Those who fail to verify their email address or use an email address that generates an error response consistently (e.g., "User is over quota" or "Mailbox full") will forfeit any commissions due and this contract will be terminated immediately. You may not use an email address with an auto responder as your Program Operator email address. When you visit the Program Operator's websites or send emails to, you are communicating electronically. You consent to receive communications from the Program Operator electronically. The Program Operator will communicate with you by email or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that the Program Operator provides to you electronically satisfy any legal requirement that such communications be in writing. If you are an affiliate, you understand that you may NOT opt out of any emails that you receive from the Program Operator. As an affiliate, you must continually have a valid email account on file with the Program Operator or we reserve the right to terminate your participation immediately, without any refund of any license fees paid or payment of any commission due.
</p>
<p>UNAUTHORIZED CHARGING OR RECEIPT OF PAYMENTS THROUGH THE SITES<br>
No affiliate, or other person or entity may use the website, or EPG payment processing system, for private transactions. Any revenue collected through the website or through EPG payment processing system may become the sole property of EPG.
</p>
<p>AFFILIATE IDENTIFICATION NUMBERS<br>
You will be provided an affiliate identification number. You are responsible for maintaining the secrecy and security of your affiliate ID number and password. You agree to hold the Program Operator harmless in the event that any such information is shared by you with any other person or entity whatsoever.
</p>
<p>NO PREDATORY ADVERTISING<br>
All affiliates in the affiliate program agree to refrain from any type of predatory advertising practices, the definition of which shall be at the sole discretion of EPG, and shall include, but not be limited to, dynamically replacing the affiliate ID of one affiliate with that of another with the effect of "stealing" the commission away from the affiliate that earned it, whether this be intentional or not.
</p>
<p>LIABILITY<br>
EPG will not be liable for indirect or accidental damages (loss of revenue, commissions) due to affiliate system sale tracking failures, commission processing system failures, losses of database files or backups thereof, attacks on computing resources, computer viruses, the continued viability of their products, any results of "intents of harm" to the program, or acts of God or Nature. EPG makes no claim that the operation of the websites or EPG network will be error-free nor will EPG be held liable for any interruptions or errors.
</p>
<p>MISCELLANEOUS PROVISIONS<br>
a) If any part of this agreement or the Terms and Condition is declared void, this agreement and the Terms and Conditions shall, to the maximum practicable extent, be construed without reference to that part. No term or provision of the Agreement shall be waived unless in writing and signed by the party waiving the provision, and any waiver shall apply only to the specific event or situation which it describes and shall not be continuing. No affiliate may assign or sublicense this agreement without the Program Operator's prior written consent.
<br>b) All legal or other fees incurred in collecting returned checks or declined credit cards or any other lack of payment related to a sale made by an affiliate will be payable by the affiliate. Any sums not collected from the affiliate or affiliate's customer are not commissionable, and any fees incurred during processing or handling of sales made by the affiliate will be deducted in whole from any commissions due to the affiliate. Further, in the event that the commissions due the affiliate are insufficient to cover any sums, the affiliate agrees to pay the full amount to the Program Operator.
<br>c) IF THE FOREGOING LIMITATIONS OR THE LIMITATIONS WITHIN THE TERMS AND CONDITIONS ARE HELD TO BE UNENFORCEABLE, THE PROGRAM OPERATOR'S LIABILITY FOR DAMAGES UNDER THIS AGREEMENT TO ANY PERSON OR ENTITY SHALL NOT EXCEED THE AMOUNT OF FEES PAID BY THAT PERSON OR ENTITY FOR THE PRODUCT, SERVICE, AND OR EBOOK OR SOFTWARE (LICENSE).
And that, you recognize and agree that you shall not be entitled to a refund under any circumstances.
<br>d) To the extent you have in any manner violated or threatened to violate the Program Operator’s intellectual property rights, EPG may seek injunctive or other appropriate relief in any court located in Gh and you consent to exclusive jurisdiction and venue in such courts. Use of EPG website is unauthorized in any jurisdiction that does not give effect to all provisions of these terms and conditions, including without limitation this paragraph. You agree that no joint venture, partnership, employment, or agency relationship exists between you and EPG as a result of this agreement or use of the website, products, and/or services. The Program Operator's performance of this agreement is subject to existing laws and legal process, and nothing contained in this agreement is in derogation of EPG's right to comply with governmental, court and law enforcement determined to be invalid or unenforceable pursuant to applicable law including, but not limited to, the warranty disclaimers and liability limitations set forth above, then the invalid or unenforceable provision will be deemed superseded by a valid, enforceable provision that most closely matches the intent of the original provision and the remainder of the agreement shall continue in effect.
<br>e) This Agreement shall be governed and construed in accordance with the laws of the Federal Republic of Ghana applicable to agreements made and to be performed in Ghana. You agree that any legal action or proceeding between EPG and you for any purpose concerning this agreement or the parties' obligations hereunder, will first attempt to be resolved with the help of a mutually agreed-upon online mediator. Any costs and fees (other than attorney fees) associated with the mediation will be shared equally by each of us.
<br>f) If it proves impossible to arrive at a mutually satisfactory solution through online mediation, we agree to submit the dispute to binding arbitration at the following location: for legal actions or proceedings between EPG and you, in Accra, Ghana under the commercial rules of the Ghanaian Arbitration Laws. Judgment upon the award rendered by the arbitration may be entered in any court with jurisdiction to do so.
In no case shall you have the right to go to court or have a jury trial. You will not have the right to engage in pre-trial discovery except as provided in the rules; you will not have the right to participate as a representative or member of any class of claimants pertaining to any claim subject to arbitration; the arbitrator's decision will be final and binding with limited rights of appeal.
<br>g) Any cause of action or claim you may have with respect to the website, the products, the services, must be commenced within ninety (90) days after the claim or cause of action arises or such claim or cause of action is barred. EPG’s failure to insist upon or enforce strict performance of any provision of this agreement shall not be construed as a waiver of any provision or right. Neither the course of conduct between the parties nor trade practice shall act to modify any provision of this agreement. EPG may assign its rights and duties under this agreement to any party at any time without notice to you. Use of headings in this document is for convenience only and does not identify legal boundaries or terms explicitly.
<br>h) EPG may modify this agreement, and the agreement this creates, at any time, simply by updating this posting and without notice to you. This is the ENTIRE agreement regarding all the matters that have been discussed.
<br>i) EPG may transfer any rights or responsibility that it may have to any person or entity whatsoever. Nothing herein shall alter or encumber the right of to transfer any such rights or responsibilities. Any transfer by EPG shall cause this agreement, and any other agreement then in effect (as well as any other contract between you and the transferring party) to transfer simultaneously, all without permission.
<br>j) Should this affiliate program be deemed illegal in any jurisdiction, EPG has the right to immediately terminate this program, without recourse. If the payment processors utilized by EPG determine that sales made through affiliates cannot be processed through the payment processor, then EPG has the right to immediately terminate this Program, without recourse. Nothing herein is intended to imply that EPG will always offer any affiliate program, or this affiliate program, for all products, services, and/or opportunities sold by the Program Operator on the websites or that the Program Operator will offer any affiliate program whatsoever.
</p>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</a>
							</div>
						</div>
					</div>
				</div>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>