<div class="mainContentIn">  
  <div class="ContentSection dashBoardPage">

	<div class="dashBoardMain">
	  <div class="col-md-5 padding-left0">
		<div class="boxBlock latestTransactions">
		  <div class="dashBoardheader">
			<div class="left">
			  <div class="iconLeft latest">
				<img src="/images/icons/dashboard-latest -transactions.png">
			  </div>
			</div>
			<div class="right">
			  Latest Transactions
			  <a class="viewAllDashboard" href="/dashboard#/wallethistory">
				<i class="fa fa-eye" aria-hidden="true"></i>
				View All
			  </a>
			</div>
		  </div>
		  <div class="transactionTable">
			<!-- Follow this latest structure -->
			<div class="table-responsive">
                            <table class="table table-striped" ng-if="latestTransactionList">
				<tr ng-repeat="latestTransaction in latestTransactionList">
				  <td class="wallet-month">
					<p class="month">{{ latestTransaction.month|uppercase}}</p>
					<p class="date">{{ latestTransaction.date}}</p>
				  </td>
				  <td class="wallet-Time">
					<p>{{latestTransaction.time}}</p>
				  </td>
				  <td class="latestIcon" ><img src="/images/wallet/{{latestTransaction.type| lowercase}}.png"></td>
                                  <td class="latestValue" ng-if="latestTransaction.processed=='-'">
					<p class="walet-red">{{latestTransaction.processed}}{{latestTransaction.amount}} {{latestTransaction.code}}</p>
				  </td>
                                  <td class="latestValue" ng-if="latestTransaction.processed=='+'">
					<p class="walet-blue">{{latestTransaction.processed}}{{latestTransaction.amount}} {{latestTransaction.code}}</p>
				  </td>
				</tr>
			  </table>
                            <table class="table table-striped" ng-if="latestTransactionList==''">
                                <tr>
                                    <td>No transaction found...</td> 
                                </tr>
                            </table>
                            
			</div> <!-- End new latest Table Structure -->

		  </div>
		</div>
	  </div>
	  <div class="col-md-7 padding-right0">
		<div class="boxBlock lastLogin">
		  <div class="dashBoardheader">
			<div class="left">
			  <div class="iconLeft lastLogin">
				<img src="/images/icons/dashboard-last-login.png">
			  </div>
			</div>
			<div class="right">
			  Last Login
			  <a class="viewAllDashboard" href="/dashboard#/loginhistory">
				<i class="fa fa-eye" aria-hidden="true"></i>
				View All
			  </a>
			</div>    
		  </div>
		  <div class="boxBlockIn clearfix">
			<div class="col-md-6 padding-right0">
			  <p class="success-msg">Your Account Last Successful Login</p>
			  <p>Date : {{successTime| date:'EEEE, d MMM  y'}}</p>
			  <p>Time : {{successTime| date:'h:mm:ss a'}}</p>
			  <p>Client IP : {{successLogin.ip_address}}</p>
			</div>
			<div class="col-md-6" ng-if="failTime">
			  <p class="error-msg">Your Account Last failure login</p>
			  <p>Date : {{failTime| date:'EEEE, d MMM  y'}}</p>
			  <p>Time : {{failTime| date:'h:mm:ss a'}}</p>
			  <p>Client IP : {{failedIp}}</p>
			</div>
		  </div>
		</div>
		<div class="boxBlock">
		  <div class="dashBoardheader">
			<div class="left">
			  <div class="iconLeft verificationStatus">
				<img src="/images/icons/dashboard-verification-status.png">
			  </div>
			</div>
			<div class="right">
			  Verification Status
			  <a class="viewAllDashboard" href="/dashboard#/verification">
				<i class="fa fa-eye" aria-hidden="true"></i>
				View All
			  </a>
			</div>
		  </div>
		  <div class="boxBlockIn clearfix">
			<div class="verifyRow clearfix">
                            <div class="col-md-4 col-xs-5"><a href="#/verification">phone number</a></div>
                            <div ng-class="mobileVerified == 'VERIFIED' ? 'verified' : 'notVerified'" class="col-md-8 col-xs-7 "><a href="#/verification">{{mobileVerified == 'VERIFIED' ? 'Verified' : 'Not Verified'}}</a></div>
			</div>
			<div class="verifyRow clearfix">
                            <div class="col-md-4 col-xs-5"><a href="#/verification">EmailId</a></div>
                          <div ng-class="emailVerified == 'VERIFIED' ? 'verified' : 'notVerified'" class="col-md-8 col-xs-7 "><a href="#/verification">{{emailVerified == 'VERIFIED' ? 'Verified' : 'Not Verified'}}</a></div>
			</div>
			<div class="verifyRow clearfix">
                            <div class="col-md-4 col-xs-5"><a href="#/verification">address proof</a></div>
                          <div ng-class="(idVerified !='VERIFIED') ? 'notVerified' : 'verified'" class="col-md-8 col-xs-7"><span ng-if="idVerified"><a href="#/verification">{{idVerified}}</a></span></div>
			</div>
			<div class="verifyRow clearfix">
                            <div class="col-md-4 col-xs-5"><a href="#/verification">ID Proof</a></div>
                          <div ng-class="(addressVerified !='VERIFIED') ? 'notVerified' : 'verified'" class="col-md-8 col-xs-7 notVerified"><span ng-if="addressVerified"><a href="#/verification">{{addressVerified}}</a></span></div>
			</div>
		  </div>
		</div>
		<div class="boxBlock">
		  <div class="dashBoardheader">
			<div class="left">
			  <div class="iconLeft securityLevel">
				<img src="/images/icons/dashboard-security-level.png">
			  </div>
			</div>
			<div class="right">
			  Security level
			  <a class="viewAllDashboard" href="/dashboard#/security">
				<i class="fa fa-eye" aria-hidden="true"></i>
				View All
			  </a>
			</div>
		  </div>
		  <div class="boxBlockIn clearfix">
			<div class="securityLevel clearfix" >
                            <div class="progress"> 
				<div class="progress-bar {{securityLevel}}" role="progressbar"
					 aria-valuemin="0" aria-valuemax="100">
				  <!--				  70%-->
				</div>
			  </div>
			  <div class="securityIndicators text-right">
				<span>LOW</span>
				<span>InterMediate</span>
				<span>High</span>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
