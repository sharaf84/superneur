<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->id,
);
$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'List Users', 'url' => array('index')),
                array('label' => 'Create Users', 'url' => array('create')),
                array('label' => 'Update Users', 'url' => array('update', 'id' => $model->id)),
                array('label' => 'Delete Users', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
                array('label' => 'Manage Users', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));


?>

<h1>View User <i class=""><?php echo $model->getName(); ?></i></h1>

<?php

$reviewsToMe = $model->reviewsToMe;
?>

<div class="row">
			<div class="col-md-6">
				<div class=" tiles white col-md-12 no-padding">
					<div class="tiles green cover-pic-wrapper">						
						<div class="overlayer bottom-right">
							<div class="overlayer-wrapper">
									<div class="padding-10 hidden-xs">									
										<!--<button type="button" class="btn btn-primary btn-small"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</button>--> 
                                                                            <a href="/admin/users/update/id/<?php echo $model->id;?>" class="btn btn-primary btn-small">Edit</a>
									</div>
								</div>
						</div>
					<!--<img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/cover_pic.png" alt="">-->
                                        <?php echo $model->getCover();?>
					</div>
					<div class="tiles white">
			
						<div class="row">
							<div class="col-md-3 col-sm-3" >
								<div class="user-profile-pic">	
									<!--<img width="69" height="69" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.jpg" alt="">-->
                                                                    <?php echo $model->getAvatar();?>
								</div>
								 <div class="user-mini-description">
									<h3 class="text-success semi-bold">
									<?php echo $model->followersCounter($model->id);?>
									</h3>
									<h5>Followers</h5>
									<h3 class="text-success semi-bold">
									<?php echo $model->followingsCounter($model->id);?>
									</h3>
									<h5>Following</h5>
								</div>
							</div>
							<div class="col-md-5 user-description-box  col-sm-5">
								<h4 class="semi-bold no-margin"><?php echo $model->getName(); ?></h4>
                                                                <?php if($model->title){ ?>
                                                                    <h6 class="no-margin"><?php echo $model->title; ?></h6>
                                                                <?php }?>
                                                                    
								<br>
                                                                <?php if($model->gender){?>
								<p><i class="fa <?php echo ($model->gender == 'Male') ? 'fa-male' : 'fa-female' ?>"></i><?php echo ($model->gender)?></p>
                                                                <?php }?>
                                                                
                                                                <?php if($model->address){?>
								<p><i class="fa fa-map-marker"></i><?php echo ($model->address)?></p>
                                                                <?php }?>
                                                                <?php if($model->website){?>
                                                                    <p><i class="fa fa-globe"></i><?php echo $model->website;?></p>
                                                                <?php }?>
                                                                    
                                                                <?php if($model->phone){?>    
								<p><i class="fa fa-phone"></i><?php echo $model->phone;?></p>
                                                                <?php }?>
                                                                
                                                                <?php if($model->access){?>    
								<p><i class="fa fa-sign-in"></i><?php echo $model->access;?></p>
                                                                <?php }?>
                                                                <p>
                                                                
                                                                <li class="fa pull-right">
                                                                    <!--&nbsp;&nbsp;&nbsp;&nbsp;Balance-->
                                                                 <div>      
                                                                    <div class="heading text-success" > $ <span class="animate-number" data-value="<?php echo $model->balance * 1;?>" data-animation-duration="1200">0</span> </div>
                                                                    <div class="progress transparent progress-white progress-small no-radius">
                                                                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%" ></div>
                                                                    </div>
                                                                  </div>
                                                                </li>
                                                                </p>
                                                                
<!--								<p><i class="fa fa-file-o"></i>Download Resume</p>
								<p><i class="fa fa-envelope"></i>Send Message</p> !-->
							</div>
                                                        
<!--							<div class="col-md-3  col-sm-3">
								<h5 class="normal">Friends ( <span class="text-success">1223</span> )</h5>
								<ul class="my-friends">
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" alt="">
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/c.jpg" alt="">
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" alt="">
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small.jpg" alt=""> 
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/e2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/e.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/e.jpg" alt=""> 
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/b2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/b.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/b.jpg" alt=""> 
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" alt="">
										</div>
									</li>
									<li><div class="profile-pic"> 
										<img width="35" height="35" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" alt="">
										</div>
									</li>							
								</ul>	
								<div class="clearfix"></div>
							</div>				-->
							<div class="col-md-3  col-sm-3">
                                                            <h5 class="normal">Reviews ( <span class="text-success"><?php echo count($reviewsToMe);?></span> )</h5>
								<ul class="my-friends">
                                                                        <?php foreach ($reviewsToMe as $review) {?>
									<li><div class="profile-pic"> 
										<!--<img width="35" height="35" data-src-retina="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" data-src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" alt="">-->
                                                                                <?php echo $review->reviewFrom->getAvatar();?>
										</div>
									</li>					
                                                                        <?php }?>
								</ul>	
								<div class="clearfix"></div>
							</div>				
						</div>
