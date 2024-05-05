
<form action="{{ route('empleado.registrar') }}" method="POST" class="bg-red-500">
    @csrf

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Nombre:</span>
        </div>
        <input type="text" name="nombre" placeholder="type here" class="input input-bordered w-full max-w-xs" required/>
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Apellido:</span>
        </div>
        <input type="text" name="apellido" placeholder="type here" class="input input-bordered w-full max-w-xs" required/>
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Fecha de contratacion:</span>
        </div>
        <input type="date" name="fecha_contratacion" required />
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Fecha de Nacimiento:</span>
        </div>
        <input type="date" name="fecha_nacimiento" required />
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Telefono:</span>
        </div>
        <input type="text" name="telefono" placeholder="type here" maxlength="9" class="input input-bordered w-full max-w-xs" required />
    </label>

    <input type="submit" class="btn" value="Registrar">
</form>

<h3>¿Editar algun empleado?</h3>
@foreach($empleados as $empleado)
    <i>- </i><a href="{{ route('empleado.editar', $empleado->idEmpleado) }}">Editar {{ $empleado->Nombre }}</a><br><br>
@endforeach

<button class="btn">Button</button>
<button class="btn btn-neutral">Neutral</button>
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-accent">Accent</button>
<button class="btn btn-ghost">Ghost</button>
<button class="btn btn-link">Link</button>