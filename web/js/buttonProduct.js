document.addEventListener('DOMContentLoaded', function () {
    var addWindow = document.querySelector('.addWindow');
    
    var addSpecification = document.getElementById('addSpecification');
    
    var add = document.getElementById("add");
    
    var remove = document.getElementById("remove");
 

 
    add.addEventListener('click', function () {
        
        var newWindow = addWindow.cloneNode(true); 
        addSpecification.insertBefore(newWindow, add);
        console.log('działa');
     
    });
    
    remove.addEventListener('click', function () {
        
        var x = addSpecification.getElementsByClassName("addWindow").length;
        console.log(x);
        if(x>1){
        var removeWindow = document.getElementById('addSpecification');
        removeWindow.removeChild(removeWindow.childNodes[x]);
        }
    
    
     
    
        console.log('działa');
     
    });

});