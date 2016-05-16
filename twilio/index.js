

$(function() {
    // Get handle to the chat div 
    var $chatWindow = $('#messages');
    var $history = $('.actv_user1');

    // Manages the state of our access token we got from the server
    var accessManager;

    // Our interface to the IP Messaging service
    var messagingClient;

    // A handle to the "general" chat channel - the one and only channel we
    // will have in this sample app
    var generalChannel;

    var add_log=$('#add_log').val();
    // The server will assign the client a random username - store that value
    // here
    var username=$('#username').val();
    var userId=$('#userId').val();
    var createdchannel;


    // Helper function to print info messages to the chat window



    function print(infoMessage, asHtml) {
        var $msg = $('<div class="info">');
        if (asHtml) {
            $msg.html(infoMessage);
        } else {
            $msg.text(infoMessage);
        }
       
        $chatWindow.append($msg);
    }

     function Historyprint(infoMessage, asHtml) {
        $('.loader').hide();
        var $msg = $('<div class="info">');
        if (asHtml) {
            $msg.html(infoMessage);
        } else {
            $msg.text(infoMessage);
        }
       
        $history.append($msg);
    }


if (add_log==1)
{
    setTimeout(function() {

    CallHistory();
}, 1000);
}

function CallHistory()
{

      $.getJSON('./token.php',{
        identity: username,
        device: 'browser'
    },function(data) {
       
 
        var accessManager = new Twilio.AccessManager(data.token);
        var messagingClient = new Twilio.IPMessaging.Client(accessManager);


    /** history **/
    messagingClient.getChannels().then(function(channels) {
  var newchannel=25;
  newchannel.getMessages().then(function(messages) {
  var totalMessages = messages.length;
  for (i=0; i<messages.length; i++) {
    var message = messages[i];
    Historyprint(message.author+': '+message.body);
   // $('.actv_user1').html(message.author+': '+message.body);
  }
  console.log('Total Messages:' + totalMessages);
});
   for (i=0; i<channels.length; i++) {
    var myChannel = channels[i];
  console.log(myChannel);

        /* get history here */
        myChannel.getMessages().then(function(messages) {
  var totalMessages = messages.length;
  for (i=0; i<messages.length; i++) {
    var message = messages[i];
    Historyprint(message.author+': '+message.body);
   // $('.actv_user1').html(message.author+': '+message.body);
  }
  console.log('Total Messages:' + totalMessages);
});
        /* get history here */

  }
});
       
     
        
    });





}

    // Helper function to print chat message to the chat window
    function printMessage(fromUser, message) {


       if(add_log!=1){
        if (fromUser === username) {
             var $user = $('<span class="username">').text('Me' + ':');
            $user.addClass('me');
        }
        else
        {
             var $user = $('<span class="username">').text(fromUser + ':');
        }
        }
        else
        {
             var $user = $('<span class="username">').text(fromUser + ':');
             if (fromUser === username) {
             
            $user.addClass('me');
                }
        }
        var $message = $('<span class="message">').text(message);
        var $container = $('<div class="message-container">');
        $container.append($user).append($message);
        $chatWindow.append($container);

        $chatWindow.scrollTop($chatWindow[0].scrollHeight);
    }

    // Alert the user they have been assigned a random username
    print('Logging in...');


$('.userId').click(function() {

//console.log($(this).data("title"));
//console.log('channel creation');
$('#msg_body').show();
$('.actv_user1').hide();
createchannel($(this).data("title"),$(this).data("id"));

});


function createchannel(usernamechat,toid){
    $('#messages').show();
    $('#chat-input').show();
   
    $.getJSON('./token.php',{
        identity: username,
        device: 'browser'
    },function(data) {
       //console.log(data.identity);
        // console.log(username);
       // console.log(usernamechat);
        if(toid<userId)
        {
        var comboId=toid+userId;
        }
        else
        {
        var comboId=userId+toid;
        }   
    

        var request = $.ajax({
  url: "script.php",
  method: "POST",
  data: { id : comboId },
  dataType: "html"
});
 
request.done(function( msg ) {
createdchannel=msg;
});
 


 
        var accessManager = new Twilio.AccessManager(data.token);
        var messagingClient = new Twilio.IPMessaging.Client(accessManager);
       
            if(createdchannel=='')
            {
          messagingClient.createChannel({
            uniqueName: comboId,
            friendlyName: 'Test Chat Channel'
      }).then(function(channel) {
           // console.log('Created test channel:');
           console.log(channel);
          //  sendtext(channel);
       });
        get_channel(messagingClient, usernamechat);
    }
    else
    {
            get_channel(messagingClient, createdchannel);
    }
       
        
    });


}


function get_channel(messagingClient, channel_name){
   //console.log(channel_name);
    messagingClient.getChannels().then(function(channels) {
        for (i=0; i<channels.length; i++) {
         var channel = channels[i];   
   // console.log('Channel: ' + channel.friendlyName);
    //console.log(channel.uniqueName);
            if(channel.uniqueName == channel_name){
               // console.log(channel);
             
              generalChannel=channels[i];
                sendtext(generalChannel);
                generalChannel.on('messageAdded', function(message) {
                    //alert(message);
                    printMessage(message.author, message.body);

                });
              
                break;
            }

        }



         print('Joined channel as ' 
                + '<span class="me">' + username + '</span>.', true);
    });
    
}

function sendtext(generalChannel){
    console.log(generalChannel);
    var $input = $('#chat-input');
    $input.on('keydown', function(e) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        if (e.keyCode == 13) {
      
           generalChannel.join().then(function(channel) {
    console.log('Joined channel ' + channel.friendlyName) ;

    var msg = $('#chat-input').val();
generalChannel.sendMessage(msg);
 $input.val('');
});
            }
        });
    }
    // Get an access token for the current user, passing a username (identity)
    // and a device ID - for browser-based apps, we'll always just use the 
    // value "browser"



   /* $.getJSON('./token.php', {
        identity: username,
        device: 'browser'
    }, function(data) {
        console.log(data);
 
        // Alert the user they have been assigned a random username
        username = data.identity;
        print('Welcome To The Chat Room : ' 
            + '<span class="me">' + username + '</span>', true);

        // Initialize the IP messaging client
        accessManager = new Twilio.AccessManager(data.token);
        messagingClient = new Twilio.IPMessaging.Client(accessManager);

        // Get the general chat channel, which is where all the messages are
        // sent in this simple application
        print('Attempting to join "general" chat channel...');
        var promise = messagingClient.getChannelByUniqueName('general');


            messagingClient.on('channelAdded', function(channel) {
              console.log('Channel added: ' + channel.friendlyName);
            });

        promise.then(function(channel) {

            console.log(channel);

             generalChannel = channel;

            if (!generalChannel) {
                
                // If it doesn't exist, let's create it
                messagingClient.createChannel({
                    uniqueName: 'general',
                    friendlyName: 'General Chat Channel'
                }).then(function(channel) {
                    console.log('Created general channel:');
                    console.log(channel);
                    generalChannel = channel;
                    setupChannel();

                });



            } else {
                
                console.log('Found general channel:');
                //alert(generalChannel);
              //  var chat_history=generalChannel.messages;
                console.log(generalChannel);
               // console.log(chat_history.length);
                
               // console.log(generalChannel.messages);
                // newchannel 

        generalChannel.getMessages().then(function(messages) {
        var totalMessages = messages.length;
       
        if(add_log==1){
             print('Chat history');

        for (i=0; i<messages.length; i++) 
            {
                var message = messages[i];
                print('<span>'+message.author+":"+ message.body + '</span>', true);
                console.log(message.author+":"+ message.body); 
            }
               console.log('Total Messages:' + totalMessages); 
            }
    
            });


                // newchannel  
                setupChannel();
               //createchannel();
            }
        });
    });*/




    // Set up channel after it has been found
    function setupChannel() {



        // Join the general channel
        generalChannel.join().then(function(channel) {
            print('Joined channel as ' 
                + '<span class="me">' + username + '</span>.', true);
        });

        // Listen for new messages sent to the channel
        generalChannel.on('messageAdded', function(message) {
            //alert(message);
            printMessage(message.author, message.body);

        });
    }

    // Send a new message to the general channel
  /*  var $input = $('#chat-input');
    $input.on('keydown', function(e) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        if (e.keyCode == 13) {
            //alert($input.val());
            generalChannel.sendMessage($input.val())
            $input.val('');
        }
         
    });*/



});


