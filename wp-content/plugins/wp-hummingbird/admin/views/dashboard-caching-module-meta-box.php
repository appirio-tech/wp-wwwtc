<div class="wphb-table-wrapper">
	<table class="list-table hover-effect wphb-table stack caching-table">

		<thead>
			<tr class="wphb-caching-summary-item-heading">
				<th class="wphb-caching-summary-heading wphb-caching-summary-heading-type"><?php _e( 'File Type', 'wphb' ); ?></th>
				<th class="wphb-caching-summary-heading wphb-caching-summary-heading-expiry"><?php _e( 'Recommended', 'wphb' ); ?></th>
				<th class="wphb-caching-summary-heading wphb-caching-summary-heading-status"><?php _e( 'Current', 'wphb' ); ?></th>
			</tr><!-- end wphb-caching-summary-item-heading -->
		</thead>

		<tbody>

		<?php foreach ( $human_results as $type => $result ): ?>

			<?php if ( $result ) {
				if ( $recommended[ $type ]['value'] <= $results[ $type ] ) {
					$result_status       = $result;
					$result_status_color = 'green';
					$tooltip_text        = __('Caching is enabled', 'wphb');
				} else {
					$result_status       = $result;
					$result_status_color = 'red';
					$tooltip_text        = __('Caching is enabled but you aren\'t using our recommended value', 'wphb');
				}

			} else {
				$result_status       = __( 'Disabled', 'wphb' );
				$result_status_color = 'red';
				$tooltip_text        = __('Caching is disabled', 'wphb');
			}
			?>

			<tr class="wphb-caching-summary-item">
				<td th-data="<?php _e( 'File Type', 'wphb' ); ?>" class="wphb-caching-summary-item-type"><?php echo $type; ?></td><!-- end wphb-dashboard-modules-item-type -->
				<td th-data="<?php _e( 'Recommended', 'wphb' ); ?>" tr-data="<?php _e( 'File Type', 'wphb' ); ?>" class="wphb-caching-summary-item-expiry has-button-label">
					<span class="wphb-button-label wphb-button-label-small wphb-button-label-light" tooltip="<?php echo sprintf( __('The recommended value for this file type is at least %s. The longer the better!', 'wphb'), $recommended[ $type ]['label'] ); ?>"><?php echo $recommended[ $type ]['label']; ?></span>
				</td><!-- end wphb-caching-summary-item-expiry -->
				<td th-data="<?php _e( 'Current', 'wphb' ); ?>" class="wphb-caching-summary-item-status has-button-label">
					<span class="wphb-button-label wphb-button-label-small wphb-button-label-<?php echo $result_status_color; ?>" tooltip="<?php echo $tooltip_text; ?>"><?php echo $result_status; ?></a></span>
				</td><!-- end wphb-caching-summary-itemm-status -->
			</tr><!-- wphb-caching-summary-item -->
		<?php endforeach; ?>

		</tbody>
	</table>
</div>