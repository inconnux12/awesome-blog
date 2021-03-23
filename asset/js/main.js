
/*let articles=document.querySelectorAll('a[target]')
//console.log()
for (let i = 0; i < articles.length; i++) {
    const article = articles[i];
    article.addEventListener('click',function(e){
        e.preventDefault()
        let id_s=this.getAttribute('id')
        let posts=document.querySelector('#posts')
        let containe=document.querySelector('#containe')
        posts.classList.add('hide')
        let get_xml=new XMLHttpRequest()
        get_xml.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            containe.innerHTML=this.responseText;
        }
    }
    let data=new FormData()
    data.append("id",id_s)
    get_xml.open('POST','php/index/article.php',true)
    get_xml.send(data)
    })
    
} */
/*let pub=document.querySelector('#list_pub')
try{
pub.addEventListener('click',(e) => {
        let posts = document.querySelector('#posts')
        let containe = document.querySelector('#containe')
        
            posts.classList.add('hide')
            
            
        let get_xml = new XMLHttpRequest()
        get_xml.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                containe.innerHTML = this.responseText
            }
        }
        get_xml.open('GET', 'php/index/lists.php', true)
        get_xml.send()
    })  
}catch(e){}*/



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
    getxml.open('GET','/blog/asset/php/private/save.php?id='+id,true)
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
    getxml.open('GET','/blog/asset/php/private/search.php?q='+val+'&type='+typ,true)
    getxml.send()
}

/*function focus(){
   
}*/
