<div class="heading-buttons">
    <h2 class="glyphicons check"><i></i>Manage Venue</h2>
    <div class="buttons pull-right">
        <a href="<?php echo Yii::app()->createUrl('venue/create'); ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add New EO</a>
    </div>
</div>
<div class="separator"></div>

<div class="filter-bar">
    <form>
        <div class="lbl glyphicons cogwheel"><i></i>Filter</div>
        <div>
            <label>Date:</label>
            <div class="input-append">
                <input type="text" id="date" class="input-mini datepicker" style="width: 53px;" />
                <span class="add-on glyphicons calendar"><i></i></span>
            </div>
        </div>
        <div>
            <label>Time:</label>
            <div class="input-append">
                <input type="text" id="time" class="input-mini timepicker1" style="width: 53px;" />
                <span class="add-on"><i class="icon-time"></i></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>

<div class="widget widget-2">
    <div class="widget-head">
        <h4 class="heading glyphicons calendar"><i></i>Lists of Venues</h4>
    </div>
    <div class="widget-body">

        <table id="basic-datatabel" cellpadding="0" cellspacing="0" border="0" class="dynamicTable table table-striped table-bordered table-primary table-condensed">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- dialog box -->
<div id="dialog" title="Delete Venue" style="display: none;">
    <p>Are you sure?</p>
</div>

<?php $this->beginClip('js-page-end'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $dataTable = $("#basic-datatabel").dataTable({
            bServerSide: true,
            sAjaxSource: document.location.href,
            bFilter: true,
            bSortable: true,
            bInfo: true,
            sPaginationType: "full_numbers",
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            oLanguage:{
                "sInfoFiltered": ""
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
                        btns.push("<a class='btn-action glyphicons pencil btn-success' href='<?php echo Yii::app()->createUrl('venue/update'); ?>/id/" + all.vn_id + "' title='Edit'><i></i></a> ");
                        btns.push("<a class='btn-action glyphicons remove_2 btn-danger' data-delete href='<?php echo Yii::app()->createUrl('venue/delete'); ?>/id/" + all.vn_id + "' title='Delete'><i></i></a>");
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