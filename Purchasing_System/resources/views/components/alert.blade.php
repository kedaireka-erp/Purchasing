@if (session()->has('success'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <div class="d-flex justify-content-between">
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
@elseif (session()->has('teredit'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container-fluid">
            <div class="alert alert-warning" role="alert">
                <div class="d-flex justify-content-between">
                    <div>{{ session('teredit') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
@elseif (session()->has('terhapus'))
    <div id="alert" style="margin-top:20px;margin-bottom:10px">
        <div class="container-fluid">
            <div class="alert alert-danger" role="alert">
                <div class="d-flex justify-content-between">
                    <div>{{ session('terhapus') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
@endif
