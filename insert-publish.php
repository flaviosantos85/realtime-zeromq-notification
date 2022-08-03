<?php
  
    // post.php ???
    // This all was here before  ;)
    
    $entryData = array(
        'topic' => 'feed'
      , 'title'    => $_POST['title']
      , 'message'  => $_POST['message']
      , 'photo'    => 'assets/imgs/'.$_FILES['photo']['name']
      , 'date'     => date('d/m/Y H:i:s')
    );
    
    //$pdo->prepare("INSERT INTO blogs (title, article, category, published) VALUES (?, ?, ?, ?)")
    //    ->execute($entryData['title'], $entryData['article'], $entryData['category'], $entryData['when']);
    
    // This is our new stuff
    $context = new ZMQContext();
    
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'onFeedEntry');
    $socket->connect("tcp://127.0.0.1:8083");
    
    if( $socket->send(json_encode($entryData)) ) {
      echo json_encode( ['status' => 200, 'msg' => 'Post publicado com sucesso'] );
    }
    
    ?>
    
