const call_trigger = document.querySelector("#call_trigger_function");
const call_btn_2 = document.querySelector("#callbutton2");
const call_btn_3 = document.querySelector("#callbutton3");
const quit_call = document.querySelector("#turnoff_call");
var turnOn = 1;

/*
    JS library reference:
    http://developers.bistri.com/webrtc-sdk/js-library-reference
*/

var room;
var members;
var localStream;

// when Bistri API client is ready, function
// "onBistriConferenceReady" is invoked
onBistriConferenceReady = function () {

    

    // test if the browser is WebRTC compatible

    // initialize API client with application keys
    // if you don't have your own, you can get them at:
    // https://api.developers.bistri.com/login
    bc.init( {
        "appId": "38077edb",
        "appKey": "4f304359baa6d0fd1f9106aaeb116f33",
    } );
    
    /* Set events handler */

    // when local user is connected to the server
    bc.signaling.bind( "onConnected", function () {
        // show pane with id "pane_1"
        showPanel( "pane_1" );
    } );

    // when an error occured on the server side
    bc.signaling.bind( "onError", function ( error ) {
        // display an alert message
    } );

    // when the user has joined a room
    bc.signaling.bind( "onJoinedRoom", function ( data ) {
        // set the current room name
        room = data.room;
        members = data.members;
        // ask the user to access to his webcam
        bc.startStream( {audio: true, video:true}, function( stream ){
            // affect stream to "localStream" var
            localStream = stream;
            // when webcam access has been granted
            // show pane with id "pane_2"
            showPanel( "pane_2" );
            // insert the local webcam stream into div#video_container node
            bc.attachStream( stream, q( "#video_container" ), { mirror: true });
            // then, for every single members present in the room ...
            for ( var i=0, max=members.length; i<max; i++ ) {
                // ... request a call
                bc.call( members[ i ].id, room, { "stream": stream } );
            }
        } );
    } );
    // when the local user has quitted the room
    bc.signaling.bind( "onQuittedRoom", function( room ) {
        // stop the local stream
        bc.stopStream( localStream, function(){
            // remove the stream from the page
            bc.detachStream( localStream );
            // show pane with id "pane_1"
            showPanel( "pane_1" );
        } );
    } );
    
    // when a new remote stream is received
    bc.streams.bind( "onStreamAdded", function ( remoteStream ) {
        // insert the new remote stream into div#video_container node
        bc.attachStream( remoteStream, q( "#video_container" ) );
    } );
    
    // when a remote stream has been stopped
    bc.streams.bind( "onStreamClosed", function ( stream ) {
        // remove the stream from the page
        bc.detachStream( stream );
    } );
    
    // when a local stream cannot be retrieved
    bc.streams.bind( "onStreamError", function( error ){   
        switch( error.name ){
            case "PermissionDeniedError":
                alert( "Webcam access has not been allowed" );
                bc.quitRoom( room );
                break
            case "DevicesNotFoundError":
                if( confirm( "No webcam/mic found on this machine. Process call anyway ?" ) ){
                    // show pane with id "pane_2"
                    showPanel( "pane_2" );
                    for ( var i=0, max=members.length; i<max; i++ ) {
                        // ... request a call
                        bc.call( members[ i ].id, room );
                    }
                }
                else{
                    bc.quitRoom( room );  
                }
                break
        }
    } );

    // bind function "joinConference" to button "Join Conference Room"
    q( "#callbutton3" ).addEventListener( "click", joinConference );
    q( "#callbutton2" ).addEventListener( "click", joinConference );
    q( "#callbutton" ).addEventListener( "click", joinConference );
    
    // bind function "quitConference" to button "Quit Conference Room"
    q( "#turnoff_call" ).addEventListener( "click", quitConference );
    
    // open a new session on the server
    bc.connect();
}

// when button "Join Conference Room" has been clicked
function joinConference(){
    var roomToJoin = q( "#room_field" ).value;
    // if "Conference Name" field is not empty ...
    if( roomToJoin ){
        // ... join the room
        bc.joinRoom( roomToJoin );
    }
    else{
        // otherwise, display an alert
        alert("ID da sala inválido");
    }
    BistriConference.muteVideo( localStream, true );
}

