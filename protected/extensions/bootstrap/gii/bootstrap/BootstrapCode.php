<?php
/**
 * BootstrapCode class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('gii.generators.crud.CrudCode');

class BootstrapCode extends CrudCode
{
	public function generateActiveRow($modelClass, $column)
	{
		if ($column->type === 'boolean')
			return "\$form->checkBoxRow(\$model,'{$column->name}')";
		else if (stripos($column->dbType,'text') !== false)
			return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";
		else
		{
			if (preg_match('/(password|pass|passwd|passcode)/i',$column->name)){
				$inputField='passwordFieldRow';
                        }else{
				$inputField='textFieldRow';
                        }
                        
                        $wrapperOpen = $wrapperClose = '';
                        
			if (preg_match('/(created|updated|modified|date)/i',$column->name)){
				$class = 'form-control';
                                $wrapperOpen = '<div class="input-append success date col-md-10 col-lg-6">';
                                $wrapperClose = '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>';
                        }else{
				$class = 'form-control';
                        }
//                        var_dump($column);
                        
			if ($column->type!=='string' || $column->size===null){
                                if(substr( $column->dbType, 0, 7 ) === 'tinyint'){
                                    return    "\$form->label(\$model, '{$column->name}', array('class' => 'form-label', 'for' => 'normal'))."
                                            . "\$form->dropDownList(\$model,'{$column->name}', array(0 => 'Option1', 1 => 'Option2', 3 => 'Option3'),array('class'=>'select $class'))";
                                }else{
                                    return "\$form->label(\$model, '{$column->name}', array('class' => 'form-label', 'for' => 'normal'))."
                                    . "'$wrapperOpen'.\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'$class', 'labelOptions' => array('label' => false))).'$wrapperClose'.'<br /><br />'";
                                }
                        }else{
				return "\$form->label(\$model, '{$column->name}', array('class' => 'form-label', 'for' => 'normal'))."
                            . "'$wrapperOpen'.\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'$class','maxlength'=>$column->size, 'labelOptions' => array('label' => false))).'$wrapperClose'.'<br /><br />'" ;
                        }
		}
	}
}
