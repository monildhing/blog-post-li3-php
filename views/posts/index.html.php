<div>
<a href="/posts/add" class="badge badge-primary" style="float: right; margin: 20px; padding: 13px;"><i class="fa fa-plus"></i>ADD POST</a>	
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
	  <th scope="col">Content</th>
	  <th scope="col">Action</th>
    </tr>
	</thead>
  <tbody>
  <?php foreach ($posts as $post): ?>
    <tr>
      <td><p><?= $post->title ?></p></td>
    <td><p><?= $post->content ?></p></td>
	  <td><a data-toggle="modal" data-target="#exampleModal" onClick="set(<?=$post->id?>)"><i class="fa fa-trash" style="margin-right: 10px; font-size:30px;"></i></a>
	  <a href="/posts/update/<?=$post->id?>"><i class="fa fa-edit" style="font-size:30px;"></i></a></td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="return Validate()">Delete</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var deleteid;
    function Validate() {
      window.location.replace("/posts/delete/"+this.deleteid);
    }
    function set($value){
      this.deleteid=$value
    }
</script>