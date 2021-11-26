<div>
        <div class="mb-3 row">
          <label for="code module" class="col-sm-2 col-form-label">code module</label>
          <div class="col-sm-10 d-flex" >
            <input type="text" class="form-control" id="code module"  wire:model.lazy="codeM"  name="codeM">
            <button class="btn btn-dark mt-2 mx-5" wire:click="search" type="button" {{ $search_disabled }}>Rechercher</button>
          </div>
        </div>
          <div class="mb-3 row">
              <label for="libellè" class="col-sm-2 col-form-label">libellè</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="libellè" name="libellè" wire:model.lazy='module.libelléM' disabled>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="coef" class="col-sm-2 col-form-label">coefficient</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="coef" name="coef" wire:model.lazy='module.coef' disabled>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="section" class="col-sm-2 col-form-label">Enseignant</label>
              <div class="col-sm-10">
                <select type="text" class="form-select" id="section"  wire:model.lazy='module.codeEns' name="enseignant" disabled>
                  @foreach ($enseignants as $enseignant )
                  <option value="{{ $enseignant->codeEns }}">{{ $enseignant->nomEns.' '.$enseignant->prénomEns }}</option>
                  @endforeach
                </select>
              </div>
          </div>
          @if (session()->has('message_non_valide'))
          <h3 class="alert alert-danger mt-5 " role="alert">
            {{ session('message_non_valide') }}
          </h3>
          @endif
          @if (session()->has('message_valide'))
          <h3 class="alert alert-success mt-5" role="alert">
            {{ session('message_valide') }}
          </h3>
          @endif
          <div style="display: flex; align-items:center; justify-content:center; margin-top:100px">
            <div >
              <button type="button"  class="btn btn-dark" wire:click='submit' {{ $disabled }}>Supprimer</button>
            </div>
          </div>
          @if (session()->has('submit'))
          <div class="alert alert-warning mt-5 text-center" role="alert">
            <h3>{{ session('submit') }}</h3>
            <div class="d-flex justify-content-around">
              <button class="btn btn-dark mt-2"  type="submit">Oui</button>
              <button class="btn btn-dark mt-2"  type="button" wire:click="no">Non</button>
            </div>
          </div>  
          @endif
    
          @if (session()->has('yes'))
          <div class="alert alert-warning mt-5 text-center" role="alert">
            <h3>{{ session('yes') }}</h3>
            <div class="d-flex justify-content-around">
              <a href="{{ route('module.delete') }}" class="btn btn-dark mt-2">Ok</a>
            </div>
          </div>  
          @endif
    
          @if (session()->has('no'))
          <div class="alert alert-warning mt-5 text-center" role="alert">
            <h3>{{ session('no') }}</h3>
            <div class="d-flex justify-content-around">
              <a href="{{ route('module.delete') }}" class="btn btn-dark mt-2" >Ok</a>
            </div>
          </div>  
          @endif
        </div>