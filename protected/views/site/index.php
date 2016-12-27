
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3" ng-controller="userController">
                <section class="panel">
                    <div class="panel-body">
                        Login
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active">
                                <input type="email" ng-model="login.email" class="form-control" id="email" id="email" value="" placeholder="Enter Email"/>    
                            </li>
                            <li class="active">
                                <input type="password" ng-model="login.password" class="form-control" id="password" id="password" value="" placeholder="Enter Password"/>    
                            </li>
                            <li><br></li>
                            <li ><a class="btn btn-compose" href="javascript:void(0);" ng-click="login();"> LOGIN</a></li>
                        </ul>
                    </div>
                    <div class="error-msg" >{{errorLoginError}}</div>
                </section>

            </div>
  
<!--List of Mail content Started-->

        </div>
	</section><!-- --/wrapper ---->
  </section><!-- /MAIN CONTENT -->

      <!--main content end-->
   