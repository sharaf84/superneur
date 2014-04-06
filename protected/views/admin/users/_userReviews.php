<?php
$this->widget('bootstrap.widgets.TbGridView', array(
                            'id' => 'reviewsGrid',
                            'type' => 'striped',
                            'dataProvider' => $reviews->search(array('condition' => '`to` = ' . $model->id . ' OR `from` = ' . $model->id)),
                            'afterAjaxUpdate' => 'function(id ,data){dzRatyUpdate();}',
                            'columns' => array(
                                'id',
                                'subject',
                                array(
                                    'name' => 'commitment_rate',
                                    'class' => 'application.extensions.DzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                                    'options' => array(//      Custom options for jQuery Raty data column
                                        'space' => FALSE,
                                        'readOnly' => TRUE
                                    ),
                                    'filter' => array('application.extensions.DzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                                            'model' => $reviews,
                                            'attribute' => 'commitment_rate',
                                            'options' => array(//      Custom options for jQuery Raty filter column
                                                'cancel' => TRUE,
                                                'cancelPlace' => 'right'
                                            ),
                                        ))
                                ),
                                array(
                                    'name' => 'quality_rate',
                                    'class' => 'application.extensions.DzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                                    'options' => array(//      Custom options for jQuery Raty data column
                                        'space' => FALSE,
                                        'readOnly' => TRUE
                                    ),
                                    'filter' => array('application.extensions.DzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                                            'model' => $reviews,
                                            'attribute' => 'quality_rate',
                                            'options' => array(//      Custom options for jQuery Raty filter column
                                                'cancel' => TRUE,
                                                'cancelPlace' => 'right'
                                            ),
                                        ))
                                ),
                                array(
                                    'name' => 'cost_rate',
                                    'class' => 'application.extensions.DzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                                    'options' => array(//      Custom options for jQuery Raty data column
                                        'space' => FALSE,
                                        'readOnly' => TRUE
                                    ),
                                    'filter' => array('application.extensions.DzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                                            'model' => $reviews,
                                            'attribute' => 'cost_rate',
                                            'options' => array(//      Custom options for jQuery Raty filter column
                                                'cancel' => TRUE,
                                                'cancelPlace' => 'right'
                                            ),
                                        ))
                                ),
                                array(
                                    'name' => 'availability_rate',
                                    'class' => 'application.extensions.DzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                                    'options' => array(//      Custom options for jQuery Raty data column
                                        'space' => FALSE,
                                        'readOnly' => TRUE
                                    ),
                                    'filter' => array('application.extensions.DzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                                            'model' => $reviews,
                                            'attribute' => 'availability_rate',
                                            'options' => array(//      Custom options for jQuery Raty filter column
                                                'cancel' => TRUE,
                                                'cancelPlace' => 'right'
                                            ),
                                        ))
                                ),
                                array(
                                    'name' => 'from',
                                    'type' => 'raw',
                                    'value' => 'CHtml::link($data->reviewFrom->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->reviewFrom->id)))',
                                ),

                                array(
                                    'name' => 'to',
                                    'type' => 'raw',
                                    'value' => 'CHtml::link($data->reviewTo->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->reviewTo->id)))',
                                ),
    //                            'rating',
                                array(
                                    'class' => 'bootstrap.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                    'viewButtonUrl' => 'Yii::app()->createUrl("/admin/reviews/view/", array("id" => $data->id))',
                                    'viewButtonOptions' => array('class' => 'fancyAjaxFeedback', 'data-fancybox-type' => 'ajax'),
                                ),
                            ),
                        ));