<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:29 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'venue-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Event Organizer details</h4>
                    </div>

                    <?php echo (isset($model)) ? Chtml::hiddenField('Venue[vn_id]', $model->vn_id) : null; ?>

                    <?php $owner = (isset($model)) ? $model->vn_user_id : Yii::app()->user->usrid; ?>
                    <?php echo Chtml::hiddenField('Venue[vn_user_id]', $owner); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_name]', $name, array('class' => 'span10')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_address]', $address, array('class' => 'span10', 'id' => 'input-address')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Phone</label>
                                    <div class="controls">
                                        <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_phone]', $phone, array('class' => 'span10')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Fax</label>
                                    <div class="controls">
                                        <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_fax]', $fax, array('class' => 'span10')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_email]', $email, array('class' => 'span10')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Website</label>
                                    <div class="controls">
                                        <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
                                        <?php echo CHtml::textField('Venue[vn_website]', $website, array('class' => 'span10')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
                                <?php echo CHtml::textArea('Venue[vn_description]', $desc, array(
                                    'id' => "mustHaveId",
                                    'class' => "wysihtml5 span12",
                                    'rows' => "5"
                                )); ?>
                            </div>
                        </div>

                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Location Venue</label>
                            <div class="controls">
                                <div class="popin">
                                    <div id="map"></div>
                                </div>
                                <?php echo CHtml::textField('Venue[vn_logitude]', '', array('id' => 'long', 'class' => 'span4', 'placeholder' => 'longitude', 'readonly' => true)); ?>
                                <?php echo CHtml::textField('Venue[vn_latitude]', '', array('id' => 'lat', 'class' => 'span4', 'placeholder' => 'latitude', 'readonly' => true)); ?>
                            </div>
                        </div>

                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton( (isset($model)) ? 'Save changes' : 'Save',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
            </div>
            <div class="widget-body center">
                <div class="fileupload fileupload-new" data-provides="fileupload" data-name="myimage">

                    <?php if(!empty($model->vn_photo)){ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->vn_photo; ?>" width="202" height="188" /></div>
                    <?php }else{ ?>
                        <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/202x188/232323" /></div>
                    <?php } ?>

                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%;"></div>
                    <div>
                        <span class="btn btn-file btn-inverse btn-icon glyphicons picture"><i></i><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var map = new GMaps({
                div: '#map',
                lat: -12.043333,
                lng: -77.028333
            });

            var path=[];
            var p = [[-12.040397656836609,-77.03373871559225],[-12.040248585302038,-77.03993927003302],[-12.050047116528843,-77.02448169303511],[-12.044804866577001,-77.02154422636042]];
            for(i in p){
                latlng = new google.maps.LatLng(p[i][0], p[i][1]);
                path.push(latlng);
            }

            var polygon = map.drawPolygon({
                paths: path,
                strokeColor: '#BBD8E9',
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: '#BBD8E9',
                fillOpacity: 0.6
            });

            var stoppedTyping;
            $('#input-address').keyup(function(){
//                e.preventDefault();
                // is there already a timer? clear if if there is
                if (stoppedTyping) clearTimeout(stoppedTyping);
                // set a new timer to execute 3 seconds from last keyup
                stoppedTyping = setTimeout(function(){
                    GMaps.geocode({
                        address: $('#input-address').val().trim(),
                        callback: function(results, status){
                            if(status=='OK'){
                                var latlng = results[0].geometry.location;
                                map.setCenter(latlng.lat(), latlng.lng());
                                map.addMarker({
                                    lat: latlng.lat(),
                                    lng: latlng.lng(),
                                    draggable: true,
                                    fences: [polygon],
                                    outside: function(m, f){
                                        var longitude = m.position.B;
                                        var latitude = m.position.k;
                                        $('#long').val(longitude);
                                        $('#lat').val(latitude);
                                    }
                                });

                                $('#long').val(latlng.lng());
                                $('#lat').val(latlng.lat());
                            }
                        }
                    });
                }, 3e3); // 3 seconds
            });
        });
    </script>
<?php echo $this->endClip(); ?>