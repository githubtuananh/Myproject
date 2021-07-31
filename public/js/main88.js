
$(document).ready(function(){
    var url = 'http://localhost:8888/demoGooglePlay/Read/Read';
    $.get(url, function(data, status){
        console.log(data['title'])
      });

    $.getJSON( url, function( data ){
        console.log(JSON.stringify(data))
    })

    fetch('http://localhost:8888/demoGooglePlay/Read/Read')
        .then(function(a){
            return a.json()
        })
        .then(function(data){
            console.log(data)
        })
})