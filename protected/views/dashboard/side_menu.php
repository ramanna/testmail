<div class="col-md-3 sideBar padding-left0"> 
  <div class="sideBarIn">
	<ul>
	  <li><a href="#" title="DashBoard">
		  <i class="fa fa-home"></i>
		  dashboard</a></li>
	  <li><a href="#" title="Send Receive">
		  <i class="fa fa-retweet"></i>
		  Deposit Funds</a></li>
	  <li class="active"><a href="#" title="Send Receive">
		  <i class="fa fa-retweet"></i>
		  Fund Transfer</a></li>
	  <li><a href="#" title="Currency Exchange">
		  <i class="fa fa-exchange"></i>
		  Currency Exchange</a></li>
	  <li><a href="#" title="Exchange History">
		  <i class="fa fa-history"></i>
		  Exchange History</a></li>
	  <li><a href="#" title="Wallet History">
		  <i class="fa fa-money"></i>
		  Wallets History</a></li>
	  <li><a href="#" title="Support">
		  <i class="fa fa-life-ring"></i>
		  Support</a></li>
	  <li><a href="#" title="Preferences">
		  <i class="fa fa-gift"></i>
		  Preferences</a></li>
	  <li><a href="#" title="Settings">
		  <i class="fa fa-wrench"></i>
		  Settings</a></li>
	</ul>
  </div>
</div>
<script>
  $(function () {
    var index1 = $(".mainContent > .mainContentIn").index();
    $(".sideBarIn li").on("click", function (e) {
      e.preventDefault();
      $('.sideBarIn li.active').removeClass('active');
      $(this).addClass('active');

      var index = $(this).index();

      $('.mainContent > .mainContentIn').removeClass("active");
      $('.mainContent > .mainContentIn').eq(index).addClass('active');

    });

    $('.sendReceiveBtns .send').on("click", function () {
      $('.row .receiveBlock').hide();
      $('.row .sendBlock').hide();
      $(this).parent().next('.sendBlock').slideToggle();
    });
    $('.sendReceiveBtns .receive').on("click", function () {
      $('.row .receiveBlock').hide();
      $('.row .sendBlock').hide();
      $(this).parent().next().next('.receiveBlock').slideToggle();
    });

  });
</script>
<script type="text/javascript" src="/js/jquery.dd.min.js"></script>
<script>
  $(document).ready(function () {
    $("select.sendList").msDropDown();
  });
</script>