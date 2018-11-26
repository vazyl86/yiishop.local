
$('.test').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/cart/index',
        data: {id: 4},
        type: 'get',
        success: function(e){
            console.log(e);
        },
        error: function(e){
            alert('Error!');
        }
    });
});