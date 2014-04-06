<?php

class SimpleTreeWidget extends CInputWidget
{
    private $baseUrl;
                    
    public $ajaxUrl;
    public $id = 'simpletree_widget';
    public $model;
    public $defaults;
    public $rootTitle = 'root';
    public $modelPropertyName = 'title';
    public $modelPropertyId = 'id';
    public $modelPropertyParentId = 'id_parent';
    public $modelPropertyPosition = 'position';
    public $conditions = "1";
    public $theme = 'default';
    public $onSelect;
    public $onCreate;
    public $onMove;
    public $onRemove;
    public $onRename;
    
    public function run()
    {
        //if this is an Ajax request, do Ajax and die.
        //It is recommended to change $ajaxUrl to call SimpleTreeWidget::performAjax() directly from a controller.
        if (Yii::app()->request->isAjaxRequest && isset($_POST['simpletree']))
        {       
            self::performAjax();
            die;
        }
        //register assets
        $clientScript = Yii::app()->getClientScript(); 
        $dir = dirname(__FILE__).'/SimpleTree';
        $this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $clientScript->registerCoreScript('jquery');
        $clientScript->registerScriptFile($this->baseUrl . '/_lib/jquery.cookie.js', CClientScript::POS_HEAD);
        $clientScript->registerScriptFile($this->baseUrl . '/_lib/jquery.hotkeys.js', CClientScript::POS_HEAD);
        $clientScript->registerScriptFile($this->baseUrl . '/jquery.jstree.js', CClientScript::POS_HEAD);
        
        
        //create container node
        echo "<div id='$this->id'>node</div>";
        $clientScript->registerScript('createJtree','jQuery("#'.$this->id.'").jstree({
             "ui" : {

            "select_limit" : 1,

        },

            "plugins" : [ "themes", "json_data", "ui", "crrm", "cookies", "dnd", "types", "hotkeys", "contextmenu" ],
            "core" : {
                "animation" : 300
            },
            "json_data" : {
                "ajax" : {
                    // the URL to fetch the data
                    "url" : "'.$this->ajaxUrl.'",
                    "data" : function (n) { 
                        return { 
                            "operation" : "get_children", 
                            "id" : n.attr ? n.attr("id").replace("node_","") : '.$this->modelId.' ,
                            '.$this->getEnvironment().'
                        }; 
                    }
                }
                
            },
             
            "themes" : {
                "theme" : "'.$this->theme.'",
                "url" : "'.$this->baseUrl.'/themes/'.$this->theme.'/style.css"
            },
            "types" : {
                "valid_children" : ["selected"],
                //"max_depth" : -2,
                //"max_children" : -2,
                "types" : {
                    "readonly" : {
                        "delete_node" : false,
                        "icon" : {"image" : "'.$this->baseUrl.'/themes/readonly.png"},
                        "selected" :{"select_node":false}
                    }
                }
            }
        })
        .bind("create.jstree", function (e, data) {
            $.post(
                "'.$this->ajaxUrl.'", 
                { 
                    "simpletree" : 1,
                    "operation" : "create_node", 
                    "id" : (data.rslt.parent.attr("id")) ? data.rslt.parent.attr("id").replace("node_","") : 0, 
                    "position" : data.rslt.position,
                    "title" : data.rslt.name,
                    "type" : data.rslt.obj.attr("rel"),
                    '.$this->getEnvironment().'
                }, 
                function (r) {
                    if(r.status) {
                        $(data.rslt.obj).attr("id", "node_" + r.id);
                        '.$this->onCreate.'
                    }
                    else {
                        $.jstree.rollback(data.rlbk);
                    }
                }
            );
        })
        .bind("remove.jstree", function (e, data) {
            data.rslt.obj.each(function () {
                if (data.inst._get_type(this) == "readonly")
                    return; 
                $.ajax({
                    async : false,
                    type: \'POST\',
                    url: "'.$this->ajaxUrl.'",
                    data : { 
                        "simpletree" : 1,
                        "operation" : "remove_node", 
                        "id" : this.id.replace("node_",""),
                        '.$this->getEnvironment().'
                    }, 
                    success : function (r) {
                        if(!r.status) {
                            data.inst.refresh();
                        }else{
                        
                            '.$this->onRemove.'
                        }
                    }
                });
            });
        })
        .bind("rename.jstree", function (e, data) {
            $.post(
                "'.$this->ajaxUrl.'", 
                { 
                    "simpletree" : 1,
                    "operation" : "rename_node", 
                    "id" : data.rslt.obj.attr("id").replace("node_",""),
                    "title" : data.rslt.new_name,
                    '.$this->getEnvironment().'
                }, 
                function (r) {
                    if(!r.status) {
                        $.jstree.rollback(data.rlbk);
                    }else{
                        '.$this->onRename.'
                    }
                }
            );
        })
        .bind("move_node.jstree", function (e, data) {
            data.rslt.o.each(function (i) {
                $.ajax({
                    async : false,
                    type: \'POST\',
                    url: "'.$this->ajaxUrl.'",
                    data : { 
                        "simpletree" : 1,
                        "operation" : "move_node", 
                        "id" : $(this).attr("id").replace("node_",""), 
                        "ref" : data.rslt.np.attr("id").replace("node_",""), 
                        "position" : data.rslt.cp + i,
                        "title" : data.rslt.name,
                        "copy" : data.rslt.cy ? 1 : 0,
                        '.$this->getEnvironment().'
                    },
                    success : function (r) {
                        if(!r.status) {
                            $.jstree.rollback(data.rlbk);
                        }
                        else {
                            $(data.rslt.oc).attr("id", "node_" + r.id);
                            if(data.rslt.cy) {
                                data.inst.refresh(data.inst._get_parent(data.rslt.oc));
                            }
                            '.$this->onMove.'
                        }
                    }
                });
            });
        })
        .bind("select_node.jstree", function (e, data){ 
        
            '.$this->onSelect.'
        });', CClientScript::POS_END);
        
    }

    public function getEnvironment()
    {
        $model = is_string($this->model) ? $this->model : get_class($this->model);
        return '
            "model" : "'.$model.'",
            "modelPropertyId" : "'.$this->modelPropertyId.'",
            "modelPropertyParentId" : "'.$this->modelPropertyParentId.'",
            "modelPropertyPosition" : "'.$this->modelPropertyPosition.'",
            "modelPropertyName" : "'.$this->modelPropertyName.'",
            "conditions" : "'.$this->conditions.'",
            "rootTitle" : "'.$this->rootTitle.'",
            '.$this->defaults;
    }
    
    
    public function getModelId()
    {
        if (is_object($this->model))
            return($this->model->{$this->modelPropertyId});
        else
            return 0;
    }
    
    public static function _get_children()
    {

        $children = array();
        $Model = new $_REQUEST['model'];
        
        //Added by zizo for add extra condition in the query:
        $children = array();
        $Model = new $_REQUEST['model'];
        $criteria = new CDbCriteria();
        $criteria->order = $_REQUEST['modelPropertyPosition'];
        
        $criteria->condition =  $_REQUEST['modelPropertyParentId']."=:parent_id";
        $criteria->params = array(":parent_id"=>$_REQUEST['id']);
        
        $criteria->addCondition($_REQUEST['conditions']);
        foreach ($Model->findAll($criteria) AS $k => $Model)
        {
            $children[$k]["data"] = $Model->{$_REQUEST['modelPropertyName']};            
            $children[$k]["attr"]["id"] = "node_".$Model->{$_REQUEST['modelPropertyId']};
            if (isset($Model->readonly) && $Model->readonly)
                $children[$k]["attr"]["rel"] = "readonly";
            else
                $children[$k]["attr"]["rel"] = "default";
            
            //only add a closed symbol if the model has children
            if ($Model->findByAttributes(array($_REQUEST['modelPropertyParentId']=>$Model->{$_REQUEST['modelPropertyId']})))
                $children[$k]["state"] = "closed";
        };
        
        if (!$_REQUEST['id'])
         $children = array(
            "data" => $_REQUEST['rootTitle'],
            "attr" => array('id'=>0),
            "children" => $children,
            //"state" => $children ? 'open' : '',
            "attr" => array("rel"=>"readonly")
         );
        
        echo json_encode($children); die;
    }
    

    
    static function performAjax()
    {
        $Model = new $_REQUEST['model'];
        $method = '_'.$_REQUEST['operation'];
        
        header("HTTP/1.0 200 OK");
        header('Content-type: text/json; charset=utf-8');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: no-cache");
        self::$method($_POST);
        
    }
    
    static function _create_node($params)
    {
        $Model = new $params['model'];
        $Model->$params['modelPropertyParentId'] = $params['id'];
        $Model->$params['modelPropertyName'] = $params['title'];
        @$Model->$params['modelPropertyPosition'] = $params['position'];
        
        //Add defaults for the field sent in params array
        $prefix = "field_";
        foreach ($params as $fKey => $fValue) {
            if (substr($fKey, 0, strlen($prefix)) == $prefix) {
                    $propertyName = substr($fKey, strlen($prefix));
                    $Model->$propertyName = $fValue;
            }
        }
        if($Model->save())
            echo json_encode(array('status'=>1, 'id'=>$Model->$params['modelPropertyId']));
        else
            print_r($Model->getErrors());
    }
    
    static function _remove_node($params)
    {   
        self::_removeModelRecursively($params);
        echo json_encode(array('status'=>1));
    }
    
    static function _rename_node($params)
    {
        $Model = new $params['model'];
        $Model = $Model->findByPk($params['id']);
        $Model->$params['modelPropertyName'] = $params['title'];
        if($Model->save())
            echo json_encode(array('status'=>1));
    }
    
    
    static function _move_node($params)
    {   
        $params['ref'] = (int)$params['ref'];
        
        //get model
        $Model = new $params['model'];
        $Model = $Model->findByPk($params['id']);
        
        //copy and die?
        if($params['copy'])
        {
            $Model = self::_copy_node($Model, $params);
        }
        
        //get new siblings
        $criteria=new CDbCriteria;
        $criteria->order=$params['modelPropertyPosition'];
        $criteria->condition=$params['modelPropertyParentId'].'='.$params['ref'] . ' AND ' . $params['modelPropertyId'] . '!='.$params['id'];
        $siblings=$Model->findAll($criteria);       
        
        //if item is moved to a higher position ID in it's current folder, make sure to substract it's old position as the item only exists once
        if ($Model->$params['modelPropertyParentId'] == $params['ref'] && $Model->$params['modelPropertyPosition'] < $params['position'])
            $params['position']--;
        
        //save model
        $Model->$params['modelPropertyPosition'] = $params['position'];
        $Model->$params['modelPropertyParentId'] = $params['ref'];
        $Model->save();
        
        //assign positions to siblings
        $i = 0;
        foreach ($siblings AS $Sibling)
        {
            //params position is reserved, so iterate by it
            if($i == $params['position'])
                $i++;
            $Sibling->$params['modelPropertyPosition'] = $i;
            $Sibling->save();
            $i++;
        }
        
        echo json_encode(array('status'=>1));
    }
    
    static function _copy_node($Model, $params, $inheritPosition = false)
    {
        $NewModel = new $params['model'];
        $NewModel->attributes = $Model->attributes;
        
        //copy these, even if they're unsafe values
        $NewModel->{$params['modelPropertyName']} = $Model->{$params['modelPropertyName']};
        $NewModel->{$params['modelPropertyParentId']} = $params['ref'];
        $NewModel->{$params['modelPropertyPosition']} = $inheritPosition? $Model->{$params['modelPropertyPosition']} : $params['position'];
        
        if ($NewModel->save())
        {
            //copy children
            foreach ($NewModel->findAllByAttributes(array($params['modelPropertyParentId']=>$Model->{$params['modelPropertyId']})) AS $Child)
            {
                $params['ref'] = $NewModel->{$params['modelPropertyId']};
                self::_copy_node($Child, $params, true);
            }
            return $NewModel;
        }
    }
    
    static function _removeModelRecursively($params)
    {   
        if (!$params['id'] || preg_match('/[^\d]/',$params['id']))
            return json_encode(array('status' => 0));
        
        $Model = new $params['model'];
        $Model = $Model->findByPk($params['id']);
        foreach($Model->findAllByAttributes(array($params['modelPropertyParentId'] => $params['id'])) AS $Child)
        {
            $params['id'] = $Child->$params['modelPropertyId'];
            self::_removeModelRecursively($params);
        }
        $Model->delete();
    }
}


?>