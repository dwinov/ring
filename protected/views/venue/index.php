<div class="heading-buttons">
    <h2 class="glyphicons globe_af"><i></i> Venue</h2>
    <div class="buttons pull-right">
        <a href="<?php echo Yii::app()->createUrl('venue/create'); ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add New Venue</a>
    </div>
</div>
<div class="separator"></div>

<div class="relativeWrap">
    <div class="widget widget-gray widget-gray-white">
        <div class="widget-head">
            <h4 class="heading">List Venue</h4>
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
        $dataTable = $("#basic-datatabel").dataTable({
            bServerSide: true,
            sAjaxSource: document.location.href,
            "sPaginationType": "bootstrap",
            aoColumns: [
                {
                    mData: "vn_name",
                    sWidth: "10%",
                    bSortable: true
                },
                {
                    mData: "vn_address",
                    sWidth: "10%",
                    sClass: "center",
                    bSortable: true
                },
                {
                    mData: "vn_email",
                    sWidth: "10%",
                    sClass: "center",
                    bSortable: true
                },
                {
                    mData: 'vn_id',
                    sWidth: "8%",
                    sClass: "center",
                    mRender: function(data, type, all) {
                        var btns = new Array();
                        var roleId = '<?php echo Yii::app()->user->roleid; ?>';
                        if(roleId != 1)
                        {
                            btns.push("<a class='btn-action glyphicons book_open btn-info' href='<?php echo Yii::app()->createUrl('venue/detail'); ?>/id/" + all.vn_id + "' title='Detail'><i></i></a> ");
                            btns.push("<a class='btn-action glyphicons pencil btn-success' href='<?php echo Yii::app()->createUrl('venue/update'); ?>/id/" + all.vn_id + "' title='Edit'><i></i></a> ");
                            btns.push("<a class='btn-action glyphicons remove_2 btn-danger' data-delete href='<?php echo Yii::app()->createUrl('venue/delete'); ?>/id/" + all.vn_id + "' title='Delete'><i></i></a>");
                        }else{
                            btns.push("<a class='btn-action glyphicons picture btn-warning' href='<?php echo Yii::app()->createUrl('venue/uploader'); ?>/id/" + all.vn_id + "' title='Gallery Pictures'><i></i></a> ");
                            btns.push("<a class='btn-action glyphicons pencil btn-success' href='<?php echo Yii::app()->createUrl('venue/update'); ?>/id/" + all.vn_id + "' title='Edit'><i></i></a> ");
                            btns.push("<a class='btn-action glyphicons remove_2 btn-danger' data-delete href='<?php echo Yii::app()->createUrl('venue/delete'); ?>/id/" + all.vn_id + "' title='Delete'><i></i></a>");
                        }
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