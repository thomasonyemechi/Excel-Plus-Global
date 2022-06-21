<?php
session_start(); ob_start();
require_once('includes/headerquery.php');
$signup = $_SESSION['signup']??0;

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
										<h3 class="">Sign Up <?= $pro->findUpline(); ?></h3>
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
												<?php $ref = $_GET['ref']??'' ?>
												<input type="text" name="ref" class="form-control" id="inputSelectCountry" placeholder="2134" value="<?= $ref ?>">
													
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#">Terms</a> & Conditions</label>
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
												<h1>50 USDT</h1></center>
												<?php $pin = $_POST['pin']??'' ?>
												<!-- <input type="text" name="pin" class="form-control" id="inputSelectCountry" placeholder="2134" value="<?= $pin ?>"> -->
													
											</div>
<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="PayWithPin"><i class='bx bx-user'></i>Make Payment</button>
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
										<div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-scrollable modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">GLG Terms and Conditions</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														
  The following is hereby drafted for the purpose of guiding our members&rsquo; growth and practical business operations, for them to use on a regular basis. Please kindly refer to this if you have any question or need clarification on GLG business practices. GLG (hereinafter referred to as GLG), reserves the right to review and adjust this information at any time. In GLG, every registered member is referred to as GLG Member <br>
  By virtue of being a registered member of GLG Member, you are bound by the Code of Ethics and Policies and Procedures herein stipulated subject to subsequent reviews, violation of which may result to deregistration. <br>
  <strong>MEMBERSHIP</strong><strong> </strong><br>
  As you join our membership program you accept to pay a onetime non-refundable $7.5 USD. This includes your contribution to the help and empowerment that we offer to you and the less privileged and your involvement in the business opportunity run on the platform of multi level marketing MLM. </p>
<p ><strong>a. NO REFUNDS</strong><strong> </strong><br>
  All members accept that the joining fee is a nonrefundable fees and that at the completion of the online application and payment of $7.5 USD that no refund will apply. </p>
<p ><strong>b. MEMBERSHIP CODE OF ETHICS</strong><strong> </strong><br>
  i. I will follow the highest standards of honesty and integrity in all that I do as a Club Member. <br>
  ii. I will not make negative or disparaging remarks about GLG, coordinators, employees, representatives, services or project. <br>
  iii. I will present our marketing plan accurately and honestly, and without false representation, clearly portraying the level of effort required to achieve success in the business plan of GLG. <br>
  iv. I will carry out all the duties of sponsorship and responsibility of leadership as I develop my sales team in the business plan of GLG. I will treat everyone, whether they are in my sales team or not, with the same courtesy. <br>
  v. I will not promote GLG as a Tax avoidance scheme or as pyramid scheme or Ponzi. <br>
  vi. I will not produce marketing or training aids of any kind for any purpose without the prior written permission from Company. <br>
  vii. I will consistently put forth my best efforts to promote the success of the business plan as a club member. I WILL NOT ENGAGE IN ACTIVITIES THAT WILL CAUSE LOSS TO OTHER GLG OR MEMBERS ANYONE NOR WILL I STIMULATE ANYONE TO DO SO. <br>
  viii. I will not use the organization's name, information literature, gatherings of people or other members of the Company&rsquo;s Resources to further any other business interest. <br>
  ix. VIOLATION OF THESE RULES WILL RESULT IN THE TERMINATION OF MY MEMBERSHIP AND ALSO BENEFITS THE BENEFITS OF MY MEMBERSHIP. <br>
  x. I will abide by all Policies and Procedures that pertain to the operation of my involvement in the business plan of COVIS CCLUB LIMITED. </p>
