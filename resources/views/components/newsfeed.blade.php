<div id="scrollable">
    <div class="to-append">
        @foreach ($suggestions as $suggestion) <br>
        <div id="to-append">
            <div id="infinite-scroll" class="card">
                    <div class="card-body">
                        <div class="card-title">
                            @if (Auth::user()->id === $suggestion->user_id)
                                <h3><a class="text-success" href="#"><i class="fas fa-pencil-alt"></i></a>   <a class="text-danger" href="#"><i class="fas fa-trash-alt"></i></a></h3>
                            @endif
                            <h4 class="h4">{{ $suggestion->title }}</h4>
                            <div class="hr-dark"></div>
                            <small><em>by {{ $suggestion->user->name }}</em></small>
                        </div>
                        <b>College :</b> {{ $suggestion->college }}
                        <b>School :</b> {{ $suggestion->school }}
                        <p>
                            {{ $suggestion->suggestion }}
                        </p>
                        <small>{{ date('D d M', strtotime($suggestion->created_at)) }}</small>
                        <div class="hr-dark"></div>
                        <!--Comments and likes-->
                        <div class="row">
                        <div class="col-lg-4">
                            <h3><a onclick="print()" id="upvote" href="{{ $suggestion->id }}"><i class="fas fa-thumbs-up"></i></a> <em>{{ count($suggestion->likes) }}</em> <a href="#"><i class="fas fa-thumbs-down"></i></a></h3>
                        </div>
                        <div class="col-lg-4">
                            <h3> <a id="downvote" href="#"><i class="fas fa-comments"></i></a> <em>{{ count($suggestion->comments) }}</em> </h3>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('a').click(function(e){
                    e.preventDefault()
                    $.post('likes', 
                    {
                        data : $(this).attr('href')
                    }, function(response){
                        console.log(response)
                    })
                })
            </script>
        </div> <br>
        @endforeach
        {{ $suggestions->links() }}
        <script>
            $('ul.pagination').hide()
        </script>
    </div>
</div>
<br>


<div class="page-load-status">
    <div class="infinite-scroll-request">
        <div class="loader-ellips">
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
        </div>          
    </div>
    <div class="infinite-scroll-last border-warning">
        <div class="alert alert-warning" role="alert">
            <strong>No more suggestions found :(</strong>
        </div>
    </div>
    <p class="infinite-scroll-error">No more pages to load</p>
</div>  
<script>
    $('ul.pagination').hide()
    $('#scrollable').infiniteScroll({
        path: 'a.page-link',
        append : 'div.to-append',
        history : false,
        status : '.page-load-status'
    });
</script>
