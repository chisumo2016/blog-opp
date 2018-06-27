
<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Category</h4>
        <ol class="list-unstyled">
            <?php while ($row = $cat->fetch_array()) : ?>
            <li><a href="category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?></a></li>


            <?php endwhile; ?>
        </ol>
    </div>

</div><!-- /.blog-sidebar -->