<p ><strong>c. OVERVIEW OF POLICIES AND PROCEDURES</strong><strong> </strong><br>
  i. A Club Member is considered to be a duly authorized and fully paid member, herein after called member, if GLG accepts the completed Application and Agreement. And shall thereafter be called members. <br>
  ii. The Company reserves the right to accept or reject any member's Application and Registration form without having to assign any reason for its acceptance or rejection. <br>
  iii. All Members are independent promoters and are neither agents nor employees of GLG. <br>
  iv. The Promoter is responsible for bearing all costs and expenses incurred in the conduct of their participation in the business plan of GLG. <br>
  v. A Promoter must be legal of age. <br>
  vi. A Promoter must have only one introducer (sponsor). <br>
  vii. Husbands and wives married may sponsor each other or have different sponsors. This also applies to any interlocking directorships or share holdings that may exist from a business relationship. However it should be noted, that all members must meet their own personal qualification levels to qualify for the rewards from the GLG BUSINESS COMPENSATION PLAN. <br>
  viii. A Member shall be responsible for the CONDUCTS/ activities of a spouse, whether or not the spouse is a member, or whether or not the member participated in the conduct. For example, If a member may not engages in an activity (such as fraudulent conduct which diminishes, damages or weakens the reputation of GLG or its services) and the spouse engages in that activity, the member shall be deemed to have engaged in that activity and shall be considered to be in violation of the applicable rule which shall result in termination of his/her Membership of the GLG. And shall further bear all the losses and consequences resulting from that violating activities </p>
<p ><strong>MAINTENANCE OF MEMBER ACCOUNT INFORMATION</strong><strong> </strong><br>
  It is the responsibility of each member to update any registration details of their account such as email address, postal address, and mobile number. This will ensure the member is kept up to date with all updates from the company. These updates are also posted in the News/Events section of the GLG website and dashboard of each Member's website. GLG will bear no responsibility for any loss (moral, physical or financial or legal or any other kind of loss) caused by entering wrong information into registration form/ misrepresentation by any member or any other person. </p>
<p ><strong>&#8226; SECURITY</strong><strong> </strong><br>
  Each member must keep their password and other secure access information confidential and notify GLG promptly if the member believes that the security of an account has been compromised. GLG has taken reasonable steps to protect the security of online transactions. However, GLG cannot and does not warrant such security and will not be liable for any losses or damages resulting from any security breaches. </p>
<p ><strong>&#8226; BUILDING A PERSONAL MARKETING TEAM</strong><strong> </strong><br>
  i. Club Members have the option of building a personal marketing team under the GLG BUSINESS PLAN by introducing the Compensation Plan to interested persons who are willing to undergo business training. It is the responsibility of such GLG Members to assist in the training, and monitoring of the activity of members of its personal marketing team to ensure compliance to the company&rsquo;s policy. Any person electing to enter into the marketing business plan has the right to choose his or her Sponsor. Any disputes regarding Sponsoring or genealogy shall be decided by the organization. <br>
  ii. A sponsoring Member (herein referred to as upline) must not exaggerate the earning potential that may result from this business opportunity and he is obliged to fully explain the Good Life BUSINESS MARKETING PLAN to all prospective Members without misrepresentation, making sure to stress that the degree of success is directly related to individual effort and ability. </p>
<p ><strong>&#8226; CROSS SPONSORING</strong><strong> </strong><br>
  Cross lining or cross sponsoring is where a member solicits other GLG members who are not in their team or line of sponsorship to become a Member in their sales team. GLG members may NOT introduce other GLG members to other similar opportunities unless the person is a personally introduced member or a closely related person. A "closely related person or entity" is any person in the household of the member (e.g. spouse, son, daughter, parent living in the same household) or any corporation, partnership, limited liability Company, trust or other legal entity, which is controlled by the Member. Cross lining is strictly prohibited in GLG and may result in the imposition of penalties including immediate termination of the members account and participation in the GLG Business plan. </p>
<p ><strong>RELATIONSHIP OF A CLUB MEMBER TO GLG</strong><strong> </strong><br>
  Members representing GLG are known as GLG Members or independent promoters, and have no authority to bind the company to any obligations outside the scope of this agreement. The relationship between members and GLG is established only by this Agreement. A Member is not an agent, employee or any other legal representative of GLG or its service providers. Members are solely responsible for all self-employment taxes and any federal, state, local or other taxes that may be due as a result of their GLG business activities. Members agree to abide by any national, federal, state, or local laws, rules and regulations pertaining to this Agreement. At Member's own expense, members will make, execute and file all such reports and obtain such licenses as are required by law or public authority with respect to this Agreement. </p>
<p ><strong>&#8226; MEMBERS RIGHTS AND RESPONSIBILITIES</strong><strong> </strong><br>
  i. Members who choose to promote GLG are able to earn money and rewards through GLG's Business Compensation Plan. The Club Members understands and agrees to abide by the Members Agreement. A Member understands they are bound by the terms hereof and that the member will be entitled to participate upon the acceptance of a valid application for participation. <br>
  ii. To earn through the Compensation plan a GLG Member needs to personally refer or introduce or sign-up at least three persons. Either directly through one-on-one or through a referral link. Members are responsible for their own marketing and accept that any rewards earned are the result of consistent marketing efforts. GLG makes NO guarantees that a Member will qualify or earn the rewards. <br>
  iii. Members are responsible for ensuring any new members of their personal marketing team are aware of the policies and procedures, how the Compensation plan works, and how to take advantage of the empowerment, earnings, incentives and privileges. </p>
