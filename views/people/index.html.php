<div>
<a href="/people/add" class="badge badge-primary" style="float: right; margin: 20px; padding: 13px;"><i class="fa fa-plus"></i> ADD USER</a>	
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
	  <th scope="col">Contact</th>
    </tr>
	</thead>
  <tbody>
  <?php foreach ($pepoles as $pepole): ?>
    <tr>
      <td><p><?= $pepole->name ?></p></td>
    <td><p><?= $pepole->contact ?></p></td>
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