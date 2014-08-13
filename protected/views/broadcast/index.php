<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/13/14
 * Time: 3:30 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Online Shop</li>
    <li class="divider"></li>
    <li>Products</li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
    <h2 class="glyphicons message_out"><i></i> Broadcast</h2>
</div>
<div class="separator"></div>

<div class="row-fluid">
    <div class="span9">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons list"><i></i> Member List</h4>
            </div>

            <div class="widget-body">
                <table id="basic-datatabel" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
                    <thead>
                    <tr>
                        <th width="1%" class="uniformjs center"><input type="checkbox" /></th>
                        <th width="1%" class="center">No.</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons edit"><i></i>Message</h4>
            </div>

            <?php echo (isset($model)) ? Chtml::hiddenField('Eo[eo_id]', $model->eo_id) : null; ?>

            <div class="widget-body" style="padding-bottom: 0;">
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <?php $desc = (isset($model)) ? $model->eo_description : ""; ?>
                        <?php echo CHtml::textArea('Eo[eo_description]', $desc, array(
                            'id' => "mustHaveId",
                            'class' => "wysihtml5 span10",
                            'rows' => "5")); ?>
                    </div>
                </div>

                <div class="form-actions" style="margin: 0;">
                    <?php echo CHtml::submitButton( 'Send',
                        array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons cogwheel"><i></i> Filter</h4>
            </div>

            <div class="widget-body list list-2 fluid js-filters form-inline small">
                <ul>
                    <li class="right">
                        <label class="span4">Region:</label>
                        <div class="right">
                            <select class="js-filter-category" name="category" style="width: 120px;">
                                <option>Category</option>
                                <option>Category</option>
                                <option>Category</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label class="span4">Age:</label>
                        <div class="right">
                            <input type="text" name="age" id="umur" class="input-mini" style="width: 85px;" />
                        </div>
                    </li>
                    <li>
                        <label>Gender:</label>
                        <div class="right">
                            <div class="input-append">
                                <select class="js-filter-category" name="category" style="width: 120px;">
                                    <option>Category</option>
                                    <option>Category</option>
                                    <option>Category</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Interest:</label>
                        <div class="right">
                            <div class="input-append">
                                <select class="js-filter-category" name="category" style="width: 120px;">
                                    <option>Category</option>
                                    <option>Category</option>
                                    <option>Category</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br/>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var $dataTable = $("#basic-datatabel").dataTable({
                bServerSide: true,
                sAjaxSource: document.location.href,
                "sPaginationType": "bootstrap",
                aoColumns: [
                    {
                        mData: "mem_id",
                        sWidth: "1%",
                        sClass: "center uniformjs",
                        mRender: function(data, type, all) {
                            return  '<input class="uniformjs" type="checkbox" />';
                        }
                    },
                    {
                        mData: "mem_id",
                        sWidth: "1%",
                        sClass: "center",
                        bSortable: true
                    },
                    {
                        mData: "mem_email",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true
                    },
                ],
                fnServerParams: function(aoData) {
                    aoData.push({name: "date", value: $("#date").val()});
                    aoData.push({name: "time", value: $("#time").val()});
                },
                "fnDrawCallback": function ( oSettings ) {
                    /* Need to redo the counters if filtered or sorted */
                    if ( oSettings.bSorted || oSettings.bFiltered )
                    {
                        for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                        {
                            $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                        }
                    }
                }
            });

            $dataTable.on('click', 'a[data-delete]', function(e) {
                var delkodel = $(this);
                $('#dialog').dialog({
                    width: 500,
                    modal: true,
                    buttons: {
                        "Delete" : function(){
                            $.post(delkodel.attr('href'), {_method: 'delete'}, function(r) {
                                $dataTable.fnReloadAjax();
                            });
                            $(this).dialog("close");
                        },
                        "Cancel" : function() {
                            $(this).dialog("close");
                        }
                    }
                });
                e.preventDefault();
            });

            $("#date, #time").change(function() {
                $dataTable.fnReloadAjax();
            });
        });
    </script>
<?php echo $this->endClip(); ?>