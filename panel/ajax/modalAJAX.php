
<div id="DialogModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="DialogModalLabel"><?=isset($_POST['title'])?$_POST['title']:""?></h4>
        </div>
        <div class="modal-body">
		<?=isset($_POST['content'])?$_POST['content']:""?>
		</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
