@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header text-center">
         <h3>Liste des commandes</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Asset">
                <thead>
                    <tr>
                        <th >
                         ID
                        </th>
                        <th>
                            Prénom
                        </th>
                        <th>
                            Nom
                        </th>
                        
                        <th>
                          Adresse
                        </th>
                        <th>
                           Ville
                          </th>
                        <th >
                            Email
                        </th>
                        <th >
                            Téléphone
                        </th>
                        <th>
                            Total
                        </th>
                       
                           
                        <th>
                            Date de paiement
                          </th>
                         
                        <th>
                            État
                           </th>
                        
                        <th>
                           Opérations
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        <tr data-entry-id="{{ $commande->id}}"
                            >
                               
                            <td>
                                {{ $commande->id ?? '' }}
                            </td>
                          
                            <td>
                                {{ $commande->billing->first_name ?? '' }}
                            </td>
                          
                            <td>
                                {{ $commande->billing->last_name ?? '' }}
                            </td>

                            <td>
                                {{ $commande->billing->address_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commande->billing->city ?? '' }}
                            </td>
                            <td style="width:10">
                                {{ $commande->billing->email ?? '' }}
                            </td>
                            <td>
                                {{ $commande->billing->phone ?? '' }}
                            </td>
                          
                            <td>
                               <h6>{{ $commande->total ?? '' }}</h6>  <span style="color:"> {{ $commande->currency?? '' }}</span>
                         </td>
                            <td>
                                {{ $commande->date_paid ?? '' }}
                            </td>
                           
                            <td class="@if($commande->status=='processing'){{'text-green'}}
                                  @elseif($commande->status=='cancelled'){{'text-red'}}
                                  @endif
                                ">
                               
                               <h6> {{ $commande->status ?? '' }}</h6>
                                 
                            
                            
                                
                         </td>
                      
                      
                      
                    
                        
                        
                            <td>
                                @can('asset_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.commandes.show', $commande->id) }}">
                                        Voir
                                    </a>
                                @endcan

                            
                                @can('asset_edit')
                                <a class="btn btn-xs btn-info" href="\print?name={{$commande->billing->first_name}}  {{ $commande->billing->last_name }}">
                                    Imprimer
                                </a>
                                <a class="btn btn-xs btn-info" href="{{route('admin.commandes.imprimer')}}" target="_blank">
                                    Menu d'impression
                                </a>
                            @endcan


                            </td>

                        </tr>

                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asset_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Asset:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>

<style>
    .text-green{
        color:green;
    }
    .text-red{
        color:red;
    }
</style>
@endsection
