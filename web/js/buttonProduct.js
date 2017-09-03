document.addEventListener('DOMContentLoaded', function () {
    var addWindow = document.querySelector('.addWindow');
    
    var addSpecification = document.getElementById('addSpecification');
    
    var add = document.getElementById("add");
 

 
    add.addEventListener('click', function () {
        
        var newWindow = addWindow.cloneNode(true); 
        addSpecification.insertBefore(newWindow, add);
        console.log('działa');
     
    });

});