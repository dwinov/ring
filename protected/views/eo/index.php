<ul class="breadcrumb">
    <li><a href="<?php echo Yii::app()->createUrl('dashboard/index'); ?>" class="glyphicons home"><i></i> Dashboard</a></li>
    <li class="divider"></li>
    <li>Event Organizer</li>
</ul><br/>

<div class="heading-buttons">
    <h2 class="glyphicons sort"><i></i> Event Organizer</h2>
    <div class="buttons pull-right">
        <a href="<?php echo Yii::app()->createUrl('eo/create'); ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add New EO</a>
    </div>
</div>
<div class="separator"></div>

<div class="relativeWrap">
    <div class="widget widget-gray widget-gray-white">
        <div class="widget-head">
            <h4 class="heading">List Organizer</h4>
        </div>
        <div class="widget-body">
            <table id="basic-datatabel" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-primary table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- dialog box -->
<div id="dialog" title="Delete Event Organizer" style="display: none;">
    <p>Are you sure?</p>
</div>

<?php $this->beginClip('js-page-end'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var $dataTable = $("#basic-datatabel").dataTable({
            bServerSide: true,
            sAjaxSource: document.location.href,
            "sPaginationType": "bootstrap",
            aoColumns: [
                {
                    mData: "eo_name",
                    sWidth: "10%",
                    bSortable: true
                },
                {
                    mData: "eo_address",
                    sWidth: "10%",
                    sClass: "center",
                    bSortable: true
                },
                {
                    mData: "eo_email",
                    sWidth: "10%",
                    sClass: "center",
                    bSortable: true
                },
                {
                    mData: 'eo_id',
                    sWidth: "8%",
                    sClass: "center",
                    mRender: function(data, type, all) {
                        var btns = new Array();
                        btns.push("<a class='btn-action glyphicons pencil btn-success' href='<?php echo Yii::app()->createUrl('eo/update'); ?>/id/" + all.eo_id + "' title='Edit'><i></i></a> ");
                        btns.push("<a class='btn-action glyphicons remove_2 btn-danger' data-delete href='<?php echo Yii::app()->createUrl('eo/delete'); ?>/id/" + all.eo_id + "' title='Delete'><i></i></a>");
                        return  btns.join("&nbsp;");

                    }
                }
            ],
            fnServerParams: function(aoData) {
                aoData.push({name: "date", value: $("#date").val()});
                aoData.push({name: "time", value: $("#time").val()});
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