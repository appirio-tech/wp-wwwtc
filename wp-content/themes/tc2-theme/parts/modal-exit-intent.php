<?php
    $arrOptions = get_option('quesks_exit_intent_options');
    if ( $arrOptions['enabled'] ) :
?>
<!-- Exit Intent Modal -->
<div id="modalExitIntent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalExitIntentLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalExitIntentLabel"><?php echo $arrOptions['title']; ?></h4>
            </div>
            <div class="modal-body">
                <?php echo apply_filters('the_content', $arrOptions['description']); ?>
            </div>
            <div class="modal-footer">
                <a href="<?php echo $arrOptions['button_url']; ?>" class="btn-blue"><?php echo $arrOptions['button_label']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>