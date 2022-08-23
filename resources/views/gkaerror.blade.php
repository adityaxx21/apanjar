<html lang="en">

<head>
    <title>Laravel 8 Multiple File Upload Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="container lst">


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="well">Laravel 8 Multiple File Upload - ItSolutionStuff.com</h3>

        <form action="halaman_admin" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group hdtuto control-group lst increment">
                <input type="file" name="gambar[]" class="myfrm form-control">
            </div>
            
            <div class="input-group hdtuto control-group lst increment">
                <input type="file" name="gambar[]" class="myfrm form-control">
            </div>
            
            <input type="text" name="nama_item">
            <input type="text" name="harga">
            <input type="text" name="deskripsi">

            <select name="jenis_id" id="">
                @forelse ($jenis as $item)
                    <option value="{{$item->id}}">{{$item->jenis}}</option>
                @empty
                    
                @endforelse
            </select>
            <input type="hidden" name="user_id" value="1">
            {{-- <input type="hidden" name="created_at" value="{{ date('Y-m-d H:i:s') }}"> --}}
            <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });
        });
    </script>

    <form action="halaman_admin/3" method="post" enctype="multipart/form-data">
    @csrf
    @method("DELETE")
    <button type="submit"> Coba Hapus </button>
    </form>
</body>

</html>
