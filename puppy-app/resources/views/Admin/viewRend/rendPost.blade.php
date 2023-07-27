<link rel="stylesheet" href="{{ asset('css/crud.css') }}">
<table class="table table-striped table-hover viewRender">
    <thead>
        <tr>
            <tr>
                <th>ID:</th>
                <th>Post Name:</th>
                <th>Images:</th>
                <th>Describe:</th>
                <th>Status:</th>
                <th>Create_at:</th>
                <th>D&U</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @if (count($cate_posts) > 0)
            @foreach ($cate_posts as $key => $val)
                <tr>
                    <td>{{ $key + 1 }} </td>
                    <td>{{ $val->post_name }}</td>
                    <td><img src="/upload/images/{{ $val->images }}" style="width:100px; height:100px;"></td>
                    <td hieght="200px" width="400px">{!! $val->describe_p !!} </td>
                    {{-- <td hieght="100px" width="400px">{{ $val->content }} </td> --}}

                    {{-- 0:on 
        -- 1:off --}}
                    <td>
                        <?php
            if($val->post_status == 0){
            ?>
                        <a href="{{ route('unactive_post', ['pos_id' => $val->post_ID]) }} "><span
                                style="color:rgb(28, 212, 44);font-size:2.3em;"
                                class="fa-thumbs-styling fa fa-thumbs-up"></span></a>
                        <?php
            }else{
            ?>
                        <a href="{{ route('active_post', ['pos_id' => $val->post_ID]) }} "><span
                                style="color:red;font-size:2.3em;"class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                        <?php
            } ?>
                    </td>
                    <td>{{ $val->create_at }} </td>
                    <td>
                        <a href="{{ route('edit_post', ['post_id' => $val->post_ID]) }}"> <i
                                class="fa fa-pencil-square-o text-success text-activite"> </i>
                        </a>
                        <a onclick="return confirm('Are you sure?');"
                            href="{{ route('delete_post', ['post_id' => $val->post_ID]) }}"> <i
                                class="fa fa-times text-danger text"> </i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                There is no Post
            </div>
        @endif
    </tbody>
</table>

{{-- Ajax Search --}}
<script>
    $("#searchPost").keyup(function() {
        var vsearch = $("#searchPost").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                type: "POST",
                url: "{{ route('ajsearchPost') }}",
                data: {
                    vsearch: vsearch
                },
            })
            .done(function(data) {
                $('.table-data').html(data);
            })
    });
</script>


{{-- Ajax Checked --}}
<script>
    $(document).on('click', 'input[name="selectAll"]', function() {
        if (this.checked) {
            $('input[name="selectBox"]').each(function() {
                this.checked = true;
            });
        } else {
            $('input[name="selectBox"]').each(function() {
                this.checked = false;
            });
        }
        toggledeleteAllBtn();
    });

    $(document).on('change', 'input[name="selectBox"]', function() {

        if ($('input[name="selectBox"]').length == $('input[name="selectBox"]:checked').length) {
            $('input[name="selectAll"]').prop('checked', true);
        } else {
            $('input[name="selectAll"]').prop('checked', false);
        }
        toggledeleteAllBtn();
    });


    function toggledeleteAllBtn() {
        if ($('input[name="selectBox"]:checked').length > 0) {
            $('a#deleteAllBtn').text('Delete (' + $('input[name="selectBox"]:checked').length + ')');
        } else {
            $('a#deleteAllBtn').text('Delete All');
        }
    }

    $(document).on('click', 'a#deleteAllBtn', function() {
        var checkedPost = [];
        $('input[name="selectBox"]:checked').each(function() {
            checkedPost.push($(this).val());
        });
        if (checkedPost.length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    type: "Post",
                    url: "{{ route('ajdeletePost') }}",
                    data: {
                        valDelete: checkedPost
                    },
                })
                .done(function(data) {
                    location.reload();
                });
        } else {
            alert("Please Select At Least 1 Row");
        }
    });
</script>
