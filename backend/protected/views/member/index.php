<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 1:55 PM
 */
?>

    <ul class="breadcrumb">
        <li><a href="<?php echo Yii::app()->createUrl('dashboard/index'); ?>" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Manage Member</li>
    </ul><br/>

    <div class="heading-buttons">
        <h2 class="glyphicons group"><i></i> Manage Member</h2>
        <div class="buttons pull-right">
            <a href="<?php echo Yii::app()->createUrl('member/create'); ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add New Member</a>
        </div>
    </div>
    <div class="separator"></div>

    <div class="relativeWrap">
        <div class="widget widget-gray widget-gray-white">
            <div class="widget-head">
                <h4 class="heading">List Member</h4>
            </div>
            <div class="widget-body">
                <table id="basic-datatabel" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-primary table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
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
                        mData: "mem_screen_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "mem_email",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true
                    },
                    {
                        mData: "mem_gender",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true,
                        mRender: function(data, type, all) {
                            return  (data == 1) ? 'Male' : 'Female';
                        }
                    },
                    {
                        mData: 'mem_id',
                        sWidth: "8%",
                        sClass: "center",
                        mRender: function(data, type, all) {
                            var btns = new Array();
                            btns.push("<a class='btn-action glyphicons pencil btn-success' href='<?php echo Yii::app()->createUrl('member/update'); ?>/id/" + data + "' title='Edit'><i></i></a> ");
                            btns.push("<a class='btn-action glyphicons remove_2 btn-danger' data-delete href='<?php echo Yii::app()->createUrl('member/delete'); ?>/id/" + data + "' title='Delete'><i></i></a>");
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