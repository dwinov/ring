<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">Venue</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i><a href="index.html">Home</a><i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Venue</a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->

<div class="clearfix">
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>List Of Venue
                </div>
                <div class="actions">
                    <a href="<?php echo Yii::app()->createUrl('venue/create'); ?>" class="btn yellow"><i class="fa fa-plus"></i> Add New Venue</a>
                </div>
            </div>
            <div class="portlet-body">
                <table id="basic-datatabel" class="table table-striped table-bordered table-hover" id="sample_3">
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
        <!-- END EXAMPLE TABLE PORTLET-->
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
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 5,
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
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
                        btns.push("<a class='btn blue' href='<?php echo Yii::app()->createUrl('venue/update'); ?>/id/" + all.vn_id + "' title='Edit'><i class='fa fa-edit'></i></a> ");
                        btns.push("<a class='btn red' data-delete href='<?php echo Yii::app()->createUrl('venue/delete'); ?>/id/" + all.vn_id + "' title='Delete'><i class='fa fa-times'></i></a>");
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