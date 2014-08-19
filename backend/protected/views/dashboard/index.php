<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/11/14
 * Time: 2:56 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="<?php echo Yii::app()->createUrl('dashboard/index'); ?>" class="glyphicons home"><i></i> Dashboard</a></li>
</ul><br/>

<div class="heading-buttons">
    <h2 class="glyphicons home"><i></i> Dashboard</h2>
</div>
<div class="separator"></div>

<div class="row-fluid">
    <div class="span12">
        <div class="relativeWrap">
            <div class="widget widget-body-white margin-bottom-none">
                <div class="widget-head">
                    <h4 class="glyphicons cardio heading"><i></i> </h4>
<!--                    <a data-toggle="dropdown" href="#" class="glyphicons cogwheel pull-right"><i></i></a>-->
<!--                    <ul class="dropdown-menu pull-right">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else</a></li>-->
<!--                    </ul>-->
                </div>
                <div class="widget-body">
                    <div id="chart" style="height: 200px;"></div>
<!--                    <div class="btn-group separator top">-->
<!--                        <button id="websiteTraffic24Hours" class="btn btn-small btn-inverse">24 Hours</button>-->
<!--                        <button id="websiteTraffic7Days" class="btn btn-small btn-inverse">7 Days</button>-->
<!--                        <button id="websiteTraffic14Days" class="btn btn-small btn-inverse">14 Days</button>-->
<!--                        <button id="websiteTrafficClear" class="btn btn-small btn-inverse" disabled="disabled">Clear</button>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#chart').highcharts({
                title: {
                    text: '',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Count'
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
                series: [{
                    name: 'Tokyo',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'New York',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'Berlin',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'London',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });
        });
    </script>
<?php echo $this->endClip(); ?>