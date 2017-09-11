$(function(){
    $(".exer-list").on("click",".exer-list-delete",function(){
       $(this).parents(".exer-in-list").remove();
    });
})
