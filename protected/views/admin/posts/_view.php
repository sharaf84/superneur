<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode($data->type); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />


    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
      <?php echo CHtml::encode($data->slug); ?>
      <br />

     */ ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <?php /*

      <b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
      <?php echo CHtml::encode($data->body); ?>
      <br />


      <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
      <?php echo CHtml::encode($data->image); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
      <?php echo CHtml::encode($data->date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
      <?php echo CHtml::encode($data->position); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
      <?php echo CHtml::encode($data->created); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
      <?php echo CHtml::encode($data->updated); ?>
      <br />

     */ ?>

</div>