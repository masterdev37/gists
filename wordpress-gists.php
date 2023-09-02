// Отключение визуального редактора START
function disable_content_editor()
{
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }

    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }


    /*
     * Отключить возможность редактирования для страниц с ID 16, 25 и 30 (для случаев, когда нужно отключить редактор сразу для нескольких страниц)
     */
    $disabled_IDs = array(279, 281, 380, 382);
    if (in_array($post_ID, $disabled_IDs)) {
        remove_post_type_support('page', 'editor');
    }
}

add_action('admin_init', 'disable_content_editor');
// Отключение визуального редактора END
