<h1>Your search for <i> <?php echo $keyword ?> </i></h1>
</br>

    <?php
$num_rows = count($list);
if ($num_rows > 0) {
    foreach ($list as $article) {
        ?>
        <tr>
            <td><img src="views/images/<?php echo $article->id . '.jpg'; ?>" class="searchResult"><a href='?controller=article&action=read&readArticle_id=<?php echo $article->id; ?>' class="searchResult">
        <?php echo $article->title . " "; ?> </a><i>published on <?php echo $article->date; ?> </i></br> </td>    
        </tr> 
    <?php
    }
} else {
    echo '<h3>' . "Your search returned no results" . '</h3>';
}

?>