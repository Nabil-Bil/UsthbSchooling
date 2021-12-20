<div class="overflow-hidden">
    @include('partials.navbar')
        <div class="row">
            <div class="col"></div>
            <div class="col" style="margin: 30px;">
                <div class="row" style="margin: 48;">
                    <div class="col " style="margin: 18px;width: 210.797px;"><span>Code module</span></div>
                </div>
            </div>
            <div class="col">
                <div class="row" style="margin: 30px;">
                    <div class="col" style="margin: 18px;width: 210.797px;"><span>{{ $code_module }}</span></div>
                </div>
            </div>
            <div class="col"><button class="btn btn-success" data-bss-hover-animate="pulse" type="button" style="margin: 43px;" wire:click='nextModule'>Suivant</button></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col" style="margin: 30px;">
                <div class="row" style="margin: 48;">
                    <div class="col" style="margin: 18px;width: 210.797px;"><span>Code Libellé</span></div>
                </div>
            </div>
            <div class="col">
                <div class="row" style="margin: 30px;">
                    <div class="col" style="margin: 18px;width: 210.797px;"><span>{{ $libellé }}</span></div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col" style="margin: 30px;">
                <div class="row" style="margin: 48;">
                    <div class="col" style="margin: 18px;width: 210.797px;"><span>coefficient</span></div>
                </div>
            </div>
            <div class="col">
                <div class="row" style="margin: 30px;">
                    <div class="col" style="margin: 18px;width: 210.797px;"><span>{{ $coefficient }}</span></div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="text-center" style="margin-top: 50px;margin-bottom: 101px;">Notes des étudiants</h3>
            </div>
        </div>
        <div class="row" style="padding: 20px;padding-right: 0px;padding-left: 184px;padding-bottom: 0px;padding-top: 0px;">
            <div class="col" style="margin: 0px;margin-left: 0px;width: 479.328px;"><span style="margin-bottom: 58px;">Code module</span>
                <div class="row">
                    <div class="col" style="margin-top: 23px;margin-left: 0px;"><span>{{ $code_module }}</span></div>
                </div>
            </div>
            <div class="col" style="margin: 0px;margin-left: 0px;"><span style="margin-bottom: 58px;">Matricule</span>
                <div class="row">
                    <div class="col" style="margin-top: 23px;margin-left: 0px;"><span>{{ $matricule }}</span></div>
                </div>
            </div>
            <div class="col" style="margin: 0px;margin-left: 0px;"><span style="margin-bottom: 58px;">Note</span>
                <div class="row">
                    <div class="col" style="margin-top: 23px;margin-left: 0px;"><input type="text" style="width: 319px;height: 44px;font-size: 18px;padding: 7px 2px;box-shadow: 1px 1px rgb(238,238,238);font-weight: bold;" wire:model.defer='note'></div>
                </div>
            </div>
            <div class="col">
                <button wire:click="next_student" class="btn btn-success" data-bss-hover-animate="pulse" style="margin: 0px;" {{ $disabled }}>Suivant</button>
            </div>
        </div>

        @if (session()->has('note'))
            <div class="alert alert-danger mt-5 text-center">
                <h1>{{ session('note') }}</h1>
            </div>
        @endif
        @if (session()->has('fin'))
            <div class="alert alert-danger mt-5 text-center">
                <h1>{{ session('fin') }}</h1>
            </div>
        @endif
<style>
    span
    {
        font-size: 26px
    }
</style>
</div>
        