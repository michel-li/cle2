let coll = document.getElementsByClassName("collapsible");
let i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        let content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}


/* Dropdown list */
/*.collapsible {
    background-color:#eeeeee;
    color:#444444;
    cursor:pointer;
    padding:18px;
    width:60%;
    border:5px;
    text-align:left;
    outline:none;
    font-size:15px;
    border-style:solid;
}

.active, .collapsible:hover{
    background-color:#cccccc;
}

/*.content{
    padding:0 18px;
    display: none;
    overflow: hidden;
    background-color:#f1f1f1;
    word-wrap: break-word;
    width:55%;

}

/*.collapsible:after{
    content:'\02795'; /* Unicode character for "plus" sign (+) */
/*    font-size:13px;
    color:white;
    float:right;
    margin-left:5px;
}

/*.active:after{
    content:"\2796"; /*Unicode character for "minus" sign (-) */
/*}