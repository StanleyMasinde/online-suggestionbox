<div class="container">
        <div class="card">
            <div class="card-body">
                <div id="error-div">
                    <span>
                        <ul></ul>
                    </span>
                </div>
                <h3>Facualty of Human Resource</h3>
                <form id="agriculture-suggest-form" action="{{ url('suggestions') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="">Select</label>
                    <select class="form-control form-control-sm" name="college" id="">
                        <option value="School of Business">
                            School of Business
                        </option>
                        <option value="School of entrepreneurship, procurement and management">
                            School of entrepreneurship, procurement and management
                        </option>
                        <option value="School of Communication and development studies">
                            School of Communication and development studies
                        </option>
                    </select>
                    </div>
    
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm" name="title" id="title" title="Please give your suggestion a title" placeholder="suggestion title">
                    </div>
    
                    <div class="form-group">
                    <label for="suggestion">Suggestion</label>
                    <textarea class="form-control form-control-sm" name="suggestion" id="suggestion" title="Clearly state your suggestion" rows="3"></textarea>
                    </div>
    
                    <button type="submit" class="btn btn-success btn-lg btn-block">Suggest !</button>
                </form>
            </div>
        </div>
    </div>
    <script>
            $('form#agriculture-suggest-form').submit(function(event){
                event.preventDefault()
                var data = $(this).serializeArray()
                var errors = []
                var form = $(this)
                if (data[2].value === '') {
                    errors.push('Please Add A title')
                }
                if (data[3].value === '') {
                    errors.push('Suggestion cannot be empty')
                } else if(data[3].value.length <= 20 ) {
                    errors.push('Suggestion Too short')
                }
        
                if (errors.length == 0) {
                    $('div#error-div').removeClass('alert alert-danger border-danger').find('span').html('')
                    $.post(form.attr('action'),
                    {
                        _token : data[0].value,
                        school : data[1].value,
                        college : 'Facualty of Health Sciences',
                        title : data[2].value,
                        suggestion : data[3].value
                    }, function(response){
                        if (response === "OK") {
                            form.find('input,textarea').val('')
                            $('div#error-div').addClass('alert alert-success border-success').find('span').html('Thank you for your suggestion {{ Auth::user()->name }}')
                            window.setTimeout(function(){
                                form.parent().parent().parent().load('suggestions')
                                $('a#all, a#health-sciences, a#pure-applied, a#human-resource, a#engineering-tech, a#agriculture').removeClass('active')
                                $('a#all').addClass('active')
                            },2000)
                        }
                    }).fail(function(err){
                        bootbox.alert('Uh oh something\'s not right')
                    })
                } else {
                    $('div#error-div').removeClass('alert alert-danger border-danger').find('span').html('')
                    $('div#error-div').addClass('alert alert-danger border-danger').focus()
                    for (const err of errors) {
                        $('#error-div').find('span').append('<li>' +err+ '</li>')
                    }
                }
            })
        </script>