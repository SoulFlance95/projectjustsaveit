@extends('layouts.admin')
@section('content')


  

      <div class="container-fluid">
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">En cours</h5>
                      <span class="h2 font-weight-bold mb-0">
                        
                        
                        @foreach ($commandes as $commande)
                        @if($commande->slug=="processing")
                        {{$commande->total}}
                        </span>
                      
                       @endif
                   @endforeach
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                     Commandes en cours
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Annulées</h5>
                      <span class="h2 font-weight-bold mb-0">
                        @foreach ($commandes as $commande)
                        @if($commande->slug=="cancelled")
                        {{$commande->total}}
                        </span>
                       
                       @endif
                   @endforeach
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                     Commmandes annulées
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">En attente</h5>
                      <span class="h2 font-weight-bold mb-0">
                       
                        @foreach ($commandes as $commande)
                        @if($commande->slug=="pending")
                        {{$commande->total}}
                        </span>
                       
                       @endif
                   @endforeach
                      
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    Commandes en attente
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Finalisées</h5>
                      <span class="h2 font-weight-bold mb-0">
                        @foreach ($commandes as $commande)
                        @if($commande->slug=="completed")
                        {{$commande->total}}
                        </span>
                       
                       @endif
                   @endforeach
                      
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    Commandes finalisées
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
      <div class="card mt-5">

    <div class="card-header text-center"><h5>Statistiques détaillées des commandes</h5> </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable datatable-Asset">
        <tbody>
          <thead>
            <tr>
                <th >
                 ID
                </th>
                <th>
                    Nom
                </th>
                <th>
                  Date d'inscription
              </th>
                <th >
                   
                    Statut

                </th>
              
                <th>
                  Commandes traitées
                  </th>
               
              
                <th>
                   Actions
                </th>
            </tr>
        </thead>
        </tbody>
         <tbody>
          <tbody>
             <tr>
             
                @foreach($users as $key => $user)
                <tr data-entry-id="{{ $user->id }}">
                  
                    <td>
                        {{ $user->id ?? '' }}
                    </td>
                    <td>
                        {{ $user->name ?? '' }}
                    </td>
                     <td>
                      {{$user->created_at}}
                     </td>
                    
                <td>
                  @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                </td>
                <td>

                </td>
                <td>
                 <a href="#" class="btn btn-primary">Détails</a>
                </td>    
              @endforeach
             
          
            
             </tr>

                    
         </tbody>
        
    </div>
      
  </div>
</div>
</div>


@endsection



<style>
    
    h2,
h5,
.h2,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h5,
.h5 {
  font-size: .8125rem;
}

@media (min-width: 992px) {
  
  .col-lg-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}

@media (min-width: 1200px) {
  
  .col-xl-3 {
    max-width: 25%;
    flex: 0 0 25%;
  }
  
  .col-xl-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}


.bg-danger {
  background-color: #f5365c !important;
}



@media (min-width: 1200px) {
  
  .justify-content-xl-between {
    justify-content: space-between !important;
  }
}


.pt-5 {
  padding-top: 3rem !important;
}

.pb-8 {
  padding-bottom: 8rem !important;
}

@media (min-width: 768px) {
  
  .pt-md-8 {
    padding-top: 8rem !important;
  }
}

@media (min-width: 1200px) {
  
  .mb-xl-0 {
    margin-bottom: 0 !important;
  }
}




.font-weight-bold {
  font-weight: 600 !important;
}


a.text-success:hover,
a.text-success:focus {
  color: #24a46d !important;
}

.text-warning {
  color: #fb6340 !important;
}

a.text-warning:hover,
a.text-warning:focus {
  color: #fa3a0e !important;
}

.text-danger {
  color: #f5365c !important;
}

a.text-danger:hover,
a.text-danger:focus {
  color: #ec0c38 !important;
}

.text-white {
  color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
  color: #e6e6e6 !important;
}

.text-muted {
  color: #8898aa !important;
}

@media print {
  *,
  *::before,
  *::after {
    box-shadow: none !important;
    text-shadow: none !important;
  }
  
  a:not(.btn) {
    text-decoration: underline;
  }
  
  p,
  h2 {
    orphans: 3;
    widows: 3;
  }
  
  h2 {
    page-break-after: avoid;
  }
  
  @ page {
    size: a3;
  }
  
  body {
    min-width: 992px !important;
  }
}

figcaption,
main {
  display: block;
}

main {
  overflow: hidden;
}

.bg-yellow {
  background-color: #ffd600 !important;
}






.icon {
  width: 3rem;
  height: 3rem;
}

.icon i {
  font-size: 2.25rem;
}

.icon-shape {
  display: inline-flex;
  padding: 12px;
  text-align: center;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
}




</style>