<?php
require './Classes/DB.php';
$db = new DB();

// sukuriam nauja lentele
// $db->createDBPostsTable();

// priideti viena posta
// $db->addPost('First Post', 'Jane Done', 'post from function db klases');
// $db->addPost('third Post', 'Jane Done', 'post from function db klases');


// edit post
// $db->editPost(2, 'Second Post', 'New author Jane', 'same but diff lorem lorem');

// delete post
// $db->deletePost(3);

// gausim visus irasus is posts lenteles
$postDataArr = $db->getPosts();

var_dump($postDataArr);
require './inc/head.php';
?>
<?php echo $db->status;?>
   


    <main class="container">
    
    <h1>PHP BLOG</h1>

    <div class="cards-container d-flex flex-wrap">
    <?php foreach($postDataArr as $post): ?>
    <!-- ONE card start -->
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title'] . "(id_{$post['id']})"; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['author']; ?></h6>
                <p class="card-text"><?php echo $post['body']; ?></p>
            </div>
            <div class="card-footer">
                <a class="d-block" href="#">View More</a>
                <p class="text-muted"><?php echo $post['created_at']; ?></p>
            </div>
        </div>
    <!-- end -->
    <?php endforeach; ?>
    </div>
    
    </main>
    

</body>
</html>

<?php $db->closeConn();

?>