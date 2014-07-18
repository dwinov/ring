<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/18/14
 * Time: 5:10 PM
 */
?>

<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
	<li class="divider"></li>
	<li>Forms</li>
	<li class="divider"></li>
	<li>File Managers</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons suitcase"><i></i> File Managers</h2>
<div class="separator"></div>

<div class="relativeWrap">
	<div class="widget widget-2 primary widget-body-white">
		<div class="widget-head">
			<h4 class="heading glyphicons file_import"><i></i>Photo Manager</h4>
		</div>
		<div class="widget-body">
			<form id="pluploadForm">
				<div id="pluploadUploader">
					<p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
				</div>
			</form>
		</div>
	</div>
</div>
<br/>

<div class="separator"></div>

<h2 class="glyphicons picture"><i></i> Photo Gallery</h2>
<div class="separator"></div>

<div class="well">
    <div class="row-fluid gallery paper">
        <ul>
            <li class="span3">
                <span class="thumb view">
                    <span class="back">
                        <span class="btn btn-mini btn-primary">edit</span>
                        <a href="" class="arr">&rarr;</a>
                    </span>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gallery/rs/1.jpg" alt="Album" />
                </span>
                <span class="name"></span>
            </li>
        </ul>
    </div>
</div>

<?php $this->beginClip('js-page-end'); ?>

    <!-- Masonry -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.masonry.min.js"></script>
    <script>
        $(function()
        {
            var $container = $('.gallery.paper ul');
            $container
                .imagesLoaded( function(){
                    $container.masonry({
                        gutterWidth: 20,
                        itemSelector : 'li',
                        columnWidth: $('.gallery.paper li:first').width()
                    });
                });
        });
    </script>

    <!-- Load -->
    <script>
        Modernizr.load({
            test: Modernizr.csstransforms3d && Modernizr.csstransitions,
            yep : ['<?php echo Yii::app()->request->baseUrl; ?>/js/paperGallery/jquery.paperGallery.js'],
            nope: '<?php echo Yii::app()->request->baseUrl; ?>/js/paperGallery/fallback.css',
            callback : function( url, result, key )
            {
                if( url === '<?php echo Yii::app()->request->baseUrl; ?>/js/paperGallery/jquery.paperGallery.js' ) {
                    $( '.gallery.paper' ).paperGallery();
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#pluploadUploader").pluploadQueue({
                // General settings
                runtimes : 'gears,browserplus,html5',
                url : document.location.href,
                max_file_size : '10mb',
                chunk_size : '1mb',
                unique_names : true,
                file_data_name : 'myimage',

                // Resize images on clientside if we can
                resize : {width : 320, height : 240, quality : 90},

                // Specify what files to browse for
                filters : [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ],

                // Flash settings
                flash_swf_url : '<?php echo Yii::app()->request->baseUrl; ?>/js/plupload/js/plupload.flash.swf',

                // Silverlight settings
                silverlight_xap_url : '<?php echo Yii::app()->request->baseUrl; ?>/js/plupload/js/plupload.silverlight.xap'
            });
        });
    </script>
<?php echo $this->endClip(); ?>