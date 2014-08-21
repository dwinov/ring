<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/11/14
 * Time: 2:56 PM
 */
?>

<div class="heading-buttons">
    <h2 class="glyphicons home"><i></i> Dashboard</h2>
</div>
<div class="separator"></div>

<div class="row-fluid">
    <div class="span12">
        <div class="relativeWrap">
            <div class="widget widget-body-white margin-bottom-none">
                <div class="widget-head">
                    <h4 class="glyphicons cardio heading"><i></i> Members </h4>
                </div>
                <div class="widget-body">
                    <div id="member" style="height: 200px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

    <div class="row-fluid">
        <div class="span12">
            <div class="relativeWrap">
                <div class="widget widget-body-white margin-bottom-none">
                    <div class="widget-head">
                        <h4 class="glyphicons cardio heading"><i></i> Events </h4>
                    </div>
                    <div class="widget-body">
                        <div id="event" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var data_mem = JSON.parse('<?php echo json_encode($data_mem); ?>');
            var category_mem = JSON.parse('<?php echo json_encode($category_mem); ?>');
            var data_evt = JSON.parse('<?php echo json_encode($data_evt); ?>');
            var category_evt = JSON.parse('<?php echo json_encode($category_evt); ?>');
            renderChart('member', data_mem, category_mem, 'Total Members');
            renderChart('event', data_evt, category_evt, 'Total Events');

            function renderChart(id, data, category, title)
            {
                $('#'+id).highcharts({
                    title: {
                        text: '',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
                    xAxis: {
                        categories: category
                    },
                    yAxis: {
                        title: {
                            text: title
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: '°C'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: data
                });
            }
        });

    </script>
<?php echo $this->endClip(); ?>