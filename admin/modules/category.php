<h1 class="page-header">
</h1>

<div class="panel panel-default">
	<div class="panel-heading">
    <?php
    $mode = "add";
    if(isset($_GET['category_id']))
    {
         echo("Edit category");
         $mode = "edit";
    }
    else{
        echo("Add new category");
    }
    $categoryName = "";
    $parentId = "";
    $status = "";
?>
       
    </div>
    <div class="panel-body">

            <div class="col-md-6">
                <form role="form" method="post" action="index.php?module=registerCategoryProcess">
                    <div class="form-group">
                        <label>Categort Name</label>
                        <!-- <input type="hidden" name="cateid" id="cateid" value="<?php echo $id; ?>" /> -->
                        <input class="form-control" type="text" name="cateName" id="cateName" placeholder="Enter category name" value="" />
                    </div>
                     <div class="form-group">
                        <label>Is active?</label>
                    <input type="checkbox" name="status" id="status" value="active">
                    </div>
                    <button type="submit" name="addNew" class="btn btn-default">
                        <?php  
                            if($mode == "edit"){
                                echo "Edit";
                            }else{
                                echo "Add new";
                            }
                        ?>
                    </button>
                </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
                </form>
    		</div>
    		<div class="col-md-6"></div>
    	</div>
    </div>
</div>