<html>
    @include('partials.head')
        @yield('head')

    <body>

    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}

    @include('partials.nav')
        @yield('navbar')

        <div class="row" style="padding-top: 10px">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{url('blog/add')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable>Add Title</lable>
                        <input  type="text" name="title" class="form-control">

                    </div>

                    add featured photo....
                    <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">

                    <textarea name="body" id="" cols="20" rows="30"></textarea>
                    <br>
                    <div class="form-control">
                        <select name="category" id="">
                            <option value="java">java</option>
                            <option value="c++">c++</option>
                            <option value="other">other</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success" >

                </form>
            </div>

            
        </div>



    @include('partials.footer')
        @yield('footer')
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
//alert(field_name);
                var cmsURL = '../laravel-filemanager?field_name=' + field_name;
               // '../laravel-filemanager?field_name=' + field_name
                //alert(cmsURL);
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                //alert(cmsURL);
                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    </body>


</html>