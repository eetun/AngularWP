<!DOCTYPE html>
<html ng-app="angularWP">
<head>
    <base href="<?php $url_info = parse_url( home_url() ); echo trailingslashit( $url_info['path'] ); ?>">
    <title>AngularWP</title>
    <?php wp_head(); ?>
</head>
<body>

    <header>
        <a href="<?php echo site_url(); ?>">AngularWP</a>
    </header>
    
    <div ng-view></div>
    

</body>
</html>
