
const DIR= window.location.pathname.split('/')[1]
function add(id){
    let ico=document.querySelector(".fav"+id)
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            if(this.responseText==="1"){    
                ico.classList.add('.active')
            }
           else{
                console.log(this.responseText)
            }
        }
    }
    getxml.open('GET','/'+DIR+'/asset/php/private/save.php?id='+id,true)
    getxml.send()
}

function search(val,typ) {
    let tbody=document.querySelector('table tbody')
    tbody.classList.add('hide')
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            tbody.innerHTML=this.responseText
            if(tbody.classList.contains('hide'))
                tbody.classList.remove('hide')
        }
    }
    getxml.open('GET','/'+DIR+'/asset/php/private/search.php?q='+val+'&type='+typ,true)
    getxml.send()
}
