<div id="updateDocumentsIndex">
	<?php echo $this->Search->searchForm('Documents', ['legend'=>false, 'updateDivId'=>'updateDocumentsIndex']); ?>
	<br />
	<br />
	<?php echo $this->element('Usermgmt.paginator', ['useAjax'=>true, 'updateDivId'=>'updateDocumentsIndex']); ?>
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th><?php echo __('#'); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Documents.name', __('Document')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Documents.doc_type', __('Category')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Dropdowns.title', __('Folder')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Documents.type', __('Type')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Documents.created', __('Created / by')); ?></th>
				<th><a href="#">Options</a></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($documents)) {
				$page = $this->request->params['paging']['Documents']['page'];
				$limit = $this->request->params['paging']['Documents']['perPage'];
				$i = ($page-1) * $limit;
				foreach($documents as $row) {
					$i++;
					echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['doc_type']."</td>";
						echo "<td>".$row['dropdown']['title']."</td>";
						echo "<td>".$row['type']."</td>";
					
					
					    echo "<td>".$row['created']->format('m/d/y')." by ".$this->Html->link(__('').$row['user']['first_name']."  ".$row['user']['last_name'], ['controller'=>'Users', 'action'=>'viewUser', 'plugin'=>'Usermgmt', $row['user']['id'], 'page'=>$page], ['escape'=>false]);
					
					
					
						echo "<td><a class='btn btn-success btn-xs' role='button' title='download' target='_blank' href='".SITE_URL."library/documents/".$row['user_id']."/".$row['doc_file']."'><span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span></a></td>";
						echo "&nbsp;&nbsp;";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=5><br/><br/>".__('No Records Available')."</td></tr>";
			} ?>
		</tbody>
	</table>
	<?php if(!empty($documents)) {
		echo $this->element('Usermgmt.pagination', ['paginationText'=>__('Number of Documents')]);
	} ?>
</div>