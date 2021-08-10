/***************************
		.env config 
		pusher_app_id
		Pusher_app_key
		Pusher_app_secret
		Pusher_app_cluster

## change broadcast_driver
		  Broadcast_driver=pusher

##  config  >app.php
		uncomment broadcast_service_provider

## run install pusher via composer 
		composer require pusher/pusher-php-server "~4.0"

## run npm install pusher
    npm install --save laravel-echo pusher-js

   create pusher account
   edit .env file
   create pusher connections with composer and npm 
   create broadcast channel 
   create event listener



**********************************/
## script file at the root of the application
importScripts("http## js.pusher.com/beams/service-worker.js");
## sdk url
<script src="http## js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>## script file content
	<script>
  const beamsClient = new PusherPushNotifications.Client({
    instanceId: '281365ea-136b-4f4d-92c3-e83ec5c706c6',
  });

  beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);
</script>
## if script file is loading right copy paste this to your terminal
  curl -H "Content-Type: application/json" \
     -H "Authorization: Bearer 413E49FA951691F4D6DC2C50DEDB9894F06F0B7395AB662F40F9C1AD5039DAB2" \
     -X POST "http## 281365ea-136b-4f4d-92c3-e83ec5c706c6.pushnotifications.pusher.com/publish_api/v1/instances/281365ea-136b-4f4d-92c3-e83ec5c706c6/publishes" \
     -d '{"interests":["hello"],"web":{"notification":{"title":"Hello","body":"Hello, world!"}}}'






	<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Publish an event to channel <code>my-channel</code>
    with event name <code>my-event</code>; it will appear below:
  </p>
  <div id="app">
    <ul>
      <li v-for="message in messages">
        {{message}}
      </li>
    </ul>
  </div>

  <script src="http## js.pusher.com/7.0/pusher.min.js"></script>
  <script src="http## cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
##  Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('579f01addc48df063cfc', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      app.messages.push(JSON.stringify(data));
    });

##  Vue application
    const app = new Vue({
      el: '#app',
      data: {
        messages: [],
      },
    });
  </script>
</body>