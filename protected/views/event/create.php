<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:21 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Dashboard</a></li>
    <li class="divider"></li>
    <li>Add Event</li>
    <li class="divider"></li>
    <li>Create Event</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Create Event</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array(
        'action' => Yii::app()->createUrl('event/create'),
        'venue_list' => $venue_list,
        'owner_id' => $owner_id
    )); ?>

</div>

<div id="dialog-form" title="List of Venue">
    <table id="basic-datatabel" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-primary table-condensed">
        <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th></th>
        </tr>
        </thead>
    </table>
</div>

<?php $this->beginClip('js-page-end'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        console.log(venueList);
        var ticket = '<?php echo (isset($model->evt_ticketing)) ? : 0; ?>';
        window.onload = function(){
            if(ticket != '1'){
                $('#tiket').hide();
                $('#ticket-picture').hide();
            }
        }

        $('#ticket_toggle').click(function(){
            if($(this).attr('checked'))
            {
                $('#tiket').show();
                $('#ticket-picture').show();
            }else{
                $('#tiket').hide();
                $('#ticket-picture').hide();
            }
        });

        $('.btn_add').live('click', function(){
            $(this).parent('.controls').parent('.control-group').clone(true).appendTo($(this).parent('.controls').parent('.control-group').parent('#tiket'));
            $(this).attr('value', 'Remove');
            $(this).toggleClass('btn_remove btn_add');
            $(this).toggleClass('btn-primary btn-success');
            $('.input-type:last').val("");
            $('.input-price:last').val("");
            $('.input-total:last').val("");
        });

        $('.btn_remove').live('click', function(){
            $(this).parent('.controls').parent('.control-group').remove();
        });

        $('#list-venue').click(function(){
            dialog.dialog( "open" );
        });

        $dataTable = $("#basic-datatabel").dataTable({
            bServerSide: true,
            sAjaxSource: '<?php echo Yii::app()->createUrl('venue/index'); ?>',
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
                    mData: 'vn_id',
                    sWidth: "8%",
                    sClass: "center",
                    mRender: function(data, type, all) {
                        var btns = new Array();
                        var strValue = data + '|' + all.vn_name + ' (' + all.vn_address + ')';
                        btns.push("<a data-delete type='" + strValue + "' title='Use'><button class='btn btn-success'>Select</button></a> ");
                        return  btns.join("&nbsp;");

                    }
                }
            ]
        });

        $dataTable.on('click', 'a[data-delete]', function(e) {
            var delkodel = $(this);
            var value = delkodel.attr('type');
            var valueArr = value.split('|');
            $('#venue-autocomplete').val(valueArr[1]);
            $('#evt-venue-id').val(valueArr[0]);
            dialog.dialog( "close" );
//            $('#dialog').dialog({
//                width: 500,
//                modal: true,
//                buttons: {
//                    "Delete" : function(){
//                        $.post(delkodel.attr('href'), {_method: 'delete'}, function(r) {
//                            $dataTable.fnReloadAjax();
//                        });
//                        $(this).dialog("close");
//                    },
//                    "Cancel" : function() {
//                        $(this).dialog("close");
//                    }
//                }
//            });
//            e.preventDefault();
        });

        var venueList = <?php echo json_encode($venue_list); ?>;

        $( "#venue-autocomplete" ).autocomplete({
            source: venueList
        });

        dialog = $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 600,
            width: 800,
            modal: true
//            close: function() {
//                form[ 0 ].reset();
//                allFields.removeClass( "ui-state-error" );
//            }
        });
    });
</script>
<?php echo $this->endClip(); ?>