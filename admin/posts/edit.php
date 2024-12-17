<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/main.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin | Edit Post</title>
</head>
<body>
    <!-- Admin Header-->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper-->
    <div class="admin-wrapper">

      <!--Left Sidebar-->
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
     

      <!--Admin Content-->
      <div class="admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Create Post</a>
            <a href="index.php" class="btn btn-big">Manage Post</a>
        </div>

        <div class="content">
            <h2 class="page-title">Edit Post</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php echo $id ?>">  
                <div>
                    <label>Title</label>
                    <input type="text" name="title"  value="<?php echo $title ?>" class="text-input">
                </div>

                <div>
                    <label>Body</label>
                    <textarea name="body" id="body"> <?php echo $body ?></textarea>
                </div>

                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="text-input">
                </div>

                <div>
                    <label>Topic</label>
                    <select name="topic_id" class="text-input">
                        <option value=""></option>
                        <?php foreach ($topics as $key => $topic): ?> 
                            <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                                <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['title'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['title'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div>
                    <?php if (empty($published) && $published == 0): ?>
                        <label>
                            <input type="checkbox" name="published">
                            Publish
                        </label>
                    <?php else: ?>
                        <label>
                            <input type="checkbox" name="published" checked>
                            Publish
                        </label>
                    <?php endif; ?>
                   
                </div>


                <div>
                    <button type="submit" name="update-post" class="btn btn-big">Update Post</button>
                </div>
            </form>

        </div>

      </div>
      <!--End of Admin Content-->

    </div>
    <!--End of AdminPage Wrapper-->

   

    <!-- JQUERY CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

    <!-- Custom Script-->
    <script src="../../assets/js/scripts.js"></script>

</body>

</html>