document.body.onload=()=>{
    console.log('ready');
    let all_post=document.getElementById('all-posts');
    let all_popular_post=document.getElementById('all-popular-posts');
    let popular_post_btn=document.getElementById('popular-post-btn');
    all_popular_post.style.display="none";

    popular_post_btn.onclick=()=>{
        all_post.style.display="none";
        all_popular_post.style.display="block";

    }
}



