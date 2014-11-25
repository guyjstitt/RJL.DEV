<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 

<style>
.messageHead {
	display: none;
}
.required label:after {
	content: "";
	
}
</style>

<script>
$(document).ready( function () {
    $('#event').dataTable({
	"bJQueryUI": true
	});
	
	$("li#admin").addClass("active");
} );
</script>


</head>

<div class="events index">
    <h2>Events</h2>
	<div class="table-responsive">
	<table class="table" id="event">
    <thead>
		<tr>
            <th>Event Name</th>
			<th>Event Type</th>
			<th>Date</th>
            <th>Cost</th>
			<th># of Attendees</th>
            <th># Of Donations</th>
            <th>Total Donation Amount</th>
			 
    	 <th>Actions</th>
        </tr>
	</thead>
	<tbody>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['eventName']; ?> </td>
		<td><?php echo $event['Event']['eventType']; ?> </td>
        <td><?php echo $event['Event']['eventDate']; ?> </td>
        <td><?php echo $event['Event']['eventCost']; ?> </td>
        <td><?php echo $event['Event']['numOfAttendees']; ?> </td>
        <td><?php echo $event['Event']['numOfDonations']; ?> </td>
		<td><?php echo $event['Event']['totalDonations']; ?> </td>
		
		<td class="actions">
            <?php echo $this->Html->link('View',array('action' => 'view', $event['Event']['id'])); ?> |
            <?php echo $this->Html->link('Edit',array('action' => 'edit', $event['Event']['id'])); ?> |
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $event['Event']['id']), array('confirm'=>'Are you sure you want to delete that event?')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
</div>
</div>

<div>
<div class="table-responsive">
<table class="table holder">
	<tr>
	
	
		<td class="fileL">
<div class="navactions">
    <ul>
		<li><?php echo $this->Html->link('New Event', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Export File', array('action' => 'export'));?></li>
		<li><?php echo $this->Html->link('Run a Report', array('controller' => 'Reports','action' => 'wizard','new','Event'));?></li>
	</ul>
</div>
	</td>
	<td class="fileR">
	<h3>Import Event Information</h3>
		<?php 
		echo $this->Form->create('Contact', array('type'=>'file'));
		?>

		<?php if (!empty($this->data['Contact']['filepath'])): ?>
			<div class="input">
				<label>Uploaded File</label>
				<?php
				
				echo $this->Form->input('filepath', array('type'=>'hidden'));
				echo $this->Html->link(basename($this->data['Contact']['filepath']), $this->data['Contact']['filepath']);
				?>
			</div>
		<?php else: ?>
			<?php echo $this->Form->input('filename',array(
				'type' => 'file','label'=>''
			)); ?>
		<?php endif; ?>

		<?php
		echo $this->Form->end('Submit');
		?>
	</td>

	</tr>
</table>
</div>
<?php echo $this->Html->script('highcharts');?>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="row">
    <div class="col-xs-6"id="breakeven"></div>
	<div class="col-xs-6"id="summary"></div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class= "chartStyle">
			<button id="column" class="chartButton">Bar</button>
			<button id="pie" class="chartButton">Pie</button>
			<button id="line" class="chartButton">Line</button>
			<button id="scatter" class="chartButton">Scatter</button>
		</div>
	</div>
	<div class="col-md-6">
		<div class= "chartStyle">
			<button id="column1" class="chartButton">Bar</button>
			<button id="pie1" class="chartButton">Pie</button>
			<button id="line1" class="chartButton">Line</button>
			<button id="scatter1" class="chartButton">Scatter</button>
		</div>
	</div>
</div>
<script type="text/javascript">
    hs.graphicsDir = 'highslide/graphics/';
    hs.showCredits = false;
</script>
<script>


$(function () {
        $('#breakeven').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Donation Amount vs. Event Cost'
            },
			legend: {
            enabled: false
            
			},
            xAxis: {
                categories: ['Total Donations', 'Event Cost', 'Break Even']
            },
			 yAxis: {
                showEmpty: false
            },
			   tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>${point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            credits: {
                enabled: false
            },
			 plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
				  series: {
                colorByPoint: true,
				 lineColor: 'gray' 
            }
            },
            series: [{
			allowPointSelect: true,
			   name: 'Events',
			   
            data: [
               ['Total Donations',<?php echo $totalDonations['Event']['total'] ?>] , 
               ['Total Cost',<?php echo $totalCost['Event']['totalCost'] ?>],
				['Break Even',<?php echo $breakEven['Event']['breakEven'] ?>]
             ],
			  showInLegend: true
			  }]
        });
		
        var chart = $('#breakeven').highcharts();
        
    // Set type
    $.each(['line', 'column', 'spline', 'area', 'areaspline', 'scatter', 'pie'], function (i, type) {
        $('#' + type).click(function () {
            chart.series[0].update({
                type: type
            }),
			 chart.series[1].update({
                type: type
            });
        });
    });
 });

	$(function () {
        $('#summary').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Events Summary'
            },
            subtitle: {
                text: ''
            },
				legend: {
            enabled: false
            
			}, credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                  'Avg Attendees',
				  'Avg Donation',
				  'Avg Number of Donations'
             
                ] 
            },
           yAxis: {
                showEmpty: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>${point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
          plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
				  series: {
                colorByPoint: true,
				 lineColor: 'gray' 
            }
			
            },
            series: [{
			
			
			   allowPointSelect: true,
			     name: 'Summary',
				 
            data: [
			
			['Avg Attendees Per Event', <?php echo $avgAttend['Event']['avgAttend'] ?>],
			
			['Avg Donation Amount Per Person', <?php echo $avgDonationAmount['Event']['avgDonationAmount'] ?>],
			
			['Avg Number of Donations Per Person', <?php echo $avgNumDonation['Event']['avgNumDonation'] ?>]
			
			],
            
			  showInLegend: true
			  }]
			
			
        });

		var chart = $('#summary').highcharts();
        
    // Set type
    $.each(['line', 'column', 'spline', 'area', 'areaspline', 'scatter', 'pie'], function (i, type) {
        $('#' + type + '1').click(function () {
            chart.series[0].update({
                type: type
            }),
			 chart.series[1].update({
                type: type
            }),
			chart.series[2].update({
                type: type
            });
        });
    });
 });
   </script>

</div>
</html>

