<?php

if ( !empty($_POST) ) {
    
    $text = '';
    
    foreach ( $_POST as $k => $v ) {
        if ( strtolower($k) != 'hash' ) {
            $text .= $v;
        }
    }
    
    $hash = md5( $text );
    
    $_POST['jhash'] = $_POST['hash'];
    $_POST['phash'] = $hash;
    
    $_POST['hash_match'] = ( $_POST['jhash'] == $_POST['phash'] );
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hash Captcha</title>
    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <h1 class="text-center">Hello World</h1>
    
    <form id="contact" action="" method="post">
        
        <label>
            Name
            <input name="name" type="text" />
        </label>
        
        <label>
            Email
            <input name="email" type="text" />
        </label>
        
        <label>
            <input type="submit" value="Send" />
        </label>
        
    </form>
    
    <div id="results">
        <?php echo "<pre>", print_r($_POST), "</pre>"; ?>
    </div>
    
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="md5.min.js"></script>
    <script>//<![[CDATA[
        
        var $contact;
        
        $(function() {
            
            $contact = $('#contact');
            
            $contact.on( 'submit', function(e) {
                
                var text = '';
            
                $('input[type="text"], textarea').each( function() {
                    text += $(this).val();
                });
                
                var hash = md5( text );
                
                var $hashEl = $contact.find('input[name="hash"]');
                
                if ( !$hashEl || $hashEl == null || $hashEl.length < 1 ) {
                    $contact.append( '<input name="hash" type="hidden" value="' + hash + '" />' );
                    var $hashEl = $contact.find('input[name="hash"]');
                }
                
                $hashEl.val( hash );
                
            });
            
            
        });
    //]]></script>
    
</body>
</html>