<p ><strong>&#8226; INCOME REPRESENTATION</strong><strong> </strong><br>
  i. GLG Members understand that any rewards or earnings that are offered from GLG through the Business Plan is the result of members referring or signing up other willing members. Stage Advancement in the Matrix is not based solely on the introduction of other Members but in their ability to be actively involved in the promotion of the human capital empowerment opportunity. <br>
  ii. No GLG Member may make any promise or guarantee that an associate will derive any specific income or profit from the income opportunity as a member of GLG. Any rewards or income a member earns or receives through the business plan is a direct result of the marketing efforts of the members and other members in their sales team. Members must meet the required qualifications as set out by GLG to receive rewards or get paid from the Compensation plan. </p>
<p ><strong>&#8226; TRADE AND MARKETING MATERIALS</strong><strong> </strong><br>
  i. Members will not use the GLG trade names and/or trademarks except to promote the company and as such must be expressly authorized by the company in writing. <br>
  ii. Any sales and marketing materials supplied by GLG may NOT be sold to other GLG Member at a profit and that any purchase of these materials from GLG does not qualify members for any reward payments. <br>
  iii. GLG makes no warranty, express or implied, with respect to the use, efficacy or suitability for any purpose with respect to any such marketing material unless otherwise explicitly stated in writing in connection with the purchase thereof. </p>
<p ><strong>&#8226; THIRD PARTY MARKETING MATERIALS CREATED BY MEMBERS</strong><strong> </strong><br>
  i. Members may create their own marketing materials. Any marketing materials that use the name GLG or its trademarks or trade names MUST be approved expressly in writing by GLG before they can be used. <br>
  ii. A Compliance Approval Form is available on request via email from your dashboard member area. <br>
  iii. GLG has no liability or responsibility for any content, including the quality, accuracy, completeness, legality, or usefulness of any information, product, service or process promoted on members web site or other marketing materials. <br>
  iv. In no event shall GLG be liable for any claims or damages of any kind arising from the contents of any website or marketing materials created by a Member. References in a members website or marketing materials to products, services, processes, hypertext links to third parties or other information by trade name, trademark, manufacturer, supplier or otherwise do not constitute or imply an endorsement or recommendation of GLG. <br>
  v. Members are not permitted to take advantage of Company's name and are therefore not permitted to either infer or imply that they have a direct association or affiliation with Company by promoting themselves by way of GLG name variations. </p>
<p ><strong>&#8226; DISCLAIMER</strong><strong> </strong><br>
  Except as set forth in this TERMS AND CONDITIONS GLG member acknowledges and agrees that GLG has not made, does not make and specifically negates and disclaims any representations, warranties promises, covenants, agreements or guaranties of any kind or character whatsoever, whether express or implied, oral or written, past, present, or future, of, as to, concerning or with respect to <br>
  (a) the value, nature, quality or condition of the company&rsquo;s property (corporeal or incorporeal) including chooses in action, shares, stocks, websites, proprietary information, trading secrets, endless and without limitation. <br>
  (b) The income to be derived from GLG, <br>
  (c) The suitability of GLG for any and all activities and uses which GLG Member may conduct thereon other than its current use, <br>
  (d) The compliance of or by GLG or its operation with any laws, rules, ordinances or regulations of any applicable governmental authority or body, <br>
  (e) The habitability, merchantability, marketability, profitability or fitness for a particular purpose of any of GLG&rsquo;s packages, <br>
  (f) the manner or quality of the construction or materials, if any, incorporated into GLG, <br>
  (g) the manner, quality, state of improvement or introduction of any innovations or promotional packages or lack of it on the GLG platform, or <br>
  (h) any other matter with respect to the GLG, and specifically, that GLG has not made, does not make and specifically disclaims any representations regarding compliance other than as specifically set forth in this TERMS AND CONDITIONS. GLG Member further acknowledges and agrees that having been given proper orientation on how the GLG platform works and relying solely on its own volition to register on the CCI platform and not on any Information provided by any other GLG member which is contrary or inconsistent with the business of GLG or the provisions of this TERMS AND CONDITIONS or any such information provided by any GLG member who claims to represent or portray himself/herself as an agent or representative of GLG without express authorization by GLG; GLG shall not be held liable for the act of any Club member who fraudulently misrepresent or promises or enters into a contract on behalf of GLG without GLG&rsquo;s knowledge or express authorization, every prospect, investor or members of the public who wish to be part of GLG should endeavor to conduct due diligence. </p>
