@if (session()->has('success'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    </div>
@elseif (session()->has('teredit'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container">
            <div class="alert alert-warning" role="alert">
                {{ session('teredit') }}
            </div>
        </div>
    </div>
@elseif (session()->has('terhapus'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container">
            <div class="alert alert-danger" role="alert">
                {{ session('terhapus') }}
            </div>
        </div>
    </div>
@endif
