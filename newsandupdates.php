<?php
require_once('functions.php');

title("News and Updates");
page_header("News and Updates");
$news_sql = mysql_query("SELECT * FROM news_updates ORDER BY id DESC");
while ($row = mysql_fetch_array($news_sql)) {
?>
<h2><?php print $row['title'] ?></h2>
Posted by: <a href="?act=profile&amp;act2=view&amp;username=<?php print $row['username'] ?>"><?php print $row['username'] ?></a>
<br />
Date: <?php print $row['date'] ?>
<p><?php print $row['post'] ?></p>
<?php
    if ($_SESSION['group'] == 'admin') {
?>
<a href="?act=admin&amp;act2=edit_post&amp;id=<?php print $row['id'] ?>">Edit Post</a> &mdash;
<a href="?act=admin&amp;act2=delete_post&amp;id=<?php print $row['id'] ?>">Delete Post
</a>
<?php
    };
    if ($settings['comments'] == 1) {
        if ($_SESSION['group'] == 'public') {
?>
    <a href="?act=comments&amp;act2=view_comments&amp;id=<?php print $row['id'] ?>">View Comments</a>
<?php
        };
        if ($_SESSION['group'] == 'admin' || $_SESSION['group'] == 'member' || $_SESSION['group'] == 'basic') {
?>
                    <br />
                    <a href="?act=comments&amp;act2=add_comments&amp;id=<?php print $row['id'] ?>">Add Comments</a> &mdash;
                    <a href="?act=comments&amp;act2=view_comments&amp;id=<?php print $row['id'] ?>">View Comments</a>
<?php
        };
    };
};
?>