<p ><strong>COMPLIANCE APPROVAL</strong><strong> </strong><br>
  All submissions for compliance approval can be made by completing the form in the members secure dashboard area. </p>
<p ><strong>GLG WEBSITE</strong><strong> </strong><br>
  On occasion, GLG will undergo routine maintenance or experience unexpected technical problems. GLG will make a good-faith effort to do maintenance as quickly and conveniently as possible, and to respond to technical problems promptly. GLG may be required to access an Associate's web site from time to time to provide maintenance. GLG will not in any circumstance be responsible for problems, losses, or damages arising from loss of connectivity; errors in content due to application problems; loss of access by Members; or temporary or permanent loss of data. </p>
<p ><strong>PROMISES MADE BY GLG MEMBERS</strong><strong> </strong><br>
  i. When a Member presents GLG to others they should understand all aspects of the rewards program and not make any representation or promise that is not contained in this agreement or in GLG corporate literature and promotional materials. This representation includes print media, video/audio media or any other form of advertisement/ promotion. <br>
  ii. If a prospective Member relies on any promises made by a GLG Member that is not stated in this Agreement and/or official company materials, and the member fails to keep any such promise PERSONALLY, the prospective members shall only have recourse against the member and not GLG. <br>
  iii. If the member has unfulfilled promises made they have the option of lodging a complaint with GLG. Upon receipt of such a complaint, the organization will investigate the matter as it deems necessary and, upon validation of such a complaint, impose appropriate penalties on the offending Member. Such action however will not result in any recovery of damages by the prospective Member, which the prospective Member is free to seek against the offending Member, not the Organization. In severe cases the company may hand over such GLG Member to Legal Authorities for appropriate prosecution. The party to whom the promise is made is also at liberty to take legal actions against the offending party. </p>
<p ><strong>MISREPRESENTATION</strong><strong> </strong><br>
  GLG Members will not misrepresent GLG in any manner whatsoever at any time. For purposes of this policy, misrepresentation includes, but is not necessarily limited to the following: <br>
  i. Reviewing the marketing plan with any person without clearly advising them that no remuneration is received solely for enrolling or sponsoring new Members. <br>
  ii. Reviewing the marketing plan with any person without clearly advising them that there is no requirement to pay a fee other than the Joining Fee of $7.5 <br>
  iii. Stating that any person has made or may make any specific income through the use of the marketing plan and by the generation of income, whether by specific example, geometric progression, or otherwise. Unless in the same presentation it is stated that said hypothetical or potential earnings, as earnings may vary due to individual efforts, geographic location, timing and many other factors. </p>
<p ><strong>POLICY CHANGES</strong><strong> </strong><br>
  Members agree that GLG may from time to time make changes to it&rsquo;s benefits and opportunities, services, sign-up fees, marketing plan and incentives. Members will be made aware of changes via email or sms to the email address or mobile phone listed in their account details as well as posting updates in the UPDATE section of the GLG website or members Dashboard. It is the responsibility of each member to ensure the email address listed in their account is valid and that they check regularly their Dashboard for the latest updates. Members agree to abide by all changes. </p>
<p ><strong>&#8226; WITHDRAWS</strong><strong> </strong><br>
  i. GLG Members can withdraw their earning/incentives directly from their back office/account to their local bank accounts. <br>
  ii. GLG will deduct Withdrawal fee from each bank account withdrawal made by members. This fee shall be equal to $1.25(for Bank wire) from the amount to be withdrawn and 10% (for BITCOIN) <br>
  iii. Every withdrawal application are completed with 24 hours working (24) hours. </p>
