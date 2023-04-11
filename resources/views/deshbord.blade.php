<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-6">
        Hello {{Auth::user()->name}}
      </div>
      <div class="col-sm-6">
        <button class="btn btn-success" id="add"> Add + </button>
      </div>
    </div>
  </div>
  <div class="card-body">
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif

  @if(session()->has('error'))
      <div class="alert alert-danger">
          {{ session()->get('error') }}
      </div>
  @endif
    <table class="table" id="cdatatable">
      <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>DOB</th>
            <th>Country</th>
            <th>About You</th>
            <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script type="text/javascript">
  // alert('hi');
     $('#cdatatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        ajax: '{!! route('customer.data') !!}',
        columns: [
            {data: 'name', name: 'name'},
            {data:'email',name:'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'DOB', name: 'DOB'},
            {data: 'country', name: 'country'},
            {data: 'about_you', name: 'about_you'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#delete',function(){
      id = $(this).val();
      $.confirm({
          title: 'Delete Executive',
          content: 'Are You Sure Delete This Record ? ',
          autoClose: 'cancel|5000',
          buttons: {
              cancel: function () {
  
              },
              Delete: {
                  btnClass: 'btn-danger',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = '{{URL::to("delete")}}'+'/'+id;
                  }
              }
          }
      });
    });
    $(document).on('click','#add',function(){
      html = '';
      html += '<div class="row">';
      html += '<div class="col-sm-6">';
      html += '<div class="mb-3">';
      html += '<label for="name" class="form-label">Name </label>';
      html += '<input type="text" class="form-control" id="name" name="name" aria-describedby="">';
      html += '</div>';
      html += '<div class="mb-3">';
      html += '<label for="email" class="form-label">Email address</label>';
      html += '<input type="text" class="form-control" id="email" name="email" aria-describedby="">';
      html += '</div>';
      html += '<div class="mb-3">';
      html += '<label for="mobile" class="form-label">Mobile </label>';
      html += '<input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="">';
      html += '</div>';
      html += '</div>';
      html += '<div class="col-sm-6">';
      html += '<div class="mb-3">';
      html += '<label for="DOB" class="form-label">DOB </label>';
      html += '<input type="date" class="form-control" id="DOB" name="DOB" aria-describedby="">';
      html += '</div>';
      html += '<div class="mb-3">';
      html += '<label for="country" class="form-label">Country </label>';
      html += '<input type="text" class="form-control" id="country" name="country" aria-describedby="">';
      html += '</div>';
      html += '<div class="mb-3">';
      html += '<label for="aboutyou" class="form-label">About You </label>';
      html += '<input type="text" class="form-control" id="aboutyou" name="aboutyou" aria-describedby="">';
      html += '</div>';
      html += '</div>';
      html += '</div>';


 
      $.confirm({
        title: "Add New Customer",
        content: html,
        boxWidth: '600px',
        useBootstrap: false,
        buttons: {
              cancel: function () {
              },
              Add: {
                  btnClass: 'btn-blue',
                  keys: ['enter'],
                  action: function(){
                    $.ajax({
                      url : "{{route('customer.save')}}",
                      method : "POST",
                      data : {
                        "_token": "{{ csrf_token() }}",
                        'name' : $('#name').val(),
                        'email' : $('#email').val(),
                        'mobile' : $('#mobile').val(),
                        'DOB' : $('#DOB').val(),
                        'country' : $('#country').val(),
                        'aboutyou' : $('#aboutyou').val(),
                      },
                      success:function(response){
                        if (response.status == 1) {
                          $.alert({
                            title: 'Success',
                            content: 'New Customer Added Successfully',
                            type: 'green',
                            typeAnimated: true,
                          });
                          location.reload();
                        }
                        else{
                          $.alert({
                            title: 'Error',
                            content: response.message,
                            type: 'red',
                            typeAnimated: true,
                          });
                        }
                      },
                    });
                  }
              }
          }
      });
    });
    $(document).on('click','#edit',function(){
      id = $(this).val();
      $.ajax({
        url : "{{route('data')}}",
        type : "POST",
        data:{
          "_token": "{{ csrf_token() }}",
          "id" : id
        },
        success:function(response){
          html = '';
          html += '<div class="row">';
          html += '<div class="col-sm-6">';
          html += '<div class="mb-3">';
          html += '<label for="name" class="form-label">Name </label>';
          html += '<input type="text" class="form-control" id="name" value="'+response.data.name+'" name="name" aria-describedby="">';
          html += '</div>';
          html += '<div class="mb-3">';
          html += '<label for="email" class="form-label">Email address</label>';
          html += '<input type="text" class="form-control" id="email" value="'+response.data.email+'"  name="email" aria-describedby="">';
          html += '</div>';
          html += '<input type="hidden" class="form-control" id="id" value="'+response.data.id+'"  name="id" aria-describedby="">';
          html += '<div class="mb-3">';
          html += '<label for="mobile" class="form-label">Mobile </label>';
          html += '<input type="text" class="form-control" id="mobile" value="'+response.data.mobile+'"  name="mobile" aria-describedby="">';
          html += '</div>';
          html += '</div>';
          html += '<div class="col-sm-6">';
          html += '<div class="mb-3">';
          html += '<label for="DOB" class="form-label">DOB </label>';
          html += '<input type="date" class="form-control" id="DOB" value="'+response.data.DOB+'"  name="DOB" aria-describedby="">';
          html += '</div>';
          html += '<div class="mb-3">';
          html += '<label for="country" class="form-label">Country </label>';
          html += '<input type="text" class="form-control" id="country" value="'+response.data.country+'"  name="country" aria-describedby="">';
          html += '</div>';
          html += '<div class="mb-3">';
          html += '<label for="aboutyou" class="form-label">About You </label>';
          html += '<input type="text" class="form-control" id="aboutyou" value="'+response.data.about_you+'"  name="aboutyou" aria-describedby="">';
          html += '</div>';
          html += '</div>';
          html += '</div>';
          $.confirm({
            title: "Update Customer",
            content: html,
            boxWidth: '600px',
            useBootstrap: false,
            buttons: {
                  cancel: function () {
                  },
                  Update: {
                      btnClass: 'btn-blue',
                      keys: ['enter'],
                      action: function(){
                        $.ajax({
                          url : "{{route('customer.update')}}",
                          method : "POST",
                          data : {
                            "_token": "{{ csrf_token() }}",
                            'name' : $('#name').val(),
                            'email' : $('#email').val(),
                            'mobile' : $('#mobile').val(),
                            'DOB' : $('#DOB').val(),
                            'country' : $('#country').val(),
                            'aboutyou' : $('#aboutyou').val(),
                            'id' : $('#id').val(),
                          },
                          success:function(response){
                            if (response.status == 1) {
                              $.alert({
                                title: 'Success',
                                content: 'Customer Update Successfully',
                                type: 'green',
                                typeAnimated: true,
                              });
                              location.reload();
                            }
                            else{
                              $.alert({
                                title: 'Error',
                                content: response.message,
                                type: 'red',
                                typeAnimated: true,
                              });
                            }
                          },
                        });
                      }
                  }
              }
          });
        },
      });
    });
  });
</script>