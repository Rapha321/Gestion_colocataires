$(document).ready(function() {

    $("#btn1").click(function() {

        showToast('Message for notify goes here!', {
            duration: 2000, // The time interval after notification disappear 
            background: '#20b2aa', // Background color for toast notification 
            color: '#f1f1f1', //Text color 
            borderRadius: '15px' //Border Radius 
        });

    });

});