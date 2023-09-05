<div class="card">
    <div class="header">
        <h2>Filtro</h2>
    </div>
    <div class="body">
        <form method="post" action="{{ route('search.move') }}">
            <div class="row">
                @csrf
                <div class="col-lg-6 col-md-12">
                    <label>Fecha Desde</label>
                    <div class="input-group mb-3">
                        <input data-provide="datepicker" name="dateFrom" data-date-autoclose="true" class="form-control" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label>Fecha Hasta</label>
                    <div class="input-group mb-3">
                        <input data-provide="datepicker" name="dateEnd" data-date-autoclose="true" class="form-control" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-secondary">Buscar Movimientos</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
