<?php include 'head.php' ?>

<div class="row">
    <div class="small-10 small-centered columns floating">
        <div class="row">
        <?php
        if(!empty($_POST)) {
            if(isset($_POST['tag'])) {
                $tag = trim($_POST['tag']);
                $temp = $tag;
                $tag = str_replace(" ","",$tag);
                if(!empty($tag)) {
                    echo '<h3>Search results for "'.$temp.'":</h3>';
                    $results = $db->query("
                        SELECT dish.dishid AS dishid, dish.name AS dish, restaurants.name AS restaurant
                        FROM dish, restaurants, dishesandtags, tags
                        WHERE tags.tag = '$tag'
                        AND dishesandtags.dishid = dish.dishid
                        AND dishesandtags.tagid = tags.tagid
                        AND dish.restaurant = restaurants.name");
                    if ($results) {
                        if($results->num_rows) {
                            echo '<ul>';
                            while($row = $results->fetch_object()) {
                                echo '<li><b><a href="dishprofile.php?dish='.$row->dishid.'">'.ucwords($row->dish).'</a></b> from '.ucwords($row->restaurant).'</li>';
                            }
                            echo '</ul>';
                        }
                        else echo 'No dishes fit that criteria';
                    } else echo 'query failed';
                }
            } else echo 'post is not set';
        } else echo 'post is empty';
        ?>
        </div>
        <div class="row">
            <a href="index.php" class="button">Back To Home</a>
        </div>
    </div>
</div>
<?php include 'tail.php' ?>