// when button "Quit Conference Room" has been clicked
function quitConference(){
    // quit the current conference room
    bc.quitRoom( room );
}

function showPanel( id ){ 
    var panes = document.querySelectorAll( ".pane" );
    // for all nodes matching the query ".pane"
    for( var i=0, max=panes.length; i<max; i++ ){
        // hide all nodes except the one to show
        panes[ i ].style.display = panes[ i ].id == id ? "block" : "none";
    };
}

function q( query ){
    // return the DOM node matching the query
    return document.querySelector( query );
}

call_trigger.addEventListener("click", function() {
    var constraints = window.constraints = {
        audio: true,
        video: true
      };
    
    navigator.mediaDevices.getUserMedia(constraints)
      .then(function(stream) {
        var audioTracks = stream.getAudioTracks();
        var videoTracks = stream.getVideoTracks();
        document.getElementById('cam-options').innerHTML = videoTracks[0].label;
        document.getElementById('mic-options').innerHTML = audioTracks[0].label;
        window.stream = stream; // make variable available to console
        video.srcObject = stream;
      })
      .catch(function(error) {
        console.log("Não foram encontrados dispositivos");
      });

    $.ajax({
        type: "GET",
        url: "callBtn.php" ,
    });
    if (!bc.isCompatible() ) {
        // if the browser is not compatible, display an alert
        alert( "Seu navegador não é compatível com nosso sistema de call." );
        // then stop the script execution
        return;
    }
});

call_btn_2.addEventListener("click", function() {
    var constraints = window.constraints = {
        audio: true,
        video: true
      };
    
    navigator.mediaDevices.getUserMedia(constraints)
      .then(function(stream) {
        var audioTracks = stream.getAudioTracks();
        var videoTracks = stream.getVideoTracks();
        document.getElementById('cam-options').innerHTML = videoTracks[0].label;
        document.getElementById('mic-options').innerHTML = audioTracks[0].label;
        window.stream = stream; // make variable available to console
        video.srcObject = stream;
      })
      .catch(function(error) {
        console.log("Não foram encontrados dispositivos");
      });

    $.ajax({
        type: "GET",
        url: "callBtn.php" ,
    });
    if (!bc.isCompatible() ) {
        // if the browser is not compatible, display an alert
        alert( "Seu navegador não é compatível com nosso sistema de call." );
        // then stop the script execution
        return;
    }
});

call_btn_3.addEventListener("click", function() {
    var constraints = window.constraints = {
        audio: true,
        video: true
      };
    
    navigator.mediaDevices.getUserMedia(constraints)
      .then(function(stream) {
        var audioTracks = stream.getAudioTracks();
        var videoTracks = stream.getVideoTracks();
        document.getElementById('cam-options').innerHTML = videoTracks[0].label;
        document.getElementById('mic-options').innerHTML = audioTracks[0].label;
        window.stream = stream; // make variable available to console
        video.srcObject = stream;
      })
      .catch(function(error) {
        console.log("Não foram encontrados dispositivos");
      });

    $.ajax({
        type: "GET",
        url: "callBtn.php" ,
    });
    if (!bc.isCompatible() ) {
        // if the browser is not compatible, display an alert
        alert( "Seu navegador não é compatível com nosso sistema de call." );
        // then stop the script execution
        return;
    }
});

quit_call.addEventListener("click", function() {
    constraints = window.constraints = {
        audio: false,
        video: false
    }
});

function mutemic() {
    localStream.getAudioTracks().forEach(audioTrack => audioTrack.enabled = !audioTrack.enabled)
}
function mutevid() {
    localStream.getVideoTracks().forEach(VideoTrack => VideoTrack.enabled = !VideoTrack.enabled)
}

$('#config').click(function () {
    $(this).toggleClass("config-active");
    $("#menu-configs").toggleClass("config-active");
});
$("#muted_icon").css("display", "none");
$("#icon_mic").click(function() {
    $.ajax({
        type: "GET",
        url: "MicManager.php" ,
    });
});
$("#icon_vid").click(function() {
    $.ajax({
        type: "GET",
        url: "VidManager.php" ,
    });
});