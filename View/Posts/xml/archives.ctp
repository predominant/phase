---
layout: xml/atom
---

<?php
$count = 0;
$cut = time() - 60*60*24*90;
foreach($posts as $post):
    $post = $this->Post->data($post);

    if ($count > 3 && $post['date'] < $cut) {
        continue;
    }
    $count++;
?>
    <entry>
        <title><?php echo $post['title'] ?></title>
        <link href="<?php echo Configure::read('Phase.site.domain') . $post['url']?>"/>
        <updated><?php echo strftime('%Y-%m-%dT%H:%M:%S+01:00', $post['date']) ?></updated>
        <id><?php echo Configure::read('Phase.site.domain') . $post['url']?></id>
        <content type="html"><?php echo htmlentities($post['intro']) ?></content>
    </entry>
<?php endforeach; ?>
