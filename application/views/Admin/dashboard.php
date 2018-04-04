<?php include('header.php'); ?>

<div class="container" style="margin-top:50px;"">
<div class="row">
<?=   anchor('admin/adduser','Add Articles',['class'=>'btn btn-lg btn-primary'])  ?>
</div>




<div class="container" style="margin-top:50px;">
<?php  if($msg=$this->session->flashdata('msg')): 

$msg_class=$this->session->flashdata('msg_class')

 ?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $msg_class ?>">
<?= $msg; ?>
</div>
</div>
</div>

<?php endif; ?>

</div>


<div class="table">
<table>
<thead>
<tr>

<th>Article Title</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php if(count($articles)): ?> 
<?php foreach ($articles as $art): ?>
<tr>
	
		<td><?=  $art->article_title; ?></td>
		<td><a href="#" class="btn btn-primary">Edit</a></td>
		<td>
        <?=
        form_open('admin/delarticles'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
        form_close();



        ?>
      </td>
	</tr>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
	<td colspan="3">Not data available</td>
	</tr>
   <?php endif; ?>
</tbody>
</table>

</div>





</div>
<?php include('footer.php'); ?>