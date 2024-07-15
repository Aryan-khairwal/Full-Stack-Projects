
<div class="modal fade" id="add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" style="display:none" id="post_img" class="w-100 rounded border">
                <form method="post" action="Backend/php/action.php?add_post" enctype="multipart/form-data">
                    <div class="my-3">

                        <input class="form-control" type="file" id="select_post_img" name="post_img">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
                        <textarea class="form-control" name="caption" rows="1"></textarea>
                    </div>
                    <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
                </form>
            </div>
            
        </div>
  </div>
</div>


<script src="Frontend/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Frontend/javascript/custom.js"></script>
</body>

</html>
