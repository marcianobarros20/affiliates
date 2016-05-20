
function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification("Hi there!");
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification("Hi there!");
      }
    });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}

function chk_status(toid)
{
     $('#notify').click();
     if(toid==$('#userId').val())
     {
       new Notification('New Message', {
                body: 'from' + ': ' + 'new message'
                });
   }
}


$(function() {
    // Get handle to the chat div 
    var $chatWindow = $('#messages');
    var $history = $('.actv_user1');
    var $history1 = $('.actv_user2');

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
    var myChannel;
    var Getchannel;
    var explodevalue;


    // Helper function to print info messages to the chat window
/*var channelchk='Gargi PalSudipta Mitra';
channelchk.on('messageAdded', function(message) {
  console.log(message.author, message.body);
});*/
// Promise


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
        //console.log(infoMessage);
        $('.loader').hide();
        var $msg = $('<div class="info">');
        if (asHtml) {
            $msg.html(infoMessage);
        } else {
            $msg.text(infoMessage);
        }
       
        $history.append($msg);
    }


     function Historyprint1(infoMessage, asHtml) {
        //console.log(infoMessage);
        $('.loader').hide();
        var $msg = $('<div class="info">');
        if (asHtml) {
            $msg.html(infoMessage);
        } else {
            $msg.text(infoMessage);
        }
       
        $history1.append($msg);
    }


if (add_log==1)
{
    setTimeout(function() {

    CallHistory();
}, 1000);
}

else
{
     $.getJSON('./token.php',{
        identity: username,
        device: 'browser'
    },function(data) {
       
       

       var accessManager = new Twilio.AccessManager(data.token);
        var messagingClient = new Twilio.IPMessaging.Client(accessManager);
        
         messagingClient.getChannels().then(function(channels) {
            for (var i=0; i<channels.length; i++) {
                 var myChannel = channels[i];
            myChannel.getMessages().then(function(messages) {
            var totalMessages = messages.length;
             console.log(myChannel.uniqueName);
            for (var k=0; k<messages.length; k++) {
            var message = messages[k];
                  Historyprint1(message.author+': '+message.body);
            }

            });

            }
         });



});

     /*$.ajax({
    type: "POST",
    url: "script1.php",
    async: false, 
    data: { id : username },
    success: function(data) {

    Getchannel = data;   
        
    }
});
     var explodevalue=Getchannel.split(',');
     for(var n=0;n<explodevalue.length;n++)
     {
        var myChannel=explodevalue[n];
   myChannel.on('messageAdded', function(message) {
  console.log(message.author, message.body);
});
        }*/


}

function CallHistory()
{



  $.getJSON('./token.php',{
        identity: username,
        device: 'browser'
    },function(data) {
       
      // console.log(data.token);
 
        var accessManager = new Twilio.AccessManager(data.token);
        var messagingClient = new Twilio.IPMessaging.Client(accessManager);
          


   

    /* history **/
    messagingClient.getChannels().then(function(channels) {
 Historyprint('Chat history of last 3 days');
            for (var i=0; i<channels.length; i++) {
            var myChannel = channels[i];


            
           

            //console.log(channels[i].status);
            if(channels[i].status==='joined' && myChannel.uniqueName!=null)
            {
            myChannel.getMessages().then(function(messages) {
            var totalMessages = messages.length;
             //console.log(myChannel.uniqueName);
            for (var k=0; k<messages.length; k++) {
            var message = messages[k];
           // console.log(message);
           var today = new Date()
           var priorDate = new Date().setDate(today.getDate()-3);
            //console.log(message.dateUpdated);
            //console.log(priorDate);
            //console.log(Date.parse(message.dateUpdated));
         //  console.log(message.author+': '+message.body);

         if(Date.parse(message.dateUpdated)>=priorDate)
            {
                var  get_date = new Date(Date.parse(message.dateUpdated));
                var Posted_date=get_date.getDate()+'/'+get_date.getMonth()+'/'+get_date.getFullYear();
    //console.log(get_date.getDate()+'/'+get_date.getMonth()+'/'+get_date.getFullYear());
           Historyprint(message.author+': '+message.body+' [Posted On('+Posted_date+')]'+'id message '+k);
            }

            }

            });
            }

    

            }
});
       
   /* history */
        
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
                
               /* new Notification('New Message', {
                body: fromUser + ': ' + 'new message'
                });*/
               
                
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
$('.actv_user2').hide();
createchannel($(this).data("title"),$(this).data("id"));

});


function createchannel(usernamechat,toid){
    $('#messages').show();
    $('#chat-input').show();
   
    $.getJSON('./token.php',{
        identity: username,
        device: 'browser'
    },function(data) {
      
        if(toid<userId)
        {
       // var comboId=toid+userId;
        var comboId=usernamechat+username;
        }

        else if(toid==userId)
        {
            if(username=='admin')
            {
                var comboId=username+usernamechat;
            }
            else
            {
                var comboId=usernamechat+username;
            }
        }
        else
        {
        //var comboId=userId+toid;
        var comboId=username+usernamechat;
        }   

var createdchannel=0;
$.ajax({
    type: "POST",
    url: "script.php",
    async: false, 
    data: { id : comboId },
    success: function(data) {
        createdchannel = data;   
        
    }
});


        var accessManager = new Twilio.AccessManager(data.token);
        var messagingClient = new Twilio.IPMessaging.Client(accessManager);

      



        messagingClient.getChannels().then(function(channels) {

                   for (i=0; i<channels.length; i++) {
                    var myChannel = channels[i];
                 // console.log(myChannel);
                if(myChannel!=null){
                       
                        myChannel.getMessages().then(function(messages) {
                  var totalMessages = messages.length;
                  for (i=0; i<messages.length; i++) {
                    var message = messages[i];
                    //console.log(message.author+': '+message.body);
                    
                  }
                 // console.log('Total Messages:' + totalMessages);
                });
                       
                }
                  }



        });



       
            if(createdchannel==0)
            {
            console.log('entered to chat');
            messagingClient.createChannel({
            uniqueName: comboId,
            friendlyName: comboId
            }).then(function(channel) {
            console.log('Created test channel:');
            console.log(channel);
            //  sendtext(channel);
            });
            get_channel(messagingClient, comboId,toid);
            }
            else
            {
            get_channel(messagingClient, comboId,toid);
            }
       
        
    });


}


function get_channel(messagingClient, channel_name,toid){
 // console.log(channel_name);
  var str = channel_name;
  var clicent = str.replace(username, "");
    messagingClient.getChannels().then(function(channels) {
        for (i=0; i<channels.length; i++) {
         var channel = channels[i];   
   // console.log('Channel: ' + channel.friendlyName);
   // console.log(channel.uniqueName);
            if(channel.uniqueName == channel_name){
               // console.log(channel);
             
                generalChannel=channels[i];
                sendtext(generalChannel,toid);
                generalChannel.on('messageAdded', function(message) {
                    //alert(message);
                    console.log(message);
                    printMessage(message.author, message.body);

                });
               
            }
         }



         print('Joined channel as ' 
                + '<span class="me">' + username + ' With '+clicent+'</span>.', true);
    });



    
}

function sendtext(generalChannel,toid){
   // console.log(generalChannel);  console.log('generalChannel');
  
    var $input = $('#chat-input');

generalChannel.on('typingStarted', function(member) {
     //console.log(member.identity + 'is currently typing.');
        $('#typing').html(member.identity + ' is currently typing.');
});

    $input.on('keydown', function(e) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        if (e.keyCode == 13) {

            /* notification */

            /* notification */

        generalChannel.join().then(function(channel) {
        generalChannel.on('memberJoined', function(member) {
        console.log('Member joined');
        $('#typing1_'+toid).html('New message arrived from '+member.identity);
        });

        var msg = $('#chat-input').val();
         chk_status(toid);
        generalChannel.sendMessage(msg);

        $input.val('');
        });
            }

            else { 
        generalChannel.typing(); 
 
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


