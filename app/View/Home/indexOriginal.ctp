
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>

<input type="text" id="search" placeholder="Type to search">
<table id="table">
   <tr>
      <td>Apple</td>
      <td>Green</td>
   </tr>
   <tr>
      <td>Grapes</td>
      <td>Green</td>
   </tr>
   <tr>
      <td>Orange</td>
      <td>Orange</td>
   </tr>
</table>

<div class="home index">

	<h2>My Cases</h2>
	<div class="table-responsive">
	<table class="table" id="caseData">
		<tr>
            <th>Case ID</th>
            <th>Case Status</th>
            <th>Date Of Referral</th>
            <th>Court Date</th>
			<th>Charge Number</th>
            <th>Date Of Charge</th>
			<th>Actions</th>
        </tr>
	
 	<?php foreach ($items as $case): ?>
	<?php if ($cur_user['id']==$case['RjCase']['user_id']): ?>
	<tr>
		<td><?php echo $case['RjCase']['caseId']; ?></td>
		<td><?php echo $case['RjCase']['caseStatus']; ?></td>
		<td><?php echo $case['RjCase']['dateOfReferral']; ?></td>
		<td><?php echo $case['RjCase']['courtDate']; ?></td>
		<td><?php echo $case['RjCase']['chargeNumber']; ?></td>
		<td><?php echo $case['RjCase']['dateOfCharge']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(('View'), array('controller'=> 'RjCases', 'action' => 'view', $case['RjCase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('controller'=> 'RjCases','action' => 'edit', $case['RjCase']['id'])); ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
	
</table>
</div>
</div>
<?php echo $this->Html->script('highcharts');?>
<div class="row">
    <div class="col-xs-6" id="TestChart"></div>
    <div class="col-xs-6"id="pieChart"></div>
<div class="row">

    <div class="col-xs-6"></div>
</div>
<script type="text/javascript">
    hs.graphicsDir = 'highslide/graphics/';
    hs.showCredits = false;
</script>
<script>

	$(function () { 
	    $('#TestChart').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        credits: {
	            enabled: false
	        },
	        title: {
	            text: 'Case Volume'
	        },
	        xAxis: {
	            categories: ['Case Status']
	        },
			
	        yAxis: {
	            title: {
	                text: 'Cases'
	            }
	        },
	        series: [{
	            name: 'Open',
	            data: [<?php echo $open?>]
	        }, {
	            name: 'Closed',
	            data: [<?php echo $closed?>]
	        }]
			
	    });
	});
	
	$(function () {
    $('#pieChart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Types of Crimes Committed'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Crimes',
            data: [
                ['Male',  <?php echo $male?> ],
                ['Female',  <?php echo $female?>],
                {
                    name: 'Harrasment',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Other',    8.5]
                
            ]
        }]
    });
});
</script>

