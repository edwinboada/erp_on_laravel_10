<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar solicitud de cobro (Creado por: {{$creator}})</h5>
          <button type="button" class="close" aria-label="Close" onclick='$("#editModal").modal("toggle")'>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                

                <div class="form-group col-sm-6">
                    <label>Empresa</label>
                    <select class="form-control" wire:model.defer="charge.company">
                        <option>-- Seleccione --</option>
                        @foreach ($companies as $c)
                            <option>{{$c}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label>Tipo de cobro</label>
                    <select class="form-control" wire:model.defer="charge.charge_type">
                        <option>-- Seleccione --</option>
                        <option>Ordinario</option>
                        <option>Extraordinario</option>
                    </select>
                </div>
            </div>
            <div class="row">
                
                <div class="form-group col-sm-6">
                    <label>Periodicidad</label>
                    <select class="form-control" wire:model="charge.periodicity">
                        <option>-- Seleccione --</option>
                        <option>Una vez</option>
                        <option>Recurrente</option>
                    </select>
                </div>

                @if(isset($charge['periodicity']) && $charge['periodicity']=="Una vez")
                <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Fecha</label>
                    <input type="date" class="form-control @error('charge.date') is-invalid @enderror" wire:model.debounce="charge.date" />
                </div>
                @endif
                @if(isset($charge['periodicity']) && $charge['periodicity']=="Recurrente")
                <div class="form-group col-sm-6">
                    <label>Día</label>
                    <select class="form-control @error('charge.day') is-invalid @enderror" wire:model.debounce="charge.day">
                        <option value="">-- Seleccione --</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Categorías</label>
                    <select class="form-control" wire:model.defer="charge.category">
                        <option>-- Seleccione --</option>
                        @foreach ($categories as $c)
                            <option>{{$c}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Monto</label>
                    <div style="display: flex">
                        <select class="form-control mb-3" style="width:110px" wire:model.debounce="charge.currency">
                            <option selected="" value="₡">₡ (Colón)</option>
                            <option value="$">$ (Dolar)</option>
                          </select>
                          <input type="number" class="form-control" placeholder="0.00" step="any" wire:model.defer="charge.amount">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Observación</label>
                    <textarea class="form-control" rows="3" placeholder="Observación" wire:model.defer="charge.observation"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    @livewire("components.charges.comprobantes")

                </div>
            </div>
        </div>
        <div class="modal-footer"><div class="mr-auto">
            @can("manage charges")
            @if(isset($charge['status']) && $charge['status'] == 0)
                <button type="button" class="btn btn-success" wire:click="setStatus(1)">Aprobar</button>
                <button type="button" class="btn btn-danger" wire:click="setStatus(2)">Rechazar</button>
            @endif
            @endcan
             @if(isset($charge['status']) && ($charge['status']==1 || $charge['status']==4))
            @can("manage charges")
                <button type="button" class="btn btn-warning" wire:click="setStatus(3)">Marcar como pagada</button>
            @endcan
            @endif
        </div>
          <button type="button" class="btn btn-secondary" onclick='$("#editModal").modal("toggle")'>Cancelar</button>
          <button type="button" class="btn btn-primary" wire:click="saveEdit">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  @push("scripts")
    <script>
        Livewire.on("ModalEdit",()=>{
            $("#editModal").modal("toggle");
        })
    </script>
  @endpush