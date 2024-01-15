// notification bar

var closebtn = document.getElementById('cross-btn');
var notification = document.getElementById('notiBar');

function    closenoti() {
    notification.style.display = 'none';
}




// jQuery(function($) {
//     $('.pagination a').on('click', function(e) {
//         e.preventDefault();
//         var link = $(this).attr('href');
//         loadPosts(link);
//     });

//     function loadPosts(link) {
//         $.ajax({
//             type: 'GET',
//             url: link,
//             success: function(response) {
//                 var content = $(response).find('.wraper').html();
//                 $('.wraper').html(content);
//                 history.pushState(null, null, link);
//             }
//         });
//     }
// });


