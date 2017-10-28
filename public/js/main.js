var host_url='http://localhost:8383/sesa/public/';

$(document).ready(function(){
   $('.reply_count').on('click',function () {
       //alert('ok');
       $(this).fadeOut(10);
       $(this).parent().siblings('#replies').slideDown();

   }) ;

   $('.submit-reply').on('submit',function(e){
       e.preventDefault();
      $.ajax({
          type: 'POST',
          url: host_url+'reply/add',
          data: $(this).serialize(),

          success: function (data) {
              console.log(data);
              var reply='<div class="media"><a href="javascript:;" class="pull-left"><img src="assets/pages/img/people/img2-small.jpg" alt="" class="media-object">'+
                        '</a><div class="media-body"><div class="row"><h4 class="media-heading"><span>by '+
                        data['user_name']+'</span></h4></div><div class="row"><p>'+
                        data['reply']['body']+'</p></div> </div></div>';

                //console.log($(':focus').parent().parent().parent());
                $(':focus').parent().parent().parent().siblings('.rep_content').append(reply);
                //alert(data['reply']['body']);



          }

      });
   });

    $('.edit-comment').on('click',function(){

        var comment_id=$(this).parent().data('comment-id');
        var comment='<form class="edit-comment" role="form" action="#" method="post">'+
                    '<input type="hidden" name="_token" value="'+$('meta[name="_token"]').attr('content')+'"><div class="form-group"><textarea class="form-control need-tiny" rows="5" name="body">'+
            $(this).parent().parent().parent().siblings('.comment-body').data('comment')+'</textarea>'+
                '</div><p><button class="btn btn-primary" type="submit">Edit Answer</button> <button class="cancel-edit btn btn-primary" style="background-color: #6da9ff;" >Cancel</button></p></form>';

            //console.log($(this).parent().parent().parent().siblings('.comment-body').data('comment'));
        var notEditedComment= $(this).parent().parent().parent().parent();
        var notEditedCommentHtml=$(this).parent().parent().parent().parent().html();
            var cmntElement=$(this).parent().parent().parent().parent();
           $(this).parent().parent().parent().parent().html(comment);


        $('.cancel-edit').on('click',function (e) {
            e.preventDefault();

            cmntElement.html(notEditedCommentHtml);
            cmntElement.focus();

        });

        $('.edit-comment').on('submit',function (e) {
           e.preventDefault();
           $.ajax({
               type:'PUT',
               url:host_url+'comment/edit/'+comment_id,
               data: $(this).serialize(),
               success: function(data){
                   console.log(data);
                   notEditedComment.html(notEditedCommentHtml);
                   console.log(notEditedComment.children('.comment-body').html(data).data('comment',data));
                   //$(document).focus();
               }
           });
        });
    });

    $('.delete-comment').on('click',function(){

        var comment_id=$(this).parent().data('comment-id');

        var confirmDelete=confirm("Are you sure to delete?");

               if(confirmDelete==true){
                   $.ajax({
                      type:'DELETE',
                       url:host_url+'comment/delete/'+comment_id,
                       success:function(data){
                           console.log($(':focus').parent().parent().parent().parent().parent().parent().html(" "));

                       }
                   });
               }
    });


});