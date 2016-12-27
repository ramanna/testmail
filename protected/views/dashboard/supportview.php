<div class="mainContentIn supportPage">
  <div class="col-md-12 top10">
	<h3 class="pageTitle">View</h3>
    <a href="#/reply?id={{cId}}" class="btn greenBtn  top10 pull-right">Reply</a>
    <a href="#/inbox" class="btn db-submit top10 pull-right margin-right5">Cancel</a>
    <div class="messageList">
    <ul class="chats">
        <div ng-repeat="mailDetails in viewMailJson">
            <div ng-if="mailDetails.from_user_id == loginUserId">
                <li class="in">
                    <div class="user-details col-md-2 padding-left0">
                        <p  class="name">{{mailDetails.username ? mailDetails.username : mailDetails.email}}</p>
                        <span>{{mailDetails.updated_at}}</span>
                    </div>
                    <div class="message col-md-8">
                        <span class="arrow"> </span>
                        <span class="body" ng-bind-html='mailDetails.message'></span>
                        <div ng-if="mailDetails.attachment">
                            <p><a download="{{mailDetails.attachment}}" href="/upload/mail/{{mailDetails.attachment}}" target="_blank">Click here to download</a> / <a href="/upload/mail/{{mailDetails.attachment}}" target="_blank">Preview</a></p>                              
                        </div>
                    </div>
                </li>
            </div>
            <div ng-if="mailDetails.from_user_id != loginUserId">  
                <li class="out">
                    <div class="user-details col-md-2 pull-right text-right padding-right0">
                        <p  class="name">{{mailDetails.dname}}</p>
                        <span>{{mailDetails.updated_at}}</span>
                    </div>
                    <div class="message col-md-8 col-md-offset-2 ">
                        <span class="arrow"> </span>
                        <span class="body" ng-bind-html='mailDetails.message'></span>
                        <div ng-if="mailDetails.attachment">
                            <p><a download="{{mailDetails.attachment}}" href="/upload/attachement/{{mailDetails.attachment}}" target="_blank">Click here to download</a> / <a href="/upload/attachement/{{mailDetails.attachment}}" target="_blank">Preview</a></p>                              
                        </div>
                    </div>
                </li>
            </div>   
        </div>
    </ul>
</div>
</div>
</div>