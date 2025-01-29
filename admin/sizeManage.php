<div class="container-fluid" style="margin-top:98px">
    <div class="row">
			<!-- FORM Panel -->
			<div class="col-md-12 col-lg-4 mb-3">
			<form action="partials/_sizeManage.php" method="post" enctype="multipart/form-data">
				<div class="card mb-3">
					<div class="card-header" style="background-color: #5b3934; color:#fff;">
						Create New Size
				  	</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Size Name: </label>
								<input type="text" class="form-control" name="sizeName" required>
							</div>
							
                            <div class="form-group">
								<label class="control-label">Price</label>
								<input type="number" class="form-control" name="sizePrice" required min="1">
							</div>	

							<div class="form-group">
								<label class="control-label">Category: </label>
								<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>None</option>
                                <?php
                                    $catsql = "SELECT * FROM `categories`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="image" class="control-label">Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-cart"> Create </button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
            <div class="col-md-12 col-lg-8">
				<div class="card">
					<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: #5b3934; color:#fff;">
								<tr>
									<th class="text-center" style="width:7%;">Id</th>
									<th class="text-center">Img</th>
                                    <th class="text-center" style="width:58%;">Size Detail</th>
									<th class="text-center" style="width:18%;">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
    $sql = "SELECT s.*, c.categorieName 
            FROM `size` s
            INNER JOIN `categories` c ON s.categoryId = c.categorieId";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("SQL query failed: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($result)){
        $menuId = $row['id'];
        $menuName = $row['sizeName'];
        $menuPrice = $row['sizePrice'];
        $menuCategoryName = $row['categorieName']; // Corrected column name

        echo '<tr>
                <td class="text-center">' .$menuId. '</td>
                <td>
                    <img src="/kuysjuliocafe/img/menu/menu-'.$menuId. '.jpg" alt="image for this item" width="150px" height="150px">
                </td>
                <td>
                    <p>Name : <b>' .$menuName. '</b></p>
                    <p>Price : <b>' .$menuPrice. '</b></p>
                    <p>Category : <b>' .$menuCategoryName. '</b></p>
                </td>
                <td class="text-center">
                    <div class="row mx-auto" style="width:112px">
                        <button class="btn btn-sm btn-cart" type="button" data-toggle="modal" data-target="#updateItem' .$menuId. '">Edit</button>
                        <form action="partials/_sizeManage.php" method="POST">
                            <button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                            <input type="hidden" name="menuId" value="'.$menuId. '">
                        </form>
                    </div>
                </td>
            </tr>';
    }
?>

							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $menusql = "SELECT * FROM `size`";
    $menuResult = mysqli_query($conn, $menusql);
    while($menuRow = mysqli_fetch_assoc($menuResult)){
        $menuId = $menuRow['id'];
        $menuName = $menuRow['sizeName'];
        $menuPrice = $menuRow['sizePrice'];
        $menuCategorieId = $menuRow['categoryId'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $menuId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $menuId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #e9ecef">
        <h5 class="modal-title" id="updateItem<?php echo $menuId; ?>">Item Id: <?php echo $menuId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_sizeManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="menuId" name="menuId" value="<?php echo $menuId; ?>">
					<button type="submit" class="btn btn-cart my-1" name="updateItemPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/kuysjuliocafe/img/menu/menu-<?php echo $menuId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_sizeManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Size Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $menuName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Price</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $menuPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Category </label></b>
                	<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>None</option>
                                <?php
                                    $catsql = "SELECT * FROM `categories`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
								</select>
				</div>
            </div>
            <input type="hidden" id="menuId" name="menuId" value="<?php echo $menuId; ?>">
            <button type="submit" class="btn btn-cart" name="updateItem">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>