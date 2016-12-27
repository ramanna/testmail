<!-- Input Text Fields Styles to be used -->
<span class="input input--hoshi">
  <textarea class="input__field input__field--hoshi"></textarea>
  <label class="input__label input__label--hoshi input__label--hoshi-color-1">
	<span class="input__label-content input__label-content--hoshi">Bank address*</span>
  </label>
</span>
<!-- Script to be used in JS 
$(".input input").focus(function(){
	$(this).parent().addClass("onFocus");
   }).blur(function(){
	$(this).parent().removeClass("onFocus");
  });
$(".input textarea").focus(function(){
  $(this).parent().addClass("onFocus");
 }).blur(function(){
  $(this).parent().removeClass("onFocus");
});
-->

<!-- Tabbed Menu -->
<!-- Script to be used in JS 
var dashboardApplication = angular.module('dashboardApp', ['ngRoute', 'ngAnimate', 'ngSanitize', 'ui.bootstrap']);
$scope.model = {
  name: 'Tabs'
};
-->
<uib-tabset active="activeForm" class="TabbedMenu">
  <uib-tab index="0" heading="Title 01">
	<div class="ContentSection">
	  Title 02 Content
	</div>
  </uib-tab>
  <uib-tab index="1" heading="Title 02">
	<div class="ContentSection">
	  Title 02 Content
	</div>
  </uib-tab>
  <uib-tab index="2" heading="Title 03">
	<div class="ContentSection">
	  Title 03 Content 
	</div>
  </uib-tab>
</uib-tabset>