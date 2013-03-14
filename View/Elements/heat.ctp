<?php
	echo $this->Html->script(array(
		'/Heat/js/jquery.js',
		'/Heat/js/jquery.event-playback.js',
		'/Heat/js/heatmap.js'
	));

	// default duration
	if (!isset($duration)) {
		$duration = 5000;
	}
	
	// aktualni URL
	$url = (string) Router::url($this->here);
	
	// url k akci load 
	$loadUrl = array('plugin' => 'heat', 'controller' => 'heat', 'action' => 'load');

	if (!empty($_GET['heat'])) {
?>
	<div id="heatmapArea" style="position:absolute;"></div>
	
	<script type="text/javascript">
		$(document).ready(function() {

			$('#heatmapArea').height($(document).height());
			$('#heatmapArea').width($(document).width());
			var theHeat = h337.create({"element": document.getElementById("heatmapArea"), "radius": 10, "visible": true});


			$.post('<?php echo Router::url($loadUrl); ?>', {url: '<?php echo $url; ?>', key: '<?php echo $key; ?>'},
			function(data) {
				data = $.parseJSON(data);
				$.each(data.data, function(i, obj) {
					theHeat.store.addDataPoint(obj.x, obj.y, obj.count);
				});
			});
		});

	</script>
<?php } else { ?>
	<script>
		$(document).ready(function() {
			$.recordEvents({duration: <?php echo $duration ?>}, function() {
				events = this.exportJSON()
				if (events.length > 2) {
					$.ajax({
						type: "POST",
						url: "<?php echo Router::url(array('plugin' => 'heat', 'controller' => 'heat', 'action' => 'save')); ?>",
						dataType: "json",
						data: {events: events, url: '<?php echo $url; ?>', key: '<?php echo $key; ?>'}
					});
					console.log('record: save ' + events.length);
					this.frames.length = 0;
				}
				this.start();
			})
		}
		)
	</script>
<? } ?>