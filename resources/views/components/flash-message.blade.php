
  @foreach ($errors->all() as $message)
      <div class="alert alert-danger alert-dismissable">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endforeach
  @if(session()->has('message_success'))
    <script type="text/javascript">
      swal({
        title: "Success!",
        text: "{{ session()->get('message_success') }}",
        icon: "success",
        button: "OK",
      })
    </script>
  @endif
  @if(session()->has('message_error'))
    <script type="text/javascript">
      swal({
        title: "Failed!",
        text: "{{ session()->get('message_error') }}",
        icon: "error",
      })
    </script>
  @endif