<!--                                                <div class="row center">
                                                    <div class="col-md-5 col-sm-6 spacing-bottom ">
                                                        <div class="tiles red added-margin">
                                                          <div class="tiles-body">
                                                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                                            <div class="tiles-title"> BALANCE </div>
                                                            <div class="heading"> $ <span class="animate-number" data-value="14500" data-animation-duration="1200">0</span> </div>
                                                            <div class="progress transparent progress-white progress-small no-radius">
                                                              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%" ></div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>-->
                                                
                                                
				
				  <div class="tiles-body">
<!--				  <div class="row">
					<div class="post col-md-12">
                                                <?php foreach ($reviewsToMe as $review) {?>
						<div class="user-profile-pic-wrapper">
							<div class="user-profile-pic-normal">
                                                                <?php echo $review->reviewFrom->getAvatar();?>
                                                        </div>
						</div>
						<div class="info-wrapper">					
							<div class="username">
								<span class="dark-text"><?php echo $review->subject;?></span> by <span class="dark-text"><?php echo $review->reviewFrom->getName();?></span>	
							</div>
							<div class="info"><?php echo $review->review;?></div>	
							<div class="more-details">
								<ul class="post-links">
									<li>
                                                                                <?php 
                                                                                        $this->widget('application.extensions.DzRaty.DzRaty', array(
                                                                                                 'name' => 'overallRating'.$review->id,
                                                                                                 'value' => ($review->commitment_rate + $review->quality_rate + $review->cost_rate + $review->availability_rate) / 4,
                                                                                                 'options' => array(
                                                                                                         'readOnly' => TRUE,
                                                                                                 ),
                                                                                         ));
                                                                               ?>
                                                                        </li>
									<li><a href="#" class="muted">2 Minutes ago</a></li>
									<li><a href="#" class="text-info">Collapse</a></li>
									<li><a href="#" class="text-info" ><i class="fa fa-reply"></i> Reply</a></li>
									<li><a href="#" class="text-warning"><i class="fa fa-star"></i> Favourited</a></li>
									<li><a href="/admin/reviews/view/id/<?php echo $review->id;?>"  class="muted">More</a></li>
								</ul>
							</div>
								<div class="clearfix"></div>							
						</div>	
                                            <?php }?>
						<div class="clearfix"></div>	
						<br>
						<br>
					</div>
				</div>-->
				</div>
					</div>
				</div>	
			</div>
			
			
			<div class="col-md-6">
                            <div class="row">
				<div class="tiles white col-md-12  no-padding">	
                                    <?php
                                        $this->widget('bootstrap.widgets.TbDetailView', array(
                                                'data' => $model,
                                                'attributes' => array(
                                                    'id',
                                                    'username',
                                                    'email',
                                                    array('name' => 'type', 'value' => Users::getTypeList(true, $model->type)),
                                                    'activated',
                                                    'verified',
                                                    'banned',
                                                    'last_login',
                                                    'first_name',
                                                    'last_name',
                                                    'phone',
                                                    'created',
                                                    'updated',
                                                    array('name' => 'cretaed_by', 'value' => $model->created_by ? $model->createdBy->getName() : $model->getName()),
                                                ),
                                            ));

                                    ?>
                                </div>
                            </div>
			</div>
                        
		</div>
                <div class="row">
                    <br>
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#reviews">Reviews</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#transactions">Transactions</a></li>
                        <li><a href="#complaints">Complaints</a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="reviews">
                               <?php
                                    $this->renderPartial('_userReviews', array('reviews' => $reviews, 'model' => $model));
                                ?>
                          </div>
                          <div class="tab-pane" id="projects">
                              <?php 
                                    $this->renderPartial('_userProjects', array('projects' => $projects, 'model' => $model));
                              ?>
                          </div>
                          <div class="tab-pane" id="transactions">
                              <?php 
                                    $this->renderPartial('_userTransactions', array('transactions' => $transactions, 'model' => $model));
                              ?>
                          </div>
                          <div class="tab-pane" id="complaints">
                              <?php 
                                    $this->renderPartial('_userComplaints', array('complaints' => $complaints, 'model' => $model));
                              ?>
                          </div>
                      </div>
                </div>
		
	