@section('page-title')
    {{__('Charges Pending')}}
@endsection
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <card title="Solicitudes de cobro" theme="dark" class="mt-3" wire:init="checkCharge">
        <div name="toolsSlot">
            {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal" wire:click="$set('payment',[])">Crear nueva solicitud</button> --}}
            {{-- <button class="btn btn-warning btn-sm" wire:click="$refresh">Reload</button> --}}
        </div>

        <div class="col-12">
            <div class="icheck-info d-inline">
                <input type="checkbox" id="checkboxPrimary2" wire:model="status" value="1" wire:loading.attr="disabled">
                <label for="checkboxPrimary2">
                No cobrado
                </label>
            </div>


            <div class="icheck-success d-inline">
                <input type="checkbox" id="checkboxPrimary3" wire:model="status" value="3" wire:loading.attr="disabled">
                <label for="checkboxPrimary3">
                Cobrado
                </label>
            </div>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary5" wire:model="status" value="4" wire:loading.attr="disabled">
                <label for="checkboxPrimary5">
                Vencido
                </label>
            </div>

        </div>
        
        <div class="table-responsive">
            <table class=" table-striped table-hover" id="tabla" style="width:100%;cursor:pointer">
                <thead>
                <tr>
                    <th class="">Creado el</th>
                    <th class="">Vencimiento</th>
                    <th class="">Empresa</th>
                    <th class="">Tipo de pago</th>
                    <th class="">Periodicidad</th>
                    <th class="">Categoría</th>
                    <th class="">Monto del pago</th>
                    <th class="">Creado por</th>
                    <th class="">Status</th>
                </tr>
                </thead>
                <tbody>
                    @php
                            function status($st){
                                $r = [];
                                switch($st){
                                    case 0:
                                        $r = [
                                            "badge"=>"warning",
                                            "label"=>"Pendiente"
                                        ];
                                    break;
                                    case 1:
                                    $r = [
                                            "badge"=>"info",
                                            "label"=>"No cobrado"
                                        ];
                                    break;
                                    case 2:
                                    $r = [
                                            "badge"=>"danger",
                                            "label"=>"Rechazado"
                                        ];
                                    break;
                                    case 3:
                                    $r = [
                                            "badge"=>"success",
                                            "label"=>"Cobrado"
                                        ];
                                    break;
                                    case 4:
                                    $r = [
                                            "badge"=>"secondary",
                                            "label"=>"Vencido"
                                        ];
                                    break;
                                }
                                return '<small class="badge badge-'.$r['badge'].'">'.$r['label'].'</small>';
                            }

                        @endphp
                @forelse ($items as $item)
                    <tr style="cursor:pointer" wire:click="editModal({{$item->id}})">
                        <td>{{$item->created_at}}</td>
                        <td class="">@if($item->date){{ \Carbon\Carbon::parse($item->date)->format("d/m/Y")}} @endif @if($item->day) Día {{$item->day}} de cada mes @endif</td>
                        <td class="">{{$item->company}}</td>
                        <td class="">{{$item->charge_type}}</td>
                        <td class="">{{$item->periodicity}}</td>
                        <td class="">{{$item->category}}</td>
                        <td class="">{{$item->currency}} {{$item->amount}}</td>
                        <td>{{$item->user->name}}</td>
                        <td class="">{!! status($item->status) !!}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </card>
    @include("livewire.components.charges.view.editModal")
</div>
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush
