<div class="row clearfix">
    <div class="col-lg-4 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon text-danger"><i class="fa fa-arrow-down"></i> </div>
                <div class="content">
                    <div class="text">Ingresos</div>
                    <h5 class="number">${{ $incomeWidget }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon text-primary"><i class="fa fa-arrow-up"></i> </div>
                <div class="content">
                    <div class="text">Gastos</div>
                    <h5 class="number">${{ $billWidget }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card top_counter">
            <div class="body">
                <div class="icon"><i class="fa fa-dollar"></i> </div>
                <div class="content">
                    <div class="text">Posición Consolidada</div>
                    <h5 class="number">${{ $incomeWidget - $billWidget }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
