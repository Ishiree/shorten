<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="jumbotron bg-success">
                <div class="container">
                  <h1 class="display-4">Assalamu'alaikum...</h1>
                  <p class="lead">This is Shorten <strong>Griya</strong>... Lets Make A Lots of Shortener Link for Easiest Management.</p>
                </div>  
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        
            <div class="card text-center shadow-sm" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Jumlah Platform</h5>
                <hr>
                <br>
                <br>
                <h3 class="display-3 card-text">{{ $countPlatform }}</h3>
                <br>
                <br>
                    <a href="#" class="btn btn-block btn-success">List Platform</a>
            </div>
            </div>
        
            <div class="card text-center shadow-sm" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Jumlah URL</h5>
                <hr>
                <br>
                <br>
                <h3 class="display-3 card-text">{{ $countUrl }}</h3>
                <br>
                <br>
                    <a href="#" class="btn btn-block btn-success">List URL</a>
            </div>
        </div>
        
            <div class="card text-center shadow-sm" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Visit</h5>
                <hr>
                <br>
                <br>
                <h3 class="display-3 card-text">{{ $sumVisit }}</h3>
                <br>
                <br>
                
                <a href="#" class="btn btn-block btn-success">List URL</a>
                
            </div>
            </div>
        
    </div>
</div>
