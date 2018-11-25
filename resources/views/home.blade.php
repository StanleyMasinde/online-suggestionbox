@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="">
                    <nav class="breadcrumb">
                        <a id="all" href="suggestions" class="breadcrumb-item active">All Suggestions</a>
                        <a id="health-sciences" class="breadcrumb-item" href="health-science">Health Sciences</a>
                        <a id="pure-applied" class="breadcrumb-item" href="pure-applied">Pure And Applied Sci</a>
                        <a id="human-resource" class="breadcrumb-item" href="human-resource">Human Resource And Development</a>
                        <a id="engineering-tech" class="breadcrumb-item" href="engineering-tech">Engineering And Technology</a>
                        <a id="agriculture" class="breadcrumb-item" href="agriculture">Agriculture</a>
                    </nav>
                    <div class="container-fluid">
                    <div id="main-content"></div> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('div#main-content').load('suggestions');
    $('a#all, a#health-sciences, a#pure-applied, a#human-resource, a#engineering-tech, a#agriculture').click(function(e){
        e.preventDefault()
        $('a#all, a#health-sciences, a#pure-applied, a#human-resource, a#engineering-tech, a#agriculture').removeClass('active')
        $(this).addClass('active')
        $('div#main-content').load($(this).attr('href'))
    })
</script>
@endsection