<p ><strong>&#8226; CONFIDENTIALITY</strong><strong> </strong><br>
  Members understand that the GLG marketing plan, details of their progress in the rewards program, details of their GLG sales team, and official company literature are proprietary information and considered trade secrets of GLG. Members hereby agree to not directly or indirectly disclose or use any of said confidential or proprietary information except to specifically promote GLG opportunity in accordance with the provisions of this Agreement. Members further agrees that this provision shall survive the expiration or termination of this Agreement for a period of time been. </p>
<p ><strong>&#8226; TRANSFER OF MEMBERSHIP ACCOUNT AND BENEFITS</strong><strong> </strong><br>
  A Member may sell, or WILL on to its "surviving heirs" its interests in its business asset / any continuing income / and the inherent future potential of its earnings. In such an event, the remaining period of income and incentives shall also be transferred to the purchaser or heir. For GLG to acknowledge the sale the selling Members must supply proof of the sale in the form of a signed letter by both parties detailing that the sale has been made as well as providing details of the purchaser including all the fields listed in their profile. GLG will advise the seller and the purchaser by email if the sale has been approved. Members who sell their GLG Account must wait six months after the sale has been executed and authorized by the Company before they can rejoin as a Member. </p>
<p ><strong>&#8226; CANCELLATION</strong><strong> </strong><br>
  Should a member wish to cancel their Agreement with GLG, such member should notify GLG from the support desk of their Dashboard. If the membership is cancelled, that member may not apply for new membership for at least 6 months after GLG has received the notice of cancellation. GLG reserves the right to cancel a members Agreement should there be any breach by the member. </p>
<p ><strong>&#8226; INHERITABILITY</strong><strong> </strong><br>
  CCI membership account, like any other account, business or asset a member may have, is fully transferable in accordance with the terms of a Will, or, in the absence of a Will, it passes to the heirs pursuant to the applicable interstate succession laws. For those members whose GLG account is/are owned by a corporation (or some other type of legal entity), there would be no change in the ownership of the Account upon the death of an owner of that corporation, etc. Ownership of the corporation would change by passing to the heirs, but the corporation would continue to own the GLG Account. </p>
