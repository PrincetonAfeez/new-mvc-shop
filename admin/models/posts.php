<?php
function post_trash($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE posts SET post_status='Trash' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_delete($id)
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "DELETE FROM posts WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function page_update()
{
    $name = escape($_POST['title']);
    $post = array(
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => slug($name),
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_modified' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'post_modified_user' => escape($_POST['editby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 2
    );
    $post_id = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $post_id . 'page';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $post = array(
            'id' => $post_id,
            'post_avatar' => $image1
        );
        save('posts', $post);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=page');
}