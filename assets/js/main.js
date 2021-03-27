
const DIR="http://"+window.location.hostname+'/'+window.location.pathname.split('/')[1]+'/'
const SUBDIR=window.location.pathname.split('/')[2]
function add(id){
    let ico=document.querySelector(".fav"+id)
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            if(this.responseText==1)
                ico.style.color='green'
                if(SUBDIR==''){
                    ico.innerHTML='star'
                }
            else
                ico.style.color='red'
                if(SUBDIR=='bookmarks'){
                    let remove_post=ico.parentNode.parentNode.parentNode
                    remove_post.parentNode.removeChild(remove_post)
                }
        }
    }
    getxml.open('GET',DIR+'private/bookmark/'+id,true)
    getxml.send()
}
try{
    var tmp=document.querySelector('table tbody').innerHTML
    
}catch(e){}
var tmp2=document.querySelector('#posts').innerHTML
function search(val,typ) {
    let tbody=document.querySelector('table tbody')
    let posts=document.querySelector('#posts') 
    let getxml= new XMLHttpRequest() 
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            if(typ=='cat'||typ=='pub'){
                tbody.classList.add('hide')
                 if(this.responseText=='error 404'){
                    tbody.innerHTML=tmp
                    tbody.classList.remove('hide')
                }
                else if(this.responseText!='error 404'){
                    tbody.innerHTML=this.responseText
                    tbody.classList.remove('hide')
                }
            }
            else{
                posts.classList.add('hide')
                if(this.responseText=='error 404'){
                    posts.innerHTML=tmp2
                    posts.classList.remove('hide')
                }
                else if(this.responseText!='error 404'){
                    console.log(this.responseText)
                    posts.innerHTML=this.responseText
                    posts.classList.remove('hide')
                }
            }   
   
           
        }
    }
    getxml.open('GET',DIR+'private/search/'+typ+'/'+val,true)
    getxml.send()
}
