<html>
    <head><title>Success</title></head>
    <body>
        <?php 
        extract($_GET);
        
        $name= $fname.' '.$lname;
        $email= $email;
        $amount = $amount;
        $ref = $ref;
        
        ?>
        <h1><?php echo $name;?></h1>
        <h1><?php echo $email;?></h1>
        <h1><?php echo $amount;?></h1>
        <h1><?php echo $ref;?></h1>
    </body>
</html>