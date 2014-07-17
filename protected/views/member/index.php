<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 1:55 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Dashboard</a></li>
    <li class="divider"></li>
    <li>Profile</li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
    <h2 class="glyphicons cart_in"><i></i> Manage Profile</h2>
<!--    <div class="buttons pull-right">-->
<!--        <a href="" class="btn btn-default btn-icon glyphicons share"><i></i> Preview</a>-->
<!--        <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Save</a>-->
<!--    </div>-->
</div>
<div class="separator"></div>

<div class="widget widget-2 widget-tabs">
    <div class="widget-head">
        <ul>
            <li class="active"><a href="#profile" data-toggle="tab" class="glyphicons font"><i></i>Profile</a></li>
            <?php if(Yii::app()->user->roleid == 2){ ?>
                <li><a href="#eovenue" data-toggle="tab" class="glyphicons group"><i></i>Event Organizer</a></li>
                <li><a href="#event" data-toggle="tab" class="glyphicons calendar"><i></i>Create Event</a></li>
                <li><a href="#listevent" data-toggle="tab" class="glyphicons justify"><i></i>Events</a></li>
            <?php }elseif(Yii::app()->user->roleid == 3){ ?>
                <li><a href="#eovenue" data-toggle="tab" class="glyphicons group"><i></i>Venue</a></li>
            <?php } ?>
<!--            <li><a href="#productAttributesTab" data-toggle="tab" class="glyphicons adjust_alt"><i></i>Custom Attributes</a></li>-->
<!--            <li><a href="#productPriceTab" data-toggle="tab" class="glyphicons table"><i></i>Qty & Price</a></li>-->
<!--            <li><a href="#productSeoTab" data-toggle="tab" class="glyphicons podium"><i></i>SEO</a></li>-->
        </ul>
    </div>
    <div class="widget-body large">
        <div class="tab-content">

            <!-- Member Profile -->
            <div class="tab-pane active" id="profile">
                <?php echo CHtml::beginForm(Yii::app()->createUrl('member/update'), 'post', array()); ?>
                <div class="row-fluid">
                    <div class="span3">
                        <strong>First Name</strong>
                    </div>
                    <div class="span9">
                        <?php echo CHtml::hiddenField('Member[mem_id]', $model->mem_id); ?>
                        <?php echo CHtml::textField('Member[mem_first_name]', $model->mem_first_name, array('class' => 'span6')); ?>
                        <div class="separator"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <strong>Last Name Name</strong>
                    </div>
                    <div class="span9">
                        <?php echo CHtml::textField('Member[mem_last_name]', $model->mem_first_name, array('class' => 'span6')); ?>
                        <div class="separator"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <strong>Mobile Number</strong>
                    </div>
                    <div class="span9">
                        <?php echo CHtml::textField('Member[mem_phone]', $model->mem_phone, array('class' => 'span6')); ?>
                        <div class="separator"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <strong>Email</strong>
                    </div>
                    <div class="span9">
                        <?php echo CHtml::textField('Member[mem_email]', $model->mem_email, array('class' => 'span6')); ?>
                        <div class="separator"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <strong>Sex</strong>
                    </div>
                    <div class="span9">
                        <?php
                        $man = ($model->mem_gender == 1) ? true : false;
                        $woman = ($model->mem_gender == 0) ? true : false;
                        ?>
                        <label class="radio-inline">
                            <?php echo CHtml::radioButton('Member[mem_gender]', $man, array(
                                'class' => 'radio',
                                'value' => '1',
                            )); ?>
                            Man
                        </label>
                        <label class="radio-inline">
                            <?php echo CHtml::radioButton('Member[mem_gender]', $woman, array(
                                'class' => 'radio',
                                'value' => '0',
                            )); ?>
                            Woman
                        </label>
                        <div class="separator"></div>
                    </div>
                </div>

                <hr class="separator bottom" />
                <div class="row-fluid">
                    <div class="span3">
                        <strong>About Me</strong>
                    </div>
                    <div class="span9">
                        <?php echo CHtml::textArea('Member[mem_about_me]', $model->mem_about_me,
                            array(
                                'id' => 'mustHaveId',
                                'class' => 'wysihtml5 span12',
                                'rows' => '5'
                            )); ?>
                    </div>
                </div>

                <hr class="separator bottom" />
                <div class="row-fluid">
                    <div class="span9">
                        <?php echo CHtml::submitButton('Save Change', array('class' => 'btn btn-primary btn-icon glyphicons ok_2')); ?>
                    </div>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <!-- Member Profile END -->

            <!-- EO or Venue -->
            <div class="tab-pane" id="eovenue">
                <?php if(Yii::app()->user->roleid == 2){ ?>
                    <?php echo $this->renderPartial('_eo', array('eo' => $eo)); ?>
                <?php }elseif(Yii::app()->user->roleid == 3){ ?>
                    <?php echo $this->renderPartial('_venue', array('model' => $venue)); ?>
                <?php } ?>
            </div>
            <!-- EO or Venue END -->

            <!-- Event and List Events -->
            <?php if(Yii::app()->user->roleid == 2){ ?>
                <div class="tab-pane" id="event">
                    <?php echo $this->renderPartial('_event', array('list_venue' => $list_venue)); ?>
                </div>
                <div class="tab-pane" id="listevent">
                    <div class="well">
                        <h4>List Events</h4>
                        <div class="separator"></div>
                        <div class="accordion" id="accordion2" style="margin-bottom: 0;">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                        Collapsible Group Item #1
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                        Collapsible Group Item #2
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-body collapse in">
                                    <div class="accordion-inner">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Event and List Events END -->

            <!-- Attributes -->
<!--            <div class="tab-pane" id="productAttributesTab">-->
<!---->
<!--            </div>-->
            <!-- Attributes END -->

            <!-- Price -->
<!--            <div class="tab-pane" id="productPriceTab">-->
<!---->
<!--            </div>-->
            <!-- Price END -->

            <!-- SEO -->
<!--            <div class="tab-pane" id="productSeoTab">-->
<!---->
<!--            </div>-->
            <!-- SEO END -->

        </div>
    </div>
</div>
<!--<div class="heading-buttons">-->
<!--    <div class="buttons pull-right" style="margin-top: 0;">-->
<!--        <a href="" class="btn btn-default btn-icon glyphicons share"><i></i> Preview</a>-->
<!--        <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Save</a>-->
<!--    </div>-->
<!--    <div class="clearfix"></div>-->
<!--</div>-->