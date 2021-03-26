
const DIR="http://"+window.location.hostname+'/'+window.location.pathname.split('/')[1]+'/'
function add(id){
    let ico=document.querySelector(".fav"+id)
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            
            console.log(this.responseText)
            
        }
    }
    getxml.open('GET',DIR+'private/bookmark/'+id,true)
    getxml.send()
}
try{
    var tmp=document.querySelector('table tbody').innerHTML
}catch(e){}

function search(val,typ) {
    let tbody=document.querySelector('table tbody')
    tbody.classList.add('hide')
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            if(this.responseText=='error 404'){
                tbody.innerHTML=tmp
                tbody.classList.remove('hide')
            }
            else if(this.responseText!='error 404'){
                tbody.innerHTML=this.responseText
                tbody.classList.remove('hide')
            }
        }
    }
    getxml.open('GET',DIR+'private/search/'+typ+'/'+val,true)
    getxml.send()
}
