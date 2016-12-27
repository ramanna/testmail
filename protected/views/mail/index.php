
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <?php include("sidemenu.php"); ?>
            </div>
            <div>   
                <div class="col-sm-9" ng-controller="mailController">
                    <section class="panel">
                        <header class="panel-heading wht-bg">
                            <h4 class="gen-case"> Compose Mail
                                <form action="#/compose" class="pull-right mail-src-position">
                                    <div class="input-append">
                                        <input type="text" class="form-control " placeholder="Search Mail">
                                    </div>
                                </form>
                            </h4>
                        </header>
                        <div class="panel-body">
                            <div class="compose-btn pull-right">
                                <button class="btn btn-theme btn-sm" ng-click="sendMail();">Send</button>
                                <button class="btn btn-sm" ng-click="discard();">Discard</button>
                                <button class="btn btn-sm" ng-click="draft();">Draft</button>
                            </div>
                            <div class="error-msg" ng-if="errorMsg"> {{errorMsg}}</div>
                            <div class="compose-mail">
                                    <form name="compose.composeMail" ng-submit="compose.composeMail.$valid" novalidate>
                                    <div class="inner form-group">
                                        <label for="to" class="">To:</label>
                                        <input type="text" tabindex="1" id="to" ng-model="compose.send_to_list" ng-pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/" ng-change="getUserList(compose.send_to_list);" name="send_list" class="form-control">
<!--                                        <select id="user_list" class="multipleSelect form-control pull-right" multiple name="language" style="max-width:90%; ">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>-->
                                        <div ng-show="compose.composeMail.$submitted || compose.composeMail.send_to_list.$touched">      
                                            <div class="error" ng-show="compose.composeMail.send_to_list.$error.required">Please Enter To EmailId.</div>   
                                            <div class="error" ng-show="compose.composeMail.send_to_list.$error.pattern">Invalid EmailId.</div>   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject" class="">Subject:</label>
                                        <input type="text" tabindex="1" id="subject" ng-model="compose.subject" ng-maxlength="30" class="form-control">
                                        <div ng-show="compose.composeMail.$submitted || compose.composeMail.subject.$touched">      
                                            <div class="error" ng-show="compose.composeMail.subject.$error.required">Please Enter Subject.</div>   
                                        </div>
                                    </div>
                                    <div class="form-group compose-editor">
                                        <textarea name="msg_body" ng-model="compose.msg_body"></textarea>
                                        <div ng-show="compose.composeMail.$submitted || compose.composeMail.msg_body.$touched">      
                                            <div class="error" ng-show="compose.composeMail.msg_body.$error.required">Please Enter Subject.</div>   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject" class="">Attachment:</label>
                                        <input type="file" ng-model="compose.attachfile" name="attachfile[]" class="form-control" multiple ng-files="getTheFiles($files)" />
                                    </div>

                                    <div class="compose-btn">
                                        <a class="btn btn-theme btn-sm" ng-click="compose.composeMail.$valid ? sendMail() : ''">Send</a>
                                        <a class="btn btn-sm" ng-click="discard();">Discard</a>
                                        <a class="btn btn-sm"  ng-click="draft();" >Draft</a>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <!--List of Mail content Started-->

        </div>
    </section><!-- --/wrapper ---->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
