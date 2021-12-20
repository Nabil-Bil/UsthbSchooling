<div>
    @if ($errors->any())
        <h3 class="alert alert-danger mt-5" role="alert">
          {{ $errors->first()}}
        </h3>
      @endif
        <div class="mb-3 row">
          <label for="matricule" class="col-sm-2 col-form-label">Matricule</label>
          <div class="col-sm-10 d-flex">
            <input type="text" class="form-control" id="matricule"  wire:model.lazy="matricule"  name="matricule" {{ $matricule_readonly }}>
            <button class="btn btn-dark mt-2 mx-5" wire:click="search" type="button" {{ $search_disabled }}>Rechercher</button>
          </div>
        </div>
          <div class="mb-3 row">
              <label for="nom" class="col-sm-2 col-form-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom" wire:model.lazy='etudiant.nom' {{ $readonly }}>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="prénom" class="col-sm-2 col-form-label">Prénom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prénom" name="prénom" wire:model.lazy='etudiant.prénom' {{ $readonly }}>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="section" class="col-sm-2 col-form-label">Section</label>
              <div class="col-sm-10">
                <select type="text" class="form-select" id="section"  wire:model.lazy='etudiant.codeS' name="section">
                  @foreach ($sections as $section )
                  <option value="{{ $section->codeS }}">{{ $section->libellé }}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="mb-3 row">
              <label for="groupe" class="col-sm-2 col-form-label" >Groupe</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="groupe" name="groupe" wire:model.lazy='etudiant.groupe' {{ $readonly }}>
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
              <button type="button"  class="btn btn-dark" wire:click='submit' {{ $disabled }}>Modifier</button>
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
              <a href="{{ route('etudiant.edit') }}" class="btn btn-dark mt-2">Ok</a>
            </div>
          </div>  
          @endif
    
          @if (session()->has('no'))
          <div class="alert alert-warning mt-5 text-center" role="alert">
            <h3>{{ session('no') }}</h3>
            <div class="d-flex justify-content-around">
              <a href="{{ route('etudiant.edit') }}" class="btn btn-dark mt-2" >Ok</a>
            </div>
          </div>  
          @endif
        </div>