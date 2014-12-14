<ol class="breadcrumb">
    <?php
    foreach($this->crumbs as $crumb) {
        echo '<li' . (!isset($crumb['url']) ? ' class="active"' : '') . '>';
        if(isset($crumb['url'])) {
            echo CHtml::link($crumb['name'], $crumb['url']);
        } else {
            echo $crumb['name'];
        }
        if(next($this->crumbs)) {
            echo $this->delimiter;
        }
        echo '</li>';
    }
    ?>
</ol>
