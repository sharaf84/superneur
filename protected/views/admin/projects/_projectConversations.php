    <!--Sidebar-->
 <!-- BEGIN CHAT -->
<div id="sidr" class="chat-window-wrapper">
  <div id="main-chat-wrapper" >
    <div class="chat-window-wrapper fadeIn" id="chat-users" >
      <div class="chat-header">
        <div class="pull-left">
          <input type="text" placeholder="search">
        </div>
        <div class="pull-right"> <a href="#" class="" >
          <div class="iconset top-settings-dark "></div>
          </a> </div>
      </div>
<!--      <div class="side-widget">
        <div class="side-widget-title">group chats</div>
        <div class="side-widget-content">
          <div id="groups-list">
            <ul class="groups" >
              <li><a href="#">
                <div class="status-icon green"></div>
                Office work</a></li>
              <li><a href="#">
                <div class="status-icon green"></div>
                Personal vibes</a></li>
            </ul>
          </div>
        </div>
      </div>-->
<!--      <div class="side-widget fadeIn">
        <div class="side-widget-title">favourites</div>
        <div id="favourites-list">
          <div class="side-widget-content" >
            <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
              <div class="user-profile"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> Jane Smith </div>
                <div class="user-more"> Hello you there? </div>
              </div>
              <div class="user-details-status-wrapper"> <span class="badge badge-important">3</span> </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon green"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="David Nester">
              <div class="user-profile"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> David Nester </div>
                <div class="user-more"> Busy, Do not disturb </div>
              </div>
              <div class="user-details-status-wrapper">
                <div class="clearfix"></div>
              </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon red"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>-->
      <div class="side-widget">
          <div class="side-widget-title"><?php echo Yii::t('default', 'Conversations');?></div>
        <div class="side-widget-content" id="friends-list">
          <?php 
            $i = 1;
            foreach ($conversationsArr as $user => $conversation) {
             if(count($conversation) > 0){
          ?>
          <div class="user-details-wrapper" data-user="user<?php echo $user;?>" data-chat-status="online" data-chat-user-pic="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="<?php echo Users::model()->getName($user);?>">
              <div class="user-profile"> <?php echo Users::model()->getAvatar('micro', $user);?> </div>
            <div class="user-details">
                <div class="user-name"> <?php echo Users::model()->getName($user);?> </div>
              <!--<div class="user-more"> Hello you there? </div>-->
            </div>
            <div class="user-details-status-wrapper"> </div>
            <div class="user-details-count-wrapper">
              <div class="status-icon green"></div>
            </div>
            <div class="clearfix"></div>
          </div>
             <?php }?>
            <?php $i++; }$i = 1;?>
<!--            
          <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="David Nester">
            <div class="user-profile"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h2x.jpg" width="35" height="35"> </div>
            <div class="user-details">
              <div class="user-name"> David Nester </div>
              <div class="user-more"> Busy, Do not disturb </div>
            </div>
            <div class="user-details-status-wrapper">
              <div class="clearfix"></div>
            </div>
            <div class="user-details-count-wrapper">
              <div class="status-icon red"></div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
            <div class="user-profile"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c2x.jpg" width="35" height="35"> </div>
            <div class="user-details">
              <div class="user-name"> Jane Smith </div>
              <div class="user-more"> Hello you there? </div>
            </div>
            <div class="user-details-status-wrapper"> </div>
            <div class="user-details-count-wrapper">
              <div class="status-icon green"></div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-user-name="David Nester">
            <div class="user-profile"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h2x.jpg" width="35" height="35"> </div>
            <div class="user-details">
              <div class="user-name"> David Nester </div>
              <div class="user-more"> Busy, Do not disturb </div>
            </div>
            <div class="user-details-status-wrapper">
              <div class="clearfix"></div>
            </div>
            <div class="user-details-count-wrapper">
              <div class="status-icon red"></div>
            </div>
            <div class="clearfix"></div>
          </div>-->
        </div>
      </div>
    </div>
      
      <?php foreach ($conversationsArr as $user => $conversation) { ?>
        <div class="chat-window-wrapper fadeIn" id="messages-wrapper-user<?php echo $user;?>" style="display:none">
            <div class="chat-header">
                <div class="pull-left">
                    <input type="text" placeholder="search">
                </div>
                <div class="pull-right"> <a href="#" class="" >
                        <div class="iconset top-settings-dark "></div>
                    </a> </div>
            </div>
            <div class="clearfix"></div>
            <!--End Search-->

            <div class="chat-messages-header">
                <div class="status online"></div>
                <span class="semi-bold">Jane Smith(Typing..)</span> <a href="#" class="chat-back" data-user="user<?php echo $user;?>"><i class="icon-custom-cross"></i></a> 
            </div>

            <div class="chat-messages">
                
                <!--<div class="sent_time">Yesterday 11:25pm</div>-->
                <?php foreach ($conversation as $message) { ?>
                <div class="user-details-wrapper <?php echo ( $message->sender_id == $model->owner_id ) ? "pull-right" : "" ?>" >
                    <?php if( $message->sender_id !== $model->owner_id ){?>
                    <div class="user-profile"> <?php echo Users::model()->getAvatar('micro', $message->sender_id);?> </div>
                    <?php }?>
                    <div class="user-details">
                        <div class="bubble <?php echo ( $message->sender_id == $model->owner_id ) ? "sender" : "" ?>"> <?php echo $message->message;?> </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sent_time off">Sent On <?php echo $message->created;?></div>
                </div>
                <?php }?>
                
                <!--Project Owner Message-->
<!--                <div class="user-details-wrapper pull-right">
                    <div class="user-details">
                        <div class="bubble sender"> Let me know when you free </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sent_time off">Sent On Tue, 2:45pm</div>
                </div>-->
                
<!--                <div class="user-details-wrapper ">
                    <div class="user-profile"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
                    <div class="user-details">
                        <div class="bubble"> How was the meeting? </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sent_time off">Yesterday 11:25pm</div>
                </div>-->
                
<!--                <div class="user-details-wrapper ">
                    <div class="user-profile"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
                    <div class="user-details">
                        <div class="bubble"> Let me know when you free </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sent_time off">Yesterday 11:25pm</div>
                </div>-->
                <!--<div class="sent_time ">Today 11:25pm</div>-->
                
            </div>
        </div>
      <?php }?>
<!--    <div class="chat-input-wrapper" style="display:none">
      <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
    </div>-->
    <div class="clearfix"></div>
  </div>
</div>
<!-- END CHAT -->