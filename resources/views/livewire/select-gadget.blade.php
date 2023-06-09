<div>

    <p class="text-lg ml-2 font-semibold">Nombre de contacto</p>
    <x-bladewind::input placeholder="Ej. Héctor Sanchez"  />

    <p class="text-lg ml-2 font-semibold">Domicilio</p>
    <x-bladewind::input placeholder="Ej. Calle Catalayud #431, Col. Carbajal"  />

    <p class="text-lg ml-2 font-semibold">Celular</p>
    <x-bladewind::input placeholder="Ej. 6862226799"  />

    <p class="text-lg ml-2 font-semibold">Tamaño de flotilla</p>
    <x-bladewind::radio-button label="3-5 vehículos" name="fleet"  /><br>
    <x-bladewind::radio-button label="6-15 vehículos" name="fleet"  /><br>
    <x-bladewind::radio-button label="16-30" name="fleet"  /><br>
    <x-bladewind::radio-button label="31-50" name="fleet"  /><br>
    <x-bladewind::radio-button label="50+" name="fleet" /><br><br>
    <p class="text-lg ml-2 mb-2 font-semibold">Típo de licencia</p>
    <x-bladewind::radio-button label="Súper núcleo" name="license"  /><br>
    <x-bladewind::radio-button label="Núcleo" name="license"  /><br>
    <x-bladewind::radio-button label="Zona" name="license"  /><br>
    <x-bladewind::radio-button label="Área" name="license" /><br><br>

    <p class="text-lg ml-2 mb-2 font-semibold">Seleccione sus Gadgets</p>
    <x-bladewind::checkbox label="Lector Otto"/>
    <x-bladewind::checkbox label="Lector Soldix"/>

</div>
