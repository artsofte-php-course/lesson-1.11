<html>
    <head>
        <title>Project list</title>
    </head>
    <body>
        <ul>
            <?php foreach ($projects as $project): ?>
            <li><?php echo $project->getName() ?></li>
            <?php endforeach; ?>
        </ul>    
    
    <a href="/create" >Create project</a>
    </body>
</html>
