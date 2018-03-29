<?php include('header.php'); ?>

<div class="container" style="margin-top:50px;"">
<div class="row">
<?=   anchor('admin/adduser','Add Articles',['class'=>'btn btn-lg btn-primary'])  ?>
</div>

</div>


<div class="container" style="margin-top:50px;">
<div class="table">
<table>
<thead>
<tr>
<th>ID</th>
<th>Article Title</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php if(count($articles)): ?> 
<?php foreach ($articles as $art): ?>
<tr>
		<td>1</td>
		<td><?=  $art->article_title; ?></td>
		<td><a href="#" class="btn btn-primary">Edit</a></td>
		<td><a href="#" class="btn btn-danger">Delete</a></td>
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