<p ><strong>&#8226; INDEMNITY</strong><strong> </strong><br>
  Members indemnifies and holds GLG harmless against all claims made by any third party, and any related damages and expenses (including reasonable attorney's fees), arising out of or connected with the members conduct, the associate's website or online store, the services the members offers, or any violation of this agreement by associate. </p>
<p ><strong>LIMITATION OF LIABILITY</strong><strong> </strong><br>
  GLG makes no warranties, express or implied, related to the "GLG marketing Plan", services rendered there under or, including but not limited to warranties of Empowerment and privilege of purpose. GLG will not be liable to any member for indirect, incidental, special or consequential damages, such as (but not limited to) loss of profits or business interruption, arising out of or connected to the use of, or inability to use, the "GLG compensation plan", related services, or marketing materials provided to any Member. The total liability of GLG for any and all damages arising from or connected with this Agreement, the "GLG Compensation Plan" or the services, or marketing materials provided to any member shall not exceed the total fees paid by the members of GLG. </p>
<p ><strong>IMPOSITION OF PENALTY</strong><strong> </strong><br>
  If member breaches any of the provisions of this Agreement, violates any applicable law or regulation or engages in any false, misleading or unfair marketing practice, including but not limited to, making misleading income representations or making promises to potential Members that cannot be kept by member, (herein called "Violation") any such Violation is grounds for the imposition of penalty, as more fully set forth hereafter. The Organization may suspend the Member, including suspension of rewards earned at the time, Blocking of Account pending investigation of any alleged Violation. The Distributor shall be given notice of the alleged Violation by e-mail, fax or other rapid method of communication and shall have seven days thereafter to respond in writing (verbal response will not be considered) to any alleged Violation(s), failing which, the Organization can consider the allegations to be true. (It is Associate's responsibility to see that Organization receives the response, with supporting documentation, if any, within the seven-day period.) If at the end of the investigation it is determined that Member is to be penalized, the date of the imposition of the penalty can be, at the Organization's option, <br>
  &#8226; the date of the penalty notice <br>
  &#8226; the date of the notice of the alleged violation <br>
  &#8226; the date on which suspension, if any, occurred, or <br>
  &#8226; any other current date. <br>
  Incomes suspended and/or earned, if any, as of the date of a termination, shall not be paid. Any such payments not paid shall be deemed to be liquidated damages as payment of part of the damages suffered by Organization for the Violation. A Member can request that any decision to impose a penalty be reviewed and supply any additional material that may bear on the matter in support thereof within seven days after notice of the penalty is given. The Organization shall then advise the Members of its final decision. The Organization shall have the option of imposing any one or more of the following penalties for Violations: <br>
  Blocking of the Member's Good Life Marketing Account; <br>
  Denial or revocation of any Incentive awards otherwise earned; <br>
  Denial of Fund Earned from sponsored associate, matrix bonus or from down-line activities; <br>
  Imposition of a fine in an amount to be determined by the Organization; and/or Termination of the Member's Agreement. No extension of time or indulgence granted by GLG to the members shall be deemed in any way to effect, prejudice or derogate from the rights of in any respect under this Agreement, nor shall it in any way be regarded a waiver of any rights by hereunder or a novation of this Agreement. </p>
<p ><strong>OFFICIAL LANGUAGES/DEFINITIONS</strong><strong> </strong><br>
  The English version of this Agreement, as maintained by GLG is the official version and shall control over any other language version(s) which may be made available for ease of reference for some Members. As used in the GLG materials, when the term, "refer/introduce" and words of similar import are used to describe the enrolment/ promotional activities of members this is an abbreviated reference to the promotional activities of member with respect to sales and it is understood. Likewise, when the term, "recruit" and words of similar import are used to describe the referral and recruiting activities of members, this is an abbreviated reference to the team building activities of Members and it is understood that the agreement by which one becomes a Member is between the Organization and the recruited Member and not between the new member and the referring member. </p>
<p ><strong>INCORPORATION OF AGREEMENTS</strong><strong> </strong><br>
  If Member has enrolled in a "GLG Opportunity ", the User Agreement and Acceptable Use Policy are incorporated herein as if fully set forth. </p>
<p ><strong>ENTIRE AGREEMENT</strong><strong> </strong><br>
  This Agreement constitutes the entire agreement between the parties on the subject matter hereof, and no other additional promises, representations, guarantees or agreements of any kind shall be valid concerning such subject matter unless in writing and signed by an authorized officer of GLG. </p>
<p ><strong>RESPONSIBILITY</strong><strong> </strong><br>
  GLG is not responsible for the acts of its Members under any circumstances for their wrongful and illegal activities. </p>
<p ><strong>APPLICANT ACKNOWLEDGEMENT</strong><strong> </strong><br>
  A Member acknowledges that he/she has read, understands and agrees to the terms set forth in this Agreement. A member understands that this Agreement is not in force until accepted. </p>
<p ><strong>ANTI-SPAM POLICY</strong><strong> </strong><br>
  COMPANY HAS A ZERO TOLERANCE ANTI-SPAM POLICY. THIS MEANS THAT ANY TEAM LEADER OR MEMBER OR RELATED MEMBER THAT SPAM'S IN ANY WAY SHALL BE IMMEDIATELY TERMINATED WITH ALL RIGHTS FORFEITED. <br>
  The following Acceptable use (Anti-Spam) policy sets forth what activities on the part of an Organization, Members will not be tolerated under any circumstances. These policies will be enforced to insure GLG continued reputation remains as a high quality, professional Organization will immediately terminate any Member found engaging in spamming or any illegal activity. Their participation shall be terminated and they will be charged five hundred dollars for each reported spamming activity as a penalty and damage charge. Company will immediately contact state and federal authorities to report such activity as it is a crime in many jurisdictions to Spam. <br>
  Any Member, person or entity found spamming will have their relationship to GLG when Company receives complaints from any part of the Internet community and verifies same. All Members are required to agree and adhere to these stated conditions. A Member cannot violate any applicable local, state, federal or international law. Illegal spamming activity includes posting identical or substantially similar articles to an excessive (more than 3) number of news groups or continued posting of articles which are of topic for a newsgroup; Sending unsolicited mass (to more than 10 users) emailing which provoke complaints from the recipients or where the recipients have not agreed, prior to such mailing to accept such emails. Unsolicited commercial advertisements will be treated as illegal Spam. <br>
  GLG WILL FULLY COOPERATE WITH ALL ANTI-CRIMINAL AUTHORITIES TO PROVIDE INFORMATION AS TO THE PERSON OR PERSONS THAT ENGAGED IN THE SPAMMING ACTIVITY IN ORDER TO OBTAIN WARRANTS AND CRIMINAL CHARGES AGAINST THOSE MEMBERS. </p>
													</div>
													
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