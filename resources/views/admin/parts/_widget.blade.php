<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <div class="number">
                    <h6>CLIENTES <small> Todas las sucursales</small></h6>
                    <span>{{ $clientAllBranchCount }}</span>
                </div>
            </div>
            <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-Width="1" data-line-Color="#f79647" data-fill-Color="#fac091">
                @foreach ($clientAllBranchSum as $clientSum)
                {{ $clientSum->count }},
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <div class="number">
                    <h6>VENTAS MENSUALES<small> Todas las sucursales</small></h6>
                    <span>$ {{ $sellingAllBranchSum }}</span>
                </div>
            </div>
            <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-Width="1" data-line-Color="#604a7b" data-fill-Color="#a092b0">
                @foreach ($sellingAllBranchCount as $allBranch)
                {{ $allBranch->sum }},
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <div class="number">
                    <h6>VISITS</h6>
                    <span>$21,215</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-Width="1" data-line-Color="#4aacc5" data-fill-Color="#92cddc">1,4,2,3,1,5</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <div class="number">
                    <h6>LIKES</h6>
                    <span>$421,215</span>
                </div>
                <small class="text-muted">19% compared to last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-Width="1" data-line-Color="#4f81bc" data-fill-Color="#95b3d7">1,3,5,1,4,2</div>
        </div>
    </div> -->
    @if(empty(checkUserBranch()[1]))
    <div class="col-lg-12">
        <div class="body">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-warning"></i> Mientras este en la vista de todas las sucursales no podrá operar
            </div>
        </div>
    </div>
    @endif
    @include('alerts.error')
</div>
