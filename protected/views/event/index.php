<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:15 PM
 */
?>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">Event</h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i><a href="index.html">Home</a><i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Event</a>
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
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Table Events
                    </div>
                    <div class="actions">
                        <a href="<?php echo Yii::app()->createUrl('event/create'); ?>" class="btn yellow"><i class="fa fa-plus"></i> Add New Event</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="basic-datatabel" class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th>Event</th>
                            <th>EO</th>
                            <th>Venue</th>
                            <th>Tiket</th>
                            <th>Date</th>
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
                        mData: "evt_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "eo_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "vn_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "evt_tiket_price",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true
                    },
                    {
                        mData: "evt_date",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true
                    },
                    {
                        mData: 'evt_id',
                        sWidth: "8%",
                        sClass: "center",
                        mRender: function(data, type, all) {
                            var btns = new Array();
                            btns.push("<a class='btn blue' href='<?php echo Yii::app()->createUrl('event/update'); ?>/id/" + all.evt_id + "' title='Edit'><i class='fa fa-edit'></i></a> ");
                            btns.push("<a class='btn red' data-delete href='<?php echo Yii::app()->createUrl('event/delete'); ?>/id/" + all.evt_id + "' title='Delete'><i class='fa fa-times'></i></a>");
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