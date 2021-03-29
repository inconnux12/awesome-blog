
const DIR="http://"+window.location.hostname+'/'+window.location.pathname.split('/')[1]+'/'
const SUBDIR=window.location.pathname.split('/')[2]
function add(id){
    let ico=document.querySelector(".fav"+id)
    let getxml= new XMLHttpRequest()
    getxml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            if(this.responseText==1){
                if(SUBDIR!='bookmarks'){
                    ico.innerHTML='star'
                }
            }
            else{
                ico.innerHTML='star_border'
                if(SUBDIR=='bookmarks'){
                    let remove_post=ico.parentNode.parentNode.parentNode
                    remove_post.parentNode.removeChild(remove_post)
                }
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

/***********************************search function */
function search(val,typ) {                
    if(SUBDIR=="bookmarks"){
        typ='b';
    }
    else if(SUBDIR=="post"){
        typ='q';
    }
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
                    posts.innerHTML=this.responseText
                    posts.classList.remove('hide')
                }
            }   
   
           
        }
    }
    getxml.open('GET',DIR+'private/search/'+typ+'/'+val,true)
    getxml.send()
}
/**************************************tags add */
function tags(){ 
    let input_tags=document.querySelector('#tags')
    let nd=document.createElement('input')
    nd.setAttribute('name',"tags_pub[]")
    nd.setAttribute('id',"tags")
    nd.setAttribute('type',"text")
    nd.setAttribute('placeholder',"tags")
    nd.className="validate clr-inp"
    input_tags.parentNode.appendChild(nd)
}
